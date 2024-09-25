<?php
    require_once("../connect.php");
    $orderId = $_GET['orderId'];
    $stmt = mysqli_prepare($conn, "SELECT * FROM user_order_product WHERE user_order_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $orderId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
?>

<div class="modal fade" role="dialog" id="orderDetailsModal" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Các mặt hàng đã đặt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng đặt</th>
                                    </tr>
                                </thead>
                                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['order_product_amount']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Thoát</button>
            </div>
        </div>
    </div>
</div>
