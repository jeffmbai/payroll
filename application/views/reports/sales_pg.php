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
                            <h3 class="card-title">Form Filter</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Store</label>
                                    <select name="org_sales" id="org_sales" class="select2 form-control">
                                        <option value="">Select order based on Store</option>
                                        <?php foreach ($orgs as $org) : ?>
                                            <option value="<?php echo $org->org_id ?>"> <?php echo $org->org_name ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">From date/month</label>
                                    <input type="date" class="form-control" name="from_date" id="from_date" />
                                </div>
                                <div class="col-md-4">
                                    <label for="">To date/month</label>
                                    <input type="date" class="form-control" name="to_date" id="to_date" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <br />
                                    <button class="btn btn-primary" name="submit" onclick="generate_rpt()" type="button">Generate Report</button>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>

                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="#">
                                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr>
                                                    <th>Bill No</th>
                                                    <th>Customer Name</th>
                                                    <th>Sales Point</th>
                                                    <th>Date</th>
                                                    <th>T.Type</th>
                                                    <th>Net Amount</th>
                                                    <th>Paid Amount</th>
                                                    <th>Balance</th>
                                                    <th>Discount</th>
                                                    <th>Payment Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="report1">
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
    function generate_rpt() {
        var orgid = $('#org_sales').val();
        var fromdate = $('#from_date').val();
        var todate = $('#to_date').val();
        console.log(orgid + " : " + fromdate + " : " + todate);
        $.ajax({
            url: '<?php echo site_url('data/item_sales_rpt'); ?>',
            type: 'POST',
            cache: false,
            data: 'store=' + orgid + '&from=' + fromdate + '&to=' + todate,
            success: function(html) {
                $('#report1').html(html);
                //console.log(html);
            }
        });
    }
</script>