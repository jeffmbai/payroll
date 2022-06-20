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

                <?php if ($CI->permissions('budget_add')) : ?>
                    <div class="col-md-4 col-sm-12">
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
                                <form action="<?php echo site_url('budgeting/add_budget'); ?>" method="post">

                                    <div class="row">

                                        <div class="col-md-12 col-sm-12">
                                            <label for="">Budget Name <span class="text text-danger">*</span> </label>
                                            <input type="text" name="budget_name" class="form-control" required />
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <label for="">Person Responsible</label>
                                            <select name="staff_id" class="select2 form-control">
                                                <option value=""> ~Select Staff~ </option>
                                                <?php
                                                $staffs = $this->db->where('active', 1)->get('employees')->result();
                                                foreach ($staffs as $staff) {
                                                ?>
                                                    <option value="<?= $staff->employee_id; ?>"> <?= $staff->last_name . ' ' . $staff->second_name . ' ' . $staff->first_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-md-12 col-sm-12">
                                            <label for="">Budget Year <span class="text text-danger">*</span> </label>
                                            <select class="form-control" name="fiscal_year_id" required>
                                                <?php
                                                foreach ($fiscal_years as $fy) {
                                                ?>
                                                    <option value="<?= $fy->fiscal_year_id ?>" <?php if ($fy->fiscal_year_id == $_SESSION['fiscalyearid']) echo 'selected'; ?>> <?= $fy->fiscal_year_name ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <label for="">Account Affected <span class="text text-danger">*</span> </label>
                                            <select class="select2 form-control" name="account_id" required>
                                                <?php
                                                foreach ($accounts as $acc) {
                                                ?>
                                                    <option value="<?= $acc->account_id ?>"> <?= $acc->account_name ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-md-12 col-sm-12">
                                            <label for="">Quarter <span class="text text-danger">*</span> </label>
                                            <select class="form-control" name="term_id" required>
                                                <option value="1" <?php if ($_SESSION['termid'] == 1) echo 'selected'; ?>>First quarter</option>
                                                <option value="2" <?php if ($_SESSION['termid'] == 2) echo 'selected'; ?>>Second quarter</option>
                                                <option value="3" <?php if ($_SESSION['termid'] == 3) echo 'selected'; ?>>Third quarter</option>
                                                <option value="4" <?php if ($_SESSION['termid'] == 4) echo 'selected'; ?>>Forth quarter</option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <label for="">Budget Amount <span class="text text-danger">*</span> </label>
                                            <input type="text" name="budget_amount" class="form-control" required />
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <label> Active </label>
                                            <p>
                                                <input type="checkbox" class="flat" value="1" name="active">
                                            </p>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <label for="">Narrative </label>
                                            <textarea name="narrative" class="form-control"></textarea>
                                        </div>

                                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                            <button type="Submit" class="btn btn-primary">Save</button>
                                        </div>

                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>


                <?php if ($CI->permissions('budget_view')) : ?>
                    <div class="col-md-8 col-sm-12">
                        <div class="card card-outline card-warning">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Fiscal Year</label>
                                        <select id="fiscalyearid" required class="form-control">
                                            <?php
                                            foreach ($fiscal_years as $fy) {
                                            ?>
                                                <option value="<?= $fy->fiscal_year_id ?>" <?php if ($fy->fiscal_year_id == $_SESSION['fsid']) echo 'selected'; ?>> <?= $fy->fiscal_year_name ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Quarter </label>
                                        <select id="termid" required class="form-control">
                                            <option value="1" <?php if ($_SESSION['tmid'] == 1) echo 'selected'; ?>>First quarter</option>
                                            <option value="2" <?php if ($_SESSION['tmid'] == 2) echo 'selected'; ?>>Second quarter</option>
                                            <option value="3" <?php if ($_SESSION['tmid'] == 3) echo 'selected'; ?>>Third quarter</option>
                                            <option value="4" <?php if ($_SESSION['tmid'] == 4) echo 'selected'; ?>>Forth quarter</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <p style="margin-top: 31px;">
                                            <button type="button" onclick="get_budgets()" id="filterBtn" class="btn btn-primary" title="Filter Budget">Filter <i class="fa fa-filter"></i></button>
                                            <button type="button" onclick="window.open('<?php echo site_url('budgeting/print') ?>','Budget Print','width=900')" class="btn btn-primary" title="Print Budget">Print <i class="fa fa-print"></i></button>
                                        </p>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="example1" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Name</th>
                                                    <th>Year</th>
                                                    <th>Quarter</th>
                                                    <th>Account</th>
                                                    <th>Monitor</th>
                                                    <th>Budget Amount</th>
                                                    <th>Practical Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                foreach ($budgets as $dt) {
                                                    $total_dr = $this->db->where("account_id = '$dt->account_id' AND voucher_type = 'dr' AND term_id = '$_SESSION[tmid]' AND fiscal_year_id = '$_SESSION[fsid]' ")->select_sum('voucher_amount')->get('vouchers')->row('voucher_amount');
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <a href="#" onclick="window.open('<?php echo site_url('budgeting/budget_journals/' . $dt->budget_id); ?>','Budget Journals','width=900')"> <?= $dt->budget_name ?> </a>
                                                        </td>
                                                        <td> <?= $dt->fiscal_year_name ?> </td>
                                                        <td> <?= $dt->term_id ?> </td>
                                                        <td> <?= $dt->account_name ?> </td>
                                                        <td> <?= $dt->first_name . ' ' . $dt->last_name ?> </td>
                                                        <td> <?= number_format($dt->budget_amount, 2) ?> </td>
                                                        <td>
                                                            <?php
                                                            if ($dt->budget_amount > $total_dr) echo '<i class="text-success"> ' . number_format($total_dr, 2) . '</i>';
                                                            else echo '<i class="text-danger fa fa-warning"> ' . number_format($total_dr, 2) . '</i>';
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($CI->permissions('budget_edit')) { ?>
                                                                <a href="#" onclick="get_budget(<?= $dt->budget_id ?>)" class="btn btn-xs btn-rgp"> <i class="fa fa-edit"></i> </a>
                                                            <?php } ?>
                                                            <?php if ($CI->permissions('budget_delete')) { ?>
                                                                <a href="#" onclick="delete_budget(<?= $dt->budget_id ?>)" class="btn btn-xs btn-rgd"> <i class="fa fa-trash"></i> </a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
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



<div id="editBudget" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body" id="editData">

            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    function delete_budget(e) {
        swal("Are you sure you want to delete budget?", {
                buttons: {
                    no: {
                        text: "No",
                        value: "no",
                    },
                    yes: {
                        text: "Yes",
                        value: "yes",
                    }
                },
            })
            .then((value) => {
                switch (value) {

                    case "no":
                        return;
                        break;

                    case "yes":
                        $.ajax({
                            url: '<?php echo site_url('budgeting/delete_budget'); ?>',
                            type: 'POST',
                            // processData: false,
                            // contentType: false,
                            data: {
                                data: e
                            },
                            // data: data,
                            success: function(output) {
                                console.log(output);
                                var obj = JSON.parse(output);
                                console.log("resp: " + obj.resp);
                                console.log("message: " + obj.message);
                                if (obj.resp == 1) {
                                    swal({
                                        icon: 'success',
                                        title: 'Success',
                                        text: obj.message
                                    });
                                    setTimeout(function() {
                                        window.location.reload();
                                    }, 3000);
                                } else {
                                    swal({
                                        icon: 'warning',
                                        title: 'Failed',
                                        text: obj.message
                                    });
                                }
                            }
                        });
                        break;

                    default:
                        swal("Got away safely!");
                }
            });
    }

    function get_budget(e) {
        $.ajax({
            url: '<?php echo site_url('budgeting/get_budget'); ?>',
            type: 'POST',
            cache: false,
            data: 'data=' + e,
            success: function(resp) {
                $('#editData').html('').html(resp);
                $('#editBudget').modal('toggle');
            }
        });
    }

    function get_budgets(e) {
        var fsid = $('#fiscalyearid').val();
        var tmid = $('#termid').val();

        $('#filterBtn').html('').html('Processing<i class="fa fa-spinner"></i>');

        $.ajax({
            url: '<?php echo site_url('budgeting/get_budgets'); ?>',
            type: 'POST',
            cache: false,
            data: {
                fsid: fsid,
                tmid: tmid
            },
            success: function(resp) {
                console.log(resp);
                setTimeout(function() {
                    window.location.reload();
                }, 3000);
            }
        });
    }
</script>