<?php
require_once '../connect.php';

if (isset($_GET['cancelOrderId'])) {
    $orderId = $_GET['cancelOrderId'];
    mysqli_begin_transaction($conn);

    try {
        $sql = "DELETE FROM user_order_product WHERE user_order_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $orderId);
        mysqli_stmt_execute($stmt);

        $sql = "DELETE FROM user_order WHERE user_order_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $orderId);
        mysqli_stmt_execute($stmt);

        mysqli_commit($conn);

        header("Location: OrderProcess.php");
    } catch (Exception $e) {

        mysqli_rollback($conn);


        header("Location: OrderProcess.php?cancel_error=1");
    }
} else {

    header("Location: OrderProcess.php?cancel_error=1");
}
?>
