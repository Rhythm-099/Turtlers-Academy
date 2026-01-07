<!DOCTYPE html>
<html>
<head>
    <title>Enroll | <?= $course['name'] ?></title>
    <link rel="stylesheet" href="assets/css/enroll_style.css">
</head>
<body>

<div class="enroll-container">

<?php if(!$enrolled): ?>
    <h2>Enroll in <?= $course['name'] ?></h2>

    <form method="POST">
        <input type="text" name="full_name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="text" name="phone" placeholder="Phone Number" required>

        <div class="payment-box">
            <h3>Payment</h3>
            <p>Secure checkout (simulation)</p>
        </div>

        <button type="submit">Pay & Enroll</button>
    </form>

<?php else: ?>
    <?php include "enrollSuccessPopup.php"; ?>
<?php endif; ?>

</div>

<script src="assets/js/enroll_script.js"></script>
</body>
</html>
