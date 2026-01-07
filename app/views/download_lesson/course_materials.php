<?php
require_once __DIR__ . "/../../models/LessonModel.php";
include __DIR__ . "/../partials/header.php";

// Get course_id from URL
if (!isset($_GET['course_id'])) {
    die("Invalid request.");
}
$course_id = (int) $_GET['course_id'];

// Get lessons for this course only
$lessons = getLessonsByCourse($db, $course_id);
?>

<main class="main-content">
    <h2>Course Materials</h2>

    <?php if (!empty($lessons)): ?>
    <table class="materials-table">
        <thead>
            <tr>
                <th>Lecture / Week</th>
                <th>Title</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($lessons as $lesson): ?>
            <tr>
                <td><?= htmlspecialchars($lesson['lecture_week']); ?></td>
                <td><?= htmlspecialchars($lesson['lesson_title']); ?></td>
                <td>
                    <a href="/Project/Turtlers-Academy/app/controllers/lesson_download.php?id=<?= $lesson['id']; ?>" 
                       class="download-btn">
                        Download
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No materials uploaded yet for this course.</p>
    <?php endif; ?>
</main>

<?php include __DIR__ . "/../partials/footer.php"; ?>
