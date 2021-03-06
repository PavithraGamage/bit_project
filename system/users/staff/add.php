<?php
include '../../header.php';
include '../../nav.php';

// extract variables
extract($_POST);

// DB Connection
$db = db_con();

// form Name
$form_name = 'Insert New Staff Member';

// form button name change
$btn_name = "Insert";

// form button value change
$btn_value = "insert";

// form button icon
$btn_icon = '<i class="far fa-save"></i>';

// create error variable to store error messages
$error =  array();

// create error variable to store error message styles
$error_style =  array();
$error_style_icon = array();

// date
$date = date('Y-m-d');

//insert item
if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$action == 'insert') {

    // error styles
    $error_style['success'] = "alert-danger";
    $error_style_icon['fa-check'] = '<i class="icon fas fa-ban"></i>';

    // call data clean function
    $first_name = data_clean($first_name);
    $last_name =  data_clean($last_name);
    $nic = data_clean($nic);
    $dob = data_clean($dob);
    $username = data_clean($username);
    $email = data_clean($email);
    $contact_number = data_clean($contact_number);
    $address_line_1 = data_clean($address_line_1);
    $address_line_2 = data_clean($address_line_2);
    $city = data_clean($city);
    $postal_code = data_clean($postal_code);

    // basic empty validation
    if (empty($first_name)) {
        $error['first_name'] = "First Name Should not be empty";
    }

    if (empty($user_roles)) {
        $error['user_roles'] = "User Role Should not be empty";
    }

    if (empty($last_name)) {
        $error['last_name'] = "Last Name Should not be empty";
    }

    if (empty($nic)) {
        $error['nic'] = "NIC Should not be empty";
    }

    if (empty($dob)) {
        $error['dob'] = "Date of Birth Should not be empty";
    }

    if (empty($username)) {
        $error['username'] = "Username Should not be empty";
    }

    if (empty($email)) {
        $error['email'] = "Email Should not be empty";
    }

    if (empty($password)) {
        $error['password'] = "Password Should not be empty";
    }

    if (empty($verify_password)) {
        $error['error_item_name'] = "Verify Password Should not be empty";
    }

    if (empty($contact_number)) {
        $error['contact_number'] = "Contact Number Should not be empty";
    }

    if (empty($address_line_1)) {
        $error['address_line_1'] = "Address line 1 Should not be empty";
    }

    if (empty($city)) {
        $error['city'] = "City Should not be empty";
    }

    if (empty($postal_code)) {
        $error['postal_code'] = "Postal Code Should not be empty";
    }

    // Advance validation
    if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
        $error['first_name'] = "Only Letters allowed for First Name";
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
        $error['last_name'] = "Only Letters allowed for Last Name";
    }

    if (!preg_match("/^[0-9]*$/", $contact_number)) {
        $error['phone'] = "Phone number not valid";
    }

    if (!empty($nic)) {

        // check old and new nic length
        if ((strlen($nic) != 10) and (strlen($nic) != 12)) {

            $error['nic'] = "NIC not valid";
        }

        // check old nic last string equal to V
        if (strlen($nic) == 10) {

            if (substr($nic, -1) != "V") {
                $error['nic'] = "NIC not valid format";
            }
        }
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
        $error['city'] = "Only Letters allowed for city";
    }

    if (!preg_match("/^[0-9]*$/", $postal_code)) {
        $error['city'] = "Postal Code not valid";
    }

    if (!empty($username)) {

        $sql = "SELECT * FROM users WHERE user_name = '$username'";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $error['user_name'] = "<b> $username </b> User Already Exists";
        }
    }

    if (!empty($email)) {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $error['email'] = "Email Address is not valid";
        } else {

            $sql_e = "SELECT * FROM users WHERE email = '$email'";

            $result_e = $db->query($sql_e);

            if ($result_e->num_rows > 0) {
                $error['email'] = "Email Already Exists";
            }
        }
    }

    if (!empty($password)) {
        if (strlen($password) < 8) {
            $error['password'] = "Password Should be at least 8 characters";
        }
    }

    if (!empty($password) && !empty($verify_password)) {

        if ($password != $verify_password) {
            $error['password_verify'] = "Password not match";
        }
    }

    // image upload function
    if (!empty($_FILES['profile_image']['name']) && empty($error)) {

        $photo =  image_upload("profile_image", "../../../assets/images/");

        if (array_key_exists("photo", $photo)) {

            $photo = $photo['photo'];
        } else {

            $error['profile_image'] = $photo['profile_image'];
        }
    } else {
        $photo = @$previous_item_image;
    }

    //insert data to db
    if (empty($error)) {

        $sql = "INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `first_name`, `last_name`, `profile_image`, `created_date`, `status`, `user_role`) VALUES (NULL, '$username', '$email', SHA1('$password'), '$first_name', '$last_name', '$photo', '$date', '0', '$user_roles');";

        //run database query
        $db->query($sql);

        //capture last insert ID
        $user_id = $db->insert_id;
        $sql_staff = "INSERT INTO `staff` (`staff_id`, `nic`, `dob`, `contact_number`, `address_l1`, `address_l2`, `city`, `postal_code`, `user_id`) VALUES (NULL, '$nic', '$dob', '$contact_number', '$address_line_1', '$address_line_2', '$city', '$postal_code', '$user_id');";

        //run database query
        $db->query($sql_staff);

        // success message style
        $error_style['success'] = "alert-success";
        $error_style_icon['fa-check'] = '<i class="icon fas fa-check"></i>';
        $error['insert_msg'] = "<b>$username</b> Successfully Insert";
    }
}

