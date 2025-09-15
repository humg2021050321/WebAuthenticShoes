<?php
if (!isset($_SESSION)) {
    session_start();
}
ob_start();

// Require file Common
require_once './admin/commons/env.php'; // Khai báo biến môi trường
require_once './admin/commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './admin/controllers/baseController.php';
require_once './admin/controllers/HomeController.php';
require_once './admin/controllers/HoaDonController.php';
require_once './admin/controllers/KhachHangController.php';
require_once './admin/controllers/RouterController.php';

// Require toàn bộ file Models
require_once './admin/models/hoaDon.php';
require_once './admin/models/chiTietHoaDon.php';
require_once './admin/models/khachHang.php';
require_once './admin/models/SanPham.php';
require_once './admin/models/loai.php';
require_once './admin/models/mauSac.php';
require_once './admin/models/size.php';
require_once './admin/models/thuongHieu.php';
require_once './admin/models/binhLuan.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
match ($act) {
    // user
    '/' => (new HomeController)->danhSachSanPhamUser(),
    'dichvu' => (new RouterController)->Go("./views/Pages/dichvu.php"),
    'gioithieu' => (new RouterController)->Go("./views/Pages/gioithieu.php"),
    'lienhe' => (new RouterController)->Go("./views/Pages/lienhe.php"),
    'trangthai' => (new HoaDonController)->formHoaDonUser(),

    'form-update-user' => (new KhachHangController)->formUpdateUser(),
    'post-update-user' => (new KhachHangController)->postUpdateUser(),
    'dang-nhap' => (new KhachHangController)->formDangNhap(),
    'post-dang-nhap' => (new KhachHangController)->postDangNhap(),
    'dangxuat' => (new KhachHangController)->dangxuat(),

    'form-dang-ky' => (new KhachHangController)->formDangKy(),
    'post-dang-ky' => (new KhachHangController)->postDangKy(),

    'form-thanh-toan' => (new HoaDonController)->formHoaDon(),
    'post-mua-hang' => (new HoaDonController)->postMuaHang(),
    'post-huy-don-hang' => (new HoaDonController)->postHuyDon(),
    'show-order-detail' => (new HoaDonController)->GetDetail(),
    'post-search-hoa-don-user' => (new HoaDonController)->SearchHoaDonUser(),

    'show-popup-detail' => (new HomeController)->formPopup(),
    'chi-tiet-san-pham' => (new HomeController)->formPopup(),
    'post-add-binh-luan' => (new HomeController)->postBinhLuan(),
    'show-popup-cart' => (new HoaDonController)->GetCartItems(),

    'tim-kiem-thu-cung' => (new HomeController)->Search(1),
    'tim-kiem-phu-kien' => (new HomeController)->Search(2),
    'tim-kiem-trang-thai' => (new HomeController)->Search(3),
};
