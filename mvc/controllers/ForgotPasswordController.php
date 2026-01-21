<?php
session_start();
require_once '../models/User.php'; // Ensure this points to your model file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['uname']);
    $newPass = $_POST['new_pass'];
    $conPass = $_POST['con_pass'];
    $isValid = true;

    // 1. Check if Username exists
    if (!usernameExists($username)) {
        $_SESSION['forgotUnameErr'] = "Username does not exist";
        $isValid = false;
    }

    // 2. Check if passwords match
    if ($newPass !== $conPass) {
        $_SESSION['forgotPassErr'] = "Passwords do not match";
        $isValid = false;
    }

    if ($isValid) {
        // 3. Update Password
        if (updateUserPassword($username, $newPass)) {
            $_SESSION['loginMsg'] = "Password updated successfully. Please login.";
            header("Location: ../views/loginView.php");
            exit;
        } else {
            die("Error updating password.");
        }
    } else {
        header("Location: ../views/forgotPasswordView.php");
        exit;
    }
}