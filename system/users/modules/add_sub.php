<?php
include '../../header.php';
include '../../nav.php';

// extract variables
extract($_POST);

// DB Connection
$db = db_con();

// form Name
$form_name = 'Insert New Module';

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


// modules drop down data fletch 
$sql_modules = "SELECT * FROM `modules` WHERE length(module_id) = '2'";
$modules_result = $db->query($sql_modules);


// date
$date = date('Y-m-d');

//insert item
if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$action == 'insert') {

    // module path
    $sql_path = "SELECT path FROM `modules` WHERE module_id = $main_module";
    $path_result = $db->query($sql_path);

    if ($path_result->num_rows > 0) {
        $row = $path_result->fetch_assoc();
        $path =  $row['path'];
    }

    // error styles
    $error_style['success'] = "alert-danger";
    $error_style_icon['fa-check'] = '<i class="icon fas fa-ban"></i>';

    // call data clean function

    $m_m_id = data_clean($m_m_id);
    $m_m_name =  data_clean($m_m_name);
    //$m_m_folder_path = data_clean($m_m_folder_path);
    $m_m_file_path = data_clean($m_m_file_path);


    // basic validation
    if (empty($m_m_id)) {
        $error['m_m_id'] = "Module ID Should not be empty";
    }

    if (empty($m_m_name)) {
        $error['m_m_name'] = "Module Name Should not be empty";
    }

    if (empty($m_m_file_path)) {
        $error['m_m_file_path'] = "File path Should not be empty";
    }


    // Advance validation

    if (!preg_match("/^[0-9]*$/", $m_m_id)) {
        $error['m_m_id'] = "Only Numbers allowed for Module ID";
    }

    if (!empty($m_m_id)) {
        if (strlen($m_m_id) > 4) {
            $error['m_m_id'] = "Maximum length should be 2 number";
        }
    }

    if (!empty($m_m_id)) {

        $sql = "SELECT * FROM modules WHERE module_id = '$m_m_id'";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $error['m_m_id'] = "<b> $m_m_id </b>  Already Exists";
        }
    }

    if (!empty($m_m_name)) {

        $sql = "SELECT * FROM modules WHERE description = '$m_m_name'";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $error['m_m_name'] = "<b> $m_m_name </b>  Already Exists";
        }
    }


    //insert data to db
    if (empty($error)) {

        $sql = "INSERT INTO `modules` (`module_id`, `description`, `path`, `view`, `icon`, `status`) VALUES ('$m_m_id', '$m_m_name', '$path', '$m_m_file_path', '$m_m_icon', '1');";

        //run database query
        $db->query($sql);

        // success message style
        $error_style['success'] = "alert-success";
        $error_style_icon['fa-check'] = '<i class="icon fas fa-check"></i>';
        $error['description'] = "<b>$m_m_name</b> Successfully Insert";
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
    $sql = "SELECT * FROM `modules` WHERE module_id = $module_id";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        $m_m_id = $row['module_id'];
        $m_m_name =  $row['description'];
        $m_m_folder_path = $row['path'];
        $m_m_file_path = $row['view'];
        $m_m_icon = $row['icon'];
    }
}

