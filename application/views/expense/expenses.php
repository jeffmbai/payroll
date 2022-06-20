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

                <?php if ($CI->permissions('expense_add')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Form</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('expense/new_expense'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <label for="">Organization <span class="text text-danger">*</span> </label>
                                            <select name="org" class="select2 form-control" required style="width: 100%">
                                                <option value="">~Select Org~</option>
                                                <?php
                                                foreach ($all_orgs as $org) {
                                                ?>
                                                    <option value="<?php echo $org->org_id; ?>" <?php if ($org->org_id == 1) echo "selected"; ?>> <?php echo $org->org_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <label for="">Expense <span class="text text-danger">*</span> </label>
                                            <select name="account_id" class="select2 form-control" required style="width: 100%">
                                                <option value="">~Select Expense~</option>
                                                <?php
                                                $expense_types = $this->db->where('account_type_id', 3)->get('accounts')->result();
                                                foreach ($expense_types as $expenseT) {
                                                ?>
                                                    <option value="<?php echo $expenseT->account_id; ?>"> <?php echo $expenseT->account_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-sm-6" style="display: block;">
                                            <label for="">Department </label>
                                            <select name="department_id" class="select2 form-control" style="width: 100%">
                                                <option value="">~Select Department~</option>
                                                <?php
                                                foreach ($departments as $dep) {
                                                ?>
                                                    <option value="<?php echo $dep->department_id; ?>"> <?php echo $dep->department_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-sm-6" style="display: none;">
                                            <label for="">Vote Head <small>(Select the vote head affected here)</small> </label>
                                            <select name="vote_head_id" class="select2 form-control" style="width: 100%">
                                                <option value="">~Select Vote Head~</option>
                                                <?php
                                                foreach ($vote_heads as $vh) {
                                                ?>
                                                    <option value="<?php echo $vh->vote_head_id; ?>"> <?php echo $vh->vote_head_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <?php if ($CI->permissions('approve_expense')) { ?>
                                            <div class="col-md-4 col-sm-6">
                                                <label for="">Expense Status <span class="text text-danger">*</span> </label>
                                                <select name="status" class="select2 form-control" required style="width: 100%">
                                                    <option value="">~Select Expense Status~</option>
                                                    <?php
                                                    foreach ($status as $stat) {
                                                    ?>
                                                        <option value="<?php echo $stat->status_id; ?>"> <?php echo $stat->status_name; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-md-4 col-sm-6">
                                                <label for="">Expense Status <span class="text text-danger">*</span> </label>
                                                <select name="status" class="select2 form-control" required style="width: 100%">
                                                    <option value="3" selected> Pending </option>
                                                </select>
                                            </div>
                                        <?php } ?>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-4 col-sm-6">
                                            <label for="">Expense Amount <span class="text text-danger">*</span> </label>
                                            <input type="number" name="expense_amount" class="form-control" required />
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <label for="">Expense Date <span class="text text-danger">*</span> </label>
                                            <input type="date" name="expense_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required />
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <label for="">Paid To <span class="text text-danger">*</span> </label>
                                            <input type="text" name="paid_to" class="form-control" placeholder="Name of individual/company/inst." required />
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-4 col-sm-12">
                                            <label for="">Narrative </label>
                                            <textarea name="narrative" id="" class="form-control"></textarea>
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <label> Active </label>
                                            <p>
                                                <input type="checkbox" class="flat" checked value="1" name="active">
                                            </p>
                                        </div>

                                    </div>

                                    <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                        <button type="Submit" class="btn btn-primary">Save</button>
                                    </div>

                                </form>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

                <?php if ($CI->permissions('expense_view')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Ex.Type</th>
                                                    <th>Amount</th>
                                                    <th>Balance</th>
                                                    <th>Paid To</th>
                                                    <th>Date</th>
                                                    <th>Status </th>
                                                    <th>Department</th>
                                                    <th class=" no-link last"> <span class="nobr">Action</span> </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($all_expenses as $expense) {
                                                    $c++;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td><a href="<?php echo site_url('expense/expense_details/' . $expense->expense_id); ?>"><?php echo $expense->account_name; ?></a></td>
                                                        <td><?php echo $expense->expense_amount; ?></td>
                                                        <td><?php echo $expense->expense_balance; ?></td>
                                                        <td><?php echo $expense->paid_to; ?></td>
                                                        <td><?php echo $expense->expense_date; ?></td>
                                                        <td><?php echo $expense->status_name; ?></td>
                                                        <td><?php echo $expense->department_name; ?></td>
                                                        <td class=" last">
                                                            <a href="#" onclick="window.open('<?php echo site_url('expense/payment_voucher/' . $expense->expense_id); ?>','Payment Voucher','width=1000')" class="btn btn-rgp btn-xs" title="Payment voucher"><i class="fa fa-ticket"></i> </a>
                                                            <a href="<?php echo site_url('expense/expense_details/' . $expense->expense_id); ?>" class="btn btn-rgs btn-xs"><span class="fa fa-eye"></span></a>
                                                            <a href="<?php echo site_url('expense/delete/' . $expense->expense_id); ?>" class="btn btn-rgd btn-xs"><span class="fa fa-trash"></span></a>
                                                        </td>
                                                    </tr>

                                                <?php
                                                }
                                                ?>
                                            </tbody>

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