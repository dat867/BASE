<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ - Kai Shop</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; }
        header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #f8f8f8;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        header img {
            height: 50px;
            margin-right: 10px;
        }
        header h1 {
            font-size: 24px;
            color: #333;
        }
        .banner img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }
        h2 {
            text-align: center;
            margin: 30px 0 10px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            padding: 20px 50px;
        }
        .product {
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 10px;
            text-align: center;
        }
        .product img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 4px;
        }
        .product h3 {
            margin: 10px 0 5px;
        }
        .product .price {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <header>
        <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
    </header>

    <?php
require_once __DIR__ . '/../../models/ProductModel.php';
$productModel = new ProductModel();
$latestProducts = $productModel->getLatest(4); // Lấy 4 sản phẩm mới
?>

<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="banner">
    <img src="uploads/imgproduct/banner.png" alt="Banner thời trang" style="width:100%; height:500px; object-fit:cover;">
</div>

<section style="text-align: center; padding: 50px;">
    <h2>Chào mừng đến với Kai Shop!</h2>
    <p>Chuyên cung cấp quần áo và giày dép thời trang</p>
    <a href="index.php?action=product" style="display:inline-block; margin-top:20px; background:#333; color:#fff; padding:10px 20px; border-radius:5px;">Xem tất cả sản phẩm</a>
</section>

<h2 style="text-align:center;">Sản phẩm mới nhất</h2>
<div class="product-grid" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; padding: 20px 50px;">
    <?php if (!empty($latestProducts)) : ?>
        <?php foreach ($latestProducts as $item): ?>
            <div class="product" style="border: 1px solid #ccc; padding:10px; border-radius:6px; text-align:center;">
                <img src="./uploads/imgproduct/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" style="width:100%; height:200px; object-fit:cover; border-radius:4px;">
                <h3><?= $item['name'] ?></h3>
                <p class="price" style="color:red; font-weight:bold;"><?= number_format($item['price'], 0, ',', '.') ?>đ</p>
                <a href="index.php?action=product-detail&id=<?= $item['id'] ?>">Xem chi tiết</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align:center;">Chưa có sản phẩm nào!</p>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>

</body>
</html>
