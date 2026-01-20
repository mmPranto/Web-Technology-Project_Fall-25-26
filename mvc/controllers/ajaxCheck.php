<?php
require_once '../models/registration_model.php';
if (isset($_POST['field']) && isset($_POST['value'])) {
    $column = ($_POST['field'] === 'uname') ? 'Username' : 'Email';
    $isUnique = isValueUnique($column, $_POST['value']);
    echo json_encode(['available' => $isUnique]);
}