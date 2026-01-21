<?php 
session_start();
require_once '../models/productModel.php';
$processors = getProductsByCategory('processor'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Processors - PCStation</title>
    <link rel="stylesheet" href="../views/css/Product.css">
    <style>
        /* CSS to ensure 4 items per row */
        .product-section {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 equal columns */
            gap: 20px;
            padding: 20px;
        }
        @media (max-width: 1024px) {
            .product-section { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 600px) {
            .product-section { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<section class="product-section">
    <?php if (count($processors) > 0): ?>
        <?php foreach ($processors as $product): ?>
            <div class="product-card">
                <span class="save-badge">Special Price</span>
                
                <img src="../views/images/processor/<?php echo htmlspecialchars($product['image']); ?>" 
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
        <p>No processors found in database.</p>
    <?php endif; ?>
</section>

<script src="js/addtocart.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>