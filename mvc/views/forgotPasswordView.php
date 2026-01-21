<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/loginView.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="login-page">
        <form action="../controllers/ForgotPasswordController.php" method="post">
            <h1>Reset Password</h1>

            <label>Username</label>
            <input type="text" name="uname" required>
            <span class="error"><?= $_SESSION['forgotUnameErr'] ?? '' ?></span>

            <label>New Password</label>
            <input type="password" name="new_pass" required>

            <label>Confirm New Password</label>
            <input type="password" name="con_pass" required>
            <span class="error"><?= $_SESSION['forgotPassErr'] ?? '' ?></span>

            <input type="submit" value="Update Password" style="margin-top:20px;">
            
            <p style="text-align:center; margin-top:15px;">
                <a href="loginView.php" style="text-decoration:none; color:#7bb6f5;">Back to Login</a>
            </p>
        </form>
    </main>

    <?php 
    unset($_SESSION['forgotUnameErr'], $_SESSION['forgotPassErr']);
    include 'footer.php'; 
    ?>
</body>
</html>