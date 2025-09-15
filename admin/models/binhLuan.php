<?php

class binhLuan
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function GetAll()
    {
        try {
            $sql = 'SELECT binh_luan.*, khach_hang.ten FROM hoa_don
            JOIN khach_hang ON hoa_don.ma_kh = khach_hang.id
            ORDER BY id DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Insert($id, $maKH, $danhgia, $binhluan, $date)
    {
        try {
            $sql = 'INSERT INTO comment(id_san_pham,id_khach_hang,binh_luan,danh_gia,date_time)
             VALUES (:id_san_pham,:id_khach_hang,:binh_luan,:danh_gia,:date_time)';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_san_pham' => $id,
                ':id_khach_hang' => $maKH,
                ':binh_luan' => $binhluan,
                ':danh_gia' => $danhgia,
                ':date_time' => $date,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Delete($id)
    {
        try {
            $sql = 'DELETE FROM comment WHERE id=:id';
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
            $sql = "SELECT comment.*, khach_hang.ten FROM comment
            JOIN khach_hang ON comment.id_khach_hang = khach_hang.id
            where id_san_pham = {$id}
            ORDER BY date_time DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Update($id, $ngayMua, $maKH)
    {
        try {
            $sql = 'UPDATE comment SET ngay_mua=:ngayMua,ma_kh=:maKH WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':ngayMua' => $ngayMua,
                ':maKH' => $maKH,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function UpdatStatus($id, $trangthai)
    {
        try {
            $sql = 'UPDATE comment SET trangthai=:trangthai WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':trangthai' => $trangthai,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
