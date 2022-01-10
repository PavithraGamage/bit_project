<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <title><?php echo ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME));  ?></title>
        
        <! -- main style -->
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


<div class="container">
    <div class="row item_row_main">
        <!--headder row start-->
        <div class="row dash_hedding_row">
            <div class="col-6">
                <h4> <i class="fas fa-tachometer-alt"></i> Dashboard</h4>
            </div>
            <!-- header section nav -->
            <div class="col-6">
                <div class="row">
                    <!-- image and name -->
                    <div class="col-8">
                        <div class="row">
                            <div class="col-6 dash_image_box">
                                <img src="images/blank-profile-picture-973460_640.png" class="dash_image" alt="" />
                            </div>
                            <div class="col-6 dash_name_box">
                                <h6>A.P.K Samaranayake</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 dash_notifcation_box">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="col-2 dash_notifcation_box">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                </div>
            </div>
        </div>

        <!--headder row end-->

        <!--dashboard start-->

        <div class="row">
            <div class="col-2 dash_content_nav">
                <div class="dash_left_nav_first">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </div>
                <div class="dash_left_nav">
                    <i class="fas fa-shopping-cart"></i> Orders
                </div>
                <div class="dash_left_nav">
                    <i class="fas fa-charging-station"></i> Warranty
                </div>
                <div class="dash_left_nav">
                    <i class="fas fa-truck"></i> Delivery
                </div>
                <div class="dash_left_nav">
                    <i class="fas fa-calendar-check"></i> Appointments
                </div>
                <div class="dash_left_nav">
                    <i class="fas fa-tools"></i> Troubleshoots
                </div>
                <div class="dash_left_nav_last">
                    <i class="fas fa-life-ring"></i> Help
                </div>
            </div>
            <!-- Dashboard Content Area Start -->
            <div class="col-10 dash_content">
                <h5>Make Appointment to Claim Your Warranty</h5>
                <hr>
                <form>
                    <h6>Personal Details</h6>
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Name :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Gamage Pavithra">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="gamage2pavithra@gmail.com">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Contact Number :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="0757003662">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Address :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="58/E, Kesbewa Road, Kamburugoda, Bandaragama, Western, 12530">
                                </div>
                            </div>

                            <hr>
                        </div>

                        <h6>Defect Item Details</h6>
                        <div class="col">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Item Name :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="AMD Ryzen 9 3900X">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Item Part Number :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="100-10000000023CBX">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Item Serial Number :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="458WQWDWDQWDWQ48">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Purchase Date :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="12/10/2021">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Warranty Remaining :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="156 Days">
                                </div>
                            </div>

                            <hr>
                        </div>
                        <h6>Describe Defect</h6>
                        <div class="col">
                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <hr>
                        </div>
                        <h6>Make Appointment</h6>
                        <div class="col">
                            <div class="form-group">
                                <input type="date">
                                <input type="time">
                            </div>
                            <!-- <hr> -->
                            <br>
                            <button type="button" class="btn btn-secondary">Make An Appointment</button>
                        </div>
                        
                    </div>
                </form>
            </div>
            <!-- Dashbaord Content Area End -->
        </div>


        <!--dashboard end-->
    </div>
</div>


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