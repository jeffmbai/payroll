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
                                <h3 class="card-title">Filter statement</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('accounting/get_supplier_statement_pdf'); ?>" method="post">
                                    <div class="row">
                                        <input type="hidden" name="for" value="export" required />
                                        <div class="col-md-4 col-xs-6">
                                            <label for="">Supplier </label>
                                            <select class="select2_single form-control" name="supplier_id" id="supplier_id">
                                                <option value="">Select supplier</option>
                                                <?php
                                                foreach ($suppliers as $sp) {
                                                ?>
                                                    <option value="<?= $sp->entity_id; ?>"> <?= $sp->firstname . ' ' . $sp->secondname . ' : ' . $sp->phone; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-xs-6">
                                            <label for="">From <i class="text-danger">*</i> </label>
                                            <input type="date" name="from_date" id="from_date" class="form-control" required />
                                        </div>
                                        <div class="col-md-4 col-xs-6">
                                            <label for="">To <i class="text-danger">*</i> </label>
                                            <input type="date" name="to_date" id="to_date" class="form-control" required />
                                        </div>
                                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                            <button type="button" class="btn btn-primary" title="Generate report?" onclick="get_data()">Filter <i class="fa fa-filter"></i></button>
                                            <!-- <button type="submit" class="btn btn-rgs" > <i class="fa fa-file-excel-o"></i> </button> -->
                                            <button type="submit" class="btn btn-rgd" title="Export to PDF?"> <i class="fa fa-file-pdf-o"></i> </button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

                <?php if ($CI->permissions('general_view')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="example1" class="table table-condensed jambo_table">
                                            <thead>
                                                <th>Date</th>
                                                <th>Ref</th>
                                                <th>Details</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                                <th>Balance</th>
                                            </thead>
                                            <tbody id="table-data">
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
        var supplier_id = $('#supplier_id').val();
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();

        console.log(supplier_id);
        console.log(from_date);
        console.log(to_date);

        $('#table-data').html('');

        $.ajax({
            url: '<?php echo site_url('accounting/get_supplier_statement'); ?>',
            type: 'POST',
            cache: false,
            data: {
                supplier_id: supplier_id,
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