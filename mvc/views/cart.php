<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <link rel="stylesheet" href="css/Cart.css">
</head>
<body>

 <?php include 'header.php'; ?>

 
 <br><br><br><br><br><br>
 <br><br><br><br><br><br>


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
    <a href="checkout.php"><button class="checkout-btn">Check Out </button></a>
</div>


</div>
 </main>

 <br><br><br><br><br><br>
 <br><br><br><br><br><br>
 <br><br><br><br><br><br>
 <br><br><br><br><br><br>



  <?php include 'footer.php'; ?>

<script>
    const isLoggedIn = <?php echo isset($_SESSION['isLoggedIn']) ? 'true' : 'false'; ?>;
</script>

<script src="js/cart.js"></script>



</body>
</html>
