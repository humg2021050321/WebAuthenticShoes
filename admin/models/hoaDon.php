<?php

class hoaDon
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function GetAll()
    {
        try {
            $sql = 'SELECT hoa_don.*, khach_hang.ten FROM hoa_don
            JOIN khach_hang ON hoa_don.id_khach_hang = khach_hang.id
            ORDER BY ngay_dat DESC, id desc';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function search($trang_thai, $from, $to, $id_khach_hang = "")
    {
        try {
            $sql = "SELECT hoa_don.*, khach_hang.ten FROM hoa_don
            JOIN khach_hang ON hoa_don.id_khach_hang = khach_hang.id
            WHERE 1 = 1 ";
            if ($trang_thai) {
                $sql .= "and trang_thai = {$trang_thai} ";
            }
            if ($from) {
                $sql .= "and ngay_dat >= '{$from}' ";
            }
            if ($to) {
                $sql .= "and ngay_dat <= '{$to}' ";
            }
            if ($id_khach_hang) {
                $sql .= "and hoa_don.id_khach_hang = {$id_khach_hang} ";
            }
            $sql .= 'ORDER BY ngay_dat DESC, hoa_don.id desc';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Insert($ngay_dat, $thanh_toan, $id_khach_hang, $mo_ta)
    {
        try {
            $sql = 'INSERT INTO hoa_don(ngay_dat,thanh_toan,id_khach_hang,mo_ta) VALUES (:ngay_dat,:thanh_toan,:id_khach_hang,:mo_ta)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ngay_dat' => $ngay_dat,
                ':thanh_toan' => $thanh_toan,
                ':id_khach_hang' => $id_khach_hang,
                ':mo_ta' => $mo_ta,
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Delete($id)
    {
        try {
            $sql = 'DELETE FROM hoa_don WHERE id=:id';
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
            $sql = 'SELECT hoa_don.*, khach_hang.ten FROM hoa_don
            JOIN khach_hang ON hoa_don.id_khach_hang = khach_hang.id WHERE hoa_don.id =' . $id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function GetByUser($id)
    {
        try {
            $sql = 'SELECT hoa_don.*, khach_hang.ten FROM hoa_don
            JOIN khach_hang ON hoa_don.id_khach_hang = khach_hang.id WHERE id_khach_hang =' . $id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Update($id, $ngay_dat, $id_khach_hang)
    {
        try {
            $sql = 'UPDATE hoa_don SET ngay_dat=:ngay_dat,id_khach_hang=:id_khach_hang WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':ngay_dat' => $ngay_dat,
                ':id_khach_hang' => $id_khach_hang,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function UpdatStatus($id, $trang_thai, $mo_ta)
    {
        try {
            $sql = 'UPDATE hoa_don SET trang_thai=:trangthai,mo_ta=:mo_ta ';
            if ($trang_thai == 5) {
                $ngayGiao = Date('Y-m-d');
                $sql .= ",ngay_giao = '{$ngayGiao}'";
            }
            $sql .= ' WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':trangthai' => $trang_thai,
                ':mo_ta' => $mo_ta,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
