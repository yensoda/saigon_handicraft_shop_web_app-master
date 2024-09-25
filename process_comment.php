<?php
session_start();


include 'connect.php';

if (!isset($_COOKIE['user_username'])) {
    header("Location: login.php");
    exit();
}


$product_id = intval($_POST['product_id']);
$review_content = trim($_POST['review_content']);
$user_username = $_COOKIE['user_username'];

if (empty($review_content) || strlen($review_content) > 255) {
    die("Nội dung bình luận không hợp lệ.");
}

$query = "SELECT user_account_id FROM user_account WHERE user_username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $user_username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$user_account_id = $user['user_account_id'];


$query = "INSERT INTO product_review (user_account_id, product_id, product_review_content, review_owner) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param('iiss', $user_account_id, $product_id, $review_content, $user_username);
$stmt->execute();

$stmt->close();
$conn->close();
header("Location: details.php?id=".$product_id);
?>
