<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sản phẩm - Kai Shop</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 40px;
        }
        .detail-container {
            display: flex;
            gap: 40px;
            max-width: 1000px;
            margin: auto;
        }
        .detail-container img {
            width: 400px;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }
        .detail-info {
            flex: 1;
        }
        .detail-info h2 {
            margin-top: 0;
        }
        .price {
            font-size: 24px;
            color: red;
            font-weight: bold;
            margin: 10px 0;
        }
        .description {
            margin: 20px 0;
        }
    </style>
</head>
<body>
   <header>
        <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
    </header>
   <?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div style="display: flex; gap: 40px; padding: 50px;">
    <div style="flex: 1;">
        <img src="./uploads/imgproduct/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" style="width:100%; height:400px; object-fit:cover; border-radius: 10px;">
    </div>

    <div style="flex: 1;">
        <h2><?= $product['name'] ?></h2>
        <p style="color:red; font-weight:bold; font-size:20px;"><?= number_format($product['price'], 0, ',', '.') ?>đ</p>
        <p><strong>Mô tả:</strong> <?= $product['description'] ?></p>
        <br>

        <a href="index.php?action=order_form&id=<?= $product['id'] ?>" style="display:inline-block; padding:12px 25px; background:#28a745; color:#fff; text-decoration:none; border-radius:5px; font-weight:bold;">
    🛒 Đặt mua ngay
        </a>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>

</body>
</html>
