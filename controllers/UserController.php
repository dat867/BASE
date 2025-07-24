<?php
require_once './models/UserModel.php';

class UserController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email    = $_POST['email'];
            $password = $_POST['password'];
            $user     = $this->userModel->login($email);

            // So sánh mật khẩu trực tiếp, không mã hóa
            if ($user && $password === $user['password']) {
                $_SESSION['user'] = $user;
                if ($user['role'] === 'admin') {
             header('Location: ' . BASE_URL . 'index.php?action=admin_dashboard');
            } else {
            header('Location: ' . BASE_URL . 'index.php');
            }
                exit;
            } else {
                $error = "Email hoặc mật khẩu không đúng!";
            }
        }

        require './views/auth/login.php';
    }

    public function register()
    {
        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name     = $_POST['name'];
            $email    = $_POST['email'];
            $password = $_POST['password'];

            // Kiểm tra email đã tồn tại chưa
            if ($this->userModel->login($email)) {
                $error = "Email đã tồn tại!";
            } else {
                $data = [
                    'name'     => $name,
                    'email'    => $email,
                    'password' => $password, // Không mã hóa
                    'role'     => 'user'
                ];
                $result = $this->userModel->register($data);
                if ($result) {
                    $success = "Đăng ký thành công! Mời bạn đăng nhập.";
                } else {
                    $error = "Lỗi khi đăng ký!";
                }
            }
        }

        require './views/auth/register.php';
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: index.php');
        exit;
    }
    public function detail()
{
    $id = $_GET['id'] ?? null;
    if ($id) {
        $user = $this->userModel->findById($id);
        if ($user) {
            require './views/user/detail.php';
        } else {
            echo "Không tìm thấy user với ID = $id!";
        }
    } else {
        echo "ID user không hợp lệ!";
    }
}
}
