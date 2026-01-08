<?php

?>
<?php include_once '../partials/header.php'; ?>

<!-- Login Styles and Scripts -->
<link rel="stylesheet" href="../../../public/assets/css/login.css">
<script src="../../../public/assets/js/login.js" defer></script>

<div class="main-container">
    <form method="POST" action="../../controllers/loginCheck.php">
        <h2>Login</h2>
        
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <input type="submit" name="submit" value="Login" class="btn-submit">

        <p style="text-align: center; margin-top: 20px;">
            <a href="../sign_up/register.php" style="color: darkgreen; text-decoration: none; font-size: 14px;">
                Don't have an account? <b>Sign Up</b>
            </a>
        </p>
    </form>
</div>

<?php include_once '../partials/footer.php'; ?>
<?php include_once '../bgtoggler/bgtoggler.php'; ?>