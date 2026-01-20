<?php
session_start();
require_once '../models/registration_model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentSessionUname = $_SESSION['username'];
    $isAdmin = ($currentSessionUname === 'admin');

    $pass = $_POST['password'];
    $conPass = $_POST['con-pass'];
    
    // 1. Password Match Validation
    if (!empty($pass) && $pass !== $conPass) {
        $_SESSION['error'] = "Passwords do not match!";
        header("Location: ../views/profile_view.php");
        exit();
    }

    if ($isAdmin) {
        // ADMIN LOGIC: Only change password. Keep names fixed.
        $success = updateProfile("admin", "admin", "admin", "admin@gmail.com", $pass, "admin");
    } else {
        // USER LOGIC: Update everything provided
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $newUname = trim($_POST['uname']);
        $email = trim($_POST['email']);

        $success = updateProfile($fname, $lname, $newUname, $email, $pass, $currentSessionUname);
        
        if ($success) {
            $_SESSION['username'] = $newUname; // Update session if username changed
        }
    }

    if ($success) {
        header("Location: ../views/profile_view.php?status=success");
    } else {
        header("Location: ../views/profile_view.php?status=failed");
    }
    exit();
}