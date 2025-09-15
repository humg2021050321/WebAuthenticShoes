<div class="overflow-visible">
    <div class="col-auto">
        <div class="bg-black d-flex h-40px rounded-top col-12 text-start text-white justify-content-center">
            <div class="d-flex flex-column w-75 justify-content-center" style="font-size: small;">
                <div>Authentic Shoes - Nhà sưu tầm và phân phối chính hãng các thương hiệu thời trang quốc tế hàng đầu Việt Nam</div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-self-center">
        <nav class="nav nav-pills bg-white flex-column flex-sm-row justify-content-between w-75">
            <div class="col-auto">
                <a class="btn btn-light text-black" href="./"><img src="img/logo.png" /></a>
                <a class="btn btn-light text-black" href="./">SẢN PHẨM</a>
                <a class="btn btn-light text-black" href="./?act=dichvu">DỊCH VỤ</a>
                <a class="btn btn-light text-black" href="./?act=gioithieu">TIN TỨC - SỰ KIỆN</a>
                <a class="btn btn-light text-black" href="./?act=lienhe">LIÊN HỆ</a>
            </div>
            <div class="mx-2 d-flex flex-row">
                <div class="d-flex justify-content-center">
                    <button onclick="ShowCart()" class="btn btn-light text-black align-self-center" data-bs-toggle="modal" data-bs-target="#myDialog">
                        <span>Giỏ Hàng</span>
                        <i class="fa fa-cart-plus"></i>
                        <span id="cartItemCount"></span>
                    </button>
                </div>
                <?php
                if (isset($_SESSION['userKh'])) {
                    $currentTime = time();
                    if ($currentTime < $_SESSION['expireKh']) {
                ?>
                        <div class="mx-2 d-flex flex-row">
                            <div class="d-flex justify-content-center">
                                <a href="./?act=trangthai&id=<?php echo $_SESSION['userKh']['id'] ?>" class="btn btn-light text-black align-self-center">
                                    <span>Đơn Hàng</span>
                                    <i class="fa fa-truck"></i>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-light text-black align-self-center" href="./?act=form-update-user&id=<?php echo $_SESSION['userKh']['id'] ?>">
                                <i class="fa fa-user-circle me-2"></i>
                                <span><?php echo $_SESSION['userKh']['ten'] ?></span>
                            </a>
                            <a href="./?act=dangxuat" class="ms-2 btn btn-light text-black align-self-center"><i class="fa fa-sign-out"></i></a>

                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="d-flex justify-content-center">
                            <a href="./?act=dang-nhap" class="btn btn-light text-black align-self-center">
                                <i class="fa fa-user-circle me-2"></i>
                                <span>Đăng nhập</span>
                            </a>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="d-flex justify-content-center">
                        <a href="./?act=dang-nhap" class="btn btn-light text-black align-self-center">
                            <i class="fa fa-user-circle me-2"></i>
                            <span>Đăng nhập</span>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </nav>
    </div>
    <div class="banner">
        <div id="slideshow">
            <img class="w-100" src="img/slide/banner.webp" alt="" srcset="">
        </div>
    </div>
</div>