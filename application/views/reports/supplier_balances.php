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
                            <h3 class="card-title">Supplier List</h3>
                            <div class="card-tools">
                                <a href="<?php echo site_url('accounting/supplier_balances_pdf'); ?>" target="_blank" class="btn btn-rgd" title="Export to PDF ?"><i class="fa fa-file-pdf-o"></i></a>
                                <a href="<?php echo site_url('accounting/supplier_balances_excel'); ?>" class="btn btn-rgs" title="Export to Excel ?"><i class="fa fa-file-excel-o"></i></a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table id="example1" class="table table-striped table-condensed">
                                        <thead class="bg-orange"> 
                                            <tr>
                                                <th>Name </th>
                                                <th>Phone </th>
                                                <th>TT. Amount </th>
                                                <th>Amount Paid </th>
                                                <th>Amount Due </th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-data">
                                            <?php
                                            $totalamount = $totaldues = $totalpayments = 0;
                                            if (count($suppliers) < 1) {
                                                echo '<tr> <td colspan="7" style="color: orange;" >No data found!</td> </tr>';
                                            } else {

                                                foreach ($suppliers as $tbd) {

                                                    // Get voucher cr/dr
                                                    $total_cr = $this->db->where(" account_code = '800001' AND customer_supplier_id = '$tbd->entity_id' AND voucher_type = 'cr' ")->select_sum('voucher_amount')->get('vw_general_ledger')->row('voucher_amount');
                                                    $total_dr = $this->db->where(" account_id = '800001' AND customer_supplier_id = '$tbd->entity_id' AND voucher_type = 'dr' ")->select_sum('voucher_amount')->get('vw_general_ledger')->row('voucher_amount');
                                                    $total_due = $total_cr - $total_dr;
                                                    
                                                    // $totalamount += $opening_balance;
                                                    $totalamount += $total_cr;
                                                    $totalpayments += $total_dr;
                                                    $totaldues += $total_due;

                                                    $color = null;
                                                    if ($total_due > 0) $color = ' style="background-color:#C6BFBF !important;" ';

                                            ?>
                                                    <tr <?= $color; ?>>
                                                        <td><?= $tbd->firstname . ' ' . $tbd->secondname . ' ' . $tbd->lastname ?></td>
                                                        <td><?= $tbd->phone ?></td>
                                                        <td><?= number_format($total_cr, 2) ?></td>
                                                        <td><?= number_format($total_dr, 2) ?></td>
                                                        <th><?= number_format($total_due, 2) ?></th>
                                                    </tr>
                                                <?php
                                                }

                                                ?>
                                                <tr>
                                                    <th colspan="2">TOTAL (KES)</th>
                                                    <th><?= number_format($totalamount, 2) ?></th>
                                                    <th><?= number_format($totalpayments, 2) ?></th>
                                                    <th><?= number_format($totaldues, 2) ?></th>
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

            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->



<script>
    function get_data() {
        var get_data = $('#get_data').val();

        console.log(get_data);

        $('#table-data').html('');

        $.ajax({
            // url: '<?php echo site_url('fees/get_balances'); ?>',
            url: '<?php echo site_url('accounting/get_supplier_balances'); ?>',
            type: 'POST',
            cache: false,
            data: {
                supplier_id: supplier_id,
                for: 'data'
            },
            success: function(html) {
                console.log(html);
                $('#table-data').html(html);
            }
        });
    }
</script>