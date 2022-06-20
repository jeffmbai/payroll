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
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="<?php echo site_url('accounting/account_balances_pdf'); ?>" class="btn btn-rgd btn-sm pull-right" title="Print to pdf?"><i class="fa fa-file-pdf-o"></i></a>
                                        <table id="example1" class="table table-bordered table-striped table-condensed jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>#</th>
                                                    <th>Acc. Name</th>
                                                    <th>Acc. Code/Number</th>
                                                    <!-- <th>Sub-Acc. Type Name</th>
                                        <th>Acc. Type Name</th> -->
                                                    <th>Current Balance</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $accounts = $this->db->get('vw_accounts')->result();
                                                $c = 0;
                                                foreach ($accounts as $acc) {
                                                    $debit = $this->db->where("account_id = '$acc->account_id' AND voucher_type = 'dr' ")->select_sum('voucher_amount', 'total')->get('vouchers')->row();
                                                    $credit = $this->db->where("account_id = '$acc->account_id'  AND voucher_type = 'cr'  ")->select_sum('voucher_amount', 'credo')->get('vouchers')->row();
                                                    // $account_balance = number_format(($acc->opening_balance + $debit->total) - $credit->credo, 2);
                                                    $account_balance = number_format($debit->total - $credit->credo, 2);
                                                    $c++;
                                                ?>
                                                    <tr>
                                                        <td><?= $c; ?></td>
                                                        <td><?= $acc->account_name; ?></td>
                                                        <td><a href="<?php echo site_url('accounting/account_ledger/' . $acc->account_code); ?>"><?= $acc->account_code; ?></a></td>
                                                        <!-- <td><?= $acc->subaccount_type_name; ?></td>
                                            <td><?= $acc->account_type_name; ?></td> -->
                                                        <td><?= $account_balance; ?></td>
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
    <div class="modal-dialog">
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