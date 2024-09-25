<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link href="Contents/css/bootstrap.min.css" rel="stylesheet" />
    <link href="fontawesome-free-kit/css/all.min.css" rel="stylesheet" />
    <script src="fontawesome-free-kit/js/all.min.js"></script>
    <script src="Scripts/js/jquery-3.3.1.min.js"></script>
    <script src="Scripts/js/bootstrap.min.js"></script>
</head>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đăng ký</h5>
            </div>
            <form id="userRegisterForm" method="post" action="" autocomplete="off">
                <div class="modal-body">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Tên đăng nhập</label>
                                    <input id="user_username" name="user_username" class="form-control" type="text" required minlength="8"/>
                                    <p id="validUsername" class="text-danger" style="font-size: 14px">Vui lòng nhập tên đăng nhập</p>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input id="user_password" name="user_password" class="form-control" type="password" required minlength="8"/>
                                    <p id="validPassword" class="text-danger" style="font-size: 14px">Vui lòng nhập mật khẩu</p>
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input id="user_repassword" name="user_repassword" class="form-control" type="password" required minlength="8"/>
                                    <p id="validRepassword" class="text-danger" style="font-size: 14px">Vui lòng nhập lại mật khẩu</p>
                                </div>
                                <div class="form-group">
                                    <label>Giới tính</label>
                                    <br />
                                    <div class="container-fluid">
                                       <div class="row">
											<div class="col-4 text-center">
												<input type="radio" id="gender1" name="user_gender" value="Nam" required>
												<label for="gender1" class="form-check-label">Nam</label>
											</div>
											<div class="col-4 text-center">
												<input type="radio" id="gender2" name="user_gender" value="Nữ" required>
												<label for="gender2" class="form-check-label">Nữ</label>
											</div>
											<div class="col-4 text-center">
												<input type="radio" id="gender3" name="user_gender" value="Khác" required>
												<label for="gender3" class="form-check-label">Khác</label>
											</div>
										</div>
                                        <div class="row">
                                            <p id="validGender" class="text-danger" style="font-size: 14px" >Vui lòng chọn giới tính</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="user_email" name="user_email" class="form-control" type="email" required/>
                                    <p id="validEmail" class="text-danger" style="font-size: 14px">Vui lòng nhập Email</p>
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input id="user_phonenumber" name="user_phonenumber" class="form-control" type="tel" required minlength="10"/>
                                    <p id="validPhone" class="text-danger" style="font-size: 14px">Vui lòng nhập số điện thoại</p>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input id="user_address" name="user_address" class="form-control" type="text" required/>
                                    <p id="validAddress" class="text-danger" style="font-size: 14px">Vui lòng nhập địa chỉ</p>
                                </div>
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input id="user_firstname" name="user_firstname" class="form-control" type="text" required/>
                                    <p id="validFirst" class="text-danger" style="font-size: 14px">Vui lòng nhập tên</p>
                                    <label>Họ và tên đệm</label>
                                    <input id="user_lastname" name="user_lastname" class="form-control" type="text" required/>
                                    <p id="validLast" class="text-danger" style="font-size: 14px">Vui lòng nhập họ và tên đệm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-success" type="submit">Đăng ký</button>
                    <button class="btn btn-outline-danger" type="button" data-dismiss="modal">Thoát</button>
                </div>
            </form>
        </div>
    </div>
	
</body>
</html>


