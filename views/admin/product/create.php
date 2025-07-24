
  <header>
        <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
    </header><?php require_once 'views/layouts/header.php'; ?>

<h2>Thêm sản phẩm</h2>
<form method="POST" action="index.php?action=admin_product_store" enctype="multipart/form-data">
    <label>Tên sản phẩm:</label><br>
    <input type="text" name="name"><br><br>

    <label>Giá:</label><br>
    <input type="number" name="price"><br><br>

    <label>Ảnh:</label><br>
    <input type="file" name="image"><br><br>

    <label>Danh mục:</label><br>
    <select name="category_id">
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Thêm</button>
</form>

<?php require_once 'views/layouts/footer.php'; ?>
