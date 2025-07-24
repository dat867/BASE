<?php

class ProductModel
{
    protected $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

   public function getAll()
{
    $sql = "SELECT p.*, c.name AS category_name 
            FROM product p 
            LEFT JOIN category c ON p.category_id = c.id";
    $stmt = $this->conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function findById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM product WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

   // models/ProductModel.php

public function insert($data)
{
    $stmt = $this->conn->prepare("INSERT INTO product (name, price, image, description, category_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $data['name'],
        $data['price'],
        $data['image'],
        $data['description'],
        $data['category_id']
    ]);
}

public function update($id, $data)
{
    $stmt = $this->conn->prepare("UPDATE product SET name = ?, price = ?, image = ?, description = ?, category_id = ? WHERE id = ?");
    $stmt->execute([
        $data['name'],
        $data['price'],
        $data['image'],
        $data['description'],
        $data['category_id'],
        $id
    ]);
}


    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM product WHERE id = ?");
        $stmt->execute([$id]);
    }
    public function getLatest($limit = 4)
{
    $stmt = $this->conn->prepare("SELECT * FROM product ORDER BY id DESC LIMIT ?");
    $stmt->bindValue(1, $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}
}