// edit items
if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$action == 'edit') {

    // from name change
    $form_name = "Edit Items";

    // form button name change
    $btn_name = "Update";

    // form button value change
    $btn_value = "update";

    // form button icon
    $btn_icon = '<i class="far fa-edit"></i>';

    // check recodes in DB
    $sql = "SELECT * FROM `users` WHERE user_id = $user_id";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        $profile_image = $row['profile_image'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $username = $row['user_name'];
        $email = $row['email'];
        $password = $row['password'];
        $user_roles = $row['user_role'];
    }

    $sql = "SELECT * FROM `staff` WHERE user_id = $user_id";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        $nic = $row['nic'];
        $dob = $row['dob'];
        $contact_number = $row['contact_number'];
        $address_line_1 = $row['address_l1'];
        $address_line_2 = $row['address_l2'];
        $city = $row['city'];
        $postal_code = $row['postal_code'];
    }
}

// update the edit data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$action == 'update') {

    // error styles
    $error_style['success'] = "alert-danger";
    $error_style_icon['fa-check'] = '<i class="icon fas fa-ban"></i>';

    // call data clean function

    $first_name = data_clean($first_name);
    $last_name =  data_clean($last_name);
    $nic = data_clean($nic);
    $dob = data_clean($dob);
    $username = data_clean($username);
    $email = data_clean($email);
    $contact_number = data_clean($contact_number);
    $address_line_1 = data_clean($address_line_1);
    $address_line_2 = data_clean($address_line_2);
    $city = data_clean($city);
    $postal_code = data_clean($postal_code);

    // basic validation
    if (empty($first_name)) {
        $error['first_name'] = "First Name Should not be empty";
    }

    if (empty($user_roles)) {
        $error['user_roles'] = "User Role Should not be empty";
    }

    if (empty($last_name)) {
        $error['last_name'] = "Last Name Should not be empty";
    }

    if (empty($nic)) {
        $error['nic'] = "NIC Should not be empty";
    }

    if (empty($dob)) {
        $error['dob'] = "Date of Birth Should not be empty";
    }

    if (empty($username)) {
        $error['username'] = "Username Should not be empty";
    }

    if (empty($email)) {
        $error['email'] = "Email Should not be empty";
    }

    if (empty($password) && empty($previous_password)) {
        $error['password'] = "Password Should not be empty";
    }

    if (empty($verify_password) && empty($previous_password_verify)) {
        $error['error_item_name'] = "Verify Password Should not be empty";
    }

    if (empty($contact_number)) {
        $error['contact_number'] = "Contact Number Should not be empty";
    }

    if (empty($address_line_1)) {
        $error['address_line_1'] = "Address line 1 Should not be empty";
    }

    if (empty($city)) {
        $error['city'] = "City Should not be empty";
    }

    if (empty($postal_code)) {
        $error['province'] = "Province Should not be empty";
    }


    // Advance validation

    if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
        $error['first_name'] = "Only Letters allowed for First Name";
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
        $error['last_name'] = "Only Letters allowed for Last Name";
    }

    if (!preg_match("/^[0-9]*$/", $contact_number)) {
        $error['phone'] = "Phone number not valid";
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
        $error['city'] = "Only Letters allowed for city";
    }

    if (!preg_match("/^[0-9]*$/", $postal_code)) {
        $error['city'] = "Postal Code not valid";
    }

    if (!empty($username) && @$previous_username != $username) {

        $sql = "SELECT * FROM users WHERE user_name = '$username'";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $error['user_name'] = "<b> $username </b> User Already Exists";
        }
    }

    if (!empty($email) && @$previous_email != $email) {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $error['email'] = "Email Address is not valid";
        } else {

            $sql_e = "SELECT * FROM users WHERE email = '$email'";
            $result_e = $db->query($sql_e);
            if ($result_e->num_rows > 0) {
                $error['email'] = "Email Already Exists";
            }
        }
    }

    if (!empty($password)) {
        if (strlen($password) < 8) {
            $error['password'] = "Password Should be at least 8 characters";
        }
    }

    if (!empty($password) && !empty($verify_password)) {

        if ($password != $verify_password) {
            $error['password_verify'] = "Password not match";
            echo $password;
        }
    }

    if (!empty($_FILES['profile_image']['name']) && empty($error)) {

        // image upload function
        $photo =  image_upload("profile_image", "../../../assets/images/");

        if (array_key_exists("photo", $photo)) {

            $photo = $photo['photo'];
        } else {

            $error['profile_image'] = $photo['profile_image'];
        }
    } else {
        $photo = @$previous_profile_image;
    }

    // update query
    if (empty($error)) {

        $sql = "UPDATE `users` SET `user_name` = '$username', `email` = '$email', `password` = SHA1('$password'), `first_name` = '$first_name', `last_name` = '$last_name', `profile_image` = '$photo', `user_role` = '$user_roles' WHERE `user_id` = $user_id";
        // run database query
        $query = $db->query($sql);


        $sql = "UPDATE `staff` SET nic = '$nic', dob = '$dob', contact_number = '$contact_number', address_l1 = '$address_line_1', address_l2 = '$address_line_2', city = '$city', postal_code = '$postal_code' WHERE `user_id` = $user_id;";
        // run database query
        $query = $db->query($sql);

        // success message styles
        $error_style['success'] = "alert-success";
        $error_style_icon['fa-check'] = '<i class="icon fas fa-check"></i>';
        $error['update'] = "<b>$username</b> Successfully Updated";
    }
}

