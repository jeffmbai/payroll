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

                <?php if ($CI->permissions('orgs_add')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card direct-chat direct-chat-warning">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo $page; ?> table </h3>
                                <div class="card-tools">
                                    <a href="<?php echo site_url('business/new_purchase'); ?>" class="btn btn-primary btn-xs">New Purchase</a>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="example1" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Bill No</th>
                                                    <th>Customer Name</th>
                                                    <th>Date</th>
                                                    <th>T.Type</th>
                                                    <th>Net Amount</th>
                                                    <th>Paid Amount</th>
                                                    <th>Balance</th>
                                                    <th>Payment Status</th>
                                                    <th class=" no-link last"><span class="nobr">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody id="orders">
                                                <?php
                                                $c = 0;
                                                foreach ($payments as $dt) {
                                                    #if($dt->transaction_type_id == 1 || $dt->transaction_type_id == 3) continue; 
                                                    $c++;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td><?php echo $dt->bill_no; ?></td>
                                                        <td><?php echo $dt->customer_supplier_name; ?></td>
                                                        <td><?php echo $dt->date_time; ?></td>
                                                        <td><?php echo $dt->transaction_type_name; ?></td>
                                                        <td><?php echo $dt->net_amount; ?></td>
                                                        <td><?php echo $dt->paid_amount; ?></td>
                                                        <td><?php echo $dt->paying_balance; ?></td>
                                                        <td class="a-right a-right ">
                                                            <?php
                                                            if ($dt->paid_status == 1) echo "Paid";
                                                            elseif ($dt->paid_status == 0) echo "Pending";
                                                            elseif ($dt->paid_status == 2) echo "Cancelled";
                                                            ?>
                                                        </td>
                                                        <td class=" last">
                                                            <a href="<?php echo site_url('business/purchase_profile/' . $dt->order_id); ?>" class="btn btn-xs btn-info"><span class="fa fa-eye"></span></a>
                                                            <a href="<?php echo site_url('delete/order/' . $dt->order_id); ?>" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
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
