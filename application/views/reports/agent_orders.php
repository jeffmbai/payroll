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
$userid = $this->uri->segment(3);

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
                        <?= $page ?> | <?= $role_name; ?> </h1>
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

            <form action="<?= site_url('reports/agent_orders/' . $userid) ?>" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-primary"><i class="fa fa-info-circle"></i> Filter by dates to get desired reports <i class="fa fa-thumbs-o-up"></i></p>
                    </div>
                    <div class="col-md-3">
                        <label>From Date</label>
                        <input type="date" name="from_date" value="<?= $from_date ?>" required />
                    </div>
                    <div class="col-md-3">
                        <label>To Date</label>
                        <input type="date" name="to_date" value="<?= $to_date ?>" required />
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-sm btn-primary">Filter <i class="fa fa-filter"></i></button>
                    </div>
                </div>
            </form>

            <hr />

            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2 col-xs-6">
                                    <img src="<?php echo base_url('assets/images/profile/' . $profile_picture); ?>" height="100px" />
                                </div>
                                <div class="col-md-3 col-xs-6" style="border-left: 5px solid #017870;">
                                    Name: <?= $name; ?> <br />
                                    Phone: <?= $phone; ?> <br />
                                    Email: <?= $email; ?> <br />
                                    Gender: <?= $gender; ?> <br />
                                    Date of birth: <?= $dob; ?> <br />
                                    Address: <?= $address; ?>
                                </div>
                                <div class="col-md-3 col-xs-6" style="border-left: 5px solid black;">
                                    <h4><b>Report Period</b></h4>
                                    <p>
                                        <u> <?= date('d,M Y', strtotime($from_date)) . ' to ' . date('d,M Y', strtotime($to_date)) ?></u>
                                    </p>

                                    <h4><b>Sales <small>(Paid/Kes)</small></b></h4>
                                    <div class="">
                                        <strong>Total Sales</strong>
                                        <span class="pull-right text text-black"><b><u id="total_sales"></u></b></span>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6" style="border-left: 5px solid orange;">
                                    <h4><b>Balances <small>(Kes)</small></b></h4>

                                    <?php
                                    $total_balance = 0;
                                    foreach ($agent_debt as $userD) {
                                        $total_balance += $userD->paying_balance;
                                        echo '
                                        <div class="">
                                            <strong><a href="' . site_url('business/sale_profile/' . $userD->order_id) . '" >' . $userD->bill_no . '</a></strong>
                                            <span class="pull-right text text-danger"><b>' . number_format($userD->paying_balance, 2) . '</b></span>
                                        </div>
                                    ';
                                    }
                                    ?>

                                    <div class="">
                                        <strong>Total Sale Balances</strong>
                                        <span class="pull-right text text-black"><b><u> <?= number_format($total_balance, 2) ?> </u></b></span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>

                </div>

                <?php if ($CI->permissions('general_view')) : ?>
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
                                    <div class="col-md-12 table-responsible">
                                        <table id="example1" class="table table-striped responsive-utilities">
                                            <thead>
                                                <tr>
                                                    <th>Bill No</th>
                                                    <th>Date</th>
                                                    <th>T.Type</th>
                                                    <th>Net Amount</th>
                                                    <th>Paid Amount</th>
                                                    <th>Balance</th>
                                                    <th>Payment Status</th>
                                                    <th class=" no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>

                                            <tbody id="orders">
                                                <?php
                                                $c = $tt_sale = $tt_paid = $tt_balance = 0;
                                                foreach ($agent_orders as $dt) {
                                                    #if($dt->transaction_type_id == 2 || $dt->transaction_type_id == 4) continue;
                                                    $c++;

                                                    $tt_sale += $dt->net_amount;
                                                    $tt_paid += $dt->total_paid;
                                                    $tt_balance += $dt->paying_balance;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td><a href="<?= site_url('business/sale_profile/' . $dt->order_id) ?>"> <?= $dt->bill_no; ?> </a></td>
                                                        <td><?= $dt->date_time; ?></td>
                                                        <td><?= $dt->transaction_type_name; ?></td>
                                                        <td><?= number_format($dt->net_amount, 2); ?></td>
                                                        <td><?= number_format($dt->total_paid, 2); ?></td>
                                                        <td><?= number_format($dt->paying_balance, 2); ?></td>
                                                        <td class="a-right a-right ">
                                                            <?php
                                                            if ($dt->paid_status == 1) echo "Paid";
                                                            elseif ($dt->paid_status == 0) echo "Pending";
                                                            elseif ($dt->paid_status == 2) echo "Cancelled";
                                                            ?>
                                                        </td>
                                                        <td class=" last">
                                                            <a title="View Order" href="<?= site_url('business/sale_profile/' . $dt->order_id) ?>" class="btn btn-xs btn-rgp"><span class="fa fa-eye"></span></a>
                                                            <a title="Delete Order" href="<?php #echo site_url('delete/order/'.$dt->order_id);
                                                                                            ?>" class="btn btn-xs btn-rgd"><span class="fa fa-trash"></span></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <th colspan="3">TOTAL</th>
                                                    <th><?= number_format($tt_sale, 2) ?></th>
                                                    <th><?= number_format($tt_paid, 2) ?></th>
                                                    <th><?= number_format($tt_balance, 2) ?></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>

                                        </table>

                                        <script>
                                            $(function() {
                                                $('#total_sales').html('').html('<?php echo number_format($tt_paid,2);?>');
                                            });
                                        </script>

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