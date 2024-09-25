<?php 
session_start();
require_once "header.php"; 
require_once "ProductRepository.php";

$productRepository = new ProductRepository();
$categories = $productRepository->getAllCategories();

$product_id = isset($_GET['id']) ? $_GET['id'] : null;
$product = $productRepository->getById($product_id);
$images = $productRepository->getProductImages($product_id);


$productEditSucceed = isset($_SESSION["productEditSucceed"]) ? $_SESSION["productEditSucceed"] : null;
unset($_SESSION["productEditSucceed"]);
?>

<form method="post" action="process_edit_product.php" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center p-3 m-3 border-bottom">
                <h4>CHỈNH SỬA SẢN PHẨM</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="form">
                    <div class="form-group">
                        <label>Mã sản phẩm</label>
                        <input name="product_id" class="form-control" value="<?php echo $product['product_id']; ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label>Danh mục sản phẩm</label>
                        <select id="slt" name="category_id" class="form-control">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['product_category_id']; ?>" <?php if ($category['product_category_id'] == $product['product_category_id']) echo "selected"; ?>><?php echo $category['product_category_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input name="product_name" class="form-control" value="<?php echo $product['product_name']; ?>" required />
                    </div>
                    <div class="form-group">
    <label>Mô tả sản phẩm</label>
    <textarea name="product_description" class="form-control" style="height: 250px" required><?php echo $product['product_description']; ?></textarea>
</div>
<div class="form-group">
    <label>Giá sản phẩm</label>
    <input name="product_price" class="form-control" type="number" min="0" step="any" required value="<?php echo $product['product_price']; ?>" />
</div>
<div class="form-group">
    <label>Giảm giá</label>
    <input name="product_discount" class="form-control" type="number" min="0" max="100" step="any" required value="<?php echo $product['product_discount']; ?>" />
</div>
<div class="form-group">
    <label>Số lượt mua</label>
    <input name="product_bought_count" class="form-control" type="number" min="0" required value="<?php echo $product['product_bought_count']; ?>" />
</div>
<div class="form-group">
    <label>Số lượng tồn kho</label>
    <input name="product_inventory" class="form-control" type="number" min="0" required value="<?php echo $product['product_inventory']; ?>" />
</div>
<div class="form-group">
    <label>Hình ảnh minh họa</label>
    <input name="product_thumbnail_image" class="form-control" type="text" required value="<?php echo $product['product_thumbnail_image']; ?>" />
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
                        <input class="btn btn-success" type="submit" value="Chỉnh sửa sản phẩm" />
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</form>

<?php if ($productEditSucceed): ?>
    <div class="modal fade show" role="dialog" data-toggle="modal" id="editSucceedModal" aria-labelledby="editSucceedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông báo</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-success">Chỉnh sửa sản phẩm thành công.</p>
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
            $("#editSucceedModal").modal("show");
        });
    </script>
<?php endif; ?>

<?php require_once "footer.php"; ?>
