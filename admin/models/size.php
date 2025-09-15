<?php

class size
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function GetAll()
    {
        try {
            $sql = 'SELECT * FROM size ORDER BY id DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Insert($size)
    {
        try {
            $sql = 'INSERT INTO size(size) VALUES (:size)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':size' => $size,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Delete($id)
    {
        try {
            $sql = 'DELETE FROM size WHERE id=:id';
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
            $sql = 'SELECT * FROM size WHERE id =' . $id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Update($id, $size)
    {
        try {
            $sql = 'UPDATE size SET size=:size WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':size' => $size,
            ]);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
