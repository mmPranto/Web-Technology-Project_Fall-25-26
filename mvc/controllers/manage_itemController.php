<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../models/productModel.php';

// HANDLE INSERT
if (isset($_POST['add_product'])) {
    $name = $_POST['p_name'];
    $category = $_POST['p_category']; 
    $price = $_POST['p_price'];
    $image = $_POST['p_image'];

    try {
        addProduct($name, $category, $price, $image);
        $_SESSION['message'] = "New item inserted successfully!";
    } catch (Exception $e) {
        $_SESSION['message'] = "Error: " . $e->getMessage();
    }
    
    header("Location: ../views/manage_item_view.php");
    exit();
}

// HANDLE UPDATE
if (isset($_POST['update_product'])) {
    $oldName = $_POST['old_name']; // Captured from hidden input
    $newName = $_POST['p_name'];   // Captured from text input
    $category = $_POST['p_category'];
    $price = $_POST['p_price'];
    $image = $_POST['p_image'];

    updateProduct($oldName, $newName, $category, $price, $image);
    
    $_SESSION['message'] = "Item updated successfully!";
    header("Location: ../views/manage_item_view.php");
    exit();
}

// HANDLE DELETE
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    deleteProduct($_GET['id']);
    $_SESSION['message'] = "Item deleted!";
    header("Location: ../views/manage_item_view.php");
    exit();
}
?>