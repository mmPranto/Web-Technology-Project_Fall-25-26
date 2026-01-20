<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <header class="top-header">
        <div class="logo"> <a href="home.php" style="text-decoration: none; " ><span>PCStation</span></a></div>
        <div class="search-box">
            <select>
                <option>All Category</option>
                <option href="motherboard.php">Motherboard</option>
                <option href="laptop.php">Laptop</option>
                <option href="monitor.php">Monitor</option>
                <option href="processor.php">Processor</option>
                <option href="ram.php">Ram</option>
                <option href="ssd.php">SSD</option>
                <option href="graphics-card.php">Graphics Card</option>
                <option href="printer.php">Printer</option>
            </select>
            <input type="text" placeholder="Search for products...">
            <button><i class="fas fa-search"></i></button>
        </div>

    <div class="user-area">
        <i class="fa-solid fa-cart-shopping" onclick="goToCart()"></i>
        <i class="fa-regular fa-user user-icon" onclick="toggleLoginMenu()"></i>

<div class="login-dropdown" id="loginDropdown">

    <?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true): ?>
        <a href="../controllers/LogoutController.php" class="logout-btn">
            Logout
        </a>

    <?php else: ?>

        <a href="loginView.php" class="login-btn">Sign In</a>
        <a href="registration_view.php" class="create-account">Create An Account</a>

    <?php endif; ?>

</div>


    </div>
    </header>

     <script >

     </script>
     <script src="js/home.js"></script>


</body>
</html>