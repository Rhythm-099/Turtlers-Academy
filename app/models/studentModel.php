<?php
function getStudentProfile($conn, $name)
{
    $name = mysqli_real_escape_string($conn, $name);
    $sql = "SELECT * FROM users 
        WHERE (username='$name' OR full_name='$name') 
        AND role='student' 
        LIMIT 1";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    if ($row) {
        return [
            "student_name" => $row['full_name'],
            "institution" => $row['institution'] ?? "Turtlers Academy",
            "age" => $row['age'] ?? "0",
            "cgpa" => $row['cgpa'] ?? "0.00",
            "email" => $row['email'],
            "id" => $row['id']
        ];
    }
    return null;
}

function getEnrolledCoursesForStudent($conn, $name)
{
    $name = mysqli_real_escape_string($conn, $name);
    $sql1 = "SELECT id FROM users WHERE username='$name' OR full_name='$name' LIMIT 1";
    $res1 = mysqli_query($conn, $sql1);
    $user = mysqli_fetch_assoc($res1);

    if (!$user) {
        return [];
    }

    $uid = $user['id'];
    $sql2 = "SELECT c.course_name 
        FROM enrollments e
        JOIN course c ON e.course_id=c.id
        WHERE e.user_id=$uid AND (e.status='active' OR e.status='' OR e.status IS NULL)";

    $res2 = mysqli_query($conn, $sql2);
    $list = array();
    while ($row = mysqli_fetch_assoc($res2)) {
        $list[] = $row['course_name'];
    }
    return $list;
}
