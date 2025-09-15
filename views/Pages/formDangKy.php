<title>Đăng Ký Tài Khoản</title>
<div class="shadow p-3">
    <div class="row text-center">
        <h3>Đăng Ký Tài Khoản</h3>
    </div>
    <form action="./?act=post-dang-ky" method="POST" enctype="multipart/form-data">
        <div class="form-floating my-4">
            <input type="text" name="name" class="form-control form-input" placeholder="">
            <label for="name">Tên</label>
        </div>
        <div class="form-floating my-4">
            <input type="text" name="so_dien_thoai" class="form-control form-input" placeholder="">
            <label for="phone">Số Điện Thoại</label>
        </div>
        <div class="form-floating my-4">
            <input type="password" name="password" class="form-control form-input" placeholder="">
            <label for="password">Mật Khẩu</label>
        </div>
        <div class="form-floating my-4">
            <input type="password" name="password_confirm" class="form-control form-input" placeholder="">
            <label for="password_confirm">Xác Nhận Mật Khẩu</label>
        </div>
        <div class="form-floating my-4">
            <input type="text" name="dia_chi" class="form-control form-input" placeholder="">
            <label for="dia_chi">Địa Chỉ</label>
        </div>
        <div class="text-center">
            <input type="submit" value="Lưu" class="btn btn-primary">
            <a href="./"><input type="button" value="Hủy" class="btn btn-secondary"></a>
        </div>
    </form>
</div>