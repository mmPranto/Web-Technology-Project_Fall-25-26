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

    
        <form id="checkoutForm">
        <div class="section">
            <h3>Delivery Address</h3>

            <label>Full Name</label>
            <input type="text" placeholder="Enter your name" required>

            <label>Phone Number</label>
            <input type="tel" placeholder="01XXXXXXXXX" required>

            <label>Address</label>
            <textarea rows="3" placeholder="House, Road, Area, City" required></textarea>
        </div>

        <div class="section">
            <h3>Payment Method</h3>

            <div class="payment-option">
                <input type="radio" id="cod" name="payment" required>
                <label for="cod">Cash on Delivery</label>
            </div>

            <div class="payment-option">
                <input type="radio" id="card" name="payment">
                <label for="card">Credit / Debit Card</label>
            </div>

            <div class="payment-option">
                <input type="radio" id="bkash" name="payment">
                <label for="bkash">bKash</label>
            </div>

            <div class="payment-option">
                <input type="radio" id="nagad" name="payment">
                <label for="nagad">Nagad</label>
            </div>
        </div>

   
        <div class="terms">
            <input type="checkbox" id="terms" required>
            <label for="terms">
                I agree to the <a href="T&C.php">Terms & Conditions</a>
            </label>
        </div>

        <div class="cart-actions">
            <button type="submit" id="confirmBtn">
        Confirm Order
    </button>
        </div>
        <div></div>
    </form>
</div>
</main>

      


  <?php include 'footer.php'; ?>


<script src="js/cart.js"></script>

</body>
</html>
