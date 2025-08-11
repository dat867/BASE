<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Liên hệ - Kai Shop</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 30px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            max-width: 500px;
            margin: auto;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 20px;
            background-color: #2196f3;
            border: none;
            color: white;
            border-radius: 6px;
            cursor: pointer;
        }
        #email-error {
            color: red;
            font-size: 14px;
            margin-top: -5px;
            display: block;
        }
    </style>
</head>
<body>

<header>
    <img src="uploads/imgproduct/logo.jpg" alt="" height="50px">
</header>

<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div style="max-width:600px; margin: 50px auto; border:1px solid #ccc; padding:30px; border-radius:10px;">
    <h2>Liên hệ với chúng tôi</h2>

    <?php if (!empty($message)) : ?>
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <form id="contactForm" method="post" action="index.php?action=contact">
        <label>Họ tên:</label><br>
        <input type="text" name="name" required><br>

        <label>Email:</label><br>
        <input type="text" id="email" name="email" placeholder="Nhập email của bạn" required>
        <span id="email-error"></span>

        <label>Nội dung:</label><br>
        <textarea name="message" required rows="4"></textarea><br>

        <button type="submit">Gửi liên hệ</button>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    const emailInput = document.getElementById('email').value.trim();
    const emailError = document.getElementById('email-error');

    const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (!regex.test(emailInput)) {
        e.preventDefault(); 
        emailError.textContent = "Vui lòng nhập email hợp lệ (vd: ten@example.com)";
    } else {
        emailError.textContent = "";
    }
});
</script>

</body>
</html>
