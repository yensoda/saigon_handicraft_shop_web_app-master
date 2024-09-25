<?php
require_once("ProductCategoryRepository.php");
$productCategoryRepository = new ProductCategoryRepository();
$productCategories = $productCategoryRepository->getAllCategories();
?>

<a class="dropdown-item font-weight-bold" href="~/Product/All">Tất cả</a>
    <?php foreach ($productCategories as $category): ?>
        <a class="dropdown-item font-weight-bold" href="index.php?category_id=<?php echo $category['product_category_id']; ?>"><?php echo $category['product_category_name']; ?></a>
    <?php endforeach; ?>
