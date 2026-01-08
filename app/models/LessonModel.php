<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "turtlers_academy";

$db = mysqli_connect($host, $user, $pass, $dbname);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

function uploadLesson($db, $course_id, $week, $title, $file_path) {
    $week = mysqli_real_escape_string($db, $week);
    $title = mysqli_real_escape_string($db, $title);
    $file_path = mysqli_real_escape_string($db, $file_path);

    $sql = "INSERT INTO lesson (course_id, lecture_week, lesson_title, file_path) 
            VALUES ('$course_id', '$week', '$title', '$file_path')";
    return mysqli_query($db, $sql);
}

function getAllLessons($db) {
    $sql = "SELECT l.*, c.course_name FROM lesson l 
            JOIN course c ON l.course_id = c.id 
            ORDER BY l.created_at ASC"; 
    $result = mysqli_query($db, $sql);
    $lessons = [];
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $lessons[] = $row;
        }
    }
    return $lessons;
}

function getLessonsByCourse($db, $course_id) {
    $course_id = mysqli_real_escape_string($db, $course_id);
    $sql = "SELECT * FROM lesson WHERE course_id = '$course_id' ORDER BY created_at ASC";
    $result = mysqli_query($db, $sql);
    $lessons = [];
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $lessons[] = $row;
        }
    }
    return $lessons;
}

function deleteLesson($db, $id) {
    $id = mysqli_real_escape_string($db, $id);
    $sql = "DELETE FROM lesson WHERE id = '$id'";
    return mysqli_query($db, $sql);
}
?>