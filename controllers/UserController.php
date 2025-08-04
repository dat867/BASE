<?php
require_once 'models/UserModel.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function register()
    {
        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name     = $_POST['name'] ?? '';
            $email    = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($this->userModel->login($email)) {
                $error = "Email đã tồn tại.";
            } else {
                $ok = $this->userModel->register([
                    'name'     => $name,
                    'email'    => $email,
                    'password' => $password,
                    'role'     => 1,
                ]);

                if ($ok) {
                    $success = "Đăng ký thành công! Mời bạn đăng nhập.";
                } else {
                    $error = "Đăng ký thất bại!";
                }
            }
        }

        require_once 'views/auth/register.php';
    }

    public function login()
    {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $email    = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->login($email);

            if ($user && $user['password'] === $password) {
                $_SESSION['user'] = $user;
                header('Location: index.php');
                exit;
            } else {
                $error = "Sai email hoặc mật khẩu.";
            }
        }

        require_once 'views/auth/login.php';
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        header("Location: index.php");
    }

    public function detail()
    {
        if (!isset($_SESSION['user'])) {
            echo "Bạn cần đăng nhập để xem thông tin.";
            return;
        }

        $user = $this->userModel->findById($_SESSION['user']['id']);
        require_once 'views/user/detail.php'; // nếu có
    }
   public function adminList() {
    $users = $this->userModel->getAllUsers();
    require 'views/admin/user/list.php';
    }

public function deleteUser() {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $this->userModel->deleteUserById($id);
    }
    header('Location: index.php?action=admin_user_list');
    exit;
}


}
