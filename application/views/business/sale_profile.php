<?php
$CI = &get_instance();
$org = $this->db->where('org_id', 1)->get('orgs')->row();
?>

<?php
$header = $order_header;

$order_id = $header->order_id;
$bill_no = $header->bill_no;
$org_name = $header->org_name;
$org_email = $header->org_email;
$org_phone = $header->org_phone;
$org_address = $header->org_address;
$customer_supplier_id = $header->customer_supplier_id;
$date_time = $header->date_time;
$payment_due = $header->payment_due;
$service_charge = $header->service_charge;
$tax_charge = $header->tax_charge;
$net_amount = $header->net_amount;
$discount = $header->discount;
$paid_status = $header->paid_status;
$entity_id = $header->entity_id;
$transaction_type_id = $header->transaction_type_id;
$payment_mode_id = $header->payment_mode_id;
$paid_amount = $header->paid_amount;
$paying_balance = $header->paying_balance;
$change_return = $header->change_return;
$narrative = $header->narrative;
$date_modified = $header->date_modified;
$time_stamp = $header->time_stamp;
$cashier_name = $header->firstname . ' ' . $header->secondname;
$phone = $header->phone;
$id_passport = $header->id_passport;
$email = $header->email;
$payment_mode_name = '';
$transaction_type_name = $header->transaction_type_name;
$customer_name = $header->customer_supplier_name;
#get customer_supplier details
$customer_supplier = $this->db->where('entity_id', $customer_supplier_id)->get('entitys')->row();
?>

<style>
    .tb-rr {
        text-align: right;
        border: unset !important;
    }

    .tb-ru {
        border: unset !important;
    }
