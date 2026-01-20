<?php
require_once '../config/db.php';

class OrderModel {

    public function createOrder($username, $data) {
        global $conn;

        $stmt = $conn->prepare("
            INSERT INTO orders 
            (username, total_amount, payment_method, delivery_name, phone, address)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "sdssss",
            $username,
            $data['total'],
            $data['payment'],
            $data['name'],
            $data['phone'],
            $data['address']
        );

        $stmt->execute();
        return $conn->insert_id;
    }

    public function addOrderItems($order_id, $cart) {
        global $conn;

        foreach ($cart as $item) {
            $stmt = $conn->prepare("
                INSERT INTO order_items 
                (order_id, product_id, product_name, price, quantity)
                VALUES (?, ?, ?, ?, ?)
            ");

            $stmt->bind_param(
                "iisdi",
                $order_id,
                $item['id'],
                $item['name'],
                $item['price'],
                $item['qty']
            );

            $stmt->execute();
        }
    }
}
