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

                <div class="col-md-12 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Bookings List</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="data_table" class="table table-striped jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Bill No</th>
                                                    <th>Customer Name</th>
                                                    <th>Date</th>
                                                    <th>Date range</th>
                                                    <th>Net Amount</th>
                                                    <th>Paid Amount</th>
                                                    <th>Balance</th>
                                                    <th>Payment status</th>
                                                    <?php if ($_SESSION['superuser'] == 1 || $_SESSION['userrole'] == 1) : ?>
                                                        <th class=" no-link last"><span class="nobr">Action</span></th>
                                                    <?php endif; ?>
                                                </tr>
                                            </thead>

                                            <tbody id="orders">
                                                <!-- <?php
                                                        $c = 0;
                                                        foreach ($orders as $dt) {
                                                            #if($dt->transaction_type_id == 2 || $dt->transaction_type_id == 4) continue;
                                                            $c++;
                                                        ?>
                                            <tr class="even pointer">
                                                    <td class=" "><?php echo $dt->bill_no; ?></td>
                                                    <td class=" "><?php echo $dt->customer_supplier_name; ?></td>
                                                    <td class=" "><?php echo $dt->date_time; ?></td>
                                                    <td class=" "><?php echo $dt->from_date . ' - ' . $dt->to_date; ?></td>
                                                    <td class=" "><?php echo $dt->net_amount; ?></td>
                                                    <td class=" "><?php echo $dt->paid_amount; ?></td>
                                                    <td class=" "><?php echo $dt->paying_balance; ?></td>
                                                    <td class="a-right a-right ">
                                                        <?php
                                                            if ($dt->paid_status == 1) echo "Paid";
                                                            elseif ($dt->paid_status == 0) echo "Pending";
                                                            elseif ($dt->paid_status == 2) echo "Cancelled";
                                                        ?>
                                                    </td>
                                                    <?php if ($_SESSION['superuser'] == 1 || $_SESSION['userrole'] == 1) : ?>
                                                        <td class=" last">
                                                            <a href="<?php echo site_url('rooms/booking_details/' . $dt->order_id); ?>" class="btn btn-xs btn-info"><span class="fa fa-eye"></span></a>
                                                            <a href="<?php echo site_url('rooms/delete_booking/' . $dt->order_id); ?>" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
                                                        </td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php
                                                        }
                                            ?> -->
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>

                </div>

            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->



<script type="text/javascript">
    $(document).ready(function() {

        $('#data_table').DataTable({
            "pageLength": 10, //specify the number of rows to be displayed
            "ajax": {
                url: "<?php echo site_url("rooms/all_bookings") ?>",
                type: 'GET'
            },
        });
    });
</script>