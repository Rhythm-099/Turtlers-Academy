<?php
session_start();
require_once('../../models/db.php'); 

if(!isset($_SESSION['status'])){
    header('location: ../login/login.php');
    exit();
}

$conn = getConnection();
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='{$username}'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
include_once('../partials/header.php'); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Profile - Turtlers Academy</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: oldlace; margin: 0; }
        .profile-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
        }
        .profile-card {
            background: white;
            padding: 30px;
            border: 2px solid darkgreen;
            border-radius: 15px;
            width: 350px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .profile-card h3 { color: darkgreen; text-align: center; margin-top: 0; }
        .info-row { margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 5px; }
        .label { font-weight: bold; color: #555; }
        .actions { text-align: center; margin-top: 20px; }
        .actions a { color: darkgreen; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

    <div class="profile-container">
        <div class="profile-card">
            <h3>User Profile</h3>
            <div class="info-row">
                <span class="label">Username:</span> <?php echo $user['username']; ?>
            </div>
            <div class="info-row">
                <span class="label">Email:</span> <?php echo $user['email']; ?>
            </div>
            <div class="info-row">
                <span class="label">Role:</span> <?php echo ucfirst($user['role']); ?>
            </div>
            
            <div class="actions">
                <a href="edit_profile.php">Edit Profile</a> | 
                <a href="../../controllers/logout.php" style="color: #e74c3c;">Logout</a>
            </div>
        </div>
    </div>

</body>
</html>

<?php
  
    include_once('../bgtoggler/bgtoggler.php');
    include_once('../partials/footer.php');
?>