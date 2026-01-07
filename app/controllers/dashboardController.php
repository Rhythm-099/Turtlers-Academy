<?php
require_once __DIR__ . '/../../core/database.php';
require_once __DIR__ . '/../models/studentModel.php';
require_once __DIR__ . '/../models/courseModel.php';
require_once __DIR__ . '/../models/resourceModel.php';

$studentName = $_SESSION['student_name'] ?? "Nazat";
$studentData = getStudentProfile($conn, $studentName);

if (!$studentData) {
    $studentData = [
        "student_name" => $studentName,
        "institution" => "Turtlers Academy",
        "age" => "N/A",
        "cgpa" => "0.00"
    ];
}

$enrolledCourses = getEnrolledCoursesForStudent($conn, $studentName);

$studentProfile = [
    "name" => $studentData['student_name'],
    "institution" => $studentData['institution'],
    "age" => $studentData['age'],
    "cgpa" => $studentData['cgpa'],
    "enrolled_courses" => $enrolledCourses
];

$dbCourses = getAllCourses($conn);
$availableCourses = [];
foreach ($dbCourses as $c) {
    $key = $c['id'];
    $availableCourses[$key] = [
        "title" => $c['course_name'],
        "tutor" => $c['instructor_name'],
        "image" => $c['course_image'],
        "id" => $c['id']
    ];
}

if (isset($_GET['action']) && $_GET['action'] === 'aboutme') {
    echo "
    <div style='background:white;padding:30px;border-radius:12px;'>
        <button onclick='location.reload()' style='cursor:pointer;color:blue;border:none;background:none;'>← Back</button>
        <h2 style='margin:20px 0;'>My Profile</h2>
        <p><strong>Name:</strong> {$studentProfile['name']}</p>
        <p><strong>Institution:</strong> {$studentProfile['institution']}</p>
        <p><strong>Age:</strong> {$studentProfile['age']}</p>
        <p><strong>CGPA:</strong> {$studentProfile['cgpa']}</p>
        <hr>
        <h4>My Enrolled Courses:</h4>
        <ul>";
    foreach ($studentProfile['enrolled_courses'] as $c) {
        echo "<li>$c</li>";
    }
    echo "</ul></div>";
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'view_courses') {
    echo "<section class='course-grid'>";
    foreach ($availableCourses as $id => $course) {
        echo "
        <div class='course-card'>
            <img src='{$course['image']}' class='course-card-img'>
            <h4>{$course['title']}</h4>
            <button class='bookmark-btn' onclick='addBookmark(\"{$id}\",\"{$course['title']}\")' style='width:100%;background:#f0f0f0;border:none;padding:8px;cursor:pointer;border-radius:6px;margin-bottom:5px;'>🔖 Bookmark</button>
            <button class='view-btn' onclick='ajaxLoadDetail(\"{$id}\")'>View Details</button>
        </div>";
    }
    echo "</section>";
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'view_resources') {
    $studentId = $studentData['id'];
    $resources = getResourcesForStudent($conn, $studentId);

    echo "<div style='background:white;padding:30px;border-radius:12px;'>
        <h2 style='margin-bottom:20px;'>Course Resources</h2>
        <table style='width:100%;border-collapse:collapse;'>
            <tr style='background:#f4f7f6;text-align:left;'>
                <th style='padding:12px;'>Title</th>
                <th style='padding:12px;'>Course</th>
                <th style='padding:12px;'>Uploaded By</th>
                <th style='padding:12px;'>Date</th>
                <th style='padding:12px;'>Action</th>
            </tr>";

    if (empty($resources)) {
        echo "<tr><td colspan='5' style='padding:20px;text-align:center;color:#888;'>No resources available for your courses.</td></tr>";
    } else {
        foreach ($resources as $r) {
            $downloadLink = $r['file_path'];
            echo "<tr>
                    <td style='padding:12px;font-weight:600;'>{$r['title']}</td>
                    <td style='padding:12px;'>{$r['course_name']}</td>
                    <td style='padding:12px;'>{$r['tutor_name']}</td>
                    <td style='padding:12px;'>{$r['uploaded_at']}</td>
                    <td style='padding:12px;'>
                        <a href='$downloadLink' download target='_blank' style='background:#3a6cf4;color:white;padding:6px 12px;text-decoration:none;border-radius:4px;font-size:0.9rem;'>Download</a>
                    </td>
                  </tr>";
        }
    }
    echo "</table></div>";
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
    if (isset($availableCourses[$id])) {
        echo "<div style='background:white;padding:20px;'><h2>{$availableCourses[$id]['title']}</h2><p>Details Loaded!</p></div>";
    }
    exit;
}