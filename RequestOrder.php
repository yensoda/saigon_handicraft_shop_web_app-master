<?php
require_once "header.php";
require 'connect.php';

$cartItems = [];
$total_amount = 0;
$total_price = 0;

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $productIds = implode(',', array_map('intval', $_SESSION['cart']));
    $result = mysqli_query($conn, "SELECT * FROM product WHERE product_id IN ($productIds)");

    while ($row = mysqli_fetch_assoc($result)) {
        $row['order_product_amount'] = isset($_SESSION['cart_quantities'][$row['product_id']]) ? $_SESSION['cart_quantities'][$row['product_id']] : 1;
        $total_amount += $row['order_product_amount'];
        $total_price += ($row['product_price'] - $row['product_discount']) * $row['order_product_amount'];
        $cartItems[] = $row;
    }
}
?>



<div class="row">
    <div class="col-1"></div>
    <div class="col-11 border-top border-left border-right" style="min-height: 1000px">
        <div class="container-fluid">
            <form action="place_order.php" method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="container-fluid">
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <td colspan="7" class="text-center">
                                                <h5>XÁC NHẬN ĐƠN HÀNG</h5>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center align-middle">
                                            <td>Mã sản phẩm</td>
                                            <td>Tên sản phẩm</td>
                                            <td>Hình ảnh minh họa</td>
                                            <td>Giá sản phẩm</td>
                                            <td>Giảm giá</td>
                                            <td>Số lượng đặt</td>
                                            <td>Thành tiền</td>
                                        </tr>
                                        <?php foreach ($cartItems as $icp): ?>
                                        <tr class="text-center">
                                            <td><?php echo $icp['product_id']; ?></td>
                                            <td><?php echo $icp['product_name']; ?></td>
                                            <td><img style="width: 180px; height: 120px" src="Images/<?php echo $icp['product_thumbnail_image']; ?>"/></td>
                                            <td><?php echo number_format($icp['product_price'], 0, ',', '.') . " VND"; ?></td>
                                            <td><?php echo number_format($icp['product_discount'], 0, ',', '.') . " VND"; ?></td>
                                            <td>
                                                <input type="hidden" name="product_ids[]" value="<?php echo $icp['product_id']; ?>">
                                                <input type="hidden" name="quantities[]" value="<?php echo $icp['order_product_amount']; ?>">
                                                <?php echo $icp['order_product_amount']; ?>
                                            </td>
                                            <td><?php echo number_format(($icp['product_price'] - $icp['product_discount']) * $icp['order_product_amount'], 0, ',', '.') . " VND"; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-1 pt-3 border-top">
                    <div class="col-7">
                        <div class="form mt-0">
                            <?php if(isset($_COOKIE['user_username'])) {
                                $user = Auth::findOneByUsernameAndPassword($_COOKIE['user_username'], $_COOKIE['user_password']);
                            ?>
                                <div class="form-group">
                                    <label>Họ và tên người mua</label>
                                    <input class="form-control" name="Order_owner_name" type="text" required value="<?php echo $user['user_lastname'] . " " . $user['user_firstname']; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input class="form-control" name="Order_owner_phone" type="text" required value="<?php echo $user['user_phonenumber']; ?>" minlength="10"/>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="Order_owner_email" type="email" value="<?php echo $user['user_email']; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ nhận hàng</label>
                                    <input class="form-control" name="Order_owner_address" required value="<?php echo $user['user_address']; ?>"/>
                                </div>
                            <?php } else { ?>
                                <div class="form-group">
                                    <label>Họ và tên người mua</label>
                                    <input class="form-control" name="Order_owner_name" type="text" required />
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input class="form-control" name="Order_owner_phone" type="text" required minlength="10"/>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="Order_owner_email" type="email" />
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ nhận hàng</label>
                                    <input class="form-control" name="Order_owner_address" required />
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-5 d-inline">
                        <p>Tổng số lượng hàng: <?php echo $total_amount; ?></p>
                        <p>Tổng thành tiền: <?php echo number_format($total_price, 0, ',', '.') . " VND"; ?></p>
                        <input type="submit" class="btn btn-success" value="Xác nhận đơn hàng"/>
                        <a class="btn btn-danger" href="cart.php">Hủy</a>
                    </div>
                </div>
            </form>
        </div>
        <?php require_once "footer.php"; ?>
