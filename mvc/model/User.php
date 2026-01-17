<?php

function dbConnection() {
    return mysqli_connect("localhost", "root", "", "pc_station");
}

function usernameExists($username) {
    $conn = dbConnection();
    $sql = "SELECT Username FROM registration WHERE Username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    return mysqli_stmt_num_rows($stmt) === 1;
}

function matchCredentials($username, $password) {
    $conn = dbConnection();
    $sql = "SELECT Username FROM registration WHERE Username = ? AND Password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    return mysqli_stmt_num_rows($stmt) === 1;
}
?>