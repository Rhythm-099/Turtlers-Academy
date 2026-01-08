<?php
require_once __DIR__ . '/../../core/database.php';
require_once __DIR__ . '/../models/tutorModel.php';
require_once __DIR__ . '/../models/courseModel.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['tutor_name'] = "Dr. Smith";
$_SESSION['role'] = "tutor";

$name = $_SESSION['tutor_name'];
$data = getTutorProfile($conn, $name);

if (!$data || $_SESSION['role'] !== 'tutor') {
    header("Location: /Turtlers-Academy/app/views/error/access_denied.php");
    exit();
}

$profile = [
    "name" => $data['name'],
    "institution" => $data['institution'],
    "image" => $data['image']
];

$row = getCourseByTutor($conn, $profile['name']);

$course_info = [
    "title" => "No Course Assigned",
    "code" => "N/A",
    "enrolled" => []
];

$student_list = [];

if ($row) {
    $course_info['title'] = $row['course_name'];
    $course_info['code'] = $row['course_code']; 
    $db_students = getEnrolledStudentsForCourse($conn, $row['id']);
    $student_list = $db_students; 
    foreach ($db_students as $s) {
        $course_info['enrolled'][] = $s['name'];
    }
}

$db_all = getAllCourses($conn);
$all_courses = [];
foreach ($db_all as $c) {
    $all_courses[] = [
        "title" => $c['course_name'],
        "tutor" => $c['instructor_name'],
        "image" => $c['course_image']
    ];
}

if (isset($_GET['action'])) {
    $act = $_GET['action'];

    if ($act === 'view_students') {
        echo "<h3>Find Student</h3>";
        $global = getAllStudentsWithCourses($conn);
        $searchId = 'studentSearch';
        $searchPlaceholder = 'Search student by name...';
        $searchOnKeyUp = 'filterStudents()';
        include __DIR__ . '/../views/search_bar/SearchBar.php';
        echo "<div id='noStudentResults' style='display:none; text-align:center; padding: 20px; color: #888;'>No students found matching your search.</div>";

        if (empty($global)) {
            echo "<p style='text-align:center; padding:20px; color:#666;'>No students found.</p>";
        } else {
            echo "<table border='1' id='studentTable' style='width:100%; border-collapse:collapse; margin-top:10px;'>
                    <tr style='background:#f4f7f6;'>
                        <th style='padding:12px;'>ID</th><th style='padding:12px;'>Name</th><th style='padding:12px;'>Course</th>
                    </tr>";
            foreach ($global as $s) {
                echo "<tr class='student-row'>
                        <td style='padding:10px; text-align:center;'>{$s['id']}</td>
                        <td class='s-name' style='padding:10px;'>{$s['name']}</td>
                        <td style='padding:10px;'>{$s['course']}</td>
                      </tr>";
            }
            echo "</table>";
        }
        exit;
    }

    if ($act === 'your_course') {
        echo "<h3>Manage: {$course_info['title']}</h3>
              <p>Course Code: <b>{$course_info['code']}</b></p>
              <h4>Enrolled Students:</h4><ul>";
        foreach ($course_info['enrolled'] as $s) {
            echo "<li>$s</li>";
        }
        echo "</ul>";
        exit;
    }

    if ($act === 'course_settings') {
        include __DIR__ . '/../views/course_dashboard/dashboard.php';
        exit;
    }

    if ($act === 'view_all_courses') {
        echo "<h3>Available Courses</h3>";
        $searchId = 'courseSearch';
        $searchPlaceholder = 'Search by course title...';
        $searchOnKeyUp = 'filterCourses()';
        include __DIR__ . '/../views/search_bar/SearchBar.php';
        echo "<div class='course-grid' id='courseGrid' style='display:grid; grid-template-columns:repeat(auto-fill, minmax(230px, 1fr)); gap:25px;'>";
        foreach ($all_courses as $c) {
            echo "
            <div class='course-card' style='background:white; padding:15px; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.05); text-align:center;'>
                <img src='{$c['image']}' style='width:100%; height:130px; object-fit:cover; border-radius:8px; margin-bottom:15px;'>
                <h4>{$c['title']}</h4>
                <p style='font-size:0.85rem; color:#666;'>Tutor: {$c['tutor']}</p>
            </div>";
        }
        echo "</div>";
        exit;
    }
}