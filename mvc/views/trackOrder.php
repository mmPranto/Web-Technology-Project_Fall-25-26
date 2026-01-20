<?php
session_start();
require_once("../config/db.php");
require_once("../models/OrderModel.php");



$username = $_SESSION['username'];

$result = $conn->prepare("SELECT * FROM orders WHERE username=?");
$result->bind_param("s", $username);
$result->execute();
$data = $result->get_result();
?>

<h2>Your Orders</h2>

<?php if ($data->num_rows == 0) { ?>
    <p>You have no order</p>
<?php } else { ?>
    <?php while ($row = $data->fetch_assoc()) { ?>
        <p>
            Order ID: <?= $row['order_id'] ?> |
            Status: <?= $row['order_status'] ?> |
            Total: ৳<?= $row['total_amount'] ?>
        </p>
    <?php } ?>
<?php } ?>
