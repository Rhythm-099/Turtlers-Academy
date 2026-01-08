<?php
    include_once '../partials/header.php';
?>

<!-- Register Styles and Scripts -->
<link rel="stylesheet" href="../../../public/assets/css/register.css">
<script src="../../../public/assets/js/register.js" defer></script>

<div class="main-container">
    <form method="POST" action="../../controllers/registerCheck.php" enctype="application/x-www-form-urlencoded">
        <h2>Create Account</h2>
        
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Confirm Password</label>
        <input type="password" name="confirm_password" required>

        <input type="submit" name="submit" value="Sign Up" class="btn-submit">
        
        <p style="text-align: center; margin-top: 20px;">
            <a href="../login/login.php" style="color: darkgreen; text-decoration: none; font-size: 14px;">
                Already have an account? <b>Log In</b>
            </a>
        </p>
    </form>
</div>

<?php
    include_once '../../views/bgtoggler/bgtoggler.php';
    include_once '../partials/footer.php';
?>