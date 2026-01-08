<?php
session_start();
require_once('../models/db.php');

if(!isset($_SESSION['status']) || $_SESSION['role'] != 'admin'){
    header('location: ../views/login/login.php');
    exit();
}

$conn = getConnection();

if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])){
    $id = intval($_GET['id']);

    $sql = "DELETE FROM users WHERE id={$id}";
    if(mysqli_query($conn, $sql)){
        header('location: ../views/admin/user_list.php?msg=deleted');
    } else {
        echo "Error deleting user.";
    }
}

if(isset($_POST['update_role'])){
    $id = intval($_POST['user_id']);
    $role = $_POST['role'];
    
    $sql = "UPDATE users SET role='{$role}' WHERE id={$id}";
    if(mysqli_query($conn, $sql)){
        header('location: ../views/admin/user_list.php?msg=updated');
    } else {
        echo "Error updating role.";
    }
}
?>
