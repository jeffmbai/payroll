<?php
foreach($order_header as $header) {
    $order_id = $header->order_id;
    $bill_no = $header->bill_no;
    $customer_name = $header->customer_name;
    $customer_address = $header->customer_address;
    $customer_phone = $header->customer_phone;
    $date_time = $header->date_time;
    $service_charge = $header->service_charge;
    $tax_charge = $header->tax_charge;
    $net_amount = $header->net_amount;
    $discount = $header->discount;
    $paid_status = $header->paid_status;
    $time_stamp = $header->time_stamp;
    $cashier_name = $header->firstname.' '.$header->secondname;
}
$state = "Invoice";
if($paid_status == 1) $state = "Receipt";

?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3> <?php echo $state;?> </h3>
        </div>

    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
        <?php
            if(isset($_SESSION['alert'])) {
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }
        ?>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo $state;?> Design <small>Sample user <?php echo $state;?> design</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <section class="content invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12 invoice-header">
                                <h1>
                        <i class="fa fa-globe"></i> <?php echo $state;?>.
                        <small class="pull-right">Date: <?php echo $date_time;?></small>
                    </h1>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>JiPOS,</strong>
                                    <br>Loita Street, Barclays Plaza
                                    <br>Phone: 254 707 866 136
                                    <br>Email: info@jiwanitech.com
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong><?php echo $customer_name;?></strong>
                                    <br><?php echo $state;?>
                                    <br><?php echo $customer_address;?>
                                    <br>Phone: <?php echo $customer_address;?>
                                    <br>Email: <?php echo $customer_phone;?>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b><?php echo $state.' #'.$bill_no;?>#007612</b>
                                <br>
                                <br>
                                <b>Order ID:</b> <?php echo $order_id;?>
                                <br>
                                <b>Payment Due:</b> <?php echo $date_time;?>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Serial #</th>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Units</th>
                                            <th>Attribute</th>
                                            <th>Tax</th>
                                            <th>Amount</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $total = 0;
                                            $subtotal = 0;
                                            $tax = 0;
                                            foreach($order_items as $item) {
                                                $total += $item->amount;
                                                $subtotal += $item->rate;
                                                $tax += ($item->tax_id / 100) * $item->rate;
                                                ?>
                                                <tr>
                                                    <td><?php echo '#'.$item->item_id;?></td>
                                                    <td><?php echo $item->item_name;?></td>
                                                    <td><?php echo $item->qty;?></td>
                                                    <td><?php echo $item->unit_name;?></td>
                                                    <td><?php echo $item->attribute_name;?></td>
                                                    <td>
                                                        <?php echo number_format(($item->tax_id/100) * $item->rate, 2);?>
                                                    </td>
                                                    <td><?php echo $item->rate;?></td>
                                                    <td><?php echo $item->amount;?></td>
                                                </tr>
                                                <?php
                                            }
                                        ?>                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-xs-6">
                                <p class="lead">Payment Methods:</p>
                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                    Cash: Over the counter <br>
                                    M-Pesa: Through mobile payment
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>Ksh <?php echo number_format($subtotal,2);?></td>
                                            </tr>
                                            <tr>
                                                <th>Tax</th>
                                                <td>Ksh <?php echo number_format($tax,2);?></td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>Ksh <?php echo number_format($total,2);?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <a href="<?php echo site_url('submitform/pos_receipt/'.$order_id);?>" target="_blank" class="btn btn-success btn-lg pull-right" > 
                                    <i class="fa fa-print"></i> Print <?php echo $state;?>
                                </a>
                                <a href="<?php echo site_url('Uza_Main/home')?>" class="btn btn-primary btn-lg pull-right" style="margin-right: 5px;"><i class="fa fa-shopping-cart"></i> Sell More</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>


        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo $state;?> <small>.pdf download design</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <iframe src="<?php echo site_url('submitform/pos_receipt/'.$order_id);?>" width="100%" height="500px"></iframe>
                </div>
            </div>
        </div>


    </div>
</div>

            
                
