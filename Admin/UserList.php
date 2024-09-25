<?php require_once "header.php"; ?>
               <div class="container-fluid m-0 p-0">
    <div class="row">
        <div class="col-12 text-center">
            <h4>DANH SÁCH TÀI KHOẢN</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="container-fluid">
                <table class="table">
                    <thead class="bg-light text-center">
                        <tr>
                            <th>
                                Mã tài khoản
                            </th>
                            <th>
                                Tên người dùng
                            </th>
                            <th>
                                Họ và tên
                            </th>
                            <th>
                                Điểm tích lũy
                            </th>
                            <th>
                                Hành động
                            </th>
                        </tr>
                    </thead>
                    <tbody>
							<?php
require_once("UserAccountRepository.php");
$userAccountRepository = new UserAccountRepository();
$listUser = $userAccountRepository->getAllUser();
?>
<?php foreach($listUser as $User): ?>
    <tr>
        <td class="text-center">
            <?php echo $User['user_account_id']; ?>
        </td>
        <td>
            <?php echo $User['user_username']; ?>
        </td>
        <td class="text-center">
            <?php echo $User['user_lastname'] . " " . $User['user_firstname']; ?>
        </td>
        <td class="text-center">
            <?php echo $User['user_point']; ?>
        </td>
        <td class="text-center">
            <a class="btn btn-success" href="UserEdit.php?id=<?php echo $User['user_account_id']; ?>">Sửa</a>
            <a href="deleteUser.php?id=<?php echo $User['user_account_id']?>"> <button class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?');">Xóa</button></a>
        </td>
    </tr>
    <tr id="<?php echo $User['user_account_id']; ?>">
        <!-- Complete your HTML structure here -->
    </tr>
<?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once "footer.php"; ?>

