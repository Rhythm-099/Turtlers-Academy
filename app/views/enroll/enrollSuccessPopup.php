<div class="popup" id="successPopup">
    <div class="popup-content">
        <h2>Enrollment Successful</h2>
        <p>You are now enrolled in</p>
        <strong><?= $course['name'] ?></strong>

        <div class="popup-actions">
            <button onclick="location.href='../library.php'">Go to Library</button>
            <button onclick="location.href='../course.php?id=<?= $course_id ?>'">Go to Course</button>
        </div>
    </div>
</div>
