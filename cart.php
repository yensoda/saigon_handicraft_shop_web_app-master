
<?php
require_once "header.php";

$cartItems = [];
$total_amount = 0;
$total_price = 0;

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $productIds = implode(',', array_map('intval', $_SESSION['cart']));
    $result = mysqli_query($conn, "SELECT * FROM product WHERE product_id IN ($productIds)");

    while ($row = mysqli_fetch_assoc($result)) {
        $row['order_product_amount'] = isset($_SESSION['cart_quantities'][$row['product_id']]) ? $_SESSION['cart_quantities'][$row['product_id']] : 1;
        $total_amount += $row['order_product_amount'];
        $total_price += ($row['product_price'] - $row['product_discount']) * $row['order_product_amount'];
        $cartItems[] = $row;
    }
	
	$_SESSION['total_price'] = $total_price;
}
?>
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-10 border-top border-left border-right" style="min-height: 1000px">
					
     <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="container-fluid">
                    <div class="row">
                        <form action="update_cart.php" method="post">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            <h5>DANH SÁCH SẢN PHẨM TRONG GIỎ HÀNG</h5>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center align-middle">
                                        <td>Mã sản phẩm</td>
                                        <td>Tên sản phẩm</td>
                                        <td>Hình ảnh minh họa</td>
                                        <td>Giá sản phẩm</td>
                                        <td>Giảm giá</td>
                                        <td>Số lượng đặt</td>
                                        <td>Thành tiền</td>
                                        <td>Hành động</td>
                                    </tr>
                                    <?php if (!empty($cartItems)): ?>
                                        <?php foreach ($cartItems as $icp): ?>
                                            <tr class="text-center">
                                                <td><?php echo $icp['product_id']; ?></td>
                                                <td><?php echo $icp['product_name']; ?></td>
                                                <td><img style="width: 180px; height: 120px" src="Images/<?php echo $icp['product_thumbnail_image']; ?>"/></td>
                                                <td><?php echo number_format($icp['product_price'], 0, ',', '.') . " VND"; ?></td>
                                                <td><?php echo number_format($icp['product_discount'], 0, ',', '.') . " VND"; ?></td>
                                                <td>
                                                    <input min="1" max="<?php echo $icp['product_inventory']; ?>" name="quantity[<?php echo $icp['product_id']; ?>]" class="text-center w-100" type="number" value="<?php echo $icp['order_product_amount']; ?>" />
                                                </td>
                                                <td><?php echo number_format(($icp['product_price'] - $icp['product_discount']) * $icp['order_product_amount'], 0, ',', '.') . " VND"; ?></td>
                                                <td><a class="btn btn-danger" href="delete_from_cart.php?id=<?php echo $icp['product_id']; ?>">Xóa</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="text-center">Giỏ hàng của bạn đang trống.</td>
                                        </tr>
                                        <script>
                                            document.getElementById('submitCart').classList.add('disabled');
                                            document.getElementById('editCart').disabled = true;
                                        </script>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <div class="row mt-1 pt-3 border-top">
                                <div class="col-7"></div>
                                <div class="col-5 d-inline">
                                    <p>Tổng số lượng hàng: <?php echo $total_amount; ?></p>
                                    <p>Tổng thành tiền: <?php echo number_format($total_price, 0, ',', '.') . " VND"; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-7"></div>
                                <div class="col-5 d-inline">
                                    <button class="btn btn-danger" type="button" onclick="location.href='delete_cart.php'">Hủy giỏ hàng</button>
                                    <button name="editCart" class="btn btn-primary" type="submit">Cập nhật</button>
                                    <a id="submitCart" href="RequestOrder.php" class="btn btn-success">Tiến hành đặt hàng</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
if (!isset($_POST['editCart']) ){
require_once("UserOrderProductRepository.php");

$user_account_id = $user['user_account_id']; 
$userOrderProductRepository = new UserOrderProductRepository();
$user_order_id = $userOrderProductRepository->getUserOrderId($user_account_id );

if (!empty($user_order_id)) {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'product_') !== false) {
            $productId = substr($key, strlen('product_'));
            $newQuantity = intval($value);
            $userOrderProductRepository->updateOrderProductAmount($user_order_id, $productId, $newQuantity);
        }
    }
}

exit();
}
?>
					
				</div>
			<div class="col-2">
						
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



