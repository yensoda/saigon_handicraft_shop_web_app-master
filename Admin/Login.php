<?php
	require_once("auth.php");
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
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-5">
            <form method="post">
                <div class="form-group">
                    <label>Admin username</label>
                    <input name="admin_username" class="form-control" type="text" required />
                </div>
                <div class="form-group">
                    <label>Admin password</label>
                    <input name="admin_password" class="form-control" type="password" required />
                </div>
                <div class="text-center">
                    <input class="btn btn-outline-success" type="submit" name = "submit" value="Login"/>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
		if(isset($_POST['submit'])){
			$run = Auth::login($_POST['admin_username'],$_POST['admin_password']);
			if($run)
				header("Location: index.php");
			else
				echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác');
				window.location.href='login.php';</script>";
		}
?>
