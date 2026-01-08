<?php
session_start();
require_once('../models/db.php');

if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        echo "Username/Password cannot be empty";
    } else {
        $conn = getConnection();

        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if($user){

            if(password_verify($password, $user['password'])){
                $_SESSION['status'] = true;
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                if($user['role'] == 'admin'){
                    header('location: ../views/admin/admin_dashboard.php');
                } else {
                    header('location: ../views/home/home.php'); 
                }
            } else {
                echo "Invalid credentials!";
            }
        } else {
            echo "Invalid credentials!";
        }
    }
}
?>