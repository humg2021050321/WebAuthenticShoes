<title>Home</title>
<div class="d-flex flex-column">
    <div class="mx-1 my-3">
        <form action="./?act=tim-kiem-thu-cung" method="POST" enctype="multipart/form-data">
            <div class="d-flex flex-row justify-content-end align-end">
                <div class="col-2 mx-2">
                    <input type="search" name="timkiem" class="form-control form-input col-3" placeholder="Tìm Kiếm">
                </div>
                <input class="btn btn-outline-primary" type="submit" value="Tìm Kiếm">
            </div>
        </form>
    </div>
    <div class="d-flex flex-column justify-content-between">
        <h5>Giày Tennis chính hãng</h5>
        <div>Mua ngay các phiển bản giày Pickedball và Tennis mới nhất đến từ các thương hiệu Asics, Nike, Lacoste,… chính hãng 2024</div>
    </div>
    <div class="d-flex flex-wrap justify-content-evenly">
        <?php
        if (!@$danhSachSanPham) {
            include('./views/Layouts/NoData.php');
        } else {
        ?>
            <?php foreach ($danhSachSanPham as $key => $value) :  ?>
                <!-- <div class="m-2 col-2 align-items-center d-flex flex-column justify-content-around" 
                data-bs-toggle="modal" data-bs-target="#myDialog" onclick="ShowDetail('<?= $value['id'] ?>')"> -->
                <a href="./?act=chi-tiet-san-pham&id=<?= $value['id'] ?>" class="m-2 col-2 text-decoration-none">
                    <div class="align-items-center d-flex flex-column justify-content-around">
                        <div class="card m-1 rounded justify-content-around anh-sp">
                            <img class="w-100 " src="./admin/<?= $value['hinh_anh'] ?>" alt="">
                        </div>
                        <div>
                            <?php if ($value['danh_gia']): ?>
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <?php if ($value['danh_gia'] >= $i + 1) : ?>
                                        <span class="fa fa-star text-warning"></span>
                                    <?php else : ?>
                                        <span class="fa fa-star"></span>
                                    <?php endif ?>
                                <?php endfor ?>
                            <?php else: ?>
                                <span>chưa có đánh giá</span>
                            <?php endif ?>
                        </div>
                        <div class="fw-bold mb-1">
                            <span><?= $value['ten'] ?></span>
                        </div>
                        <div class="text-danger">
                            <span><?= number_format($value['gia']) ?> đ</span>
                        </div>
                    </div>
                </a>
            <?php endforeach ?>
        <?php } ?>
    </div>
</div>