<?php
$conn = new mysqli("localhost", "root", "", "pc_station");

if ($conn->connect_error) {
    die("Database connection failed");
}
?>
