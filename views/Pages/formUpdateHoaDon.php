<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form update HÓA ĐƠN</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $hoadon['id'] ?>">

        <label for="ngayMua">Ngày mua</label><br>
        <input type="text" value="<?php echo $hoadon['ngayMua']  ?>" name="ngayMua">

        <label for="maKH">Mã khách hàng</label><br>
        <input type="text" value="<?php echo $hoadon['maKH']  ?>" name="maKH">
    </form>
</body>
</html>