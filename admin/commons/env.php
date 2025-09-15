<?php

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL', 'http://shoe-shop/');

define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'shoeshop');  // Tên database

define('PATH_ROOT', __DIR__ . '/../');

define('DEFAULT_PASSWORD','9999');
define('TIEN_GIAO_HANG','30000');
define('TRANG_THAI',[1 => 'Chưa xác nhận', 2 => 'Đã xác nhận', 3 => 'Đang Giao Hàng', 4 => 'Đã nhận hàng', 5 => 'Giao Hàng Thành Công', 6 => 'Hủy']);
define('THANH_TOAN',[1 => 'Thanh Toán Online', 2 => 'Thanh Toán Khi Nhận Hàng']);
