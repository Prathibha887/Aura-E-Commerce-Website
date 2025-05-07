

function displayCart() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let cartContainer = document.getElementById("cart-items");
    cartContainer.innerHTML = ""; // Clear previous content

    cart.forEach(item => {
        cartContainer.innerHTML += `
            <div class="cart-item">
                <img src="${item.image}" alt="${item.name}" width="50">
                <p>${item.name} - $${item.price} x ${item.quantity}</p>
            </div>
        `;
    });
}

function loadCart() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let cartTable = document.getElementById("cart-items");

    cartTable.innerHTML = cart.map((item, index) => `
        <tr>
            <td><img src="${item.image}" alt="${item.name}" width="50"></td>
            <td>${item.name}</td>
            <td>&#8377;${item.price.toFixed(2)}</td>
            <td>${item.quantity}</td>
            <td><button onclick="removeFromCart(${index})">Remove</button></td>
        </tr>
    `).join('');
}

function addToCart(name, price, image) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    let existingProduct = cart.find(item => item.name === name);

    if (existingProduct) {
        existingProduct.quantity += 1;
    } else {
        cart.push({ name, price, image, quantity: 1 });
    }

    localStorage.setItem("cart", JSON.stringify(cart));

    alert(`${name} added to cart!`);
    window.location.href = "cart.php";
}
