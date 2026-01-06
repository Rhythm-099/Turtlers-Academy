<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($thread['title']) ?></title>
    <link rel="stylesheet" href="public/assets/css/forum.css">
</head>
<body>

<div class="container">
    <h2><?= htmlspecialchars($thread['title']) ?></h2>
    <p><?= nl2br(htmlspecialchars($thread['description'])) ?></p>
    <small>Posted by <?= $thread['fullname'] ?> | <?= $thread['created_at'] ?></small>

    <hr>

    <h3>Discussion</h3>

    <?php while($c = mysqli_fetch_assoc($comments)) { ?>
        <div class="comment">
            <strong><?= $c['fullname'] ?></strong>
            <p><?= nl2br(htmlspecialchars($c['comment'])) ?></p>
            <small><?= $c['created_at'] ?></small>
        </div>
    <?php } ?>

    <form method="POST" action="../../controllers/forumController.php?action=comment">
        <input type="hidden" name="thread_id" value="<?= $thread['id'] ?>">
        <textarea name="comment" placeholder="Write your reply..." required></textarea>
        <button class="btn">Reply</button>
    </form>
</div>

</body>
</html>
