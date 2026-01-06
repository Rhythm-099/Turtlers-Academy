<?php
require_once __DIR__ . "/../../models/LessonModel.php";
include __DIR__ . "/../partials/header.php"; 

$lessons = getAllLessons($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Lesson Management</title>
    <link rel="stylesheet" href="/Project/Turtlers-Academy/public/assets/css/lesson_dashboard.css">
</head>
<body>

<main class="main-content">
    <h2>Lesson Dashboard</h2>

    <table class="course-table">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Week</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($lessons)): ?>
            <?php foreach ($lessons as $l): ?>
            <tr>
                <td><?= htmlspecialchars($l['course_name']) ?></td>
                <td><?= htmlspecialchars($l['lecture_week']) ?></td>
                <td><?= htmlspecialchars($l['lesson_title']) ?></td>
                <td>
                    <a href="../../controllers/LessonControllers.php?delete_id=<?= $l['id'] ?>"
                       class="delete-btn"
                       onclick="return confirm('Delete this lesson?')">
                       Delete
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" style="text-align:center;padding:20px;">
                    No lessons found.
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</main>

</body>
</html>

<?php include __DIR__ . "/../partials/footer.php"; ?>
