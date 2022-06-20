<?php

    $header = $order_header;
    $order_id = $header->order_id;
    $bill_no = $header->bill_no;
    $customer_name = $header->customer_supplier_name;
    $date_time = $header->date_time;
    $service_charge = $header->service_charge;
    $tax_charge = $header->tax_charge;
    $net_amount = $header->net_amount;
    $paid_amount = $header->paid_amount;
    $paying_balance = $header->paying_balance;
    $change_return = $header->change_return;
    $discount = $header->discount;
    $transaction_type_name = $header->transaction_type_name;
    $paid_status = $header->paid_status;
    $time_stamp = $header->time_stamp;
    $cashier_name = $header->firstname . ' ' . $header->secondname;
    $from_date = $header->from_date;
    $to_date = $header->to_date;
    $narrative = $header->narrative;

    $org_name = $header->org_name;
    $org_email = $header->org_email;
    $org_address = $header->org_address;
    $org_phone = $header->org_phone;
?>

<?php
$CI = &get_instance();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><button class="pull-left backbtn" title="Back" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"> </i></button>
                        <?= $page ?></h1>
                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
                    if (isset($_SESSION['alert'])) {
                        echo $_SESSION['alert'];
                        unset($_SESSION['alert']);
                    }
                    ?>
                </div>
            </div>

            <div class="row">

                <?php if ($CI->permissions('general_add')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Customer room booking details</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <!-- Left Sidebar Start -->
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <ul class="stats-overview">
                                            <li>
                                                <span class="name"> <u>Customer Details</u> </span> <br />
                                                <span class="name"> Customer Name: <?php echo $customer_name; ?> </span> <br />
                                                <span class="name"> Phone: <?php echo $customer_name; ?> </span>
                                            </li>
                                            <li>
                                                <span class="name"> <u>Order Details</u> </span> <br />
                                                <span class="name"> Code: <?php echo $bill_no; ?> </span> <br />
                                                <span class="name"> Period: <?php echo $from_date . ' - ' . $to_date; ?> </span>
                                            </li>
                                            <li class="hidden-phone">
                                                <span class="name"> <u>Payments</u> </span> <br />
                                                <span class="name"> Paid amount: <?php echo $paid_amount; ?> </span> <br />
                                                <span class="name"> Balance: <?php echo $paying_balance; ?> </span>
                                            </li>
                                        </ul>
                                        <br />

                                        <?php #var_dump($rooms_booked);
                                        ?>

                                        <h3>Rooms Booked</h3>
                                        <div class="table-responsive col-md-12 col-xs-12">
                                            <table id="example" class="table table-striped responsive-utilities jambo_table">
                                                <thead>
                                                    <tr class="headings">
                                                        <th>Room</th>
                                                        <th>Category</th>
                                                        <th>Rate</th>
                                                        <th>Amount</th>
                                                        <th class=" no-link last"><span class="nobr">Action</span></th>
                                                    </tr>
                                                </thead>

                                                <tbody id="orders">
                                                    <?php
                                                    $c = 0;
                                                    foreach ($rooms_booked as $dt) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $dt->room_name; ?></td>
                                                            <td><?php echo $dt->room_type_name; ?></td>
                                                            <td><?php echo $dt->room_rate; ?></td>
                                                            <td><?php echo $dt->amount; ?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                                        <span class="caret"></span></button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a href="<?php echo site_url('rooms/activate_room/' . $dt->room_id); ?>"><span class="text text-success fa fa-check"></span> Checkout</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>

                                    </div>
                                    <!-- Left Sidebar End -->

                                    <!-- Right Sidebar Start -->
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <!-- <h3 style="text-align: center;">Visual Summary</h3> -->
                                        <p style="padding: 80px;">
                                            <button class="btn btn-lg btn-block btn-default" style="border: 1px solid red;" onclick="window.open('<?php echo site_url('rooms/receipt/' . $order_id); ?>','receipt','width=500')">Print Receipt <span class="fa fa-download"></span></button> <br />
                                            <a href="<?php echo site_url('rooms/bookings'); ?>" class="btn btn-lg btn-block btn-default" style="border: 1px solid green;">Booked Rooms <span class="fa fa-external-link"></span></a> <br />
                                            <a href="<?php echo site_url('rooms/book_room'); ?>" class="btn btn-lg btn-block btn-default" style="border: 1px solid blue;">New Booking <span class="fa fa-pencil"></span></a> <br />
                                        </p>
                                    </div>
                                    <!-- Right Sidebar End -->
                                </div>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>



            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->