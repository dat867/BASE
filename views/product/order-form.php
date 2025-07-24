<?php
require_once __DIR__ . '/../../models/ProductModel.php';
$productModel = new ProductModel();
$product = $productModel->findById($_GET['id'] ?? 0);
?>
   <header>
        <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
    </header>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div style="max-width:600px; margin:50px auto; border:1px solid #ccc; padding:30px; border-radius:10px;">
    <h2>Đặt mua: <?= $product['name'] ?></h2>
    <form action="index.php?action=order-submit" method="post">
        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
        
        <label>Họ tên:</label><br>
        <input type="text" name="name" required style="width:100%; padding:8px; margin:10px 0;"><br>

        <label>Số điện thoại:</label><br>
        <input type="text" name="phone" required style="width:100%; padding:8px; margin:10px 0;"><br>

        <label>Địa chỉ giao hàng:</label><br>
        <textarea name="address" required style="width:100%; padding:8px; margin:10px 0;" rows="3"></textarea><br>

        <button type="submit" style="background:#28a745; color:#fff; padding:10px 20px; border:none; border-radius:5px;">Xác nhận mua</button>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
