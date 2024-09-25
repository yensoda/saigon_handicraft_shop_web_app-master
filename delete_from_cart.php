<?php
session_start();

if (isset($_GET['id']) && isset($_SESSION['cart'])) {
    $productId = intval($_GET['id']);
    if (($key = array_search($productId, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
    }
}

header('Location: cart.php');
exit();
?>