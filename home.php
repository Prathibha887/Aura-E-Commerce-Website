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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Aura</title>
    <!----=================FLATICON======================================-->
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css"/>

    <!---======================SWIPER CSS===================================-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!--======================================CSS============================-->
    <link rel="stylesheet" href="styles.css">
   
</head>
<body>
    <!---===============================HEADER===========================-->
    <header class="header">
        <nav class="nav container fixed-position">
            <a href="#" class="nav_logo">
                <img src="images/aura1.png" alt="" class="nav_logo-img"/>
            </a>
            <div class="nav_menu" id="nav-menu">
                <div class="nav_menu-top">
                    <a href="#" class="nav_menu-logo">
                        <img src="images/aura1.png" alt="" width="80px">
                    </a>
                    <div class="nav_close" id="nav-close">
                        <i class="fi fi-rs-cross-small"></i>
                    </div>
                </div>
                <ul class="nav_list">
                    <li class="nav_item">
                        <a href="#" class="nav_link active-link">Home</a>
                    </li>
                    <li class="nav_item">
                        <a href="shop.php" class="nav_link">Shop</a>
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
                <div class="header_action-btn nav_toggle" id="nav-toggle">
                    <img src="images/hamburger1.svg" alt="" width="30px">
                </div>
            </div>
        </nav>
    </header>
    

    <!--===================== MAIN ==========================-->
    <main class="main">
        <!-- home section-->
         <section class="home section--lg">
            <div class="home_container  container grid ">
                <div class="home_content">
                    
                    <h1 class="home_title">
                        Fashion Trending <span>Great Collections</span>
                    </h1>
                    <p class="home_description">
                        save more buy more
                    </p>
                    <a href="shop.php" class="btn ">View Shop</a>
                </div>
                <img src="images/img3.png" alt="" class="home_img" style="width:550px">
            </div>
         </section>

         <!---=================== CATEGORIES =====================-->
  

         <!-- <section class="categories reveal container section ">
         <h3 class="section_title"><span>Our</span> Categories</h3>
         
         <?php
include 'config.php';

$sql1 = "select * from category";

$result1 = mysqli_query($con,$sql1);

$num1=mysqlI_num_rows($result1);

$sl=0;

if($num1 > 0)

{

while($row1 = mysqli_fetch_array($result1))

{

$sl+=1;

$id=$row1[0];

$categoryname=$row1['categoryname'];

$image=$row1['image'];



?>
         <form method="post" action="#" enctype="multipart/form-data">
            
         <div class="categories_container swiper ">
                <div class="swiper-wrapper">
                    <a href="shop.php" class="category_item swiper-slide" style="width: 100px;">
                        <img src="./admin/category/<?php echo $image; ?>" alt="" class="category_img">
                        <h3 class="category_title"><?php echo $categoryname; ?></h3>
                    </a>
                   
            </div>
            <div class="swiper-button-next">
            <i class="fi fi-rs-angle-right"></i>
            </div>
            <div class="swiper-button-prev">
                <i class="fi fi-rs-angle-left"></i>
            </div>
            
            </div>
            </form>
         <?php

}

}

?>
         </section>
          -->
          <section class="products reveal section container">
    <h3 class="section_title"><span>Our</span> Categories</h3>

    <?php
    include 'config.php';

    $sql1 = "SELECT * FROM category";
    $result1 = mysqli_query($con, $sql1);
    $num1 = mysqli_num_rows($result1);

    if ($num1 > 0) {
        echo '<div class="tab_items active-tab">
                <div class="products_container grid">';

        while ($row1 = mysqli_fetch_array($result1)) {
            $categoryname = $row1['categoryname'];
            $image = $row1['image'];
    ?>

            <div class="product_item">
                <div class="product_banner">
                    <a href="<?php echo $categoryname; ?>.php" class="product_images">
                        <img src="./admin/category/<?php echo $image; ?>" alt="" class="product_img default" name="image" width="100%" height="250px">
                        <img src="./admin/category/<?php echo $image; ?>" alt="" class="product_img hover" name="image" width="100%" height="250px">
                    </a>
                  
                </div>
                <div class="product_content">
                   
                    <a href="<?php echo $categoryname; ?>.php">
                        <h3 class="product_title" name="productname"><?php echo $categoryname; ?></h3>
                    </a>
                   
                   
                </div>
            </div>

    <?php
        }

        echo '</div></div>'; // Closing divs for products_container and tab_items
    }
    ?>
