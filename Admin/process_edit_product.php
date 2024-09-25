<?php
session_start();
require_once "ProductRepository.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_COOKIE['admin_username'])) {
        header("Location: Login.php");
        exit;
    }

    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_discount = $_POST['product_discount'];
    $product_inventory = $_POST['product_inventory'];
    $product_thumbnail_image = $_POST['product_thumbnail_image'];

    $productRepository = new ProductRepository();
    $result = $productRepository->update($product_id, $product_name, $product_price,$product_discount, $product_description, $product_thumbnail_image, $category_id,$product_inventory);
    if ($result) {
        $_SESSION["productEditSucceed"] = true;
    } else {
        $_SESSION["productEditSucceed"] = false;
    }

    header("Location: ProductEdit.php?id=" . $product_id);
    exit;
} else {
    header("Location: index.php");
    exit;
}
?>
