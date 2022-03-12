<?php
include "site_nav.php";
?>
<!-- content start-->
<div class="container">
    <div class="row item_row_main">
        <div class="row">
            <div class="col">
                <h3> <i class="fas fa-map-marker-alt"></i> Invoice for your Order</h3>
            </div>
            <hr style="margin-top:10px">
        </div>
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12" style="margin-bottom: 15px;">
                    <h4>
                        <i class="fas fa-globe"></i> U-Star Digital
                        <small class="float-right" style="float: right;">Date: 2/10/2014</small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info" style="padding-bottom: 20px;">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>U-Star Digital</strong><br>
                        Kaluthra Road<br>
                        Bandaragama, 12530<br>
                        Phone: (804) 123-5432<br>
                        Email: info@ustardigital.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>John Doe</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (555) 539-1037<br>
                        Email: john.doe@example.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #007612</b><br>
                    <br>
                    <b>Order ID:</b> 4F3S8J<br>
                    <b>Payment Due:</b> 2/22/2014<br>
                    <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Product</th>
                                <th>Warranty</th>
                                <th>Discount</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>AMD RYZEN 9 3950X</td>
                                <td>3 Years</td>
                                <td>15%</td>
                                <td>$64.50</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>ASUS ROG MAXIMUS Z690 EXTREME GLACIAL</td>
                                <td>3 Years</td>
                                <td>15%</td>
                                <td>$50.00</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>ASUS ROG MAXIMUS Z690 EXTREME</td>
                                <td>3 Years</td>
                                <td>15%</td>
                                <td>$10.70</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>INTEL CORE I9-12900K</td>
                                <td>3 Years</td>
                                <td>15%</td>
                                <td>$25.99</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row" style="margin-top: 25px">
                <!-- accepted payments column -->
                <div class="col-6">
                    <p class="lead">Payment Method: Cash On Delivery</p>
                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                        plugg
                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Amount Due 2/22/2014</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>$250.30</td>
                            </tr>
                            <tr>
                                <th>Discount</th>
                                <td>(-$10.34)</td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td>$5.80</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>$265.24</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12">
                    <a href="orders.php">
                        <button type="button" class="btn btn-success float-right"><i class="fas fa-shopping-cart"></i> Orders</button>
                    </a>

                    <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;"><i class="fas fa-download"></i> Generate PDF</button>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- content end-->
<?php

include "site_footer.php";

?>