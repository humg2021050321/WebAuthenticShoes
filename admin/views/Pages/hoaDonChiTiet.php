<title>Chi tiết hóa đơn</title>
<div class="d-flex flex-column mt-3 p-3">
    <div class="row text-center">
        <div>
            <h3>Thông Tin Hóa Đơn</h3>
        </div>
    </div>
    <div class="d-flex flex-column">
        <div class="row">
            <div class="col-3">
                <div class="input-group">
                    <span class="input-group-text">Khách Hàng</span>
                    <span class="form-control"><?= $khachhang['ten'] ?></span>
                </div>
            </div>
            <div class="col-5">
                <form action="./?act=post-cap-nhat-hoa-don" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $hoadon['id'] ?>">
                    <div class="d-flex flex-wrap">
                        <div class="col-8 me-1">
                            <div class="input-group">
                                <span class="input-group-text">Trạng Thái</span>
                                <select name="trangthai" id="trangthai" class="form-control form-select">
                                    <?php foreach (TRANG_THAI as $key => $value) : ?>
                                        <?php if ($key == $hoadon['trang_thai']): ?>
                                            <option value="<?= $key ?>" selected><?= $value ?></option>
                                        <?php elseif ($key < $hoadon['trang_thai'] || $hoadon['trang_thai'] >= 3 && $key == 6) : ?>
                                            <option value="<?= $key ?>" disabled><?= $value ?></option>
                                        <?php else: ?>
                                            <option value="<?= $key ?>"><?= $value ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-outline-primary" <?= ($hoadon['trang_thai'] >= 5) ? 'disabled' : '' ?> value="Cập nhật">
                    </div>
                    <div id='input-huy'>

                    </div>
                </form>
            </div>
            <div class="col-4">
                <div class="input-group">
                    <span class="input-group-text">Ngày Mua</span>
                    <span class="form-control text-end"><?= $hoadon['ngay_dat'] ?></span>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <table class="table table-hover table-bordered my-3 align-middle">
                <thead>
                    <tr>
                        <th class="text-center align-middle bg-danger text-white">STT</th>
                        <th class="text-center align-middle bg-danger text-white">Tên Sản Phẩm</th>
                        <th class="text-center align-middle bg-danger text-white">Số Lượng</th>
                        <th class="text-center align-middle bg-danger text-white">Đơn Giá</th>
                        <th class="text-center align-middle bg-danger text-white">Thành Tiền</th>
                        <th class="text-center align-middle bg-danger text-white">Hình ảnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tongtien = TIEN_GIAO_HANG;
                    foreach ($chitiet as $key => $item) {
                        $tongtien += $item['gia'] * $item['soluong'];
                    ?>
                        <tr>
                            <td><?= $key += 1 ?></td>
                            <td><?= $item['ten'] ?></td>
                            <td class="text-end"><?= number_format($item['soluong']) ?></td>
                            <td class="text-end"><?= number_format($item['gia']) ?> đồng</td>
                            <td class="text-end"><?= number_format($item['gia'] * $item['soluong']) ?> đồng</td>
                            <td class="text-center"><img class="rounded shadow" src="<?php echo $item['hinh_anh']; ?>" style="width: 100px"></td>
                        </tr>
                    <?php }; ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex flex-row justify-content-end">
            <div class="d-flex flex-wrap justify-content-between col-4 fw-bold">
                <span>Tổng Tiền:</span>
                <span class="text-danger"><?= number_format($tongtien) ?> đồng</span>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(() => {
        ValidateSubmit();
        $('#trangthai').change(() => {
            if ($('#trangthai').val() === '6') {
                let html = `
                <div class="form-floating mt-1">
                            <input type="text" name="mo_ta" class="required form-control form-input" placeholder="">
                            <label>Lý do hủy</label>
                            <div class="invalid-feedback"></div>
                        </div>
                `;
                $('#input-huy').html(html);
            } else {
                $('#input-huy').html("");
            }
        });

        if ($('#trangthai').val() === '6') {
            let html = `
                <div class="form-floating mt-1">
                            <input type="text" name="mo_ta" class="required form-control form-input" value="<?= $hoadon['mo_ta'] ?>" placeholder="">
                            <label>Lý do hủy</label>
                            <div class="invalid-feedback"></div>
                        </div>
                `;
            $('#input-huy').html(html);
        } else {
            $('#input-huy').html("");
        }
    });
</script>