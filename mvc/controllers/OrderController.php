<?php
session_start();
require_once '../models/OrderModel.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../views/loginView.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $orderModel = new OrderModel();

    $data = [
        'name'    => $_POST['full_name'],
        'phone'   => $_POST['phone'],
        'address' => $_POST['address'],
        'payment' => $_POST['payment'],
        'total'   => $_SESSION['cart_total']
    ];

    $order_id = $orderModel->createOrder($_SESSION['username'], $data);
    $orderModel->addOrderItems($order_id, $_SESSION['cart']);

    unset($_SESSION['cart']);
    unset($_SESSION['cart_total']);

    header("Location: ../views/confirmOrderView.php?order_id=$order_id");
}
