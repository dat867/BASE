<?php require_once __DIR__ . '/../../commons/env.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập nhật thông tin</title>
    <style>
        .profile-form {
            max-width: 500px;
            margin: 30px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            font-family: sans-serif;
        }

        .profile-form h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .profile-form label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        .profile-form input[type="text"],
        .profile-form input[type="email"],
        .profile-form input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .profile-form button {
            width: 100%;
            background: #3498db;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .profile-form button:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>

<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<form method="POST" action="index.php?action=update-profile" class="profile-form">
    <h2>Cập nhật thông tin</h2>
    <label for="name">Họ tên</label>
    <input type="text" name="name" id="name" value="<?= $_SESSION['user']['name'] ?? '' ?>" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?= $_SESSION['user']['email'] ?? '' ?>" required>

    <label for="password">Mật khẩu mới</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Cập nhật</button>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
</body>
</html>
