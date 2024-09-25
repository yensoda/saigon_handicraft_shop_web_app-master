<?php
session_start();
require_once "../ProductCategoryRepository.php";

if (!isset($_COOKIE['admin_username'])) {
    header("Location: Login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit;
}

$category_id = $_POST['category_id'];

$categoryRepository = new ProductCategoryRepository();

$result = $categoryRepository->deleteCategory($category_id);

if ($result) {
    $_SESSION["categoryDeleteSucceed"] = true;
} else {
    $_SESSION["categoryDeleteSucceed"] = false;
}
header("Location: CategoryList.php");
exit;
?>
