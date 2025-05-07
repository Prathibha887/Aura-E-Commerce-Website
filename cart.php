<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cart.css">
     <!----=================FLATICON======================================-->
  <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css" />

    <!---======================SWIPER CSS===================================-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!--======================================FONTAWESOME============================-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-----------------------------------------CSS------------------------------------------------------>
    <link rel="stylesheet" href="styless.css">
    

    <!-----------------------------------TAILWINDCSS-------------------------------------------------------------->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
    <!-----------------------------------------JS---------------------------------------------------------------->
    
    <script src="style.js"></script>
    <style>
        @media screen and (max-width:1200px) {
  
 
  
  .container{
    max-width: 960px;

  }

.nav {
 
  width: 100vw !important;
  max-width: 100vw !important;
; /* Just for testing */
}


.nav{
  height: calc(var(--header-height)+1.5rem);
  width: 100%;
}

.nav_logo-img{
  width: 116px;
}

.nav_menu{
  position: fixed;
  right: -100%;
  top: 0;
  max-width: 400px;
  height: 100%;
  padding: 1.25rem 2rem;
  background-color: var(--body-color);
  z-index: 1000;
  flex-direction: column;
  align-items: flex-start;
  row-gap: 2rem;
  box-shadow: 0 0 15px hsla(0,0%,0%,0.1);
  transition: all 0.25s var(--transition);
}
.show-menu{
  right: 0px;
}


.nav_list{
  order: 1;
  flex-direction: column;
  align-items: flex-start;
  row-gap: 2rem;
}

.nav_link{
  font-size: var(--large-font-size);
}

.nav_menu-top,
.nav_toggle{
  display: flex;
}
.nav_menu-top{
  align-items: center;
  justify-content: space-between;
  width: 100%;
  margin-bottom: 1.25rem;
}
.nav_logo-img img{
width: 100px;
}
.nav_close{
font-size:var(--h2-font-size);
line-height:1rem;
}
.header_action-btn {
position: relative;
z-index: 2;
}

.nav_toggle {
z-index: 3; /* Ensures the hamburger icon is on top of other elements */
}
.header_user-actions {
display: flex;
justify-content: flex-end; /* Aligns items to the right */
align-items: center; /* Vertically center the items */
gap: 1rem; /* Adds space between the items */
}
.header_action-btn{
width: 21px;
}
}

    </style>
</head>

<body>
  
    <header class="header">
        <nav class="nav container fixed-position">
            <a href="index.html" class="nav_logo">
                <img src="images/aura1.png" alt="" class="nav_logo-img"/>
            </a>
            <div class="nav_menu" id="nav-menu">
                <div class="nav_menu-top">
                    <a href="index.html" class="nav_menu-logo">
                        <img src="images/img1.png" alt="" width="30px">
                    </a>
                    <div class="nav_close" id="nav-close">
                        <i class="fi fi-rs-cross-small"></i>
                    </div>
                </div>
                <ul class="nav_list">
                    <li class="nav_item">
                        <a href="home.php" class="nav_link">Home</a>
                    </li>
                    <li class="nav_item">
                        <a href="#" class="nav_link active-link">Shop</a>
                    </li>
                    <li class="nav_item">
                        <a href="accounts.php" class="nav_link">Account</a>
                    </li>
                    <li class="nav_item">
                        <a href="index.php" class="nav_link">Login</a>
                    </li>
                </ul>
            </div>
            <div class="header_user-actions">
                <a href="wishlist.php" class="header_action-btn">
                    <img src="images/heart1.svg" alt="" style="width:30px">
                </a>
                <a href="cart.php" class="header_action-btn">
                    <img src="images/cart1.svg" alt="" style="width:30px"/>
                </a>
                <a onclick="window.location.href='logout.php'" class="header_action-btn">
                    <img src="images/logout.svg" alt="" style="width:30px;cursor:pointer"/>
                </a>
                <div class="header_action-btn nav_toggle" id="nav-toggle">
                    <img src="images/hamburger1.svg" alt="" width="30px">
                </div>
            </div>
        </nav>
    </header>
    <section class="breadcrumb">
                    <ul class="breadcrumb_list container">
                      <li><a href="home.php" ><span class="breadcrumb_link">Home</span></a></li>
                     

                      <li><span class="breadcrumb_link">></span></li>
                      <li><span class="breadcrumb_link">Shop</span></li>
                    </ul>
        </section>
    <br>
    <h2>Your Cart</h2>
    <div class="board">
    <table>
        <thead>
            <tr>
                <th>Product Image </th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="cart-items"></tbody>
    </table>
    </div>
    <!-- <button onclick="clearCart()">Clear Cart</button>
    <button onclick="checkout()">Checkout</button><br> -->
    <a href="shop.php" style="color:brown">Continue Shopping</a>

    <script>
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

        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart.splice(index, 1);
            localStorage.setItem("cart", JSON.stringify(cart));
            loadCart();
        }

        function clearCart() {
            localStorage.removeItem("cart");
            loadCart();
        }

        function checkout() {
            alert("Proceeding to checkout!");
        }

        window.onload = loadCart;
    </script>
</body>

</html>