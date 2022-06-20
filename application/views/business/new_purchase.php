<style>
    .td {
        width: 80px;
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

    /* .input-rg, .select2 {
        border: none !important;
    } */
</style>

<?php
$taxtypes = $this->db->query("SELECT * FROM tax_types ORDER BY tax_type_id DESC")->result();
$tax_types = null;
foreach ($taxtypes as $tps) $tax_types .= "<option value='" . $tps->tax_rate . "' > " . $tps->tax_type_name . " </option>";

date_default_timezone_set('Africa/Nairobi');
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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="post" id="place_order_form" enctype="multipart/form-data">
                                    <input type="hidden" name="order_type" value="purchase" required readonly >
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Supplier name <i class="text-danger">*</i></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select class="form-control" name="cutomer_supplier_id" required>
                                                    <option value="">Select supplier</option>
                                                    <?php
                                                    foreach ($buyers as $buyer) {
                                                        if ($buyer->entity_id == 0) continue;
                                                        echo '<option value="' . $buyer->entity_id . '" >  ' . $buyer->phone . ' - ' . $buyer->firstname . ' ' . $buyer->secondname . ' ' . $buyer->lastname . '  </option>';
                                                    }
                                                    ?>
                                                    <!-- <option value="0" >Walk in customer</option> -->
                                                </select>
                                            </div>

                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-top: 10px; display: block;">Store/Shop <i class="text-danger">*</i></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12" style="padding-top: 10px; display: block;">
                                                <select class="form-control" name="store_id" required>
                                                    <option value="">Select store/shop</option>
                                                    <?php
                                                    $stores = $this->db->get('orgs')->result();
                                                    foreach ($stores as $org) {
                                                        if ($org->parent_org == null) continue;
                                                        echo '<option value="' . $org->org_id . '" >  ' . $org->org_name . '  </option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <input type="hidden" class="form-control" id="transaction_type" name="transaction_type_id" value="2" readonly required style="visibility: hidded; display: none;" />

                                        </div>
                                        <div class="col-md-6">
                                            <p style="padding-left: 35px; text-align: right;">
                                                Date: <?php echo date('d-m-Y'); ?>
                                                Time: <?php echo date('H:m:s'); ?>
                                            </p>
                                            <hr />
                                            <p style="padding-left: 35px; text-align: right;">
                                                <a href="<?php echo site_url('sys/add_item'); ?>" class="btn btn-default" style="border: 1px solid #1ABB9C;">Register a new item <span class="fa fa-plus"></span></a>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createInvoice" style="border: 1px solid #4608AD;">Create invoice <span class="fa fa-globe"></span></button>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row" style="border-top: 1px solid #DDDDDD; margin-top: 30px;">
                                        <div class="col-md-12 table-responsive">
                                            <table class="table table-condensed table-bordered" id="order_table">
                                                <tbody>
                                                    <tr>
                                                        <td style='width: 300px;'><b>Item</b></td>
                                                        <td style="width: 100px;"><b>Qty</b></td>
                                                        <td><b>B.P</b></td>
                                                        <td><b>Tax</b></td>
                                                        <td><b>Total</b></td>
                                                        <td>
                                                            <button type="button" class="btn btn-default" onclick="add_row()"><span class="fa fa-plus"></span></button>
                                                            <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addRowModal" ><span class="fa fa-plus"></span></button> -->
                                                        </td>
                                                    </tr>

                                                    <tr id="row1">
                                                        <td>
                                                            <select name="item[]" class="select2 form-control input-rg" id="item_1" required style='width: 100%;'>
                                                                <option value="">Select item</option>
                                                                <?php
                                                                foreach ($all_items as $ait) {
                                                                    echo '<option value="' . $ait->item_id . '" > ' . $ait->item_name . ' - ' . $ait->barcode . ' </option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control input-rg" onchange="qty(1)" onkeyup="qty(1)" name="qty[]" id="qty_1" value='1' placeholder="Enter Qty" />
                                                        </td>
                                                        <td>
                                                            <input type="number" step="0.01" class="form-control input-rg" onkeyup="set_amount(1)" onchange="set_amount(1)" name="rate[]" id="rate_1" />
                                                        </td>
                                                        <td>
                                                            <select class="form-control input-rg" name="tax[]" id="tax_1" onchange="qty(1)" required>
                                                                <?php echo $tax_types; ?>
                                                                <!-- <option value="16" selected >V.A.T</option>
                                                            <option value="0" >Excempted</option> -->
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number" step="0.01" class="form-control input-rg" readonly name="amount[]" id="amount_1" />
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-rgd" onclick="delete_row(1)"><span class="fa fa-minus"></span></button>
                                                        </td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>

                                    <div class="row" style="margin: 50px; padding: 15px; background-color: aliceblue; border-radius: 5px;">
                                        <div class="col-md-4">
                                            <label>Tax: <small>(In %)</small> </label>
                                            <input type="text" readonly name="itemstax" id="itemstax" class="money form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Total: </label>
                                            <input type="text" readonly name="total" id="itemstotal" class="money form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Payment Method: </label>
                                            <select class="form-control" name="payment_mode_id" required>
                                                <option value=""> Select payment mode </option>
                                                <?php
                                                foreach ($payment_modes as $pm) {
                                                ?>
                                                    <option value="<?=$pm->account_id; ?>" > <?=$pm->account_name.' ['.$pm->account_code.']'; ?> </option>
                                                <?php
                                                }
                                                ?>
                                                <option value="0" > Not Applicable </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Amount Paying: </label>
                                            <input type="number" name="paid_amount" id="paid_amount" onkeyup="get_change_return(this)" class="money form-control" required />
                                        </div>
                                        <div class="col-md-4">
                                            <label>Payment Reference: </label>
                                            <input type="text" maxlength="20" name="reference" class="money form-control" required />
                                        </div>
                                        <div class="col-md-4">
                                            <label>Balance: </label>
                                            <input type="number" readonly name="paying_balance" id="paying_balance" class="money form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Change Return: </label>
                                            <input type="number" readonly name="change_return" id="change_return" class="money form-control">
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <br />
                                            <p id="action_buttons">
                                                <button type="submit" class="btn btn-primary pull-right" id="submit" disabled value="Submit" >Submit</button>
                                            </p>
                                        </div>
                                    </div>

                                </form>
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
                                <label for="">Client <span class="text text-danger">*</span> </label>
                                <select class="select2 form-control" name="cutomer_supplier_id" required style="width: 100%">
                                    <option value="">Select client</option>
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
                                        <option value="<?php echo $pm->payment_mode_id; ?>" <?php if ($pm->payment_mode_id == 2) echo "selected"; ?>> <?php echo $pm->payment_mode_name; ?> </option>
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


<script type="text/javascript">
    function get_models(e) {
        var brandID = e.value;
        console.log("BID: " + brandID);
        //now get the brands
        $.ajax({
            url: '<?php echo site_url('data/brand_models'); ?>',
            type: 'POST',
            cache: false,
            data: 'data=' + brandID,
            success: function(html) {
                console.log(html);
                $('#model_id').html(html);
            }
        });
    }

    function set_amount(e) {
        var rate = $("#rate_" + e).val();
        var qty = Number($("#qty_" + e).val());
        var tt = rate * qty;
        var tax = $("#tax_" + e).val();
        var ttax = (tt * (tax / 100));
        var total = ttax + tt;

        $("#amount_" + e).val(total);
        $("#itemstax").val(ttax);

        refresh_table();
    }

    function get_marked_price(e) {
        var markUp = e.value;
        var buyingPrice = document.getElementById("buying_price").value;
        var markedPrice = null;
        console.log("Markup: " + markUp + "\n Buying P.: " + buyingPrice);

        var a = Number(markUp) + 100;
        console.log("a: " + a);
        var b = a / 100;
        console.log("b: " + b);
        markedPrice = b * buyingPrice;
        console.log("markedPrice: " + markedPrice);

        $("#marked_price").val(markedPrice.toFixed(2));

    }

    function add_row() {

        $rowno = $("#order_table tr").length;
        $rowno = $rowno + 1;
        $("#order_table tr:last").after("<tr id='row" + $rowno + "'>  " +
            "<td> " +
            "<select name='item[]' class='select2 form-control' id='item_" + $rowno + "' tabindex='-1' required style='width: 100%;' >" +
            "<option >Select item</option>"
            <?php foreach ($all_items as $itm) : ?> +
                "<option value='<?php echo $itm->item_id ?>' ><?php echo $itm->item_name . ' - ' . $itm->barcode ?></option>"
            <?php endforeach; ?> +
            "</select> " +
            "</td> " +
            "<td><input type='number' class='form-control' onchange=qty('" + $rowno + "') onkeyup=qty('" + $rowno + "') name='qty[]' id='qty_" + $rowno + "' value='1' placeholder='Enter Qty'></td> " +
            "<td><input type='number' step='0.01' class='form-control' onkeyup=set_amount('" + $rowno + "') onchange=set_amount('" + $rowno + "') name='rate[]' id='rate_" + $rowno + "'></td> " +
            "<td> " +
            "<select class='form-control' name='tax[]' onchange=qty('" + $rowno + "') id='tax_" + $rowno + "' tabindex='-1' required>" +
            "<?php echo $tax_types; ?>"
            +
            "</select> " +
            "</td> " +
            "<td><input type='number' step='0.01' class='form-control' name='amount[]' id='amount_" + $rowno + "' readonly></td> " +
            "<td><button type='button' class='btn btn-rgd' onclick=delete_row('" + $rowno + "')><span class='fa fa-minus'></span></button></td> " +
            "</tr>");

        //$("#order_table tr:last").after(html);
        $(".select2").select2({
            allowClear: true
        });
        $(".select2_group").select2({
            allowClear: true
        });

        refresh_table();
    }
</script>

<script type="text/javascript">
    function delete_row(rowno) {
        $('#row' + rowno).remove();

        refresh_table();
    }
</script>

<script type="text/javascript">
    function qty(e) {
        //get the qty and increase appropriately
        var itemqty = Number($("#qty_" + e).val());
        var itemprice = $("#rate_" + e).val();
        var itemtax = $("#tax_" + e).val();
        if (itemprice != 0 || itemprice != null || itemprice != '') {
            itemprice = Number($("#rate_" + e).val());
            console.log("Itemprice: " + itemprice);
        } else {
            itemprice = 0;
        }
        var total = 0.00;
        //total = itemprice * itemqty;
        total = ((itemprice * (itemtax / 100)) + itemprice) * itemqty;
        $("#amount_" + e).val(total.toFixed(2));

        var ttax = (itemprice * itemqty * (itemtax / 100));
        $("#itemstax").val(ttax.toFixed(2));

        console.log(itemqty + " : " + itemprice + " : TT = " + total);

        refresh_table();

        //to balance the second part of footer section
        var paidAmount = Number($("#paid_amount").val());
        var itemstotal = Number($("#itemstotal").val());
        var balance = paidAmount - itemstotal;
        if (balance < 0) {
            //kuna deficit
            document.getElementById("submit").disabled = false;
            balance = balance * -1;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

            //set transaction_type to credit purchase
            $("#transaction_type").val(4);

        } else if (balance == 0) {
            //hakuna change
            document.getElementById("submit").disabled = false;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

            //set transaction_type to cash purchase
            $("#transaction_type").val(2);

        } else if (balance > 0) {
            //kuna change
            document.getElementById("submit").disabled = false;
            $("#paying_balance").val(0.00);
            $("#change_return").val(balance.toFixed(2));

            //set transaction_type to cash purchase
            $("#transaction_type").val(2);
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
        $("#paid_amount").val(sumVal.toFixed(2));
        $("#itemstax").val(sumTax.toFixed(2));

        //console.log(table.rows.length);
        console.log(sumVal.toFixed(2));
        //console.log(sumTax.toFixed(2));
        console.log('MESSAGE: Success');
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
            document.getElementById("submit").disabled = false;
            balance = balance * -1;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

            //set transaction_type to credit purchase
            $("#transaction_type").val(4);

        } else if (balance == 0) {
            //hakuna change
            document.getElementById("submit").disabled = false;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

            //set transaction_type to cash purchase
            $("#transaction_type").val(2);

        } else if (balance > 0) {
            //kuna change
            document.getElementById("submit").disabled = false;
            $("#paying_balance").val(0.00);
            $("#change_return").val(balance.toFixed(2));

            //set transaction_type to cash purchase
            $("#transaction_type").val(2);
        }
    }
</script>

<script>
    $(function() {
        $('#place_order_form').on('submit', function(e) {
            /*for add item*/
            e.preventDefault();

            $('#submit').html('').html('Wait while processing <i class="fa fa-spinner"></i>');
            $("#submit").attr("disabled", true);

            $.ajax({
                url: '<?php echo site_url(); ?>business/place_order', //this is the submit URL
                type: 'POST',
                data: $('#place_order_form').serialize(),
                success: function(data) {
                    console.log("Response: " + data);
                    var obj = JSON.parse(data);
                    if (obj.resp == '1') {
                        //success. then print receipt
                        var urll = "window.open('<?php echo site_url(); ?>business/sales_receipt/" + obj.last_id + "','receipt','width=400, height=800')";
                        document.getElementById("action_buttons").innerHTML = '<a href=""  onclick="' + urll + '" class="btn btn-success pull-right"><span class="fa fa-print"> Print Receipt</span></a>';

                        success_sound();
                        swal({
                            icon: 'success',
                            title: 'Success',
                            text: 'Transaction complete'
                        });

                        $("#submit").removeAttr('disabled');
                    } else {
                        error_sound();
                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: obj.message
                        });

                        $('#submit').html('').html('Submit');
                        $("#submit").removeAttr('disabled');
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

                        success_sound();

                        swal({
                            icon: 'success',
                            title: 'Success',
                            text: 'Transaction complete'
                        });

                    } else {
                        error_sound();
                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: obj.message
                        });
                    }
                    //action_buttons

                }
            });
        }); //end registration
    });
</script>