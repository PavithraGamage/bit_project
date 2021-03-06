<?php
session_start();

include "system/functions.php";

// extract form data
extract($_POST);

// db connect
$db = db_con();

// create error variable to store error messages
$error =  array();

// redirect
if (empty($_SESSION['req_user_id'])) {
    header('Location: http://localhost/bit/dashboard/index.php');
}

$req_user_id = $_SESSION['req_user_id'];

// profile form
if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$action == 'done') {

    $contact_number = data_clean($contact_number);
    $address_line_1 = data_clean($address_line_1);
    $address_line_2 = data_clean($address_line_2);
    $city = data_clean($city);
    $postal_code = data_clean($postal_code);
    $province = data_clean($province);

    // basic validation Billing Details
    if (empty($contact_number)) {
        $error['contact_number'] = "Contact Number Should Not Be Empty";
    }

    if (empty($address_line_1)) {
        $error['address_line_1'] = "Address Line 1 Should Not Be Empty";
    }

    if (empty($city)) {
        $error['city'] = "City Should Not Be Empty";
    }

    if (empty($postal_code)) {
        $error['postal_code'] = "Postal Code Should Not Be Empty";
    }

    if (empty($province)) {
        $error['province'] = "Province Should Not Be Empty";
    }

    // Advance validation
    if (!preg_match("/^[0-9]*$/", $contact_number)) {
        $error['contact_number'] = "Phone number not valid";
    }

    if (!empty($contact_number)) {
        
        if (strlen($contact_number) != 10) {
            $error['contact_number'] = "Contact Number Should be at least 10 digits";
        }
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
        $error['city'] = "Only Letters allowed";
    }

    if (!preg_match("/^[0-9]*$/", $postal_code)) {
        $error['postal_code'] = "Only Numbers Allowed";
    }

    if (!empty($postal_code)) {
        if (strlen($postal_code) != 5) {
            $error['postal_code'] = "Postal Code Should be at least 5 digits";
        }
    }

    if (!preg_match("/^[0-9]*$/", $province)) {
        $error['province'] = "Not valid";
    }

    // image upload function
    if (!empty($_FILES['profile_image']['name']) && empty($error)) {

        $photo =  image_upload("profile_image", "assets/images/");

        if (array_key_exists("photo", $photo)) {

            $photo = $photo['photo'];
        } else {

            $error['profile_image'] = $photo['profile_image'];
        }
    } else {
        $photo = @$previous_profile_image;
    }


    // database section
    if (empty($error)) {

        $sql = "INSERT INTO `customers` (`cus_id`, `contact_nmuber`, `address_l1`, `address_l2`, `city`, `postal_code`, `user_id`, `province_id`) VALUES (NULL, '$contact_number', '$address_line_1', '$address_line_2', '$city', '$postal_code', '$req_user_id', '$province');";
        //run database query
        $db->query($sql);

        // user image upload
        $sql_image = "UPDATE `users` SET `profile_image` = '$photo' WHERE `users`.`user_id` = $req_user_id";
        //run database query
        $db->query($sql_image);

        // form reload value null
        $contact_number = null;
        $address_line_1 = null;
        $address_line_2 = null;
        $city = null;
        $postal_code = null;
        $province = null;

    }

    // redirect to checkout
    if (empty($error)) {

        $error['complete_msg'] = "Profile Successfully Create Please Proceed Your Order";
        $error['button'] = "<button>To Checkout</button>";
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

    <! -- main style -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />


        <!--fontawesome icons-->
        <link href="assets/icons/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet" type="text/css" />



</head>

<body>
   
   <!-- nav -->
   <?php include "nav.php"; ?>

    <!-- content start -->
    <div class="container">
        <div class="row">
            <div class="col" style="margin:5% 20%; ">
                <div class="row" style="margin-bottom: 40px;">
                    <div class="col">
                        <p><?php echo @$error['complete_msg'] ?></p>
                        <a href="checkout.php">
                            <?php echo @$error['button'] ?>
                        </a>
                    </div>
                </div>
                <div class="register-box">
                    <div class="card card-outline card-primary">
                        <div class="card-header text-center">
                            <h1>Complete Profile</h1>
                        </div>
                        <div class="card-body">
                            <p class="login-box-msg">Complete your profile to continue the shopping</p>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="form-label" for="image">Profile Image <span style="color: red;">*</span></label>
                                    <input type="file" class="form-control" id="profile_image" style="height: auto;" name="profile_image" />
                                    <input type="hidden" class="form-control" id="previous_profile_image" name="previous_profile_image" value="<?php echo @$profile_image ?>">
                                </div>
                                <br>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Contact Number" name="contact_number" value="<?php echo @$contact_number ?>">
                                </div>
                                <div>
                                    <p style="color: red;"> <?php echo @$error['contact_number'] ?> </p>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Address Line 1" name="address_line_1" value="<?php echo @$address_line_1 ?>">
                                </div>
                                <div>
                                    <p style="color: red;"> <?php echo @$error['address_line_1'] ?> </p>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Address Line 2" name="address_line_2" value="<?php echo @$address_line_2 ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo @$city ?>">
                                </div>
                                <div>
                                    <p style="color: red;"> <?php echo @$error['city'] ?> </p>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Postal Code" name="postal_code" value="<?php echo @$postal_code ?>">
                                </div>
                                <div>
                                    <a href="https://nation.lk/postalcode/" target="blank">Postal Codes</a>
                                </div>
                                <div>
                                    <p style="color: red;"> <?php echo @$error['postal_code'] ?> </p>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="form-control select2" style="width: 100%;" name="province" id="province">
                                        <option value="">- Select Province -</option>
                                        <?php

                                        // provinces drop down data fletch 
                                        $sql_pro = "SELECT * FROM `province` WHERE status = 0";
                                        $pro_result = $db->query($sql_pro);

                                        // fletch data
                                        if ($pro_result->num_rows > 0) {
                                            while ($pro_row = $pro_result->fetch_assoc()) {
                                        ?>
                                                <option value="<?php echo $pro_row['id'] ?>" <?php if ($pro_row['id'] == @$province) { ?> selected <?php } ?>><?php echo $pro_row['name']; ?></option>
                                        <?php

                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <p style="color: red;"> <?php echo @$error['province'] ?> </p>
                                </div>

                                <div class="row">
                                    <div class="col-8">

                                    </div>
                                    <!-- /.col -->
                                    <div class="col-4" style="display: flex; flex-direction: row; justify-content: flex-end;">
                                        <button type="submit" class="btn btn-secondary btn-block" name="action" value="done">Done</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                        <!-- /.form-box -->
                    </div><!-- /.card -->
                </div>
            </div>
        </div>

    </div>
    <!-- content end -->

    <!-- footer start -->
    <?php

    include "footer.php";

    ?>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>


</body>

</html>