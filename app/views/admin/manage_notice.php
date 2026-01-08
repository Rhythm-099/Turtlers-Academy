<?php
session_start();
require_once('../../models/db.php');

if(!isset($_SESSION['status']) || $_SESSION['role'] != 'admin'){
    header('location: ../login/login.php'); 
    exit();
}

$conn = getConnection();
$message = "";

if(isset($_POST['post_notice'])){
   
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    
    $sql = "INSERT INTO notices (title, content) VALUES ('$title', '$content')";
    if(mysqli_query($conn, $sql)){
        $message = "<p style='color: green; font-weight: bold;'>Notice posted successfully!</p>";
    } else {
        $message = "<p style='color: red;'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<?php
$isAjax = isset($_GET['ajax']) && $_GET['ajax'] == 'true';

if (!$isAjax) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Notices - Turtlers Academy</title>
    <link rel="stylesheet" href="../../public/assets/css/admin_dashboard.css">
    <script src="../../public/assets/js/manage_notice.js" defer></script>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-brand">TURTLERS BOSS</div>
        <ul class="nav-links">
            <li><a href="admin_dashboard.php" style="color: #bdc3c7; text-decoration: none; display: block; padding: 15px;">Dashboard</a></li>
            <li><a href="manage_notice.php" style="color: white; text-decoration: none; display: block; padding: 15px; background: #2c3e50;">Manage Notices</a></li>
            <li style="margin-top: auto;"> <a href="../../controllers/logout.php" style="color: #e74c3c; display: block; padding: 15px;">🚪 Sign Out</a> </li>
        </ul>
    </div>

    <div class="content">
<?php } ?>
    <div class="card">
        <h2 class="page-title">Post a New Notice</h2>
        <?php echo $message; ?>
        
        <div class="form-container">
            <form method="POST" action="">
                <label>Notice Title:</label>
                <input type="text" name="title" placeholder="e.g. Holiday Announcement" required>
                
                <label>Notice Content:</label>
                <textarea name="content" rows="5" placeholder="Write the details here..." required></textarea>
                
                <button type="submit" name="post_notice" class="btn-post">Post Notice to Academy</button>
            </form>
        </div>
    </div>
<?php if (!$isAjax) { ?>
    </div>

</body>
</html>
<?php } ?>