// update the edit data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$action == 'update') {

    // error styles
    $error_style['success'] = "alert-danger";
    $error_style_icon['fa-check'] = '<i class="icon fas fa-ban"></i>';

    // call data clean function

    $m_m_id = data_clean($m_m_id);
    $m_m_name =  data_clean($m_m_name);
    $m_m_folder_path = data_clean($m_m_folder_path);
    $m_m_file_path = data_clean($m_m_file_path);
    $m_m_icon = data_clean($m_m_icon);

    // basic validation
    if (empty($m_m_id)) {
        $error['m_m_id'] = "Module ID Should not be empty";
    }

    if (empty($m_m_name)) {
        $error['m_m_name'] = "Module Name Should not be empty";
    }

    if (empty($m_m_folder_path)) {
        $error['m_m_folder_path'] = "Folder Path Should not be empty";
    }

    // Advance validation

    if (!preg_match("/^[0-9]*$/", $m_m_id)) {
        $error['m_m_id'] = "Only Numbers allowed for Module ID";
    }

    if (!empty($m_m_id)) {
        if (strlen($m_m_id) > 2) {
            $error['m_m_id'] = "Maximum length should be 2 number";
        }
    }

    if (!empty($m_m_id) && @$m_m_id_previous != $m_m_id) {

        $sql = "SELECT * FROM modules WHERE module_id = '$m_m_id'";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $error['m_m_id'] = "<b> $m_m_id </b>  Already Exists";
        }
    }

    if (!empty($m_m_name)  && @$m_m_name_previous != $m_m_name) {

        $sql = "SELECT * FROM modules WHERE description = '$m_m_name'";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $error['m_m_name'] = "<b> $m_m_name </b>  Already Exists";
        }
    }

    if (!empty($m_m_folder_path)  && @$m_m_folder_path_previous != $m_m_folder_path) {

        $sql = "SELECT * FROM modules WHERE path = '$m_m_folder_path'";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $error['m_m_folder_path'] = "<b> $m_m_folder_path </b>  Already Exists";
        }
    }

    // update query
    if (empty($error)) {
        $sql = "UPDATE `modules` SET `module_id` = '$m_m_id', `description` = '$m_m_name', `path` = '$m_m_folder_path', `view` = '$m_m_file_path' `icon` = '$m_m_icon' WHERE `module_id` = '$m_m_id';";

        // run database query
        $query = $db->query($sql);

        // success message styles
        $error_style['success'] = "alert-success";
        $error_style_icon['fa-check'] = '<i class="icon fas fa-check"></i>';
        $error['update'] = "<b>$m_m_name</b> Successfully Updated";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$action == 'confirm_delete') {

    $sql = "DELETE FROM `modules` WHERE `module_id` = '$module_id'";
    $db->query($sql);

    $error['delete_msg'] = "Recode Delete";

    // error styles
    $error_style['success'] = "alert-danger";
    $error_style_icon['fa-check'] = '<i class="icon fas fa-ban"></i>';
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Modules</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Module</a></li>
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
            $sql = "SELECT * FROM modules WHERE module_id = '$module_id'";

            $result = $db->query($sql);


            if ($result->num_rows > 0) {

                $row = $result->fetch_assoc();
                $module_id = $row['module_id'];
                $module_name = $row['description'];
        ?>
                <div class="card">
                    <h5 class="card-header bg-danger">Conformation</h5>
                    <div class="card-body">
                        <h5 class="card-title">Are You Want to DELETE <b> <?php echo $module_name ?> ?</b> </h5>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <input type="hidden" name="module_id" value="<?php echo $module_id ?>"><br>
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
                            <div class="form-group">
                                <label for="exampleInputEmail1">Main Module Name <span style="color: red;">*</span></label>
                                <select class="form-control select2" style="width: 100%;" name="main_module">
                                    <option value="">- Select Main Module -</option>
                                    <?php

                                    // fletch data
                                    if ($modules_result->num_rows > 0) {
                                        while ($modules_row = $modules_result->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $modules_row['module_id'] ?>" <?php if ($modules_row['module_id'] == @$category) { ?> selected <?php } ?>><?php echo $modules_row['description']; ?></option>
                                    <?php

                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Module ID</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="4 Digits" name="m_m_id" value="<?php echo @$s_m_id ?>">
                                <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="4 Digits" name="m_m_id_previous" value="<?php echo @$m_m_id ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Module Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Staff Management" name="m_m_name" value="<?php echo @$s_m_name ?>">
                                <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Staff Management" name="m_m_name_previous" value="<?php echo @$m_m_name ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Sub Module File Name</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Main Module file Path Eg :- add" name="m_m_file_path" value="<?php echo @$m_m_file_path ?>">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="hidden" name="module_id" value="<?php echo @$module_id ?>">
                            <button type="submit" class="btn btn-primary" name="action" value="<?php echo @$btn_value ?>"><?php echo @$btn_icon ?> <?php echo @$btn_name ?></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Right Section Start -->
            <div class="col">
                <?php

                // db connect
                $db = db_con();

                // sql query
                $sql = "SELECT * FROM `modules` WHERE length(module_id) = '4'";

                // fletch data
                $result = $db->query($sql);

                ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="user_list" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 125px !important;">Module ID</th>
                                    <th>Module Name</th>


                                    <th style="width: 85px !important;">Edit</th>
                                    <th style="width: 85px !important;">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <tr>

                                            <td><?php echo $row['module_id'] ?> </td>
                                            <td> <?php echo $row['description'] ?></td>

                                            <td>
                                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                                    <input type="hidden" name="module_id" value="<?php echo $row['module_id'] ?>">
                                                    <button type="submit" name="action" value="edit" class="btn btn-block btn-primary btn-xs"><i class="fas fa-edit"></i></button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                                    <input type="hidden" name="module_id" value="<?php echo $row['module_id'] ?>">
                                                    <button type="submit" name="action" value="delete" class="btn btn-block btn-danger btn-xs"><i class="fas fa-trash-alt"></i></button>
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
    </div>
</div>

<?php include '../../footer.php'; ?>

<!-- Page specific script -->
<script>
    $(function() {
        $('#user_list').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>