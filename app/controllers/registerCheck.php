<?php
session_start();
require_once('../models/db.php');

if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];

    if(empty($username) || empty($email) || empty($password)){
        echo "Please fill all fields.";
    } elseif($password != $confirm_pass){
        echo "Passwords do not match!";
    } else {
        $conn = getConnection();

        $sql_check = "SELECT * FROM users WHERE username=? OR email=?";
        $stmt = mysqli_prepare($conn, $sql_check);
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if(mysqli_num_rows($result) > 0){
            echo "Username or Email already taken!";
        } else {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $role = 'user';

            $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
            $stmt2 = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt2, "ssss", $username, $email, $hashed_password, $role);
            
            if(mysqli_stmt_execute($stmt2)){
                header('location: ../views/login/login.php?msg=success'); 
            } else {
                echo "Database Error: " . mysqli_error($conn);
            }
        }
    }
}
?>