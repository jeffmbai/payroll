<?php
foreach ($this_user as $user) {
    $name = $user->firstname . ' ' . $user->secondname . ' ' . $user->lastname;
    $id_passport = $user->id_passport;
    $email = $user->email;
    $phone = $user->phone;
    $gender = $user->gender;
    $dob = $user->dob;
    $address = $user->address;
    $role_name = $user->role_name;
    $profile_picture = $user->profile_picture;
}
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
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6">
                                        <img src="<?php echo base_url('assets/images/profile/' . $profile_picture); ?>" height="100px" />
                                    </div>
                                    <div class="col-md-3 col-xs-6" style="border-left: 5px solid #017870;">
                                        Name: <?php echo $name; ?> <br />
                                        Phone: <?php echo $phone; ?> <br />
                                        Email: <?php echo $email; ?> <br />
                                        Address: <?php echo $address; ?>
                                    </div>
                                    <div class="col-md-3 col-xs-6" style="border-left: 5px solid orange;">
                                        <h4><b>Balances <small>(Kes)</small></b></h4>
                                        <?php
                                        $deno_yote = 0;
                                        foreach ($user_debt as $userD) {
                                            $deno_yote += $userD->paying_balance;
                                            echo '
                                                    <div class="">
                                                        <strong>' . $userD->bill_no . '</strong>
                                                        <span class="pull-right text text-danger"><b>' . number_format($userD->paying_balance, 2) . '</b></span>
                                                    </div>
                                                ';
                                        }
                                        ?>

                                        <div class="">
                                            <strong>Total Balance</strong>
                                            <span class="pull-right text text-black"><b> <u> <?= number_format($deno_yote, 2) ?> </u> </b></span>
                                        </div>

                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Orders Table</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="example1" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Bill No</th>
                                                    <th>Date</th>
                                                    <th>T.Type</th>
                                                    <th>Net Amount</th>
                                                    <th>Paid Amount</th>
                                                    <th>Balance</th>
                                                    <th>Payment Status</th>
                                                    <th>Order By</th>
                                                    <th class=" no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>

                                            <tbody id="orders">
                                                <?php
                                                $c = 0;
                                                foreach ($user_orders as $dt) {
                                                    $c++;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td><?= $dt->bill_no; ?></td>
                                                        <td><?= date('d/m/Y', strtotime($dt->date_time)); ?></td>
                                                        <td><?= $dt->transaction_type_name; ?></td>
                                                        <td><?= number_format($dt->net_amount, 2); ?></td>
                                                        <td><?= number_format($dt->paid_amount, 2); ?></td>
                                                        <td><?= number_format($dt->paying_balance, 2); ?></td>
                                                        <td class="a-right a-right ">
                                                            <?php
                                                            if ($dt->paid_status == 1) echo "Paid";
                                                            elseif ($dt->paid_status == 0) echo "Pending";
                                                            elseif ($dt->paid_status == 2) echo "Cancelled";
                                                            ?>
                                                        </td>
                                                        <td><?= $dt->firstname.' '.$dt->secondname ?></td>
                                                        <td class=" last">
                                                            <a href="<?php echo site_url('business/sale_profile/' . $dt->order_id); ?>"  title="View Sale" class="btn btn-xs btn-rgp"><span class="fa fa-eye"></span></a>
                                                            <a href="<?php echo site_url('delete/order/' . $dt->order_id); ?>" title="Delete Sale" class="btn btn-xs btn-rgd"><span class="fa fa-trash"></span></a>
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