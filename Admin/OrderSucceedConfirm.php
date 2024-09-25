<?php
require_once '../connect.php';

if (isset($_GET['orderId'])) {
    $orderId = $_GET['orderId'];
    $updateSql = "UPDATE user_order SET is_delivered = 1 WHERE user_order_id = ?";
    $stmt = mysqli_prepare($conn, $updateSql);
    mysqli_stmt_bind_param($stmt, 'i', $orderId);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: OrderSucceed.php");
        exit();
    } else {
        header("Location: OrderSucceed.php?confirm_error=1");
        exit();
    }
} else {
    header("Location: OrderSucceed.php?confirm_error=1");
    exit();
}
?>
