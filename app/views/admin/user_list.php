<?php
session_start();
require_once('../../models/db.php');

if(!isset($_SESSION['status']) || $_SESSION['role'] != 'admin'){
    header('location: ../login/login.php');
    exit();
}

$conn = getConnection();
// Fetch data
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<?php
$isAjax = isset($_GET['ajax']) && $_GET['ajax'] == 'true';

if (!$isAjax) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management - Turtlers Academy</title>
    <link rel="stylesheet" href="../../public/assets/css/admin_dashboard.css">
    <script src="../../public/assets/js/user_list.js" defer></script>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-brand">TURTLERS BOSS</div>
        <ul class="nav-links">
            <li><a href="admin_dashboard.php" style="color: #bdc3c7; text-decoration: none; display: block; padding: 15px;">Dashboard</a></li>
            <li><a href="user_list.php" style="color: white; text-decoration: none; display: block; padding: 15px; background: #2c3e50;">User Management</a></li>
             <li style="margin-top: auto;"> <a href="../../controllers/logout.php" style="color: #e74c3c; display: block; padding: 15px;">🚪 Sign Out</a> </li>
        </ul>
    </div>

    <div class="content">
<?php } ?>
    <div class="card">
        <h2 class="page-title">User Management</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td>
                        <form method="POST" action="../../controllers/userController.php">
                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                            <select name="role" onchange="this.form.submit()">
                                <option value="user" <?php if($row['role']=='user') echo 'selected'; ?>>User</option>
                                <option value="admin" <?php if($row['role']=='admin') echo 'selected'; ?>>Admin</option>
                            </select>
                            <input type="hidden" name="update_role" value="1">
                        </form>
                    </td>
                    <td>
                        <button onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn btn-delete">Delete</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
<?php if (!$isAjax) { ?>
    </div>

</body>
</html>
<?php } ?>
