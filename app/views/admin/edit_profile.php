<?php

    include_once '../partials/header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../../public/assets/css/edit_profile.css">
    <script src="../../public/assets/js/edit_profile.js" defer></script>
</head>
<body>
    <form method="POST" action="../../controllers/editCheck.php">
        <h3>Edit Profile</h3>
        <table>
            <tr><td>New Email:</td><td><input type="email" name="email" required></td></tr>
            <tr><td>New Password:</td><td><input type="password" name="password" required></td></tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="update" value="Update Info">
                    <a href="view_profile.php">Cancel</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
 
    include_once '../bgtoggler/bgtoggler.php';
    include_once '../partials/footer.php';
?>