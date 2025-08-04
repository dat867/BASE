<?php require_once 'views/layouts/header.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <style>
        .register-form {
            max-width: 500px;
            margin: 30px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            font-family: sans-serif;
        }

        .register-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .register-form p {
            margin: 10px 0 5px;
            font-weight: bold;
        }

        .register-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .register-form button {
            width: 100%;
            background: #2ecc71;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        .register-form button:hover {
            background: #27ae60;
        }

        .register-form a {
            color: #3498db;
            text-decoration: none;
        }

        .register-form a:hover {
            text-decoration: underline;
        }

        .register-form .error-msg {
            color: red;
            text-align: center;
        }

        .register-form .success-msg {
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
</header>

<div class="register-form">
    <h2>Đăng ký</h2>

    <?php if (!empty($error)): ?>
        <p class="error-msg"><?= $error ?></p>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <p class="success-msg"><?= $success ?></p>
    <?php endif; ?>

    <form method="POST" action="index.php?action=register_post">
        <p>Họ tên:</p>
        <input type="text" name="name" placeholder="Họ tên" required>

        <p>Email:</p>
        <input type="email" name="email" placeholder="Email" required>

        <p>Mật khẩu:</p>
        <input type="password" name="password" placeholder="Mật khẩu" required>

        <button type="submit">Đăng ký</button>
    </form>

    <p style="text-align:center; margin-top:10px;">
        Đã có tài khoản? <a href="index.php?action=login">Đăng nhập</a>
    </p>
</div>

<?php require_once 'views/layouts/footer.php'; ?>
</body>
</html>
