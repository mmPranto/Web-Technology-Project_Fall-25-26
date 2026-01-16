<?php
session_start();
require_once '../model/User.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $username = $_POST['uname'];
    $password = $_POST['password'];

    $_SESSION['usernameErrMsg'] = "";
    $_SESSION['passwordErrMsg'] = "";
    $_SESSION['username'] = "";

    $isValid = true;

    if (empty($username)) {
        $_SESSION['usernameErrMsg'] = "Provide your valid username";
        $isValid = false;
    } else {
        $_SESSION['username'] = $username;
    }

    if (empty($password)) {
        $_SESSION['passwordErrMsg'] = "Provide your valid password";
        $isValid = false;
    }

    if ($isValid) {
        if (matchCredentials($username, $password)) {
            $_SESSION['isLoggedIn'] = true;
            header("Location: ../views/HomeView.php");
            exit();
        } else {
            $_SESSION['passwordErrMsg'] = "Username or password does not match";
            header("Location: ../views/loginView.php");
            exit();
        }
    } else {
        header("Location: ../views/loginView.php");
        exit();
    }

} else {
    echo "Invalid request method";
}
