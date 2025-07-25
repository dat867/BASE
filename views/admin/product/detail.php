<style>
    form {
        margin-top: 20px;
        padding: 10px;
        background: #f9f9f9;
        border-radius: 8px;
    }

    form textarea {
        width: 100%;
        padding: 8px;
        border-radius: 6px;
        border: 1px solid #ccc;
        resize: vertical;
        font-size: 14px;
    }

    form button {
        margin-top: 10px;
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
    }

    form button:hover {
        background-color: #45a049;
    }

    .comment-box {
        margin-top: 20px;
    }

    .comment-box .comment {
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
    }

    .comment-box .comment strong {
        color: #333;
    }

    .comment-box .comment small {
        color: #777;
        font-size: 12px;
    }

    .comment-box .delete-btn {
        color: red;
        font-size: 12px;
        margin-left: 10px;
    }
</style>

<!-- Form bình luận -->
<?php if (isset($_SESSION['user'])): ?>
    <form action="index.php?action=add_comment" method="post">
        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
        <textarea name="content" rows="3" required placeholder="Nhập bình luận..."></textarea>
        <button type="submit">Gửi bình luận</button>
    </form>
<?php else: ?>
    <p><a href="index.php?action=login">Đăng nhập</a> để bình luận.</p>
<?php endif; ?>

<!-- Danh sách bình luận -->
<h4>Bình luận:</h4>
<div class="comment-box">
<?php if (!empty($comments)): ?>
    <?php foreach ($comments as $c): ?>
        <div class="comment">
            <strong><?= htmlspecialchars($c['name']) ?></strong> 
            <small>(<?= $c['created_at'] ?? $c['date'] ?>)</small>
            <p><?= htmlspecialchars($c['content']) ?></p>

            
    <?php if (isset($_SESSION['user']) && (
        $_SESSION['user']['role'] === 'admin' || $_SESSION['user']['id'] == $c['iduser']
         )): ?>
    <a class="delete-btn" href="index.php?action=delete_comment&id=<?= $c['id'] ?>"
       onclick="return confirm('Bạn chắc chắn muốn xoá bình luận này?')"> Xoá</a>
    <?php endif; ?>

        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Chưa có bình luận nào.</p>
<?php endif; ?>
</div>
