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


$sqlUsers = "SELECT COUNT(id) as total FROM users WHERE role='user'";
$studentCount = mysqli_fetch_assoc(mysqli_query($conn, $sqlUsers))['total'];

$sqlTutors = "SELECT COUNT(id) as total FROM tutors";
$tutorCount = mysqli_fetch_assoc(mysqli_query($conn, $sqlTutors))['total'] ?? 0;

$sqlExams = "SELECT COUNT(id) as total FROM exams";
$examCount = mysqli_fetch_assoc(mysqli_query($conn, $sqlExams))['total'] ?? 0;

$sqlNotices = "SELECT COUNT(id) as total FROM notices";
$noticeCount = mysqli_fetch_assoc(mysqli_query($conn, $sqlNotices))['total'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Turtlers Academy</title>
    <style>
        :root {
            --primary-green: darkgreen;
            --bg-color: oldlace;
            --sidebar-bg: #1a241e;
            --white: #ffffff;
        }

        body { 
            font-family: 'Segoe UI', Arial, sans-serif; 
            background-color: var(--bg-color); 
            margin: 0; 
            display: flex; 
        }
    
        .sidebar { 
            width: 250px; 
            height: 100vh; 
            background-color: var(--sidebar-bg); 
            color: white; 
            position: fixed; 
            display: flex; 
            flex-direction: column; 
        }

        .sidebar-brand { 
            padding: 30px; 
            text-align: center; 
            font-size: 20px; 
            font-weight: bold; 
            border-bottom: 1px solid #333; 
            color: var(--primary-green); 
        }

        .nav-links { 
            list-style: none; 
            padding: 0; 
            margin: 0; 
        }

        .nav-links li a { 
            display: block; 
            padding: 15px 25px; 
            color: #bdc3c7; 
            text-decoration: none; 
            transition: 0.3s; 
            border-left: 4px solid transparent; 
        }

        .nav-links li a:hover, .nav-links li a.active { 
            background: #2c3e50; 
            color: white; 
            border-left: 4px solid var(--primary-green); 
        }

        .content { 
            margin-left: 250px; 
            width: 100%; 
            padding: 30px; 
        }

        .header-card { 
            background: var(--white); 
            padding: 25px; 
            border-radius: 15px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.1); 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            border-top: 10px solid var(--primary-green); 
        }

        .grid-container { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
            gap: 20px; 
            margin-top: 30px; 
        }

        .stat-box { 
            background: white; 
            padding: 20px; 
            border-radius: 12px; 
            text-align: center; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); 
            transition: 0.3s; 
        }

        .stat-box:hover { 
            transform: translateY(-5px); 
        }

        .stat-box h2 { 
            font-size: 32px; 
            color: var(--primary-green); 
            margin: 0; 
        }

        .stat-box p { 
            color: #666; 
            margin: 5px 0 0; 
            font-size: 13px; 
            font-weight: bold; 
            text-transform: uppercase; 
        }

        .logout-btn { 
            background: #c0392b; 
            color: white; 
            padding: 10px 20px; 
            border-radius: 8px; 
            text-decoration: none; 
            font-weight: bold; 
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-brand">TURTLERS BOSS</div>
        <ul class="nav-links">
            <li><a href="admin_dashboard.php" class="active">Dashboard</a></li>
            <li><a href="manage_courses.php">Courses</a></li>
            <li><a href="user_list.php">Students</a></li>
            <li><a href="manage_tutors.php">Tutors</a></li>
            <li><a href="manage_exams.php">Exams</a></li>
            <li><a href="manage_notice.php">Notices</a></li>
            <li style="margin-top: auto;">
                <a href="../../controllers/logout.php" style="color: #e74c3c;">🚪 Sign Out</a>
            </li>
        </ul>
    </div>

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
                <h2><?php echo $studentCount; ?></h2>
                <p>Total Students</p>
            </div>
            <div class="stat-box">
                <h2><?php echo $tutorCount; ?></h2>
                <p>Expert Tutors</p>
            </div>
            <div class="stat-box">
                <h2><?php echo $examCount; ?></h2>
                <p>Scheduled Exams</p>
            </div>
            <div class="stat-box">
                <h2><?php echo $noticeCount; ?></h2>
                <p>Academy Notices</p>
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