<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/loginView.css">
</head>
<body>

<?php include 'header.php'; ?>

<main class="login-page">
<form action="../controllers/LoginController.php" method="post" onsubmit="return validateLogin()">
    <h1>Login</h1>

    <label>Username</label>
    <input type="text" id="uname" name="uname"
           value="<?= $_SESSION['old_username'] ?? '' ?>">
    <span class="error"><?= $_SESSION['usernameErrMsg'] ?? '' ?></span>

    <label>Password</label>
    <input type="password" id="password" name="password">
    <span class="error"><?= $_SESSION['passwordErrMsg'] ?? '' ?></span>

    <br>
    <input type="submit" value="Login">
</form>
</main>

<?php
// clear messages after showing
unset($_SESSION['usernameErrMsg'], $_SESSION['passwordErrMsg'], $_SESSION['old_username']);
?>

 <?php include 'footer.php'; ?>

<script src="js/loginView.js"></script>

</body>
</html>
