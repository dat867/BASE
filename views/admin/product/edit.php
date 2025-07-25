<header>
    <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
</header>
<?php require_once 'views/layouts/header.php'; ?>

<h2>Sửa sản phẩm</h2>
<form action="index.php?action=admin_product_update" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <input type="hidden" name="old_image" value="<?= $product['image'] ?>">

    <label>Tên sản phẩm:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br><br>

    <label>Giá:</label><br>
    <input type="number" name="price" value="<?= $product['price'] ?>" required><br><br>

    <label>Mô tả:</label><br>
    <textarea name="description" required><?= htmlspecialchars($product['description']) ?></textarea><br><br>

    <label>Hình ảnh hiện tại:</label><br>
    <img src="uploads/imgproduct/<?= $product['image'] ?>" alt="" width="100"><br><br>

    <label>Đổi hình ảnh (nếu có):</label><br>
    <input type="file" name="image" accept="image/*"><br><br>

    <label>Danh mục:</label><br>
    <select name="category_id" required>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $product['category_id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat['name']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit" name="update_product">Cập nhật</button>
</form>

<?php require_once 'views/layouts/footer.php'; ?>
