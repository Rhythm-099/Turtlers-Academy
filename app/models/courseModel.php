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