<?php
session_start();

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['total'])) {
    $_SESSION['cart_total'] = $data['total'];
}
?>
 