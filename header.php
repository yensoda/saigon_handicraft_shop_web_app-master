
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
                    <a class="btn btn-outline-warning" style="width: 115px" href="Orders.php"><i class="fa-solid fa-barcode"></i> Đơn hàng</a>
                    <a class="btn btn-outline-info" style="width: 115px" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
                    <a class="btn btn-outline-primary" style="width: 115px" href="edit.php"><i class="fa-solid fa-user"></i> Hồ sơ</a>
                    <a href="backend/logoutCookie.php"><button class="btn btn-outline-danger" style="width: 115px" type="button" data-toggle="modal" data-target="#logOutModal"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</button></a>
                <?php
                } else {
                    ?>
                    <a class="btn btn-outline-info" style="width: 115px" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
                        <a href="login.php"><button class="btn btn-outline-dark" type="button" style="width: 115px" data-toggle="modal" data-target="#userLoginModal">Đăng nhập</button></a>
                         <button class="btn btn-outline-dark" type="button" style="width: 115px" id="loadUserRegisterModal">Đăng ký</button>
						<?php require_once 'get_user_register_modal.php';?>
					<?php?>	
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