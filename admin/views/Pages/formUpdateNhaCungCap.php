<title>Cập nhật nhà cung cấp</title>
<div class="p-3">
    <div class="row text-center">
        <h3>Cập nhật Nhà Cung Cấp</h3>
    </div>
    <form action="./?act=post-update-nha-cung-cap" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $nhacc['id']; ?>">
        <div class="form-floating my-4">
            <input type="text" name="ten" class="required form-control form-input" placeholder="" value="<?php echo $nhacc['ten']; ?>">
            <label for="ten">Tên Nhà Cung Cấp</label>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-floating my-4">
            <input type="email" name="email" class="form-control form-input" placeholder="" value="<?php echo $nhacc['email']; ?>">
            <label for="email">Địa Chỉ Mail</label>
        </div>
        <div class="form-floating my-4">
            <input type="text" name="so_dien_thoai" class="form-control form-input" placeholder="" value="<?php echo $nhacc['so_dien_thoai']; ?>">
            <label for="phone">Số Điện Thoại</label>
        </div>
        <div class="form-floating my-4">
            <input type="text" name="dia_chi" class="form-control form-input" placeholder="" value="<?php echo $nhacc['dia_chi']; ?>">
            <label for="dia_chi">Địa Chỉ</label>
        </div>
        <div class="text-center">
            <input type="submit" value="Lưu" class="btn btn-primary">
            <input type="button" value="Hủy" class="btn btn-secondary">
        </div>
    </form>
</div>
<script>
    $(document).ready(() => {
        CheckOnChage();
        ValidateSubmit();
    });
</script>