<?php 
/*session_start();
if(isset($_SESSION['status']) !== true){
    header('location: ../../public/login.html');
    exit;
}*/
require_once "../../models/AdminCourseModel.php";



$courses = getAllCourses($db); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course List | Turtlers Academy</title>
    <link rel="stylesheet" href="../../../public/assets/css/course_list.css">
</head>
<body>

    <div class="main-content">
    <div class="header-group">
         <!-- Heading Removed -->
    </div>
    
    <div class="table-container">
        <table class="course-table">
            <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Code</th>
                    <th>Course Name</th>
                    <th>Instructor</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($courses)): ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">No courses available at the moment.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach($courses as $c): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($c['id']); ?></td>
                        <td><?php echo htmlspecialchars($c['course_code']); ?></td>
                        <td><?php echo htmlspecialchars($c['course_name']); ?></td>
                        <td><?php echo htmlspecialchars($c['instructor_name']); ?></td>
                        <td>
                            <a href="../course_details/course_details.php?id=<?php echo $c['id']; ?>" class="details-btn">View Details</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>
