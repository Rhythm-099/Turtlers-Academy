<?php
function getConnection(){
    $host = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "turtlers_academy"; 
    
    $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    return $conn;
}
?>