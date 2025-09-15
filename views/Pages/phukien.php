<title>Phụ Kiện</title>

<div class="d-flex flex-column">
    <div class="mx-1 my-3">
        <div class="d-flex flex-column justify-content-between text-center">
            <h5 class="text-uppercase">sản phẩm</h5>
        </div>
        <form action="./?act=tim-kiem-phu-kien" method="POST" enctype="multipart/form-data">
            <div class="d-flex flex-row justify-content-end align-middle">

                <div class="form-floating mx-3">
                    <input type="search" name="timkiem" class="form-control form-input" placeholder="">
                    <label>Tìm Kiếm</label>
                </div>
                <input class="btn btn-outline-primary" type="submit" value="Tìm Kiếm">
            </div>
        </form>
    </div>
    <div class="d-flex flex-wrap justify-content-evenly">
        <?php
        if (!@$danhSachPhuKien) {
            include('./views/Layouts/NoData.php');
        } else {
        ?>
            <?php foreach (@$danhSachPhuKien as $key => $value) :  ?>
                <div class="col-2 card position-relative p-2 m-3 align-items-center d-flex flex-column justify-content-around shadow" data-bs-toggle="modal" data-bs-target="#myDialog" onclick="ShowDetail('<?= $value['id'] ?>')">
                    <div class="fw-bold mb-1">
                        <span class="text-uppercase"><?= $value['ten_san_pham'] ?></span>
                    </div>
                    <img class="w-100 rounded" src="./admin/<?= $value['hinh_anh'] ?>" alt="">
                    <div class="text-danger">
                        <span><?= number_format($value['gia']) ?> đ</span>
                    </div>
                </div>
            <?php endforeach ?>
        <?php } ?>
    </div>
</div>