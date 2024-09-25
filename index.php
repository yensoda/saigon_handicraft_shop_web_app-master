<?php require_once "header.php"; ?>

<div class="row">
            <div class="col-1">

            </div>
            <div class="col-9 border-top border-left border-right" style="min-height: 1000px">
				<div class="row pl-2">
					<?php
					require_once("ProductRepository.php");
				$productRepository = new ProductRepository();
				$productsPerPage = 18;
				$totalProducts = $productRepository->getTotalCount();
				$totalPages = ceil($totalProducts / $productsPerPage);
				$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
				$startIndex = ($currentPage - 1) * $productsPerPage;
				$listProducts = $productRepository->getAllWithPagination($startIndex, $productsPerPage);
				if(isset($_POST['searchtx'])) {
				$searchTerm = $_POST['searchtx'];
				$listProducts = $productRepository->getProductByName($searchTerm);
			}
								else if (isset($_GET['category_id'])) {
					$category_id = $_GET['category_id'];
					$productRepository = new ProductRepository();
					$listProducts = $productRepository->getAllProductsByCategory($category_id);
				}
					else {
					$productRepository = new ProductRepository();
					$listProducts = $productRepository->getAllWithPagination($startIndex, $productsPerPage);
				}
			?>
			 <?php foreach($listProducts as $product): ?>
				<?php
				$productImages = $productRepository->getProductImages($product['product_id']);

				echo '<a href="details.php?id=' . $product['product_id'] . '">';
				echo '<div class="card m-1" style="width: 17vw">';
				echo '<img class="card-img-top img-fluid" src="Images/' . $product['product_thumbnail_image'] . '" style="width: 100vw; height: 170px" />';
				echo '<div class="card-footer text-center">';
				echo '<p class="font-weight-bold text-truncate" style="width: 100%">' . $product['product_name'] . '</p>';

				$formatted_price = number_format($product['product_price'], 0, ',', '.') . ' đ';

				echo '<p class="card-subtitle font-weight-bold mt-1 text-danger">';
				echo '<span class="text-dark">Giá:</span> ' . $formatted_price;
				echo '</p>';

				if ($product['product_inventory'] == 0) {
					echo '<span class="badge badge-danger" style="position: absolute; left: 0; top: 0">HẾT HÀNG</span>';
				} else if ($product['product_discount'] > 0) {
					echo '<span class="badge badge-warning" style="position: absolute; left: 0; top: 0">GIẢM GIÁ</span>';
				}

				echo '</div>'; 
				echo '</div>'; 
				echo '</a>';
				?>
				<?php endforeach; ?>
					
            	</div>
				<div class="row">
        <div class="col-12">
            <!-- Pagination -->
            <div class="pagination">
				
                <?php
					if (!isset($_POST['searchtx']) && !isset($_GET['category_id']))
						for ($page = 1; $page <= $totalPages; $page++): ?>
                    		<a href="?page=<?php echo $page; ?>" class="<?php echo ($page == $currentPage) ? 'active' : ''; ?>"><?php echo $page; ?></a>
                <?php endfor; ?>
            </div>
        </div>
    </div>
		
        	</div>
					<div class="col-2">
						<?php include("Sidebar.php"); ?>
						
					</div>
		</div>

<?php require_once "footer.php"; ?>
