<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <link rel="stylesheet" href="css/Cart.css">
</head>
<body>

<?php include 'header.php'; ?>

<br><br><br><br><br>

<main class="cart-page">
<div class="cart-container">

    <h2>🛒 Shopping Cart</h2>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price (৳)</th>
                <th>Quantity</th>
                <th>Total (৳)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="cartItems"></tbody>
    </table>

    <div class="cart-total" id="totalPrice"></div>

    <div class="cart-actions">

        <!-- CHECKOUT -->
        <a href="checkout.php">        <!-- only if cart.php is loaded from mvc/views -->
            <button class="checkout-btn">Check Out</button>
        </a>

        <!-- TRACK ORDER (ONLY IF LOGGED IN) -->
        <?php if (isset($_SESSION['username'])) { ?>
            <a href="trackOrder.php">
                <button class="track-btn">Track Order</button>
            </a>
        <?php } ?>

    </div>

</div>
</main>

<br><br><br><br><br>

<?php include 'footer.php'; ?>


<script src="js/cart.js"></script>


</body>
</html>
