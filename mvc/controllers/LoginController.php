<?php
session_start();
require_once '../models/User.php';

$username = trim($_POST['uname'] ?? '');
$password = trim($_POST['password'] ?? '');

$_SESSION['usernameErrMsg'] = "";
$_SESSION['passwordErrMsg'] = "";
$_SESSION['old_username'] = $username;

// PHP validation (security backup)
if ($username === "") {
    $_SESSION['usernameErrMsg'] = "Username required";
    header("Location: ../views/loginView.php");
    exit;
}

if ($password === "") {
    $_SESSION['passwordErrMsg'] = "Password required";
    header("Location: ../views/loginView.php");
    exit;
}

// Database check
if (!usernameExists($username)) {
    $_SESSION['usernameErrMsg'] = "Username not found";
    header("Location: ../views/loginView.php");
    exit;
}

if (!matchCredentials($username, $password)) {
    $_SESSION['passwordErrMsg'] = "Incorrect password";
    header("Location: ../views/loginView.php");
    exit;
}

// Login success
$_SESSION['isLoggedIn'] = true;
$_SESSION['username'] = $username;
header("Location: ../views/home.php");
exit;
?>