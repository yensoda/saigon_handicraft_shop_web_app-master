<?php
require_once("ProductCategoryRepository.php");
$productCategoryRepository = new ProductCategoryRepository();
$productCategories = $productCategoryRepository->getAllCategories();
?>

<div class="container-fluid bg-light rounded border p-0">
    <ul class="list-group">
        <li class="list-group-item text-center font-weight-bold">
            DANH MỤC SẢN PHẨM
        </li>
        <li class="list-group-item">
            <a class="text-dark" href="index.php">
                Tất cả
            </a>
        </li>
        <?php foreach ($productCategories as $category): ?>
            <li class="list-group-item">
                <a class="text-dark" href="index.php?category_id=<?php echo $category['product_category_id']; ?>">
                    <?php echo $category['product_category_name']; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="container-fluid bg-light rounded mt-3 mb-3 border p-0">
    <ul class="list-group flex-column">
        <li class="list-group-item text-center font-weight-bold">
            LIÊN HỆ CHÚNG TÔI
        </li>
        <li class="list-group-item">
            <span>
                <i class="fa-solid fa-phone"></i> Hotline: <br /> 0367035210 <br />
            </span>
            <span>
                <i class="fa-solid fa-envelope"></i> Email: <br /> devlin.orc@gmail.com<br />
            </span>
            <span>
                <i class="fa-solid fa-location-dot"></i> Address: <br /> 36/13 Đ.160, Lã Xuân Oai, P. Tăng Nhơn Phú A, TP. Thủ Đức, TP. Hồ Chí Minh
            </span>
        </li>
    </ul>
</div>
