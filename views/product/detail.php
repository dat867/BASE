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
        .comment-section {
            max-width: 1000px;
            margin: 50px auto;
        }
        .comment-section textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 6px;
            border: 1px solid #ccc;
            resize: vertical;
        }
        .comment-section button {
            padding: 10px 20px;
            background: #007bff;
            border: none;
            color: white;
            font-weight: bold;
            margin-top: 10px;
            border-radius: 6px;
            cursor: pointer;
        }
        .comment-box {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .comment-box strong {
            color: #333;
        }
        .comment-box p {
            margin: 5px 0;
        }
        .delete-btn {
            background: red;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <header>
        <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
    </header>
    <?php require_once __DIR__ . '/../layouts/header.php'; ?>

    <div class="detail-container">
        <div>
            <img src="./uploads/imgproduct/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
        </div>

        <div class="detail-info">
            <h2><?= $product['name'] ?></h2>
            <p class="price"><?= number_format($product['price'], 0, ',', '.') ?>đ</p>
            <p class="description"><strong>Mô tả:</strong> <?= $product['description'] ?></p>
            <a href="index.php?action=order_form&id=<?= $product['id'] ?>" style="display:inline-block; padding:12px 25px; background:#28a745; color:#fff; text-decoration:none; border-radius:5px; font-weight:bold;">
                🛒 Đặt mua ngay
            </a>
        </div>
    </div>

    <div class="comment-section">
        <h3>Bình luận sản phẩm</h3>

        <?php if (isset($_SESSION['user'])): ?>
            <form action="index.php?action=add_comment" method="post">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <textarea name="content" rows="4" placeholder="Viết bình luận..." required></textarea><br>
                <button type="submit">Gửi bình luận</button>
            </form>
        <?php else: ?>
            <p><a href="index.php?action=login">Đăng nhập</a> để bình luận.</p>
        <?php endif; ?>

        <hr>
        <?php foreach ($comments as $c): ?>
            <div class="comment-box">
                <strong><?= htmlspecialchars($c['name']) ?></strong> (<?= $c['date'] ?>):
                <p><?= nl2br(htmlspecialchars($c['content'])) ?></p>

                <?php if (isset($_SESSION['user']) && ($_SESSION['user']['id'] == $c['iduser'] || $_SESSION['user']['role'] == '1')): ?>
                    <form action="index.php" method="get" onsubmit="return confirm('Bạn có chắc muốn xoá bình luận này?');">
                        <input type="hidden" name="action" value="delete_comment">
                        <input type="hidden" name="id" value="<?= $c['id'] ?>">
                        <button type="submit" class="delete-btn">Xoá</button>
                    </form>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <?php require_once __DIR__ . '/../layouts/footer.php'; ?>
</body>
</html>
