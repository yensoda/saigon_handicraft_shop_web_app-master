<?php
session_start();
	require_once("backend/auth.php");
	require_once("user_account.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link href="Contents/css/bootstrap.min.css" rel="stylesheet" />
    <link href="fontawesome-free-kit/css/all.min.css" rel="stylesheet" />
    <script src="fontawesome-free-kit/js/all.min.js"></script>
    <script src="Scripts/js/jquery-3.3.1.min.js"></script>
    <script src="Scripts/js/bootstrap.min.js"></script>
</head>
	
<body>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đăng nhập</h5>
            </div>
            <form class="signin-form"  method="post">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Tên đăng nhập</label>
                                    <input id="login_username" name="user_username" class="form-control" type="text" required/>
                                    <p id="validLoginUsername" class="text-danger">Vui lòng nhập tên đăng nhập</p>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input id="login_password" name="user_password" class="form-control" type="password" required/>
                                    <p id="validLoginPassword" class="text-danger">Vui lòng nhập mật khẩu</p>
                                </div>
                                <div class="form-group form-check">
                                    <input class="form-check-input" type="checkbox" />
                                    <label for="user_rememberpassword">Ghi nhớ mật khẩu?</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-success" type="submit" name = "submit">Đăng nhập</button>
                    <button class="btn btn-outline-danger" type="button" data-dismiss="modal">Thoát</button>
                </div>
            </form>
        </div>
    </div>
</div>
	<?php
		if(isset($_POST['submit'])){
			$run = Auth::login($_POST['user_username'],$_POST['user_password']);
			if($run)
				header("Location: layout.php");
			else
				echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác');
				window.location.href='login.php';</script>";
		}
	?>


</body>
</html>