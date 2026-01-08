<?php
/*session_start();
if(isset($_SESSION['status']) !== true){
    header('location: ../../public/login.html');
    exit;
}
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
    echo "Access Denied";
    exit;
}*/
require_once "../../models/LessonModel.php";
//


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

    <div class="main-content">
    <div class="header-group">
        <a href="upload_lesson.php" class="btn-add">Upload Lesson</a>
    </div>

    <div class="table-container">
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
                           class="delete-link"
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
    </div>
    </div>
</body>
</html>


