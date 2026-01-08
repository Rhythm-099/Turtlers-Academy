<?php
require_once __DIR__ . '/../../core/database.php';
require_once __DIR__ . '/../models/studentModel.php';
require_once __DIR__ . '/../models/courseModel.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['student_name'] = "Nazat";
$_SESSION['role'] = "student";

$name = $_SESSION['student_name'];
$data = getStudentProfile($conn, $name);

if (!$data || $_SESSION['role'] !== 'student') {
    header("Location: /Turtlers-Academy/app/views/error/access_denied.php");
    exit();
}

$enrolled = getEnrolledCoursesForStudent($conn, $name);

$profile = [
    "name" => $data['student_name'],
    "institution" => $data['institution'],
    "age" => $data['age'],
    "cgpa" => $data['cgpa'],
    "enrolled_courses" => $enrolled
];

$all_db_courses = getAllCourses($conn);
$available = [];
foreach ($all_db_courses as $c) {
    $id = $c['id'];
    $available[$id] = [
        "title" => $c['course_name'],
        "tutor" => $c['instructor_name'],
        "image" => $c['course_image'],
        "id" => $c['id']
    ];
}

if (isset($_GET['action']) && $_GET['action'] === 'aboutme') {
    echo "
    <div style='background:white;padding:30px;border-radius:12px;'>
        <button onclick='location.reload()' style='cursor:pointer;color:#ff7b00;border:none;background:none;'>← Back</button>
        <h2 style='margin:20px 0;'>My Profile</h2>
        <p><strong>Name:</strong> {$profile['name']}</p>
        <p><strong>Institution:</strong> {$profile['institution']}</p>
        <p><strong>Age:</strong> {$profile['age']}</p>
        <p><strong>CGPA:</strong> {$profile['cgpa']}</p>
        <hr>
        <h4>My Enrolled Courses:</h4>
        <ul>";
    foreach ($profile['enrolled_courses'] as $c) {
        echo "<li>$c</li>";
    }
    echo "</ul></div>";
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'view_bookmarks') {
    echo "
    <div style='background:white;padding:30px;border-radius:12px;'>
        <h2>Your Bookmarked Courses</h2>
        <ul id='bookmarkPageList' style='list-style:none;padding:0;margin-top:20px;'></ul>
    </div>";
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($available[$id])) {
        echo "<div style='background:white;padding:20px;'><h2>{$available[$id]['title']}</h2><p>Details Loaded!</p></div>";
    }
    exit;
}