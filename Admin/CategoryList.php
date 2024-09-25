<?php
require_once '../connect.php';

$sql = "SELECT pc.product_category_id, pc.product_category_name, COUNT(p.product_id) AS product_count
        FROM product_category pc
        LEFT JOIN product p ON pc.product_category_id = p.product_category_id
        GROUP BY pc.product_category_id, pc.product_category_name";
$result = mysqli_query($conn, $sql);

$categories = [];
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}

mysqli_free_result($result);
mysqli_close($conn);

require_once 'header.php';
?>

<div class="container-fluid m-0 p-0">
    <div class="row">
        <div class="col-12 text-center">
            <h4>DANH SÁCH DANH MỤC SẢN PHẨM</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="container-fluid">
                <table class="table">
                    <thead class="bg-light text-center">
                        <tr>
                            <th>Mã danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Số lượng sản phẩm</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td class="text-center"><?php echo htmlspecialchars($category['product_category_id']); ?></td>
                                <td><?php echo htmlspecialchars($category['product_category_name']); ?></td>
                                <td class="text-center"><?php echo htmlspecialchars($category['product_count']); ?></td>
                                <td class="text-center">
                                    <a class="btn btn-primary" href="ProductList.php?id=<?php echo $category['product_category_id']; ?>">Danh sách sản phẩm</a>
                                    <a class="btn btn-success" href="CategoryEdit.php?id=<?php echo $category['product_category_id']; ?>">Sửa</a>
                                    <button class="btn btn-danger" onclick="confirmDelete('<?php echo $category['product_category_id']; ?>')">Xóa</button>
                                </td>
                            </tr>
                            <tr id="<?php echo $category['product_category_id']; ?>" class="border-0 hiddenComp">
                                <td colspan="4">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 text-right">
                                                <p class="d-inline">Bạn có chắc muốn xóa?</p>
                                                <a class="btn btn-primary" href="CategoryDelete.php?id=<?php echo $category['product_category_id']; ?>">Chắc chắn</a>
                                                <button class="btn btn-secondary" onclick="noDelete('<?php echo $category['product_category_id']; ?>')">Không</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        document.getElementById(id).classList.remove("hiddenComp");
    }
    function noDelete(id) {
        document.getElementById(id).classList.add("hiddenComp");
    }
</script>

<style>
.hiddenComp {
    display: none;
}
</style>

<?php require_once 'footer.php'; ?>
