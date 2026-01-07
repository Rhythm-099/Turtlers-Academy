<?php
// 1. Include models
require_once __DIR__ . '/../models/LessonModel.php';
require_once __DIR__ . '/../models/courseModel.php';

// --- HANDLE ADD LESSON ---
if (isset($_POST['add_lesson'])) {
    $course_id = $_POST['course_id'];
    $week      = $_POST['lecture_week'];
    $title     = htmlspecialchars($_POST['lesson_title']);

    // File setup
    $fileName  = time() . "_" . $_FILES['lesson_file']['name'];
    $uploadDir = __DIR__ . "/../../public/assets/lesson/";

    // Create folder if not exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Upload file
    if (move_uploaded_file($_FILES['lesson_file']['tmp_name'], $uploadDir . $fileName)) {

        $result = uploadLesson($db, $course_id, $week, $title, $fileName);

        if ($result) {
            header("Location: ../views/upload_lesson/lesson_dashboard.php?success=1");
            exit();
        } else {
            echo "Database Error: Could not save data.";
        }

    } else {
        echo "File Error: Could not move file.";
    }
}

// --- HANDLE DELETE LESSON ---
if (isset($_GET['delete_id'])) {
    $id = (int) $_GET['delete_id'];

    if (deleteLesson($db, $id)) {
        header("Location: ../views/upload_lesson/lesson_dashboard.php");
        exit();
    } else {
        echo "Error: Could not delete the lesson.";
    }
}
