<title>Phụ Kiện</title>
<div class="p-3">
    <div class="row text-center">
        <h3>Danh sách Phụ kiện</h3>
    </div>
    <a href="./?act=form-add-thu-cung&phukien=true"><button class="btn btn-primary">Thêm sản phẩm</button></a>
    <table class="table table-hover table-bordered my-3 align-middle">
        <thead>
            <tr>
                <th class="text-center align-middle bg-danger text-white">STT</th>
                <th class="text-center align-middle bg-danger text-white">Tên thú cưng</th>
                <th class="text-center align-middle bg-danger text-white">Loại</th>
                <th class="text-center align-middle bg-danger text-white">Nhà cung cấp</th>
                <th class="text-center align-middle bg-danger text-white">số lượng</th>
                <th class="text-center align-middle bg-danger text-white">Đơn giá</th>
                <th class="text-center align-middle bg-danger text-white">Mô tả</th>
                <th class="text-center align-middle bg-danger text-white">Hình ảnh</th>
                <th class="text-center align-middle bg-danger text-white">thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (@$danhSachPhuKien) foreach ($danhSachPhuKien as $key => $value) : ?>
                <tr>
                    <td class="text-center text-justify"><?php echo $key + 1; ?></td>
                    <td><?php echo $value['ten_san_pham']; ?></td>
                    <td><?php echo ($value['loai'] == 1 ? 'Thú Cưng' : 'Phụ Kiện'); ?></td>
                    <td><?php echo $value['ten']; ?></td>
                    <td class="text-end"><?php echo number_format($value['so_luong']); ?></td>
                    <td class="text-end"><?php echo number_format($value['gia']); ?></td>
                    <td><?php echo $value['mo_ta']; ?></td>
                    <td class="text-center"><img class="rounded shadow" src="<?php echo $value['hinh_anh']; ?>" style="width: 100px"></td>
                    <td class="text-center">
                        <a href="./?act=form-update-thu-cung&phukien=true&id=<?php echo $value['id']; ?>"><button class="btn btn-outline-primary">sửa</button></a>
                        <a href="./?act=delete-thu-cung&id=<?php echo $value['id']; ?>"><button class="btn btn-outline-primary" onclick="confirm('Bạn có chắc chắn xóa không')">Xóa</button></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>