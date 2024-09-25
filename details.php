<?php require_once "header.php"; ?>

<?php
require 'connect.php';
$productId = $_GET['id'];
$stmt = mysqli_prepare($conn, "SELECT * FROM product WHERE product_id = ?");
mysqli_stmt_bind_param($stmt, 'i', $productId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$product = mysqli_fetch_assoc($result);
?>

<?php
require_once("user_account.php");
require_once("backend/auth.php");
require_once("UserRanking.php");
?>

<?php
require_once 'ProductRepository.php';

if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $productQty = $_POST['product_qty'];

    $productRepository = new ProductRepository();
    $product = $productRepository->getById($productId);

    if ($product && mysqli_num_rows($product) > 0) {
        $product = mysqli_fetch_assoc($product);
        $_SESSION['cart'][] = array(
            'product_id' => $product['product_id'],
            'product_name' => $product['product_name'],
            'product_price' => $product['product_price'],
            'product_qty' => $productQty
        );
    }
}
?>
<style>
    .btn-lg {
        font-size: 1.25rem;
        padding: 0.5rem 1rem;
        border-radius: 0.3rem;
    }

    .btn-warning {
        color: #fff;
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-warning:hover {
        color: #fff;
        background-color: #e0a800;
        border-color: #d39e00;
    }

    button.btn-lg.btn-warning {
        border: none;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }

    button.btn-lg.btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
    }

    button.btn-lg.btn-warning:focus {
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
    }
</style>

