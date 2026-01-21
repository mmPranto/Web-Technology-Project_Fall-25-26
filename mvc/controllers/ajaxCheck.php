<?php
session_start();
require_once '../models/registration_model.php';

$field = $_POST['field'];
$value = $_POST['value'];
$currentUname = $_SESSION['username'] ?? '';

// If the user is checking their OWN current info, it is "available"
if (($field == 'uname' && $value == $currentUname)) {
    echo json_encode(['available' => true]);
    exit();
}

$column = ($field === 'uname') ? 'Username' : 'Email';
$isUnique = isValueUnique($column, $value);
echo json_encode(['available' => $isUnique]);