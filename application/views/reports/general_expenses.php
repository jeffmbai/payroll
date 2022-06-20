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
                                <h3 class="card-title">List</h3>
                                <div class="card-tools">
                                    <a href="<?php echo site_url('accounting/supplier_balances_pdf'); ?>" target="_blank" class="btn btn-rgd" title="Export to PDF ?"><i class="fa fa-file-pdf-o"></i></a>
                                    <a href="<?php echo site_url('accounting/supplier_balances_excel'); ?>" class="btn btn-rgs" title="Export to Excel ?"><i class="fa fa-file-excel-o"></i></a>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <table id="example" class="table table-striped responsive-utilities">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Account Code</th>
                                                    <th>Account Name</th>
                                                    <th>Sub-Account Name</th>
                                                    <th>Description </th>
                                                    <th>Amount </th>
                                                    <th>Date </th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-data">
                                                <?php
                                                foreach ($expenses as $td) {
                                                ?>
                                                    <tr>
                                                        <th> <a href="<?php echo site_url('accounting/account_ledger/' . $td->account_code) ?>" target="_blank"> <?= $td->account_code ?> </a> </th>
                                                        <td><?= $td->account_name ?></td>
                                                        <td><?= $td->subaccount_type_name ?></td>
                                                        <td><?= $td->narrative ?></td>
                                                        <th><?= number_format($td->expense_amount, 2) ?></th>
                                                        <th><?= $td->time_stamp ?></th>
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