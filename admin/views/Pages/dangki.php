<title>Thêm người quản lý</title>
<div class="p-3">
    <div class="row text-center">
        <h3>Thêm Người Quản lý</h3>
    </div>
    <form action="./?act=post-add-admin" method="POST" enctype="multipart/form-data">
        <div class="form-floating my-4">
            <input type="text" name="name" class="required form-control form-input" placeholder="">
            <label for="ten">Tên</label>
        </div>
        <div class="form-floating my-4">
            <input type="email" name="email" class="required form-control form-input" placeholder="">
            <label for="email">Địa Chỉ Mail</label>
        </div>
        <div class="form-floating my-4">
            <input type="password" id="password" name="password" class="required form-control form-input" placeholder="">
            <label for="password">Mật Khẩu</label>
            <div class="invalid-feedback"></div>
            <div id="eye" class="eye position-absolute top-0 end-0 mx-2"><i class="fa fa-eye"></i></div>
        </div>
        <div class="form-floating my-4">
            <input type="password" id="password_confirm" name="password_confirm" class="required form-control form-input" placeholder="">
            <label for="password_confirm">Xác Nhận Mật Khẩu</label>
            <div class="invalid-feedback"></div>
            <div id="eye" class="eye position-absolute top-0 end-0 mx-2"><i class="fa fa-eye"></i></div>
        </div>
        <div class="form-floating my-4">
            <input type="text" name="so_dien_thoai" class="form-control form-input" placeholder="">
            <label for="phone">Số Điện Thoại</label>
        </div>
        <div class="form-floating my-4">
            <input type="text" name="dia_chi" class="form-control form-input" placeholder="">
            <label for="dia_chi">Địa Chỉ</label>
        </div>
        <div class="form-floating my-4 pt-2">
            <input type="file" name="hinhanh" class="form-control form-input" placeholder="">
            <label for="hinhanh" class="bg-transparent">Hình Ảnh</label>
        </div>
        <div class="text-center">
            <input type="submit" value="Lưu" class="btn btn-primary">
            <a href="./?act=quanly"><input type="button" value="Hủy" class="btn btn-secondary"></a>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        ShowHidePassword();
        CheckOnChage();
        ValidateSubmit();
        ConfirmPassword('#password', '#password_confirm');
    });
</script>