<?php
require_once __DIR__ . '/../models/LessonModel.php';

if (!isset($_GET['id'])) die("Invalid request.");

$lesson_id = (int) $_GET['id'];

// Get lesson info from database
function getLessonById($db, $id) {
    $sql = "SELECT * FROM lessons WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

$lesson = getLessonById($db, $lesson_id);

if (!$lesson) die("Lesson not found.");

$filePath = __DIR__ . "/../../public/assets/lesson/" . $lesson['file_path'];

if (!file_exists($filePath)) die("File does not exist.");

// Force download
header("Content-Description: File Transfer");
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"" . basename($filePath) . "\"");
header("Expires: 0");
header("Cache-Control: must-revalidate");
header("Pragma: public");
header("Content-Length: " . filesize($filePath));

readfile($filePath);
exit;
