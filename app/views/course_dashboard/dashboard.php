<?php 
/*session_start();
if(isset($_SESSION['status']) !== true){
    header('location: ../../public/login.html');
    exit;
}
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
    echo "Access Denied: You are not an Admin.";
    exit;
}*/
require_once "../../models/AdminCourseModel.php";
$courses = getAllCourses($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Dashboard</title> 
    <link rel="stylesheet" href="../../../public/assets/css/dashboard.css">
</head>
<body>

<div class="main-content">
<div class="header-group">
   
    <a href="add_course.php" class="btn-add">Add New Course</a>
</div>

<div class="table-container">
    <table class="course-table">
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Instructor Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($courses as $course): ?>
            <tr>
                <td><?php echo $course['id']; ?></td>
                <td><?php echo htmlspecialchars($course['course_code']); ?></td>
                <td><?php echo htmlspecialchars($course['course_name']); ?></td>
                <td><?php echo htmlspecialchars($course['instructor_name']); ?></td>
                <td>
                    <a href="edit_course.php?id=<?php echo $course['id']; ?>" class="edit-link">Edit</a> | 
                    <a href="../../controllers/AdminCourseControllers.php?delete_id=<?php echo $course['id']; ?>" 
                       class="delete-link" 
                       onclick="return confirm('Delete this course?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

</body>
</html>