<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <style>
        body { font-family: sans-serif; padding: 30px; margin: 0; }
        h2 { text-align: center; }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin: 30px 50px;
        }
        .product {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }
        .product img {
            width: 100%;
            height: 180px;
            object-fit: cover;
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
    <?php require_once __DIR__ . '/../layouts/header.php'; ?>

    <h2>Sản phẩm của cửa hàng</h2>

    <div class="product-grid">
        <?php if (!empty($products)) : ?>
            <?php foreach ($products as $item): ?>
                <div class="product">
                    <img src="./uploads/imgproduct/<?= $item['image'] ?>" alt="<?= $item['name'] ?>">
                    <h3><?= $item['name'] ?></h3>
                    <p class="price"><?= number_format($item['price'], 0, ',', '.') ?>đ</p>
                    <a href="index.php?action=product-detail&id=<?= $item['id'] ?>">Xem chi tiết</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align: center;">Không có sản phẩm nào!</p>
        <?php endif; ?>
    </div>

    <?php require_once __DIR__ . '/../layouts/footer.php'; ?>

</body>
</html>
