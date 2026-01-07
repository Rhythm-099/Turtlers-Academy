
$db = mysqli_connect("localhost", "root", "", "turtlers_academy");

if (!$db) {
    die("Database Connection failed: " . mysqli_connect_error());
}


function getAllCourses($db) {
    $sql = "SELECT * FROM courses ORDER BY created_at DESC";
    $result = mysqli_query($db, $sql);
    if (!$result) return [];
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}



function getCourseById($db, $id) {
    $id = (int)$id; 
    $sql = "SELECT * FROM courses WHERE id = $id";
    $result = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($result);
}


function addCourse($db, $code, $name, $instructor, $description, $image) {
    $sql = "INSERT INTO courses (course_code, course_name, instructor_name, description, course_image) 
            VALUES ('$code', '$name', '$instructor', '$description', '$image')";
    return mysqli_query($db, $sql);
}


function updateCourseWithImage($db, $id, $code, $name, $instructor, $description, $image) {
    $sql = "UPDATE courses SET course_code='$code', course_name='$name', instructor_name='$instructor', description='$description', course_image='$image' WHERE id=$id";
    return mysqli_query($db, $sql);
}

function updateCourse($db, $id, $code, $name, $instructor, $description) {
    $sql = "UPDATE courses SET course_code='$code', 
    course_name='$name', 
    instructor_name='$instructor', 
    description='$description' WHERE id=$id";
    return mysqli_query($db, $sql);
}

function deleteCourse($db, $id) {
    $id = (int)$id;
    $sql = "DELETE FROM courses WHERE id = $id";
    return mysqli_query($db, $sql);
}
?>

