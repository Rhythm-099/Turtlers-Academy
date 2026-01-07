<?php
$db = mysqli_connect("localhost", "root", "", "turtlers_academy");

if (!$db) {
    die("Database Connection failed: " . mysqli_connect_error());
}

// 1. Get all courses (Newest first)
function getAllCourses($db) {
    $sql = "SELECT * FROM courses ORDER BY created_at DESC";
    $result = mysqli_query($db, $sql);
    if (!$result) return [];
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


// 3. Get ONE course
function getCourseById($db, $id) {
    $id = (int)$id; 
    $sql = "SELECT * FROM courses WHERE id = $id";
    $result = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($result);
}

// 4. Add a new course
function addCourse($db, $code, $name, $instructor, $description, $image) {
    $sql = "INSERT INTO courses (course_code, course_name, instructor_name, description, course_image) 
            VALUES ('$code', '$name', '$instructor', '$description', '$image')";
    return mysqli_query($db, $sql);
}

// 5. Update course WITH a new image
function updateCourseWithImage($db, $id, $code, $name, $instructor, $description, $image) {
    $sql = "UPDATE courses SET course_code='$code', course_name='$name', instructor_name='$instructor', description='$description', course_image='$image' WHERE id=$id";
    return mysqli_query($db, $sql);
}

// 6. Update course WITHOUT changing the image
function updateCourse($db, $id, $code, $name, $instructor, $description) {
    $sql = "UPDATE courses SET course_code='$code', 
    course_name='$name', 
    instructor_name='$instructor', 
    description='$description' WHERE id=$id";
    return mysqli_query($db, $sql);
}

// 7. Delete a course
function deleteCourse($db, $id) {
    $id = (int)$id;
    $sql = "DELETE FROM courses WHERE id = $id";
    return mysqli_query($db, $sql);
}
?>
function getAllCourses($conn){
    $res = mysqli_query($conn, "SELECT * FROM courses");
    $courses = [];
    while($row = mysqli_fetch_assoc($res)){
        $courses[] = $row;
    }
    return $courses;
}

function getCourseDetails($conn, $id){
    $id = intval($id);
    $res = mysqli_query($conn, "SELECT * FROM courses WHERE id=$id");
    return mysqli_fetch_assoc($res);
}

function getCourseRating($conn, $id){
    $id = intval($id);
    $res = mysqli_query($conn, "SELECT AVG(rating) as avg_rating FROM ratings WHERE course_id=$id");
    $row = mysqli_fetch_assoc($res);
    return $row['avg_rating'] ? round($row['avg_rating'],1) : 0;
}

function isUserEnrolled($conn, $user_id, $course_id){
    $user_id = intval($user_id);
    $course_id = intval($course_id);
    $res = mysqli_query($conn, "SELECT * FROM enrollments WHERE user_id=$user_id AND course_id=$course_id");
    return mysqli_num_rows($res) > 0;
}
?>
