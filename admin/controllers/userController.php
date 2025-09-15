<?php

class userController extends BaseController
{
    public $modelUser;
    public $modelSanPham;

    public function __construct()
    {
        $this->modelUser = new users;
        $this->modelSanPham = new SanPham;
        if (isset($_SESSION['user'])) {
            $currentTime = time();
            if ($currentTime >= $_SESSION['expire']) {
                $this->render('./views/Pages/dangnhap.php');
            }
        } else {
            $this->render('./views/Pages/dangnhap.php');
        }
    }

    public function danhSach()
    {
        $danhSach = $this->modelUser->getAll();
        $data = array('danhSach' => $danhSach);
        $this->render('./views/Pages/Users.php', $data);
    }

    public function dangnhap()
    {
        if (isset($_SESSION['user'])) {
            $currentTime = time();
            if ($currentTime < $_SESSION['expire']) {
                $danhSachSanPham = $this->modelSanPham->getAll();
                $this->render('./views/Pages/Home.php', array('danhSachSanPham' => $danhSachSanPham));
            } else {
                $this->render('./views/Pages/dangnhap.php');
            }
        } else {
            $this->render('./views/Pages/dangnhap.php');
        }
    }

    public function dangxuat()
    {
        unset($_SESSION['user']);
        unset($_SESSION['token']);
        unset($_SESSION['startat']);
        unset($_SESSION['expire']);
        header('location: ./');
    }

    public function postDangnhap()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $pass = $_POST['pass'];
            $users = $this->modelUser->dangnhap($id, $pass);
            if ($users) {
                $token = bin2hex(random_bytes(64));
                $_SESSION['user'] = $users;
                $_SESSION['token'] = $token;
                $_SESSION['startat'] = date("d/m/Y H:i:s");
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (120 * 60);
                header('location: ./?act=home');
            } else {
                echo '<script>  alert("Email hoặc mật khẩu không đúng.");</script>';
                $this->render('./views/Pages/dangnhap.php');
            }
        } else {
            header('location: ./');
        }
    }

    public function formAddUser()
    {
        $this->render('./views/Pages/dangki.php');
    }

    public function deleteUser()
    {
        try {
            $id = $_GET["id"];
            $sanpham = $this->modelUser->Get($id);
            if ($sanpham) {
                if ($sanpham['hinh_anh']) {
                    deleteFile($sanpham['hinh_anh']);
                }
                if ($this->modelUser->Delete($id)) {
                    header('location: ./?act=quanly');
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function postAddUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hinhAnh = uploadFile($_FILES['hinhanh'], './uploads/imguser/');
            if ($hinhAnh) {
                if ($this->modelUser->CheckMail($email)) {
                    if ($this->modelUser->Insert($password, $name, $hinhAnh, $so_dien_thoai, $dia_chi, $email)) {
                        header('location: ./?act=quanly');
                    } else {
                        echo '<script>  alert("Lỗi khi thêm");</script>';
                        $this->render('./views/Pages/dangki.php');
                    }
                } else {
                }
                echo '<script>  alert("Email đã tồn tại");</script>';
                $this->render('./views/Pages/dangki.php');
            }
        } else {
            header('location: ./?act=form-add-admin');
        }
    }

    public function formUpdateUser()
    {
        $user = $this->modelUser->Get($_GET['id']);
        $this->render('./views/Pages/updateadmin.php', array('user' => $user));
    }

    public function postUpdateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['ten'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $old_file = $_POST['old_file'];
            $hinhAnh = uploadFile($_FILES['hinhanh'], './uploads/imguser/');
            if (empty($hinhAnh)) {
                $hinhAnh = $old_file;
            }
            if ($this->modelUser->Update($id, $name, $hinhAnh, $so_dien_thoai, $dia_chi, $email, $password)) {
                header('location: ./?act=quanly');
            } else {
                echo '<script>  alert("Lỗi khi sửa");</script>';
                $this->render('./views/Pages/updateadmin.php');
            }
        } else {
            header('location: ./?act=form-update-admin');
        }
    }
}
