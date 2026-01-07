<?php

function getTutorProfile($conn, $username)
{
    // Fetch tutor details from users table
    $username = trim(mysqli_real_escape_string($conn, $username));

    // Try exact match on username or full_name
    $query = "SELECT * FROM users WHERE (username = '$username' OR full_name = '$username') AND role IN ('tutor', 'instructor') LIMIT 1";
    $res = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($res);

    // If not found, try robust match (e.g. case insensitive or partial if needed, but sticking to exact logic for now)
    // The issue might be that user session has "Dr. Smith" but DB has "drsmith" username.
    // The query covers both.

    if (!$user) {
        // Fallback: Try searching just by username if the session had a space?
        // Or simple debug fallback.
        return null;
    }

    // Optional: Fetch extra details from instructors table if exists? 
    // The instructors table uses 'name' which might match 'full_name'
    // For now, we build the profile from users table + defaults
    // If 'instructors' has 'bio', we could fetch it.

    $tutorName = $user['full_name'];
    $bio = "Turtlers Academy Tutor";

    // Check instructors table
    $instQuery = "SELECT * FROM instructors WHERE name = '$tutorName' LIMIT 1";
    $instRes = mysqli_query($conn, $instQuery);
    if ($instRow = mysqli_fetch_assoc($instRes)) {
        // Use bio if needed, though controller didn't use it much yet
    }

    return [
        "name" => $user['full_name'],
        "institution" => "Turtlers Academy of Tech", // Hardcoded or add to DB
        "image" => $user['profile_pic'] ?? "/Turtlers-Academy/public/assets/images/tutor.png",
        "id" => $user['id']
    ];
}

function getCourseByTutor($conn, $tutor_name)
{
    // Find course where instructor_name matches
    $tutor_name = mysqli_real_escape_string($conn, $tutor_name);
    $query = "SELECT * FROM courses WHERE instructor_name = '$tutor_name' LIMIT 1";
    $res = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($res);
}

function getEnrolledStudentsForCourse($conn, $course_id)
{
    $course_id = intval($course_id);
    // Join enrollments with users to get student names/emails
    // Also include course name if needed for display
    $query = "
        SELECT u.id, u.full_name as name, u.email, c.course_name as course
        FROM enrollments e
        JOIN users u ON e.user_id = u.id
        JOIN courses c ON e.course_id = c.id
        WHERE e.course_id = $course_id AND (e.status = 'active' OR e.status = '' OR e.status IS NULL)
    ";

    $res = mysqli_query($conn, $query);
    $students = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $students[] = $row;
    }
    return $students;
}

function getAllStudentsWithCourses($conn)
{
    // Get ALL students (users with role student) and their enrolled courses
    // Use LEFT JOIN to show students even if not enrolled (or inner if only enrolled)
    // User requested "display all students... and in which course they are in"
    // Usually means list of enrollments.

    // Display ALL students. Use LEFT JOIN to catch students even if not enrolled (debugging purpose mostly, or to show available students)
    // If they have multiple courses, they will appear multiple times (which is standard for a flat table list).

    $query = "
        SELECT u.id, u.full_name as name, u.email, COALESCE(c.course_name, 'Not Enrolled') as course
        FROM users u
        LEFT JOIN enrollments e ON u.id = e.user_id AND (e.status = 'active' OR e.status = '' OR e.status IS NULL)
        LEFT JOIN courses c ON e.course_id = c.id
        WHERE u.role = 'student'
        ORDER BY u.id ASC
    ";

    $res = mysqli_query($conn, $query);
    $students = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $students[] = $row;
    }
    return $students;
}

function getAllTutors($conn)
{
    $sql = "SELECT id, fullname, email FROM users LIMIT 4";
    $res = mysqli_query($conn, $sql);

    $tutors = [];
    if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
            $tutors[] = $row;
        }
    }
    return $tutors;
}
