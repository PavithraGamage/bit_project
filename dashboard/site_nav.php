<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <title><?php echo ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME));  ?></title>
        
        <!-- main style -->
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css"/>


        <!--fontawesome icons-->
        <link href="../assets/icons/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet" type="text/css"/>


     
    </head>
    <body>
        <!--Navigation Start-->
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light nav_sys">
                <div class="container-fluid">
                    <a class="navbar-brand" href="http://localhost/bit/">
                        <h2 style="color: white; font-weight:300">U-Star Digital</h2>
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