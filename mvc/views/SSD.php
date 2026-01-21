<?php 
session_start();
require_once '../models/productModel.php'; 
// Fetch only items where 'item' = 'ssd'
$ssd_items = getProductsByCategory('ssd'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SSD Storage - PCStation</title>
    <link rel="stylesheet" href="../views/css/Product.css">
    <style>
        /* Forces exactly 4 items per row */
        .product-section {
            display: grid;
            grid-template-columns: repeat(4, 1fr); 
            gap: 20px;
            padding: 20px;
        }

        /* Fixes alignment for titles with varying lengths */
        .product-card h3 {
            font-size: 14px;
            height: 50px;
            overflow: hidden;
            margin-bottom: 10px;
            line-height: 1.2;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<section class="product-section">
    <?php if (!empty($ssd_items)): ?>
        <?php foreach ($ssd_items as $product): ?>
            <div class="product-card">
                <span class="save-badge">In Stock</span>
                
                <img src="../views/images/ssd/<?php echo htmlspecialchars($product['image']); ?>" 
                     alt="<?php echo htmlspecialchars($product['product_name']); ?>">

                <h3><?php echo htmlspecialchars($product['product_name']); ?></h3>

                <div class="price">
                    ৳ <?php echo number_format($product['price']); ?>
                </div>

                <div class="stock">In Stock</div>

                <div class="actions">
                    <button class="icon-btn">❤</button>
                    <button class="icon-btn">⇄</button>
                    <button class="icon-btn cart" 
                            onclick="addToCart(<?php echo $product['price']; ?>, '<?php echo addslashes($product['product_name']); ?>')">
                        🛒
                    </button>
                </div>

                <button class="buy-btn">Buy Now</button>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align:center; width:100%;">No SSD products found in database.</p>
    <?php endif; ?>
</section>

<script src="js/addtocart.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>