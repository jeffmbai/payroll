<?php
foreach ($active_user as $usr) {
    $entity_id = $usr->entity_id;
    $firstname = $usr->firstname;
    $secondname = $usr->secondname;
    $lastname = $usr->lastname;
    $name = $usr->firstname . ' ' . $usr->secondname . ' ' . $usr->lastname;
    $profile_picture = $usr->profile_picture;
    $role_name = $usr->role_name;
    $org_name = $usr->org_name;
}
?>
<style>
    .my-form {
        border-top: none;
        border-left: none;
        border-right: none;
        border-color: #008394;
    }

    .my-color {
        color: #000;
    }

    .rm,
    td .select2-selection {
        border: none !important;
    }

    .td {
        width: 300px;
    }

    .large {
        font-weight: bold;
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
                <div class="col-md-12">

                    <?php
                    //only sell if the selling point has been selected, and in session
                    if (isset($_SESSION['shop_id'])) {
                        $shop_name = $this->db->where('org_id', $_SESSION['shop_id'])->get('orgs')->row('org_name');
                        echo 'Selling from: <b>' . $shop_name . '</b>';
                    }
                    ?>

                    <p class="pull-right">
                        <?php
                        date_default_timezone_set('Africa/Nairobi');
                        echo 'Date:' . date('d-m-Y');
                        echo 'Time:' . date('h:i:sa');
                        ?>
                    </p>
                </div>
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

                    <div class="card card-outline card-warning">

                        <div class="card-body">
                            <?php if (isset($_SESSION['shop_id'])) { ?>
                                <form class="form-horizontal form-label-left" id="place_order_form" method="post" enctype="multipart/form-data" onsubmit="return false;">
                                    <input type="hidden" name="order_type" value="sale" required readonly>
                                    <div class="row">
                                        <div class="col-md-4" style="display: none;">
                                            <label class="">Select customer <span class="text text-danger">*</span> </label>
                                            <select class="select2 form-control" name="cutomer_supplier_id" required>
                                                <option value="0" selected>Walk in customer</option>
                                            </select>

                                            <label class="control-label" style="padding-top: 10px; display: none;">Date</label>
                                            <div style="padding-top: 10px; display: none;">
                                                <input type="date" class="form-control" readonly name="date_time" value="<?php echo date('Y-m-d'); ?>" required />
                                            </div>

                                            <input type="number" class="form-control" id="transaction_type" name="transaction_type_id" value="1" readonly required style="visibility: hidded; display: none;" />
                                            <?php if (isset($_SESSION['shop_id'])) : ?>
                                                <input type="number" class="form-control" id="store_id" name="store_id" value="<?= $_SESSION['shop_id'] ?>" readonly required style="visibility: hidded; display: none;" />
                                            <?php endif; ?>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Name </label>
                                            <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="Customer name" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Phone </label>
                                            <input type="number" class="form-control" name="customer_phone" id="customer_phone" placeholder="07123..." />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Email</label>
                                            <input type="email" name="customer_email" class="form-control" id="customer_email" placeholder="Customer email" />
                                        </div>
                                    </div>

                                    <br />

                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 table-responsive">
                                            <table class="table table-bordered table-striped table-condensed" id="order_table">
                                                <thead>
                                                    <tr id="row1">
                                                        <td class="td"><b>Barcode</b></td>
                                                        <td class="td"><b>Item</b></td>
                                                        <td style="width: 70px;"><b>Qty</b></td>
                                                        <td><b>Unit Price</b></td>
                                                        <td style="width: 100px"><b>Tax</b></td>
                                                        <td><b>Amount + Tax</b></td>
                                                        <td>
                                                            <button type="button" class="btn btn-default" id="add_row_button" onclick="add_row(null)"><span class="fa fa-plus"></span></button>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="row2">
                                                        <td class="td">
                                                            <input name="barcode[]" autofocus type="text" class="rm form-control" id="barcode_2" onkeyup="get_this_item(2)" required />
                                                        </td>
                                                        <td class="td">
                                                            <select name="item[]" class="rm select2 form-control" onchange="select_item(2)" id="item_2" required style="width: 100%">
                                                                <option value="">Select item</option>
                                                                <?php
                                                                foreach ($all_items as $dt) {
                                                                ?>
                                                                    <option value="<?= $dt->item_id; ?>"> <?= $dt->barcode . ' ' . $dt->item_name; ?> </option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="rm form-control" onkeyup=qty(2) onchange=qty(2) name="qty[]" id="qty_2" value="1"></td>
                                                        <td>
                                                            <input type="text" class="rm form-control" onkeyup="set_amount(2)" name="rate[]" id="rate_2">
                                                            <input type="text" class="rm form-control" readonly id="rateb_2" style="display:none;">
                                                        </td>
                                                        <td><input type="text" class="rm form-control large" name="tax[]" id="tax_2" style="pointer-events: none;" /></td>
                                                        <td><input type="text" class="rm form-control large" name="amount[]" id="amount_2" style="pointer-events: none;" /></td>
                                                        <td><button type="button" class="btn btn-rgd" onclick=delete_row(2)><span class="fa fa-minus"></span></button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row" style="margin: 50px; padding: 15px; background-color: aliceblue; border-radius: 5px;">
                                        <div class="col-md-4">
                                            <label>Tax: </label>
                                            <input type="text" readonly name="itemstax" id="itemstax" class="money form-control" style="width: 90%;">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Total: </label>
                                            <input type="text" readonly name="total" id="itemstotal" class="money form-control" style="width: 90%;">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Amount Paying: </label>
                                            <input type="number" name="paid_amount" id="paid_amount" onkeyup="get_change_return(this)" class="money form-control" style="width: 90%; background-color: #1ABB9C; color: #fff;" autofocus="false" />
                                        </div>
                                        <div class="col-md-4" style="display: none;">
                                            <label>Desk </label>
                                            <select class="select2 form-control" name="eating_table_id" style="width: 90%;" required>
                                                <option value=""> Select desk </option>
                                                <?php
                                                foreach ($eating_tables as $eat) {
                                                ?>
                                                    <option value="<?php echo $eat->eating_table_id; ?>" <?php if ($eat->eating_table_id == 1) echo "selected"; ?>> <?php echo $eat->eating_table_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Payment Method: </label>
                                            <select class="select2 form-control" name="payment_mode_id" style="width: 90%;" required>
                                                <option value=""> Select payment mode </option>
                                                <?php
                                                foreach ($payment_modes as $pm) {
                                                ?>
                                                    <option value="<?= $pm->account_id; ?>"> <?= $pm->account_name . ' [' . $pm->account_code . ']'; ?> </option>
                                                <?php
                                                }
                                                ?>
                                                <option value="0" selected> Not Applicable </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Balance: </label>
                                            <input type="number" readonly name="paying_balance" id="paying_balance" class="money form-control" style="width: 90%;">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Change Return: </label>
                                            <input type="number" readonly name="change_return" id="change_return" class="money form-control" style="width: 90%; background-color: #E6A56C;">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Reference: <small>(If any)</small> </label>
                                            <input type="text" name="reference" id="reference" class="money form-control" style="width: 90%;">
                                        </div>
                                        <div class="col-xs-12 col-md-12">
                                            <br />
                                            <p style="padding-right: 30px" id="action_buttons">
                                                <button type="btnSubmit" class="btn btn-primary btn-lg pull-right" onclick="parentNode.submit();" id="btnSubmit" disabled>Sell <span class="fa fa-money"></span></button>
                                            </p>
                                        </div>
                                    </div>

                                </form>
                            <?php } else { ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="text-danger fa fa-warning"> No selling point selected. Kindly click the button at the top-right to select your selling point. <i class="fa fa-external-link"></i> </span>
                                    </div>
                                </div>
                            <?php } ?>

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



<!-- SP Modal -->
<div id="sp" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Selling Point(SP)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Select shop/store you're selling from</label>
                        <select class="form-control" onchange="set_org(this)">
                            <option value="">~ Select option ~</option>
                            <?php
                            $orgas = $this->db->where("parent_org IS NOT NULL OR parent_org <> '' ")->get('orgs')->result();
                            foreach ($orgas as $or) echo '<option value="' . $or->org_id . '" > ' . $or->org_name . ' </option>';
                            ?>
                            <option value=""> Close selling point </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>
    function set_org(e) {
        $.ajax({
            url: '<?php echo site_url('data/set_org'); ?>',
            type: 'POST',
            cache: false,
            data: {
                id: e.value
            },
            success: function(html) {
                //$('#item_description').html(html);
                console.log("Response: " + html);
                location.reload();
            }
        });
    }
</script>


<script type="text/javascript">
    function get_stock(reag) {
        var searchtxt = reag.value;
        var searchtype = 1;
        //get the search type
        if (document.getElementById('search_type1').checked) {
            searchtype = document.getElementById('search_type1').value;
        } else if (document.getElementById('search_type2').checked) {
            searchtype = document.getElementById('search_type2').value;
        }
        console.log("Search text: " + searchtxt);
        console.log("Search type: " + searchtype);

        $.ajax({
            url: '<?php echo site_url('data/get_stock'); ?>',
            type: 'POST',
            cache: false,
            data: {
                stxt: searchtxt,
                stype: searchtype,
                spurpose: 'sale'
            },
            success: function(html) {
                //$('#item_description').html(html);
                console.log("Response: " + html);
                document.getElementById('x_content').innerHTML = html;
            }
        });
    }

    $(document).ready(function() {
        //get the general stock
        var searchtxt = '';
        var searchtype = 1;
        // $.ajax({
        //     url: '<?php echo site_url('data/get_stock'); ?>',
        //     type: 'POST',
        //     cache: false,
        //     data: { stxt : searchtxt, stype : searchtype },
        //     success: function(html){
        //         //$('#item_description').html(html);
        //         console.log("Response: " + html);
        //         document.getElementById('x_content').innerHTML = html;
        //     }
        // });
    });
</script>

<script type="text/javascript">
    function add_row(e) {
        //where 'e' is the item_id
        console.log("ItemID: " + e);

        $rowno = $("#order_table tr").length;
        $rowno = $rowno + 1;

        $("#order_table tr:last").after("<tr id='row" + $rowno + "'>" +
            "<td class='td'>" +
            "<input name='barcode[]' type='text' class='rm form-control' id='barcode_" + $rowno + "' onkeyup='get_this_item(" + $rowno + ")' required />" +
            "</td>" +
            "<td class='td'>" +
            "<select name='item[]' class='rm select2 form-control' onchange='select_item(" + $rowno + ")' id='item_" + $rowno + "' required style='width: 100%' >" +
            "<option value=''>Select item</option>"
            <?php foreach ($all_items as $dt) : ?> +
                "<option value='<?php echo $dt->item_id; ?>'> <?php echo $dt->barcode . ' ' . $dt->item_name; ?> </option>"
            <?php endforeach; ?> +
            "</select>" +
            "</td>" +
            "<td><input type='text' class='rm form-control' onkeyup=qty(1) onchange=qty(" + $rowno + ") name='qty[]' id='qty_" + $rowno + "' value='1'></td>" +
            "<td>" +
            "<input type='text' class='rm form-control' onkeyup='set_amount(" + $rowno + ")' name='rate[]'  id='rate_" + $rowno + "' >" +
            "<input type='text' class='rm form-control' readonly id='rateb_" + $rowno + "' style='display:none;' >" +
            "</td>" +
            "<td><input type='text' class='rm form-control large' name='tax[]' id='tax_" + $rowno + "' style='pointer-events: none;' ></td>" +
            "<td><input type='text' class='rm form-control large' name='amount[]' id='amount_" + $rowno + "' style='pointer-events: none;' ></td>" +
            "<td><button type='button' class='btn btn-rgd' onclick=delete_row(" + $rowno + ")><span class='fa fa-minus'></span></button></td>"


            +
            "</tr>");

        if (e != null || e != 0) {
            //get item details
            $.ajax({
                url: '<?php echo site_url('data/specific_item'); ?>',
                type: 'POST',
                cache: false,
                data: 'data=' + e,
                success: function(data) {
                    console.log("Resp: " + data);
                    var obj = JSON.parse(data);
                    if (obj.data_control == '0') {
                        //no data available
                    } else {
                        //data available
                        //$("#item_"+e).val(obj.item_id);
                        var amountt = (obj.marked_price * (obj.tax_rate / 100)) + Number(obj.marked_price);
                        $("#barcode_" + $rowno).val(obj.barcode);
                        $("#item_" + $rowno).val(obj.item_id).change();
                        //$("#item_name"+$rowno).val(obj.item_name);  
                        $("#qty_" + $rowno).val(1);
                        $("#rate_" + $rowno).val(obj.marked_price);
                        $("#rateb_" + $rowno).val(obj.marked_price);
                        $("#tax_" + $rowno).val(obj.marked_price * (obj.tax_rate / 100));
                        $("#amount_" + $rowno).val(amountt);
                        console.log("Cell Amount Value1: " + amountt);
                        console.log("Cell Amount Value2: " + $("#amount_" + $rowno).val());

                        refresh_table();
                    }
                }
            });
        }

        //$("#order_table tr:last").after(html);
        $(".select2").select2({
            placeholder: "Select a state",
            allowClear: true
        });

        //remove focus from the button
        //document.getElementById("add_row_button").blur(); 
        //focus on the input field
        document.getElementById("barcode_" + $rowno).focus();
    }
</script>

<script type="text/javascript">
    function delete_row(rowno) {
        $('#row' + rowno).remove();

        refresh_table();
    }
</script>

<script type="text/javascript">
    function set_amount(e) {
        var itemid = $("#item_" + e).val();
        var itemqty = Number($("#qty_" + e).val());
        var itemprice = Number($("#rate_" + e).val());
        var itemprice2 = Number($("#rateb_" + e).val());
        var itemtax = Number($("#tax_" + e).val());
        var paidAmount = document.getElementById("paid_amount").value;
        var total = null;

        //check whether this amount is less than the marked price, then reassign the original value
        if (itemprice < itemprice2) {
            itemprice = itemprice2;
            $("#rate_" + e).val(itemprice2);
        }

        total = (itemprice + itemtax) * itemqty;

        $("#qty_" + e).val(itemqty);
        $("#tax_" + e).val(itemtax);
        $("#amount_" + e).val(total.toFixed(2));

        if (paidAmount != null || paidAmount != '') {
            console.log("Paid Amount: " + paidAmount);
            //then update the payment section
            paidAmount = Number(paidAmount);
            var balance = paidAmount - total;

            console.log("Balance: " + balance);

            if (balance < 0) {
                //kuna deficit, deni
                document.getElementById("btnSubmit").disabled = false;
                balance = balance * -1;
                $("#paying_balance").val(balance.toFixed(2));
                $("#change_return").val(0.00);

                //set transaction_type to credit sale
                $("#transaction_type").val(3);

            } else if (balance == 0) {
                //hakuna change
                document.getElementById("btnSubmit").disabled = false;
                $("#paying_balance").val(balance.toFixed(2));
                $("#change_return").val(0.00);
                //set transaction_type to cash sale
                $("#transaction_type").val(1);

            } else if (balance > 0) {
                //kuna change
                document.getElementById("btnSubmit").disabled = false;
                $("#paying_balance").val(0.00);
                $("#change_return").val(balance.toFixed(2));
                //set transaction_type to cash sale
                $("#transaction_type").val(1);

            }
        } else {
            console.log("No paid amount");
        }

        refresh_table();

    }
</script>

<script type="text/javascript">
    function qty(e) {
        //get the qty and increase appropriately
        var itemqty = Number($("#qty_" + e).val());
        var itemprice = Number($("#rate_" + e).val());
        var itemtax = Number($("#tax_" + e).val());
        var total = null;
        total = ((itemprice * (itemtax / 100)) + itemprice) * itemqty;
        $("#amount_" + e).val(total.toFixed(2));

        refresh_table();
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

    function get_this_item(e) {
        //search item by barcode
        var barcode = $("#barcode_" + e).val();

        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            //alert('Reagan');
            add_row(null);
            return false;
        } else {}


        console.log("Search Barcode: " + barcode);
        if (barcode == null || barcode == '') {
            return;
            console.log("No search item...");
        }
        $.ajax({
            url: '<?php echo site_url('data/search_barcode'); ?>',
            type: 'POST',
            cache: false,
            data: 'data=' + barcode,
            success: function(data) {
                console.log("Resp: " + data);
                var obj = JSON.parse(data);
                if (obj.data_control == '0') {
                    //no data available. reset form
                    //console.log("No data available: " + obj.data_control);
                    //alert('No data');
                } else {
                    //data available
                    var amountt = (obj.marked_price * (obj.tax_rate / 100)) + Number(obj.marked_price);
                    //$("#barcode_"+e).val(obj.barcode);
                    $("#item_" + e).val(obj.item_id).change();
                    //$("#item_name"+e).val(obj.item_name);  
                    $("#qty_" + e).val(1);
                    $("#rate_" + e).val(obj.marked_price);
                    $("#rateb_" + e).val(obj.marked_price);
                    $("#tax_" + e).val(obj.marked_price * (obj.tax_rate / 100));
                    $("#amount_" + e).val(amountt);
                    //console.log("#amount_"+ e + $("#amount_"+e).val());
                }
            }
        });

        refresh_table();
    }
</script>

<script>
    function select_item(e) {
        //alert(e);
        var itemid = $("#item_" + e).val();
        console.log("Search ItemID: " + itemid);
        if (itemid == null || itemid == '') {
            console.log("No search item...");
            return;
        }
        $.ajax({
            url: '<?php echo site_url('data/specific_item'); ?>',
            type: 'POST',
            cache: false,
            data: 'data=' + itemid,
            success: function(data) {
                console.log("Resp: " + data);
                var obj = JSON.parse(data);
                if (obj.data_control == '0') {
                    //no data available. reset form
                    console.log("No data available: " + obj.data_control);
                    //alert('No data');
                } else {
                    //data available
                    var amountt = (obj.marked_price * (obj.tax_rate / 100)) + Number(obj.marked_price);
                    $("#barcode_" + e).val(obj.barcode);
                    //$("#item_"+e).val(obj.item_id).change();
                    //$("#item_name"+e).val(obj.item_name);  
                    $("#qty_" + e).val(1);
                    $("#rate_" + e).val(obj.marked_price);
                    $("#rateb_" + e).val(obj.marked_price);
                    $("#tax_" + e).val(obj.marked_price * (obj.tax_rate / 100));
                    $("#amount_" + e).val(amountt);
                    //console.log("#amount_"+ e + $("#amount_"+e).val());
                }
            }
        });

        refresh_table();
    }
</script>

<script>
    function get_change_return(e) {
        var paidAmount = Number(e.value);
        var itemstotal = Number($("#itemstotal").val());
        var balance = paidAmount - itemstotal;
        if (balance < 0) {
            //kuna deficit, deni
            document.getElementById("btnSubmit").disabled = false;
            balance = balance * -1;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

            //set transaction_type to cash sale
            $("#transaction_type").val(3);

        } else if (balance == 0) {
            //hakuna change
            document.getElementById("btnSubmit").disabled = false;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

            //set transaction_type to cash sale
            $("#transaction_type").val(1);

        } else if (balance > 0) {
            //kuna change
            document.getElementById("btnSubmit").disabled = false;
            $("#paying_balance").val(0.00);
            $("#change_return").val(balance.toFixed(2));

            //set transaction_type to cash sale
            $("#transaction_type").val(1);
        }
    }
</script>

<script>
    $(function() {
        $('#place_order_form').on('submit', function(e) {
            /*for add item*/

            if (event.keyCode === 13) {
                // Cancel the default action, if needed, especially by enter button
                event.preventDefault();
                return false;
            }

            if ($("#paid_amount").val() == '' || $("#paid_amount").val() == null) {
                swal({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Missing value in payment amount field'
                });
                exit();
            }

            $('#btnSubmit').html('').html('Wait while processing <i class="fa fa-spinner"></i>');
            $("#btnSubmit").attr("disabled", true);

            $.ajax({
                url: '<?php echo site_url('business/place_order'); ?>', //this is the submit URL
                type: 'POST',
                data: $('#place_order_form').serialize(),
                success: function(data) {
                    console.log("Response: " + data);
                    var obj = JSON.parse(data);
                    //$('#alert').html(data);
                    console.log("resp: " + obj.resp);
                    console.log("message: " + obj.message);
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

                        $("#btnSubmit").removeAttr('disabled');

                        //reset form
                        $('#order_table > tr').remove();
                        $('#place_order_form').trigger("reset");

                    } else {
                        
                        error_sound();

                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: 'Transaction failed!'
                        });

                        $('#btnSubmit').html('').html('Sell <span class="fa fa-money"></span>');
                        $("#btnSubmit").removeAttr('disabled');
                    }
                    //action_buttons

                }
            });
        }); //end registration
    });
