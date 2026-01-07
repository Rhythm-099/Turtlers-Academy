<?php
// 1. Establish the database connection (MySQLi)
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "turtlers_academy";

$db = new mysqli($host, $user, $pass, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// 2. Admin: Saves new lesson to DB
function uploadLesson($db, $course_id, $week, $title, $file_path) {
    $sql = "INSERT INTO lessons (course_id, lecture_week, lesson_title, file_path) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("isss", $course_id, $week, $title, $file_path);
    return $stmt->execute();
}

// 3. Get all lessons with course name
function getAllLessons($db) {
    $sql = "SELECT l.*, c.course_name FROM lessons l 
            JOIN courses c ON l.course_id = c.id 
            ORDER BY l.created_at ASC"; 
    $result = $db->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// 4. Student Page: Get lessons for a specific course
function getLessonsByCourse($db, $course_id) {
    $sql = "SELECT * FROM lessons WHERE course_id = ? ORDER BY created_at ASC";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// 5. Admin: Delete lesson
function deleteLesson($db, $id) {
    $sql = "DELETE FROM lessons WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>