<?php
    require_once('../Models/db.php');

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($username == "" || $email == "" || $password == ""){
            echo "Please fill all fields";
        } else {
            $conn = getConnection();
         
            $sql_check = "SELECT * FROM users WHERE username='{$username}'";
            $result = mysqli_query($conn, $sql_check);
            
            if(mysqli_num_rows($result) > 0){
                echo "Username already taken!";
            } else {
            
                $sql = "INSERT INTO users (username, email, password, role) VALUES ('{$username}', '{$email}', '{$password}', 'user')";
                if(mysqli_query($conn, $sql)){
                    header('location: ../Views/login.php'); 
                } else {
                    echo "Error during registration";
                }
            }
        }
    }
?>