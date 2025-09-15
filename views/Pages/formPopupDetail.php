<title>Chi tiết sản phẩm</title>
<!-- <div id="popupContent" class="popupContent"> -->
<div class="d-flex flex-column mt-5">
    <?php if (isset($itemDetail)) { ?>
        <div class="row">
            <div class="col-6">
                <img class="mb-1 w-100 card card-body" src="./admin/<?= $itemDetail['hinh_anh'] ?>" alt="">
            </div>
            <div class="col-6 d-flex flex-column justify-content-between">
                <div class="card card-body mb-2">
                    <div class="row text-center">
                        <h3 class="fw-bold text-uppercase"><?= $itemDetail['ten'] ?></h3>
                    </div>
                    <div class="row text-center my-2">
                        <h3 class="fw-bold text-danger"><?= number_format($itemDetail['gia']) ?> đồng</h3>
                    </div>
                </div>
                <div class="h-100 card card-body">
                    <div class="row text-center">
                        <span><?= $itemDetail['mo_ta'] ?></span>
                    </div>
                </div>
                <div>
                    <!-- Dropdown chọn màu -->
                    <div class="my-2 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Màu sắc</span>
                        </div>
                        <select class="form-control">
                            <?php if (isset($itemDetail['mau'])) { ?>
                                <option value="<?= $itemDetail['mau'] ?>"><?= $itemDetail['mau'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- Dropdown chọn size -->
                    <div class="my-2 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Kích cỡ</span>
                        </div>
                        <select class="form-control">
                            <?php if (isset($itemDetail['size'])) { ?>
                                <option value="<?= $itemDetail['size'] ?>"><?= $itemDetail['size'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- Nhập số lượng -->
                    <div class="my-2 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Số Lượng</span>
                        </div>
                        <input type="number" id="soluong" class="form-control form-input" value="1" max="<?= $itemDetail['so_luong'] ?>">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Còn lại: <?= $itemDetail['so_luong'] ?></span>
                        </div>
                    </div>
                    <!-- Nút thêm vào giỏ hàng -->
                    <div class="row text-center">
                        <input type="hidden" id="id" name="id" value="<?= $itemDetail['id'] ?>">
                        <button id="addCart" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            <i class="fa fa-cart-plus mx-2"></i>Thêm Vào Giỏ Hàng
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div>
                <h4>Đánh giá và bình luận</h4>
            </div>
            <div class="form-control">
                <?php foreach ($binhluan as $key => $value): ?>
                    <div>
                        <div class="d-flex flex-row">
                            <h6><?= $value['ten'] ?></h6>
                            <div class="mx-2">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <?php if ($value['danh_gia'] >= $i + 1) : ?>
                                        <span class="fa fa-star text-warning"></span>
                                    <?php else : ?>
                                        <span class="fa fa-star"></span>
                                    <?php endif ?>
                                <?php endfor ?>
                            </div>
                        </div>
                        <div>
                            <span><?= $value['binh_luan'] ?></span>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <?php if (isset($_SESSION['userKh'])): ?>
                <?php
                $currentTime = time();
                if ($currentTime < $_SESSION['expireKh']) : ?>
                    <form action="./?act=post-add-binh-luan" method="POST" enctype="multipart/form-data">
                        <div class="form-control m-2 p-1">
                            <div class="mb-2 d-flex">
                                <div class="form-floating col-2">
                                    <select class="form-control form-select" name="danh_gia">
                                        <option value="1">1 sao</option>
                                        <option value="2">2 sao</option>
                                        <option value="3">3 sao</option>
                                        <option value="4">4 sao</option>
                                        <option value="5" selected>5 sao</option>
                                    </select>
                                    <label for="id_size">Đánh giá</label>
                                </div>
                                <input type="submit" class="btn btn-primary mx-2" value="Bình Luận">
                            </div>
                            <div class="form-floating">
                                <input type="text" name="binh_luan" class="form-control form-input" placeholder="">
                                <label>Nhập bình luận</label>
                            </div>
                        </div>
                        <input type="hidden" name="id_kh" value="<?= $_SESSION['userKh']['id'] ?>">
                        <input type="hidden" name="id_sp" value="<?= $itemDetail['id'] ?>">
                    </form>
                <?php endif ?>
            <?php endif ?>
        </div>
    <?php } ?>
</div>
<script>
    $(document).ready(function() {
        $('#addCart').click(function() {
            var soLuong = $('#soluong').val();
            var id = $('#id').val();
            if (Number(soLuong) > 0) {
                var cartItem = {
                    so_luong: soLuong,
                    id: id
                };

                var isExis = false;
                var cookies = [];
                if (getCookie('cartItems') !== "") {
                    cookies = JSON.parse(getCookie('cartItems'));
                }

                cookies.forEach(element => {
                    if (element.id === cartItem.id) {
                        element.so_luong = Number(element.so_luong) + Number(cartItem.so_luong);
                        isExis = true;
                    }
                });
                if (!isExis) {
                    cookies.push(cartItem);
                }
                setCookie('cartItems', JSON.stringify(cookies), 1);
                var count = Number($('#cartItemCount').text());
                $('#cartItemCount').text(count + Number(soLuong));
            }

        });
    });
</script>