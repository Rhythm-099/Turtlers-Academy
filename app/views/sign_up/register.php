<?php
    include_once '../partials/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - Turtlre's Academy</title>
    <style>
    
        body { 
            font-family: Arial, sans-serif; 
            background-color: oldlace; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }
        form { 
            background-color: white; 
            padding: 20px; 
            border: 2px solid darkgreen; 
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h2 { 
            color: darkgreen; 
            text-align: center; 
            margin-top: 0; 
        }
        .btn-submit {
            background-color: darkgreen;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-submit:hover {
            opacity: 0.9;
        }
        a {
            color: darkgreen;
            text-decoration: none;
            font-size: 14px;
            margin-left: 10px;
        }
    </style>
</head>
<body>

    <form method="POST" action="../controllers/registerCheck.php" enctype="application/x-www-form-urlencoded">
        <fieldset>
            <legend><h2>Create Account</h2></legend>
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value="" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" value="" required></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="confirm_password" value="" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <br>
                        <input type="submit" name="submit" value="Sign Up" class="btn-submit">
                        <a href="../index/index.php">Back to Home</a>
                    </td>
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
    include_once '../partials/footer.php';
?>