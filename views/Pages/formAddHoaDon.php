<title>Tạo Hoá Đơn</title>
<?php $soluong = 0;
$vanchuyen = TIEN_GIAO_HANG;
$tongtien = 0; ?>
<form class="w-100" action="./?act=post-mua-hang" method="POST" enctype="multipart/form-data">
    <div class="row text-center mt-3">
        <h3>Hoá Đơn</h3>
    </div>
    <div class="row shadow p-3">
        <div class="row text-center my-2">
            <h5>Thông Tin Khách Hàng</h5>
        </div>
        <?php
        $currentTime = time();
        $id = '';
        $ten = '';
        $so_dien_thoai = '';
        $dia_chi = '';
        if (isset($_SESSION['userKh']) && $currentTime < $_SESSION['expireKh']) {
            $id = $_SESSION['userKh']['id'];
            $ten = $_SESSION['userKh']['ten'];
            $so_dien_thoai = $_SESSION['userKh']['so_dien_thoai'];
            $dia_chi = $_SESSION['userKh']['dia_chi'];
        }
        ?>
        <div class="d-flex my-4">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="col-6 form-floating pe-1">
                <input type="text" name="ten" class="form-control form-input" placeholder="" value="<?= $ten ?>">
                <label for="ten">Khách Hàng</label>
            </div>
            <div class="col-6 form-floating ps-1">
                <input type="text" name="so_dien_thoai" class="form-control form-input" placeholder="" value="<?= $so_dien_thoai ?>">
                <label for="so_dien_thoai">Số Điện Thoại</label>
            </div>
        </div>
        <div class="d-flex mb-4">
            <div class="col-12 form-floating">
                <input type="text" name="dia_chi" class="form-control form-input" placeholder="" value="<?= $dia_chi ?>">
                <label for="dia_chi">Địa Chỉ</label>
            </div>
        </div>
    </div>
    <div class="row shadow mb-3 p-3">
        <div class="row text-center my-2">
            <h5>Danh Sách Sản Phẩm</h5>
        </div>
        <table class="table table-hover table-bordered my-3 align-middle">
            <thead>
                <tr>
                    <th class="text-center align-middle bg-danger text-white">Xoá</th>
                    <th class="text-center align-middle bg-danger text-white">Tên Sản Phẩm</th>
                    <th class="text-center align-middle bg-danger text-white">Số Lượng</th>
                    <th class="text-center align-middle bg-danger text-white">Đơn Giá</th>
                    <th class="text-center align-middle bg-danger text-white">Thành Tiền</th>
                    <th class="text-center align-middle bg-danger text-white">Hình Ảnh</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($danhSach as $key => $value) :
                    $itemSelect = [];
                    foreach ($items as $itemKey => $item) {
                        if ($item->id == $value['id']) {
                            $itemSelect = $item;
                            $soluong = $soluong + $item->so_luong;
                            $tongtien += $item->so_luong * $value['gia'];
                        }
                    }
                ?>
                    <tr id="<?= $value['id'] ?>">
                        <td class="text-center"><button onclick="return Xoa(<?= $value['id'] ?>,
                                <?= ($itemSelect->so_luong * $value['gia']) ?>)" class="btn btn-outline-danger">
                                <i class="fa fa-trash-o"></i>
                            </button></td>
                        <td><?= $value['ten']; ?></td>
                        <td class="text-end"><?= $itemSelect->so_luong ?><input id="soluong<?= $value['id'] ?>" type="hidden" value="<?= $itemSelect->so_luong ?>"> </td>
                        <td class="text-end"><?= number_format($value['gia']) ?> đồng</td>
                        <td class="text-end"><?= number_format($itemSelect->so_luong * $value['gia']) ?> đồng</td>
                        <td class="text-center"><img class="rounded shadow" src="./admin/<?= $value['hinh_anh']; ?>" style="width: 100px"></td>
                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="row shadow my-3 p-3">
        <div class="row text-center my-2">
            <h5>Thông Tin Hoá Đơn</h5>
        </div>
        <div class="text-center">
            <label for="thanh_toan">Hình thức thanh toán</label>
        </div>
        <div class="form-input mb-4">
            <div class="d-flex justify-content-around">
                <div class="col-4">
                    <div class="form-check">
                        <label for="thanh_toan1" class="form-check-label"><?= THANH_TOAN[1] ?></label>
                        <input type="radio" name="thanh_toan" value="1" checked class="form-check-input" id="thanh_toan1">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-check">
                        <label for="thanh_toan2" class="form-check-label"><?= THANH_TOAN[2] ?></label>
                        <input type="radio" name="thanh_toan" value="2" class="form-check-input" id="thanh_toan2">
                    </div>
                </div>
            </div>

        </div>
        <div class="mb-4">
            <div class="form-floating">
                <input type="text" name="mo_ta" class="form-control form-input" placeholder="">
                <label for="mo_ta">Ghi chú</label>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between form-control">
            <div>
                <span>Số lượng sản phẩm: </span><span id="soluong"><?= number_format($soluong) ?></span>
            </div>
            <div>
                <span>Phí vận chuyển: </span><span><?= number_format($vanchuyen) ?> đồng</span>
            </div>
            <div>
                <span>Tổng tiền: </span><span id="tongtien"><?= number_format($tongtien + $vanchuyen) ?></span> đồng
            </div>
        </div>
        <div class="text-center my-3">
            <button class="btn btn-primary" id="submit" type="submit">Xác Nhận Mua Hàng</button>
        </div>
    </div>
</form>
<script>
    function Xoa(id, tien) {
        if (confirm('Bạn có chắc chắn xóa không?')) {
            $(`#${id}`).html('');
            var cookies = JSON.parse(getCookie('thanhToan'));
            var sltext = $('#soluong').text();
            var tttext = $('#tongtien').text();
            var soluong = Number(sltext.split(",").join(""));
            var tongtien = Number(tttext.split(",").join(""));
            cookies.forEach((element, index) => {
                if (element.id == id) {
                    cookies.splice(index, 1);
                    soluong -= Number(element.so_luong);
                }
            });
            tongtien -= Number(tien);
            setCookie('thanhToan', JSON.stringify(cookies), 1);
            $('#soluong').text(new Intl.NumberFormat().format(soluong));
            $('#tongtien').text(new Intl.NumberFormat().format(tongtien));
            if (soluong === 0) {
                $('#submit').attr('disabled', true);
            } else {
                $('#submit').attr('disabled', false);
            }
            return true;
        } else {
            return false;
        }
    }
</script>