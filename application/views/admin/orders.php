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

                <?php if ($CI->permissions('general_view')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">List</h3>
                                <div class="card-tools">
                                    <select name="" class="" onchange="get_org_orders()" id="orgid">
                                        <option value="">Select order based on Store</option>
                                        <?php foreach ($orgs as $org) : ?>
                                            <option value="<?php echo $org->org_id ?>"> <?php echo $org->org_name ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <a href="<?php echo site_url('sys/new_order'); ?>" class="btn btn-primary btn-xs">New Order</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="example1" class="table table-striped responsive-utilities">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Bill No</th>
                                                    <th>Customer Name</th>
                                                    <th>Order Date</th>
                                                    <th>Tax</th>
                                                    <th>Net Amount</th>
                                                    <th>Payment Status</th>
                                                    <th class=" no-link last"><span class="nobr">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody id="orders">
                                                <?php
                                                $c = 0;
                                                foreach ($orders as $order) {
                                                    $c++;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td><?php echo $order->bill_no; ?></td>
                                                        <td><?php echo $order->customer_supplier_name; ?></td>
                                                        <td><?php echo $order->date_time; ?></td>
                                                        <td><?php echo $order->tax_charge; ?></td>
                                                        <td><?php echo $order->net_amount; ?></td>
                                                        <td class="a-right a-right ">
                                                            <?php
                                                            if ($order->paid_status == 1) echo "Paid";
                                                            elseif ($order->paid_status == 0) echo "Pending";
                                                            elseif ($order->paid_status == 2) echo "Cancelled";
                                                            ?>
                                                        </td>
                                                        <td class=" last">
                                                            <a href="<?php echo site_url('sys/order_profile/' . $order->order_id); ?>" class="btn btn-xs btn-rgp" ><span class="fa fa-eye"></span></a>
                                                            <a href="<?php echo site_url('delete/order/' . $order->order_id); ?>" class="btn btn-xs btn-rgd"><span class="fa fa-trash"></span></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

                <br />
                <br />
                <br />

            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->