<?php
session_start();
require_once '../models/productModel.php';

// Fetch all products to display in the table
$conn = getDbConnection();
$result = $conn->query("SELECT * FROM product ORDER BY item ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Items - PC Station</title>
    <link rel="stylesheet" href="../views/css/Product.css">
    <style>
        .manage-container { max-width: 1000px; margin: 20px auto; padding: 20px; font-family: Arial, sans-serif; }
        .form-section { background: #f4f4f4; padding: 20px; border-radius: 8px; margin-bottom: 30px; border: 1px solid #ddd; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group select { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .btn-submit { background-color: #28a745; color: white; border: none; padding: 10px 15px; cursor: pointer; border-radius: 4px; }
        .item-table { width: 100%; border-collapse: collapse; background: white; }
        .item-table th, .item-table td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        .item-table th { background-color: #007bff; color: white; }
        .action-links a { margin-right: 10px; text-decoration: none; font-weight: bold; }
        .delete { color: #dc3545; }
        .update { color: #ffc107; }
        .alert { padding: 10px; background: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>

<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<div class="manage-container">
    <h2>Manage Inventory</h2>

    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
    <?php endif; ?>

    <div class="form-section">
        <h3>Insert New Product</h3>
        <form action="../controllers/manage_itemController.php" method="POST">
            <div class="form-group">
                <label>Category (7 Items Selection)</label>
                <select name="p_category" required>
                    <option value="">-- Select Item --</option>
                    <option value="processor">Processor</option>
                    <option value="laptop">Laptop</option>
                    <option value="motherboard">Motherboard</option>
                    <option value="monitor">Monitor</option>
                    <option value="ram">RAM</option>
                    <option value="ssd">SSD</option>
                    <option value="graphics card">Graphics Card</option>
                </select>
            </div>
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="p_name" required>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="p_price" required>
            </div>
            <div class="form-group">
                <label>Image Filename</label>
                <input type="text" name="p_image" placeholder="example.webp" required>
            </div>
            <button type="submit" name="add_product" class="btn-submit">Add Item</button>
        </form>
    </div>

    <table class="item-table">
        <thead>
            <tr>
                <th>Item Category</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo ucfirst($row['item']); ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td>৳ <?php echo number_format($row['price']); ?></td>
                <td class="action-links">
                    <a href="edit_item_view.php?name=<?php echo urlencode($row['product_name']); ?>" class="update">Update</a>
                    
                    <a href="../controllers/manage_itemController.php?action=delete&id=<?php echo urlencode($row['product_name']); ?>" 
                       class="delete" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>

</body>
</html>