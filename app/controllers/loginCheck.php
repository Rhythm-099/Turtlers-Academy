<?php
session_start();
require_once('../models/db.php');

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "" || $password == ""){
        echo "Username/Password cannot be empty";
    } else {
        $conn = getConnection();
        $sql = "SELECT * FROM users WHERE username='{$username}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);

        if($user){
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
    }
}
?>