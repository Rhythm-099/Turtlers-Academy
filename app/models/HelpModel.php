<?php

function getHelpTutors($conn) {
    $sql = "SELECT id, full_name as name FROM users WHERE role = 'tutor' OR role = 'instructor'";
    $result = mysqli_query($conn, $sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function sendHelpMessage($conn, $sid, $tid, $sub, $msg) {
    $sid = intval($sid);
    $tid = intval($tid);
    $sub = mysqli_real_escape_string($conn, $sub);
    $msg = mysqli_real_escape_string($conn, $msg);

    $sql = "INSERT INTO help_messages (student_id, tutor_id, subject, message) 
            VALUES ($sid, $tid, '$sub', '$msg')";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function getMessagesByTutorId($conn, $tid) {
    $tid = intval($tid);
    $sql = "SELECT m.*, u.full_name as student_name 
            FROM help_messages m 
            JOIN users u ON m.student_id = u.id 
            WHERE m.tutor_id = $tid 
            ORDER BY m.id DESC";
    $result = mysqli_query($conn, $sql);
    $msg_list = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $msg_list[] = $row;
    }
    return $msg_list;
}
