<?php

require_once __DIR__ . "/../../core/database.php";
require_once __DIR__ . "/../models/courseModel.php";
require_once __DIR__ . "/../models/enrollModel.php";

if (!isset($_SESSION['user_id'])) {
    die("Please login to enroll.");
}

$user_id   = $_SESSION['user_id'];
$course_id = intval($_GET['id'] ?? 0);

$course = getCourseDetails($conn, $course_id);
if (!$course) die("Course not found");

$enrolled = false;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (
        empty($_POST['full_name']) ||
        empty($_POST['email']) ||
        empty($_POST['phone'])
    ) {
        die("All fields are required");
    }

    if (!isAlreadyEnrolled($conn, $user_id, $course_id)) {
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

include __DIR__ . "/../views/enroll/enrollForm.php";
