<title>Người Quản Lý</title>
<div class="p-3">
    <div class="row text-center">
        <h3>Danh sách người quản lý</h3>
    </div>
    <a href="./?act=form-add-admin"><button class="btn btn-primary">Thêm người quản lý</button></a>
    <table class="table table-hover table-bordered my-3 align-middle">
        <thead>
            <tr>
                <th class="text-center align-middle bg-danger text-white">STT</th>
                <th class="text-center align-middle bg-danger text-white">Email</th>
                <th class="text-center align-middle bg-danger text-white">Tên người dùng</th>
                <th class="text-center align-middle bg-danger text-white">Số điện thoại</th>
                <th class="text-center align-middle bg-danger text-white">Địa chỉ</th>
                <th class="text-center align-middle bg-danger text-white">Ảnh</th>
                <th class="text-center align-middle bg-danger text-white">thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (@$danhSach) foreach ($danhSach as $key => $value) : ?>
                <tr>
                    <td class="text-center text-justify"><?php echo $key + 1; ?></td>
                    <td><?php echo $value['email']; ?></td>
                    <td><?php echo $value['ten']; ?></td>
                    <td><?php echo $value['so_dien_thoai']; ?></td>
                    <td><?php echo $value['dia_chi']; ?></td>
                    <td class="text-center"><img class="rounded shadow" src="<?php echo $value['hinh_anh']; ?>" style="width: 100px"></td>
                    <td class="text-center">
                        <a href="./?act=form-update-admin&id=<?php echo $value['id']; ?>"><button class="btn btn-outline-primary">Sửa</button></a>
                        <a href="./?act=delete-admin&id=<?php echo $value['id']; ?>" onclick="return confirm('Bạn có chắc chắn xóa không');">
                            <button class="btn btn-outline-primary">Xoá</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>