<div class="container-fluid mt-3 mb-3">
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
                <p class="m-0">© Copyright <?php echo date("Y"); ?> SaiGon Handicraft Shop - All Rights Reserved.
                </p>
                <p class="m-0">Địa chỉ: 189 - 197, Dương Bá Trạc, Phường 1, Quận 8, TP. Hồ Chí Minh | MST:
                    XXXXXXXXXX</p>
                <p class="m-0">Website designed by HuynhTanKiet</p>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#loadUserRegisterModal').click(function() {
            $.ajax({
                url: 'get_user_register_modal.php',
                type: 'GET',
                success: function(response) {
                    $('#userRegisterModalContent').html(response);
                    $('#userRegisterModal').modal('show'); // Hiển thị modal sau khi nạp nội dung thành công
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error); // Log lỗi nếu có
                }
            });
        });
    });
</script>

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
            } else
