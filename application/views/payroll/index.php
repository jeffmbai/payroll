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
                                <form action="<?php echo site_url('payroll/new_payment'); ?>" method="post">
                                    <p>
                                        <span class="fa fa-info-circle"> Select 'All' if you want to pay all staff or specific staff that needs to be paid</span>
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
                                    <a href="<?php echo site_url('payroll/current_payroll_excel'); ?>" target="_blank" class="btn btn-rgs pull-right" title="Download Excel?"><i class="fa fa-file-excel-o"></i></a>
                                    <a href="<?php echo site_url('payroll/current_payroll_pdf'); ?>" target="_blank" class="btn btn-rgd pull-right" title="Print pdf?"><i class="fa fa-file-pdf-o"></i></a>

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
                                                    <th class="basic">Basic Salary</th>
                                                    <th class="allow">Allowances</th>
                                                    <th class="gross">Gross Salary</th>
                                                    <th>NSSF</th>
                                                    <th>NHIF</th>
                                                    <th class="dedct">T.Deduct</th>
                                                    <th class="net">Net Salary</th>
                                                    <th>Disbursed? </th>
                                                    <th>Paid? </th>
                                                    <th class=" no-link last"><span class="nobr">Action</span> </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                $tbasic = $tallow = $tgross = $tnssf = $tnhif = $tdeduct = $tnet = 0;
                                                foreach ($current_payroll as $p) {
                                                    $c++;
                                                    $tbasic += $p->basic_salary;
                                                    $tallow += $p->allowance;
                                                    $tgross += $p->gross_salary;
                                                    $tnet += $p->net_salary;
                                                    $tnssf += $p->nssf;
                                                    $tnhif += $p->nhif;
                                                    $tdeduct += $p->deductible;
                                                    
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
                                                        <td class="basic"><?= number_format($p->basic_salary); ?></td>
                                                        <td class="allow"><?= number_format($p->allowance); ?></td>
                                                        <td class="gross"><?= number_format($p->gross_salary); ?></td>
                                                        <td><?= number_format($p->nssf); ?></td>
                                                        <td><?= number_format($p->nhif); ?></td>
                                                        <td class="dedct"><?= number_format($p->deductible); ?></td>
                                                        <td class="net"><?= number_format($p->net_salary); ?></td>
                                                        <td>
                                                            <?php if ($p->is_disbursed == 1) echo "Yes";
                                                            else echo "No"; ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($p->is_paid == 1) echo "Yes";
                                                            else echo "No"; ?>
                                                        </td>
                                                        <td class=" last">
                                                            <?php
                                                            #if has already been paid then show download button
                                                            if ($p->is_paid == 1 && $p->is_disbursed == 1) {
                                                                echo '<a href="' . site_url('payroll/payslip/' . $p->employee_month_id) . '" target="_blank" class="btn btn-xs btn-default fa fa-print"> </a>';
                                                            }
                                                            ?>
                                                            <button class="btn btn-xs btn-info fa fa-eye" data-toggle="modal" data-target="#myModal<?php echo $p->employee_month_id; ?>"></button>
                                                            <?php if ($CI->permissions('payroll_delete')) : ?>
                                                                <a href="<?php echo site_url('payroll/delete_payment/' . $p->employee_month_id); ?>" class="btn btn-danger btn-xs fa fa-trash"></a>
                                                            <?php endif; ?>
                                                        </td>

                                                        <div id="myModal<?php echo $p->employee_month_id; ?>" class="modal fade" role="dialog">
                                                            <div class="modal-dialog">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button> -->
                                                                        <h4 class="modal-title">Salary Details</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <p>
                                                                                    Employee Name: <?php echo $p->first_name . ' ' . $p->second_name . ' ' . $p->last_name; ?> <br />
                                                                                    ID: <?php echo $p->id_number; ?> <br />
                                                                                    Email: <?php echo $p->email; ?> <br />
                                                                                    Phone: <?php echo $p->primary_phone; ?> <br />
                                                                                    <b>Basic Salary: </b> <?php echo number_format($p->basic_salary, 2); ?>
                                                                                </p>
                                                                                <p>
                                                                                    <?php
                                                                                    #if has already been paid then show download button
                                                                                    if ($p->is_paid == 1 && $p->is_disbursed == 1) {
                                                                                        echo '<a href="' . site_url('payroll/payslip/' . $p->employee_month_id) . '" target="_blank" class="btn btn-lg btn-default" style="color: red;"> <span class="fa fa-print"></span> </a>';
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <h4>Allowances</h4>
                                                                                <ul class="to_do">
                                                                                    <?php
                                                                                    $totalAllowance = 0;
                                                                                    $allowances = $this->db->query("SELECT employee_allowances.allowance_amount, allowances.allowance_name
                                                                                        FROM employee_allowances
                                                                                        JOIN allowances ON allowances.allowance_id = employee_allowances.allowance_id 
                                                                                        WHERE employee_allowances.employee_id = " . $p->employee_id . " ");
                                                                                    foreach ($allowances->result() as $allw) {
                                                                                        echo '<li><p>' . $allw->allowance_name . ': ' . number_format($allw->allowance_amount, 2) . '</p></li>';
                                                                                    }
                                                                                    ?>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <h4>Deductions</h4>
                                                                                <ul class="to_do">
                                                                                    <?php
                                                                                    #get deductions
                                                                                    $totalDeductibles = 0;
                                                                                    $deductibles = $this->db->query("SELECT employee_deductibles.deductible_amount, deductibles.deductible_name
                                                                                        FROM employee_deductibles 
                                                                                        JOIN deductibles ON deductibles.deductible_id = employee_deductibles.deductible_id
                                                                                        WHERE employee_id = " . $p->employee_id . " ");
                                                                                    foreach ($deductibles->result() as $ded) {
                                                                                        echo '<li><p>' . $ded->deductible_name . ': ' . number_format($ded->deductible_amount, 2) . '</p></li>';
                                                                                    }
                                                                                    ?>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <ul class="to_do">
                                                                                    <li>
                                                                                        <b>NHIF: </b><?php echo number_format($p->nhif, 2); ?>
                                                                                    </li>
                                                                                    <li>
                                                                                        <b>NSSF: </b><?php echo number_format($p->nssf, 2); ?>
                                                                                    </li>
                                                                                    <li>
                                                                                        <b>PAYE: </b><?php echo number_format($p->tax, 2); ?>
                                                                                    </li>
                                                                                    <li>
                                                                                        <b>Gross Salary: </b><?php echo number_format($p->gross_salary, 2); ?>
                                                                                    </li>
                                                                                    <li>
                                                                                        <b>Net Salary: </b><?php echo number_format($p->net_salary, 2); ?>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </tr>

                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>TOTALS</th>
                                                    <th class="basic"><?= number_format($tbasic); ?></th>
                                                    <th class="allow"><?= number_format($tallow); ?></th>
                                                    <th class="gross"><?= number_format($tgross); ?></th>
                                                    <th><?= number_format($tnssf); ?></th>
                                                    <th><?= number_format($tnhif); ?></th>
                                                    <th class="dedct"><?= number_format($tdeduct); ?></th>
                                                    <th class="net"><?= number_format($tnet); ?></th>
                                                    <td></td>
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