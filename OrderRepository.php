<?php
require_once("connect.php");

class OrderRepository {
    public function getAllOrders() {
        global $conn;
        $sql = "SELECT * FROM user_order";
        return mysqli_query($conn, $sql);
    }

    public function getOrderDetails($orderId) {
        global $conn;
        $sql = "SELECT * FROM user_order_product WHERE user_order_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $orderId);
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_get_result($stmt);
    }
	
	public function getAllOrdersByIdUser($userId) {
        global $conn;
        $sql = "SELECT * FROM user_order WHERE user_account_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $userId);
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_get_result($stmt);
    }
}
?>
