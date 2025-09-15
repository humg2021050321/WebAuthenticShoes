<?php

class thuongHieuController extends BaseController
{
    public $modelNhaCungCap;

    public function __construct()
    {
        $this->modelNhaCungCap = new thuongHieu;
    }

    public function danhSach()
    {
        $danhSach = $this->modelNhaCungCap->getAll();
        $this->render('./views/Pages/NhaCungCap.php', array('danhSach' => $danhSach));
    }

    public function formAdd()
    {
        $this->render('./views/Pages/formAddNhaCungCap.php');
    }

    public function Delete()
    {
        try {
            $id = $_GET["id"];
            $this->modelNhaCungCap->delete($id);
            header('location: ./?act=nhacungcap');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function postAdd()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tenNhaCungCap = $_POST['ten'];
            $dia_chi = $_POST['dia_chi'];
            $Email = $_POST['email'];
            $soDienThoai = $_POST['so_dien_thoai'];
            if ($this->modelNhaCungCap->Insert($tenNhaCungCap, $dia_chi, $Email, $soDienThoai)) {
                header('location: ./?act=nhacungcap');
            } else {
                echo 'loi khi sua';
            }
        } else {
            header('location: ./?act=form-add-nha-cung-cap');
        }
    }

    public function formUpdate()
    {
        $nhacc = $this->modelNhaCungCap->Get($_GET['id']);
        $this->render('./views/Pages/formUpdateNhaCungCap.php', array('nhacc' => $nhacc));
    }

    public function postUpdate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $tenNhaCungCap = $_POST['ten'];
            $dia_chi = $_POST['dia_chi'];
            $Email = $_POST['email'];
            $soDienThoai = $_POST['so_dien_thoai'];
            if ($this->modelNhaCungCap->Update($id, $tenNhaCungCap, $dia_chi, $Email, $soDienThoai)) {
                header('location: ./?act=nhacungcap');
            } else {
                echo 'loi khi sua';
            }
        } else {
            header('location: ./?act=form-update-nha-cung-cap');
        }
    }
}
