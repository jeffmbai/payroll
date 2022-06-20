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
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Table Data</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12"> <br />
                                        <table id="example1" class="table table-bordered table-striped table-condensed jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Date</th>
                                                    <th>Acc. Name</th>
                                                    <th>Acc. Code</th>
                                                    <th>Sub-Acc. Type Name</th>
                                                    <th>Acc. Type Name</th>
                                                    <th>Created By</th>
                                                    <th>Narrative</th>
                                                    <td>CR</td>
                                                    <td>DR</td>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($general_ledger as $dt) {
                                                    $c++;
                                                ?>
                                                    <tr>
                                                        <td><?= date("d-m-Y", strtotime($dt->transaction_date)); ?></td>
                                                        <td><?= $dt->account_name; ?></td>
                                                        <td><a style="color: blue" href="<?php echo site_url('accounting/account_ledger/' . $dt->account_code) ?>"> <?= $dt->account_code; ?> </a></td>
                                                        <td><?= $dt->subaccount_type_name; ?></td>
                                                        <td><?= $dt->account_type_name; ?></td>
                                                        <td><?= $dt->firstname . ' ' . $dt->secondname; ?></td>
                                                        <td><?= $dt->narrative; ?></td>
                                                        <th><?php if ($dt->voucher_type == 'cr') echo number_format($dt->voucher_amount, 2); ?></th>
                                                        <th><?php if ($dt->voucher_type == 'dr') echo number_format($dt->voucher_amount, 2); ?></th>
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
