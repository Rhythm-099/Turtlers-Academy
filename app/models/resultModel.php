<?php
require_once __DIR__ . '/../../core/database.php';

function getQuizResultsByStudent($user_id)
{
    global $conn;

    $sql = "SELECT 
                qr.score,
                qr.total,
                qr.attempted_at,
                q.title
            FROM quiz_results qr
            JOIN quizzes q ON qr.quiz_id = q.id
            WHERE qr.user_id = ?
            ORDER BY qr.attempted_at DESC";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt);
}
