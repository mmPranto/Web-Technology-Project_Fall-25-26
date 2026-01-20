<?php
session_start();
require_once '../models/registration_model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;
    
    // 1. Sanitize Inputs
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $uname = trim($_POST['uname']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $pass  = $_POST['password'];
    $con_pass = $_POST['con-pass'];

    // 2. Reset/Initialize Session Errors
    $_SESSION['firstnameErrMsg'] = "";
    $_SESSION['lastnameErrMsg'] = "";
    $_SESSION['usernameErrMsg'] = "";
    $_SESSION['emailErrMsg'] = "";
    $_SESSION['passwordErrMsg'] = "";
    $_SESSION['con_passErrMsg'] = "";
    $_SESSION['pass_not_matched'] = "";

    // 3. Basic Empty Validation
    if (empty($fname)) { $_SESSION['firstnameErrMsg'] = "First name required"; $isValid = false; }
    if (empty($lname)) { $_SESSION['lastnameErrMsg'] = "Last name required"; $isValid = false; }
    if (empty($uname)) { $_SESSION['usernameErrMsg'] = "Username required"; $isValid = false; }
    if (empty($pass))  { $_SESSION['passwordErrMsg'] = "Password required"; $isValid = false; }
    if (empty($con_pass)) { $_SESSION['con_passErrMsg'] = "Confirm your password"; $isValid = false; }

    // 4. Email Format Validation
    if (!empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailErrMsg'] = "Invalid email format";
            $isValid = false;
        }
    } else {
        $_SESSION['emailErrMsg'] = "Email required";
        $isValid = false;
    }

    // 5. Password Match Validation
    if ($pass !== $con_pass) {
        $_SESSION['pass_not_matched'] = "Passwords do not match";
        $isValid = false;
    }

    // 6. Database Uniqueness Check (Only if previous checks passed)
    if ($isValid) {
        if (!isValueUnique('Username', $uname)) {
            $_SESSION['usernameErrMsg'] = "Username already taken";
            $isValid = false;
        }
        
        if (!isValueUnique('Email', $email)) {
            $_SESSION['emailErrMsg'] = "Email already registered";
            $isValid = false;
        }
    }

    // 7. Final Action
    if ($isValid) {
        // Success: Save and Redirect
        if (saveUser($fname, $lname, $uname, $email, $pass)) {
            session_unset();
            session_destroy(); // Optional: clean up completely before welcome
            header("Location: ../views/home.php?status=success");
            exit(); 
        } else {
            // This catches DB execution errors without crashing
            $_SESSION['registrationError'] = "Server error. Please try again later.";
            header("Location: ../views/registration_view.php");
            exit();
        }
    } else {
        // Failure: Stay on registration page with errors
        header("Location: ../views/registration_view.php");
        exit();
    }
}