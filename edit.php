<?php require_once "header.php"; ?>
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-10 border-top border-left border-right" style="min-height: 1000px">
				
					<form method="post" action="edit.php">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center p-3 m-3 border-bottom">
                <h4>TÀI KHOẢN CỦA BẠN</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6">
                <div class="form">
                    <div class="form-group">
                        <label>ID tài khoản</label>
                        <input name="user_account_id" class="form-control" value="<?php echo "" .
                            $user["user_account_id"] .
                            ""; ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label>Tên tài khoản</label>
                        <input id="user_username" name="user_username" class="form-control" type="text" required minlength="8" value="<?php echo "" .
                            $user["user_username"] .
                            ""; ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label>Tên</label>
                        <input id="user_firstname" name="user_firstname" class="form-control" type="text" value="<?php echo "" .
                            $user["user_firstname"] .
                            ""; ?>" required />
                        <label>Họ và tên đệm</label>
                        <input id="user_lastname" name="user_lastname" class="form-control" type="text" value="<?php echo "" .
                            $user["user_lastname"] .
                            ""; ?>" required />
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <select id="slt" name="user_gender" class="form-control">
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input id="user_address" name="user_address" class="form-control" type="text" required value="<?php echo "" .
                            $user["user_address"] .
                            ""; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input id="user_phonenumber" name="user_phonenumber" class="form-control" type="tel" required minlength="10" value="<?php echo "" .
                            $user["user_phonenumber"] .
                            ""; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input id="user_email" name="user_email" class="form-control" type="email" required value="<?php echo "" .
                            $user["user_email"] .
                            ""; ?>" />
                    </div>
                </div>
            </div>
            <div class="col-3">

            </div>
        </div>
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12 text-center d-inline">
                        <input class="btn btn-success" type="submit" value="Lưu thay đổi" />
                        <a class="btn btn-warning" href="~/User/ChangePassword">Đổi mật khẩu</a>
                    </div>
                </div>
            </div>
            <div class="col-3">

            </div>
        </div>
    </div>
</form>

<script>

    $(document).ready(function () {
        var selected = $('#slt option[value="<?php echo $user[
            "user_gender"
        ]; ?>"]');
        if (selected.length > 0) {
            selected.attr("selected", "selected");
        } else {
            $('#slt option[value="Khác"]').attr("selected", "selected");
        }
    });
</script>

<?php if (isset($viewBag["editSucceed"])): ?>
    <div class="modal fade show" role="dialog" data-toggle="modal" id="editSucceedSucceedModal" aria-labelledby="editSucceedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông báo</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-success"><?php echo $viewBag[
                                    "editSucceed"
                                ]; ?></p>
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
            $("#editSucceedSucceedModal").modal("show");
        });
    </script>
<?php endif; ?>
<script>
    $(document).ready(function () {
        $("#editSucceedSucceedModal").modal("show");
    });
</script>
				<div class="row pl-2">
					
            	</div>
				<div class="row">
        <div class="col-12">
			
        </div>
		    </div>
		
        	</div>
					
		</div>
        <?php require_once "footer.php"; ?>
