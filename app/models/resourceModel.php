<?php

function addResource($conn, $tutor_id, $course_id, $title, $file_path)
{
    $tutor_id = intval($tutor_id);
    $course_id = intval($course_id);
    $title = mysqli_real_escape_string($conn, $title);
    $file_path = mysqli_real_escape_string($conn, $file_path);

    $query = "INSERT INTO resources (tutor_id, course_id, title, file_path) VALUES ($tutor_id, $course_id, '$title', '$file_path')";
    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return mysqli_error($conn);
    }
}

function deleteResource($conn, $resource_id)
{
    $resource_id = intval($resource_id);

    
    $query = "SELECT file_path FROM resources WHERE id = $resource_id";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);

    if ($row) {
        $delQuery = "DELETE FROM resources WHERE id = $resource_id";
        if (mysqli_query($conn, $delQuery)) {
            return $row['file_path']; 
        }
    }
    return false;
}

function getResourcesByTutor($conn, $tutor_id)
{
    $tutor_id = intval($tutor_id);
    $query = "SELECT * FROM resources WHERE tutor_id = $tutor_id ORDER BY uploaded_at DESC";
    $res = mysqli_query($conn, $query);
    $resources = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $resources[] = $row;
    }
    return $resources;
}

function getResourcesForStudent($conn, $user_id)
{
    $user_id = intval($user_id);

    
    $query = "
        SELECT r.*, u.full_name as tutor_name, c.course_name
        FROM resources r
        JOIN courses c ON r.course_id = c.id
        JOIN enrollments e ON c.id = e.course_id
        JOIN users u ON r.tutor_id = u.id
        WHERE e.user_id = $user_id AND (e.status = 'active' OR e.status = '' OR e.status IS NULL)
        ORDER BY r.uploaded_at DESC
    ";

    $res = mysqli_query($conn, $query);
    $resources = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $resources[] = $row;
    }
    return $resources;
}
