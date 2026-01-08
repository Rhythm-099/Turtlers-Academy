<?php

function getTutorProfile($conn, $user)
{
    $user = trim(mysqli_real_escape_string($conn, $user));
    $sql = "SELECT * FROM users WHERE (username = '$user' OR full_name = '$user') AND role IN ('tutor', 'instructor') LIMIT 1";
    $res = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($res);

    if (!$data) {
        return null;
    }

    return [
        "name" => $data['full_name'],
        "institution" => $data['institution'] ?? "Turtlers Academy of Tech", 
        "image" => $data['profile_pic'] ?? "/Turtlers-Academy/public/assets/images/tutor.png",
        "id" => $data['id']
    ];
}

function getCourseByTutor($conn, $name)
{
    $name = mysqli_real_escape_string($conn, $name);
    $sql = "SELECT * FROM course WHERE instructor_name = '$name' LIMIT 1";
    $res = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($res);
}

function getEnrolledStudentsForCourse($conn, $cid)
{
    $cid = intval($cid);
    $sql = "SELECT u.id, u.full_name as name, u.email, c.course_name as course
        FROM enrollments e
        JOIN users u ON e.user_id = u.id
        JOIN course c ON e.course_id = c.id
        WHERE e.course_id = $cid AND (e.status = 'active' OR e.status = '' OR e.status IS NULL)";

    $res = mysqli_query($conn, $sql);
    $list = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $list[] = $row;
    }
    return $list;
}

function getAllStudentsWithCourses($conn)
{
    $sql = "SELECT u.id, u.full_name as name, u.email, COALESCE(c.course_name, 'Not Enrolled') as course
        FROM users u
        LEFT JOIN enrollments e ON u.id = e.user_id
        LEFT JOIN course c ON e.course_id = c.id
        WHERE TRIM(LOWER(u.role)) = 'student'
        ORDER BY u.id ASC";

    $res = mysqli_query($conn, $sql);
    $list = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $list[] = $row;
    }
    return $list;
}

function getAllTutors($conn)
{
    $sql = "SELECT id, full_name, email FROM users LIMIT 4";
    $res = mysqli_query($conn, $sql);
    $list = array();
    if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
            $list[] = $row;
        }
    }
    return $list;
}
