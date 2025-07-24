  <header>
        <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
    </header>
<?php require_once 'views/layouts/header.php'; ?>

<h2>Đăng nhập</h2>

<?php if (!empty($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<form action="index.php?action=login" method="post" style="max-width: 400px;">
    <div>
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Mật khẩu:</label>
        <input type="password" name="password" required>
    </div>
    <button type="submit" name="login">Đăng nhập</button>
</form>

<p>Bạn chưa có tài khoản? <a href="index.php?action=register" style="color: blue;">Đăng ký ngay</a></p>

<?php require_once 'views/layouts/footer.php'; ?>
