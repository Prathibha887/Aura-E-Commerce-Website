<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Ecommerce</title>
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
                <a href="index.html" class="nav_logo">
                    <img src="images/img1.png" alt="" class="nav_logo-img"/>
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
                            <a href="home.php" class="nav_link ">Home</a>
                        </li>
                        <li class="nav_item">
                            <a href="shop.php" class="nav_link">Shop</a>
                        </li>
                        <li class="nav_item">
                            <a href="accounts.php" class="nav_link active-link">Account</a>
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

        <!--============================= BREADCRUMB =====================-->
        <section class="breadcrumb">
                    <ul class="breadcrumb_list container">
                      <li><a href="index.html" class="breadcrumb_link">Home</a></li>
                      <li><span class="breadcrumb_link">></span></li>
                      <li><span class="breadcrumb_link">Account</span></li>
                    </ul>
        </section>

        <section class="accounts section--lg">
            <div class="accounts_container container grid">
                <div class="account_tabs">
                    <p class="account_tab active-tab" data-target="#dashboard">
                        <i class="fi fi-rs-settings-sliders"></i> Dashboard
                    </p>

                    <p class="account_tab" data-target="#orders">
                        <i class="fi fi-rs-shopping-bag"></i> orders
                    </p>

                    <p class="account_tab" data-target="#address">
                        <i class="fi fi-rs-marker"></i> My Address
                    </p>

                    <p class="account_tab">
                        <i class="fi fi-rs-exit"></i> Logout
                    </p>
                </div>
                <div class="tabs_content">
                    <div class="tab_content active-tab" content id="dashboard">
                        <h3 class="tab_header">Hello Arun!</h3>

                        <div class="tab_body">
                            <p class="tab_description">
                                From your account dashboard. you can easily check & view your recent orders, manage your shipping and blling addresses.
                            </p>
                        </div>
                    </div>
                    <div class="tab_content" content id="orders">
                        <h3 class="tab_header">Your Orders</h3>

                        <div class="tab_body">
                            <table class="placed_order-table">
                                <tr>
                                    <th>Orders</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                </tr>

                                <tr>
                                    <td>Mens t-shirt</td>
                                    <td>Processing</td>
                                    <td>$125.00</td>
                                </tr>
                                <tr>
                                    <td>Mens t-shirt</td>
                                    <td>Processing</td>
                                    <td>$125.00</td>
                                </tr>
                                <tr>
                                    <td>Mens t-shirt</td>
                                    <td>Processing</td>
                                    <td>$125.00</td>
                                </tr>
                                <tr>
                                    <td>Mens t-shirt</td>
                                    <td>Processing</td>
                                    <td>$125.00</td>
                                </tr>
                                <tr>
                                    <td>Mens t-shirt</td>
                                    <td>Processing</td>
                                    <td>$125.00</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="tab_content" content id="address">
                        <h3 class="tab_header">Shipping Address</h3>

                        <div class="tab_body">
                            <address class="address">
                                3554 Interstate <br> 75 Business spur, <br>  Sault ste. <br> Marie, MI 49783 
                            </address>
                            <p class="city">Inda</p>
                            <a href="" class="edit">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

 <!--===================== FOOTER =========================-->
 <footer class="footer ">
    <div class="footer_container grid">
     <div class="footer_content">
         <a href="index.html" class="footer_logo">
             <img src="images/img1.jpg" alt="" class="footer_logo-img" width="90px">
         </a>
         <h4 class="footer_subtitle">Contact</h4>

         <p class="footer_description">
         <span>Address:</span> 562 wellington Road, Street 32, San Francisco
         </p>

         <p class="footer_description">
         <span>Phone:</span> +91 9876567898 /(+91) 9988786756
             </p>

         <p class="footer_description">
         <span>Hours:</span> 10:00 - 18:00, Mon - Sat
         </p>
     </div>
     <div class="footer_content">
         <h3 class="footer_title">Address</h3>

         <ul class="footer_links">
             <li><a href="" class="footer_link">About us</a></li>
             <li><a href="" class="footer_link">About us</a></li>
             <li><a href="" class="footer_link">About us</a></li>
             <li><a href="" class="footer_link">About us</a></li>
             <li><a href="" class="footer_link">About us</a></li>
             <li><a href="" class="footer_link">About us</a></li>
         </ul>
     </div>
     <div class="footer_content">
         <h3 class="footer_title">My Account</h3>

         <ul class="footer_links">
             <li><a href="" class="footer_link">About us</a></li>
             <li><a href="" class="footer_link">About us</a></li>
             <li><a href="" class="footer_link">About us</a></li>
             <li><a href="" class="footer_link">About us</a></li>
             <li><a href="" class="footer_link">About us</a></li>
             <li><a href="" class="footer_link">About us</a></li>
         </ul>
     </div>
    </div>
    <div class="footer_bottom">
     <p class="copyright">&copy; 2025 fusion. All rights reserved</p>
     <span class="designer">Designed by  Prathibha S</span>
    </div>
 </footer>

<!--==================== SWIPER JS ===============================-->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js">
</script>


<!---====== MAIN JS ========-->
<script src="min.js"></script>
</body>
<script src="tabs.js"></script>
</html>