<?php
session_start();
require_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user_username'];
    $password = $_POST['user_password'];
    $repassword = $_POST['user_repassword'];
    $gender = $_POST['user_gender'];
    $email = $_POST['user_email'];
    $phonenumber = $_POST['user_phonenumber'];
    $address = $_POST['user_address'];
    $firstname = $_POST['user_firstname'];
    $lastname = $_POST['user_lastname'];

    if ($password !== $repassword) {
        $_SESSION['register_error'] = "Mật khẩu và nhập lại mật khẩu không khớp.";
        header("Location: index.php");
        exit;
    }
$sql = "INSERT INTO user_account (user_username, user_password, user_gender, user_email, user_phonenumber, user_address, user_firstname, user_lastname, user_member_tier, user_point) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Đồng', 0)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("ssssssss", $username, $password, $gender, $email, $phonenumber, $address, $firstname, $lastname);
    // Tiếp tục xử lý
} else {
    echo "Error in SQL statement: " . $conn->error; // In ra lỗi SQL
}

    if ($stmt->execute()) {
        $_SESSION['register_success'] = "Đăng ký thành công.";
        header("Location: login.php"); 
    } else {
        $_SESSION['register_error'] = "Đăng ký thất bại. Vui lòng thử lại.";
        header("Location: index.php"); 
    }

    $stmt->close();
    $conn->close();
    exit;
} else {
	
    header("Location: index.php");
    exit;
}
?>
