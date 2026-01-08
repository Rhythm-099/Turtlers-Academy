<?php 
require_once __DIR__ . "/../../models/AdminCourseModel.php";
$courses = getManagementCourses($db); 
?>

<div class="course-list-wrapper">
    <div class="course-list-header">
    </div>
    
    <div class="course-table-container">
        <table class="course-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Instructor</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($courses)): ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">No courses found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach($courses as $c): ?>
                    <tr>
                        <td><?php echo $c['id']; ?></td>
                        <td><?php echo htmlspecialchars($c['course_code']); ?></td>
                        <td><?php echo htmlspecialchars($c['course_name']); ?></td>
                        <td><?php echo htmlspecialchars($c['instructor_name']); ?></td>
                        <td>
                            <a href="../course_details/course_details.php?id=<?php echo $c['id']; ?>" class="details-btn">View</a>
                            <button onclick="addBookmark('<?php echo $c['id']; ?>', '<?php echo addslashes($c['course_name']); ?>')" class="details-btn" style="background-color: #ff7b00; border: none; cursor: pointer; margin-left: 5px;">Bookmark</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
