<title>Cập nhật</title>
<div class="shadow p-3">
    <div class="row text-center">
        <h3>Cập Nhật Thông Tin</h3>
    </div>
    <form action="./?act=post-update-user" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <div class="form-floating my-4">
            <input type="text" name="name" class="form-control form-input" placeholder="" value="<?php echo $user['ten']; ?>">
            <label for="name">Tên</label>
        </div>
        <div class="form-floating my-4">
            <input type="text" name="so_dien_thoai" class="form-control form-input" placeholder="" value="<?php echo $user['so_dien_thoai']; ?>">
            <label for="phone">Số Điện Thoại</label>
        </div>
        <div class="form-floating my-4">
            <input type="password" name="password" class="form-control form-input" placeholder="" value="<?php echo $user['password']; ?>">
            <label for="password">Mật Khẩu</label>
        </div>
        <div class="form-floating my-4">
            <input type="password" name="password_confirm" class="form-control form-input" placeholder="" value="<?php echo $user['password']; ?>">
            <label for="password_confirm">Xác Nhận Mật Khẩu</label>
        </div>
        <div class="form-floating my-4">
            <input type="text" name="dia_chi" class="form-control form-input" placeholder="" value="<?php echo $user['dia_chi']; ?>">
            <label for="dia_chi">Địa Chỉ</label>
        </div>
        <div class="text-center">
            <input type="submit" value="Lưu" class="btn btn-primary">
            <a href="./"><input type="button" value="Hủy" class="btn btn-secondary"></a>
        </div>
    </form>
</div>