<div class="row">
    <div class="col-1"></div>
    <div class="col-9 border-top border-left border-right" style="min-height: 1000px">
        <div class="row pl-2">
            <?php
            require_once 'ProductRepository.php';

            if (isset($_GET['id'])) {
                $productId = $_GET['id'];
                $productRepository = new ProductRepository();
                $product = $productRepository->getById($productId);

                if ($product && mysqli_num_rows($product) > 0) {
                    $product = mysqli_fetch_assoc($product);
            ?>
                    <div class="container-fluid m-3 mt-3">
                        <div class="row">
                            <div class="col-1 p-0">
                                <ul id="imagelist" class="nav flex-column">
                                    <?php
                                    $productImages = $productRepository->getProductImages($product['product_id']);
                                    if ($productImages && mysqli_num_rows($productImages) > 0) {
                                        while ($image = mysqli_fetch_assoc($productImages)) {
                                    ?>
                                            <li class="nav-item mt-1">
                                                <img id="<?php echo $image['product_image_id']; ?>" class="img-thumbnail m-0" src="Images/<?php echo $image['product_image_file_name']; ?>" onclick="imgClick('<?php echo $image['product_image_id']; ?>')" style=" cursor: pointer; height: 75px" />
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="col-6">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <img id="imagecurrent" class="img-thumbnail" src="Images/<?php echo $product['product_thumbnail_image']; ?>" style="width: 100%; height: 350px;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="container-fluid">
                                    <div class="row">
                                        <h3><?php echo $product['product_name']; ?></h3>
                                    </div>
                                    <div class="row">
                                        <p>Loại sản phẩm: <?php echo $productRepository->getCategoryByProductId($product['product_id']); ?></p>
                                    </div>
                                    <div class="row">
                                        <p><?php echo $product['product_description']; ?></p>
                                    </div>
                                    <div class="row">
                                        <h3 class="text-danger"><?php echo number_format($product['product_price'], 0, ',', '.'); ?> đ</h3>
                                    </div>
                                    <div class="row">
                                        <h6>
                                            Tình trạng:
                                            <?php if ($product['product_inventory'] > 0) { ?>
                                                <span class="text-success">Còn hàng</span>
                                            <?php } else { ?>
                                                <span class="text-danger">Hết hàng</span>
                                            <?php } ?>
                                        </h6>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12 text-center">
                                            <?php if ($product['product_inventory'] > 0) { ?>
                                                <form action="add_to_cart.php" method="post">
													<input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
													<button type="submit" class="btn-lg btn-warning">THÊM VÀO GIỎ HÀNG</button>
												</form>
                                            <?php } else { ?>
                                                <a class="btn-lg btn-warning" href="#!">LIÊN HỆ TÔI KHI CÓ HÀNG</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row border-top mt-4 border-bottom">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 border-bottom mt-2 mb-2">
                                        <h5>Sản phẩm khác cùng loại</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php
                                    $relatedProducts = $productRepository->getRelatedProducts($product['product_category_id']);
                                    foreach ($relatedProducts as $relatedProduct) {
                                    ?>
                                        <a href="details.php?id=<?php echo $relatedProduct['product_id']; ?>">
                                            <div class="card m-1" style="width: 17vw">
                                                <img class="card-img-top img-fluid" src="Images/<?php echo $relatedProduct['product_thumbnail_image']; ?>" style="width: 100vw; height: 170px" />
                                                <div class="card-footer text-center">
                                                    <p class="font-weight-bold text-truncate" style="width: 100%">
                                                        <?php echo $relatedProduct['product_name']; ?>
                                                    </p>
                                                    <p class="card-subtitle font-weight-bold mt-1 text-danger">
                                                        <span class="text-dark">Giá:</span> <?php echo number_format($relatedProduct['product_price'], 0, ',', '.'); ?> đ
                                                    </p>
                                                    <?php if ($relatedProduct['product_inventory'] == 0) { ?>
                                                        <span class="badge badge-danger" style="position: absolute; left: 0; top: 0">HẾT HÀNG</span>
                                                    <?php } else if ($relatedProduct['product_discount'] > 0) { ?>
                                                        <span class="badge badge-warning" style="position: absolute; left: 0; top: 0">GIẢM GIÁ</span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 pt-5">
							<div class="col-12">
								<div class="container-fluid">
									<div class="row">
										<div class="col-6">
											<h5>Để lại bình luận của bạn</h5>
											<?php if (isset($_COOKIE['user_username'])) { ?>
												<form method="post" action="process_comment.php">
													<input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" />
													<div class="form-group">
														<label for="review_content">Nội dung bình luận</label>
														<textarea class="form-control" name="review_content" id="review_content" style="height: 300px" required maxlength="255"></textarea>
													</div>
													<div class="form-group text-center">
														<input class="btn btn-primary" type="submit" value="Đăng bình luận" />
													</div>
												</form>
											<?php } else { ?>
												<p class="m-3">Bạn cần đăng nhập để có thể bình luận!</p>
											<?php } ?>
										</div>
										<div class="col-6">
											<?php
											require_once("ProductReviewRepository.php");
											$reviewRepository = new ProductReviewRepository();
											$reviews = $reviewRepository->getReviewById($productId);
											?>
											<h5>Đánh giá khác (
												<?php 
												if(is_array($reviews)) {
													echo count($reviews);
												} else {
													echo '0';
												}
												?>)
											</h5>
											<?php if(is_array($reviews) && count($reviews) > 0): ?>
												<?php foreach ($reviews as $review): ?>
													<div class="container-fluid m-3 border rounded">
														<div class="row border-bottom">
															<div class="col-12 bg-light">
																<p class="p-0 m-0">Người dùng: <span class="font-weight-bold" style="font-size: 16px"><?php echo $review['review_owner']; ?></span></p>
															</div>
														</div>
														<div class="row">
															<div class="col-12">
																<p class="lead p-0 m-1" style="font-size: 18px"><?php echo $review['product_review_content']; ?></p>
															</div>
														</div>
													</div>
												<?php endforeach; ?>
												<div class="col-12 text-center mt-4">
													<button id="btnLoad" class="btn btn-outline-dark" onclick="loadMore()">Tải thêm</button>
												</div>
											<?php else: ?>
												<p class="text-center">Chưa có đánh giá nào cho sản phẩm này.</p>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>

						<script>
							function imgClick(string) {
								var m = document.getElementById("imagecurrent");
								m.src = document.getElementById(string).src;
							}
						</script>

						<script>
							let max = @numRange;
							let x = 6;
							$(document).ready(function () {
								if (6 >= max - 1) {
									$("#btnLoad").addClass("hiddenComp");
								}
								for (let i = 1; i <= 6; ++i) {
									$("#_" + i.toString()).removeClass("hiddenComp");
								}
							});
							function loadMore() {
								if (x + 6 >= max) {
									$("#btnLoad").addClass("hiddenComp");
								}
								for (let i = x + 1; i <= x + 6; ++i) {
									$("#" + i.toString()).removeClass("hiddenComp");
								}
								x += 6;
							}
						</script>

						<?php
							} else {
								echo "Sản phẩm không tồn tại.";
							}
						} else {
							echo "Không có mã sản phẩm được cung cấp.";
						}
						?>
						</div>
			</div>
		</div>
						<div class="col-2">
							<?php include("Sidebar.php"); ?>
						</div>
						</div>
<?php require_once "footer.php"; ?>
