<link rel="stylesheet" href="../../public/assets/css/quiz.css">

<h2>Available Quizzes</h2>
<?php include "Turtlers-Academy/core/database.php"?>
<?php while ($q = mysqli_fetch_assoc($quizzes)) { ?>
<div class="quiz-card">
    <h3><?= htmlspecialchars($q['title']) ?></h3>
    <p><?= htmlspecialchars($q['description']) ?></p>
    <a href="../../public/quiz.php?page=quiz&action=take&id=<?= $q['quiz_id'] ?>">Take Quiz</a>
</div>
<?php } ?>
