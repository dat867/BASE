<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm</title>
    <style>
        body { font-family: sans-serif; padding: 20px; margin: 0; }
        h2 { text-align: center; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
            vertical-align: middle;
        }
        img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 6px;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
            color: white;
        }
        .btn-add { background: #007bff; margin-bottom: 15px; display: inline-block; }
        .btn-edit { background: #28a745; }
        .btn-delete { background: #dc3545; }
        .btn:hover { opacity: 0.9; }
    </style>
</head>
<body>

<?php require_once 'views/layouts/header.php'; ?>

<h2>Danh sách sản phẩm</h2>

<a href="index.php?action=admin_product_create" class="btn btn-add">+ Thêm sản phẩm mới</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
            <th>Danh mục</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($products)) : ?>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= number_format($product['price']) ?>đ</td>
                    <td>
                       <img src="uploads/imgproduct/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                    </td>
                    <td><?= htmlspecialchars($product['description']) ?></td>
                    <td><?= htmlspecialchars($product['category_name']) ?></td>
                    <td>
                        <a href="index.php?action=admin_product_edit&id=<?= $product['id'] ?>" class="btn btn-edit">Sửa</a>
                        <a href="index.php?action=admin_product_delete&id=<?= $product['id'] ?>" class="btn btn-delete" onclick="return confirm('Bạn chắc chắn muốn xoá?')">Xoá</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr><td colspan="7">Chưa có sản phẩm nào.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once 'views/layouts/footer.php'; ?>

</body>
</html>
