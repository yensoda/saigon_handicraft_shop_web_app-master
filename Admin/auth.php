<?php
require_once(__DIR__ . "/../connect.php");

class Auth {
    public static function login($username, $password) {
        $hashed_password = ($password); 
		$run = Auth::findOneByUsernameAndPassword($username, $hashed_password);
        if ($run) {
            setcookie("admin_username", $run['admin_username'], time() + 1314000, "/");
            setcookie("admin_password", $run['admin_password'], time() + 1314000, "/");
            return true;
        }
        return false;
    }

    public static function findOneByUsernameAndPassword($username, $password) {
        global $conn;
        $sql = "SELECT * FROM admin_account WHERE admin_username = '$username' AND admin_password = '$password'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
        return null;
    }
    public static function loginWithCookie() {
        if (isset($_COOKIE['admin_username']) && isset($_COOKIE['admin_password'])) {	
            $username = $_COOKIE['admin_username'];
            $password = $_COOKIE['admin_password'];
            $run = Auth::findOneByUsernameAndPassword($username, $password);
            return $run ? $run : null;
        }
        return null;
    }
}
?>
