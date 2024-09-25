<?php
session_start();

unset($_SESSION['cart']);
unset($_SESSION['cart_quantities']);

header("Location: cart.php");
exit();
?>
