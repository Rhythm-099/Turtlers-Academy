<?php
function getStudentProfile($conn, $student_name)
{
    $student_name = mysqli_real_escape_string($conn, $student_name);
    $query = "SELECT u.*,s.institution,s.age,s.cgpa 
        FROM users u 
        LEFT JOIN students s ON u.full_name=s.student_name 
        WHERE u.username='$student_name' OR u.full_name='$student_name' 
        LIMIT 1";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        return [
            "student_name" => $data['full_name'],
            "institution" => $data['institution'] ?? "Turtlers Academy",
            "age" => $data['age'] ?? "N/A",
            "cgpa" => $data['cgpa'] ?? "0.00",
            "email" => $data['email'],
            "id" => $data['id']
        ];
    }
    return null;
}

function getEnrolledCoursesForStudent($conn, $student_name)
{
    $student_name = mysqli_real_escape_string($conn, $student_name);
    $user_query = "SELECT id FROM users WHERE username='$student_name' OR full_name='$student_name' LIMIT 1";
    $user_res = mysqli_query($conn, $user_query);
    $user = mysqli_fetch_assoc($user_res);

    if (!$user)
        return [];

    $user_id = $user['id'];
    $query = "SELECT c.course_name 
        FROM enrollments e
        JOIN courses c ON e.course_id=c.id
        WHERE e.user_id=$user_id AND (e.status='active' OR e.status='' OR e.status IS NULL)";

    $result = mysqli_query($conn, $query);
    $courses = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $courses[] = $row['course_name'];
    }
    return $courses;
}
