<?php 
require_once "header.php"; 
require_once "../ProductRepository.php";

$productRepository = new ProductRepository();

$category_id = isset($_GET['id']) ? $_GET['id'] : null;

$listProducts = $category_id ? $productRepository->getAllProductsByCategory($category_id) : $productRepository->getAll(0);


?>

<div class="container-fluid m-0 p-0">
    <div class="row">
        <div class="col-12 text-center">
            <h4>DANH SÁCH SẢN PHẨM</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="container-fluid">
                <table class="table">
                    <thead class="bg-light text-center">
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượt mua</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listProducts as $product): ?>
                            <tr>
                                <td class="text-center"><?php echo htmlspecialchars($product['product_id']); ?></td>
                                <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                                <td><?php echo htmlspecialchars($product['product_price']); ?></td>
                                <td><?php echo htmlspecialchars($product['product_bought_count']); ?></td>
                                <td class="text-center">
                                    <a class="btn btn-success" href="ProductEdit.php?id=<?php echo $product['product_id']; ?>">Sửa</a>
                                    <a href="deleteProduct.php?id=<?php echo $product['product_id']; ?>"><button class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?');">Xóa</button></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once "footer.php"; ?>
