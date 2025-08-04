<header>
    <img src="uploads/imgproduct/logo.jpg" alt="Logo" height="50px">
</header>

<?php require_once 'views/layouts/header.php'; ?>

<style>
    .admin-dashboard {
        max-width: 600px;
        margin: 30px auto;
        padding: 20px;
        border-radius: 12px;
        background: #f5f5f5;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    .admin-dashboard h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .admin-dashboard p {
        text-align: center;
        font-size: 16px;
        color: #555;
        margin-bottom: 20px;
    }

    .admin-dashboard ul {
        list-style: none;
        padding: 0;
        text-align: center;
    }

    .admin-dashboard li {
        margin: 10px 0;
    }

    .admin-dashboard a {
        text-decoration: none;
        color: #3498db;
        font-size: 18px;
        font-weight: 500;
        transition: color 0.3s;
    }

    .admin-dashboard a:hover {
        color: #1abc9c;
    }
</style>

<div class="admin-dashboard">
    <h2>Trang quản trị</h2>
    <p>Chào mừng <strong><?= $_SESSION['user']['name'] ?></strong> đến với trang quản trị!</p>

    <ul>
        <li><a href="index.php?action=admin_product_list"> Quản lý sản phẩm</a></li>
        <li><a href="index.php?action=admin_category_list"> Quản lý danh mục</a></li>
        <li><a href="index.php?action=admin_user_list">Quản lý người dùng</a></li>
    </ul>
</div>

<?php require_once 'views/layouts/footer.php'; ?>
