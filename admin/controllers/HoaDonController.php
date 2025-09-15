<?php
class HoaDonController extends BaseController
{
    public $modelHoaDon;
    public $modelHoaDonChitiet;
    public $modelSanPham;
    public $modelKhachHang;
    public $trangThai = TRANG_THAI;
    public $thanhToan = THANH_TOAN;
    public function __construct()
    {
        $this->modelHoaDon = new hoaDon;
        $this->modelHoaDonChitiet = new chiTietHoaDon;
        $this->modelSanPham = new SanPham;
        $this->modelKhachHang = new khachHang;
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $trangthai = $_POST['trang_thai'];
            $from = $_POST['from_date'];
            $to = $_POST['to_date'];
            $danhSach = $this->modelHoaDon->search($trangthai, $from, $to);
            $this->render('./views/Pages/HoaDon.php', array('danhSach' => $danhSach, 'trangthai' => $trangthai, 'from' => $from, 'to' => $to));
        }
    }
    public function SearchHoaDonUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $trangthai = $_POST['trang_thai'];
            $from = $_POST['from_date'];
            $to = $_POST['to_date'];
            $id_kh=$_SESSION['userKh']['id'];
            $danhSach = $this->modelHoaDon->search($trangthai, $from, $to,$id_kh);
            $this->render('./views/Pages/trangthai.php', array(
                'orders' => $danhSach,
                'trangthai' => $trangthai,
                'from' => $from,
                'to' => $to
            ));
        }
    }

    public function DanhSach()
    {
        $trangthai = "";
        $from = Date("Y-m-d");
        $to = Date("Y-m-d");
        if (isset($_SESSION['user'])) {
            $currentTime = time();
            if ($currentTime < $_SESSION['expire']) {
                $danhSach = $this->modelHoaDon->GetAll();
                $data = array('danhSach' => $danhSach, 'trangthai' => $trangthai, 'from' => $from, 'to' => $to);
                $this->render('./views/Pages/HoaDon.php', $data);
            } else {
                $this->render('./views/Pages/dangnhap.php');
            }
        } else {
            $this->render('./views/Pages/dangnhap.php');
        }
    }

    public function formHoaDonChiTiet()
    {
        $hoadon = $this->modelHoaDon->Get($_GET['id']);
        $khachhang = $this->modelKhachHang->Get($hoadon['id_khach_hang']);
        $chitiet = $this->modelHoaDonChitiet->GetChiTiet($hoadon['id']);
        $data = array(
            'hoadon' => $hoadon,
            'khachhang' => $khachhang,
            'chitiet' => $chitiet,
            'trangThai' => $this->trangThai,
            'thanhToan' => $this->thanhToan,
        );
        $this->render('./views/Pages/hoaDonChiTiet.php', $data);
    }

    public function postHoaDonChiTiet()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $mo_ta = $_POST['mo_ta'];
            $trangthai = $_POST['trangthai'];
            if ($this->modelHoaDon->UpdatStatus($id, $trangthai, $mo_ta)) {
                header('location: ./?act=hoadon');
            }
        }
    }

    public function formHoaDonUser()
    {
        $trangthai = "";
        $from = Date('Y-m-d');
        $to = Date('Y-m-d');
        $orders = $this->modelHoaDon->GetByUser($_GET['id']);
        $this->render('./views/Pages/trangthai.php', array(
            'orders' => $orders,
            'trangthai' => $trangthai,
            'from' => $from,
            'to' => $to
        ));
    }

    public function GetDetail()
    {
        $detail = $this->modelHoaDonChitiet->GetChiTiet($_GET['id']);
        $this->render('./views/Pages/orderDetail.php', array('detail' => $detail));
    }

    public function postHuyDon()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $mo_ta = $_POST['mo_ta'];
            $trangthai = 6;
            if ($this->modelHoaDon->UpdatStatus($id, $trangthai, $mo_ta)) {
                header("location: ./?act=trangthai&id={$_SESSION['userKh']['id']}");
            }
        }
    }

    public function GetCartItems()
    {
        $danhSach = [];
        $items = [];
        if (isset($_COOKIE['cartItems'])) {
            $items = json_decode($_COOKIE['cartItems']);
            $ids = '';
            foreach ($items as $item) {
                $ids .= "{$item->id},";
            }

            $ids = chop($ids, ",");
            $ids = "({$ids})";
            $danhSach = $this->modelSanPham->GetCartItems($ids);
        }

        $this->render('./views/Pages/formPopupCart.php', array('danhSach' => $danhSach, 'items' => $items));
    }

    public function formHoaDon()
    {
        if (isset($_COOKIE['thanhToan'])) {
            $items = json_decode($_COOKIE['thanhToan']);
            $ids = '';
            foreach ($items as $item) {
                $ids .= "{$item->id},";
            }

            $ids = chop($ids, ",");
            $ids = "({$ids})";
            $danhSach = $this->modelSanPham->GetCartItems($ids);
            $this->render('./views/Pages/formAddHoaDon.php', array('danhSach' => $danhSach, 'items' => $items));
        }
    }

    public function postMuaHang()
    {
        try {
            if (isset($_COOKIE['thanhToan']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_POST['id'];
                $tenkh = $_POST['ten'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $dia_chi = $_POST['dia_chi'];
                $thanh_toan = $_POST['thanh_toan'];
                $mo_ta = $_POST['mo_ta'];
                $matkhau = DEFAULT_PASSWORD;

                $items = json_decode($_COOKIE['thanhToan']);
                $cartItems = json_decode($_COOKIE['cartItems']);
                $ids = '';
                foreach ($items as $item) {
                    foreach ($cartItems as $key => $sp) {
                        if ($item->id == $sp->id) {
                            array_splice($cartItems, $key, 1);
                        }
                    }
                    $ids .= "{$item->id},";
                }

                $ids = chop($ids, ",");
                $ids = "({$ids})";
                $danhSach = $this->modelSanPham->GetCartItems($ids);

                if (empty($id)) {
                    $khachhang =  $this->modelKhachHang->GetByPhone($so_dien_thoai);
                    if ($khachhang) {
                        $id = $khachhang['id'];
                    } else {
                        $this->modelKhachHang->Insert($tenkh, $so_dien_thoai, $matkhau, $dia_chi);
                        $khachhang =  $this->modelKhachHang->GetByPhone($so_dien_thoai);
                        $id = $khachhang['id'];
                    }
                } else {
                    $this->modelKhachHang->UpdateInfor($id, $tenkh, $so_dien_thoai, $dia_chi);
                }

                $date = date('Y-m-d H:i:s');
                $hoadon = $this->modelHoaDon->Insert($date, $thanh_toan, $id, $mo_ta);
                foreach ($danhSach as $item) {
                    foreach ($items as $sp) {
                        if ($item['id'] == $sp->id) {
                            $this->modelHoaDonChitiet->Insert($hoadon, $item['id'], $sp->so_luong);
                            $this->modelSanPham->UpdateSp($item['id'], intval($item['so_luong']) - intval($sp->so_luong));
                            continue;
                        }
                    }
                }

                setcookie('cartItems', json_encode($cartItems));
                setcookie('thanhToan', '');
                header('location: ./');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