// update user status to inactive
if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$action == 'confirm_delete') {

    $sql = "UPDATE `users` SET `status` = '1' WHERE `users`.`user_id` = '$user_id;'";
    $db->query($sql);

    $sql = "UPDATE `staff` SET `status` = '1' WHERE `user_id` = '$user_id'";
    $db->query($sql);

    $error['delete_msg'] = "Recode Delete";

    // error styles
    $error_style['success'] = "alert-danger";
    $error_style_icon['fa-check'] = '<i class="icon fas fa-ban"></i>';
}

// change status active
if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$action == 'active') {

    $sql = "UPDATE `users` SET `status` = '0' WHERE `users`.`user_id` = '$user_id;'";
    $db->query($sql);

    $sql = "UPDATE `staff` SET `status` = '0' WHERE `user_id` = '$user_id'";
    $db->query($sql);

    $error['delete_msg'] = "Recode Active";

    // error styles
    $error_style['success'] = "alert-success";
    $error_style_icon['fa-check'] = '<i class="icon fas fa-ban"></i>';
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Staff</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Staff</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Alerts -->
    <div class="container-fluid">

        <!-- Insert / update / delete / blank / already exist alerts-->
        <?php show_error($error, $error_style, $error_style_icon); ?>

        <!-- Delete Confirmation -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$action == 'delete') {
            $sql = "SELECT * FROM users WHERE user_id = '$user_id'";

            $result = $db->query($sql);


            if ($result->num_rows > 0) {

                $row = $result->fetch_assoc();
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
        ?>
                <div class="card">
                    <h5 class="card-header bg-danger">Conformation</h5>
                    <div class="card-body">
                        <h5 class="card-title">Are You Want to DELETE <b> <?php echo $user_name ?> ?</b> </h5>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user_id ?>"><br>
                            <button type="submit" name="action" value="confirm_delete" class="btn btn-danger btn-s">Yes</button>
                            <button type="submit" name="action" value="cancel_delete" class="btn btn-primary btn-s">No</button>
                        </form>

                    </div>
                </div>

        <?php
            }
        }
        ?>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo $form_name ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="card card-primary card-outline card-tabs">

                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-three-tabContent">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="image">Profile Image <span style="color: red;">*</span></label>
                                                    <input type="file" class="form-control" id="profile_image" style="height: auto;" name="profile_image" />
                                                    <input type="hidden" class="form-control" id="previous_profile_image" name="previous_profile_image" value="<?php echo @$profile_image ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>User Role <span style="color: red;">*</span></label>
                                                    <select class="form-control select2" style="width: 100%;" name="user_roles">
                                                        <option value="">- Select User Role -</option>
                                                        <?php

                                                        // categories drop down data fletch 
                                                        $sql = "SELECT * FROM `user_roles` WHERE status = 0";
                                                        $result = $db->query($sql);

                                                        // fletch data
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                                <option value="<?php echo $row['user_role_id'] ?>" <?php if ($row['user_role_id'] == @$user_roles) { ?> selected <?php } ?>><?php echo $row['role_name']; ?></option>
                                                        <?php

                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">First Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter First Name" name="first_name" value="<?php echo @$first_name ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Last Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name" name="last_name" value="<?php echo @$last_name ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">NIC</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter NIC" name="nic" value="<?php echo @$nic ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Date of Birth</label>
                                                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter Date of Birth" name="dob" value="<?php echo @$dob ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Username</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="username" value="<?php echo @$username ?>">
                                                    <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="previous_username" value="<?php echo @$username ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                                                    <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="previous_password" value="<?php echo sha1(@$password)  ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Verify Password</label>
                                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Verify Password" name="verify_password">
                                                    <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="previous_password_verify" value="<?php echo sha1(@$password)  ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">

                                                <!-- second colum -->

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Email</label>
                                                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email" name="email" value="<?php echo @$email ?>">
                                                    <input type="hidden" class="form-control" id="exampleInputPassword1" placeholder="Enter Email" name="previous_email" value="<?php echo @$email ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Contact Number</label>
                                                    <input type="tel" class="form-control" id="exampleInputEmail1" placeholder="Enter Contact Number" name="contact_number" value="<?php echo @$contact_number ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Address Line 1</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Address Line 1" name="address_line_1" value="<?php echo @$address_line_1 ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Address Line 2</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Address Line 2" name="address_line_2" value="<?php echo @$address_line_2 ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">City</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter City" name="city" value="<?php echo @$city ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Postal Code</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Postal Code" name="postal_code" value="<?php echo @$postal_code ?>">
                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="hidden" name="user_id" value="<?php echo @$user_id ?>">
                            <button type="submit" class="btn btn-primary" name="action" value="<?php echo @$btn_value ?>"><?php echo @$btn_icon ?> <?php echo @$btn_name ?></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Right Section Start -->

        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Staff List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="Search Data" name="cus_search" value="<?php echo @$cus_search ?>">
                        </div>
                        <div class="col-1" style="display: flex;align-content: center;flex-direction: row;flex-wrap: nowrap;align-items: center;">
                            <button type="submit" class="btn btn-primary" name="action" value="search">Search</button>
                        </div>
                    </div>
                </form>
                <table id="user_list" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Profile Image</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Inactive</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        // crate variable for store dynamic query
                        $where = null;

                        // date range check
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$action == 'search') {

                            // table wide search 
                            if (!empty($cus_search)) {

                                $where .= "CONCAT(u.user_name, u.user_id, st.status_name, u.first_name, u.last_name) LIKE '%$cus_search%' AND ";
                            }

                            // remove the last 4 digits of the $where part "AND "
                            if (!empty($where)) {

                                $where = substr($where, 0, -4);

                                // take Mysql WHERE and take $where query parts 
                                $where = "WHERE $where";
                            }
                        }

                        // sql query
                        $sql = "SELECT u.profile_image, u.user_name, u.user_id, st.status_name, u.first_name, u.last_name FROM users u INNER JOIN staff s ON s.user_id = u.user_id INNER JOIN status st ON st.status_id = u.status $where;";

                        // fletch data
                        $result = $db->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><img src="../../../assets/images/<?php echo $row['profile_image'] ?>" class="img-fluid" width="100"></td>
                                    <td><?php echo $row['user_name'] ?> </td>
                                    <td><?php echo $row['first_name'] ?> </td>
                                    <td><?php echo $row['last_name'] ?> </td>
                                    <td><?php echo $row['status_name'] ?> </td>
                                    <td>
                                        <form action="view.php" method="post">
                                            <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
                                            <a href="view.php">
                                                <button type="submit" name="action" value="view" class="btn btn-block btn-success btn-xs"><i class="fas fa-eye"></i></button>
                                            </a>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                            <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
                                            <button type="submit" name="action" value="edit" class="btn btn-block btn-primary btn-xs"><i class="fas fa-edit"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                            <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
                                            <button type="submit" name="action" value="delete" class="btn btn-block btn-danger btn-xs"><i class="fas fa-ban"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                            <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
                                            <button type="submit" name="action" value="active" class="btn btn-block btn-warning btn-xs"><i class="fas fa-check"></i></button>
                                        </form>
                                    </td>

                                </tr>

                        <?php
                            }
                        }
                        ?>
                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<?php include '../../footer.php'; ?>

<!-- Page specific script -->
<script>
    $(function() {
        $('#user_list').DataTable({
            "paging": false,
            "lengthChange": true,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>