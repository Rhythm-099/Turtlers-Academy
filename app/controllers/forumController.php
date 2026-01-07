<?php
require_once __DIR__ . "/../../core/database.php";
require_once __DIR__ . "/../models/forumModel.php";

$user_id = $_SESSION['user_id'] ?? 0; // real session from login
$action = $_GET['action'] ?? 'list';

// List all threads
if ($action === 'list') {
    $threads = getAllThreads($conn);
    include __DIR__ . "/../views/forum/forum_list.php";
    exit;
}

// Show create thread form
if ($action === 'create') {
    include __DIR__ . "/../views/forum/forum_create.php";
    exit;
}

// Store new thread
if ($action === 'store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $desc  = $_POST['description'] ?? '';

    if(empty($title) || empty($desc)) {
        die("All fields are required.");
    }

    createThread($conn, $user_id, $title, $desc);
    header("Location: forum.php"); // redirect to public/forum.php
    exit;
}

// View a single thread
if ($action === 'view') {
    $thread_id = intval($_GET['id'] ?? 0);
    $thread = mysqli_fetch_assoc(getSingleThread($conn, $thread_id));
    $comments = getComments($conn, $thread_id);
    include __DIR__ . "/../views/forum/forum_thread.php";
    exit;
}

// Add comment
if ($action === 'comment' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $thread_id = intval($_POST['thread_id'] ?? 0);
    $comment = $_POST['comment'] ?? '';

    if(empty($comment)) {
        die("Comment cannot be empty.");
    }

    addComment($conn, $thread_id, $user_id, $comment);
    header("Location: forum.php?action=view&id=".$thread_id);
    exit;
}
