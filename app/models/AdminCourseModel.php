<?php
$db = mysqli_connect("localhost", "root", "", "turtlers_academy");

if (!$db) {
    die("Database Connection failed: " . mysqli_connect_error());
}


function getAllCourses($db) {
    $sql = "SELECT * FROM course ORDER BY id DESC";
    $result = mysqli_query($db, $sql);
    if (!$result) return [];
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}



function getCourseById($db, $id) {
    $id = (int)$id; 
    $sql = "SELECT * FROM course WHERE id = $id";
    $result = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($result);
}



function addCourse($db, $code, $name, $instructor, $description, $image) {
    $code = mysqli_real_escape_string($db, $code);
    $name = mysqli_real_escape_string($db, $name);
    $instructor = mysqli_real_escape_string($db, $instructor);
    $description = mysqli_real_escape_string($db, $description);
    $image = mysqli_real_escape_string($db, $image);

    $sql = "INSERT INTO course (course_code, course_name, instructor_name, description, course_image) 
            VALUES ('$code', '$name', '$instructor', '$description', '$image')";
    return mysqli_query($db, $sql);
}


function updateCourseWithImage($db, $id, $code, $name, $instructor, $description, $image) {
    $id = (int)$id;
    $code = mysqli_real_escape_string($db, $code);
    $name = mysqli_real_escape_string($db, $name);
    $instructor = mysqli_real_escape_string($db, $instructor);
    $description = mysqli_real_escape_string($db, $description);
    $image = mysqli_real_escape_string($db, $image);

    $sql = "UPDATE course SET course_code='$code', course_name='$name', instructor_name='$instructor', description='$description', course_image='$image' WHERE id=$id";
    return mysqli_query($db, $sql);
}

function updateCourse($db, $id, $code, $name, $instructor, $description) {
    $id = (int)$id;
    $code = mysqli_real_escape_string($db, $code);
    $name = mysqli_real_escape_string($db, $name);
    $instructor = mysqli_real_escape_string($db, $instructor);
    $description = mysqli_real_escape_string($db, $description);

    $sql = "UPDATE course SET course_code='$code', 
    course_name='$name', 
    instructor_name='$instructor', 
    description='$description' WHERE id=$id";
    return mysqli_query($db, $sql);
}

function deleteCourse($db, $id) {
    $id = (int)$id;
    $sql = "DELETE FROM course WHERE id = $id";
    return mysqli_query($db, $sql);
}

?>

