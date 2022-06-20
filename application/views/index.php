<?php
$CI = &get_instance();

$date1 = date_create(date('Y-m-d'));
$date2 = date_create($CI->check_days());
$diff = date_diff($date1, $date2);
$days_left = $diff->format("%R%a days");
?>

<?php
//$t_sales = $t_purchases = $profit = 0;

//declarations
$today = date('Y-m-d');
if (isset($_SESSION['filterdate'])) {
    $today = $_SESSION['filterdate'];
}
//get the data queries

$supplier_balances = $this->db->select_sum('paying_balance')
    ->where('transaction_type_id IN (2,4)')
    ->get('orders')->row('paying_balance');


#fast moving products
//$qry = 'SELECT a.item_id, SUM(a.qty) AS tt_qty, COUNT(a.item_id) AS tt_count, b.item_name, b.barcode 
	        //FROM order_items AS a 
                //JOIN items AS b ON a.item_id = b.item_id 
                //GROUP BY a.item_id 
                //ORDER BY tt_qty DESC LIMIT 5';
//$prods = $this->db->query($qry)->result();

#get profit
//$get_profit = $this->db->query("SELECT
                    //SUM(amount -(a.buying_price * a.qty)) AS profit,
                    //b.date_time, b.paid_amount, b.paying_balance
                    //FROM
                        //order_items as a
                    //JOIN 
                      //  orders as b ON b.order_id = a.order_id
                    //WHERE
                        //a.transaction_type_id IN(1, 3) AND b.date_time = '$today' ")->row();
//$profit = $get_profit->profit;

//$outbox = $this->db->where('sent', 0)->get('sms')->num_rows();

?>

