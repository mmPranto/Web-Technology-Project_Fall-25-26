document.addEventListener("DOMContentLoaded", function () {
    renderCart();
});

function renderCart() {
    const cartItemsEl = document.getElementById("cartItems");
    const totalPriceEl = document.getElementById("totalPrice");

    if (!cartItemsEl || !totalPriceEl) {
        console.error("Cart elements not found");
        return;
    }

    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cartItemsEl.innerHTML = "";

    let total = 0; // ✅ FIX: declare total FIRST

    if (cart.length === 0) {
        cartItemsEl.innerHTML = `
            <tr>
                <td colspan="5" style="text-align:center;">Your cart is empty</td>
            </tr>
        `;
        totalPriceEl.innerText = "Total: ৳ 0";

        // save empty cart
        saveCartToSession(cart);
        saveCartTotalToSession(0);
        return;
    }

    cart.forEach((item, index) => {
        let subtotal = item.price * item.qty;
        total += subtotal;

        cartItemsEl.innerHTML += `
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

    totalPriceEl.innerText = "Total: ৳ " + total;

    // ✅ SAVE DATA TO PHP SESSION
    saveCartToSession(cart);
    saveCartTotalToSession(total);
}

// ---------------- CART ACTIONS ----------------

function increaseQuantity(index) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart[index].qty += 1;
    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
}

function decreaseQuantity(index) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    if (cart[index].qty > 1) {
        cart[index].qty -= 1;
    } else {
        cart.splice(index, 1);
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
}

function removeItem(index) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
}

// ---------------- SAVE TO PHP SESSION ----------------

function saveCartToSession(cart) {
    fetch('saveCart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ cart: cart })
    });
}

function saveCartTotalToSession(total) {
    fetch('saveCartTotal.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ total: total })
    });
}
