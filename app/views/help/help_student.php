<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../../core/database.php';
require_once __DIR__ . '/../../models/studentModel.php';
require_once __DIR__ . '/../../models/HelpModel.php';

if (!isset($_SESSION['student_name'])) {
    $_SESSION['student_name'] = "Nazat";
    $_SESSION['role'] = "student";
}

$name = $_SESSION['student_name'];
$profile = getStudentProfile($conn, $name);

if (!$profile || $_SESSION['role'] !== 'student') {
    header("Location: ../error/access_denied.php");
    exit();
}

$sid = $profile['id'];
$tutors = getHelpTutors($conn);
$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_message'])) {
    $tid = isset($_POST['tutor_id']) ? intval($_POST['tutor_id']) : 0;
    $sub = isset($_POST['subject']) ? trim($_POST['subject']) : "";
    $text = isset($_POST['message']) ? trim($_POST['message']) : "";

    if ($tid <= 0) {
        $msg = "<p style='color: red;'>Please select a valid instructor.</p>";
    } elseif (strlen($sub) < 3) {
        $msg = "<p style='color: red;'>Subject is too short (min 3 characters).</p>";
    } elseif (strlen($text) < 10) {
        $msg = "<p style='color: red;'>Message is too short (min 10 characters).</p>";
    } else {
        if (sendHelpMessage($conn, $sid, $tid, $sub, $text)) {
            $msg = "<p style='color: green;'>Message sent successfully!</p>";
        } else {
            $msg = "<p style='color: red;'>Failed to send message. Please try again.</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Help Center - Student</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f4f7f6; padding: 40px; display: flex; justify-content: center; }
        .help-container { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 600px; }
        h2 { color: #333; margin-bottom: 20px; text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: 600; color: #555; }
        select, input, textarea { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: 'Poppins', sans-serif; box-sizing: border-box; }
        textarea { height: 120px; resize: none; }
        .btn-send { background: #ff7b00; color: white; border: none; padding: 12px 20px; border-radius: 8px; cursor: pointer; font-weight: 600; width: 100%; margin-top: 10px; }
        .btn-send:hover { background: #e66a00; }
        .btn-back { display: block; text-align: center; margin-top: 20px; color: #666; text-decoration: none; font-size: 14px; }
        .btn-back:hover { color: #ff7b00; }
    </style>
</head>
<body>
    <div class="help-container">
        <h2>Help Center</h2>
        <?php echo $msg; ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="tutor_id">Select Instructor</label>
                <select name="tutor_id" id="tutor_id" required>
                    <option value="" disabled selected>Choose a tutor...</option>
                    <?php foreach ($tutors as $t): ?>
                        <option value="<?php echo $t['id']; ?>"><?php echo $t['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" placeholder="What do you need help with?" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" placeholder="Type your message here..." required></textarea>
            </div>
            <button type="submit" name="send_message" class="btn-send">Send Message</button>
        </form>
        <a href="../student_dashboard/student_dashboard.php" class="btn-back">← Go Back to Dashboard</a>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            var tutor = document.getElementById('tutor_id').value;
            var subject = document.getElementById('subject').value.trim();
            var message = document.getElementById('message').value.trim();

            if (!tutor) {
                alert("Please select an instructor.");
                e.preventDefault();
                return;
            }
            if (subject.length < 3) {
                alert("Subject must be at least 3 characters long.");
                e.preventDefault();
                return;
            }
            if (message.length < 10) {
                alert("Message must be at least 10 characters long.");
                e.preventDefault();
                return;
            }
        });
    </script>
</body>
</html>
