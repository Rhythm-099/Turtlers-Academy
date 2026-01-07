<?php
session_start();
require_once "../app/models/quizModel.php"; 


if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to take quizzes.";
    exit;
}

$action = $_GET['action'] ?? 'list';
$quiz_id = intval($_GET['id'] ?? 0);

if ($action === 'list') {
    $quizzes = getQuizzes(); 
    include "../app/views/quiz/quizlist.php";

} elseif ($action === 'take' && $quiz_id > 0) {
    $questions = getQuestions($quiz_id);
    include "../app/views/quiz/quiztake.php";

} elseif ($action === 'leaderboard') {
    $leaders = getLeaderboard();
    include "../app/views/quiz/quizleaderboard.php";

} else {
    echo "Invalid action!";
}
