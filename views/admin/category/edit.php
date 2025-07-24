  <header>
        <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
    </header>
<?php require_once 'views/layouts/header.php'; ?>
<h2>Sửa danh mục</h2>

<form action="index.php?action=admin_category_update" method="post">
    <input type="hidden" name="id" value="<?= $category['id'] ?>">
    <label>Tên danh mục:</label><br>
    <input type="text" name="name" value="<?= $category['name'] ?>" required><br><br>
    <button type="submit">Cập nhật</button>
</form>

<?php require_once 'views/layouts/footer.php'; ?>