<?php
require_once "ProductRepository.php";
if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $productRepository = new ProductRepository();
    $productRepository->deleteById($product_id);
    header("Location: ProductList.php");
    exit;
} else {
    echo "Không tìm thấy sản phẩm để xóa!";
    header("Refresh: 3; url=ProductList.php");
    exit;
}
?>
