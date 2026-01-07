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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Notices - Turtlers Academy</title>
    <style>
        :root { --primary-green: darkgreen; --bg-color: oldlace; --sidebar-bg: #1a241e; }
        body { font-family: 'Segoe UI', sans-serif; background-color: var(--bg-color); margin: 0; display: flex; }
        .sidebar { width: 250px; height: 100vh; background-color: var(--sidebar-bg); position: fixed; }
        .content { margin-left: 250px; width: 100%; padding: 30px; }
        
        .form-container { background: white; padding: 30px; border-radius: 12px; shadow: 0 4px 15px rgba(0,0,0,0.1); max-width: 600px; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; }
        .btn-post { background: var(--primary-green); color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px; font-weight: bold; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div style="padding: 20px; color: var(--primary-green); font-weight: bold; text-align: center;">TURTLERS BOSS</div>
        <ul style="list-style: none; padding: 0;">
         <li style="margin-top: auto;"> <a href="../../controllers/logout.php" style="color: #e74c3c;">🚪 Sign Out</a> </li>
            <li><a href="manage_notice.php" style="color: white; text-decoration: none; display: block; padding: 15px; background: #2c3e50;">Manage Notices</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Post a New Notice</h1>
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

</body>
</html>