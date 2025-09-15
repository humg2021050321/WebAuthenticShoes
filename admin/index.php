<?php
if (!isset($_SESSION)) {
    session_start();
}
ob_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/baseController.php';
require_once './controllers/HomeController.php';
require_once './controllers/HoaDonController.php';
require_once './controllers/KhachHangController.php';
require_once './controllers/thuongHieuController.php';
require_once './controllers/userController.php';
require_once './controllers/ThongKeController.php';


// Require toàn bộ file Models
require_once './models/hoaDon.php';
require_once './models/chiTietHoaDon.php';
require_once './models/khachHang.php';
require_once './models/loai.php';
require_once './models/mauSac.php';
require_once './models/size.php';
require_once './models/thuongHieu.php';
require_once './models/SanPham.php';
require_once './models/user.php';
require_once './models/ThongKeModel.php';
require_once './models/binhLuan.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
match ($act) {
    '/' => (new userController)->dangnhap(),
    'post-dang-nhap' => (new userController)->postDangnhap(),
    'dangxuat' => (new userController)->dangxuat(),

    'home' => (new HomeController)->danhSachSanPham(),
    'hoadon' => (new HoaDonController)->danhSach(),
    'thuongHieu' => (new thuongHieuController)->danhSach(),
    'khachhang' => (new KhachHangController)->danhSach(),
    'quanly' => (new userController)->danhSach(),
    'thongke' => (new ThongKeController)->index(),

    'form-add-san-pham' => (new HomeController)->formAddSanPham(),
    'post-add-san-pham' => (new HomeController)->postAddSanPham(),
    'form-update-san-pham' => (new HomeController)->formUpdateSanPham(),
    'post-update-san-pham' => (new HomeController)->postUpdateSanPham(),
    'delete-san-pham' => (new HomeController)->deleteSanPham(),

    'form-hoa-don-chi-tiet' => (new HoaDonController)->formHoaDonChiTiet(),
    'post-cap-nhat-hoa-don' => (new HoaDonController)->postHoaDonChiTiet(),
    'post-search-hoa-don' => (new HoaDonController)->search(),

    'form-add-nha-cung-cap' => (new thuongHieuController)->formAdd(),
    'post-add-nha-cung-cap' => (new thuongHieuController)->postAdd(),
    'form-update-nha-cung-cap' => (new thuongHieuController)->formUpdate(),
    'post-update-nha-cung-cap' => (new thuongHieuController)->postUpdate(),
    'delete-nha-cung-cap' => (new thuongHieuController)->Delete(),

    'form-add-khach-hang' => (new KhachHangController)->formAdd(),
    'post-add-khach-hang' => (new KhachHangController)->postAdd(),
    'form-update-khach-hang' => (new KhachHangController)->formUpdate(),
    'post-update-khach-hang' => (new KhachHangController)->postUpdate(),
    'delete-khach-hang' => (new KhachHangController)->Delete(),

    'form-add-admin' => (new userController)->formAddUser(),
    'post-add-admin' => (new userController)->postAddUser(),
    'form-update-admin' => (new userController)->formUpdateUser(),
    'post-update-admin' => (new userController)->postUpdateUser(),
    'delete-admin' => (new userController)->deleteUser(),
};
