<?php require_once __DIR__ . '/../../commons/env.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kai Shop</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; }
        .navbar {
            background-color: #222;
            padding: 15px 0;
            text-align: center;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 20px;
            font-weight: bold;
            font-size: 18px;
        }
        .navbar a:hover {
            color: #f39c12;
        }
        .welcome {
            background: #f1f1f1;
            padding: 10px;
            text-align: right;
            font-size: 14px;
        }
    </style>
</head>
<body>

<?php if (isset($_SESSION['user'])): ?>
    <div class="welcome">
        Xin chào, <?= htmlspecialchars($_SESSION['user']['name']) ?> |
        <a href="index.php?action=logout">Đăng xuất</a>
    </div>
<?php endif; ?>

<div class="navbar">
    <a href="<?= BASE_URL ?>index.php">Trang chủ</a>
    <a href="<?= BASE_URL ?>index.php?action=product">Sản phẩm</a>
    <a href="<?= BASE_URL ?>index.php?action=about">Giới thiệu</a>
    <a href="<?= BASE_URL ?>index.php?action=contact">Liên hệ</a>
    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
        | <a href="index.php?action=admin_dashboard">Quản trị</a>
    <?php endif; ?>

    <?php if (!isset($_SESSION['user'])): ?>
        <a href="<?= BASE_URL ?>index.php?action=login">Đăng nhập</a>
        <a href="<?= BASE_URL ?>index.php?action=register">Đăng ký</a>
    <?php endif; ?>
</div>
