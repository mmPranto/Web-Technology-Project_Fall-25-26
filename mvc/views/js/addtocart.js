document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".icon-btn.cart").forEach(button => {
        button.addEventListener("click", function () {

            const card = this.closest(".product-card");
            const name = card.querySelector("h3").innerText.trim();
            const priceText = card.querySelector(".price").innerText;
            const price = parseInt(priceText.replace(/[^\d]/g, ""));

            let cart = JSON.parse(localStorage.getItem("cart")) || [];

            const index = cart.findIndex(item => item.name === name);

            if (index !== -1) {
                cart[index].qty++;
            } else {
                cart.push({ name, price, qty: 1 });
            }

            localStorage.setItem("cart", JSON.stringify(cart));
            alert("Added in cart!");
        });
    });
});
