<?php 
require_once "../../models/courseModel.php";
include "../partials/header.php"; 
// Assuming $db is initialized in your config or model
$courses = getAllCourses($db);
?>

<link rel="stylesheet" href="../../../public/assets/css/dashboard.css">

<div class="header-group">
    <h1>Course Dashboard</h1>
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
                    <a href="../../controllers/CourseControllers.php?delete_id=<?php echo $course['id']; ?>" 
                       class="delete-link" 
                       onclick="return confirm('Delete this course?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include "../partials/footer.php"; ?>