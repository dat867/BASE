<?php require_once 'views/layouts/header.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <style>
        .login-form {
            max-width: 500px;
            margin: 30px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            font-family: sans-serif;
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-form label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .login-form button {
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

        .login-form button:hover {
            background: #2980b9;
        }

        .login-form a {
            color: #3498db;
            text-decoration: none;
        }

        .login-form a:hover {
            text-decoration: underline;
        }

        .login-form .error-msg {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
</header>

<div class="login-form">
    <h2>Đăng nhập</h2>

    <?php if (!empty($error)): ?>
        <p class="error-msg"><?= $error ?></p>
    <?php endif; ?>

    <form action="index.php?action=login" method="post">
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Mật khẩu:</label>
        <input type="password" name="password" required>

        <button type="submit" name="login">Đăng nhập</button>
    </form>

    <p style="text-align:center; margin-top:10px;">
        Bạn chưa có tài khoản? <a href="index.php?action=register">Đăng ký ngay</a>
    </p>
</div>

<?php require_once 'views/layouts/footer.php'; ?>
</body>
</html>
