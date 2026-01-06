<?php
// --- 1. DATA (Associative Arrays) ---
$tutorProfile = [
    "name" => "Dr. Smith",
    "institution" => "Turtlers Academy of Tech",
    "image" => "/Turtlers-Academy/public/assets/images/tutor.png"
];

$allStudents = [
    ["id" => 1, "name" => "Nazat", "email" => "nazat@example.com", "course" => "Web Technologies"],
    ["id" => 2, "name" => "Rahim", "email" => "rahim@example.com", "course" => "Web Technologies"],
    ["id" => 3, "name" => "Karim", "email" => "karim@example.com", "course" => "Database Systems"]
];

$tutorCourse = [
    "title" => "Web Technologies",
    "code" => "WEB101",
    "enrolled" => ["Nazat", "Rahim"]
];

$allCourses = [
    ["title" => "Web Technologies", "tutor" => "Dr. Smith", "image" => "/Turtlers-Academy/public/assets/images/web.jpg"],
    ["title" => "Database Systems", "tutor" => "Prof. Jane", "image" => "/Turtlers-Academy/public/assets/images/db.jpg"],
    ["title" => "Computer Graphics", "tutor" => "Dr. Brown", "image" => "/Turtlers-Academy/public/assets/images/graphics.jpg"]
];

// --- 2. AJAX ROUTING ---
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Action: List Students (With Search Bar)
    if ($action === 'view_students') {
        echo "<h3>Enrolled Students</h3>";
        echo "
        <div style='margin-bottom: 20px;'>
            <input type='text' id='studentSearch' onkeyup='filterStudents()' placeholder='Search student by name...' 
                   style='width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;'>
        </div>
        <div id='noStudentResults' style='display:none; text-align:center; padding: 20px; color: #888;'>No students found.</div>";

        echo "<table border='1' id='studentTable' style='width:100%; border-collapse:collapse; margin-top:10px;'>
                <tr style='background:#f4f7f6;'>
                    <th style='padding:12px;'>ID</th><th style='padding:12px;'>Name</th><th style='padding:12px;'>Course</th>
                </tr>";
        foreach ($allStudents as $s) {
            echo "<tr class='student-row'>
                    <td style='padding:10px; text-align:center;'>{$s['id']}</td>
                    <td class='s-name' style='padding:10px;'>{$s['name']}</td>
                    <td style='padding:10px;'>{$s['course']}</td>
                  </tr>";
        }
        echo "</table>";
        exit;
    }

    // Action: Your Course
    if ($action === 'your_course') {
        echo "<h3>Manage: {$tutorCourse['title']}</h3>
              <p>Course Code: <b>{$tutorCourse['code']}</b></p>
              <h4>Enrolled Students:</h4><ul>";
        foreach ($tutorCourse['enrolled'] as $student) { echo "<li>$student</li>"; }
        echo "</ul>";
        exit;
    }

    // Action: Course Settings
    if ($action === 'course_settings') {
        echo "<h3>Course Management</h3>
              <div style='margin-top:20px;'>
                  <button style='background:#28a745; color:white; padding:10px; border:none; border-radius:5px; cursor:pointer;'>+ Add New Course</button>
                  <button style='background:#dc3545; color:white; padding:10px; border:none; border-radius:5px; cursor:pointer; margin-left:10px;'>- Delete Course</button>
              </div>";
        exit;
    }

    // Action: Resource Upload Form
    if ($action === 'upload_resource') {
        echo "
        <div class='upload-container' style='background:white; padding:30px; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.05);'>
            <h3>Upload Course Resources</h3>
            <p style='color:#666; margin-bottom:20px;'>Accepted formats: .pdf, .docx, .pptx</p>
            <form id='uploadForm' onsubmit='submitUpload(event)'>
                <input type='file' name='resource_file' required style='display:block; margin-bottom:20px;'>
                <button type='submit' style='background:#3a6cf4; color:white; border:none; padding:12px 25px; border-radius:8px; cursor:pointer; font-weight:600;'>Upload File</button>
            </form>
            <div id='status' style='margin-top:20px; font-weight:600;'></div>
        </div>";
        exit;
    }

    // Action: File Validation
    if ($action === 'process_upload') {
        if (isset($_FILES['resource_file'])) {
            $fileName = $_FILES['resource_file']['name'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowed = ['pdf', 'docx', 'pptx'];
            if (!in_array($fileExt, $allowed)) {
                echo "<span style='color:#e74c3c;'>Error: Invalid format. Only PDF, DOCX, and PPTX allowed.</span>";
            } else {
                echo "<span style='color:#2ecc71;'>Success: '{$fileName}' validated.</span>";
            }
        }
        exit;
    }

    // Action: Course Library (With Search Bar)
    if ($action === 'view_all_courses') {
        echo "<h3>Available Courses</h3>
        <div style='margin-bottom: 20px;'>
            <input type='text' id='courseSearch' onkeyup='filterCourses()' placeholder='Search by course title...' 
                   style='width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;'>
        </div>
        <div id='noResultsMessage' style='display:none; text-align:center; padding: 40px; color: #888;'>No courses found.</div>
        <div class='course-grid' id='courseGrid' style='display:grid; grid-template-columns:repeat(auto-fill, minmax(230px, 1fr)); gap:25px;'>";
        foreach ($allCourses as $course) {
            echo "
            <div class='course-card' style='background:white; padding:15px; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.05); text-align:center;'>
                <img src='{$course['image']}' style='width:100%; height:130px; object-fit:cover; border-radius:8px; margin-bottom:15px;'>
                <h4>{$course['title']}</h4>
                <p style='font-size:0.85rem; color:#666;'>Tutor: {$course['tutor']}</p>
            </div>";
        }
        echo "</div>";
        exit;
    }
}
?>