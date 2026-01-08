<?php
require_once('models/db.php');
$conn = getConnection();

$sql = "SELECT SUM(salary) as total_salary FROM tutors";
$result = mysqli_query($conn, $sql);

if($result) {
    $row = mysqli_fetch_assoc($result);
    $sum = $row['total_salary'] ?? 0;
    
    echo "<h1>Database Check: Success</h1>";
    echo "<p>The 'salary' column exists.</p>";
    echo "<h3>Current Total Salary in DB: $" . $sum . "</h3>";
    
    if($sum == 0) {
        echo "<p><i>(It is 0 because no tutors have a salary set yet. This is normal.)</i></p>";
        echo "<p><b>To test, run this SQL in PHPMyAdmin:</b><br>";
        echo "<code>UPDATE tutors SET salary = 5000 WHERE id = 1;</code></p>";
    }
} else {
    echo "<h1>Database Check: FAILED</h1>";
    echo "<h3 style='color:red'>Error: " . mysqli_error($conn) . "</h3>";
    echo "<p>This means the 'salary' column was NOT added correctly.</p>";
    echo "<p>Please verify you ran: <code>ALTER TABLE tutors ADD COLUMN salary DECIMAL(10,2) DEFAULT 0.00;</code></p>";
}
?>
