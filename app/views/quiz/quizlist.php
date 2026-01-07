<link rel="stylesheet" href="assets/css/quiz.css">

<h2>Available Quizzes</h2>
<?php include "Turtlers-Academy/core/database.php"?>
<?php while ($q = mysqli_fetch_assoc($quizzes)) { ?>
<div class="quiz-card">
    <h3><?= htmlspecialchars($q['title']) ?></h3>
    <p>Time: <?= htmlspecialchars($q['time_limit']) ?></p>
    <p>Pass at: <?= htmlspecialchars($q['passing_score']) ?></p>
    <a href="quiz.php?action=take&id=<?= $q['id'] ?>">Take Quiz</a>
</div>
<?php } ?>
