<?php
session_start();
if(isset($_SESSION['aurauser']))
{
	$aurauser=$_SESSION['aurauser'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aura</title>
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
    
    <link rel="stylesheet" href="styles.css">
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
                        <a href="#" class="nav_link active-link">Shop</a>
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
               
            </div>
        </nav>
    </header>
  
    <section class="breadcrumb">
                    <ul class="breadcrumb_list containers">
                      <li><a href="home.php" class="breadcrumb_link">Home</a></li>
                      <li><span class="breadcrumb_link">></span></li>
                      <li><span class="breadcrumb_link">Shop</span></li>
                    </ul>
        </section><br><br>
     <main>
  
     <section class="breadcrumb">
                    <ul class="breadcrumb_list containers">
                      <li><a href="home.php" class="breadcrumb_link">Home</a></li>
                      <li><span class="breadcrumb_link">></span></li>
                      <li><span class="breadcrumb_link">Shop</span></li>
                    </ul>
        </section><br><br>
 

<div class="categorys">
            <div class="category">
                <a href="Men's.php">Men</a>
            </div>
            <div class="category">
                <a href="Women's.php">Women</a>
            </div>
            <div class="category">
                <a href="Kid's.php">Kids</a>
            </div>
            <div class="category">
                <a href="Footwear.php">Footwears</a>
            </div>
            <div class="category">
                <a href="Bag's.php">Bags</a>
            </div>
        </div>
<section class="products  section container">
    

    <?php
    include 'config.php';

    $sql1 = "SELECT * FROM products WHERE categoryname LIKE ' Me%' limit 4";
    $result1 = mysqli_query($con, $sql1);
    $num1 = mysqli_num_rows($result1);

    if ($num1 > 0) {
        echo '<div class="tab_items active-tab">
                <div class="products_container grid">';

        while ($row1 = mysqli_fetch_array($result1)) {
            $categoryname = $row1['categoryname'];
            $productname = $row1['productname'];
            $price = $row1['price'];
           
            $image = $row1['image'];
    ?>

            <div class="product_item">
                <div class="product_banner">
                    <a href="shop.php" class="product_images">
                        <img src="./admin/products/<?php echo $image; ?>" alt="" class="product_img default" name="image" width="100%" height="250px !important">
                        <img src="./admin/products/<?php echo $image; ?>" alt="" class="product_img hover" name="image" width="100%" height="250px !important">
                    </a>
                   
                </div>
                <div class="product_content">
                    <span class="product_category">Clothing</span>
                    <a href="shop.php">
                        <h3 class="product_title" name="productname"><?php echo $productname; ?></h3>
                    </a>
                    <div class="product_price flex">
                        <span class="new_price" name="price" style="margin-left:92px">&#8377;<?php echo $price; ?></span>
                
                    </div>
                   
                </div>
            </div>

    <?php
        }

        echo '</div></div>'; // Closing divs for products_container and tab_items
    }
    ?>
</section>


<section class="products  section container">
    

    <?php
    include 'config.php';

    $sql1 ="SELECT * FROM `products` WHERE categoryname like ' Wo%'limit 4";
    $result1 = mysqli_query($con, $sql1);
    $num1 = mysqli_num_rows($result1);

    if ($num1 > 0) {
        echo '<div class="tab_items active-tab">
                <div class="products_container grid">';

        while ($row1 = mysqli_fetch_array($result1)) {
            $categoryname = $row1['categoryname'];
            $productname = $row1['productname'];
            $price = $row1['price'];
            
            $image = $row1['image'];
    ?>

            <div class="product_item">
                <div class="product_banner">
                    <a href="shop.php" class="product_images">
                        <img src="./admin/products/<?php echo $image; ?>" alt="" class="product_img default" name="image" width="100%" height="250px !important">
                        <img src="./admin/products/<?php echo $image; ?>" alt="" class="product_img hover" name="image" width="100%" height="250px !important">
                    </a>
                   
                </div>
                <div class="product_content">
                    <span class="product_category">Clothing</span>
                    <a href="shop.php">
                        <h3 class="product_title" name="productname"><?php echo $productname; ?></h3>
                    </a>
                    <div class="product_price flex">
                        <span class="new_price" name="price" style="margin-left:92px;">&#8377;<?php echo $price; ?></span>
                    
                    </div>
                  
                </div>
            </div>

    <?php
        }

        echo '</div></div>'; // Closing divs for products_container and tab_items
    }
    ?>
</section>
<section class="products  section container">
    

    <?php
    include 'config.php';

    $sql1 ="SELECT * FROM `products` WHERE categoryname like ' Ki%'limit 4";
    $result1 = mysqli_query($con, $sql1);
    $num1 = mysqli_num_rows($result1);

    if ($num1 > 0) {
        echo '<div class="tab_items active-tab">
                <div class="products_container grid">';

        while ($row1 = mysqli_fetch_array($result1)) {
            $categoryname = $row1['categoryname'];
            $productname = $row1['productname'];
            $price = $row1['price'];
            
            $image = $row1['image'];
    ?>

            <div class="product_item">
                <div class="product_banner">
                    <a href="shop.php" class="product_images">
                        <img src="./admin/products/<?php echo $image; ?>" alt="" class="product_img default" name="image" width="100%" height="250px !important">
                        <img src="./admin/products/<?php echo $image; ?>" alt="" class="product_img hover" name="image" width="100%" height="250px !important">
                    </a>
                  
                </div>
                <div class="product_content">
                    <span class="product_category">Clothing</span>
                    <a href="shop.php">
                        <h3 class="product_title" name="productname"><?php echo $productname; ?></h3>
                    </a>
                    <div class="product_price flex">
                        <span class="new_price" name="price" style="margin-left:92px;">&#8377;<?php echo $price; ?></span>
                    
                    </div>
                    
                </div>
            </div>

    <?php
        }

        echo '</div></div>'; // Closing divs for products_container and tab_items
    }
    ?>
</section>
<section class="products  section container">
    

    <?php
    include 'config.php';

    $sql1 ="SELECT * FROM `products` WHERE categoryname like ' Fo%'limit 4";
    $result1 = mysqli_query($con, $sql1);
    $num1 = mysqli_num_rows($result1);

    if ($num1 > 0) {
        echo '<div class="tab_items active-tab">
                <div class="products_container grid">';

        while ($row1 = mysqli_fetch_array($result1)) {
            $categoryname = $row1['categoryname'];
            $productname = $row1['productname'];
            $price = $row1['price'];
            
            $image = $row1['image'];
    ?>

            <div class="product_item">
                <div class="product_banner">
                    <a href="shop.php" class="product_images">
                        <img src="./admin/products/<?php echo $image; ?>" alt="" class="product_img default" name="image" width="100%" height="250px !important">
                        <img src="./admin/products/<?php echo $image; ?>" alt="" class="product_img hover" name="image" width="100%" height="250px !important">
                    </a>
                  
                </div>
                <div class="product_content">
                    <span class="product_category">Clothing</span>
                    <a href="shop.php">
                        <h3 class="product_title" name="productname"><?php echo $productname; ?></h3>
                    </a>
                    <div class="product_price flex">
                        <span class="new_price" name="price" style="margin-left:92px;">&#8377;<?php echo $price; ?></span>
                    
                    </div>
                   
                </div>
            </div>

    <?php
        }

        echo '</div></div>'; // Closing divs for products_container and tab_items
    }
    ?>
</section>
<section class="products  section container">
    

    <?php
    include 'config.php';

    $sql1 ="SELECT * FROM `products` WHERE categoryname like ' Ba%' limit 4" ;
    $result1 = mysqli_query($con, $sql1);
    $num1 = mysqli_num_rows($result1);

    if ($num1 > 0) {
        echo '<div class="tab_items active-tab">
                <div class="products_container grid">';

        while ($row1 = mysqli_fetch_array($result1)) {
            $categoryname = $row1['categoryname'];
            $productname = $row1['productname'];
            $price = $row1['price'];
            
            $image = $row1['image'];
    ?>

            <div class="product_item">
                <div class="product_banner">
                    <a href="shop.php" class="product_images">
                        <img src="./admin/products/<?php echo $image; ?>" alt="" class="product_img default" name="image" width="100%" height="250px !important">
                        <img src="./admin/products/<?php echo $image; ?>" alt="" class="product_img hover" name="image" width="100%" height="250px !important">
                    </a>
                    
                </div>
                <div class="product_content">
                    <span class="product_category">Clothing</span>
                    <a href="shop.php">
                        <h3 class="product_title" name="productname"><?php echo $productname; ?></h3>
                    </a>
                    <div class="product_price flex">
                        <span class="new_price" name="price" style="margin-left:92px;"><?php echo $price; ?></span>
                    
                    </div>
                   
                </div>
            </div>

    <?php
        }

        echo '</div></div>'; // Closing divs for products_container and tab_items
    }
    ?>
</section>








        <!-- <div class="female_products">
            <div class="product-containerr">

                <div class="productr">
                    <img src="IMG/product-7-1.jpg" alt="Product">
                    <div class="overlay">
                        <button class="btn cart" onclick="addToCart('MAX', 999,'IMG/product-7-1.jpg')">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </button>
                        <button class="btn buy"><i class="fas fa-bolt"></i> Buy Now</button>
                        <button class="btn wishlist"><i class="fa-solid fa-heart"></i></button>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">MAX</h3>
                        <p class="product-price">&#8377;999 </p>
                    </div>
                </div>
            </div>

            <div class="product-containerr">
                <div class="productr">
                    <img src="IMG/product-12-2.jpg" alt="Product">
                    <div class="overlay">
                        <button class="btn cart" onclick="addToCart('CHANEL', 2500,'IMG/product-12-2.jpg')">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </button>
                        <button class="btn buy"><i class="fas fa-bolt"></i> Buy Now</button>
                        <button class="btn wishlist"><i class="fa-solid fa-heart"></i></button>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">CHANEL</h3>
                        <p class="product-price">&#8377;2500 </p>
                    </div>
                </div>
            </div>

            <div class="product-containerr">
                <div class="productr">
                    <img src="IMG/product-11-1.jpg" alt="Product">
                    <div class="overlay">
                        <button class="btn cart" onclick="addToCart('TED BAKER', 899,'IMG/product-11-1.jpg')">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </button>
                        <button class="btn buy"><i class="fas fa-bolt"></i> Buy Now</button>
                        <button class="btn wishlist"><i class="fa-solid fa-heart"></i></button>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">TED BAKER</h3>
                        <p class="product-price">&#8377;899 </p>
                    </div>
                </div>
            </div>
            <div class="product-containerr">
                <div class="productr">
                    <img src="IMG/product-11-2.jpg" alt="Product">
                    <div class="overlay">
                        <button class="btn cart" onclick="addToCart('DIOR', 1099,'IMG/product-11-2.jpg')">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </button>
                        <button class="btn buy"><i class="fas fa-bolt"></i> Buy Now</button>
                        <button class="btn wishlist"><i class="fa-solid fa-heart"></i></button>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">DIOR</h3>
                        <p class="product-price">&#8377;1099 </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="kids_product">
            <div class="product-containerr">
                <div class="productr">
                    <img src="IMG/kids9.webp" alt="Product">
                    <div class="overlay">
                        <button class="btn cart" onclick="addToCart('LILLIONS', 650,'IMG/kids.jpg' )">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </button>
                        <button class="btn buy"><i class="fas fa-bolt"></i> Buy Now</button>
                        <button class="btn wishlist"><i class="fa-solid fa-heart"></i></button>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">LILLIONS</h3>
                        <p class="product-price">&#8377;650 </p>
                    </div>
                </div>
            </div>
            <div class="product-containerr">
                <div class="productr">
                    <img src="IMG/kids_1.jpg" alt="Product">
                    <div class="overlay">
                        <button class="btn cart" onclick="addToCart('FAB INDIA', 1999,'IMG/kids_1.jpg')">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </button>
                        <button class="btn buy"><i class="fas fa-bolt"></i> Buy Now</button>
                        <button class="btn wishlist"><i class="fa-solid fa-heart"></i></button>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">FAB INDIA</h3>
                        <p class="product-price">&#8377;1999 </p>
                    </div>
                </div>
            </div>
            <div class="product-containerr">
                <div class="productr">
                    <img src="IMG/kids10.jpg" alt="Product">
                    <div class="overlay">
                        <button class="btn cart" onclick="addToCart('H&M KIDS', 999,'IMG/kids10.jpg')">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </button>
                        <button class="btn buy"><i class="fas fa-bolt"></i> Buy Now</button>
                        <button class="btn wishlist"><i class="fa-solid fa-heart"></i></button>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">H&M KIDS</h3>
                        <p class="product-price">&#8377;999 </p>
                    </div>
                </div>
            </div>
            <div class="product-containerr">
                <div class="productr">
                    <img src="IMG/kids5.jpg" alt="Product">
                    <div class="overlay">
                        <button class="btn cart" onclick="addToCart('SCARFHAVEN', 899,'IMG/kids5.jpg')">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </button>
                        <button class="btn buy"><i class="fas fa-bolt"></i> Buy Now</button>
                        <button class="btn wishlist"><i class="fa-solid fa-heart"></i></button>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">SCARFHAVEN</h3>
                        <p class="product-price">&#8377;899 </p>
                    </div>
                </div>
            </div>

        </div> -->

    </main>
    <footer class="footer ">
       <div class="footer_container grid">
        <div class="footer_content">
            <!-- <a href="index.html" class="footer_logo">
                <img src="images/aura2.png" alt="" class="footer_logo-img" width="140px">
            </a> -->
            <h3 class="footer_title">Contact</h3>


            <p class="footer_description">
            <span>Phone:</span> +91 9876567898 /(+91) 9988786756
                </p>

            <p class="footer_description">
            <span>Hours:</span> 9Am - 10Pm, Mon - Sun
            </p>
        </div>
        <div class="footer_content">
            <h3 class="footer_title">Address</h3>
            

            <p class="footer_description">
             Shop No 34 Second Main Cross Hampankatta, Mangalore, Dakshina Kannada, Kranataka, India
            </p>

         
<!-- 
            <ul class="footer_links">
                <li><a href="#" class="footer_link">Home</a></li>
                <li><a href="shop.html" class="footer_link">Shop</a></li>
                <li><a href="accounts.html" class="footer_link">Account</a></li>
                <li><a href="login.html" class="footer_link">Login</a></li>
                <li><a href="wishlist.html" class="footer_link">Wishlist</a></li>
                <li><a href="cart.html" class="footer_link">Cart</a></li>
            </ul> -->
        </div>
        <div class="footer_content">
            <h3 class="footer_title">Quick Links</h3>

            <ul class="footer_links">
                <li><a href="home.php" class="footer_link">Home</a></li>
                <li><a href="#" class="footer_link">Shop</a></li>
                <li><a href="index.php" class="footer_link">Login</a></li>
                <li><a href="wishlist.php" class="footer_link">Wishlist</a></li>
               
            </ul>
        </div>
       </div>
       <div class="footer_bottom">
        <p class="copyright">&copy; 2025 AURA. All rights reserved</p>
        <span class="designer">Designed by  Prathibha S and Samreen Banu</span>
       </div>
    </footer>


    <script src="cart.js"></script>

</body>

</html>
<?php
}
else
{
	echo"<script>location.href='index.php';</script>";
}
?>