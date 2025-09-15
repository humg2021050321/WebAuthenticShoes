<div id="popupContent" class="popupContent">
    <?php if ($danhSach) { ?>
        <div class="row">
            <table class="table table-hover table-bordered my-3 align-middle">
                <thead>
                    <tr>
                        <th class="text-center align-middle bg-danger text-white">Chọn</th>
                        <th class="text-center align-middle bg-danger text-white">Xoá</th>
                        <th class="text-center align-middle bg-danger text-white">STT</th>
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
                            }
                        }
                    ?>
                        <tr id="<?= $value['id'] ?>">
                            <td class="text-center"><button class="btn btn-outline-primary"><input class="form-check-input selectcart" value="<?= $value['id'] ?>" type="checkbox"></button></td>
                            <td class="text-center"><button onclick="Xoa(<?= $value['id'] ?>)" class="btn btn-outline-danger"><i class="fa fa-trash-o"></i></button></td>
                            <td class="text-center"><?= $key + 1 ?></td>
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
        <div class="row">
            <div class="text-center">
                <a href="/?act=form-thanh-toan"><button onclick="return ThanhToan()" class="btn btn-primary" data-bs-dismiss="modal">Thanh Toán</button></a>
            </div>
        </div>
    <?php } else { ?>
        <div class="text-center">
            <h3>Không có sản phẩm nào trong giỏ.</h3>
        </div>
    <?php } ?>
</div>
<script>
    function Xoa(id) {
        if (confirm('Bạn có chắc chắn xóa không?')) {
            $(`#${id}`).html('');
            if (getCookie('cartItems') !== "") {
                var cookies = JSON.parse(getCookie('cartItems'));
                var count = Number($('#cartItemCount').text());
                cookies.forEach((element, index) => {
                    if (element.id == id) {
                        cookies.splice(index, 1);
                        count = count - Number(element.so_luong);
                    }
                });

                setCookie('cartItems', JSON.stringify(cookies), 1);
                $('#cartItemCount').text(count);
            }
        }
    }

    function ThanhToan() {
        var selected = [];
        var elements = document.getElementsByClassName('selectcart');
        for (var item in elements) {
            if (elements[item].checked) {
                var soluong = $(`#soluong${elements[item].value}`).val();
                selected.push({
                    id: elements[item].value,
                    so_luong: soluong,
                });
            }
        };
        setCookie('thanhToan', JSON.stringify(selected));
        if (selected.length > 0) {
            return true;
        } else {
            alert('Bạn phải chọn ít nhất một sản phẩm để thanh toán.')
            return false;
        }
    }
</script>