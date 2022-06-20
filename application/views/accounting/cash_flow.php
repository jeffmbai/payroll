<?php
$CI = &get_instance();
?>
<style>
    .trr {
        background-color: #025757;
        color: aliceblue;
    }
</style>

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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-striped table-condensed table-condensed">
                                            <!-- <thead>
                                    <tr>
                                        <th>Account</th>
                                        <th>DEBIT</th>
                                        <th>CREDIT</th>
                                    </tr>
                                </thead> -->
                                            <tbody>
                                                <tr class="trr">
                                                    <th colspan="2">OPERATING ACTIVITIES</th>
                                                </tr>
                                                <tr>
                                                    <td>Net Income</td>
                                                    <td>60,000</td>
                                                </tr>
                                                <tr>
                                                    <th><i>Additions to cash:</i></th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Depreciation</td>
                                                    <td>20,000</td>
                                                </tr>
                                                <tr>
                                                    <th><i>Substractions from cash:</i></th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Increase in accounts receivables</td>
                                                    <td>30,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Increase in inventory</td>
                                                    <td>23,000</td>
                                                </tr>
                                                <tr>
                                                    <th><u>Net Cash from Operations</u></th>
                                                    <th><u>27,000</u></th>
                                                </tr>

                                                <tr class="trr">
                                                    <th colspan="2">INVESTING ACTIVITIES</th>
                                                </tr>
                                                <tr>
                                                    <td>Purchase of Equipment</td>
                                                    <td>5,000</td>
                                                </tr>

                                                <tr class="trr">
                                                    <th colspan="2">FINANCING ACTIVITIES</th>
                                                </tr>
                                                <tr>
                                                    <td>Notes Payable</td>
                                                    <td>7,000</td>
                                                </tr>

                                                <tr class="trr">
                                                    <th><u>CASH AND CASH EQUIVALENTS, END OF PERIOD:</u></th>
                                                    <th><u>29,000</u></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped table-condensed table-responsive table-hover table-bordered">
                                    <tbody id="table-data"></tbody>
                                </table>
                            </div>
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
        var sheet_date = $('#sheet_date').val();

        $('#table-data').html('');

        $.ajax({
            url: '<?php echo site_url('accounting/get_balance_sheet'); ?>',
            type: 'POST',
            cache: false,
            data: {
                sheet_date: sheet_date
            },
            success: function(html) {
                console.log(html);
                $('#table-data').html(html);
            }
        });
    }
</script>