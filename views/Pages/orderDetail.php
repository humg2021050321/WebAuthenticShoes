<div class="d-flex flex-column popupContent">
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
                foreach ($detail as $key => $item) {
                    $tongtien += $item['gia'] * $item['soluong'];
                ?>
                    <tr>
                        <td><?= $key += 1 ?></td>
                        <td><?= $item['ten'] ?></td>
                        <td class="text-end"><?= number_format($item['soluong']) ?></td>
                        <td class="text-end"><?= number_format($item['gia']) ?> đồng</td>
                        <td class="text-end"><?= number_format($item['gia'] * $item['soluong']) ?> đồng</td>
                        <td class="text-center"><img class="rounded shadow" src="./admin/<?php echo $item['hinh_anh']; ?>" style="width: 100px"></td>
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