<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "turtlers_academy");

// ADD COURSE
if(isset($_POST['add_course'])) {
    $code = $_POST['course_code'];
    $name = $_POST['course_name'];
    $instructor = $_POST['instructor_name'];
    $desc = $_POST['description'];
    
    // Upload image
    $image = "default.png";
    if(!empty($_FILES['course_image']['name'])) {
        $image = time() . "_" . $_FILES['course_image']['name'];
        move_uploaded_file($_FILES['course_image']['tmp_name'], "../../public/assets/upload/" . $image);
    }
    
    // Insert to database
    $sql = "INSERT INTO courses (course_code, course_name, instructor_name, description, course_image) 
            VALUES ('$code', '$name', '$instructor', '$desc', '$image')";
    mysqli_query($conn, $sql);
    
    header("Location: ../views/course_dashboard/dashboard.php?msg=Course Added");
    exit();
}

// UPDATE COURSE
if(isset($_POST['update_course'])) {
    $id = $_POST['course_id'];
    $code = $_POST['course_code'];
    $name = $_POST['course_name'];
    $instructor = $_POST['instructor_name'];
    $desc = $_POST['description'];
    
    $image_sql = "";
    if(!empty($_FILES['course_image']['name'])) {
        $image = time() . "_" . $_FILES['course_image']['name'];
        move_uploaded_file($_FILES['course_image']['tmp_name'], "../../public/assets/upload/" . $image);
        $image_sql = ", course_image='$image'";
    }
    
    $sql = "UPDATE courses SET 
            course_code='$code', 
            course_name='$name', 
            instructor_name='$instructor', 
            description='$desc' 
            $image_sql 
            WHERE id='$id'";
    mysqli_query($conn, $sql);
    
    header("Location: ../views/course_dashboard/dashboard.php?msg=Course Updated");
    exit();
}

// DELETE COURSE
if(isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM courses WHERE id='$id'";
    mysqli_query($conn, $sql);
    
    header("Location: ../views/course_dashboard/dashboard.php?msg=Course Deleted");
    exit();
}
?>