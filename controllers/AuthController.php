<?php
require_once 'models/UserModel.php';

class AuthController
{
    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id       = $_SESSION['user']['id'];
            $name     = $_POST['name'];
            $email    = $_POST['email'];
            $password = $_POST['password'];


            $userModel = new UserModel();
            $userModel->updateUser($id, $name, $email, $password);

            // Cập nhật lại session
            $_SESSION['user']['name']  = $name;
            $_SESSION['user']['email'] = $email;

            // Thông báo & chuyển trang
            echo "<script>alert('Cập nhật thông tin thành công!'); window.location.href='index.php';</script>";
            exit;
        }
    }
}
