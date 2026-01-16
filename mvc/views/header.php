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
                <option>Motherboard</option>
                <option>Laptop</option>
                <option>Monitor</option>
                <option>Processor</option>
                <option>Ram</option>
                <option>SSD</option>
                <option>Graphics Card</option>
                <option>Printer</option>
            </select>
            <input type="text" placeholder="Search for products...">
            <button><i class="fas fa-search"></i></button>
        </div>

    <div class="user-area">
        <i class="fa-solid fa-cart-shopping" onclick="goToCart()"></i>
        <i class="fa-regular fa-user user-icon" onclick="toggleLoginMenu()"></i>

        <div class="login-dropdown" id="loginDropdown">
            <a href="login.php" class="login-btn">Sign In</a>
            <a href="registration-form.php" class="create-account">Create An Account</a>
        </div>
    </div>
    </header>

     <script >

     </script>
     <script src="js/home.js"></script>


</body>
</html>