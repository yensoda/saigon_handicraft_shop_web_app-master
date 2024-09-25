<?php
require_once 'header.php';
require_once 'OrderRepository.php';

$orderRepository = new OrderRepository();
$orders = $orderRepository->getAllOrdersByIdUser($_SESSION['user_account_id']);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 border-bottom mt-1 text-center">
            <h4>DANH SÁCH ĐƠN HÀNG ĐÃ ĐẶT</h4>
        </div>
        <div class="col-11">
            <?php while ($order = mysqli_fetch_assoc($orders)) : ?>
                <div class="container m-5 bg-light p-2">
                    <div class="row">
                        <div class="col-6">
                            <p>Họ và tên người mua: <span class="font-weight-bold"><?= $order['user_order_buyer_name'] ?></span></p>
                        </div>
                        <div class="col-6">
                            <p>Số điện thoại: <span class="font-weight-bold"><?= $order['user_order_phonenumber'] ?></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Email: <span class="font-weight-bold"><?= $order['user_order_email'] ?></span></p>
                        </div>
                        <div class="col-6">
                            <p>Địa chỉ nhận hàng: <span class="font-weight-bold"><?= $order['user_order_address'] ?></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Thời gian đặt hàng: <span class="font-weight-bold"><?= $order['order_time'] ?></span></p>
                        </div>
                        <div class="col-6">
                            <p>Mã đơn hàng: <span class="font-weight-bold"><?= $order['user_order_id'] ?></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 d-inline">
                            <p class="d-inline">Trạng thái đơn hàng: </p>
                            <?php if ($order['is_delivered']) : ?>
                                <p class="d-inline font-weight-bold text-success">Đã giao hàng</p>
                            <?php elseif (!$order['is_processed']) : ?>
                                <p class="d-inline font-weight-bold text-warning">Đang được xử lý</p>
                            <?php else : ?>
                                <p class="d-inline font-weight-bold text-primary">Đang trên đường giao</p>
                            <?php endif; ?>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-primary" href="order_details.php?order_id=<?= $order['user_order_id'] ?>">Xem sản phẩm</a>
                            <?php if (!$order['is_delivered'] && !$order['is_processed']) : ?>
                                <button id="<?= $order['user_order_id'] ?>" class="btn btn-danger" onclick="confirmCancel('<?= $order['user_order_id'] ?>')">Hủy đơn hàng</button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div id="<?= $order['user_order_id'] ?>-row" class="row mt-3 invisible">
                        <div class="col-12 d-inline text-right">
                            <p class="d-inline">Bạn có chắc muốn hủy đơn hàng?</p>
                            <a class="btn btn-primary" href="cancel_order.php?order_id=<?= $order['user_order_id'] ?>">Tôi chắc chắn</a>
                            <button class="btn btn-secondary" onclick="notCancel('<?= $order['user_order_id'] ?>')">Không</button>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="col-1"></div>
    </div>
</div>

<script>
    function confirmCancel(id) {
        document.getElementById(id + '-row').classList.remove('invisible');
    }

    function notCancel(id) {
        document.getElementById(id + '-row').classList.add('invisible');
    }
</script>

<?php require_once 'footer.php'; ?>
