<?php
$CI = &get_instance();

    $expense_id = $expense_details->expense_id;
    $org_id = $expense_details->org_id;
    $account_id = $expense_details->account_id;
    $vote_head_id = $expense_details->vote_head_id;
    $departmentID = $expense_details->department_id;
    // $vote_head_name = $expense_details->vote_head_name;
    $paid_to = $expense_details->paid_to;
    $expense_balance = $expense_details->expense_balance;
    $status_id = $expense_details->status_id;
    $active = $expense_details->active;
    $expense_amount = $expense_details->expense_amount;
    $narrative = $expense_details->narrative;
    $expense_date = $expense_details->expense_date;
    $date_modified = $expense_details->date_modified;
    $time_stamp = $expense_details->time_stamp;
    $org_name = $expense_details->org_name;
    $address = $expense_details->address;
    $currency_id = $expense_details->currency_id;
    $country_id = $expense_details->country_id;
    $currency_code = $expense_details->currency_code;
    $name = $expense_details->name;
    $status_name = $expense_details->status_name;
    $account_name = $expense_details->account_name;
    $entity_name = $expense_details->entity_name;
    $firstname = $expense_details->firstname;
    $secondname = $expense_details->secondname;
    $lastname = $expense_details->lastname;
    $phone = $expense_details->phone;
    $gender = $expense_details->gender;
    $dob = $expense_details->dob;
    $id_passport = $expense_details->id_passport;
    $email = $expense_details->email;
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
                    <div class="col-md-5 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Form</h3>
                                <div class="card-tools">
                                    <a href="<?php echo site_url('expense/home'); ?>" class="btn btn-primary btn-xs">See expenses </a>
                                    <a href="#" onclick="window.open('<?php echo site_url('expense/payment_voucher/' . $expense_id); ?>','Payment Voucher','width=1000')" class="btn btn-rgp btn-xs">Payment voucher <i class="fa fa-globe"></i> </a>
                                    <?php if ($status_id == 2) : ?>
                                        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#newPayment">Make payment </button>
                                    <?php endif; ?>
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
                                                    <td class="rm_border_top pd_right"><b>Expense ID</b></td>
                                                    <td class="rm_border_top bd_left">#<?php echo $expense_id; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Expense Type</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $account_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Amount</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo number_format($expense_amount, 2); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Balance</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo number_format($expense_balance, 2); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Expense Date</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $expense_date; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Paid To</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $paid_to; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Narrative</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $narrative; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Org Name</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $org_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Country</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Currency</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $currency_code; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Initiator</b></td>
                                                    <td class="rm_border_top bd_left">
                                                        <?php
                                                        echo $firstname . ' ' . $secondname . ' ' . $lastname . '<br>';
                                                        echo $id_passport . ' | ' . $phone . ' | ' . $email;
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

                <?php if ($CI->permissions('expense_edit')) : ?>
                    <div class="col-md-7 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Update details</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('expense/update_expense/' . $expense_id); ?>" method="post">
                                    <!-- <form action="#" method="post"> -->
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="">Organization <span class="text text-danger">*</span> </label>
                                            <select name="org" class="select2 form-control" required tabindex="-1">
                                                <option value="">~Select Org~</option>
                                                <?php
                                                foreach ($all_orgs as $org) {
                                                ?>
                                                    <option value="<?php echo $org->org_id; ?>" <?php if ($org->org_id == $org_id) echo "selected"; ?>> <?php echo $org->org_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <label for="">Expense Type <span class="text text-danger">*</span> </label>
                                            <select name="account_id" class="select2 form-control" required tabindex="-1">
                                                <option value="">~Select Expense Type~</option>
                                                <?php
                                                $expense_types = $this->db->where('account_type_id', 3)->get('accounts')->result();
                                                foreach ($expense_types as $expenseT) {
                                                ?>
                                                    <option value="<?php echo $expenseT->account_id; ?>" <?php if ($expenseT->account_id == $account_id) echo "selected"; ?>> <?php echo $expenseT->account_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="">Department </label>
                                            <select name="department_id" class="select2 form-control" tabindex="-1">
                                                <option value="">~Select Department~</option>
                                                <?php
                                                $departments = $this->db->get('departments')->result();
                                                foreach ($departments as $dep) {
                                                ?>
                                                    <option value="<?php echo $dep->department_id; ?>" <?php if ($dep->department_id == $departmentID) echo 'selected'; ?>> <?php echo $dep->department_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-sm-12" style="display: none;">
                                            <label for="">Vote Head </label>
                                            <select name="vote_head_id" class="select2 form-control" tabindex="-1">
                                                <option value="">~Select Vote Head~</option>
                                                <?php
                                                foreach ($vote_heads as $vh) {
                                                ?>
                                                    <option value="<?php echo $vh->vote_head_id; ?>" <?php if ($vote_head_id == $vh->vote_head_id) echo "selected"; ?>> <?php echo $vh->vote_head_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <?php if ($CI->permissions('approve_expense')) { ?>
                                            <div class="col-md-6 col-sm-12">
                                                <label for="">Expense Status <span class="text text-danger">*</span> </label>
                                                <select name="status" class="select2 form-control" required tabindex="-1">
                                                    <option value="">~Select Expense Status~</option>
                                                    <?php
                                                    foreach ($status as $stat) {
                                                    ?>
                                                        <option value="<?php echo $stat->status_id; ?>" <?php if ($stat->status_id == $status_id) echo "selected"; ?>> <?php echo $stat->status_name; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        <?php } ?>

                                        <div class="col-md-6 col-sm-12">
                                            <label for="">Expense Amount <span class="text text-danger">*</span> </label>
                                            <input type="number" name="expense_amount" readonly class="form-control" value="<?php echo $expense_amount; ?>" required />
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 col-sm-12">
                                            <label for="">Expense Date <span class="text text-danger">*</span> </label>
                                            <input type="date" name="expense_date" class="form-control" value="<?php echo $expense_date; ?>" required />
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <label for="">Paid To <span class="text text-danger">*</span> </label>
                                            <input type="text" name="paid_to" class="form-control" value="<?php echo $paid_to; ?>" placeholder="Name of individual/company/inst." required />
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <label> Active </label>
                                            <p>
                                                <input type="checkbox" class="flat" value="1" name="active" <?php if ($active == 1) echo "checked"; ?>>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="">Narrative </label>
                                            <textarea name="narrative" id="" class="form-control">
                                    <?php echo $narrative; ?>
                                </textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                                        <button type="Submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

                <?php if ($CI->permissions('payment_view')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">List of Payments</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
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
                                                    <th>Subacc. Code</th>
                                                    <th>P. Mode</th>
                                                    <th>P. Amount</th>
                                                    <th>Exp. Amount</th>
                                                    <th>Reference</th>
                                                    <th>P. Date</th>
                                                    <th>Status </th>
                                                    <th class=" no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                $tt = 0;
                                                foreach ($payments as $p) {
                                                    $c++;
                                                    $tt += $p->payment_amount;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td><?php echo $p->account_code; ?></td>
                                                        <td><?php echo $p->subaccount_type_code; ?></td>
                                                        <td><?php echo $p->subaccount_type_name; ?></td>
                                                        <td><?php echo $p->payment_amount; ?></td>
                                                        <td><?php echo $p->expense_amount; ?></td>
                                                        <td><?php echo $p->check_no; ?></td>
                                                        <td><?php echo $p->payment_date; ?></td>
                                                        <th><?php echo $p->status_name; ?></th>
                                                        <td class=" last">
                                                            <a href="<?php echo site_url('expense/print_payment/' . $p->payment_id); ?>" target="_blank" class="btn btn-default btn-xs"><span class="fa fa-print"></span></a>
                                                            <?php if ($CI->permissions('payment_delete')) : ?>
                                                                <a href="<?php echo site_url('expense/delete_payment/' . $p->payment_id); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                                                            <?php endif; ?>
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
                                                        echo 'Balance: ' . number_format($expense_amount - $tt, 2);
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
<?php if ($status_id == 2) : ?>
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
                            <form action="<?php echo site_url('expense/new_payment'); ?>" method="post">
                                <div class="row">

                                    <div class="col-md-6 col-sm-6" style="display: none;">
                                        <label for="">Expense <span class="text text-danger">*</span> <small class="text text-warning fa fa-info-circle"> This is by default.</small> </label>
                                        <input type="text" value="<?php echo $expense_id; ?>" readonly name="expense_id" class="form-control" required />
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <label for="">Payment Mode <span class="text text-danger">*</span> </label>
                                        <select name="subaccount_type_id" class="select2 form-control" onchange="get_accounts(this)" required style="width:100%">
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
                                        <select class="select2 form-control" tabindex="-1" name="account_id" id="account_id" required style="width:100%">
                                            <option value=""> ~Select payment account~ </option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6 col-sm-6">
                                        <label for="">Amount Paid <span class="text text-danger">*</span> </label>
                                        <input type="number" name="payment_amount" class="form-control" value="<?= $expense_balance ?>" required />
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <label for="">Payment Date <span class="text text-danger">*</span> </label>
                                        <input type="date" name="payment_date" class="form-control" value="<?php echo $expense_date; ?>" required />
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6 col-sm-6">
                                        <label for="">Reference </label>
                                        <input type="text" name="check_no" class="form-control" placeholder="Check/reference number" />
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <label> Active </label>
                                        <p>
                                            <input type="checkbox" class="flat" checked value="1" checked name="active">
                                        </p>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6 col-sm-12">
                                        <label for="">Narrative </label>
                                        <textarea name="narrative" id="" class="form-control"><?= $narrative ?></textarea>
                                    </div>

                                </div>

                                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="Submit" class="btn btn-primary">Pay</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>

        </div>
    </div>
<?php endif; ?>


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