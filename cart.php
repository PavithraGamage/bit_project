<?php

include "system/functions.php";

session_start();

extract($_POST);

// create error array
$cart_error = array();

$db = db_con();
// change the product item quantity
if ($_SERVER['REQUEST_METHOD'] == "POST" && @$action == "update_qty") {
    foreach ($_SESSION['cart'] as &$value) {

        if ($value['item_id'] == $item_id) {
            $value['item_qty'] = $qty;
            break;
        }
    }
}

// remove items form cart
if ($_SERVER['REQUEST_METHOD'] == "POST" && @$action == "delete_product") {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['item_id'] == $item_id) {
            unset($_SESSION['cart'][$key]);
        }
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title><?php echo ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME));  ?></title>
    <!-- main style -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <!-- fontawesome icons-->
    <link href="assets/icons/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- nav -->
    <?php include "nav.php"; ?>
    
    <!--Hero Section End-->
    <!-- content start-->
    <div class="container">
        <div class="row item_row_main">
            <!--cart content start-->
            <div class="row">


                <?php
                if (!empty($_SESSION['cart'])) {

                ?>
                    <div class="row">
                        <div class="col">
                            <h3>Items in Your Cart</h3>
                        </div>
                        <div class="col cart_remove_all">
                            <a href="shop.php">
                                <button type="button" class="btn btn-secondary card_button" style="border-width: 2px;font-weight: 500"><i class="fas fa-cart-arrow-down"></i> Continue Shopping</button>
                            </a>
                        </div>
                    </div>
                    <!--cart item start-->
                    <?php
                    $grand_total = 0;
                    $grand_total_price = 0;
                    $grand_total_sale = 0;
                    $amount_sale = 0;


                    // fletch cart session
                    foreach ($_SESSION['cart'] as $product) {

                    ?>


                        <div class="row cart_items">
                            <div class="col-2">
                                <img src="assets/images/<?php echo $product['item_image']; ?>" alt="" class="cart_item_image" />
                            </div>
                            <div class="col-5" style="display: flex; flex-direction: column; justify-content: center;">
                                <div>
                                    <h6><?php echo $product['item_name']; ?></h6>

                                    <?php

                                    // out of stock check
                                    $item_id = $product['item_id'];

                                    $sql = "SELECT * FROM `items` WHERE item_id = $item_id;";

                                    $result = $db->query($sql);

                                    $row = $result->fetch_assoc();
                                    
                                    // check input stock and inventory stock
                                    if ($product['item_qty'] > $product['stock']) {

                                        // crate variable for stock count to show the error message 
                                        $stock = $product['stock'];
                                        $cart_error['out_of_stock'] = "Maximum Quantity <b>$stock</b>";

                                        echo '<p style="color:red ;">' . @$cart_error['out_of_stock'] . '</p>';
                                        
                                    }

                                    // minimum stock validation
                                    if($product['item_qty'] == 0 ){
                                        
                                        $cart_error['out_of_stock'] ="Minimum Stock 1";
                                        echo '<p style="color:red ;">' . @$cart_error['out_of_stock'] . '</p>';
                                    }
                                       
                                    ?>

                                </div>

                            </div>
                            <div class="col-1" style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                                <h6 style="margin-right: 10px;">Qty</h6>

                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $product['item_id']; ?>">
                                    <input type="hidden" name="action" value="update_qty">
                                    <input type="number" min="1" max="<?php echo $row['stock'] ?>" value="<?php echo $product['item_qty'] ?>" onchange="this.form.submit();" name="qty" id="qty">
                                </form>
                            </div>
                            <div class="col-2" style="display: flex; flex-direction: column; justify-content: center;">
                                <div class="cart_price">
                                    <?php

                                    if (!$product['sales_price'] == 0 && $product['item_qty'] > 0) {

                                        $amount = $product['item_price'] * $product['item_qty'];
                                        echo "<h6> LKR: " . number_format($amount, 2) . "</h6>";
                                        $grand_total += $amount;

                                        $amount = $product['sales_price'] * $product['item_qty'];
                                        echo "<h6> Sale LKR: " . number_format($amount, 2) . "</h6>";
                                        $grand_total_price += $amount;

                                        // discount price calculation
                                        $amount_sale = ($product['item_price'] * $product['item_qty']) - $amount;
                                        $grand_total_sale += $amount_sale;
                                    } else {

                                        if ($product['item_qty'] > 0) {

                                            $amount = $product['item_price'] * $product['item_qty'];
                                            echo "<h6> LKR: " . number_format($amount, 2) . "</h6>";
                                            $grand_total += $amount;
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                            <div class="col-2" style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: center; align-items: center;">
                                <div class="col empry_cart_btn_col">
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                        <input type="hidden" name="item_id" value="<?php echo $product['item_id']; ?>">
                                        <button type="submit" name="action" value="delete_product" class="btn btn-secondary card_button"> <i class="fa fa-trash" aria-hidden="true"></i> Remove Item</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }

                    // create sessions for checkout redirect management
                    if (!empty($cart_error)) {

                        $_SESSION['cart_error'] = true;
                    } else {

                        $_SESSION['cart_error'] = false;
                    }
                    ?>
                    <!--cart item end-->
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6 cart_total">
                            <h4 class="cart_summary">Cart Summary</h4>
                            <div class="row">
                                <div class="col-5">
                                    <div>
                                        <h6>Sub Total:</h6>
                                    </div>
                                    <hr>
                                    <div>
                                        <h6>Discount:</h6>
                                    </div>
                                    <hr>
                                    <div>
                                        <h4>Est. Total:</h4>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div>
                                        <h6>
                                            LKR: <?php echo number_format($grand_total, 2);
                                                    $_SESSION['grand_total'] = $grand_total; ?>
                                        </h6>
                                    </div>
                                    <hr>
                                    <div>
                                      
                                        <h6>
                                            <?php
                                            echo "LKR: (-" . number_format($grand_total_sale, 2) . ")";
                                            $_SESSION['grand_total_sale'] = $grand_total_sale

                                            ?>
                                        </h6>
                                    </div>
                                    <hr>
                                    <div>
                                        <h4>LKR: <?php


                                                    $est_total = $grand_total - $grand_total_sale;

                                                    // session for est total
                                                    $_SESSION['est_total'] = $est_total;

                                                    echo number_format($est_total, 2);

                                                    ?></h4>
                                    </div>
                                    <form action="checkout.php" method="POST">
                                        <?php
                                        if (empty($cart_error)) {
                                            echo '<button type="submit" class="btn btn-secondary cart_checkout_button"  name = "cart" value="1"> CHECKOUT ORDER </button>';
                                        } else

                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            } else { ?>
                    <!--empty cart warnning start-->
                    <div class="row empty_cart">
                        <div class="col">
                            <div> Your Cart Empty !</div>
                        </div>
                        <div class="col empry_cart_btn_col">
                            <a href="shop.php">
                                <button type="button" class="btn btn-secondary card_button">Shop Now</button>
                            </a>

                        </div>
                    </div>
                    <!--empty cart warnning end-->
                <?php
            }
                ?>
            </div>
            <!--cart content end-->
        </div>
    </div>
    <!-- content end-->
    <!-- footer start -->
    <?php

    include "footer.php";

    ?>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>


</body>

</html>
<!-- footer end -->