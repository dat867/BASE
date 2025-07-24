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
        'role'     => $data['role'] ?? 'user',
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
    $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

}
