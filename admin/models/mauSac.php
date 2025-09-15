<?php

class mauSac
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function GetAll()
    {
        try {
            $sql = 'SELECT * FROM mau_sac ORDER BY id DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Insert($ten)
    {
        try {
            $sql = 'INSERT INTO mau_sac(ten) VALUES (:ten)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten' => $ten,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Delete($id)
    {
        try {
            $sql = 'DELETE FROM mau_sac WHERE id=:id';
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
            $sql = 'SELECT * FROM mau_sac WHERE id =' . $id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Update($id, $ten)
    {
        try {
            $sql = 'UPDATE mau_sac SET ten=:ten WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':ten' => $ten,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
