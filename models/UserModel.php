<?php
class UserModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function register($data)
    {
    $sql = "INSERT INTO user (name, email, password, role, active, image)
            VALUES (:name, :email, :password, :role, :active, :image)";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([
        'name'     => $data['name'],
        'email'    => $data['email'],
        'password' => $data['password'],
        'role' => isset($data['role']) && $data['role'] == 1 ? 1 : 0,
        'active'   => 1,
        'image'    => '' // hoặc NULL nếu cột cho phép NULL
    ]);
    }


    public function login($email)
    {
        $sql = "SELECT * FROM user WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }
    public function findById($id)
{
    $stmt = $this->conn->prepare("SELECT * FROM user WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}
    public function updateUser($id, $name, $email, $password)
{
    $sql = "UPDATE user SET name = ?, email = ?, password = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$name, $email, $password, $id]);
}

public function getAllUsers() {
    $stmt = $this->conn->prepare("SELECT * FROM user ORDER BY id DESC");
    $stmt->execute();
    return $stmt->fetchAll();
}

public function deleteUserById($id) {
    $stmt = $this->conn->prepare("DELETE FROM user WHERE id = ?");
    return $stmt->execute([$id]);
}


}
