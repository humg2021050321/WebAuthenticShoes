<title>Nhà Cung Cấp</title>
<div class="p-3">
    <div class="row text-center">
        <h3>Danh sách nhà cung cấp</h3>
    </div>
    <a href="./?act=form-add-nha-cung-cap"><button class="btn btn-primary">Thêm nhà cung cấp</button></a>
    <table class="table table-hover table-bordered my-3 align-middle">
        <thead>
            <tr>
                <th class="text-center align-middle bg-danger text-white">STT</th>
                <th class="text-center align-middle bg-danger text-white">Tên</th>
                <th class="text-center align-middle bg-danger text-white">Mô tả </th>
                <th class="text-center align-middle bg-danger text-white">thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if(@$danhSach) foreach ($danhSach as $key => $value) : ?>
                <tr>
                    <td class="text-center text-justify"><?php echo $key + 1; ?></td>
                    <td><?php echo $value['ten']; ?></td>
                    <td><?php echo $value['mo_ta']; ?></td>
                    <td class="text-center">
                        <a href="./?act=form-update-nha-cung-cap&id=<?php echo $value['id']; ?>"><button class="btn btn-outline-primary">sửa</button></a>
                        <a href="./?act=delete-nha-cung-cap&id=<?php echo $value['id']; ?>"><button class="btn btn-outline-primary" onclick="confirm('Bạn có chắc chắn xóa không')">Xóa</button></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>