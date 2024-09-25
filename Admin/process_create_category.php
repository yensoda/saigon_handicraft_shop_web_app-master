<?php
session_start();
require_once "../ProductCategoryRepository.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (!isset($_COOKIE['admin_username'])) {
        header("Location: Login.php");
        exit;
    }

    // Lấy dữ liệu từ biểu mẫu tạo danh mục sản phẩm
    $category_name = $_POST['category_name'];
    $category_description = $_POST['category_description'];

    $categoryRepository = new ProductCategoryRepository();
    $result = $categoryRepository->insertCategory($category_name, $category_description);

    // Kiểm tra kết quả và gửi thông báo về kết quả tạo danh mục
    if ($result) {
        $_SESSION["categoryCreateSucceed"] = true;
    } else {
        $_SESSION["categoryCreateSucceed"] = false;
    }

    // Chuyển hướng về trang tạo danh mục sản phẩm
    header("Location: CategoryCreate.php");
    exit;
} else {
    // Nếu không phải là phương thức POST, chuyển hướng về trang chính
    header("Location: index.php");
    exit;
}
?>
