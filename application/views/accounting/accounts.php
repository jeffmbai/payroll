<?php
$exceptions = array(300001, 600003);
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

                <?php if ($CI->permissions('accounts_add')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Register Account </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('accounting/add_account'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <label for="">Account Type <span class="text text-danger">*</span> </label>
                                            <select name="account_type_id" style="width: 100%;" onchange="get_subaccounts(this)" class="select2 form-control" required>
                                                <option>~Select account type~</option>
                                                <?php
                                                $accounttype = $this->db->get('account_types')->result();
                                                foreach ($accounttype as $acct) {
                                                ?>
                                                    <option value="<?php echo $acct->account_type_id; ?>"> <?php echo $acct->account_type_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <label for="">Sub-Account Type <i class="text-danger">*</i></label>
                                            <select name="subaccount_type_id" style="width: 100%;" id="subaccount_type_id" onchange="" class="select2 form-control">
                                                <option>~Select account type~</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <label for="">Account Code/Number<span class="text text-danger">*</span> </label>
                                            <input type="text" name="account_code" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <label for="">Account Name <span class="text text-danger">*</span> </label>
                                            <input type="text" name="account_name" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <label for="">Opening Balance <span class="text text-danger">*</span> </label>
                                            <input type="number" step="0.01" name="opening_balance" class="form-control" required />
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12 studs">
                                            <label for="">Account category </label>
                                            <select name="other_category" style="width: 100%;" id="other_category" class="select2 form-control">
                                                <option value="">~Select option~</option>
                                                <option value="CA">Current Assets</option>
                                                <option value="NCA">Non-current Assets</option>
                                                <option value="CL">Current Liabities</option>
                                                <option value="NCL">Non-current Liabities</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <label for="">Narrative </label>
                                            <textarea name="narrative" id="" class="form-control"></textarea>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <label> Is Key Account <i class="text-danger">*</i></label>
                                            <p>
                                                <label>Yes <input type="radio" value="1" name="is_key"></label>
                                                <label>No <input type="radio" value="0" checked name="is_key"></label>
                                            </p>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <label> Active </label>
                                            <p>
                                                <input type="checkbox" value="true" name="active">
                                            </p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                            <button type="Submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

                <?php if ($CI->permissions('accounts_view')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="example1" class="table table-bordered table-striped table-condensed">
                                            <thead>
                                                <tr class="headings">
                                                    <th></th>
                                                    <th>Acc. Name</th>
                                                    <th>Acc. Code</th>
                                                    <th>Sub-Acc. Type Name</th>
                                                    <th>Acc. Type Name</th>
                                                    <th>Opening Bal.</th>
                                                    <th>Active</th>
                                                    <th>Created By</th>
                                                    <th>Narrative</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $accounts = $this->db->where("is_studentaccount <> 1")->get('vw_accounts')->result();
                                                $c = 0;
                                                foreach ($accounts as $acc) {
                                                    $c++;
                                                ?>
                                                    <tr>
                                                        <td><?= $c; ?></td>
                                                        <td><?= $acc->account_name; ?></td>
                                                        <td><a style="color: blue" href="<?php echo site_url('accounting/account_ledger/' . $acc->account_code) ?>"> <?= $acc->account_code; ?> </a></td>
                                                        <td><?= $acc->subaccount_type_name; ?></td>
                                                        <td><?= $acc->account_type_name; ?></td>
                                                        <td><?= number_format($acc->opening_balance, 2); ?></td>
                                                        <td><?php if ($acc->active == 1) echo '<i class="text-green fa fa-check"></i>';
                                                            else echo '<i class="text-danger fa fa-close"></i>'; ?></td>
                                                        <td><?= $acc->firstname . ' ' . $acc->secondname; ?></td>
                                                        <td><?= $acc->narrative; ?></td>
                                                        <td>
                                                            <?php if ($CI->permissions('accounts_edit')) : ?>
                                                                <button type="button" onclick="get_account(<?= $acc->account_id ?>)" class="btn btn-xs btn-rgp"> <i class="fa fa-edit"></i> </button>
                                                            <?php endif; ?>
                                                            <?php if ($CI->permissions('accounts_delete') && $acc->is_key == 0) : ?>
                                                                <?php if (!in_array($acc->account_code, $exceptions)) : ?>
                                                                    <button type="button" onclick="delete_account(<?= $acc->account_id ?>)" class="btn btn-xs btn-rgd"> <i class="fa fa-trash"></i> </button>
                                                                <?php endif; ?>
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


<?php #if($CI->permissions('accounts_edit')):
?>
<!-- Modals Start -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div id="editData"></div>
            </div>
        </div>
    </div>
</div>
<?php #endif;
?>


<!-- Modals End -->




<script>
    function get_account(e) {

        $.post('get_account', {
            data: e
        }, function(result) {
            $("#editData").html('').html(result);
            $('#editModal').modal('toggle');
        });
    }

    function delete_account(e) {
        swal({
                title: "Do you want to delete this account?",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willContinue) => {
                if (willContinue) {
                    $.post('toa_account', {
                        data: e
                    }, function(result) {
                        if (result.trim() == 'success') {
                            location.reload();
                        } else {
                            swal("Sorry! Something went wrong");
                        }
                    });
                } else {
                    swal("This update process has been cancelled. Bye!");
                    return;
                }
            });
    }

    function get_subaccounts(e) {
        var id = e.value;
        $.post('get_subaccount_types', {
            data: id
        }, function(result) {
            $("#subaccount_type_id").html('').html(result);
        });
    }

    function get_subaccounts2(e) {
        var id = e.value;
        $.post('get_subaccount_types', {
            data: id
        }, function(result) {
            $("#subaccount_type_id2").html('').html(result);
        });
    }

    $('.is_studentaccount1').click(function() {
        if ($('.is_studentaccount1').is(':checked')) {
            console.log('Checked');
            $(".studs").css("display", "block");
        }
    });
    $('.is_studentaccount2').click(function() {
        if ($('.is_studentaccount1').is(':checked')) {
            console.log('Checked');
            $(".studs").css("display", "block");
        } else {
            console.log('Not Checked');
            $(".studs").css("display", "none");
        }
    });
</script>