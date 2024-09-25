<?php
require_once("auth.php");
$checkCookiee = Auth::loginWithCookie();
if($checkCookiee != null){
    if(isset($checkCookiee['user_username']) && $checkCookiee['user_username'] == 'kietmeme'){
        echo '<a href="admin/production/index.php">TRUY CẬP TRANG ADMIN</a>';
    }
    if(isset($checkCookiee['user_username'])){
        echo '<a href="#">'.$checkCookiee['user_username'].'</a>';
    }
    echo '<a href="backend/logoutCookie.php">Đăng Xuất</a>';
}
else{
    echo '<a href="login.php" class="btn btn-outline-dark" style="width: 115px">Đăng nhập</a>
	<a href="resigter.php" class="btn btn-outline-dark" style="width: 115px">Đăng ký</a>';
}
?>
