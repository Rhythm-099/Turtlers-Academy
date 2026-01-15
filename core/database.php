<?php


$host = "localhost";
$user = "akibhasa_turtlers";
$pass = "Akinny1245@"; 
$db = "akibhasa_turtlers_academy";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

?>