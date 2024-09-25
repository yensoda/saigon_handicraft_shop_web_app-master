
<?php
session_start();
require_once("user_account.php");
require_once("backend/auth.php");
require_once("UserRanking.php");

?>
<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title><?php echo isset($ViewBag["Title"]) ? $ViewBag["Title"] : "Default Title"; ?></title>
    <link href="Contents/css/bootstrap.min.css" rel="stylesheet" />
    <link href="fontawesome-free-kit/css/all.min.css" rel="stylesheet" />
    <script src="fontawesome-free-kit/js/all.min.js"></script>
    <script src="Scripts/js/jquery-3.3.1.min.js"></script>
    <script src="Scripts/js/bootstrap.min.js"></script>
    <style>
        .breadcrumb a {
            color: darkslategrey;
        }
        .hiddenComp {
            display: none;
        }
		
	.pagination {
    margin-top: 20px;
    text-align: center;
}

.pagination a {
    display: inline-block;
    padding: 8px 16px;
    text-decoration: none;
    color: black;
    border: 1px solid #ddd;
    margin: 0 4px;
}

.pagination a.active {
    background-color: #007bff;
    color: white;
    border: 1px solid #007bff;
}


    </style>
</head>

<body>
    <div id="mainNav" class="container-fluid border-top">

        <div class="row">
            <div class="col-12 p-0">
                <ul class="nav navbar bg-light navbar-light">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-dark" href="index.php">
                            <i class="fa-solid fa-house"></i> Trang chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-dark" href="~/Home/About">
                            <i class="fa-solid fa-compass"></i>
                            Giới thiệu
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button id="btnDropdown" class="btn btn-light dropdown-toggle font-weight-bold" onmouseover="" type="button" data-toggle="dropdown">
                                <i class="fa-solid fa-list"></i>
                                Sản phẩm
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnDropdown">
                                <?php include("Dropdown.php"); ?>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-dark" href="~/Home/Instruction">
                            <i class="fa-solid fa-chalkboard-user"></i>
                            Hướng dẫn mua hàng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-dark" href="~/Home/Contact">
                            <i class="fa-solid fa-phone"></i>
                            Liên hệ
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="container-fluid">
                            <form class="d-flex" method="post" action="">
								
                                <input name="searchtx" class="form-control mr-2" placeholder="Tìm kiếm sản phẩm" type="text" />
                                <button class="btn btn-outline-dark" type="submit"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row bg-light border-top border-bottom p-2">
            <div class="col-3">

            </div>
            <div class="col-9 text-right font-weight-bold">
                <?php
                if(isset($_COOKIE['user_username'])) {
                    $user = Auth::findOneByUsernameAndPassword($_COOKIE['user_username'],  $_COOKIE['user_password']);
					$_SESSION['user_account_id'] = $user['user_account_id'];
                    ?>
                    <p class="font-weight-normal m-0 d-inline">Xin chào,  <?php echo ''.$user['user_firstname'].''; ?></p>
                    <p class="font-weight-normal m-0 d-inline">| Điểm tích lũy: <?php echo $user['user_point']; ?></p>
                    <p class="font-weight-normal m-0 mr-2 d-inline">
                        | Hạng: <?php
                            switch ($user['user_member_tier']) {
                                case UserRanking::BRONZE:
                                    echo "<span style='color:#9c3a11'><i class='fa-solid fa-medal'></i> Đồng</span>";
                                    break;
                                case UserRanking::SILVER:
                                    echo "<span style='color:#aaaaaa'><i class='fa-solid fa-medal'></i> Bạc</span>";
                                    break;
                                case UserRanking::GOLD:
                                    echo "<span style='color:#e2dd00'><i class='fa-solid fa-medal'></i> Vàng</span>";
                                    break;
                                case UserRanking::PLATINUM:
                                    echo "<span style='color:#005f9f'><i class='fa-solid fa-medal'></i> Bạch Kim</span>";
                                    break;
                                case UserRanking::DIAMOND:
                                    echo "<span style='color:#00e6d8'><i class='fa-solid fa-medal'></i> Kim Cương</span>";
                                    break;
                            }
                            ?>
                    </p>
                    <a class="btn btn-outline-warning" style="width: 115px" href="~/Purchase/Index"><i class="fa-solid fa-barcode"></i> Đơn hàng</a>
                    <a class="btn btn-outline-info" style="width: 115px" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
                    <a class="btn btn-outline-primary" style="width: 115px" href="edit.php"><i class="fa-solid fa-user"></i> Hồ sơ</a>
                    <a href="backend/logoutCookie.php"><button class="btn btn-outline-danger" style="width: 115px" type="button" data-toggle="modal" data-target="#logOutModal"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</button></a>
                <?php
                } else {
                    ?>
                    <a class="btn btn-outline-info" style="width: 115px" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
                        <a href="login.php"><button class="btn btn-outline-dark" type="button" style="width: 115px" data-toggle="modal" data-target="#userLoginModal">Đăng nhập</button></a>
                        <button class="btn btn-outline-dark" type="button" style="width: 115px" data-toggle="modal" data-target="#userRegisterModal">Đăng ký</button>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3 mb-3">
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-11 pl-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                       
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-9 border-top border-left border-right" style="min-height: 1000px">
				<div class="row pl-2">
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
        <div class="row">
            <div class="container-fluid bg-light border-top">
                <div class="row mt-4">
                    <div class="col-3">
                        <div class="container-fluid">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <h5>THÔNG TIN</h5>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">Giới thiệu SHS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">Hệ thống cửa hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">Tuyển dụng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container-fluid">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <h5>TRỢ GIÚP</h5>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">Chính sách khách hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">Phương thức thanh toán</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">Chính sách mua hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">Chính sách giao hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">Chính sách đổi trả</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">Chính sách bảo hành</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container-fluid">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <h5>THANH TOÁN</h5>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">Visa / MasterCard / JCB</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">ATM / Internet Banking / Ví điện tử</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">Quét mã QR</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">Mua trước trả sau</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#">Thanh toán COD</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="container-fluid">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <h5>KẾT NỐI VỚI CHÚNG TÔI</h5>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="fa-brands fa-facebook fa-2xl"></i> Facebook
                                    </a>
                                    <a class="nav-link" style="color: plum" href="#">
                                        <i class="fa-brands fa-instagram fa-2xl"></i> Instagram
                                    </a>
                                    <a class="nav-link text-dark" href="#">
                                        <i class="fa-brands fa-tiktok fa-2xl"></i> Tiktok
                                    </a>
                                    <a class="nav-link text-danger" href="#">
                                        <i class="fa-brands fa-youtube fa-2xl"></i> Youtube
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <img src="Assets/logoSaleNoti.png" style="width: 70%" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container-fluid border lead text-center" style="font-size: 12px">
                        <p class="m-0">© Copyright <?php echo date("Y"); ?> SaiGon Handicraft Shop - All Rights Reserved.</p>
                        <p class="m-0">Địa chỉ: 189 - 197, Dương Bá Trạc, Phường 1, Quận 8, TP. Hồ Chí Minh | MST: XXXXXXXXXX</p>
                        <p class="m-0">Website designed by HuynhTanKiet</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var headerHeight = $("#banner").height();
            $("#loginFailedModal").modal("show");
            $("#registerFailedModal").modal("show");
            $("#registerSucessfullyModal").modal("show");
            $("#submitSucceedModal").modal("show");
            $(window).scroll(function () {
                if ($(this).scrollTop() > headerHeight) {
                    $("#mainNav").addClass("fixed-top");
                } else {
                    $("#mainNav").removeClass("fixed-top");
                }
            });
        });
    </script>
    <script>

        $(document).ready(function () {
            $("#userRegisterModal").on("show.bs.modal", function () {
                $("#validUsername").removeClass("invisible");
                $("#validPassword").removeClass("invisible");
                $("#validRepassword").removeClass("invisible");
                $("#validEmail").removeClass("invisible");
                $("#validPhone").removeClass("invisible");
                $("#validFirst").removeClass("invisible");
                $("#validLast").removeClass("invisible");
                $("#validGender").removeClass("invisible");
                $("#validAddress").removeClass("invisible");
            });
            $("#userLoginModal").on("show.bs.modal", function () {
                $("#validLoginUsername").removeClass("invisible");
                $("#validLoginPassword").removeClass("invisible");
            });
            $("#user_username").keyup(function () {
                if ($("#user_username").val() === "") {
                    $("#validUsername").removeClass("invisible");
                } else {
                    $("#validUsername").addClass("invisible");
                }
            });
            $("#user_password").keyup(function () {
                if ($("#user_password").val() === "") {
                    $("#validPassword").removeClass("invisible");
                } else {
                    $("#validPassword").addClass("invisible");
                }
            });
            $("#user_repassword").keyup(function () {
                if ($("#user_repassword").val() === "") {
                    $("#validRepassword").removeClass("invisible");
                } else {
                    $("#validRepassword").addClass("invisible");
                }
            });
            $("#user_email").keyup(function () {
                if ($("#user_email").val() === "") {
                    $("#validEmail").removeClass("invisible");
                } else {
                    $("#validEmail").addClass("invisible");
                }
            });
            $("#user_phonenumber").keyup(function () {
                if ($("#user_phonenumber").val() === "") {
                    $("#validPhone").removeClass("invisible");
                } else {
                    $("#validPhone").addClass("invisible");
                }
            });
            $("#user_firstname").keyup(function () {
                if ($("#user_firstname").val() === "") {
                    $("#validFirst").removeClass("invisible");
                } else {
                    $("#validFirst").addClass("invisible");
                }
            });
            $("#user_lastname").keyup(function () {
                if ($("#user_lastname").val() === "") {
                    $("#validLast").removeClass("invisible");
                } else {
                    $("#validLast").addClass("invisible");
                }
            });
            $("input[name='user_gender'").click(function () {
                if ($("#gender1").is(":checked") || $("#gender2").is(":checked") || $("#gender3").is(":checked")) {
                    $("#validGender").addClass("invisible");
                } else {
                    $("#validGender").removeClass("invisible");
                }
            });
            $("#user_address").keyup(function () {
                if ($("#user_address").val() === "") {
                    $("#validAddress").removeClass("invisible");
                } else {
                    $("#validAddress").addClass("invisible");
                }
            });
            $("#login_username").keyup(function () {
                if ($("login_username").val() === "") {
                    $("#validLoginUsername").removeClass("invisible");
                } else {
                    $("#validLoginUsername").addClass("invisible");
                }
            });
            $("#login_password").keyup(function () {
                if ($("login_password").val() === "") {
                    $("#validLoginPassword").removeClass("invisible");
                } else {
                    $("#validLoginPassword").addClass("invisible");
                }
            });
            $("#userRegisterModal").on("hide.bs.modal", function () {
                $("#userRegisterForm").trigger("reset");
            });
            $("#userLoginModal").on("hide.bs.modal", function () {
                $("#userLoginForm").trigger("reset");
            });
        });
    </script>
</body>
</html>
