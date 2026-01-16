<?php
session_start();
require_once '../model/User.php';

$username = $_POST['uname'];
$password = $_POST['password'];

if (!usernameExists($username)) {
    echo json_encode(["status" => "username_error"]);
    exit();
}

if (!matchCredentials($username, $password)) {
    echo json_encode(["status" => "password_error"]);
    exit();
}

$_SESSION['isLoggedIn'] = true;
echo json_encode(["status" => "success"]);

?>