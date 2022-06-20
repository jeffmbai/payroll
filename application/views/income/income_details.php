<?php
$paid = $balance = 0;
$paid = $this->db->select("SUM(payment_amount) as total_paid")->from('income_payments')->where('income_id', $income->income_id)->get()->row();
$balance = $income->income_amount - $paid->total_paid;
?>
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
                    <div class="col-md-4 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <div class="card-tools">
                                    <a href="<?php echo site_url('income/index'); ?>" class="btn btn-primary btn-xs">See income </a>
                                    <?php if ($income->status_id == 2) : ?>
                                        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#newPayment">Receive payment </button>
                                    <?php endif; ?>
                                    <a href="<?php echo site_url('income/invoice/' . $income->income_id); ?>" target="_blank" class="btn btn-rgd btn-xs">INVOICE </a>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-repsonsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Income Ref</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $income->reference; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Income Type</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $income->account_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Amount</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo number_format($income->income_amount, 2); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Balance</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo number_format($balance, 2); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Income Date</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $income->income_date; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Customer</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $income->customer_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Narrative</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $income->narrative; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Initiator</b></td>
                                                    <td class="rm_border_top bd_left">
                                                        <?php
                                                        echo $income->firstname . ' ' . $income->secondname . ' ' . $income->lastname . '<br>';
                                                        echo $income->id_passport . ' | ' . $income->phone . ' | ' . $income->email;
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

                <?php if ($CI->permissions('income_edit')) : ?>
                    <div class="col-md-8 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Edit form</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('income/update_income/' . $income->income_id); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <label for="">Organization <span class="text text-danger">*</span> </label>
                                            <select name="org" class="select2 form-control" required tabindex="-1">
                                                <option value="">~Select Org~</option>
                                                <?php
                                                $all_orgs = $this->db->get('orgs')->result();
                                                foreach ($all_orgs as $org) {
                                                ?>
                                                    <option value="<?php echo $org->org_id; ?>" <?php if ($org->org_id == $income->org_id) echo "selected"; ?>> <?php echo $org->org_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <label for="">Income <span class="text text-danger">*</span> </label>
                                            <select name="account_id" class="select2 form-control" required tabindex="-1">
                                                <option value="">~Select Income~</option>
                                                <?php
                                                $inc_types = $this->db->where("account_type_id = 4 AND is_votehead = 0 AND is_studentaccount = 0")->get('accounts')->result();
                                                foreach ($inc_types as $incT) {
                                                ?>
                                                    <option value="<?php echo $incT->account_id; ?>" <?php if ($incT->account_id == $income->account_id) echo "selected"; ?>> <?php echo $incT->account_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <label for="">Department </label>
                                            <select name="department_id" class="select2 form-control" tabindex="-1">
                                                <option value="">~Select Department~</option>
                                                <?php
                                                $departments = $this->db->get('departments')->result();
                                                foreach ($departments as $dep) {
                                                ?>
                                                    <option value="<?php echo $dep->department_id; ?>" <?php if ($dep->department_id == $income->department_id) echo 'selected'; ?>> <?php echo $dep->department_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <?php if ($CI->permissions('approve_income')) : ?>
                                            <div class="col-md-4 col-sm-6">
                                                <label for="">Income Status <span class="text text-danger">*</span> </label>
                                                <select name="status" class="select2 form-control" required tabindex="-1">
                                                    <option value="">~Select Income Status~</option>
                                                    <?php
                                                    $status = $this->db->get('status')->result();
                                                    foreach ($status as $stat) {
                                                    ?>
                                                        <option value="<?php echo $stat->status_id; ?>" <?php if ($stat->status_id == $income->status_id) echo 'selected'; ?>> <?php echo $stat->status_name; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        <?php endif; ?>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-4 col-sm-6">
                                            <label for="">Income Amount <span class="text text-danger">*</span> </label>
                                            <input type="number" readonly name="income_amount" class="form-control" value="<?= $income->income_amount ?>" required />
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <label for="">Income Date <span class="text text-danger">*</span> </label>
                                            <input type="date" name="income_date" class="form-control" value="<?= $income->income_date; ?>" required />
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <label for="">Income By <small>(Customer name)</small> <span class="text text-danger">*</span> </label>
                                            <input type="text" name="customer_name" class="form-control" value="<?= $income->customer_name ?>" placeholder="Name of individual/company/inst." required />
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-4 col-sm-12">
                                            <label for="">Narrative </label>
                                            <textarea name="narrative" id="" class="form-control"><?= $income->narrative ?></textarea>
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <label> Active </label>
                                            <p>
                                                <input type="checkbox" class="flat" value="1" name="active" <?php if ($income->active == 1) echo 'checked'; ?>>
                                            </p>
                                        </div>

                                    </div>

                                    <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

                <?php if ($CI->permissions('orgs_add')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">List of payments</h3>
                                <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Acc. Code</th>
                                                    <th>P. Amount</th>
                                                    <th>Reference.</th>
                                                    <th>P. Date</th>
                                                    <th>Status </th>
                                                    <th class=" no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                $tt = 0;
                                                $payments = $this->db->select('a.*, b.account_code, b.account_name')
                                                    ->from('income_payments AS a')
                                                    ->join('accounts as b', 'a.account_id = b.account_id')
                                                    ->where('a.income_id', $income->income_id)
                                                    ->get()
                                                    ->result();
                                                foreach ($payments as $p) {
                                                    $c++;
                                                    $tt += $p->payment_amount;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td><?php echo $p->account_code; ?></td>
                                                        <td><?php echo $p->payment_amount; ?></td>
                                                        <td><?php echo $p->reference; ?></td>
                                                        <td><?php echo $p->payment_date; ?></td>
                                                        <th><?php if ($p->is_paid == 1) echo 'Paid';
                                                            else echo 'Unpaid'; ?></th>
                                                        <td class=" last">
                                                            <a href="<?php echo site_url('income/print_payment/' . $p->income_payment_id); ?>" target="_blank" class="btn btn-default btn-xs" title=""><span class="fa fa-print"></span></a>
                                                            <!-- <a href="#" onclick="window.open('<?php echo site_url('income/print_payment2/' . $p->income_payment_id); ?>','Receipt','width=1000')" title="Receipt" class="btn btn-default btn-xs"><span class="fa fa-globe"></span></a> -->
                                                            <!-- <a href="<?php echo site_url('income/delete_payment/' . $p->income_payment_id); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a> -->
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="9">
                                                        <?php
                                                        echo 'Total Payment: ' . number_format($tt, 2);
                                                        echo '&nbsp; &nbsp; &nbsp; ';
                                                        echo 'Balance: ' . number_format($balance, 2);
                                                        ?>
                                                    </th>
                                                </tr>
                                            </tfoot>

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


<!-- Modals Start -->
<div id="newPayment" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title">Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo site_url('income/new_payment'); ?>" method="post">
                            <div class="row">

                                <div class="col-md-6 col-sm-6" style="display: none;">
                                    <label for="">Icome <span class="text text-danger">*</span> <small class="text text-warning fa fa-info-circle"> This is by default.</small> </label>
                                    <input type="text" value="<?php echo $income->income_id; ?>" readonly name="income_id" class="form-control" required />
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <label for="">Payment Mode <span class="text text-danger">*</span> </label>
                                    <select name="subaccount_type_id" class="select2 form-control" onchange="get_accounts(this)" required style="width: 100%">
                                        <option value="">~Select Payment Mode~</option>
                                        <?php
                                        $subaccounttypes = $this->db->where('is_paymentmode', 1)->get('subaccount_types')->result();
                                        foreach ($subaccounttypes as $pm) {
                                        ?>
                                            <option value="<?php echo $pm->subaccount_type_id; ?>"> <?php echo $pm->subaccount_type_name . ' ~ ' . $pm->subaccount_type_code; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <label for="">Payment Account <span class="text text-danger">*</span> </label>
                                    <select class="select2 form-control" tabindex="-1" name="account_id" id="account_id" required style="width: 100%">
                                        <option value=""> ~Select payment account~ </option>
                                    </select>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6 col-sm-6">
                                    <label for="">Amount Paying <span class="text text-danger">*</span> </label>
                                    <input type="number" name="payment_amount" class="form-control" value="<?= $balance ?>" required />
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <label for="">Payment Date <span class="text text-danger">*</span> </label>
                                    <input type="date" name="payment_date" class="form-control" value="<?= $income->income_date; ?>" required />
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6 col-sm-6">
                                    <label for="">Reference. </label>
                                    <input type="text" name="reference" class="form-control" />
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <label for="">Paid by. <i class="text-danger">*</i></label>
                                    <input type="text" name="paid_by" class="form-control" required value="<?= $income->customer_name ?>" placeholder="Name of individual/company/inst." />
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6 col-sm-6">
                                    <label> Active </label>
                                    <p>
                                        <input type="checkbox" class="flat" value="1" checked name="active">
                                    </p>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <label for="">Narrative </label>
                                    <textarea name="narrative" id="" class="form-control"><?= $income->narrative ?></textarea>
                                </div>

                            </div>

                            <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="Submit" class="btn btn-primary pull-right">Receive</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>

    </div>
</div>


<script>
    function get_accounts(e) {
        //get the payment accounts
        console.log('Sub Acc. Type: ' + e.value);
        var subacctype = e.value;
        $.ajax({
            url: '<?php echo site_url('data/get_accounts'); ?>',
            type: 'POST',
            cache: false,
            data: {
                subacctype: subacctype
            },
            success: function(html) {
                console.log(html);
                $('#account_id').html('').html(html);
            }
        });
    }
</script>