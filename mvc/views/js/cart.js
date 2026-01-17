document.addEventListener("DOMContentLoaded", function () {
    renderCart();
});

function renderCart() {
    const cartItems = document.getElementById("cartItems");
    const totalPrice = document.getElementById("totalPrice");

    if (!cartItems || !totalPrice) {
        console.error("Cart elements not found");
        return;
    }

    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cartItems.innerHTML = "";
    let total = 0;

    if (cart.length === 0) {
        cartItems.innerHTML = `
            <tr>
                <td colspan="5" style="text-align:center;">Your cart is empty</td>
            </tr>
        `;
        totalPrice.innerText = "Total: ৳ 0";
        return;
    }

    cart.forEach((item, index) => {
        let subtotal = item.price * item.qty;
        total += subtotal;

        cartItems.innerHTML += `
            <tr>
                <td>${item.name}</td>
                <td>${item.price}</td>
                <td>
                    <button onclick="decreaseQuantity(${index})">−</button>
                    ${item.qty}
                    <button onclick="increaseQuantity(${index})">+</button>
                </td>
                <td>${subtotal}</td>
                <td>
                    <button onclick="removeItem(${index})">❌</button>
                </td>
            </tr>
        `;
    });

    totalPrice.innerText = "Total: ৳ " + total;
}

// Increase
function increaseQuantity(index) {
    let cart = JSON.parse(localStorage.getItem("cart"));
    cart[index].qty += 1;
    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
}

// Decrease
function decreaseQuantity(index) {
    let cart = JSON.parse(localStorage.getItem("cart"));

    if (cart[index].qty > 1) {
        cart[index].qty -= 1;
    } else {
        cart.splice(index, 1);
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
}

//remove
function removeItem(index) {
    let cart = JSON.parse(localStorage.getItem("cart"));
    cart.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
}


function checkout() {

    if (!isLoggedIn) {
        alert("⚠️ You have to login to checkout!");
        window.location.href = "loginView.php";
        return;
    }

    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    if (cart.length === 0) {
        alert("Your cart is empty!");
        return;
    }

    // Go to checkout page
    window.location.href = "checkout.php";
}


document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("checkoutForm");

    if (!form) {
        console.error("Form not found");
        return;
    }
    form.addEventListener("submit", function (e) {
    e.preventDefault();

    if (!isLoggedIn) {
        alert("⚠️ You must login to place an order!");
        window.location.href = "loginView.php";
        return;
    }

    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    if (cart.length === 0) {
        alert("Your cart is empty!");
        return;
    }



        const name = form.querySelector('input[type="text"]');
        const phone = form.querySelector('input[type="tel"]');
        const address = form.querySelector("textarea");
        const payment = form.querySelector('input[name="payment"]:checked');
        const terms = document.getElementById("terms");

        if (!name || !phone || !address) {
            alert("Form fields missing");
            return;
        }

        if (name.value.trim() === "") {
            alert("Please enter your name");
            name.focus();
            return;
        }

        if (phone.value.trim() === "") {
            alert("Please enter your phone number");
            phone.focus();
            return;
        }

        if (address.value.trim() === "") {
            alert("Please enter your address");
            address.focus();
            return;
        }

        if (!payment) {
            alert("Please select a payment method");
            return;
        }

        if (!terms.checked) {
            alert("You must agree to the Terms & Conditions");
            return;
        }

        alert("✅ Your order is confirmed!");

        localStorage.removeItem("cart");

        window.location.href = "home.php";
    });

});
