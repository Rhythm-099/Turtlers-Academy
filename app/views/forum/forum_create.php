<!DOCTYPE html>
<html>
<head>
    <title>Create Thread</title>
    <link rel="stylesheet" href="assets/css/forum_style.css">
</head>
<body>

<div class="container">
    <h2>Create New Discussion</h2>

    <form method="POST" action="forum.php?action=store">
        <input type="text" name="title" placeholder="Discussion Title" required>
        <textarea name="description" placeholder="Describe your topic..." required></textarea>
        <button class="btn">Post</button>
    </form>
</div>

</body>
</html>
