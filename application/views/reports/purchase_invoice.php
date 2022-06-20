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
                                From
                                <address>
                                    <strong><?= $customer_supplier->firstname . ' ' . $customer_supplier->secondname . ' ' . $customer_supplier->lastname ?></strong><br>
                                    <?= $customer_supplier->entity_address ?><br>
                                    Phone: <a href="tel: <?= $customer_supplier->phone ?>"> <?= $customer_supplier->phone ?> </a><br>
                                    Email: <a href="mailto: <?= $customer_supplier->email ?>"><?= $customer_supplier->email ?></a>
                                </address>
                            </div>

                            <div class="col-sm-4 invoice-col">
                                To
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
                                <table class="table table-condensed">
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
                                        <table class="table table-condensed">
                                            <thead style="background-color: #cccccc !important;">
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
                                            <th class="tb-rr">Tax (16%)</th>
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
                                <!-- <a href="#" onclick="window.print();" rel="noopener" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                                <button type="button" onclick="window.print();" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-print"></i> Print
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->