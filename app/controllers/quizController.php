<?php
require_once "../models/quizModel.php";

function quizList() {
    $quizzes = getQuizzes();
    include "../views/quiz/quizlist.php";
}

function takeQuiz($id) {
    $id = intval($id);
    if ($id <= 0) die("Invalid quiz ID");

    $questions = getQuestions($id);
    include "../views/quiz/quiztake.php";
}

function leaderboard() {
    $leaders = getLeaderboard();
    include "../views/quiz/quizleaderboard.php";
}
