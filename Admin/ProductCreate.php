<?php 
session_start();
require_once "header.php"; 
require_once "ProductRepository.php";
$productRepository = new ProductRepository();
$categories = $productRepository->getAllCategories();
$productCreateSucceed = isset($_SESSION["productCreateSucceed"]) ? $_SESSION["productCreateSucceed"] : null;
unset($_SESSION["productCreateSucceed"]); // Xóa thông báo thành công sau khi sử dụng

?>

<form method="post" action="process_create_product.php" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center p-3 m-3 border-bottom">
                <h4>TẠO SẢN PHẨM</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="form">
                    <div class="form-group">
                        <label>Danh mục sản phẩm</label>
                        <select name="category_id" class="form-control">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['product_category_id']; ?>"><?php echo $category['product_category_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input name="product_name" class="form-control" type="text" required />
                    </div>
                    <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea name="product_description" class="form-control" style="height: 250px" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input name="product_thumbnail" class="form-control" type="file" required />
                    </div>
                    <div class="form-group">
                        <label>Ảnh chi tiết</label>
                        <input name="img_1" class="form-control-file" type="file" />
                        <input name="img_2" class="form-control-file" type="file" />
                        <input name="img_3" class="form-control-file" type="file" />
                        <input name="img_4" class="form-control-file" type="file" />
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input name="product_price" class="form-control" type="number" min="0" value="0" />
                    </div>
                    <div class="form-group">
                        <label>Giảm giá</label>
                        <input name="product_discount" class="form-control" type="number" min="0" value="0" />
                    </div>
                    <div class="form-group">
                        <label>Số lượng hàng tồn</label>
                        <input name="product_inventory" class="form-control" type="number" min="0" value="0" />
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
                        <input class="btn btn-success" type="submit" value="Tạo" />
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</form>

<?php if ($productCreateSucceed): ?>
    <div class="modal fade show" role="dialog" data-toggle="modal" id="productSucceedModal" aria-labelledby="productSucceedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông báo</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-success">Tạo sản phẩm thành công.</p>
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
            $("#productSucceedModal").modal("show");
        });
    </script>
<?php endif; ?>

<?php require_once "footer.php"; ?>
