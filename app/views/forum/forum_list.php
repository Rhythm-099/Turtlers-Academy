<!DOCTYPE html>
<html>
<head>
    <title>Forum</title>
    <link rel="stylesheet" href="public/assets/css/forum_style.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Student Forum</h2>
        <a href="../../controllers/forumController.php?action=create" class="btn">
            Create Thread
        </a>
    </div>

    <?php while($row = mysqli_fetch_assoc($threads)) { ?>
        <div class="thread">
            <h3>
                <a href="../../controllers/forumController.php?action=view&id=<?= $row['id'] ?>">
                    <?= htmlspecialchars($row['title']) ?>
                </a>
            </h3>
            <p><?= substr($row['description'], 0, 120) ?>...</p>
            <small>By <?= $row['fullname'] ?> | <?= $row['created_at'] ?></small>
        </div>
    <?php } ?>
</div>

</body>
</html>
