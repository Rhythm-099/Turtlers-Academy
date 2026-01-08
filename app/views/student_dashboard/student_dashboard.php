<?php include '../../controllers/dashboardController.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Turtlers-Academy/public/assets/css/student_dashboard.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/Turtlers-Academy/public/assets/css/course_list.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="dashboard-container">
        <div class="sidebar">
            <div class="profile-section">
                <img src="/Turtlers-Academy/public/assets/images/profile.png" class="profile-img">
                <div class="profile-info">
                    <h3><?php echo $_SESSION['student_name']; ?></h3>
                    <p>Student</p>
                </div>
            </div>
            <nav class="sidebar-nav">
                <button class="nav-btn" onclick="ajaxLoadAboutMe()">About Me</button>
                <button class="nav-btn" onclick="ajaxLoadView('view_bookmarks')">Bookmarked Courses</button>
                <button class="nav-btn">Forum</button>
                <a href="../help/help_student.php" class="nav-btn" style="text-decoration: none; width: 100%; box-sizing: border-box; display: block; font-size: 14px;">Help</a>
            </nav>
            <div class="sidebar-footer">
                <a href="../../auth/logout.php" class="logout-link">Logout</a>
            </div>
        </div>

        <main class="main-content">
            <?php
            $displayName = $_SESSION['student_name'];
            include '../components/greeting_clock.php';
            ?>

            <header class="top-nav">
                <button class="tab-btn active" onclick="selectTab(this); location.reload();">Library</button>
                <button class="tab-btn" onclick="selectTab(this); ajaxLoadCourseList();">Courses</button>
                <button class="tab-btn" onclick="selectTab(this)">Quizzes</button>
                <button class="tab-btn" onclick="selectTab(this)">Results</button>
            </header>

            <div id="main-display">
            </div>
        </main>
    </div>

    <script src="/Turtlers-Academy/public/assets/js/student_dashboard.js?v=<?php echo time(); ?>"></script>
    <script src="/Turtlers-Academy/public/assets/js/bookmark.js?v=<?php echo time(); ?>"></script>
    <?php include "../bgtoggler/bgtoggler.php" ?>
</body>

</html>