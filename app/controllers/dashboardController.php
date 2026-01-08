<?php
session_start();
require_once('../models/db.php');

header('Content-Type: application/json');

if(!isset($_SESSION['status']) || $_SESSION['role'] != 'admin'){
    echo json_encode(['error' => 'Unauthorized']);
    exit();
}

$conn = getConnection();
$response = [];

$sqlUsers = "SELECT COUNT(id) as total FROM users WHERE role='user'";
$resUsers = mysqli_query($conn, $sqlUsers);
$response['student_count'] = mysqli_fetch_assoc($resUsers)['total'];

$sqlTutors = "SELECT COUNT(id) as total FROM tutors";
$resTutors = mysqli_query($conn, $sqlTutors);
$response['tutor_count'] = mysqli_fetch_assoc($resTutors)['total'];

$sqlSalary = "SELECT SUM(salary) as total_salary FROM tutors";
$resSalary = mysqli_query($conn, $sqlSalary);
$dataSalary = mysqli_fetch_assoc($resSalary);
$response['total_salary'] = $dataSalary['total_salary'] ?? 0;

$sqlExams = "SELECT COUNT(id) as total FROM exams";
$resExams = mysqli_query($conn, $sqlExams);
$response['exam_count'] = mysqli_fetch_assoc($resExams)['total'];

$sqlNotices = "SELECT COUNT(id) as total FROM notices";
$resNotices = mysqli_query($conn, $sqlNotices);
$response['notice_count'] = mysqli_fetch_assoc($resNotices)['total'];

echo json_encode($response);
?>
