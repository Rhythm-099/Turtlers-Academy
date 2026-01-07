<?php
    include_once '../partials/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome - Turtlers Academy</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
           
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), 
                        url('../Assets/bg.jpeg') no-repeat center center fixed;
            background-size: cover;
        }

        .intro-container {
            background-color: rgba(255, 255, 255, 0.95);
            width: 500px;
            padding: 50px;
            border-top: 10px solid darkgreen;
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            text-align: center;
        }

        h1 { 
            color: darkgreen; 
            font-size: 42px;
            margin: 0 0 10px 0;
        }

        .tagline {
            color: #2c3e50;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .description {
            color: #444;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 35px;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .btn {
            text-decoration: none;
            padding: 14px 35px;
            font-size: 17px;
            border-radius: 50px;
            font-weight: bold;
            transition: 0.3s ease;
        }

        .login-btn {
            background-color: darkgreen;
            color: white;
            border: 2px solid darkgreen;
        }

        .signup-btn {
            background-color: transparent;
            color: darkgreen;
            border: 2px solid darkgreen;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .signup-btn:hover {
            background-color: darkgreen;
            color: white;
        }
    </style>
</head>
<body>

    <div class="intro-container">
        <h1>Turtlers Academy</h1>
        <p class="tagline">Slow and Steady Wins the Race to Excellence.</p>
        
        <p class="description">
            Experience a modern way of learning. We provide expert-led courses, 
            interactive lessons, and a supportive community to help you 
            reach your professional goals step by step.
        </p>
        
        <div class="btn-group">
            <a href="../login/login.php" class="btn login-btn">Login</a>
            <a href="../sign_up/register.php" class="btn signup-btn">Get Started</a>
        </div>
    </div>

</body>
</html>

<?php
    include_once '../bgtoggler/bgtoggler.php';
?>

<?php
    include_once '../partials/footer.php';
?>