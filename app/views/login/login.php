<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Turtle's Academy</title>
    <style>
    
        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background-color: oldlace;
        }

        .project-title {
            padding: 20px 40px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .project-title span { color: #666; }

        /* Centering the Login Box */
        .main-container {
            flex: 1; /* Fills middle space */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: white;
            padding: 30px;
            border: 2px solid darkgreen;
            border-radius: 15px;
            width: 350px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 { color: darkgreen; text-align: center; margin-top: 0; }

        .btn-submit {
            background-color: darkgreen;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 15px;
        }
        
        input[type="text"], input[type="password"] {
            width: 95%;
            padding: 8px;
            margin-top: 5px;
        }

        /* Footer Alignment */
        footer {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>

    <div class="project-title">
        &lt;Turtlers<span>Academy</span>
    </div>

    <div class="main-container">
        <form method="POST" action="../../controllers/loginCheck.php">
            <h2>Login</h2>
            <table width="100%">
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Login" class="btn-submit">
                    </td>
                </tr>
            </table>
            <p align="center">
                <a href="../sign_up/register.php" style="color: darkgreen; text-decoration: none; font-size: 14px;">
                    Don't have an account? <b>Sign Up</b>
                </a>
            </p>
        </form>
    </div>

    <footer>
        <?php include_once '../partials/footer.php'; ?>
    </footer>

    <?php include_once '../bgtoggler/bgtoggler.php'; ?>

</body>
</html>