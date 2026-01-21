<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
	<link rel="stylesheet" href="../views/css/registration_page.css">

</head>
<body>

	<?php include 'header.php'; ?>
    
	<div class="form-container">
		<form id="regForm" action="../controllers/registrationController.php" method="post">
        <h2>Create Account</h2>

        <label>First Name <span style="color: red;">*</span></label>
        <input type="text" name="fname" id="fname" placeholder="John">
        <span class="error-msg"><?php echo $_SESSION['firstnameErrMsg'] ?? ""; ?></span>

        <label>Last Name <span style="color: red;">*</span></label>
        <input type="text" name="lname" id="lname" placeholder="Alex">
        <span class="error-msg"><?php echo $_SESSION['lastnameErrMsg'] ?? ""; ?></span>

        <label>Username <span id="uname-status" class="ajax-status"></span></label>
        <input type="text" name="uname" id="uname" placeholder="johnalex123">
        <span class="error-msg"><?php echo $_SESSION['usernameErrMsg'] ?? ""; ?></span>

        <label>Email <span id="email-status" class="ajax-status"></span></label>
        <input type="text" name="email" id="email" placeholder="example@mail.com">
        <span class="error-msg"><?php echo $_SESSION['emailErrMsg'] ?? ""; ?></span>

        <label>Password</label>
        <input type="password" name="password" id="password" placeholder="Enter password">
        <span class="error-msg"><?php echo $_SESSION['passwordErrMsg'] ?? ""; ?></span>

        <label>Confirm Password</label>
        <input type="password" name="con-pass" id="con-pass" placeholder="Re-write the password">
        <span class="error-msg">
            <?php 
                echo $_SESSION['con_passErrMsg'] ?? ""; 
                echo " " . ($_SESSION['pass_not_matched'] ?? ""); 
            ?>
        </span>

        <input class="btn" type="submit" name="Registration" value="Register Now">
    </form>
	</div>

	 <?php include 'footer.php'; ?>

    <script src="../views/js/registrationValidation.js"></script>
</body>
</html>