<?php
include '../header.php';
include '../nav.php';
?>
<style>
    .table_actions {
        display: flex !important;
        flex-direction: row !important;
        flex-wrap: nowrap !important;
        align-content: center !important;
        justify-content: center !important;
        align-items: center !important;
    }

    .btn-block+.btn-block {
        margin-top: 0rem !important;
        margin-left: 10px;
    }
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Specifications</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Specifications</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Insert New Specification</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php


                    // extract variables
                    extract($_POST);




                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$action == 'insert') {

                        // call data clean function

                        $spc_name =  data_clean($spc_name);

                        // create error variable to store error messages
                        $error =  array();

                        if (empty($spc_name)) {
                            $error['spc_name'] = "Specification Name Should not be empty";
                        }

                        if (empty($error)) {
                            $sql = "INSERT INTO `specifications` (`spec_id`, `spec`, `value`) VALUES (NULL, '$spc_name', '');";
                        }

                        // call db con function
                        $db = db_con();

                        // run database query
                        $query = $db->query($sql);
                    }
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Specification Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Brand Name" name="spc_name">
                                <?php echo @$error['spc_name']; ?>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="action" value="insert">Insert</button>
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
                $sql = "SELECT * FROM `specifications`";

                // fletch data
                $result = $db->query($sql);

                ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Specifications </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="brand_list" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Specification ID</th>
                                    <th>Specification Name</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td><?php echo $row['spec_id'] ?> </td>
                                            <td><?php echo $row['spec'] ?> </td>
                                            <td class="table_actions">
                                                <button type="button" class="btn btn-block btn-primary btn-xs">Update</button>
                                                <button type="button" class="btn btn-block btn-danger btn-xs">Delete</button>
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

<?php include '../footer.php'; ?>

<!-- Page specific script -->
<script>
    $(function() {
        // $("#user_list").DataTable({
        //     "responsive": true,
        //     "lengthChange": false,
        //     "autoWidth": false,
        //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        // }).buttons().container().appendTo('#user_list_wrapper .col-md-6:eq(0)');
        $('#brand_list').DataTable({
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