<style>
    td,
    th {
        text-align: left !important;
    }
</style>

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
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">Filter By Date</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('accounting/profit_and_loss_pdf'); ?>" method="post">

                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <label for="">From Date <span class="text text-danger">*</span> </label>
                                            <input type="date" name="from_date" id="from_date" class="form-control" required />
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <label for="">To Date <span class="text text-danger">*</span> </label>
                                            <input type="date" name="to_date" id="to_date" class="form-control" required />
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <button type="button" class="btn btn-primary" onclick="get_data()" style="margin-top: 28px;">Generate <i class="fa fa-filter"></i></button>
                                            <button type="submit" name="Submit" class="btn btn-rgd" required style="margin-top: 28px;"><i class="fa fa-file-pdf-o"></i></button>
                                        </div>
                                    </div>

                                </form>
                            </div><!-- /.card-body -->
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-info">
                            <div class="card-body">
                                <table class="table table-striped table-condensed table-responsive table-hover table-bordered">
                                    <tbody id="table-data"></tbody>
                                </table>
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


<script>
    function get_data() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();

        console.log(from_date);
        console.log(to_date);

        $('#table-data').html('');

        $.ajax({
            url: '<?php echo site_url('accounting/get_profit_loss'); ?>',
            type: 'POST',
            cache: false,
            data: {
                from_date: from_date,
                to_date: to_date
            },
            success: function(html) {
                console.log(html);
                $('#table-data').html(html);
            }
        });
    }
</script>