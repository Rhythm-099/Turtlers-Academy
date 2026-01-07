<?php
$courses = [
    ["id" => 1, "title" => "Web Development Basics", "tutor" => "Dr. Smith"],
    ["id" => 2, "title" => "Introduction to Python", "tutor" => "Prof. Jane"],
    ["id" => 3, "title" => "Database Fundamentals", "tutor" => "Dr. Brown"]
];
?>
<section class="bookmark-container">
    <h2>Available Courses</h2>
    <div class="course-list">
        <?php foreach ($courses as $course): ?>
            <div class="course-card">
                <h3><?php echo $course['title']; ?></h3>
                <p>Instructor: <?php echo $course['tutor']; ?></p>
                <button class="bookmark-btn"
                    onclick="addBookmark(<?php echo $course['id']; ?>, '<?php echo $course['title']; ?>')">🔖
                    Bookmark</button>
            </div>
        <?php endforeach; ?>
    </div>
    <hr>
    <h2>Your Bookmarked Courses</h2>
    <ul id="bookmarkList"></ul>
</section>