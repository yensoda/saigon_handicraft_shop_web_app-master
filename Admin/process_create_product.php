<?php
session_start(); 
require_once "ProductRepository.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["category_id"]) && isset($_POST["product_name"]) && isset($_POST["product_description"]) && isset($_FILES["product_thumbnail"])) {
        $category_id = $_POST["category_id"];
        $product_name = $_POST["product_name"];
        $product_description = $_POST["product_description"];
		$product_price = $_POST["product_price"];
		$product_discount = $_POST["product_discount"];
		$product_inventory = $_POST["product_inventory"];
        $thumbnail = "../Images/" . basename($_FILES["product_thumbnail"]["name"]);
        if (move_uploaded_file($_FILES["product_thumbnail"]["tmp_name"], $thumbnail)) {
            $productRepository = new ProductRepository();
            $productId = $productRepository->insert($product_name, $product_price, $product_discount, $product_description, $thumbnail, $category_id, $product_inventory);
            if ($productId) {
                $_SESSION["productCreateSucceed"] = true;
            } else {
                $_SESSION["productCreateError"] = "Đã xảy ra lỗi khi lưu thông tin sản phẩm vào cơ sở dữ liệu.";
            }
        } else {
            $_SESSION["productCreateError"] = "Đã xảy ra lỗi khi upload file.";
        }
    } else {
        $_SESSION["productCreateError"] = "Vui lòng điền đầy đủ thông tin bắt buộc.";
    }
} else {
    $_SESSION["productCreateError"] = "Yêu cầu không hợp lệ.";
}

header("Location: ProductCreate.php");
exit;
?>
