<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantity']) && isset($_SESSION['cart'])) {
    foreach ($_POST['quantity'] as $productId => $quantity) {
        $productId = intval($productId);
        $quantity = intval($quantity);

        if ($quantity <= 0) {
            if (($key = array_search($productId, $_SESSION['cart'])) !== false) {
                unset($_SESSION['cart'][$key]);
            }
        } else {
            // Update the quantity in the cart
            $_SESSION['cart_quantities'][$productId] = $quantity;
        }
    }
}

header('Location: cart.php');
exit();
?>