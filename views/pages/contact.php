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
    </style>
</head>
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

    <form method="post" action="index.php?action=contact">
        <label>Họ tên:</label><br>
        <input type="text" name="name" required style="width:100%; padding:8px; margin:10px 0;"><br>

        <label>Email:</label><br>
        <input type="email" name="email" required style="width:100%; padding:8px; margin:10px 0;"><br>

        <label>Nội dung:</label><br>
        <textarea name="message" required rows="4" style="width:100%; padding:8px; margin:10px 0;"></textarea><br>

        <button type="submit" style="background:#007bff; color:#fff; padding:10px 20px; border:none; border-radius:5px;">Gửi liên hệ</button>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
</html>
