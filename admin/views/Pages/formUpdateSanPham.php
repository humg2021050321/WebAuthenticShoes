<title>Sửa sản phẩm</title>
<div class="p-3">
    <div class="row text-center">
        <h3>Cập nhật sản phẩm</h3>
    </div>
    <form action="./?act=post-update-san-pham" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $sanpham['id']; ?>">
        <div class="d-flex my-2 px-2">
            <div class="form-floating col-12">
                <input type="text" name="ten" class="required form-control form-input" placeholder="" value="<?php echo $sanpham['ten']; ?>">
                <label for="ten">Tên sản phẩm</label>
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="d-flex px-2 my-2 justify-content-between">
            <div class="col-4">
                <div class="form-floating col-11">
                    <select name="id_loai" class="form-control form-select">
                        <?php foreach ($listLoai as $key => $value) : ?>
                            <option value="<?php echo $value['id']; ?>" <?php echo $sanpham['id_loai'] == $value['id'] ? 'selected' : ''; ?>><?php echo $value['ten']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <label for="id_loai">Loại</label>
                </div>
            </div>
            <div class="col-4">
                <div class="form-floating col-11">
                    <select name="id_mau" class="form-control form-select">
                        <?php foreach ($listMau as $key => $value) : ?>
                            <option value="<?php echo $value['id']; ?>" <?php echo $sanpham['id_mau'] == $value['id'] ? 'selected' : ''; ?>><?php echo $value['ten']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <label for="id_mau">Màu Sắc</label>
                </div>
            </div>
            <div class="col-4">
                <div class="form-floating col-12">
                    <select name="id_thuong_hieu" class="form-control form-select">
                        <?php foreach ($listThuongHieu as $key => $value) : ?>
                            <option value="<?php echo $value['id']; ?>" <?php echo $sanpham['id_thuong_hieu'] == $value['id'] ? 'selected' : ''; ?>><?php echo $value['ten']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <label for="id_thuong_hieu">Thương Hiệu</label>
                </div>
            </div>
        </div>
        <div class="d-flex px-2 my-2 justify-content-between">
            <div class="col-4">
                <div class="form-floating col-11">
                    <select name="id_size" class="form-control form-select">
                        <?php foreach ($listSize as $key => $value) : ?>
                            <option value="<?php echo $value['id']; ?>" <?php echo $sanpham['id_size'] == $value['id'] ? 'selected' : ''; ?>><?php echo $value['size']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <label for="id_size">Kích/Cỡ</label>
                </div>
            </div>
            <div class="col-4">
                <div class="form-floating col-11">
                    <input type="number" name="so_luong" class="required form-control form-input" placeholder="" value="<?php echo $sanpham['so_luong']; ?>">
                    <label for="so_luong">Số Lượng</label>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-floating col-12">
                    <input type="number" name="gia" class="required form-control form-input" placeholder="" value="<?php echo $sanpham['gia']; ?>">
                    <label for="gia">Đơn Giá</label>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="d-flex my-2 px-2">
            <div class="form-floating col-12">
                <textarea name="mo_ta" rows="1" class="form-control" placeholder=""><?php echo $sanpham['mo_ta']; ?></textarea>
                <label for="mo_ta">Mô Tả</label>
            </div>
        </div>
        <div class="d-flex my-2 px-2">
            <input type="hidden" name="old_file" value="<?php echo $sanpham['hinh_anh']; ?>">
            <div class="form-floating pt-2 col-12">
                <input type="file" name="hinh_anh" class="form-control form-input" placeholder="" value="<?php echo $sanpham['hinh_anh']; ?>">
                <label for="hinh_anh" class="bg-transparent">Hình Ảnh</label>
            </div>
        </div>
        <div class="text-center">
            <input type="submit" value="Lưu" class="btn btn-primary">
            <a href='./'><input type="button" value="Hủy" class="btn btn-secondary"></a>
        </div>
    </form>
</div>
<script>
    $(document).ready(() => {
        CheckOnChage();
        ValidateSubmit();
    });
</script>