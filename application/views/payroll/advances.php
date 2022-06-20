<style>
    .btn-xs {
        margin: 0px !important;
    }

    .basic {
        color: blue;
    }

    .allow {
        color: green;
    }

    .gross {
        color: black;
    }

    .dedct {
        color: red;
    }

    .net {
        color: green;
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

                <?php if ($CI->permissions('payroll_process')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Bulk Payment</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('payroll/new_payment_advances'); ?>" method="post">
                                    <p>
                                        <span class="fa fa-info-circle"> Select staff that needs to be paid</span>
                                    </p>

                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <label for="">Organization <span class="text text-danger">*</span> </label>
                                            <select class="form-control select2" onchange="get_employees2()" id="org_id2" name="org_id" required>
                                                <option value=""> ~Select Org~ </option>
                                                <?php
                                                foreach ($orgs as $org) {
                                                ?>
                                                    <option value="<?php echo $org->org_id; ?>" <?php if ($_SESSION['orgid'] == $org->org_id) echo 'selected'; ?>> <?php echo $org->org_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <label for="">Staff <span class="text text-danger">*</span> </label>
                                            <select name="employee_id[]" id="employee_id2" class="select2 form-control" multiple="multiple" required>
                                                <option value="all"> ~All Staff~ </option>
                                                <?php
                                                foreach ($staff as $st) {
                                                ?>
                                                    <option value="<?php echo $st->employee_id; ?>"> <?= $st->id_number . ' ' . $st->last_name . ' ' . $st->second_name . ' ' . $st->first_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <label for="">Year <span class="text text-danger">*</span> </label>
                                            <select class="form-control select2" name="fiscal_year_id" required>
                                                <option value=""> ~Select Year~ </option>
                                                <?php
                                                foreach ($fiscal_years as $year) {
                                                ?>
                                                    <option value="<?php echo $year->fiscal_year_id ?>" <?php if ($_SESSION['fiscalyearid'] == $year->fiscal_year_id) echo 'selected'; ?>><?php echo $year->fiscal_year_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <label for="">Month </label>
                                            <select class="form-control select2" name="year_month_id" required>
                                                <option value=""> ~Select Month~ </option>
                                                <?php
                                                $mon = date('m');
                                                foreach ($year_months as $month) {
                                                ?>
                                                    <option value="<?php echo $month->year_month_id ?>" <?php if ($mon == $month->year_month_id) echo 'selected'; ?>><?php echo $month->month_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label> Active </label>
                                            <p>
                                                <input type="checkbox" class="flat" value="1" checked name="active">
                                            </p>
                                        </div>
                                        <div class="col-md-2" style="padding-top: 8px; margin-top: 8px;">
                                            <button type="Submit" class="btn btn-success">Process</button>
                                        </div>
                                    </div>

                                </form>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

                <?php if ($CI->permissions('payroll_view')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Salaries for <?= $_SESSION['payroll_month'] . ' / ' . $_SESSION['payroll_year'] ?></h3>
                                <input type="date" class="" onchange="get_payroll(this)" style="margin-left: 20px" title="Change Payroll Month?" />
                                <div class="card-tools">
                                    <a href="<?php echo site_url('payroll/current_advances_excel'); ?>" target="_blank" class="btn btn-rgs pull-right" title="Download Excel?"><i class="fa fa-file-excel-o"></i></a>
                                    <a href="<?php echo site_url('payroll/current_advances_pdf'); ?>" target="_blank" class="btn btn-rgd pull-right" title="Print?"><i class="fa fa-file-pdf-o"></i></a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="table table-responsive">
                                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Staff</th>
                                                    <!-- <th class="gross">Account No.</th> -->
                                                    <th class="net">Amount</th>
                                                    <th>Disbursed? </th>
                                                    <th>Paid? </th>
                                                    <th class=" no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                $total = 0;
                                                foreach ($current_payroll as $p) {
                                                    $c++;
                                                    $total += $p->advance_amount;

                                                    ($p->id_number != '' || $p->id_number != null) ? $idnumber = $p->id_number : $idnumber = null;
                                                    // Blinder
                                                    $a = $idnumber;
                                                    $mid = preg_replace('/..(.*)../', '$1', $a);
                                                    $res = preg_replace(array('#[A-Z0-9]#', '#[a-z]#'), array('X', 'x'), $mid);
                                                    // echo $res;
                                                    $idnumber = str_replace($mid, $res, $a);

                                                ?>
                                                    <tr class="even pointer">
                                                        <td>
                                                            <?php
                                                            echo strtoupper($p->first_name . ' ' . $p->last_name . ' <i>(ID:' . $idnumber . ')</i>');
                                                            ?>
                                                        </td>
                                                        <!-- <td class="gross"><?= $p->bank_account_no; ?></td> -->
                                                        <td class="net"><?= number_format($p->advance_amount); ?></td>
                                                        <td>
                                                            <?php if ($p->is_disbursed == 1) echo "Yes";
                                                            else echo "No"; ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($p->is_paid == 1) echo "Yes";
                                                            else echo "No"; ?>
                                                        </td>
                                                        <td class=" last">
                                                            <?php if ($CI->permissions('payroll_delete')) : ?>
                                                                <a href="<?php echo site_url('payroll/delete_payment_advance/' . $p->employee_month_id); ?>" class="btn btn-danger btn-xs fa fa-trash"></a>
                                                            <?php endif; ?>
                                                        </td>

                                                    </tr>

                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="2">TOTALS</th>
                                                    <th class="net"><?= number_format($total); ?></th>
                                                    <!-- <td></td> -->
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>

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



<script type="text/javascript">
    function get_employees2() {
        var orgid = document.getElementById("org_id2").value;
        console.log("OrgID: " + orgid);
        $.ajax({
            url: '<?php echo site_url('data/employees'); ?>',
            type: 'POST',
            cache: false,
            data: 'data=' + orgid,
            success: function(data) {
                console.log(data);
                $('#employee_id2').html(data);
            }
        });
    }

    function get_payroll(e) {
        var thisdate = e.value;
        console.log('Date: ' + thisdate);
        $.ajax({
            url: '<?php echo site_url('data/set_payroll'); ?>',
            type: 'POST',
            cache: false,
            data: 'data=' + thisdate,
            success: function(data) {
                console.log(data);
                setTimeout(function() {
                    window.location.reload();
                }, 3000);
            }
        });
    }
</script>