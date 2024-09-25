<?php
session_start();
require_once "header.php"; 
require_once "../ProductCategoryRepository.php";

if (!isset($_COOKIE['admin_username'])) {
    header("Location: Login.php");
    exit;
}

$categoryCreateSucceed = isset($_SESSION["categoryCreateSucceed"]) ? $_SESSION["categoryCreateSucceed"] : null;
unset($_SESSION["categoryCreateSucceed"]);

// Tạo một thể hiện của Repository
$categoryRepository = new ProductCategoryRepository();
?>

<form method="post" action="process_create_category.php">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center p-3 m-3 border-bottom">
                <h4>TẠO DANH MỤC SẢN PHẨM</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="form">
                    <div class="form-group">
                        <label>Tên danh mục sản phẩm</label>
                        <input name="category_name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả danh mục sản phẩm</label>
                        <textarea name="category_description" class="form-control" style="height: 250px"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12 text-center d-inline">
                        <input class="btn btn-success" type="submit" value="Tạo danh mục" />
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</form>

<?php if ($categoryCreateSucceed !== null): ?>
    <div class="modal fade show" role="dialog" data-toggle="modal" id="createSucceedModal" aria-labelledby="createSucceedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông báo</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <?php if ($categoryCreateSucceed): ?>
                                    <p class="text-success">Tạo danh mục thành công.</p>
                                <?php else: ?>
                                    <p class="text-danger">Đã xảy ra lỗi khi tạo danh mục.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-success" type="button" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#createSucceedModal").modal("show");
        });
    </script>
<?php endif; ?>

<?php require_once "footer.php"; ?>
