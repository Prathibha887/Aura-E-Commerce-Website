<?php
session_start();
include 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['aurauser'])) {
    echo "<script>alert('Please log in first!'); window.location.href='login.php';</script>";
    exit();
}

$email = $_SESSION['aurauser'];

// Retrieve wishlist items
$sql = "SELECT * FROM wishlist WHERE email = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

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
</head>

<body>
  
<header class="header">
        <nav class="nav container fixed-position">
            <a href="home.php" class="nav_logo">
                <img src="images/aura1.png" alt="" class="nav_logo-img"/>
            </a>
            <div class="nav_menu" id="nav-menu">
                <div class="nav_menu-top">
                    <a href="home.php" class="nav_menu-logo">
                        <img src="images/aura1.png" alt="" width="30px">
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
                        <a href="shop.php" class="nav_link active-link">Shop</a>
                    </li>
                    
                    
                </ul>
            </div>
            <div class="header_user-actions">
                <a href="wishlist.php" class="header_action-btn">
                    <img src="images/heart1.svg" alt="" style="width:30px">
                </a>
                
                <a onclick="window.location.href='logout.php'" class="header_action-btn">
                    <img src="images/logout.svg" alt="" style="width:30px;cursor:pointer"/>
                </a>
                <!-- <a  class="header_action-btn nav_toggle" id="nav-toggle">
                    <img src="images/logout.svg" alt="" style="width:30px;cursor:pointer"/>
                </a> -->
                <div class="header_action-btn nav_toggle" id="nav-toggle">
                    <img src="images/hamburger1.svg" alt="" width="30px">
                </div>
            </div>
        </nav>
    </header>

    <br>
    
   
    <div class="board">
    <h3 style="color:black">Your <span style="color:black">Wishlist</span></h3>
    <table>
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Product</th>
                <th>Price</th>
                
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><img src="./admin/popular/<?php echo $row['image']; ?>" alt="Product Image" class="table_img" width="100px"></td>
                        <td><h3 class="table_title"><?php echo $row['productname']; ?></h3></td>
                        <td><span class="table_price">₹<?php echo $row['price']; ?></span></td>
                   
                        <td>
                            <form method="post" action="remove_from_wishlist.php">
                                <input type="hidden" name="wishlist_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fi fi-rs-trash table_trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr><td colspan="5" class="empty_message">Your wishlist is empty. <a href="shop.php">Continue shopping</a></td></tr>
            <?php } ?>
        </tbody>
    </table>
</div>

    <a href="shop.php" style="color:brown">Continue Shopping</a>

    <!-- <script>
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
    </script> -->
    
</body>

</html>
<?php
mysqli_stmt_close($stmt);
mysqli_close($con);
?>