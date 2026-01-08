<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../../core/database.php';
require_once __DIR__ . '/../../models/tutorModel.php';
require_once __DIR__ . '/../../models/HelpModel.php';

if (!isset($_SESSION['tutor_name'])) {
    $_SESSION['tutor_name'] = "Dr. Smith";
    $_SESSION['role'] = "tutor";
}

$name = $_SESSION['tutor_name'];
$profile = getTutorProfile($conn, $name);

if (!$profile || $_SESSION['role'] !== 'tutor') {
    header("Location: ../error/access_denied.php");
    exit();
}

$tid = $profile['id'];
$list = getMessagesByTutorId($conn, $tid);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messages - Tutor</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f4f7f6; padding: 40px; display: flex; justify-content: center; }
        .help-container { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 800px; }
        h2 { color: #333; margin-bottom: 20px; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #f8f9fa; color: #555; }
        .no-messages { text-align: center; padding: 40px; color: #888; }
        .btn-back { display: block; text-align: center; margin-top: 20px; color: #666; text-decoration: none; font-size: 14px; }
        .btn-back:hover { color: #ff7b00; }
        .timestamp { font-size: 12px; color: #aaa; }
    </style>
</head>
<body>
    <div class="help-container">
        <h2>Help Messages</h2>
        <?php if (empty($list)): ?>
            <div class="no-messages">No new messages</div>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $m): ?>
                        <tr>
                            <td style="font-weight: 600;"><?php echo htmlspecialchars($m['student_name']); ?></td>
                            <td style="color: #444;"><?php echo htmlspecialchars($m['subject']); ?></td>
                            <td style="max-width:300px; overflow:hidden; text-overflow:ellipsis;"><?php echo htmlspecialchars($m['message']); ?></td>
                            <td class="timestamp"><?php echo date('M d, H:i', strtotime($m['created_at'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <a href="../tutor_dashboard/tutor_dashboard.php" class="btn-back">← Go Back to Dashboard</a>
    </div>
</body>
</html>
