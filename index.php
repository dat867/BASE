<?php
session_start();

// --- Require các file cấu hình ---
require_once 'commons/env.php';
require_once 'commons/function.php';

// --- Require tất cả controller cần thiết ---
require_once 'controllers/ProductController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/CategoryController.php';

// --- Khởi tạo Controller ---
$productController = new ProductController();
$userController    = new UserController();
$categoryController = new CategoryController();

// --- Lấy action từ URL ---
$action = $_GET['action'] ?? '';

// --- Điều hướng ---
switch ($action) {
    // ----------- TRANG NGƯỜI DÙNG -----------
    case '':
    case 'home':
        require_once 'views/pages/trangchu.php';
        break;

    case 'product':
        $productController->showAll();
        break;

    case 'product_detail':
        $productController->detail();
        break;

    case 'about':
        require_once 'views/pages/about.php';
        break;

    case 'contact':
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name    = $_POST['name'] ?? '';
            $email   = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';
            $message = "Gửi liên hệ thành công! Cảm ơn bạn $name.";
        }
        require 'views/pages/contact.php';
        break;

    case 'login':
        $userController->login();
        break;

    case 'login_post':
        $userController->login();
        break;

    case 'register':
        require_once 'views/auth/register.php';
        break;

    case 'register_post':
        $userController->register();
        break;

    case 'logout':
        $userController->logout();
        break;

    // ----------- TRANG ADMIN -----------
    case 'admin_dashboard':
        authCheck();
        require_once 'views/admin/dashboard.php';
        break;

    // --- QUẢN LÝ SẢN PHẨM ---
    case 'admin_product_list':
        authCheck();
        $productController->adminList();
        break;

    case 'admin_product_create':
        authCheck();
        $productController->create();
        break;

    case 'admin_product_store':
        authCheck();
        $productController->store();
        break;

    case 'admin_product_edit':
        authCheck();
        $productController->edit();
        break;

    case 'admin_product_update':
        authCheck();
        $productController->update();
        break;

    case 'admin_product_delete':
        authCheck();
        $productController->delete();
        break;

    // --- QUẢN LÝ DANH MỤC ---
    case 'admin_category_list':
        authCheck();
        $categoryController->list();
        break;

    case 'admin_category_create':
        authCheck();
        $categoryController->create();
        break;

    case 'admin_category_store':
        authCheck();
        $categoryController->store();
        break;

    case 'admin_category_edit':
        authCheck();
        $categoryController->edit();
        break;

    case 'admin_category_update':
        authCheck();
        $categoryController->update();
        break;

    case 'admin_category_delete':
        authCheck();
        $categoryController->delete();
        break;

    // --- ĐẶT HÀNG ---
    case 'order_form':
        require_once 'views/product/order-form.php';
        break;

    case 'order-submit':
        $name = $_POST['name'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';
        $productId = $_POST['product_id'] ?? 0;

        echo "<script>
            alert('Đặt mua thành công! Cảm ơn bạn $name');
            window.location.href = 'index.php?action=home';
        </script>";
        break;
    case 'user_detail':
    $userController->detail();
    break;
    case 'product-detail': // Nếu dùng URL có dấu gạch ngang
    $productController->detail();
    break;

    default:
        echo "<h1>404 - Không tìm thấy trang</h1>";
        break;
}
