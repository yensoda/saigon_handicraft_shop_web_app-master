<?php
require_once("UserAccountRepository.php");
 $userRepository = new UserAccountRepository(); 
 $userInfo = $userRepository->getUserById($_GET['id']);
?>
<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>@ViewBag.Title</title>
    <link href="../Contents/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../fontawesome-free-kit/css/all.min.css" rel="stylesheet" />
    <script src="../fontawesome-free-kit/js/all.min.js"></script>
    <script src="../Scripts/js/jquery-3.3.1.min.js"></script>
    <script src="../Scripts/js/bootstrap.min.js"></script>
    <style>
        .hiddenComp {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-5">

            </div>
            <div class="col-2">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <img class="img-fluid" src="../Assets/logo.png" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">

            </div>
        </div>
    </div>
    <div class="container-fluid p-0 border-top">
    <div class="row">
        <div class="col-12 text-right">
            <?php 
            if(isset($_COOKIE['admin_username'])) {
                echo '<p class="d-inline">Quản trị viên: ' . $_COOKIE['admin_username'] . '</p>';
                echo '<a class="btn btn-outline-danger m-1" href="Logout.php">Đăng xuất</a>';
            }
            ?>
        </div>
    </div>
</div>
    <div class="container-fluid border-top mb-5">
        <div class="row">
            <div class="col-3">
               
                <?php
					include("Sidebar.php")
				?>
            </div>
            <div class="col-8">
				<form method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center p-3 m-3 border-bottom">
                <h4>CHỈNH SỬA TÀI KHOẢN</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6">
                <div class="form">
                    <div class="form-group">
                        <label>ID tài khoản</label>
                        <input name="user_account_id" class="form-control" value="<?php echo $userInfo['user_account_id']?>" readonly />
                    </div>
                    <div class="form-group">
                        <label>Tên tài khoản</label>
                        <input id="user_username" name="user_username" class="form-control" type="text" required minlength="8" value="<?php echo $userInfo['user_username']?>" readonly />
                    </div>
                    <div class="form-group">
                        <label>Tên</label>
                        <input id="user_firstname" name="user_firstname" class="form-control" type="text" value="<?php echo $userInfo['user_firstname']?>" required />
                        <label>Họ và tên đệm</label>
                        <input id="user_lastname" name="user_lastname" class="form-control" type="text" value="<?php echo $userInfo['user_lastname']?>" required />
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <select id="slt" name="user_gender" class="form-control">
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input id="user_address" name="user_address" class="form-control" type="text" required value="<?php echo $userInfo['user_address']?>" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input id="user_phonenumber" name="user_phonenumber" class="form-control" type="text" required minlength="10" value="<?php echo $userInfo['user_phonenumber']?>" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input id="user_email" name="user_email" class="form-control" type="email" required value="<?php echo $userInfo['user_email']?>" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input id="user_password" name="user_password" class="form-control" type="password" required minlength="8" value="<?php echo $userInfo['user_password']?>" />
                    </div>
                </div>
            </div>
            <div class="col-3">

            </div>
        </div>
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12 text-center d-inline">
                         <button name="submit" type="submit" class="btn btn-primary">Cập Nhật</button>
<?php
    if(isset($_POST['submit'])){
        $id = $_GET['id']; // Lấy ID từ tham số truy vấn
        $firstname = $_POST['user_firstname'];
		$username = $_POST['user_username'];
        $lastname = $_POST['user_lastname'];
        $email = $_POST['user_email'];
        $phonenumber = $_POST['user_phonenumber'];
        $gender = $_POST['user_gender']; // Giả sử giới tính được lấy từ form
        $address = $_POST['user_address'];
        $password = $_POST['user_password']; // Bạn cần thêm trường này nếu muốn cập nhật mật khẩu
        $userRepository->updateById($id, $username, $password, $gender, $email, $phone, $address, $firstname, $lastname); // Gọi phương thức updateById() với các tham số tương ứng
        echo "<script>alert('Cập nhật thành công');window.location.href='UserList.php';</script>";
    }
?>
                    </div>	
                </div>
            </div>
            <div class="col-3">

            </div>
        </div>
    </div>
					

</form>
				

<script>

    $(document).ready(function () {
        var selected = $('#slt option[value="@Model.user_gender"]');
        if (selected.length > 0) {
            selected.attr("selected", "selected");
        } else {
            $('#slt option[value="Khác"').attr("selected", "selected");
        }
    });
</script>
<script>
    $(document).ready(function () {
        $("#editSucceedSucceedModal").modal("show");
    });
</script>
				
            </div>
            <div class="col-1">

            </div>
        </div>
    </div>
    <div class="container-fluid border-top border-bottom">
        <div class="row">
            <div class="col-12 text-center">
                <p class="lead" style="font-size:14px">Administrator page. Just for management purpose!</p>
                <p class="lead" style="font-size:14px">2024 - Designed by HuynhTanKiet</p>
            </div>
        </div>
    </div>
</body>
</html>
</script>


