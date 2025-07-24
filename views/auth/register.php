 <header>
        <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
    </header>
<?php require_once 'views/layouts/header.php'; ?>

<h2>Đăng ký</h2>

<?php if (!empty($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <p style="color: green;"><?= $success ?></p>
<?php endif; ?>

<form method="POST" action="">
    <p>Họ tên:</p>
    <input type="text" name="name" placeholder="Họ tên" required>
    <p>Email:</p>
    <input type="email" name="email" placeholder="Email" required>
    <p>Mật khẩu:</p>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <button type="submit">Đăng ký</button>
</form>

<p>Đã có tài khoản? <a href="index.php?page=login">Đăng nhập</a></p>

<?php require_once 'views/layouts/footer.php'; ?>
