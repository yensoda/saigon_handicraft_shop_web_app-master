<?php
session_start();

$productId = $_POST['product_id'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (!in_array($productId, $_SESSION['cart'])) {
    $_SESSION['cart'][] = $productId;
}

header('Location: cart.php');
exit();
?>