<title>Hoá Đơn</title>
<div class="p-3">
    <div class="row text-center">
        <h3>Danh sách hóa đơn</h3>
    </div>
    <form method="POST" action="./?act=post-search-hoa-don" enctype="multipart/form-data">
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
    <table class="table table-hover table-bordered my-3 align-middle">
        <thead>
            <tr>
                <th class="text-center align-middle bg-danger text-white">STT</th>
                <th class="text-center align-middle bg-danger text-white">Ngày Đặt Hàng</th>
                <th class="text-center align-middle bg-danger text-white">Ngày Giao Hàng</th>
                <th class="text-center align-middle bg-danger text-white">Loại Thanh Toán</th>
                <th class="text-center align-middle bg-danger text-white">Khách hàng</th>
                <th class="text-center align-middle bg-danger text-white">Trạng thái</th>
                <th class="text-center align-middle bg-danger text-white">thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (@$danhSach) foreach ($danhSach as $key => $value) : ?>
                <tr>
                    <td class="text-center text-justify"><?php echo $key + 1; ?></td>
                    <td><?php echo $value['ngay_dat']; ?></td>
                    <td><?php echo $value['ngay_giao']; ?></td>
                    <td><?php echo THANH_TOAN[$value['thanh_toan']]; ?></td>
                    <td><?php echo $value['ten']; ?></td>
                    <td class="text-center"> <?= TRANG_THAI[$value['trang_thai']]; ?></td>
                    <td class="text-center">
                        <a href="./?act=form-hoa-don-chi-tiet&id=<?php echo $value['id']; ?>"><button class="btn btn-outline-primary">Chi tiết</button></a>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>