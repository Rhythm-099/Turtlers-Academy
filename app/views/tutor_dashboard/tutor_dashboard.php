<?php include '../../controllers/TutorController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tutor Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Turtlers-Academy/public/assets/css/student_dashboard.css">
    <link rel="stylesheet" href="/Turtlers-Academy/public/assets/css/course_list.css">
    <link rel="stylesheet" href="/Turtlers-Academy/public/assets/css/lesson_dashboard.css">
    <link rel="stylesheet" href="/Turtlers-Academy/public/assets/css/SearchBar.css">
    <link rel="stylesheet" href="/Turtlers-Academy/public/assets/css/dashboard.css">
</head>
<body>
<div class="dashboard-container">
    <div class="sidebar">
        <div class="profile-section">
            <img src="<?php echo $profile['image']; ?>" class="profile-img">
            <div class="profile-info">
                <h3><?php echo $profile['name']; ?></h3>
                <p>Tutor</p>
            </div>
        </div>
        <nav class="sidebar-nav">
            <button class="nav-btn" onclick="ajaxTutor('view_students')">Students</button>
            <button class="nav-btn" onclick="ajaxTutor('your_course')">Your Course</button>
            <button class="nav-btn" onclick="ajaxTutor('course_settings')">Course Settings</button>
            <a href="../help/help_tutor.php" class="nav-btn" style="text-decoration: none; width: 100%; box-sizing: border-box; display: block; font-size: 14px;">Help</a>
        </nav>
        <div class="sidebar-footer">
            <a href="../../auth/logout.php" class="logout-link">Logout</a>
        </div>
    </div>

    <main class="main-content">
        <?php 
            $displayName = $profile['name']; 
            include '../components/greeting_clock.php'; 
        ?>
        <header class="top-nav">
            <button class="tab-btn active" onclick="selectTab(this); ajaxTutor('view_all_courses')">Courses</button>
            <button class="tab-btn" onclick="selectTab(this); ajaxLoadLessonDashboard();">Resources</button>
        </header>
        <div id="main-display">
        </div>
    </main>
</div>
<?php include "../bgtoggler/bgtoggler.php"?>
<script src="/Turtlers-Academy/public/assets/js/SearchBar.js"></script>
<script src="/Turtlers-Academy/public/assets/js/tutor_dashboard.js?v=<?php echo time(); ?>"></script>
</body>
</html>