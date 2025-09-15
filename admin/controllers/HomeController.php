<?php

class HomeController extends BaseController
{
    public $modelSanPham;
    public $modelMauSac;
    public $modelSize;
    public $modelThuongHieu;
    public $modelLoai;
    public $modelBinhLuan;

    public function __construct()
    {
        $this->modelSanPham = new SanPham;
        $this->modelMauSac = new mauSac;
        $this->modelSize = new size;
        $this->modelThuongHieu = new thuongHieu;
        $this->modelLoai = new loai;
        $this->modelBinhLuan = new binhLuan;
    }

    public function danhSachSanPham()
    {
        if (isset($_SESSION['user'])) {
            $currentTime = time();
            if ($currentTime < $_SESSION['expire']) {
                $danhSachSanPham = $this->modelSanPham->GetAll(1);
                $data = array('danhSachSanPham' => $danhSachSanPham);
                $this->render('./views/Pages/Home.php', $data);
            } else {
                $this->render('./views/Pages/dangnhap.php');
            }
        } else {
            $this->render('./views/Pages/dangnhap.php');
        }
    }

    public function Search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $danhSachSanPham = $this->modelSanPham->Search($_POST['timkiem']);
            $this->render('./views/Pages/Home.php', array('danhSachSanPham' => $danhSachSanPham));
        }
    }

    public function danhSachSanPhamUser()
    {
        $danhSachSanPham = $this->modelSanPham->GetAll();
        $data = array('danhSachSanPham' => $danhSachSanPham);
        $this->render('./views/Pages/Home.php', $data);
    }

    public function formAddSanPham()
    {
        if (isset($_SESSION['user'])) {
            $currentTime = time();
            if ($currentTime < $_SESSION['expire']) {
                $listMau = $this->modelMauSac->GetAll();
                $listSize = $this->modelSize->GetAll();
                $listThuongHieu = $this->modelThuongHieu->GetAll();
                $listLoai = $this->modelLoai->GetAll();
                $data = array(
                    'listMau' => $listMau,
                    'listSize' => $listSize,
                    'listThuongHieu' => $listThuongHieu,
                    'listLoai' => $listLoai,
                );
                $this->render('./views/Pages/formAddSanPham.php', $data);
            } else {
                $this->render('./views/Pages/dangnhap.php');
            }
        } else {
            $this->render('./views/Pages/dangnhap.php');
        }
    }

    public function deleteSanPham()
    {
        try {
            $id = $_GET["id"];
            $sanpham = $this->modelSanPham->Get($id);
            if ($sanpham) {
                if ($sanpham['hinh_anh']) {
                    deleteFile($sanpham['hinh_anh']);
                }
                if ($this->modelSanPham->Delete($id)) {
                    header('location: ./');
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function postAddSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['ten'];
            $id_loai = $_POST['id_loai'];
            $id_thuong_hieu = $_POST['id_thuong_hieu'];
            $id_size = $_POST['id_size'];
            $id_mau = $_POST['id_mau'];
            $so_luong = $_POST['so_luong'];
            $gia = $_POST['gia'];
            $mo_ta = $_POST['mo_ta'];
            $hinh_anh = uploadFile($_FILES['hinh_anh'], './uploads/imgproduct/');
            if ($hinh_anh) {
                if ($this->modelSanPham->Insert($ten, $id_loai, $id_thuong_hieu, $id_size, $id_mau, $so_luong, $gia, $hinh_anh, $mo_ta)) {
                    header('location: ./');
                } else {
                    echo 'Lỗi khi thêm sản phẩm';
                }
            }
        } else {
            header('location: ./?act=form-add-san-pham');
        }
    }

    public function formPopup()
    {
        $itemDetail = $this->modelSanPham->Get($_GET['id']);
        $binhluan = $this->modelBinhLuan->Get($_GET['id']);
        $data = array('itemDetail' => $itemDetail, 'binhluan' => $binhluan);
        $this->render('./views/Pages/formPopupDetail.php', $data);
    }

    public function postBinhLuan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_sp'];
            $idKH = $_POST['id_kh'];
            $danhgia = $_POST['danh_gia'];
            $binhluan = $_POST['binh_luan'];
            $date = date('Y-m-d H:i:s');
            if ($this->modelBinhLuan->Insert($id, $idKH, $danhgia, $binhluan, $date)) {
                header("location: ./?act=chi-tiet-san-pham&id={$id}");
            } else {
                echo 'Lỗi khi update';
            }
        }
    }

    public function formUpdateSanPham()
    {
        $sanpham = $this->modelSanPham->Get($_GET['id']);
        $listMau = $this->modelMauSac->GetAll();
        $listSize = $this->modelSize->GetAll();
        $listThuongHieu = $this->modelThuongHieu->GetAll();
        $listLoai = $this->modelLoai->GetAll();
        $data = array(
            'sanpham' => $sanpham,
            'listMau' => $listMau,
            'listSize' => $listSize,
            'listThuongHieu' => $listThuongHieu,
            'listLoai' => $listLoai,
        );
        $this->render('./views/Pages/formUpdateSanPham.php', $data);
    }

    public function postUpdateSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten = $_POST['ten'];
            $id_loai = $_POST['id_loai'];
            $id_thuong_hieu = $_POST['id_thuong_hieu'];
            $id_size = $_POST['id_size'];
            $id_mau = $_POST['id_mau'];
            $so_luong = $_POST['so_luong'];
            $gia = $_POST['gia'];
            $mo_ta = $_POST['mo_ta'];
            $hinh_anh = uploadFile($_FILES['hinh_anh'], './uploads/imgproduct/');
            $old_file = $_POST['old_file'];
            if (empty($hinh_anh)) {
                $hinh_anh = $old_file;
            }

            if ($this->modelSanPham->Update($id, $ten, $id_loai, $id_thuong_hieu, $id_size, $id_mau, $so_luong, $gia, $hinh_anh, $mo_ta)) {
                header('location: ./');
            } else {
                echo 'Lỗi khi update';
            }
        } else {
            header('location: ./?act=form-update-san-pham');
        }
    }
}
