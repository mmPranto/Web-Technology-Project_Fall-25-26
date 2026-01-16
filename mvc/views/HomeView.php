<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
	header("Location: loginView.php");
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
</head>
<body>

	<h1>Hi, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Anonymous User'; ?></h1>

	<a href="../controllers/LogoutController.php">Logout</a>

</body>
</html>