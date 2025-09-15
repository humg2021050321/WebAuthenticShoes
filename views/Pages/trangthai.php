<div class="container mt-4">
    <h2 class="text-center">Trạng Thái Đơn Hàng</h2>
    <form method="POST" action="./?act=post-search-hoa-don-user" enctype="multipart/form-data">
        <div class="d-flex flex-row justify-content-between">
            <div class="col-3">
                <div class="input-group">
                    <span class="input-group-text">Trạng Thái</span>
                    <select name="trang_thai" id="trangthai" class="form-control form-select">
                        <option value="" <?= $trangthai == "" ? 'selected' : "" ?>></option>
                        <?php foreach (TRANG_THAI as $key => $value) { ?>
                            <option value="<?= $key ?>" <?= $trangthai == $key ? 'selected' : "" ?>><?= $value ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="input-group">
                    <label for="start_date" class="input-group-text">Từ ngày:</label>
                    <input type="date" name="from_date" id="start_date" value="<?= $from ?>" class="form-control form-input">
                </div>
            </div>
            <div class="col-3">
                <div class="input-group">
                    <label for="end_date" class="input-group-text">Đến ngày:</label>
                    <input type="date" name="to_date" id="end_date" value="<?= $to ?>" class="form-control form-input">
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Tìm Kiếm</button>
        </div>
    </form>
    <!-- Bảng trạng thái đơn hàng -->
    <table class="table table-hover table-bordered my-3 align-middle">
        <thead>
            <tr>
                <th class="text-center align-middle bg-info text-white">STT</th>
                <th class="text-center align-middle bg-info text-white">Khách Hàng</th>
                <th class="text-center align-middle bg-info text-white">Ngày Đặt Hàng</th>
                <th class="text-center align-middle bg-info text-white">Ngày Giao Hàng</th>
                <th class="text-center align-middle bg-info text-white">Hình Thức Thanh Toán</th>
                <th class="text-center align-middle bg-info text-white">Trạng Thái</th>
                <th class="text-center align-middle bg-info text-white">Mô Tả</th>
                <th class="text-center align-middle bg-info text-white">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($orders)) : ?>
                <?php foreach ($orders as $key => $order) : ?>
                    <tr>
                        <input type="hidden" class="row-id" value="<?= $order['id'] ?>">
                        <td class="text-center"><?php echo $key + 1; ?></td>
                        <td><?php echo $order['ten']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($order['ngay_dat'])); ?></td>
                        <td><?php echo $order['ngay_giao'] ? date('d/m/Y', strtotime($order['ngay_giao'])) : ''; ?></td>
                        <td class="text-center">
                            <?= THANH_TOAN[$order['thanh_toan']] ?>
                        </td>
                        <td class="text-center">
                            <?= TRANG_THAI[$order['trang_thai']]; ?>
                        </td>
                        <td><?php echo $order['mo_ta']; ?></td>
                        <td class="text-center">
                            <div class="d-flex flex-row">
                                <button class="row-detail btn btn-outline-info btn-sm mx-1 text-nowrap" data-bs-toggle="modal" data-bs-target="#myDialog">Chi Tiết</button>
                                <?php if ($order['trang_thai'] < 3) : ?>
                                    <button class="btn btn-outline-danger btn-sm mx-1 text-nowrap" onclick="openCancelModal(<?php echo $order['id']; ?>)">Hủy</button>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="8" class="text-center">Không có đơn hàng nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="cancelOrderModal" tabindex="-1" aria-labelledby="cancelOrderLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="cancelOrderForm" method="POST" action="./?act=post-huy-don-hang" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelOrderLabel">Hủy Đơn Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="order_id">
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control required" id="cancel_reason" name="mo_ta" placeholder="">
                        <label for="cancel_reason" class="form-label">Lý do hủy</label>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger">Xác nhận hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        ValidateSubmit();
        $('.row-detail').click(() => {
            var idHoaDon = $('.row-id').val();
            $("#bodyPopup").load(`./?act=show-order-detail&id=${idHoaDon}`, function(responseTxt, statusTxt, xhr) {
                var temp = document.createElement('div');
                temp.innerHTML = responseTxt;
                var content = temp.getElementsByClassName('popupContent');
                if (content.length > 0)
                    $(this).html(content[0].innerHTML);
            });
        });
    });

    function openCancelModal(orderId) {
        // Gán ID đơn hàng vào input ẩn trong form
        document.getElementById('order_id').value = orderId;

        // Hiển thị modal
        const cancelModal = new bootstrap.Modal(document.getElementById('cancelOrderModal'));
        cancelModal.show();
    }
</script>