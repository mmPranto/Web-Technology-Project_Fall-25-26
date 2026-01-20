<?php
if (!isset($_GET['order_id'])) {
    header("Location: home.php");
    exit();
}
?>

<h2>Order Confirmed 🎉</h2>
<p>Your Order ID: <strong>#<?php echo $_GET['order_id']; ?></strong></p>
<p>Status: Pending</p>

