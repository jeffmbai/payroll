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
                                <table class="table table-condensed">
                                    <thead style="background-color: #cccccc !important;">
                                        <tr style="line-height: 15px">
                                            <th>#</th>
                                            <th>Item Code</th>
                                            <th>Description</th>
                                            <th>Qty</th>
                                            <th>Check</th>
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
                                                <td><?= $dt->barcode ?></td>
                                                <td><?= $dt->item_name ?></td>
                                                <td><?= $dt->qty ?></td>
                                                <td><input type="checkbox" class="form-control" /></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p style="text-align: center;">Received above goods in good order and condition</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                Delivered By: ___________________________
                            </div>
                            <div class="col-4">
                                Date: ___________________________
                            </div>
                            <div class="col-4">
                                Signature: ___________________________
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-4">
                                Received By: ___________________________
                            </div>
                            <div class="col-4">
                                Date: ___________________________
                            </div>
                            <div class="col-4">
                                Signature: ___________________________
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