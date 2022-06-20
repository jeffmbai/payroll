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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><i class="fa fa-info-circle"></i> Filter the report</p>
                                </div>
                            </div>
                            <form action="<?php echo site_url('reports/get_account_statement_pdf'); ?>" method="post">
                                <div class="row">
                                    <input type="hidden" name="for" value="export" required />
                                    <div class="col-md-4 col-xs-6">
                                        <label for="">Account *</label>
                                        <select class="select2 form-control" name="account_code" required id="account_code">
                                            <option value="">Select account</option>
                                            <?php
                                            foreach ($accounts as $dt) {
                                            ?>
                                                <option value="<?= $dt->account_code; ?>"> <?= $dt->account_code . ' ' . $dt->account_name; ?> </option>
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
                                    <div class="col-md-4 col-xs-6">
                                        <label for="">Download format <i class="text-danger">*</i> </label>
                                        <br />
                                        <label> Pdf ? <input type="radio" name="download_format" value="pdf" checked required /> </label>
                                        <label> Excel ? <input type="radio" name="download_format" value="xls" required /> </label>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                        <button type="button" class="btn btn-primary" title="Generate report?" onclick="get_data()">Filter <i class="fa fa-filter"></i></button>
                                        <button type="submit" class="btn btn-rgd" title="Export?"> <i class="fa fa-download"></i> </button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.card-body -->
                    </div>

                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table id="example1" class="table table-condensed jambo_table" style="width: 100%">
                                        <thead>
                                            <th>Date</th>
                                            <th>Ref</th>
                                            <th>Details</th>
                                            <th>IN</th>
                                            <th>OUT</th>
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
        var account_code = $('#account_code').val();
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();

        console.log(account_code);
        console.log(from_date);
        console.log(to_date);

        $.ajax({
            url: '<?php echo site_url('reports/get_account_statement'); ?>',
            type: 'POST',
            cache: false,
            data: {
                account_code: account_code,
                from_date: from_date,
                to_date: to_date
            },
            success: function(html) {
                console.log(html);
                $('#table-data').html('').html(html);
            }
        });
    }
</script>