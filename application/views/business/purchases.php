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
                    <h1 class="m-0 text-dark">
                        <button class="pull-left backbtn" title="Back" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"> </i></button>
                        Purchases</h1>
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

                <?php if ($CI->permissions('org_view')) : ?>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card direct-chat direct-chat-warning">
                            <div class="card-header">
                                <h3 class="card-title">Purchases Table</h3>
                                <div class="card-tools">
                                    <a href="<?php echo site_url('business/new_purchase'); ?>" class="btn btn-primary btn-xs">New Purchase</a>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-md-12"> <br />
                                    <table id="data_table" class="table table-striped jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th>Bill No</th>
                                                <th>Supplier Name</th>
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
                                        </tbody>

                                    </table>
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



<script type="text/javascript">
    $(document).ready(function() {

        $('#data_table').DataTable({
            "pageLength": 10, //specify the number of rows to be displayed
            "order": [ 2, 'desc' ],
            "ajax": {
                url: "<?php echo site_url("business/all_purchases") ?>",
                type: 'GET'
            },
        });
    });
</script>