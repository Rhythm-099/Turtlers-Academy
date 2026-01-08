<?php
session_start();
require_once('../models/db.php');

if(isset($_POST['update'])){
    $newEmail = trim($_POST['email']);
    $newPass = $_POST['password'];
    $username = $_SESSION['username'];

    if(empty($newEmail) || empty($newPass)){
        echo "Fields cannot be empty";
    } else {
        $conn = getConnection();
       
        $hashed_password = password_hash($newPass, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET email=?, password=? WHERE username=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $newEmail, $hashed_password, $username);
        
        if(mysqli_stmt_execute($stmt)){

            header('location: ../views/admin/view_profile.php?msg=updated');
        } else {
            echo "Update failed: " . mysqli_error($conn);
        }
    }
}
?>