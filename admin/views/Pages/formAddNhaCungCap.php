<title>Thêm nhà cung cấp</title>
<div class="p-3">
    <div class="row text-center">
        <h3>Thêm Nhà Cung Cấp</h3>
    </div>
    <form action="./?act=post-add-nha-cung-cap" method="POST" enctype="multipart/form-data">
        <div class="form-floating my-4">
            <input type="text" name="ten" class="required form-control form-input" placeholder="">
            <label for="ten">Tên Nhà Cung Cấp</label>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-floating my-4">
            <input type="email" name="email" class="form-control form-input" placeholder="">
            <label for="email">Địa Chỉ Mail</label>
        </div>
        <div class="form-floating my-4">
            <input type="text" name="so_dien_thoai" class="form-control form-input" placeholder="">
            <label for="phone">Số Điện Thoại</label>
        </div>
        <div class="form-floating my-4">
            <input type="text" name="dia_chi" class="form-control form-input" placeholder="">
            <label for="dia_chi">Địa Chỉ</label>
        </div>
        <div class="text-center">
            <input type="submit" value="Lưu" class="btn btn-primary">
            <a href="./?act=nhacungcap"><input type="button" value="Hủy" class="btn btn-secondary"></a>
        </div>
    </form>
</div>
<script>
    $(document).ready(() => {
        CheckOnChage();
        ValidateSubmit();
    });
</script>