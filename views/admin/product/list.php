<header>
    <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
</header>
<?php require_once 'views/layouts/header.php'; ?>

<h2>Danh sách sản phẩm</h2>

<a href="index.php?action=admin_product_create">+ Thêm sản phẩm mới</a>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Giá</th>
        <th>Hình ảnh</th>
        <th>Mô tả</th>
        <th>Danh mục</th>
        <th>Hành động</th>
    </tr>

    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
    <?php foreach ($products as $product): ?>
        <div style="width: 220px; border: 1px solid #ccc; padding: 10px; border-radius: 10px; text-align: center;">
            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" 
                 style="width: 200px; height: 200px; object-fit: cover; border-radius: 8px;">
            <h3><?= $product['name'] ?></h3>
            <p><?= number_format($product['price']) ?>đ</p>
            <a href="index.php?action=product_detail&id=<?= $product['id'] ?>">Xem chi tiết</a>
        </div>
    <?php endforeach; ?>
</div>
</table>

<?php require_once 'views/layouts/footer.php'; ?>
