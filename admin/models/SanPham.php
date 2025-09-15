<?php

class SanPham
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function GetAll()
    {
        try {
            $sql = 'SELECT san_pham.* 
            ,thuong_hieu.ten as thuong_hieu
            ,size.size
            ,loai_giay.ten as loai
            ,mau_sac.ten as mau
            ,avg(comment.danh_gia) as danh_gia 
            FROM san_pham
            LEFT JOIN size ON san_pham.id_size = size.id
            LEFT JOIN loai_giay ON san_pham.id_loai = loai_giay.id
            LEFT JOIN thuong_hieu ON san_pham.id_thuong_hieu = thuong_hieu.id
            LEFT JOIN mau_sac ON san_pham.id_mau = mau_sac.id
            LEFT JOIN comment ON san_pham.id = comment.id_san_pham
            GROUP BY san_pham.id 
            ORDER BY id DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function Search($condition)
    {
        try {
            $sql = "SELECT san_pham.* ,thuong_hieu.ten as thuong_hieu,size.size,loai_giay.ten as loai,mau_sac.ten as mau FROM san_pham
            LEFT JOIN size ON san_pham.id_size = size.id
            LEFT JOIN loai_giay ON san_pham.id_loai = loai_giay.id
            LEFT JOIN thuong_hieu ON san_pham.id_thuong_hieu = thuong_hieu.id
            LEFT JOIN mau_sac ON san_pham.id_mau = mau_sac.id";
            if (empty($condition)) {
                $sql .= " ORDER BY id DESC";
            } else {
                $sql .= " WHERE san_pham.ten LIKE N'%{$condition}%' ORDER BY id DESC";
            }

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function GetCartItems($ids)
    {
        try {
            $sql = "SELECT * FROM san_pham WHERE id IN {$ids} ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Insert($ten, $id_loai, $id_thuong_hieu, $id_size, $id_mau, $so_luong, $gia, $hinh_anh, $mo_ta)
    {
        try {
            $sql = 'INSERT INTO san_pham(ten,id_loai,id_thuong_hieu,id_size,id_mau,so_luong,gia,hinh_anh,mo_ta) 
            VALUES (:ten,:id_loai,:id_thuong_hieu,:id_size,:id_mau,:so_luong,:gia,:hinh_anh,:mo_ta)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten' => $ten,
                ':id_loai' => $id_loai,
                ':id_thuong_hieu' => $id_thuong_hieu,
                ':id_size' => $id_size,
                ':id_mau' => $id_mau,
                ':so_luong' => $so_luong,
                ':gia' => $gia,
                ':hinh_anh' => $hinh_anh,
                ':mo_ta' => $mo_ta,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Delete($id)
    {
        try {
            $sql = 'DELETE FROM san_pham WHERE id=:id';
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
            // Thêm JOIN với các bảng để lấy tên màu và kích thước
            $sql = 'SELECT san_pham.*, 
                       thuong_hieu.ten as thuong_hieu,
                       size.size as size,
                       loai_giay.ten as loai,
                       mau_sac.ten as mau
                FROM san_pham
                LEFT JOIN size ON san_pham.id_size = size.id
                LEFT JOIN loai_giay ON san_pham.id_loai = loai_giay.id
                LEFT JOIN thuong_hieu ON san_pham.id_thuong_hieu = thuong_hieu.id
                LEFT JOIN mau_sac ON san_pham.id_mau = mau_sac.id
                WHERE san_pham.id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Update($id, $ten, $id_loai, $id_thuong_hieu, $id_size, $id_mau, $so_luong, $gia, $hinh_anh, $mo_ta)
    {
        try {
            $sql = 'UPDATE san_pham SET ten=:ten,id_loai=:id_loai,id_thuong_hieu=:id_thuong_hieu,id_size=:id_size,id_mau=:id_mau,so_luong=:so_luong,gia=:gia,hinh_anh=:hinh_anh,mo_ta=:mo_ta WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':ten' => $ten,
                ':id_loai' => $id_loai,
                ':id_thuong_hieu' => $id_thuong_hieu,
                ':id_size' => $id_size,
                ':id_mau' => $id_mau,
                ':so_luong' => $so_luong,
                ':gia' => $gia,
                ':hinh_anh' => $hinh_anh,
                ':mo_ta' => $mo_ta,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function UpdateSp($id, $soLuong)
    {
        try {
            $sql = 'UPDATE san_pham SET so_luong=:soLuong WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':soLuong' => $soLuong,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
