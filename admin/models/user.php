<?php

class users
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function dangnhap($id, $pass)
    {
        try {
            $sql = 'SELECT * FROM admin WHERE email=:id AND password=:pass';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':pass' => $pass
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function GetAll()
    {
        try {
            $sql = 'SELECT * FROM admin ORDER BY id DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function CheckMail($mail)
    {
        try {
            $sql = 'SELECT * FROM admin WHERE email=:mail';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':mail' => $mail]);

            return $stmt->fetch() ? false : true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Insert($password, $name, $image, $so_dien_thoai, $dia_chi, $email)
    {
        try {
            $sql = 'INSERT INTO admin(password, name,hinh_anh,so_dien_thoai,dia_chi,email) VALUES (:password,:name,:image,:so_dien_thoai,:dia_chi,:email)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':image' => $image,
                ':so_dien_thoai' => $so_dien_thoai,
                ':dia_chi' => $dia_chi,
                ':email' => $email,
                ':password' => $password,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Delete($id)
    {
        try {
            $sql = 'DELETE FROM admin WHERE id=:id';
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
            $sql = 'SELECT * FROM admin WHERE id =' . $id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Update($id, $name, $image, $so_dien_thoai, $dia_chi, $email, $password)
    {
        try {
            $sql = 'UPDATE admin SET ten=:name, hinh_anh=:image, so_dien_thoai=:so_dien_thoai, dia_chi=:dia_chi, email=:email, password=:password WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':name' => $name,
                ':image' => $image,
                ':so_dien_thoai' => $so_dien_thoai,
                ':dia_chi' => $dia_chi,
                ':email' => $email,
                ':password' => $password,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
