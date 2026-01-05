<?php
session_start();
include "../../core/database.php";
include "../models/courseModel.php";
include "../models/enrollModel.php";

$user_id = $_SESSION['user_id'] ?? 1; // real session later
$course_id = intval($_GET['id'] ?? 0);

$course = getCourseDetails($conn, $course_id);
if(!$course) die("Course not found");

$enrolled = false;

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(!isAlreadyEnrolled($conn, $user_id, $course_id)){
        enrollUser(
            $conn,
            $user_id,
            $course_id,
            $_POST['full_name'],
            $_POST['email'],
            $_POST['phone']
        );
    }
    $enrolled = true;
}

include "../views/enroll/enrollForm.php";
