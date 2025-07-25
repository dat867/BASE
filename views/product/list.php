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
        <img src="uploads/imgproduct/logo.jpg" alt="Logo" height="50px">
    </header>

    <?php require_once __DIR__ . '/../layouts/header.php'; ?>

    <div style="display: flex; justify-content: flex-end; padding: 10px 50px;">
        <form method="GET" action="index.php" style="display: flex;">
            <input type="hidden" name="action" value="product">
            <input type="text" name="keyword" placeholder="Tìm sản phẩm..." 
                   value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>" 
                   style="padding: 8px; border: 1px solid #ccc; border-radius: 4px 0 0 4px;">
            <button type="submit" 
                    style="padding: 8px 12px; background: #333; color: white; border: none; border-radius: 0 4px 4px 0;">
                Tìm
            </button>
        </form>
    </div>

    <h2>Sản phẩm của cửa hàng</h2>

    <div class="product-grid">
        <?php if (!empty($products)) : ?>
            <?php foreach ($products as $item): ?>
                <div class="product">
                    <img src="uploads/imgproduct/<?= htmlspecialchars($item['image']) ?>" 
                         alt="<?= htmlspecialchars($item['name']) ?>">
                    <h3><?= htmlspecialchars($item['name']) ?></h3>
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
