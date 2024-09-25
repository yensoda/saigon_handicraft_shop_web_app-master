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
$category_name = $_POST['category_name'];
$category_description = $_POST['category_description'];

$categoryRepository = new ProductCategoryRepository();

$result = $categoryRepository->updateCategory($category_id, $category_name, $category_description);

if ($result) {
    $_SESSION["categoryUpdateSucceed"] = true;
} else {
    $_SESSION["categoryUpdateSucceed"] = false;
}

header("Location: CategoryList.php");
exit;
?>
