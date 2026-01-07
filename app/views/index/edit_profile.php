<?php
    include_once '../../partials/header.php';
?>
<html>
<head><title>Edit Profile</title></head>
<body style="background-color: oldlace; font-family: Arial;">
    <form method="POST" action="../Controllers/editCheck.php">
        <center>
            <table border="1" width="400" bgcolor="white" style="border-collapse: collapse; margin-top: 50px;">
                <tr><td colspan="2" align="center" bgcolor="darkgreen"><font color="white"><h3>Edit Profile</h3></font></td></tr>
                <tr><td>New Email:</td><td><input type="email" name="email" required></td></tr>
                <tr><td>New Password:</td><td><input type="password" name="password" required></td></tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="update" value="Update Info">
                        <a href="view_profile.php">Cancel</a>
                    </td>
                </tr>
            </table>
        </center>
    </form>
</body>
</html>

<?php
    include_once '../../views/bgtoggler/bgtoggler.php';
?>

<?php
    include_once '../../partials/footer.php';
?>