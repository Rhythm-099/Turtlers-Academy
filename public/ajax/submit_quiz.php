<?php
session_start();
require_once "../../core/database.php";
require_once "../../app/models/quiz.php";

header("Content-Type: application/json");

if(!isset($_SESSION['user_id'])){
    echo json_encode(["status"=>"auth"]);
    exit;
}

$quiz_id = intval($_POST['quiz_id']);
$answers = json_decode($_POST['answers'], true);
$user_id = $_SESSION['user_id'];

if($quiz_id<=0 || empty($answers)){
    echo json_encode(["status"=>"invalid"]);
    exit;
}

$questions = getQuestions($quiz_id);
$score=0;

foreach($questions as $q){
    $qid = $q['question_id'];
    if(isset($answers[$qid]) && $answers[$qid]===$q['correct']){
        $score++;
    }
}

$total = count($questions);
$percentage = ($score/$total)*100;

saveAttempt($user_id,$quiz_id,$score,$total,$percentage);

echo json_encode([
    "status"=>"ok",
    "score"=>$score,
    "total"=>$total,
    "percentage"=>$percentage
]);