</style>


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
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= current_url() ?>"><?= $page; ?></a></li>
                        <li class="breadcrumb-item active"><?= $transaction_type_name; ?></li>
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
                <div class="col-12">

                    <div class="invoice p-3 mb-3" style="border: 1px solid rgba(0,0,0,.125) !important;">

                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> <?= $page ?>
                                    <small class="float-right">Generated at: <?= date('d-m-Y H:i:s') ?></small>
                                </h4>
                            </div>

                        </div>

                        <div class="row invoice-info">

                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong><?= $customer_supplier->firstname . ' ' . $customer_supplier->secondname . ' ' . $customer_supplier->lastname ?></strong><br>
                                    <?= $customer_supplier->entity_address ?><br>
                                    Phone: <a href="tel: <?= $customer_supplier->phone ?>"> <?= $customer_supplier->phone ?> </a><br>
                                    Email: <a href="mailto: <?= $customer_supplier->email ?>"><?= $customer_supplier->email ?></a>
                                </address>
                            </div>

                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong><?= $org->org_name ?></strong><br>
                                    <?= $org->address ?><br>
                                    Phone: <a href="tel: <?= $org->phone ?>"> <?= $org->phone ?> </a><br>
                                    Email: <a href="mailto: <?= $org->email ?>"><?= $org->email ?></a>
                                </address>
                            </div>

                            <div class="col-sm-4 invoice-col">
                                <b>Invoice #<?= str_pad($order_id, 4, '0', STR_PAD_LEFT); ?></b><br>
                                <br>
                                <b>Order ID:</b> <?= $bill_no ?><br>
                                <b>Payment Due:</b> <?= date('d-m-Y', strtotime($date_time)) ?><br>
                                <b>Transaction Type:</b> <?= $transaction_type_name ?>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-condensed table-sm">
                                    <thead style="background-color: #cccccc !important;">
                                        <tr style="line-height: 15px">
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Unit Price</th>
                                            <th>Tax</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total_amount = $total_tax = $total_rate = $total_qty = 0;
                                        $till_no = 860915;
                                        $x = 0;
                                        foreach ($order_items as $dt) {
                                            $total_tax += $dt->tax_id;
                                            $total_rate += $dt->rate;
                                            $total_qty += $dt->qty;
                                            $total_amount += $dt->amount;
                                        ?>
                                            <tr style="line-height: 15px">
                                                <td><?= ++$x ?></td>
                                                <td><?= $dt->item_name ?></td>
                                                <td><?= $dt->qty ?></td>
                                                <td><?= number_format($dt->rate, 2) ?></td>
                                                <td><?= number_format($dt->tax_id, 2) ?></td>
                                                <td><?= number_format($dt->amount, 2) ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot style="background-color: #cccccc29 !important;">
                                        <tr style="line-height: 15px">
                                            <th colspan="4">TOTALS</th>
                                            <th> <?= number_format($total_tax, 2) ?> </th>
                                            <th> <?= number_format($total_amount, 2) ?> </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-6">
                                <p class="lead">Payment Made:</p>
                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-condensed table-sm">
                                            <thead style="background: #cccccc !important;">
                                                <tr style="line-height: 15px">
                                                    <th>Date</th>
                                                    <th>Ref#</th>
                                                    <th>Payment Mode</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $payments = $this->db->select('a.*, b.account_name, b.account_code')
                                                    ->from('order_payments as a')
                                                    ->join('accounts as b', 'a.account_id = b.account_id')
                                                    ->where('a.order_id', $order_id)
                                                    ->get()->result();
                                                $payment_total = 0;
                                                foreach ($payments as $pay) {
                                                    $payment_total += $pay->payment_amount;
                                                ?>
                                                    <tr style="line-height: 15px">
                                                        <td> <?= date('d-m-Y', strtotime($pay->payment_date)) ?> </td>
                                                        <td> <?= $pay->transaction_code ?> </td>
                                                        <td> <?= $pay->account_name ?> </td>
                                                        <td> <?= number_format($pay->payment_amount, 2) ?> </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                                <tr>
                                                    <th colspan="3">Total</th>
                                                    <th> <?= number_format($payment_total, 2) ?> </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </p>
                            </div>

                            <div class="col-6">
                                <!-- <p class="lead">Summary</p> -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th class="tb-rr">Tax (16%):</th>
                                            <td class="tb-ru"> <?= number_format($total_tax, 2) ?> </td>
                                        </tr>
                                        <tr>
                                            <th class="tb-rr">Total:</th>
                                            <td class="tb-ru"> <?= number_format($total_amount, 2) ?> </td>
                                        </tr>
                                        <tr>
                                            <th class="tb-rr">Discount:</th>
                                            <td class="tb-ru"> <?= number_format($discount, 2) ?> </td>
                                        </tr>
                                        <tr>
                                            <th class="tb-rr">Balance:</th>
                                            <td class="tb-ru"> <?= number_format($total_amount - $payment_total, 2) ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>


                        <div class="row no-print">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary pull-right mr-1" onclick="window.open('<?php echo site_url('business/sales_receipt/' . $order_id); ?>','receipt','width=400, height=800')">Print Thermal Receipt (All Items)</button>
                                <button type="button" class="btn btn-rgp pull-right mr-1" data-toggle="modal" data-target="#get_order_items">Print Some Items</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="row">

                <?php if ($paying_balance > 0) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Make Payment</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('business/new_order_payment/' . $order_id); ?>" method="post" enctype="multipart/form-data">

                                    <input type="hidden" name="order_type" value="sale" required readonly />

                                    <div class="row">
                                        <div class="col-md-4 col-xs-6">
                                            <label for="">Payment Date</label>
                                            <input type="date" name="payment_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required />
                                        </div>
                                        <div class="col-md-4 col-xs-6">
                                            <label for="">Amount</label>
                                            <input type="number" name="payment_amount" class="form-control" value="<?php echo $paying_balance; ?>" required />
                                        </div>
                                        <div class="col-md-4 col-xs-6">
                                            <label for="">Payment mode</label>
                                            <select class="select2 form-control" name="account_id" onchange="get_more(this)" required>
                                                <option value=""> Select payment mode </option>
                                                <?php
                                                foreach ($payment_modes as $pm) {
                                                ?>
                                                    <option value="<?= $pm->account_id; ?>"> <?= $pm->account_name . ' [' . $pm->account_code . ']'; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row" id="ttype-3">
                                        <!-- Mpesa Transaction -->
                                        <div class="col-md-4 col-xs-6">
                                            <label for="">Transaction Code </label>
                                            <input type="text" maxlength="15" name="reference" class="form-control" required />
                                        </div>
                                    </div>

                                    <div class="row" id="ttype-1">
                                        <!-- Bank Transaction -->
                                        <div class="col-md-4 col-xs-6">
                                            <label for="">Bank Account No.</label>
                                            <input type="number" name="bank_account_number" class="form-control" />
                                        </div>
                                        <div class="col-md-4 col-xs-6">
                                            <label for="">Check Number</label>
                                            <input type="text" name="check_number" class="form-control" />
                                        </div>
                                        <div class="col-md-4 col-xs-6">
                                            <label for="">Check Maturity Date</label>
                                            <input type="date" name="check_maturity_date" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-xs-6">
                                            <label for="">Paid by:<small> the person who pays this specific amount</small></label>
                                            <input type="text" name="paid_by" class="form-control" />
                                        </div>
                                        <div class="col-md-4 col-xs-6">
                                            <label for="">Narrative</label>
                                            <textarea type="text" name="narrative" class="form-control" placeholder="write here..."></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-xs-12" style="padding-top: 10px;">
                                        <button type="submit" name="Pay" class="btn btn-success pull-right" style=" margin-right: 40px;">Receive Payment <span class="fa fa-money"></span></button>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                <?php endif; ?>
            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<!-- The Modal -->
<div class="modal" id="get_order_items" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p><i class="fa fa-info-circle"></i> Check all the items you need printed and hit the <code>print</code> button</p>
                    </div>
                </div>
                <form   enctype="multipart/form-data" 
                        method="post" 
                        target="print_popup" 
                        action="<?php echo site_url('business/sales_receipt/' . $order_id); ?>"
                        onsubmit="window.open('about:blank','print_popup','width=1000,height=800');" >

                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-striped table-condensed table-hover table-sm">
                                <thead class="bg-orange">
                                    <tr>
                                        <th>#</th>
                                        <th>Item Name</th>
                                        <th>Qty</th>
                                        <th>Is Editted</th>
                                        <th>Print Session</th>
                                        <th>Editted By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($order_items as $dt) {
                                    ?>
                                        <tr>
                                            <td> <input type="checkbox" name="item[]" value="<?= $dt->order_item_id ?>" /> </td>
                                            <td> <?= $dt->item_name ?> </td>
                                            <td> <?= $dt->qty ?> </td>
                                            <td> <?= ($dt->is_editted == 1) ? 'Yes' : 'No' ?> </td>
                                            <td> <?= $dt->print_session ?> </td>
                                            <td> <?= $dt->firstname . ' ' . $dt->secondname . ' ' . $dt->lastname ?> </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 mt-3">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary pull-right">Print <i class="fa fa-print"></i></button>
                        </div>
                    </div>
                </form>
            </div>



        </div>
    </div>
</div>


<!-- Scripts Start -->
<script>
    function get_more(e) {
        var pmode = e.value;
        // if (pmode == 1) {
        //     //bank payment
        //     document.getElementById("ttype-1").style = "display: block";
        //     document.getElementById("ttype-3").style = "display: none";
        // } else if (pmode == 2) {
        //     //cash payment
        //     document.getElementById("ttype-3").style = "display: none";
        //     document.getElementById("ttype-1").style = "display: none";
        // } else if (pmode == 3) {
        //     //mpesa payment
        //     document.getElementById("ttype-3").style = "display: block";
        //     document.getElementById("ttype-1").style = "display: none";
        // }
    }
</script>