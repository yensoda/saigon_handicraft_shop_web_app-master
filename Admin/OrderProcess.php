<?php
require_once("../connect.php");
$sql = "SELECT * FROM user_order where is_processed = 0";
$result = mysqli_query($conn, $sql);
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
if(isset($_GET['confirmOrderId'])) {
    $orderId = $_GET['confirmOrderId'];
    $updateSql = "UPDATE user_order SET is_processed = 1 WHERE user_order_id = $orderId";
    mysqli_query($conn, $updateSql);
    header("Location: OrderProcess.php");
    exit();
}

?>

<?php require_once "header.php"; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 border-bottom mt-1 text-center">
            <h4>DANH SÁCH ĐƠN HÀNG CHỜ XÁC NHẬN</h4>
        </div>
        <div class="col-11">
            <?php foreach ($orders as $order): ?>
                <div class="container m-5 bg-light p-2">
                    <div class="row">
                        <div class="col-6">
                            <p>Họ và tên người mua: <span class="font-weight-bold"><?php echo $order['user_order_buyer_name']; ?></span></p>
                        </div>
                        <div class="col-6">
                            <p>Số điện thoại: <span class="font-weight-bold"><?php echo $order['user_order_phonenumber']; ?></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Email: <span class="font-weight-bold"><?php echo $order['user_order_email']; ?></span></p>
                        </div>
                        <div class="col-6">
                            <p>Địa chỉ nhận hàng: <span class="font-weight-bold"><?php echo $order['user_order_address']; ?></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Thời gian đặt hàng: <span class="font-weight-bold"><?php echo $order['order_time']; ?></span></p>
                        </div>
                        <div class="col-6">
                            <p>Mã đơn hàng: <span class="font-weight-bold"><?php echo $order['user_order_id']; ?></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 d-inline">
                            <p class="d-inline">Trạng thái đơn hàng: </p>
                            <?php if ($order['is_delivered']): ?>
                                <p class="d-inline font-weight-bold text-success">Đã giao hàng</p>
                            <?php elseif (!$order['is_processed']): ?>
                                <p class="d-inline font-weight-bold text-warning">Đang được xử lý</p>
                            <?php else: ?>
                                <p class="d-inline font-weight-bold text-primary">Đang trên đường giao</p>
                            <?php endif; ?>
                        </div>
                        <div class="col-6"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <p>Tổng giá trị đơn hàng: <span class="font-weight-bold"><?php echo number_format($order['order_total_value'], 0, ",", "."); ?> đ</span></p>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-primary m-1" href="OrderDetails.php?orderId=<?php echo $order['user_order_id']; ?>">Xem sản phẩm</a>
                            <a class="btn btn-success m-1" href="OrderProcess.php?confirmOrderId=<?php echo $order['user_order_id']; ?>">Xác nhận đơn hàng</a>
                            <button id="<?php echo $order['user_order_id']; ?>" class="btn btn-danger m-1" onclick="confirmCancel('<?php echo $order['user_order_id']; ?>')">Hủy đơn hàng</button>
                        </div>
                    </div>
                    <div id="<?php echo $order['user_order_id']; ?>-row" class="row mt-3 invisible">
                        <div class="col-12 d-inline text-right">
                            <p class="d-inline">Hủy đơn hàng này?</p>
                            <a class="btn btn-primary" href="OrderCancel.php?cancelOrderId=<?php echo $order['user_order_id']; ?>">Hủy</a>
                            <button class="btn btn-secondary" onclick="notCancel('<?php echo $order['user_order_id']; ?>')">Không</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-1"></div>
    </div>
</div>

<script>
    function confirmCancel(id) {
        $('#' + id + '-row').removeClass("invisible");
    }
    function notCancel(id) {
        $('#' + id + '-row').addClass("invisible");
    }
</script>

<?php require_once "footer.php"; ?>
