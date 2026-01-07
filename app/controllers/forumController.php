<?php
session_start();
require '../../core/database.php';
require '../models/forumModel.php';

$action = $_GET['action'] ?? 'list';

if ($action == 'list') {
    $threads = getAllThreads($conn);
    require '../views/forum/forum_list.php';
}

if ($action == 'create') {
    require '../views/forum/forum_create.php';
}

if ($action == 'store' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    createThread(
        $conn,
        $_SESSION['user_id'],
        $_POST['title'],
        $_POST['description']
    );
    header("Location: forumController.php");
}

if ($action == 'view') {
    $thread = mysqli_fetch_assoc(
        getSingleThread($conn, $_GET['id'])
    );
    $comments = getComments($conn, $_GET['id']);
    require '../views/forum/forum_thread.php';
}

if ($action == 'comment' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    addComment(
        $conn,
        $_POST['thread_id'],
        $_SESSION['user_id'],
        $_POST['comment']
    );
    header("Location: forumController.php?action=view&id=".$_POST['thread_id']);
}
