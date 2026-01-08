<?php
require_once('models/db.php');
$conn = getConnection();

$username = 'sania'; 
$new_pass = '1234'; 
$hashed = password_hash($new_pass, PASSWORD_DEFAULT);


$sql = "UPDATE users SET password='$hashed', role='admin' WHERE username='$username'";

if(mysqli_query($conn, $sql)){
    echo "<h1>Success!</h1>";
    echo "<p>User '<b>$username</b>' updated.</p>";
    echo "<p>New Password: <b>$new_pass</b></p>";
    echo "<p>Role: <b>admin</b></p>";
    echo "<br><a href='views/login/login.php'>Go to Login</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
