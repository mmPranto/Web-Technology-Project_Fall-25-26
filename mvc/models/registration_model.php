<?php
function getDbConnection() {
    $conn = new mysqli("localhost", "root", "", "pc_station");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    return $conn;
}

function isValueUnique($column, $value) {
    $conn = getDbConnection();
    $stmt = $conn->prepare("SELECT Username FROM registration WHERE $column = ?");
    $stmt->bind_param("s", $value);
    $stmt->execute();
    $stmt->store_result();
    $count = $stmt->num_rows;
    $stmt->close();
    $conn->close();
    return $count === 0;
}

function saveUser($fname, $lname, $uname, $email, $pass) {
    $conn = getDbConnection();
    try {
        $stmt = $conn->prepare("INSERT INTO registration (First_name, Last_name, Username, Email, Password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fname, $lname, $uname, $email, $pass);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    } catch (mysqli_sql_exception $e) {
        // Log the error and return false instead of crashing
        error_log($e->getMessage());
        return false;
    }
}
?>