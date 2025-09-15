<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>DANH SÁCH HÓA ĐƠN</h1>
    <a href=""><button>Thêm user</button></a>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Ngày mua</th>
            <th>Mã Khách Hàng</th>
            <th>Thao tác</th>
        </thead>
        <tbody>
            <?php foreach($listHoaDon as $key => $hoadon): ?>
                <tr>
                    <td><?php echo $hoadon['id']; ?></td>
                    <td><?php echo $hoadon['ngayMua']; ?></td>
                    <td><?php echo $hoadon['maKH']; ?></td>
                    <td>
                        <a href="<?php echo $hoadon['id'];?>"><button>Sửa</button></a>
                        <a href="<?php echo $hoadon['id'];?>"><button onclick="confirm('Bạn có chắc chắn xóa không')">Xóa</button></a>
                    </td>
                </tr>
                <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>