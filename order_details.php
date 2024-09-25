<?php
require_once 'header.php';
require_once 'OrderRepository.php';

$orderId = $_GET['order_id'];
$orderRepository = new OrderRepository();
$orderDetails = $orderRepository->getOrderDetails($orderId);
?>

<div class="modal fade show" role="dialog" data-toggle="modal" id="orderDetailsModal" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Các mặt hàng đã đặt</h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng đặt</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($item = mysqli_fetch_assoc($orderDetails)) : ?>
                                    <tr>
                                        <td class="text-center"><?= $item['product_id'] ?></td>
                                        <td><?= $item['product_name'] ?></td>
                                        <td class="text-center"><?= $item['order_product_amount'] ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>                
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-dismiss="modal">Thoát</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#orderDetailsModal").modal("show");
    });
</script>

<?php require_once 'footer.php'; ?>
