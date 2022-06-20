<style>
    #running_bal {
        font-weight: 700;
        font-size: 20px;
        color: #067972;
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
                    $code = $id = $this->uri->segment(3);
                    $account = $this->db->where('account_code', $code)->get('vw_accounts')->row();
                    $allow = array(1, 3, 4);
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
                                        <span class="pull-left" id="running_bal"></span>
                                        <a title="Download Excel?" href="<?php echo site_url('accounting/account_statement_xls/' . $code); ?>" class="btn btn-rgs pull-right m-1"><i class="fa fa-file-excel-o"></i></a>
                                        <a title="Download PDF?" href="<?php echo site_url('accounting/account_statement_pdf/' . $code); ?>" target="_blank" class="btn btn-rgd pull-right m-1"><i class="fa fa-file-pdf-o"></i></a>
                                        <button title="Fast Print Statement?" type="button" onclick="window.open('<?php echo site_url('accounting/account_statement_popup/' . $code); ?>', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,,width=1000,height=800')" class="btn btn-rgp pull-right m-1"><i class="fa fa-fax"></i></button>
                                        <table id="" class="table table-bordered table-striped table-condensed jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th style="width: 100px">Date</th>
                                                    <th>Account Affected</th>
                                                    <th>Description</th>
                                                    <th>IN</th>
                                                    <th>OUT</th>
                                                    <th>Balance</th>

                                                    <?php if (in_array($_SESSION['userid'], $allow)) : ?>
                                                        <th>#</th>
                                                    <?php endif; ?>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php

                                                $crdrs = $this->db->select('a.*, b.account_code, b.account_name')
                                                    ->from('vouchers as a')
                                                    ->join('accounts as b', 'a.account_id = b.account_id')
                                                    ->where("a.account_id = '$account->account_id'")
                                                    ->order_by('a.transaction_date', 'asc')
                                                    // ->order_by('a.transaction_date', 'desc')
                                                    ->get()->result();
                                                $total_cr = $total_dr = 0;
                                                // $difference = $account->opening_balance;
                                                $difference = 0;

                                                foreach ($crdrs as $dt) {
                                                    $cr = $dr  = 0;
                                                    $refs = $narrs = null;
                                                    if ($dt->voucher_type == 'dr') $dr = $dt->voucher_amount;
                                                    else $dr = 0;
                                                    if ($dt->voucher_type == 'cr') $cr = $dt->voucher_amount;
                                                    else $cr = 0;
                                                    $total_cr += $cr;
                                                    $total_dr += $dr;
                                                    $difference += $dr - $cr;
                                                    $account_name = null;
                                                    $student_name = null;

                                                    if ($cr == 0 && $dr == 0) continue;

                                                    if ($dt->table_name == 'payments') {
                                                        $res1 = $this->db->where('payment_id', $dt->table_id)->get($dt->table_name)->row();
                                                        if ($res1) {
                                                            $refs = $res1->reference;
                                                            $narrs = $res1->narrative;
                                                            // $this->db->where(" table_id = '$dt->table_id' AND table_name = 'payments' ")->update('vouchers',array('transaction_date'=>$res1->payment_date));
                                                        }
                                                    } elseif ($dt->table_name == 'income_payments') {
                                                        $res2 = $this->db->where('income_payment_id', $dt->table_id)->get($dt->table_name)->row();
                                                        if ($res2) {
                                                            $refs = $res2->reference;
                                                            $narrs = $res2->narrative;
                                                            // $this->db->where(" table_id = '$dt->table_id' AND table_name = '$dt->table_name' ")->update('vouchers',array('transaction_date'=>$res1->payment_date));
                                                        }
                                                    } elseif ($dt->account_type_id == 4 && $dt->subaccount_type_id == 4) {
                                                        $account = $this->db->select('a.*, b.account_name')->from('vouchers as a')
                                                            ->join('accounts as b', 'a.account_id = b.account_id')
                                                            ->where("a.account_type_id = 1 AND a.voucher_code = '$dt->voucher_code' ")
                                                            ->get()->row();

                                                        if (isset($account->account_name)) $account_name = $account->account_name;
                                                    }

                                                    if ($dt->account_code == '500004' && $dt->table_name == 'orders') { // uniform sales2
                                                        $account = $this->db->select('a.account_id, b.account_name')->from('vouchers as a')->join('accounts as b', 'a.account_id = b.account_id')->where("a.voucher_code = '$dt->voucher_code' AND a.account_type_id = '1'")->get()->row();
                                                        if (isset($account->account_name)) $account_name = $account->account_name;
                                                    }
                                                    if ($dt->account_code == 'INTV01' && $dt->table_name == 'income_payments') { // interview
                                                        $account = $this->db->select('a.account_id, b.account_name')->from('vouchers as a')->join('accounts as b', 'a.account_id = b.account_id')->where("a.voucher_code = '$dt->voucher_code' AND a.account_type_id = '1'")->get()->row();
                                                        if (isset($account->account_name)) $account_name = $account->account_name;
                                                    }
                                                    if ($dt->account_code == '500003' && $dt->table_name == 'income_payments') { // bread sales
                                                        $account = $this->db->select('a.account_id, b.account_name')->from('vouchers as a')->join('accounts as b', 'a.account_id = b.account_id')->where("a.voucher_code = '$dt->voucher_code' AND a.account_type_id = '1'")->get()->row();
                                                        if (isset($account->account_name)) $account_name = $account->account_name;
                                                    }
                                                    if ($dt->account_code == '500002' && $dt->table_name == 'income_payments') { // bus hire
                                                        $account = $this->db->select('a.account_id, b.account_name')->from('vouchers as a')->join('accounts as b', 'a.account_id = b.account_id')->where("a.voucher_code = '$dt->voucher_code' AND a.account_type_id = '1'")->get()->row();
                                                        if (isset($account->account_name)) $account_name = $account->account_name;
                                                    }
                                                    if ($dt->account_type_id == 1 && $dt->table_name == 'orders') { // uniform_sales
                                                        // $get
                                                        
                                                    }

                                                ?>
                                                    <tr>
                                                        <td><?= date('d-m-Y', strtotime($dt->transaction_date)); ?></td>
                                                        <td><?= $dt->account_name; ?></td>
                                                        <td><?= $dt->narrative . ' ' . $narrs . ' ' . $refs . ' ~ ' . $student_name . ' ' . $account_name . ' ' . $dt->voucher_code; ?></td>
                                                        <td><?= number_format($dr, 2); ?></td>
                                                        <td><?= number_format($cr, 2); ?></td>
                                                        <td><?= number_format($difference, 2); ?></td>

                                                        <?php if (in_array($_SESSION['userid'], $allow)) : ?>
                                                            <td>
                                                                <a href="#" onclick="delete_voucher(<?= $dt->voucher_id ?>)"><i class="text-danger fa fa-trash"></i></a>
                                                            </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                <?php
                                                }

                                                ?>
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <th colspan="3"></th>
                                                    <th><?= 'Total IN: KES ' . number_format($total_dr, 2) ?></th>
                                                    <th><?= 'Total OUT: KES ' . number_format($total_cr, 2) ?></th>
                                                    <th><?= 'Available Bal: KES ' . number_format($difference, 2) ?></th>

                                                    <?php if (in_array($_SESSION['userid'], $allow)) : ?>
                                                        <th></th>
                                                    <?php endif; ?>
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

<script>
    $(function() {
        $("#running_bal").html('<?php echo 'Total In: KES' . number_format($total_dr, 2) . ' | Total Out: KES' . number_format($total_cr, 2) . ' | <span style="color: #9E0004"> Bal: KES ' . number_format($difference, 2) . ' </span> '; ?>');
    });
</script>


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

    function delete_voucher(e) {
        swal({
                title: "Do you really want to delete this voucher?",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willContinue) => {
                if (willContinue) {
                    $.post('<?php echo site_url('accounting/toa_voucher') ?>', {
                        data: e
                    }, function(result) {
                        console.log(result);
                        if (result.trim() == 'success') {
                            location.reload();
                        } else {
                            swal("Sorry! Something went wrong");
                        }
                    });
                } else {
                    swal("This delete process has been cancelled. Bye!");
                    return;
                }
            });
    }
</script>