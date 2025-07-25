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

    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product['id']) ?></td>
            <td><?= htmlspecialchars($product['name']) ?></td>
            <td><?= htmlspecialchars($product['price']) ?></td>
            <td><img src="uploads/imgproduct/<?= htmlspecialchars($product['image']) ?>" width="50" alt=""></td>
            <td><?= htmlspecialchars($product['description']) ?></td>
            <td><?= htmlspecialchars($product['category_name'] ?? 'Chưa có') ?></td>
            <td>
                <a href="index.php?action=admin_product_edit&id=<?= $product['id'] ?>">Sửa</a> | 
                <a href="index.php?action=admin_product_delete&id=<?= $product['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'views/layouts/footer.php'; ?>
