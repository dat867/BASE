  <header>
        <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
    </header>
<?php require_once 'views/layouts/header.php'; ?>
<h2>Thêm danh mục</h2>

<form action="index.php?action=admin_category_store" method="post">
    <label>Tên danh mục:</label><br>
    <input type="text" name="name" required><br><br>
    <button type="submit">Thêm</button>
</form>

<?php require_once 'views/layouts/footer.php'; ?>