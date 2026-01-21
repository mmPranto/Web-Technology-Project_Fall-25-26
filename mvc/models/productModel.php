<?php
function getDbConnection() {
    $conn = new mysqli("localhost", "root", "", "pc_station");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    return $conn;
}

function getProductsByCategory($category) {
    $conn = getDbConnection();
    $stmt = $conn->prepare("SELECT * FROM product WHERE item = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = [];
    while ($row = $result->fetch_assoc()) { $products[] = $row; }
    $stmt->close();
    $conn->close();
    return $products;
}

function addProduct($name, $item, $price, $image) {
    $conn = getDbConnection();
    // Use 's' for price as well if the DB column is VARCHAR or to handle form strings
    $stmt = $conn->prepare("INSERT INTO product (product_name, item, price, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $item, $price, $image);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function updateProduct($oldName, $newName, $category, $price, $image) {
    $conn = getDbConnection();
    $stmt = $conn->prepare("UPDATE product SET product_name = ?, item = ?, price = ?, image = ? WHERE product_name = ?");
    $stmt->bind_param("ssiss", $newName, $category, $price, $image, $oldName);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function deleteProduct($name) {
    $conn = getDbConnection();
    $stmt = $conn->prepare("DELETE FROM product WHERE product_name = ?");
    $stmt->bind_param("s", $name);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}
?>