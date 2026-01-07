<?php
    include_once '../partials/header.php';
?>
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "turtlers_academy");


if(!isset($_SESSION['status']) || $_SESSION['role'] != 'admin'){
    header('location: ../login/login.php'); 
    exit();
}

$adminName = $_SESSION['username'];

$sql = "SELECT COUNT(id) as total FROM users WHERE role='user'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$studentCount = $data['total'];
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
            --text-dark: #2c3e50;
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

        /* Main Content Area */
        .content {
            margin-left: 250px;
            width: 100%;
            padding: 30px;
        }

        /* Profile & Welcome Header */
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

        .admin-id {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .avatar-circle {
            width: 80px;
            height: 80px;
            background: var(--primary-green);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: bold;
            position: relative;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .cam-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            background: #444;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
        }

        /* Grid for Stats */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .stat-box {
            background: white;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: 0.3s;
        }

        .stat-box:hover {
            transform: translateY(-5px);
        }

        .stat-box h2 {
            font-size: 36px;
            color: var(--primary-green);
            margin: 0;
        }

        .stat-box p {
            color: #666;
            margin: 5px 0 0;
            text-transform: uppercase;
            font-size: 14px;
            font-weight: bold;
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
            <li><a href="admin_dashboard.php" class="active"> Dashboard</a></li>
            <li><a href="manage_courses.php">Courses</a></li>
            <li><a href="manage_lessons.php"> Lessons</a></li>
            <li><a href="user_list.php">Students</a></li>
            <li style="margin-top: auto;"><a href="../../controllers/logout.php" style="color: #e74c3c;">🚪 Sign Out</a></li>
        </ul>
    </div>

    <div class="content">
        <div class="header-card">
            <div class="admin-id">
                <div class="avatar-circle">
                    <?php echo strtoupper(substr($adminName, 0, 1)); ?>
                    <div class="cam-icon"></div>
                </div>
                <div>
                    <h1 style="margin:0; font-size: 28px;">Welcome, <?php echo $adminName; ?>!</h1>
                    <p style="margin:5px 0 0; color: #7f8c8d;">System Role: <b>Administrator</b></p>
                </div>
            </div>
            <a href="../../controllers/logout.php" class="logout-btn">Logout</a>
        </div>

        <div class="grid-container">
            <div class="stat-box">
                <h2>12</h2>
                <p>Active Courses</p>
            </div>
            <div class="stat-box">
                <h2>45</h2>
                <p>Total Lessons</p>
            </div>
            <div class="stat-box">
              <h2><?php echo $studentCount; ?></h2>
                <p>Registered Students</p>
            </div>
        </div>

       <div style="background: white; padding: 25px; border-radius: 12px; margin-top: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
    <h3 style="color: darkgreen; margin-top: 0;">Academy Quick Stats</h3>
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
    <td style="padding: 10px; border-bottom: 1px solid #eee;"><strong>Total Students:</strong></td>
    <td style="padding: 10px; border-bottom: 1px solid #eee; text-align: right;">
        <?php echo $studentCount; ?>
    </td> 
</tr>
<tr>
    <td style="padding: 10px; border-bottom: 1px solid #eee;"><strong>Admin Account:</strong></td>
    <td style="padding: 10px; border-bottom: 1px solid #eee; text-align: right;">
        <?php echo $adminName; ?>
    </td>
</tr>

        <tr>
            <td style="padding: 10px;"><strong>System Status:</strong></td>
            <td style="padding: 10px; text-align: right; color: green;">Online</td>
        </tr>
    </table>
</div>
    </div>

</body>
</html>

<?php
    include_once '../bgtoggler/bgtoggler.php';
?>

<?php
    include_once '../partials/footer.php';
?>