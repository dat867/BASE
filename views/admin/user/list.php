<?php require_once 'views/layouts/header.php'; ?>

<style>
    .user-container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 30px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    .user-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #34495e;
        font-size: 26px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table thead {
        background-color: #f8f9fa;
    }

    table th, table td {
        padding: 14px;
        border: 1px solid #dee2e6;
        text-align: center;
        font-size: 15px;
    }

    table th {
        color: #2c3e50;
        font-weight: 600;
    }

    table td {
        color: #333;
    }

    .action-btns a {
        display: inline-block;
        margin: 0 4px;
        padding: 6px 12px;
        border-radius: 5px;
        font-size: 14px;
        color: #fff;
        text-decoration: none;
        transition: background 0.2s ease;
    }

    .action-btns .delete {
        background-color: #e74c3c;
    }

    .action-btns .delete:hover {
        background-color: #c0392b;
    }
</style>

<div class="user-container">
    <h2>Quản lý người dùng</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= $user['role'] == 1 ? 'Admin' : 'User' ?></td>
                    <td class="action-btns">
                        <a href="index.php?action=admin_user_delete&id=<?= $user['id'] ?>" class="delete" onclick="return confirm('Xóa người dùng này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php require_once 'views/layouts/footer.php'; ?>
