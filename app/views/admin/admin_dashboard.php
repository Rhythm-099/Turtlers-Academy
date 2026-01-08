<?php
session_start();
require_once('../../models/db.php'); 

if(!isset($_SESSION['status']) || $_SESSION['role'] != 'admin'){
    header('location: ../login/login.php'); 
    exit();
}

include_once '../partials/header.php';

$conn = getConnection(); 
$adminName = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Turtlers Academy</title>
    <link rel="stylesheet" href="../../../public/assets/css/admin_dashboard.css">
    <script src="../../../public/assets/js/admin_dashboard.js" defer></script>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-brand">TURTLERS BOSS</div>
        <ul class="nav-links">
            <li><a href="admin_dashboard.php" class="active" data-link="dashboard">Dashboard</a></li>
            <li><a href="manage_courses.php" data-ajax="true">Courses</a></li>
            <li><a href="user_list.php" data-ajax="true">Students</a></li>
            <li><a href="manage_tutors.php">Tutors</a></li>
            <li><a href="manage_exams.php">Exams</a></li>
            <li><a href="manage_notice.php" data-ajax="true">Notices</a></li>
            <li style="margin-top: auto;">
                <a href="../../controllers/logout.php" style="color: #e74c3c;">🚪 Sign Out</a>
            </li>
        </ul>
    </div>

    <div class="content">
  <div class="header-card">
    <div>
        <h1 style="margin:0; font-size: 28px;">Welcome, <?php echo htmlspecialchars($adminName); ?>!</h1>
        <p style="margin:5px 0 0; color: #7f8c8d;">System Role: <b>Administrator</b></p>
    </div>
    <div style="display: flex; gap: 15px; align-items: center;">
        <a href="view_profile.php" style="text-decoration: none; color: darkgreen; font-weight: bold; border: 1px solid darkgreen; padding: 8px 15px; border-radius: 8px;">View Profile</a>
        
        <a href="../../controllers/logout.php" class="logout-btn">Logout</a>
    </div>
</div>

        <div class="grid-container">
            <div class="stat-box">
                <h2 id="student-count">Loading...</h2>
                <p>Total Students</p>
            </div>
            <div class="stat-box">
                <h2 id="tutor-count">Loading...</h2>
                <p>Expert Tutors</p>
            </div>
            <div class="stat-box">
                <h2 id="exam-count">Loading...</h2>
                <p>Scheduled Exams</p>
            </div>
            <div class="stat-box">
                <h2 id="notice-count">Loading...</h2>
                <p>Academy Notices</p>
            </div>
            <div class="stat-box">
                <h2 id="total-salary">Loading...</h2>
                <p>Total Tutor Salaries</p>
            </div>
        </div>

        <div style="background: white; padding: 25px; border-radius: 12px; margin-top: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <h3 style="color: var(--primary-green); margin-top: 0;">Recent Notices</h3>
            <table style="width: 100%; border-collapse: collapse;">
                <?php
           
                $notices = mysqli_query($conn, "SELECT title, created_at FROM notices ORDER BY created_at DESC LIMIT 3");
                if(mysqli_num_rows($notices) > 0) {
                    while($row = mysqli_fetch_assoc($notices)) {
                        echo "<tr>
                                <td style='padding:12px; border-bottom:1px solid #eee;'>".htmlspecialchars($row['title'])."</td>
                                <td style='padding:12px; border-bottom:1px solid #eee; text-align:right; color:#888;'>{$row['created_at']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2' style='padding:12px; color:#999;'>No notices found.</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>

</body>
</html>

<?php
    include_once '../bgtoggler/bgtoggler.php';
    include_once '../partials/footer.php';
?>