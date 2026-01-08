<?php
function getConnection(){
    $host = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "turtlers_academy"; 
    
    $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}
?>