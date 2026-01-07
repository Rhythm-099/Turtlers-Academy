<?php
//session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . '/../models/resultModel.php';

$user_id = $_SESSION['user_id'];

// PHP validation (sir requirement)
if (!$user_id) {
    die("Invalid user");
}

$results = getQuizResultsByStudent($user_id);

require_once __DIR__ . '/../views/quiz/result.php';
