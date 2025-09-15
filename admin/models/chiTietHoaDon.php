<?php

class chiTietHoaDon
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function GetAll()
    {
        try {
            $sql = 'SELECT * FROM chi_tiet_hoa_don ORDER BY id DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function GetChiTiet($id)
    {
        try {
            $sql = 'SELECT chi_tiet_hoa_don.so_luong as soluong,san_pham.* FROM chi_tiet_hoa_don
            JOIN san_pham ON chi_tiet_hoa_don.id_san_pham = san_pham.id
            WHERE id_hoa_don=:id ORDER BY id DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Insert($maHoaDon, $maSP, $soLuong)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_hoa_don(id_hoa_don,id_san_pham,so_luong) VALUES (:maHoaDon,:maSP,:soLuong)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':maHoaDon' => $maHoaDon,
                ':maSP' => $maSP,
                ':soLuong' => $soLuong,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Delete($id)
    {
        try {
            $sql = 'DELETE FROM chi_tiet_hoa_don WHERE id=:id';
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
            $sql = 'SELECT * FROM chi_tiet_hoa_don WHERE id =' . $id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Update($id, $maHoaDon, $maSP, $soLuong)
    {
        try {
            $sql = 'UPDATE chi_tiet_hoa_don SET id_hoa_don=:maHoaDon,id_san_pham=:maSP,so_luong=:soLuong WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':maHoaDon' => $maHoaDon,
                ':maSP' => $maSP,
                ':soLuong' => $soLuong,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
