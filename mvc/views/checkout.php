<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: loginView.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>
    <link rel="stylesheet" href="css/checkout.css">
</head>
<body>
    
     <?php include 'header.php'; ?>

<main class="checkout-page">
    <div class="payment-container">
        <h2>Payment & Checkout</h2>

    
<form action="../controllers/OrderController.php" method="POST">

    <label>Full Name</label>
    <input type="text" name="full_name" required>

    <label>Phone Number</label>
    <input type="tel" name="phone" required>

    <label>Address</label>
    <textarea name="address" required></textarea>

    <div class="section">
        <h3>Payment Method</h3>

        <div class="payment-option">
            <input type="radio" name="payment" value="COD" required>
            <label>Cash on Delivery</label>
        </div>

        <div class="payment-option">
            <input type="radio" name="payment" value="Card">
            <label>Card</label>
        </div>

        <div class="payment-option">
            <input type="radio" name="payment" value="bKash">
            <label>bKash</label>
        </div>

        <div class="payment-option">
            <input type="radio" name="payment" value="Nagad">
            <label>Nagad</label>
        </div>
    </div>

    <div class="terms">
        <label>
            <input type="checkbox" required>
            I agree to the <a href="T&C.php">Terms & Conditions</a>
        </label>
    </div>

    <button type="submit">Confirm Order</button>
</form>


</div>
</main>

      


  <?php include 'footer.php'; ?>


<script src="js/cart.js"></script>

</body>
</html>