</script>

<script type="text/javascript">
    function refresh_table() {
        var table = document.getElementById("order_table");
        var sumTax = 0;
        var sumVal = 0;

        console.log("Table Length: " + table.rows.length);
        for (var i = 1; i <= table.rows.length; i++) {
            if ($("#amount_" + i).val() != null) {
                console.log("#amount_" + i + " : " + ($("#amount_" + i).val()));
                console.log("#tax_" + i + " : " + ($("#tax_" + i).val()));
                sumVal = sumVal + Number($("#amount_" + i).val());
                sumTax = sumTax + Number($("#tax_" + i).val());
            }
        }
        $("#itemstotal").val(sumVal.toFixed(2));
        $("#itemstax").val(sumTax.toFixed(2));
        console.log(sumVal.toFixed(2));
        console.log(sumTax.toFixed(2));
        console.log('MESSAGE: Success');

        //update then payment part too
        var grandTotal = (sumVal + sumTax).toFixed(2);
        console.log("Grand Total: " + grandTotal);
        document.getElementById("btnSubmit").disabled = false;
        // $("#paid_amount").val(grandTotal);
        $("#paying_balance").val(0.00);
        $("#change_return").val(0.00);

        //set transaction_type to cash sale
        $("#transaction_type").val(1);
    }
</script>