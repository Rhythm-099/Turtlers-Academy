<?php
    include_once '../../partials/header.php';
?>
<html>
<head><title>Registration</title></head>
<body>
    <form method="post" action="../controllers/registerCheck.php">
        <fieldset>
            <legend>Registration</legend>
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value=""></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value=""></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" value=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Sign Up"></td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>

<?php
    include_once '../../views/bgtoggler/bgtoggler.php';
?>

<?php
    include_once '../../partials/footer.php';
?>