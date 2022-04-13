<?php
include '../../header.php';
include '../../nav.php';

// extract variables
extract($_POST);

// DB Connection
$db = db_con();

// Items data fletch 
$sql = "SELECT * FROM `items`  WHERE `item_id` = '$item_id'";
$result = $db->query($sql);

// Items specification data fletch 
$spec_sql = "SELECT si.value, s.spec FROM spec_items si INNER JOIN specifications s ON s.spec_id = si.spec_id WHERE si.item_id = $item_id";
$spec_result = $db->query($spec_sql);


$stock_count = "SELECT COUNT(item_id) AS item_stock FROM stock WHERE item_id = $item_id GROUP BY item_id;";
$stock_count_result = $db->query($stock_count);
$row = $stock_count_result->fetch_assoc();
$in_stock = $row['item_stock'];

?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?php
                    if ($result->num_rows > 0) {
                         $row = $result->fetch_assoc();

                    ?>
                            <h1 class="m-0"><?php echo $row['item_name']; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Items</a></li>
                        <li class="breadcrumb-item active">View Items</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid">
        <div class="row" style="padding-top: 40px;">
            <!--product image-->
            <div class="col-6">
                <div class="image_box" style="padding-left: 80px;">
                    <img src="../../../assets/images/<?php echo $row['item_image'] ?>" alt="" class="item_image" style="width: 80%;" />
                </div>

            </div>

            <!--second content box-->
            <div class="col-6" style="padding-right: 80px;">
                <h4 class="price_hedding">Product Description</h4>
                <hr>
                <p>
                    <?php echo $row['item_description']; ?>
                </p>
                <h5 class="price_hedding">Unit Price - Rs: <?php echo $row['unit_price']; ?></h5>
                <h5 class="price_hedding">Sale Price - Rs: <?php echo $row['sale_price']; ?></h5>
                <h5 class="price_hedding">Discount Rate - <?php echo $row['discount_rate']; ?> %</h5>
                <h6>SKU: <?php echo $row['sku']; ?> </h6>
                <h6>Reorder Level: <?php echo $row['recorder_level']; ?></h6>
                <h6>In Stock: <?php echo $in_stock; ?></h6>

            </div>

        </div>
    </div>
<?php
                        }
                    
?>
<div class="row">

    <div class="item_table" style="padding: 80px;width: 100%;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="item_table_col" style="font-size: 22px;">Item Features</th>
                    <th scope="col" style="font-size: 22px;">Details</th>

                </tr>
            </thead>
            <tbody>

                <?php
                if ($spec_result->num_rows > 0) {
                    while ($spec_row = $spec_result->fetch_assoc()) {

                ?>

                        <tr>
                            <th scope="row"><?php echo $spec_row['spec']; ?></th>
                            <td><?php echo $spec_row['value']; ?></td>

                        </tr>
                <?php
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<?php include '../../footer.php'; ?>

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