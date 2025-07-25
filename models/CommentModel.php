<?php
require_once 'commons/function.php';

class CommentModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function add($data)
    {
        $sql = "INSERT INTO comment (content, idproduct, iduser, date)
                VALUES (:content, :idproduct, :iduser, :date)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function getByProductId($productId)
    {
        $sql = "SELECT c.*, u.name 
                FROM comment c 
                JOIN user u ON c.iduser = u.id 
                WHERE idproduct = :idproduct 
                ORDER BY date DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['idproduct' => $productId]);
        return $stmt->fetchAll();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM comment WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM comment WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}
