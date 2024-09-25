<?php
require_once("ProductRepository.php");
$productRepository = new ProductRepository();
    // Số sản phẩm trên mỗi trang
    $productsPerPage = 18;

    // Lấy tổng số sản phẩm
    $totalProducts = $productRepository->getTotalCount();

    // Tính tổng số trang
    $totalPages = ceil($totalProducts / $productsPerPage);

    // Kiểm tra trang hiện tại
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

    // Tính index bắt đầu của sản phẩm
    $startIndex = ($currentPage - 1) * $productsPerPage;

    // Lấy danh sách sản phẩm cho trang hiện tại
    $listProducts = $productRepository->getAllWithPagination($startIndex, $productsPerPage);
?>
 <?php foreach($listProducts as $product): ?>
	<?php
	$productImages = $productRepository->getProductImages($product['product_id']);

	echo '<a href="~/Product/Details/?id=' . $product['product_id'] . '">';
    echo '<div class="card m-1" style="width: 17vw">';
    echo '<img class="card-img-top img-fluid" src="Images/' . $product['product_thumbnail_image'] . '" style="width: 100vw; height: 170px" />';
    echo '<div class="card-footer text-center">';
    echo '<p class="font-weight-bold text-truncate" style="width: 100%">' . $product['product_name'] . '</p>';
    
    // Format giá sản phẩm
    $formatted_price = number_format($product['product_price'], 0, ',', '.') . ' đ'; // Định dạng giá theo tiền tệ Việt Nam
    
    echo '<p class="card-subtitle font-weight-bold mt-1 text-danger">';
    echo '<span class="text-dark">Giá:</span> ' . $formatted_price;
    echo '</p>';

    // Hiển thị badge tùy thuộc vào tình trạng của sản phẩm
    if ($product['product_inventory'] == 0) {
        echo '<span class="badge badge-danger" style="position: absolute; left: 0; top: 0">HẾT HÀNG</span>';
    } else if ($product['product_discount'] > 0) {
        echo '<span class="badge badge-warning" style="position: absolute; left: 0; top: 0">GIẢM GIÁ</span>';
    }

    echo '</div>'; // Kết thúc card-footer
    echo '</div>'; // Kết thúc card
    echo '</a>';
	?>
	<?php endforeach; ?>
<div class="row">
        <div class="col-12">
            <!-- Pagination -->
            <div class="pagination">
                <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                    <a href="?page=<?php echo $page; ?>" class="<?php echo ($page == $currentPage) ? 'active' : ''; ?>"><?php echo $page; ?></a>
                <?php endfor; ?>
            </div>
        </div>
</div>


