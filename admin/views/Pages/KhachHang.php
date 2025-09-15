<title>Khách Hàng</title>
<div class="p-3">
    <div class="row text-center">
        <h3>Danh sách khách hàng</h3>
    </div>
    <a href="./?act=form-add-khach-hang"><button class="btn btn-primary">Thêm khách hàng</button></a>
    <table class="table table-hover table-bordered my-3 align-middle">
        <thead>
            <tr>
                <th class="text-center align-middle bg-danger text-white">STT</th>
                <th class="text-center align-middle bg-danger text-white">Tên</th>
                <th class="text-center align-middle bg-danger text-white">Số điện thoại</th>
                <th class="text-center align-middle bg-danger text-white">Địa chỉ</th>
                <th class="text-center align-middle bg-danger text-white">thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if(@$danhSach) foreach ($danhSach as $key => $value) : ?>
                <tr>
                    <td class="text-center text-justify"><?php echo $key + 1; ?></td>
                    <td><?php echo $value['ten']; ?></td>
                    <td><?php echo $value['so_dien_thoai']; ?></td>
                    <td><?php echo $value['dia_chi']; ?></td>
                    <td class="text-center">
                        <a href="./?act=form-update-khach-hang&id=<?php echo $value['id']; ?>"><button class="btn btn-outline-primary">sửa</button></a>
                        <a href="./?act=delete-khach-hang&id=<?php echo $value['id']; ?>"><button class="btn btn-outline-primary" onclick="confirm('Bạn có chắc chắn xóa không')">Xóa</button></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>