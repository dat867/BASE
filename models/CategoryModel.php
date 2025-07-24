<?php

class CategoryModel
{
    protected $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM category");
        return $stmt->fetchAll();
    }

    public function findById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM category WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function insert($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO category (name) VALUES (?)");
        $stmt->execute([$data['name']]);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE category SET name = ? WHERE id = ?");
        $stmt->execute([$data['name'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM category WHERE id = ?");
        $stmt->execute([$id]);
    }
}
