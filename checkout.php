<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <title><?php echo ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME));  ?></title>
        
        <!--main style -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>


        <!--fontawesome icons-->
        <link href="assets/icons/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet" type="text/css"/>


     
    </head>
    <body>
        <!--Navigation Start-->
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light nav_sys">
                <div class="container-fluid">
                    <a class="navbar-brand" href="http://localhost/bit/">
<!--                        <img src="images/logo.png" alt="" class="nav_logo">-->
                        <img src="images/logo_new.png" alt=""  class="nav_logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link sys_nav_link" aria-current="page" href="http://localhost/bit/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link sys_nav_link" href="http://localhost/bit/shop.php">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link sys_nav_link" href="http://localhost/bit/about.php">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link sys_nav_link" href="http://localhost/bit/services.php">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link sys_nav_link" href="http://localhost/bit/contact.php">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link sys_nav_link" href="http://localhost/bit/dashboard.php"> <i class="fas fa-user"></i> My Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link sys_nav_link" href="http://localhost/bit/cart.php"> <i class="fas fa-cart-arrow-down"></i> Cart</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!--Navigation End-->

<!--Hero Section End-->
<!-- content start-->
<div class="container">


    <div class="row item_row_main">


        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            
          
            <div class="row">
                <div class="col">
                    <h3> <i class="fas fa-map-marker-alt"></i> Enter Your Delivery Details</h3>
                </div>
                <div class="col cart_remove_all">
                   
                    <button type="reset" class="btn btn-secondary card_button">Delivery to different address</button>
                    
                </div>
            </div>
            <hr>
               <div class="row">
                <div class="col-4">
                    <label for="inputCity">Frist Name</label>
                    <input type="text" class="form-control" id="frist_name" name="frist_name">
                </div>
                <div class="col-4">
                    <label for="inputState">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name">
                 
                </div>
                <div class="col-4">
                   <label for="inputState">Phone</label>
                   <input type="tel" class="form-control" id="phone" name="phone">
                </div>

            </div>
            <div class="form-group">
                <label for="inputAddress">Address Line 1</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address_line_1">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Address Line 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address_line_2">
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity" name="city">
                </div>
                <div class="col-4">
                    <label for="inputState">Province</label>
                    <select id="inputState" class="form-control" name="province">
                        <option selected>Choose...</option>
                        <option>Western</option>
                        <option>Western</option>
                        <option>Western</option>
                        <option>Western</option>
                        <option>Western</option>
                        <option>Western</option>
                        <option>Western</option>
                        <option>Western</option>
                        <option>Western</option>
                        <option>Western</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip" name="zip">
                </div>

            </div>
             <div class="row">
                <div class="col-6"></div>
                <div class="col-6 cart_total">
                    <h4 class="cart_summary">Order Summary</h4>
                    <div class="row">
                        <div class="col-4">
                            <div>
                                <h6>Item(s):</h6> 
                            </div>
                            <hr>
                             <div>
                                <h6>Warranty & Service:</h6>  
                            </div>
                            <hr>
                            <div>
                                <h6>Delivery Charges:</h6>  
                            </div>
                            <hr>
                           
                            <div>
                                <h4>Est. Total:</h4>
                            </div>
                        </div>
                        <div class="col-8">
                            <div>
                                <h6>156,000 LKR</h6>
                            </div>
                            <hr>
                            <div>
                                <h6>8,000 LKR</h6>
                            </div>
                            <hr>
                             <div>
                                <h6>3,000 LKR</h6>
                            </div>
                            <hr>

                            
                            <div>
                                <h4>267,500 LKR</h4>
                            </div>
                            
                                <button type="submit" class="btn btn-secondary cart_checkout_button"> PAY YOUR ORDER </button>

                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>

<?php 
 
print_r($_POST)

?>
</div>
<!-- content end-->
<!-- footer start -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <!--<img src="images/cmaplus-logo-blue-big copy._w.png" alt="" class="footer_logo"/>-->
                <img src="images/logo_new.png" alt="" class="footer_logo" />
                <hr class="footer_hr">
                <p class="footer_company">

                    We can print a range of full color, quality printed products, which you can order online or ask us for a special price.
                    We can print a range of full color, quality printed products, which you can order online or ask us for a special price.
                    We can print a range of full color, quality printed products, which you can order online or ask us for a special price.
                    We can print a range of full color, quality printed products, which you can order online or ask us for a special price.
                </p>
            </div>
            <div class="col-2">
                <h2 class="footer_title">Company</h2>
                <hr class="footer_hr_2">
                <p class="footer_items">About</p>
                <p class="footer_items">Contact</p>
                <p class="footer_items">Service</p>
                <p class="footer_items">Company</p>
            </div>
            <div class="col-2">
                <h2 class="footer_title">Quick Links</h2>
                <hr class="footer_hr_2">
                <p class="footer_items">FAQ</p>
                <p class="footer_items">Privacy Policy</p>
                <p class="footer_items">Return Policy</p>
                <p class="footer_items">Company</p>
            </div>
        </div>
    </div>
</footer>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>


</body>
</html>
<!-- footer end -->