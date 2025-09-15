<?php

class khachHang
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function GetAll()
    {
        try {
            $sql = 'SELECT * FROM khach_hang ORDER BY id DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function Insert($tenKH, $soDienThoai, $matkhau, $diaChi)
    {
        try {
            $sql = 'INSERT INTO khach_hang(ten,so_dien_thoai,password,dia_chi) VALUES (:tenKH,:soDienThoai,:matkhau,:diaChi)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tenKH' => $tenKH,
                ':soDienThoai' => $soDienThoai,
                'matkhau' => $matkhau,
                ':diaChi' => $diaChi,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Delete($id)
    {
        try {
            $sql = 'DELETE FROM khach_hang WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Get($id)
    {
        try {
            $sql = 'SELECT * FROM khach_hang WHERE id =:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function GetByPhone($so_dien_thoai)
    {
        try {
            $sql = 'SELECT * FROM khach_hang WHERE so_dien_thoai =:so_dien_thoai';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':so_dien_thoai' => $so_dien_thoai]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function dangnhap($so_dien_thoai, $password)
    {
        try {
            $sql = 'SELECT * FROM khach_hang WHERE so_dien_thoai =:id AND password=:password';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $so_dien_thoai, ':password' => $password]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function CheckExists($so_dien_thoai)
    {
        try {
            $sql = 'SELECT * FROM khach_hang WHERE so_dien_thoai =:so_dien_thoai';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':so_dien_thoai' => $so_dien_thoai]);

            return $stmt->fetch() ? false : true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Update($id, $tenKH, $soDienThoai, $password, $diaChi)
    {
        try {
            $sql = 'UPDATE khach_hang SET ten=:tenKH,so_dien_thoai=:soDienThoai,password=:password, dia_chi=:diaChi WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':tenKH' => $tenKH,
                ':soDienThoai' => $soDienThoai,
                ':password' => $password,
                ':diaChi' => $diaChi,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function UpdateInfor($id, $tenKH, $soDienThoai, $diaChi)
    {
        try {
            $sql = 'UPDATE khach_hang SET ten=:tenKH,so_dien_thoai=:soDienThoai, dia_chi=:diaChi WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':tenKH' => $tenKH,
                ':soDienThoai' => $soDienThoai,
                ':diaChi' => $diaChi,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
