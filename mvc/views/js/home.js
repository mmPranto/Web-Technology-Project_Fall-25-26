
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
    
    };