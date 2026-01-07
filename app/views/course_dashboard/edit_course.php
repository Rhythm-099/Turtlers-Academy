<?php 

require_once __DIR__ . "/../../models/courseModel.php";
include "../partials/header.php"; 

 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $course = getCourseById($db, $id);
    
    if (!$course) {
        die("Error: Course not found in database.");
    }
} else {
    die("Error: No ID provided. Please go back to the dashboard.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Course - Turtlers Academy</title>
    <link rel="stylesheet" href="../../../public/assets/css/edit_course.css">
</head>
<body>
    <div class="form-container">
        <h2>Edit Course</h2>

        <form action="../../controllers/CourseControllers.php" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
            
            <label>Course Code</label><br>
            <input type="text" name="course_code" value="<?php echo htmlspecialchars($course['course_code']); ?>" required><br><br>
            
            <label>Course Name</label><br>
            <input type="text" name="course_name" value="<?php echo htmlspecialchars($course['course_name']); ?>" required><br><br>
            
            <label>Instructor</label><br>
            <input type="text" name="instructor_name" value="<?php echo htmlspecialchars($course['instructor_name']); ?>" required><br><br>

            <label>Description</label><br>
            <textarea name="description" required><?php echo htmlspecialchars($course['description']); ?></textarea><br><br>

            <label>Current Image:</label><br>
            <img src="../../../public/assets/upload/<?php echo $course['course_image']; ?>" width="100"><br><br>

            <label>Replace Image (Optional)</label><br>
            <input type="file" name="course_image"><br><br>
            
            <button type="submit" name="update_course">Update Course</button>
            <a href="dashboard.php">Cancel</a>
        </form>
  
</body>
</html>
<?php 

include '../partials/footer.php'; 
?>