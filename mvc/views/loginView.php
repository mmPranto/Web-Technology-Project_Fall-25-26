<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Form</title>
	<link rel="stylesheet" href="css/loginView.css">
</head>
<body>
	     <?php include 'header.php'; ?> 
	<main class="login-page">
	<form action="../controllers/LoginController.php" method="post">
		<h1>Login</h1>
		<label>Username</label>
<input type="text" id="uname" name="uname">
<span id="usernameError" class="error"></span>

<br><br>

<label>Password</label>
<input type="password" id="password" name="password">
<span id="passwordError" class="error"></span>

<br><br>
<input type="submit" value="Login">

	</form>
	</main>

	<?php include 'footer.php'; ?>
<script>
document.querySelector("form").addEventListener("submit", function(e) {
    e.preventDefault();

    let username = document.getElementById("uname").value.trim();
    let password = document.getElementById("password").value.trim();

    document.getElementById("usernameError").innerText = "";
    document.getElementById("passwordError").innerText = "";

    let hasError = false;

    if (username === "") {
        document.getElementById("usernameError").innerText = "Provide your valid username";
        hasError = true;
    }

    if (password === "") {
        document.getElementById("passwordError").innerText = "Provide your valid password";
        hasError = true;
    }

    if (hasError) return;

    // AJAX request
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../controllers/LoginAjaxController.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        let res = JSON.parse(this.responseText);

        if (res.status === "username_error") {
            document.getElementById("usernameError").innerText = "Invalid username";
        }
        else if (res.status === "password_error") {
            document.getElementById("passwordError").innerText = "Invalid password";
        }
        else if (res.status === "success") {
            window.location.href = "HomeView.php";
        }
    };

    xhr.send("uname=" + username + "&password=" + password);
});
</script>



</body>
</html>