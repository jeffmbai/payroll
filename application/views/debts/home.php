<?php
$total_dr = 0.00;
$total_cr = 0.00;
$CI = &get_instance();

// get from sales receivable acc: 500002 
$total_dr = $this->db->select_sum('voucher_amount')->from('vouchers')->where(" voucher_type = 'dr' AND (transaction_date BETWEEN '$from_date' AND '$to_date') AND account_code = '500002' ")->get()->row('voucher_amount');
$total_cr = $this->db->select_sum('voucher_amount')->from('vouchers')->where(" voucher_type = 'cr' AND (transaction_date BETWEEN '$from_date' AND '$to_date') AND account_code = '500002' ")->get()->row('voucher_amount');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><button class="pull-left backbtn" title="Back" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"> </i></button>
                        <?= $page ?> </h1>
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

            <form action="<?= site_url('debts/home'); ?>" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <p>Filter the date range to extract the report</p>
                    </div>
                    <div class="col-md-3">
                        <label>From Date</label>
                        <input type="date" name="from_date" value="<?= $from_date ?>" required />
                    </div>
                    <div class="col-md-3">
                        <label>To Date</label>
                        <input type="date" name="to_date" value="<?= $to_date ?>" required />
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary btn-sm">Filter <i class="fa fa-filter"></i></button>
                    </div>
                </div>
            </form>

            <hr />

            <!-- Tiles Begin -->
            <div class="row">

                <?php if ($CI->permissions('bookings_view')) : ?>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-orange elevation-1"><i class="fa fa-caret-square-o-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total DR</span>
                                <span class="info-box-number"><?= number_format($total_dr, 2) ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                <?php endif; ?>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <?php if ($CI->permissions('payments_view')) : ?>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-caret-square-o-down"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total CR</span>
                                <span class="info-box-number"><?= number_format($total_cr, 2) ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-bill-alt"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Balance</span>
                                <span class="info-box-number"><?= number_format($total_dr - $total_cr, 2) ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                <?php endif; ?>

            </div>

            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Sales debt history</h3>
                            <div class="card-tools">
                                Sales between <?= $from_date . ' and ' . $to_date ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="table-responsive col-md-12 col-xs-12">
                                    <table id="example" class="table table-striped responsive-utilities">
                                        <thead>
                                            <tr class="headings">
                                                <th>Name</th>
                                                <th>Contact details</th>
                                                <th>Total value sold</th>
                                                <th>Balance</th>
                                                <th class=" no-link last"><span class="nobr">Action</span></th>
                                            </tr>
                                        </thead>

                                        <tbody id="orders">
                                            <?php
                                            $c = $total_net_amount = $total_balance = 0;
                                            foreach ($entity_with_debts as $dt) {
                                                $total_net_amount += $dt->total_net_amount;
                                                $total_balance += $dt->total_balance;
                                            ?>
                                                <tr>
                                                    <td><?= $dt->firstname . ' ' . $dt->secondname . ' ' . $dt->lastname; ?></td>
                                                    <td><?= $dt->phone . ' / ' . $dt->email ?></td>
                                                    <td><?= number_format($dt->total_net_amount, 2); ?></td>
                                                    <td><?= number_format($dt->total_balance, 2); ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                                <span class="caret"></span></button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="<?php echo site_url('users/profile/' . $dt->customer_supplier_id); ?>"><span class="fa fa-eye"></span> View profile</a></li>
                                                                <li><a href="<?php echo site_url('business/user_orders/' . $dt->customer_supplier_id); ?>"><span class="fa fa-shopping-cart"></span> Orders</a></li>
                                                                <!-- <li><a href="<?php echo site_url('users/user_payments/' . $dt->customer_supplier_id); ?>"><span class="fa fa-money"></span> Payments</a></li> -->
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th colspan="2">TOTALS</th>
                                                <th><?= number_format($total_net_amount, 2) ?></th>
                                                <th><?= number_format($total_balance, 2) ?></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>

                </div>

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



<script type="text/javascript">
    var val = '<?php echo $credits; ?>';
    var va2 = '<?php echo $debts; ?>';
    // var val = '100';
    // var va2 = '20';

    console.log("This val: " + va2);

    var sharePiePolorDoughnutData = [{
            value: val,
            color: "#B370CF",
            highlight: "#34495E",
            label: "CREDITS"
        },
        {
            value: va2,
            color: "#36CAAB",
            highlight: "#B370CF",
            label: "DEBITS"
        }

    ];
    $(document).ready(function() {
        window.myPie = new Chart(document.getElementById("canvas_pie").getContext("2d")).Pie(sharePiePolorDoughnutData, {
            responsive: true,
            tooltipFillColor: "rgba(51, 51, 51, 0.55)"
        });
    });
</script>