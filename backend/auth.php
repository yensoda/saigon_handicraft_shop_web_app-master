<?php
require_once(__DIR__ . "/../connect.php");
require_once(__DIR__ . "/../user_account.php");

class Auth {
    public static function checkExist($field, $value) {
        global $conn;
        $sql = "SELECT * FROM user_account WHERE $field='$value'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            echo '<script>alert("'.$field.' đã tồn tại")</script>';
            return false;
        }
        return true;
    }

    public static function register($username, $password, $fullname, $dob, $address, $gender, $email, $phone) {
        global $conn;
        if (Auth::checkExist("user_username", $username) && Auth::checkExist("user_email", $email) && Auth::checkExist("user_phonenumber", $phone)) { 
            $hashed_password = ($password); // Sử dụng hàm băm phù hợp với cách bạn lưu mật khẩu trong cơ sở dữ liệu
            $sql = "INSERT INTO user_account (user_username, user_password, user_firstname, user_lastname, user_gender, user_email, user_phonenumber, user_address) " .
                   "VALUES ('$username', '$hashed_password', '$fullname', '', '$gender', '$email', '$phone', '$address')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>alert("Đăng ký thành công!"); window.location.href="../login/index.php";</script>';
            } else {
                echo '<script>alert("Đăng ký thất bại!");</script>';
            }
        }
    }

    public static function login($username, $password) {
        $hashed_password = ($password);         $run = Auth::findOneByUsernameAndPassword($username, $hashed_password);
        if ($run) {
            setcookie("user_username", $run['user_username'], time() + 1314000, "/");
            setcookie("user_password", $run['user_password'], time() + 1314000, "/");
            return true;
        }
        return false;
    }

    public static function findOneByUsernameAndPassword($username, $password) {
        global $conn;
        $sql = "SELECT * FROM user_account WHERE user_username = '$username' AND user_password = '$password'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
        return null;
    }
    public static function loginWithCookie() {
        if (isset($_COOKIE['user_username']) && isset($_COOKIE['user_password'])) {	
            $username = $_COOKIE['user_username'];
            $password = $_COOKIE['user_password'];
            $run = Auth::findOneByUsernameAndPassword($username, $password);
            return $run ? $run : null;
        }
        return null;
    }
}
?>
