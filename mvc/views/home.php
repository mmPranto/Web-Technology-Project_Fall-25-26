<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>PCSTATION</title>
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>
    <body>


        <?php include 'header.php'; ?>
        

   
        <div class="login-box" id="loginBox">
            <button>Click to Login</button>
            <a href="#">Create An Account</a>
        </div>

        <?php include 'nav.php'; ?>

        


        <section class="categories">
            <div class="cat-card"><a href="Motherboard.php" style="text-decoration: none;"><img src="images/home_img/motherboard.webp" alt="" width="60" height="50"><p>Mother Board</p></a></div>
            <div class="cat-card"><a href="Laptop.php" style="text-decoration: none;"><img src="images/home_img/laptop.webp" alt="" width="60" height="50"><p>Laptop</p></a></div>
            <div class="cat-card"><a href="Monitor.php" style="text-decoration: none;"><img src="images/home_img/monitor.webp" alt="" width="60" height="50"><p>Monitor</p></a></div>
            <div class="cat-card"><a href="Processor.php" style="text-decoration: none;"><img src="images/home_img/processor.webp" alt="" width="60" height="50"><p>Processor</p></a></div>
            <div class="cat-card"><a href="Ram.php" style="text-decoration: none;"><img src="images/home_img/ram.webp" alt="" width="60" height="50"><p>RAM</p></a></div>
            <div class="cat-card"><a href="SSD.php" style="text-decoration: none;"><img src="images/home_img/ssd.webp" alt="" width="60" height="50"><p>SSD</p></a></div>
            <div class="cat-card"><a href="Graphics_card.php" style="text-decoration: none;"><img src="images/home_img/graphics-card.webp" alt="" width="60" height="50"><p>Graphics Card</p></a></div>
         
        </section>



        <script>

            function toggleLoginMenu() {
            const dropdown = document.getElementById("loginDropdown");
            dropdown.style.display =
                dropdown.style.display === "block" ? "none" : "block";
        }

        /* Close when clicking outside */
        document.addEventListener("click", function (e) {
            const userArea = document.querySelector(".user-area");
            if (!userArea.contains(e.target)) {
                document.getElementById("loginDropdown").style.display = "none";
            }
        });

        function goToCart() {
            window.location.href = "cart.php";
        }
        </script>
        <section style="margin: 400px">
            
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>