<style>
    .btn-apk {
        color: #fff !important;
        font-weight: bold !important;
        font-size: 15px !important;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo $page; ?></h1>
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
                <div class="col-md-12">
                    <?php
                    if (isset($_SESSION['alert'])) {
                        echo $_SESSION['alert'];
                        unset($_SESSION['alert']);
                    }
                    ?>
                </div>
            </div>

            <?php if ($_SESSION['userid'] == 1) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <button class="btn btn-app" type="button" data-toggle="modal" data-target="#period">
                                <i class="fa fa-calendar" style="color: #C13434;"></i> Period
                            </button>
                            <span class="pull-right">
                                Expiry date: <?php echo $CI->check_days(); ?> <br />
                                <?php echo $days_left; ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Tiles Begin -->
            <div class="row">

                <?php if ($CI->permissions('users_view')) : ?>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">All Staff</span>
                                <span class="info-box-number"><?= '0' . $users ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                <?php endif; ?>
                <!-- /.col -->

                <?php if ($CI->permissions('users_view')) : ?>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-money-bill-wave"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Paid</span>
                                <span class="info-box-number text-danger"><u><?= number_format($supplier_balances); ?></u></span>
                            </div>
                            <!-- /.info-box-content-->
                        </div>
                        <!-- /.info-box-->
                    </div>
                <!--/.col -->
                    
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-money-check"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Allowances</span>
                            <span class="info-box-number text-danger"><u><?= number_format($supplier_balances); ?></u></span>
                        </div>
                        <!-- /.info-box-content-->
                    </div>
                    <!-- /.info-box-->
                </div>
                <!--/.col -->

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-money-check-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"> Total NHIF</span>
                            <span class="info-box-number text-danger"><u><?= number_format($supplier_balances); ?></u></span>
                        </div>
                        <!-- /.info-box-content-->
                    </div>
                    <!-- /.info-box-->
                </div>
                <!--/.col -->

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-dollar"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"> Total NSSF </span>
                            <span class="info-box-number text-danger"><u><?= number_format($supplier_balances); ?></u></span>
                        </div>
                        <!-- /.info-box-content-->
                    </div>
                    <!-- /.info-box-->
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-money-bill-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total PAYE</span>
                            <span class="info-box-number text-danger"><u><?= number_format($supplier_balances); ?></u></span>
                        </div>
                        <!-- /.info-box-content-->
                    </div>
                    <!-- /.info-box-->
                </div>
                <!--/.col -->
                <!--/.col -->
                <?php endif; ?>

                
                <!--sms
                <?php if ($CI->permissions('bookings_view')) : ?>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-orange elevation-1"><i class="fa fa-send-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">SMS<small>(Outbox)</small></span>
                                <span class="info-box-number"><?= $outbox ?></span>
                            </div>
                            <!-- /.info-box-content 
                        </div>
                        <!-- /.info-box 
                    </div>-->
                <?php endif; ?>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
                

                <!--supplier balances
                <?php if ($CI->permissions('payments_view')) : ?>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-money-bill-wave"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Supplier Balances</span>
                                <span class="info-box-number text-danger"><u><?= number_format($supplier_balances); ?></u></span>
                            </div>
                            <!-- /.info-box-content 
                        </div>
                        <!-- /.info-box 
                    </div>
                     /.col -->
                    
                    <!--staff
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-bill-alt"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Stores</span>
                                <span class="info-box-number"><?php echo '0' . $stores; ?></span>
                            </div>
                            <!-- /.info-box-content --
                        </div>
                        <!-- /.info-box --
                    </div>
                    <!-- /.col -->

                <?php endif; ?>

            </div>
            <!-- /.row -->

            <!-- Short Links Begin -->
        
            <!--noticications
                <div class="col-md-6">
                    <div class="card direct-chat direct-chat-warning">
                        <div class="card-header">
                            <h3 class="card-title">Notifications</h3>
                            <div class="card-tools">
                                <span data-toggle="tooltip" title="3 New Messages" class="badge badge-warning"><?php echo count($orgs); ?></span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        //.card-header
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12" style="border: 1px solid; padding: 1px; margin-top: 10px;">
                                    <a class="btn btn-app btn-apk" href="<?php echo site_url('sys/item_stock'); ?>" style="min-width: 80px; height: 50px; margin: 0px; border: 0px; background-color: #26B99A;">
                                        <?php if ($available_items == '' || $available_items == null) echo 0;
                                        else  echo $available_items; ?>
                                    </a>
                                    Available Items
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="border: 1px solid; padding: 1px; margin-top: 10px;">
                                    <a class="btn btn-app btn-apk" href="<?php echo site_url('sys/items'); ?>" style="min-width: 80px; height: 50px; margin: 0px; border: 0px; background-color: #c13434;">
                                        <?= $needs_reorder; ?>
                                    </a>
                                    Needs Reorder
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="border: 1px solid; padding: 1px; margin-top: 10px;">
                                    <a class="btn btn-app btn-apk" href="<?php echo site_url('business/sales'); ?>" style="min-width: 80px; height: 50px; margin: 0px; border: 0px; background-color: #32b2d9;">
                                        <?php echo $pending_orders; ?>
                                    </a>
                                    Pending Orders
                                </div>
                            </div>
                        </div> //.card-body
                    </div>
                </div>
            -->
                <div class="col-md-6">
                    <div class="card direct-chat direct-chat-warning">
                        <div class="card-header">
                            <h3 class="card-title"><?= date('M/Y') ?> account report</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-condensed table-stripped">
                                        <thead>
                                            <tr>
                                                <!-- <td>Type</td> -->
                                                <th>Account</th>
                                                <th>Code</th>
                                                <th class="dr">IN</th>
                                                <th class="cr">OUT</th>
                                                <th>Bal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $accounts = $this->db->select('account_id, account_code, account_name')
                                                                ->from('vw_accounts')
                                                                ->where('is_paymentmode = 1')->get()->result();
                                            $ttcr = $ttdr = $bal = 0;
                                            foreach ($accounts as $aca) {
                                                $tday = date('Y-m-d');
                                                $thismonth = date('m');
                                                $thisyear = date('Y');
                                                $total_dr = $this->db->where("account_code = '$aca->account_code' AND voucher_type = 'dr' AND MONTH(transaction_date) = '$thismonth' AND YEAR(transaction_date) = '$thisyear' ")->select_sum('voucher_amount')->get('vouchers')->row('voucher_amount');
                                                $total_cr = $this->db->where("account_code = '$aca->account_code' AND voucher_type = 'cr' AND MONTH(transaction_date) = '$thismonth' AND YEAR(transaction_date) = '$thisyear' ")->select_sum('voucher_amount')->get('vouchers')->row('voucher_amount');
                                                $ttcr +=  $total_cr;
                                                $ttdr +=  $total_dr;
                                                $bal +=  $total_dr - $total_cr;
                                            ?>
                                                <tr>
                                                    <!-- <td><?= $aca->subaccount_type_name ?></td> -->
                                                    <td><?= $aca->account_name ?></td>
                                                    <td><a href="<?php echo site_url('accounting/account_ledger/' . $aca->account_code); ?>"> <?= $aca->account_code ?> </a></td>
                                                    <td class="dr"><?= number_format($total_dr) ?></td>
                                                    <td class="cr"><?= number_format($total_cr) ?></td>
                                                    <th><?= number_format($total_dr - $total_cr) ?></th>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            <tr>
                                                <th colspan="2">TOTAL</th>
                                                <th class="dr"><u><?= number_format($ttdr) ?></u></th>
                                                <th class="cr"><u><?= number_format($ttcr) ?></u></th>
                                                <th><u><?= number_format($bal) ?></u></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                </div>
                
                <!--top selling
                <div class="col-md-6">

                    <div class="card direct-chat direct-chat-warning">
                        <div class="card-header">
                            <h3 class="card-title">Top 5 fast moving products</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        //.card-header 
                        <div class="card-body">
                            <ul class="todo-list" data-widget="todo-list">
                                <?php
                                foreach ($prods as $prod) {
                                ?>
                                    <li>
                                        <span><?= $prod->item_name . ' [' . $prod->barcode . ']' ?></span>

                                        <div class="tools" style="display: block !important;">
                                            <small class="badge badge-success"><i class="fas fa-sort-amount-up"></i> <?= $prod->tt_qty ?> </small>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>
                                <li>
                                    <span>Todays Sales</span>

                                    <div class="tools" style="display: block !important;">
                                        <small class="badge badge-primary"><i class="fas fa-sort-amount-up"></i> <?= number_format($t_sales, 2) ?> </small>
                                    </div>
                                </li>
                                <li>
                                    <span>Todays Purchases</span>

                                    <div class="tools" style="display: block !important;">
                                        <small class="badge badge-primary"><i class="fas fa-sort-amount-up"></i> <?= number_format($t_purchases, 2) ?> </small>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- /.card-body 
                    </div>
                    -->
                </div>

                <div class="col-md-6">
                    <div class="card direct-chat direct-chat-warning">
                        <div class="card-header">
                            <h3 class="card-title"><?= date('M/Y') ?> account report</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <!-- <td>Type</td> -->
                                                <th>Account</th>
                                                <th>Code</th>
                                                <th class="dr">IN</th>
                                                <th class="cr">OUT</th>
                                                <th>Bal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $accounts = $this->db->select('account_id, account_code, account_name')
                                                ->from('vw_accounts')
                                                ->where('is_paymentmode = 1')->get()->result();
                                            $ttcr = $ttdr = $bal = 0;
                                            foreach ($accounts as $aca) {
                                                $tday = date('Y-m-d');
                                                $thismonth = date('m');
                                                $thisyear = date('Y');
                                                $total_dr = $this->db->where("account_code = '$aca->account_code' AND voucher_type = 'dr' AND MONTH(transaction_date) = '$thismonth' AND YEAR(transaction_date) = '$thisyear' ")->select_sum('voucher_amount')->get('vouchers')->row('voucher_amount');
                                                $total_cr = $this->db->where("account_code = '$aca->account_code' AND voucher_type = 'cr' AND MONTH(transaction_date) = '$thismonth' AND YEAR(transaction_date) = '$thisyear' ")->select_sum('voucher_amount')->get('vouchers')->row('voucher_amount');
                                                $ttcr +=  $total_cr;
                                                $ttdr +=  $total_dr;
                                                $bal +=  $total_dr - $total_cr;
                                            ?>
                                                <tr>
                                                    <!-- <td><?= $aca->subaccount_type_name ?></td> -->
                                                    <td><?= $aca->account_name ?></td>
                                                    <td><a href="<?php echo site_url('accounting/account_ledger/' . $aca->account_code); ?>"> <?= $aca->account_code ?> </a></td>
                                                    <td class="dr"><?= number_format($total_dr) ?></td>
                                                    <td class="cr"><?= number_format($total_cr) ?></td>
                                                    <th><?= number_format($total_dr - $total_cr) ?></th>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            <tr>
                                                <th colspan="2">TOTAL</th>
                                                <th class="dr"><u><?= number_format($ttdr) ?></u></th>
                                                <th class="cr"><u><?= number_format($ttcr) ?></u></th>
                                                <th><u><?= number_format($bal) ?></u></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                </div>

            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->


<!-- Modals Start -->

<div id="pos" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button> -->
                <h4 class="modal-title">POS Mode</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="post" action="<?php echo site_url('submitform/pos_mode'); ?>">
                        <div class="col-md-12 col-xs-12">
                            <label for="">Prefered POS Mode <span class="text text-danger">*</span> </label>
                            <p>
                                Desktop Mode: <input type="radio" class="flat" name="pos_mode" id="pos_mode" value="1" />
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                Tablet Mode: <input type="radio" class="flat" name="pos_mode" id="pos_mode" value="0" />
                            </p>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br />
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>


<?php if ($_SESSION['userid'] == 1) : ?>
    <!-- Period -->
    <div id="period" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Period</h4>
                </div>
                <div class="modal-body">
                    <form class="" role="form" action="<?php echo site_url('pages/activate_days'); ?>" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Allocate period <span class="text text-danger">*</span> </label>
                                <input type="number" class="form-control" name="period" required />
                            </div>
                            <div class="col-md-12">
                                <br />
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
<?php endif; ?>

<!-- Modals End -->



<?php
$sales = $purchases = 0;
$sales = $this->db->select('sum(net_amount) as net_amount')->from('orders')->where('transaction_type_id = 1 OR transaction_type_id = 3')->get()->row()->net_amount;
$purchases = $this->db->select('sum(net_amount) as net_amount')->from('orders')->where('transaction_type_id = 2 OR transaction_type_id = 4')->get()->row()->net_amount;
if ($sales == null || $sales == 0 || $sales == '') $sales = 0;
if ($purchases == null || $purchases == 0 || $purchases == '') $purchases = 0;
?>

<script type="text/javascript">
    var val = <?php echo $sales; ?>;
    var va2 = <?php echo $purchases; ?>;
    // var val = 50;
    // var va2 = 20;

    console.log("This val: " + va2);

    var sharePiePolorDoughnutData = [{
            value: val,
            color: "#B370CF",
            highlight: "#34495E",
            label: "Sales"
        },
        {
            value: va2,
            color: "#36CAAB",
            highlight: "#FF5535",
            label: "Purchases"
        }

    ];
    $(document).ready(function() {
        window.myPie = new Chart(document.getElementById("canvas_pie").getContext("2d")).Pie(sharePiePolorDoughnutData, {
            responsive: true,
            tooltipFillColor: "rgba(51, 51, 51, 0.55)"
        });
    });
</script>

<script>
    function get_days_money(e) {
        $.ajax({
            url: '<?php echo site_url('sys/index'); ?>',
            type: 'POST',
            cache: false,
            data: 'filterdate=' + e.value,
            success: function(html) {
                location.reload();
            }
        });
    }
</script>

<script>
    function generate_profit() {
        var fromDate = $('#from_date').val();
        var toDate = $('#to_date').val();

        if (fromDate == null || fromDate == '') {
            swal({
                icon: 'error',
                title: 'Error',
                text: 'No value found in From Date'
            });
            return;
        }
        if (toDate == null || toDate == '') {
            swal({
                icon: 'error',
                title: 'Error',
                text: 'No value found in To Date'
            });
            return;
        }

        $.ajax({
            url: '<?php echo site_url('data/get_profit'); ?>',
            type: 'POST',
            cache: false,
            data: {
                fromDate: fromDate,
                toDate: toDate
            },
            success: function(resp) {
                console.log(resp);
                var obj = JSON.parse(resp);
                $('#display-profit').html('KES ' + obj.profit);
            }
        });

        console.log('From: ' + fromDate);
        console.log('To: ' + toDate);
    }
</script>