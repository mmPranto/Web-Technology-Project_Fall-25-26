<?php 

session_start();
session_destroy();

header("Location: ../views/loginView.php");
?>