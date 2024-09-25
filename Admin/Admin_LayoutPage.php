<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title></title>
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