</section>



         <!--================= PRODUCTS ======================-->
         <section class="products reveal section container">
    <h3 class="section_title"><span>Popular</span> Products</h3>

    <?php
    include 'config.php';
  

    if (!isset($_SESSION['aurauser'])) {
        echo "<p>Please <a href='login.php'>login</a> to add products to your wishlist.</p>";
        exit();
    }

    $sql1 = "SELECT * FROM popular";
    $result1 = mysqli_query($con, $sql1);
    $num1 = mysqli_num_rows($result1);

    if ($num1 > 0) {
        echo '<div class="tab_items active-tab">
                <div class="products_container grid">';

        while ($row1 = mysqli_fetch_array($result1)) {
            $id = $row1['id'];
            $productname = $row1['productname'];
            $newprice = $row1['newprice'];
            $oldprice = $row1['oldprice'];
            $image = $row1['image'];
    ?>

            <div class="product_item">
                <div class="product_banner">
                    <a href="shop.php" class="product_images">
                        <img src="./admin/popular/<?php echo $image; ?>" alt="" class="product_img default" width="100%" height="250px">
                        <img src="./admin/popular/<?php echo $image; ?>" alt="" class="product_img hover" width="100%" height="250px">
                    </a>
                    <div class="product_actions">
                        <form method="post" action="add_to_wishlist.php">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="productname" value="<?php echo $productname; ?>">
                            <input type="hidden" name="price" value="<?php echo $newprice; ?>">
    
                            <input type="hidden" name="image" value="<?php echo $image; ?>">
                            <button type="submit" class="action_btn" aria-label="Add to Wishlist">
                                <i class="fi fi-rs-heart"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="product_content">
                    <span class="product_category">Clothing</span>
                    <a href="shop.php">
                        <h3 class="product_title"><?php echo $productname; ?></h3>
                    </a>
                    <div class="product_price flex">
                        <span class="new_price" >&#8377;<?php echo $newprice; ?></span>
                    </div>
                    <div class="product_price flex">
                        <span class="old_price" >&#8377;<?php echo $oldprice; ?></span>
                    </div>
                    
                </div>
            </div>

    <?php
        }

        echo '</div></div>'; // Closing divs for products_container and tab_items
    }
    ?>
</section>



         <!--=====================New ARRIVALS=================-->
         <section class="new_arrivals reveal container section">
    <h3 class="section_title"><span>New</span> Arrivals</h3>
    <?php
    include 'config.php';

    // Query to get products from the database
    $sql1 = "SELECT * FROM products order by id desc LIMIT 10";
    $result1 = mysqli_query($con, $sql1);

    if ($result1 && mysqli_num_rows($result1) > 0) {
        echo '<div class="new_container swiper">';
        echo '<div class="swiper-wrapper">';

        while ($row1 = mysqli_fetch_assoc($result1)) {
            $productname = htmlspecialchars($row1['productname']);
            $price = htmlspecialchars($row1['price']);
            $image = !empty($row1['image']) ? htmlspecialchars($row1['image']) : 'default-image.jpg';

            echo '<div class="product_item swiper-slide">';
            echo '<div class="product_banner">';
            echo '<a href="shop.php" class="product_images">';
            echo '<img src="./admin/products/'.$image.'" alt="" class="product_img default" width="100%" height="250px" style="display:inline-block"> ' ;
            echo '<img src="./admin/products/'.$image.'" class="product_img hover">';
            echo '</a>';
         
            echo '<div class="product_badge light-pink">New</div>';
            echo '</div>';
            echo '<div class="product_content">';
            echo '<span class="product_category">Clothing</span>';
            echo '<a href="shop.php"><h3 class="product_title">' . $productname . '</h3></a>';
            echo '<div class="product_price flex">';
            echo '<span class="new_price">&#8377;' . $price . '</span>';
            echo '</div>';
            

            echo '</div>';
        
            echo '</div>'; // Close product_item
        }

        echo '</div>'; // Close swiper-wrapper
        echo '</div>'; // Close new_container swiper
        
        // Swiper buttons
        echo '<div class="swiper-button-next"><i class="fi fi-rs-angle-right"></i></div>';
        echo '<div class="swiper-button-prev"><i class="fi fi-rs-angle-left"></i></div>';
        
    }
    ?>
</section>

    </main>

    <!--===================== FOOTER =========================-->
    <footer class="footer ">
       <div class="footer_container grid">
        <div class="footer_content">
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
        </div>
        <div class="footer_content">
            <h3 class="footer_title">Quick Links</h3>

            <ul class="footer_links">
                <li><a href="#" class="footer_link">Home</a></li>
                <li><a href="shop.php" class="footer_link">Shop</a></li>
                
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


    <script  type="text/javascript">
        window.addEventListener('scroll',reveal);

        function reveal(){
            var reveals=document.querySelectorAll('.reveal');
            for(var i=0;i<reveals.length;i++){
                var windowheight=window.innerHeight;
                var revealtop =reveals[i].getBoundingClientRect().top;
                var revealpoint=150;

                if(revealtop < windowheight - revealpoint){
                    reveals[i].classList.add('active');
                }
                // else{
                //     reveals[i].classList.remove('active');
                // }
            }
        }
    </script>
    <!--==================== SWIPER JS ===============================-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js">
    </script>

    <!---====== MAIN JS ========-->
    <script src="menu.js"></script>
    <script src="min.js"></script>

</body>
</html>
<?php
}
else
{
	echo"<script>location.href='index.php';</script>";
}
?>