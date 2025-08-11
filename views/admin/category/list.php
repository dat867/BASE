<header>
    <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
</header>

<style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
        background-color: #f4f6f9;
    }

    h2 {
        color: #333;
        margin-bottom: 20px;
    }

    a.btn {
        display: inline-block;
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    a.btn:hover {
        background-color: #45a049;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    .action-links a {
        margin-right: 10px;
        padding: 6px 12px;
        border-radius: 4px;
        color: white;
        text-decoration: none;
        font-size: 13px;
    }

    .action-links a.edit {
        background-color: #ffc107;
    }

    .action-links a.edit:hover {
        background-color: #e0a800;
    }

    .action-links a.delete {
        background-color: #dc3545;
    }

    .action-links a.delete:hover {
        background-color: #c82333;
    }
</style>

<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<h2>Danh sách danh mục</h2>
<a href="index.php?action=admin_category_create" class="btn">+ Thêm danh mục</a>
<br><br>

<table>
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
                    <td class="action-links">
                        <a href="index.php?action=admin_category_edit&id=<?= $category['id'] ?>" class="edit">Sửa</a>
                        <a href="index.php?action=admin_category_delete&id=<?= $category['id'] ?>" class="delete" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
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
