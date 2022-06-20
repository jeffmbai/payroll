<?php
$x = 0;
// var_dump($sale_profile);
// var_dump($buyers);
$op = $order_profile;
$x++;
$order_id = $op->order_id;
$bill_no = $op->bill_no;
$customer_supplier_id = $op->customer_supplier_id;
$customer_name = $op->customer_supplier_name;
$date_time = $op->date_time;
$service_charge = $op->service_charge;
$tax_charge = $op->tax_charge;
$net_amount = $op->net_amount;
$paid_amount = $op->paid_amount;
$paying_balance = $op->paying_balance;
$change_return = $op->change_return;
$discount = $op->discount;
$payment_mode_id = $op->payment_mode_id;
$transaction_type_name = $op->transaction_type_name;
$paid_status = $op->paid_status;
$time_stamp = $op->time_stamp;
$cashier_name = $op->firstname . ' ' . $op->secondname;

$taxtypes = $this->db->query("SELECT * FROM tax_types")->result();
$tax_types = null;
foreach ($taxtypes as $tps) $tax_types .= "<option value='" . $tps->tax_rate . "' > " . $tps->tax_type_name . " </option>";
#if($x < 1) redirect($this->session->userdata('referred_from'));
?>
<style>
    .td {
        width: 350px;
    }

    .item_div {
        background-color: #1ABB9C;
    }

    #item_description {
        padding: 15px;
        color: #fff;
    }

    .money {
        font-size: 25px !important;
        font-weight: bold;
    }

    .tdh {
        width: 60px;
        display: none;
    }

    .hide {
        display: none;
    }

    .noHover {
        pointer-events: none;
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
                    ?>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="card direct-chat direct-chat-warning">
                        <div class="card-header">
                            <h3 class="card-title">Business | Purchase | <?php echo $transaction_type_name; ?></h3>
                            <div class="card-tools">
                                Date Time: <?php echo $date_time; ?>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" id="update_order_form" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Supplier name</label>
                                        <select class="select2 form-control" name="cutomer_supplier_id" required>
                                            <option value="">Select supplier</option>
                                            <?php
                                            foreach ($buyers as $buyer) {
                                            ?>
                                                <option value="<?php echo $buyer->entity_id; ?>" <?php if ($buyer->entity_id == $customer_supplier_id) echo "selected"; ?>>
                                                    <?php echo $buyer->phone . ' - ' . $buyer->firstname . ' ' . $buyer->secondname . ' ' . $buyer->lastname; ?>
                                                </option>';
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6" hidden>
                                        <label>Date</label>
                                        <input type="hidden" class="form-control" readonly name="date_time" value="<?php echo date('Y-m-d'); ?>" required />
                                        <input type="hidden" class="form-control" name="transaction_type_id" value="2" readonly required />
                                    </div>

                                    <div class="col-md-6">
                                        <p style="text-align: right;">
                                            <b>Reference: </b> <?php echo $bill_no; ?> <br />
                                            <b>Cashier: </b> <?php echo $cashier_name; ?> <br />
                                            <b>Transaction Type: </b> <?php echo $transaction_type_name; ?> <br />
                                            <b>Date Time: </b> <?php echo $time_stamp; ?> <br />
                                        </p>
                                    </div>

                                    <div class="col-md-12">
                                        <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createInvoice" style="border: 1px solid #4608AD; margin-left: 50px;" >New invoice <span class="fa fa-globe"></span></button> -->
                                        <!-- <button type="button" onclick="window.open('<?php echo site_url('business/purchase_invoice/' . $order_id); ?>','invoice','width=1000, height=480')" class="btn btn-default" style="border: 1px solid red;">Print invoice <span class="fa fa-print"></span></button> -->
                                        <a href="<?= site_url('business/purchase_invoice/' . $order_id); ?>" class="btn btn-default" style="border: 1px solid red;">Print invoice <span class="fa fa-print"></span></a>
                                        <a href="<?php echo site_url('sys/add_item'); ?>" class="btn btn-default" style="border: 1px solid #000;">Add Item <span class="fa fa-plus"></span></a>
                                        <a href="<?php echo site_url('business/new_purchase'); ?>" class="btn btn-default" style="border: 1px solid #1ABBA7;">New Purchase <span class="fa fa-shopping-cart"></span></a>
                                    </div>

                                </div>

                                <div class="row" style="border-top: 1px solid #DDDDDD; margin-top: 30px;">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="order_table">
                                            <thead>
                                                <tr>
                                                    <td class="td"><b>Item</b></td>
                                                    <td><b>Qty</b></td>
                                                    <td><b>Unit Price</b></td>
                                                    <td><b>Tax (%)</b></td>
                                                    <td><b>Amount</b></td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" onclick="add_row()"><span class="fa fa-plus"></span></button>
                                                    </td>
                                                </tr>
                                            </thead>

                                            <?php
                                            $x = 1;
                                            foreach ($order_items as $itm) {
                                                $x++;
                                            ?>
                                                <tr id="row<?php echo $x; ?>">
                                                    <td class="td">
                                                        <select name="item[]" class="select2 form-control noHover" onchange="set_qty(<?php echo $x; ?>)" id="item_<?php echo $x; ?>" readonly required>
                                                            <option value="<?php echo $itm->item_id; ?>"> <?php echo $itm->item_name; ?> </option>
                                                            <?php
                                                            foreach ($all_items as $item) {
                                                            ?>
                                                                <option value="<?php echo $item->item_id; ?>" <?php if ($itm->item_id == $item->item_id) echo "selected"; ?>> <?php echo $item->item_name . ' ' . $item->barcode; ?> </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td><input type="number" class="form-control" onchange="qty(<?php echo $x; ?>)" name="qty[]" id="qty_<?php echo $x; ?>" value="<?php echo $itm->qty; ?>" /></td>
                                                    <td>
                                                        <input type="number" step="0.01" class="form-control" onkeyup="set_amount(<?php echo $x; ?>)" name="rate[]" id="rate_<?php echo $x; ?>" value="<?php echo $itm->rate; ?>" />
                                                        <input type="number" step="0.01" class="form-control" id="rateb_<?php echo $x; ?>" readonly style="display: none; visibility: hidden;" value="<?php echo $itm->selling_price; ?>" />
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="tax[]" id="tax_<?php echo $x; ?>" onchange="qty(<?php echo $x; ?>)" required>
                                                            <?php foreach ($taxtypes as $ps) : ?>
                                                                <option value="<?php echo $ps->tax_rate; ?>" <?php if ($ps->tax_rate == $itm->tax_id) echo "selected"; ?>> <?php echo $ps->tax_type_name; ?> </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" class="form-control" readonly name="amount[]" id="amount_<?php echo $x; ?>" value="<?php echo $itm->rate * $itm->qty; ?>" /></td>
                                                    <td><button class="btn btn-rgd" type="button" onclick="delete_row(<?php echo $x; ?>)"><span class="fa fa-minus"></span></button></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div>

                                    <div class="row" style="margin: 50px; padding: 15px; background-color: aliceblue; border-radius: 5px;">
                                        <div class="col-md-4">
                                            <label>Tax: <small>(In %)</small> </label>
                                            <input type="text" readonly name="itemstax" id="itemstax" class="money form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Total: </label>
                                            <input type="text" readonly name="total" id="itemstotal" class="money form-control" value="<?php echo $net_amount; ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Payment Method: </label>
                                            <select class="form-control" name="payment_mode_id" required>
                                                <option value=""> Select payment mode </option>
                                                <?php
                                                foreach ($payment_modes as $pm) {
                                                ?>
                                                    <option value="<?= $pm->account_id; ?>" <?php if ($pm->account_id == $payment_mode_id) echo "selected"; ?>> <?= $pm->account_name . ' [' . $pm->account_code . ']'; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Amount Paying: </label>
                                            <input type="number" name="paid_amount" id="paid_amount" onkeyup="get_change_return(this)" class="money form-control" value="<?php echo $paid_amount; ?>" required />
                                        </div>
                                        <div class="col-md-4">
                                            <label>Payment Reference: </label>
                                            <input type="text" maxlength="20" name="reference" class="money form-control" value="<?= $order_profile->reference ?>" required />
                                        </div>
                                        <div class="col-md-4">
                                            <label>Balance: </label>
                                            <input type="number" readonly name="paying_balance" id="paying_balance" class="money form-control" value="<?php echo $paying_balance; ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Change Return: </label>
                                            <input type="number" readonly name="change_return" id="change_return" class="money form-control" value="<?php echo $change_return; ?>">
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="button" class="btn btn-danger pull-right m-2" onclick="window.open('<?php echo site_url('business/purchase_receipt/' . $order_id); ?>','receipt','width=400, height=800')" value="Print Receipt" />
                                        <input type="submit" class="btn btn-primary pull-right m-2" id="submit" value="Update" />
                                    </div>
                                </div>

                            </form>
                        </div><!-- /.card-body -->
                    </div>

                </div>

                <!-- Pay for any order start -->
                <div class="col-md-12" <?php if ($paying_balance <= 0) echo 'hidden'; ?>>
                    <div class="card direct-chat direct-chat-warning">
                        <div class="card-header">
                            <h3 class="card-title">Make Payment</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url('business/new_order_payment/' . $order_id); ?>" method="post" enctype="multipart/form-data">

                                <input type="hidden" name="order_type" value="purchase" required readonly />

                                <div class="row">
                                    <div class="col-md-4 col-xs-6">
                                        <label for="">Payment Date</label>
                                        <input type="date" name="payment_date" class="form-control" value="<?= date('Y-m-d'); ?>" required />
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label for="">Amount</label>
                                        <input type="number" name="payment_amount" max="<?= $paying_balance ?>" min="1" class="form-control" value="<?= $paying_balance; ?>" required />
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label for="">Payment mode</label>
                                        <select class="select2 form-control" name="account_id" onchange="get_more(this)" style="width: 90%;" required>
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
                                        <label for="">Reference</label>
                                        <input type="text" name="reference" class="form-control" required />
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

                                    <div class="col-md-12 col-xs-12" style="padding-top: 10px;">
                                        <button type="submit" name="Pay" class="btn btn-success pull-right" style=" margin-right: 40px;">Make Payment <span class="fa fa-money"></span></button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <!-- Order Payments Start -->
                <div class="col-md-12">
                    <div class="card direct-chat direct-chat-warning">
                        <div class="card-header">
                            <h3 class="card-title">Order Payments</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="order_table">
                                            <thead>
                                                <tr>
                                                    <th>Amount</th>
                                                    <th>Account</th>
                                                    <th>Payment Date</th>
                                                    <th>Code</th>
                                                    <th>Bank Acc. No.</th>
                                                    <th>Check No.</th>
                                                    <th>Maturity Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $x = $tt = 0;
                                                foreach ($order_payments as $op) {
                                                    $x++;
                                                    $tt += $op->payment_amount;
                                                ?>
                                                    <tr>
                                                        <td> <?= number_format($op->payment_amount, 2); ?> </td>
                                                        <td> <?= $op->account_name . ' [' . $op->account_code . ']'; ?> </td>
                                                        <td> <?= $op->payment_date; ?> </td>
                                                        <td> <?= $op->transaction_code; ?> </td>
                                                        <td> <?= $op->bank_account_number; ?> </td>
                                                        <td> <?= $op->check_number; ?> </td>
                                                        <td> <?= $op->check_maturity_date; ?> </td>
                                                        <td>
                                                            <a href="#" title="Print Payment Voucher" onclick="window.open('<?php echo site_url('business/print_voucher/' . $op->order_payment_id) ?>','Payment Voucher','width=700')" class="btn btn-xs btn-rgd"><i class="fa fa-print"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                                <tr>
                                                    <th><?= number_format($tt, 2) ?></th>
                                                    <th colspan="6"></th>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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


<!-- Create Invoice Modal -->
<div id="createInvoice" class="modal fade" role="dialog">
    <div class="modal-dialog" style="opacity: 0.9;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title">Add Item</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="create_invoice_form">

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="">Supplier <span class="text text-danger">*</span> </label>
                                <select class="select2 form-control" name="cutomer_supplier_id" required style="width: 100%">
                                    <option value="">Select supplier</option>
                                    <?php
                                    foreach ($buyers as $buyer) {
                                        if ($buyer->entity_id == 0) continue;
                                        echo '<option value="' . $buyer->entity_id . '" >  ' . $buyer->phone . ' - ' . $buyer->firstname . ' ' . $buyer->secondname . ' ' . $buyer->lastname . '  </option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="">Amount paid <span class="text text-danger">*</span> </label>
                                <input type="number" name="paid_amount" id="paid_amount" class="form-control" required />
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="">Paying balance </label>
                                <input type="number" name="paying_balance" id="paying_balance" class="form-control" />
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="">Payment Mode <span class="text text-danger">*</span> </label>
                                <select class="select2 form-control" name="payment_mode_id" required style="width: 100%">
                                    <option value=""> Select payment mode </option>
                                    <?php
                                    foreach ($payment_modes as $pm) {
                                    ?>
                                        <option value="<?php echo $pm->account_id; ?>"> <?php echo $pm->account_name . ' [' . $pm->account_code . ']'; ?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="">Payment date <span class="text text-danger">*</span> </label>
                                <input type="date" class="form-control" name="date_time" required />
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="">Payment due date </label>
                                <input type="date" class="form-control" name="payment_due" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="">Paid status <span class="text text-danger">*</span> </label>
                                <p>
                                    Yes <span class="fa fa-check"></span> <input type="radio" name="paidStatus" id="paidStatus" value="1" checked="" required />
                                    &nbsp;&nbsp;&nbsp;
                                    No <span class="fa fa-close"></span> <input type="radio" name="paidStatus" id="paidStatus" value="0" />
                                </p>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label for="">Narrative <span class="text text-danger">*</span> </label>
                                <textarea class="form-control" name="narrative" placeholder="Narrate here..."></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                <button type="submit" class="btn btn-success  pull-right"><span class="fa fa-plus"> Save</span></button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </form>
                </div>
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


<script type="text/javascript">
    function add_row() {
        $rowno = $("#order_table tr").length;

        console.log($rowno);
        //return;

        //$rowno=$rowno+1;
        $("#order_table tr:last").after("<tr id='row" + $rowno + "'>  " +
            "<td class='td'> " +
            "<select name='item[]' class='select2 form-control' onchange='set_qty(" + $rowno + ")' id='item_" + $rowno + "' tabindex='-1' required >" +
            "<option ></option>"
            <?php foreach ($all_items as $itm) : ?> +
                "<option value='<?php echo $itm->item_id ?>' ><?php echo $itm->item_name . ' ' . $itm->barcode; ?></option>"
            <?php endforeach; ?> +
            "</select> " +
            "</td> " +
            "<td><input type='number' class='form-control' onchange=qty('" + $rowno + "') name='qty[]' id='qty_" + $rowno + "' value='1' ></td> " +
            "<td> " +
            "<input type='text' class='form-control' onkeyup='set_amount(" + $rowno + ")' name='rate[]' id='rate_" + $rowno + "' > " +
            "<input type='text' class='form-control' readonly id='rateb_" + $rowno + "' style='display:none;' >" +
            "</td> " +
            "<td> " +
            "<select class='form-control' name='tax[]' onchange='qty(" + $rowno + ")' id='tax_" + $rowno + "' tabindex='-1' required>" +
            "<?php foreach ($taxtypes as $tps) {
                    $xxx = 1; ?>" +
            "<option value='<?php echo $tps->tax_rate; ?>'  <?php if ($xxx == 1) echo 'selected'; ?>  > <?php echo $tps->tax_type_name; ?> </option>" +
            "<?php $xxx++;
                } ?>" +
            "</select> " +
            "</td> " +
            "<td><input type='text' class='form-control' name='amount[]' id='amount_" + $rowno + "' readonly></td> " +
            "<td><button type='button' class='btn btn-rgd' onclick=delete_row('" + $rowno + "')><span class='fa fa-close'></span></button></td> " +
            "</tr>");

        //$("#order_table tr:last").after(html);
        $(".select2").select2({
            allowClear: true
        });
        $(".select2_group").select2({
            allowClear: true
        });
    }
</script>

<script type="text/javascript">
    function delete_row(rowno) {
        console.log("Row No: " + rowno);
        $('#row' + rowno).remove();

        refresh_table();
    }
</script>

<script>
    function set_qty(e) {
        var itemID = $("#item_" + e).val();
        console.log("Search: " + itemID);
        $.ajax({
            url: '<?php echo site_url('data/specific_item'); ?>',
            type: 'POST',
            cache: false,
            data: 'data=' + itemID,
            success: function(data) {
                console.log("Response: " + data);
                var obj = JSON.parse(data);

                // $("#item_"+$rowno).val(obj.item_id).change();
                // $("#item_name"+$rowno).val(obj.item_name);  
                // $("#qty_"+$rowno).val(1);
                // $("#rate_"+$rowno).val(obj.marked_price);
                // $("#rateb_"+$rowno).val(obj.marked_price);
                // $("#tax_"+$rowno).val(obj.marked_price * (obj.tax_rate/100));
                $("#tax_" + $rowno).val(obj.tax_rate);
                //$("#amount_"+$rowno).val(amountt);

                refresh_table();
            }
        });
    }
</script>

<script type="text/javascript">
    function set_amount(e) {
        var rate = Number($("#rate_" + e).val());
        var qty = Number($("#qty_" + e).val());
        var tt = rate * qty;
        var tax = $("#tax_" + e).val();
        var ttax = (tt * (tax / 100));
        var total = ttax + tt;

        // console.log("Rate: " + rate);
        // console.log("QTY: " + qty);
        // console.log("Tax: " + tax);
        // console.log("TT Amount: " + total);

        $("#amount_" + e).val(Number(total));
        $("#itemstax").val(Number(ttax));

        refresh_table();
    }

    function qty(e) {
        //get the qty and increase appropriately
        var itemqty = Number($("#qty_" + e).val());
        var itemprice = $("#rate_" + e).val();
        var tax = Number($("#tax_" + e).val());
        if (itemprice != 0 || itemprice != null || itemprice != '') {
            itemprice = Number($("#rate_" + e).val());
            console.log("Itemprice: " + itemprice);
        } else {
            itemprice = 0;
        }
        var total = 0.00;
        total = (itemprice * itemqty) * ((tax + 100) / 100);
        $("#amount_" + e).val(total.toFixed(2));

        console.log(itemqty + " : " + itemprice + " : TT = " + total);

        refresh_table();

        //to balance the second part of footer section
        var paidAmount = Number($("#paid_amount").val());
        var itemstotal = Number($("#itemstotal").val());
        var balance = paidAmount - itemstotal;
        if (balance < 0) {
            //kuna deficit
            //document.getElementById("submit").disabled = true; 
            balance = balance * -1;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

        } else if (balance == 0) {
            //hakuna change
            // document.getElementById("submit").disabled = false;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

        } else if (balance > 0) {
            //kuna change
            //document.getElementById("submit").disabled = false;
            $("#paying_balance").val(0.00);
            $("#change_return").val(balance.toFixed(2));
        }

    }
</script>
<script type="text/javascript">
    function refresh_table() {
        var table = document.getElementById("order_table");
        var sumTax = 0;
        var sumVal = 0;

        for (var i = 1; i <= table.rows.length; i++) {

            if (($("#amount_" + i).val()) != null) {
                sumVal = sumVal + Number($("#amount_" + i).val());
                sumTax = sumTax + Number($("#tax_" + i).val());
            }
        }
        $("#itemstotal").val(sumVal.toFixed(2));
        $("#itemstax").val(sumTax.toFixed(2));

        //console.log("Table Length: " + table.rows.length);
        //console.log("Total Sum: " + sumVal.toFixed(2));
        //console.log(sumTax.toFixed(2));
        console.log('Table Refreshed Successful');
    }
</script>

<script type="text/javascript">
    function get_item(e) {
        var item = e.value;
        console.log("Search: " + item);
        $.ajax({
            url: '<?php echo site_url('data/search_item'); ?>',
            type: 'POST',
            cache: false,
            data: 'data=' + item,
            success: function(html) {
                $('#item_description').html(html);
            }
        });
    }

    function select_item(e) {
        //alert(e);
    }
</script>

<script>
    function get_change_return(e) {
        var paidAmount = Number(e.value);
        var itemstotal = Number($("#itemstotal").val());
        var balance = paidAmount - itemstotal;
        if (balance < 0) {
            //kuna deficit
            document.getElementById("submit").disabled = true;
            balance = balance * -1;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

        } else if (balance == 0) {
            //hakuna change
            document.getElementById("submit").disabled = false;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

        } else if (balance > 0) {
            //kuna change
            document.getElementById("submit").disabled = false;
            $("#paying_balance").val(0.00);
            $("#change_return").val(balance.toFixed(2));

        }
    }
</script>

<script>
    $(function() {
        $('#update_order_form').on('submit', function(e) {
            /*for add item*/
            e.preventDefault();
            console.log("Something posted");
            $.ajax({
                url: "<?php echo site_url('business/update_order/' . $order_id); ?>", //this is the submit URL
                type: 'POST',
                data: $('#update_order_form').serialize(),
                success: function(data) {
                    console.log("Response: " + data);
                    var obj = JSON.parse(data);
                    //$('#alert').html(data);
                    console.log("resp: " + obj.resp);
                    console.log("message: " + obj.message);
                    if (obj.resp == '1') {
                        //success. then print receipt
                        var urll = "window.open('<?php echo site_url(); ?>business/purchase_receipt/" + obj.last_id + "','receipt','width=400, height=800')";
                        document.getElementById("action_buttons").innerHTML = '<a href=""  onclick="' + urll + '" class="btn btn-success pull-right"><span class="fa fa-print"> Print Receipt</span></a>';

                        swal({
                            icon: 'success',
                            title: 'Success',
                            text: 'Transaction complete'
                        });

                    }
                    //action_buttons

                }
            });
        }); //end registration
    });



    $(function() {
        $('#create_invoice_form').on('submit', function(e) {
            /*for creating invoice*/
            e.preventDefault();

            $.ajax({
                url: '<?php echo site_url(); ?>business/create_invoice', //this is the submit URL
                type: 'POST',
                data: $('#create_invoice_form').serialize(),
                success: function(data) {
                    console.log("Response: " + data);
                    var obj = JSON.parse(data);
                    console.log("resp: " + obj.resp);
                    console.log("message: " + obj.message);
                    if (obj.resp == '1') {
                        //success. then print receipt
                        var urll = "window.open('<?php echo site_url(); ?>business/purchase_invoice/" + obj.last_id + "','invoice','width=600, height=400')";
                        document.getElementById("action_buttons").innerHTML = '<a href=""  onclick="' + urll + '" class="btn btn-success pull-right"><span class="fa fa-print"> Print Invoice</span></a>';

                        //close modal
                        $('#createInvoice').modal('hide');
                        //reset modal form
                        $("#create_invoice_form")[0].reset();

                        swal({
                            icon: 'success',
                            title: 'Success',
                            text: 'Transaction complete'
                        });

                    }
                    //action_buttons

                }
            });
        }); //end registration
    });
</script>