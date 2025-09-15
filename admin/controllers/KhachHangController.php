<?php
class KhachHangController extends BaseController
{
    public $modelKhachHang;
    public function __construct()
    {
        $this->modelKhachHang = new khachHang;
    }

    public function danhSach()
    {
        $danhSach = $this->modelKhachHang->getAll();
        $this->render('./views/Pages/KhachHang.php', array('danhSach' => $danhSach));
    }

    

    public function formAdd()
    {
        $this->render('./views/Pages/formAddkhachHang.php');
    }

    public function formDangKy()
    {
        $this->render('./views/Pages/formDangKy.php');
    }

    public function postDangKy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $password = $_POST['password'];
            if ($this->modelKhachHang->CheckExists($so_dien_thoai)) {
                if ($this->modelKhachHang->Insert($name, $so_dien_thoai,  $password, $dia_chi)) {
                    header('location: ./?act=dang-nhap');
                }
            } else {
                echo '<script>  alert("Số điện thoại đã tồn tại.");</script>';
                $this->render('./views/Pages/formDangKy.php');
            }
        } else {
            header('location: ./?act=form-dang-ky');
        }
    }

    public function formDangNhap()
    {
        $this->render('./views/Pages/formDangNhap.php');
    }

    public function postDangNhap()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $pass = $_POST['pass'];
            $users = $this->modelKhachHang->dangnhap($id, $pass);
            if ($users) {
                $token = bin2hex(random_bytes(64));
                $_SESSION['userKh'] = $users;
                $_SESSION['tokenKh'] = $token;
                $_SESSION['startatKh'] = date("d/m/Y H:i:s");
                $_SESSION['start'] = time();
                $_SESSION['expireKh'] = $_SESSION['start'] + (120 * 60);
                header('location: ./');
            } else {
                echo '<script>  alert("Số điện thoại hoặc mật khẩu không đúng.");   </script>';
                $this->render('./views/Pages/formDangNhap.php');
            }
        } else {
            header('location: ./');
        }
    }

    public function dangxuat()
    {
        unset($_SESSION['userKh']);
        unset($_SESSION['tokenKh']);
        unset($_SESSION['startatKh']);
        unset($_SESSION['expireKh']);
        header('location: ./');
    }

    public function formUpdateUser()
    {
        $user = $this->modelKhachHang->Get($_GET['id']);
        $this->render('./views/Pages/formUpdateUser.php', array('user' => $user));
    }

    public function postUpdateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $password = $_POST['password'];
            if ($this->modelKhachHang->Update($id, $name, $so_dien_thoai,  $password, $dia_chi)) {
                header('location: ./');
            }
        } else {
            header('location: ./?act=form-update-user');
        }
    }

    public function postAdd()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $password = $_POST['password'];
            if ($this->modelKhachHang->CheckExists($so_dien_thoai)) {
                if ($this->modelKhachHang->Insert($name, $so_dien_thoai,  $password, $dia_chi)) {
                    header('location: ./?act=khachhang');
                }
            } else {
                echo '<script>  alert("Số điện thoại đã tồn tại.");</script>';
                $this->render('./views/Pages/formAddkhachHang.php');
            }
        } else {
            header('location: ./?act=form-add-khach-hang');
        }
    }

    public function formUpdate()
    {
        $khachHang = $this->modelKhachHang->Get($_GET['id']);
        $this->render('./views/Pages/formUpdateKhachHang.php', array('khachHang' => $khachHang));
    }

    public function postUpdate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $password = $_POST['password'];
            if ($this->modelKhachHang->Update($id, $name, $so_dien_thoai,  $password, $dia_chi)) {
                header('location: ./?act=khachhang');
            }
        } else {
            header('location: ./?act=form-update-khach-hang');
        }
    }

    public function delete()
    {
        try {
            $id = $_GET["id"];
            $this->modelKhachHang->delete($id);
            header('location: ./?act=khachhang');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
