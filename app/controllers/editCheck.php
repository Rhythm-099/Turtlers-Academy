<?php
session_start();
require_once('../Models/db.php');

if(isset($_POST['update'])){
    $newEmail = $_POST['email'];
    $newPass = $_POST['password'];
    $username = $_SESSION['username'];

    if($newEmail == "" || $newPass == ""){
        echo "Fields cannot be empty";
    } else {
        $conn = getConnection();
        $sql = "UPDATE users SET email='{$newEmail}', password='{$newPass}' WHERE username='{$username}'";
        
        if(mysqli_query($conn, $sql)){
            header('location: ../view_profile.php?msg=updated');
        } else {
            echo "Update failed";
        }
    }
}
?>