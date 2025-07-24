  <header>
        <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
    </header>
<?php require_once 'views/layouts/header.php'; ?>

<h2>Trang quản trị</h2>
<p>Chào mừng <?= $_SESSION['user']['name'] ?> đến với trang quản trị!</p>

<ul>
    <li><a href="index.php?action=admin_product_list">Quản lý sản phẩm</a></li>
    <li><a href="index.php?action=admin_category_list">Quản lý danh mục</a></li>
</ul>

<?php require_once 'views/layouts/footer.php'; ?>
