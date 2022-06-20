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

                <?php if ($CI->permissions('income_add')) : ?>
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
                                <form action="<?php echo site_url('income/new_income'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <label for="">Organization <span class="text text-danger">*</span> </label>
                                            <select name="org" class="select2 form-control" required style="width: 100%">
                                                <option value="">~Select Org~</option>
                                                <?php
                                                $all_orgs = $this->db->get('orgs')->result();
                                                foreach ($all_orgs as $org) {
                                                ?>
                                                    <option value="<?php echo $org->org_id; ?>" <?php if ($org->org_id == 1) echo "selected"; ?>> <?php echo $org->org_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <label for="">Income <span class="text text-danger">*</span> </label>
                                            <select name="account_id" class="select2 form-control" required style="width: 100%">
                                                <option value="">~Select Income~</option>
                                                <?php
                                                $inc_types = $this->db->where("account_type_id = 4 AND is_votehead = 0 AND is_studentaccount = 0")->get('accounts')->result();
                                                foreach ($inc_types as $incT) {
                                                ?>
                                                    <option value="<?php echo $incT->account_id; ?>"> <?php echo $incT->account_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <?php if ($CI->permissions('approve_income')) { ?>
                                            <div class="col-md-4 col-sm-6">
                                                <label for="">Income Status <span class="text text-danger">*</span> </label>
                                                <select name="status" class="select2 form-control" required style="width: 100%">
                                                    <option value="">~Select Income Status~</option>
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
                                                <label for="">Income Status <span class="text text-danger">*</span> </label>
                                                <select name="status" class="select2 form-control" required style="width: 100%">
                                                    <option value="3" selected> Pending </option>
                                                </select>
                                            </div>
                                        <?php } ?>

                                        <div class="col-md-4 col-sm-6" style="display: block;">
                                            <label for="">Department </label>
                                            <select name="department_id" class="select2 form-control" style="width: 100%">
                                                <option value="">~Select Department~</option>
                                                <?php
                                                $departments = $this->db->get('departments')->result();
                                                foreach ($departments as $dep) {
                                                ?>
                                                    <option value="<?php echo $dep->department_id; ?>"> <?php echo $dep->department_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-4 col-sm-6">
                                            <label for="">Income Amount <span class="text text-danger">*</span> </label>
                                            <input type="number" name="income_amount" class="form-control" required />
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <label for="">Income Date <span class="text text-danger">*</span> </label>
                                            <input type="date" name="income_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required />
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <label for="">Income By <small>(Customer name)</small> <span class="text text-danger">*</span> </label>
                                            <input type="text" name="customer_name" class="form-control" placeholder="Name of individual/company/inst." required />
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
                                                <input type="checkbox" class="flat" value="1" name="active">
                                            </p>
                                        </div>

                                    </div>

                                    <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

                <?php if ($CI->permissions('income_view')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">List</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="example1" class="table table-striped table-condensed responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Reference</th>
                                                    <th>Income</th>
                                                    <th>Amount</th>
                                                    <th>Balance</th>
                                                    <th>Customer</th>
                                                    <th>Date</th>
                                                    <th>Status </th>
                                                    <th>Department </th>
                                                    <th class=" no-link last"><span class="nobr">Action</span> </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($incomes as $inc) {
                                                    $paid = $balance = 0;
                                                    $paid = $this->db->select("SUM(payment_amount) as total_paid")->from('income_payments')->where('income_id', $inc->income_id)->get()->row();
                                                    $balance = $inc->income_amount - $paid->total_paid;
                                                    $c++;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td><a href="<?php echo site_url('income/income_details/' . $inc->income_id); ?>"><?php echo $inc->reference; ?></a></td>
                                                        <td><?php echo $inc->account_name; ?></td>
                                                        <td><?php echo number_format($inc->income_amount, 2); ?></td>
                                                        <td><?php echo number_format($balance, 2); ?></td>
                                                        <td><?php echo $inc->customer_name; ?></td>
                                                        <td><?php echo $inc->income_date; ?></td>
                                                        <td><?php echo $inc->status_name; ?></td>
                                                        <td><?php echo $inc->department_name; ?></td>
                                                        <td class=" last">
                                                            <a href="<?php echo site_url('income/income_details/' . $inc->income_id); ?>" class="btn btn-rgs btn-xs"><span class="fa fa-eye"></span></a>
                                                            <?php if ($CI->permissions('income_delete')) : ?>
                                                                <a href="<?php echo site_url('income/delete/' . $inc->income_id); ?>" class="btn btn-rgd btn-xs"><span class="fa fa-trash"></span></a>
                                                            <?php endif; ?>
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