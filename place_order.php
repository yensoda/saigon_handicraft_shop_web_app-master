<?php
session_start();
require 'connect.php'; // Kết nối CSDL
require_once("user_account.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy thông tin đơn hàng từ form
    $owner_name = $_POST['Order_owner_name'];
    $owner_phone = $_POST['Order_owner_phone'];
    $owner_email = $_POST['Order_owner_email'];
    $owner_address = $_POST['Order_owner_address'];

    // Thêm thông tin đơn hàng vào bảng user_order
    $stmt = $conn->prepare("INSERT INTO user_order (user_account_id, order_time, user_order_buyer_name, user_order_phonenumber, user_order_email, user_order_address, is_processed, is_delivered, order_total_value) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssidi", $user_account_id, $order_time, $owner_name, $owner_phone, $owner_email, $owner_address, $is_processed, $is_delivered, $total_price);

    // Bổ sung giá trị cho các tham số
    $user_account_id = $_SESSION['user_account_id']; 
    $order_time = date("Y-m-d H:i:s"); // Lấy thời gian hiện tại
    $is_processed = 0; // Chưa xử lý
    $is_delivered = 0; // Chưa giao hàng
    $total_price = $_SESSION['total_price']; // Tổng giá trị đơn hàng, được tính từ session hoặc dữ liệu khác

    if ($stmt->execute()) {
        $order_id = $stmt->insert_id; // Lấy ID của đơn hàng mới thêm

        foreach ($_POST['product_ids'] as $index => $product_id) {
            $quantity = $_POST['quantities'][$index];

            $stmt_item = $conn->prepare("INSERT INTO user_order_product (user_order_id, product_id, product_name, order_product_amount) VALUES (?, ?, ?, ?)");
            $stmt_item->bind_param("iisi", $order_id, $product_id, $product_name, $quantity);
            $query_product = $conn->query("SELECT product_name FROM product WHERE product_id = $product_id");
            $product_name = $query_product->fetch_assoc()['product_name'];

            $stmt_item->execute();
        }

        unset($_SESSION['cart']);
        unset($_SESSION['cart_quantities']);

        header("Location: order_success.php");
        exit();
    } else {
        echo "Lỗi: " . $stmt->error;
    }
}
?>
