  <header>
        <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
    </header>
<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<h2>Danh sách danh mục</h2>
<a href="index.php?action=admin_category_create">Thêm danh mục</a>
<br><br>

<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($categories)) : ?>
            <?php foreach ($categories as $category) : ?>
                <tr>
                    <td><?= $category['id'] ?></td>
                    <td><?= $category['name'] ?></td>
                    <td>
                        <a href="index.php?action=admin_category_edit&id=<?= $category['id'] ?>">Sửa</a> |
                        <a href="index.php?action=admin_category_delete&id=<?= $category['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="3">Chưa có danh mục nào.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
