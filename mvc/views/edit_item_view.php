<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once '../models/productModel.php';

// 1. Get the name from the URL
$name_to_edit = $_GET['name'];

// 2. Fetch current data for this specific product
$conn = getDbConnection();
$stmt = $conn->prepare("SELECT * FROM product WHERE product_name = ?");
$stmt->bind_param("s", $name_to_edit);
$stmt->execute();
$product = $stmt->get_result()->fetch_assoc();

if (!$product) {
    die("Product not found!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="../views/css/Product.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div style="max-width: 600px; margin: 40px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
        <h2>Update Product: <?php echo htmlspecialchars($product['product_name']); ?></h2>
        
        <form action="../controllers/manage_itemController.php" method="POST">
            <input type="hidden" name="old_name" value="<?php echo htmlspecialchars($product['product_name']); ?>">

            <div style="margin-bottom: 15px;">
                <label>Product Name</label><br>
                <input type="text" name="p_name" value="<?php echo htmlspecialchars($product['product_name']); ?>" style="width:100%; padding:8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Category</label><br>
                <select name="p_category" style="width:100%; padding:8px;">
                    <?php 
                    $categories = ['processor', 'laptop', 'motherboard', 'monitor', 'ram', 'ssd', 'graphics card'];
                    foreach($categories as $cat) {
                        $selected = ($product['item'] == $cat) ? 'selected' : '';
                        echo "<option value='$cat' $selected>" . ucfirst($cat) . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label>Price (৳)</label><br>
                <input type="number" name="p_price" value="<?php echo $product['price']; ?>" style="width:100%; padding:8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Image Filename</label><br>
                <input type="text" name="p_image" value="<?php echo htmlspecialchars($product['image']); ?>" style="width:100%; padding:8px;">
            </div>

            <button type="submit" name="update_product" style="background:#ffc107; padding:10px 20px; border:none; cursor:pointer; width:100%;">Save Changes</button>
            <a href="manage_item_view.php" style="display:block; text-align:center; margin-top:10px; color:#666;">Cancel</a>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>