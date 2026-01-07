<?php
session_start();
require_once('../models/db.php');

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];

    if($username == "" || $email == "" || $password == ""){
        echo "Please fill all fields.";
    } elseif($password != $confirm_pass){
        echo "Passwords do not match!";
    } else {
        $conn = getConnection();
        $sql_check = "SELECT * FROM users WHERE username='{$username}' OR email='{$email}'";
        $result = mysqli_query($conn, $sql_check);
        
        if(mysqli_num_rows($result) > 0){
            echo "Username or Email already taken!";
        } else {
            $sql = "INSERT INTO users (username, email, password, role) 
                    VALUES ('{$username}', '{$email}', '{$password}', 'user')";
            
            if(mysqli_query($conn, $sql)){
                header('location: ../views/login/login.php'); // Redirect to login
            } else {
                echo "Database Error.";
            }
        }
    }
}
?>