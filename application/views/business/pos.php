<?php
$CI = &get_instance();

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
        width: 250px;
    }

    .large {
        font-weight: bold;
    }

    .paid_amount {
        width: 90% !important;
        background-color: #fff !important;
        color: #000 !important;
        border: 1px solid #0BA88A !important;
        font-size: 20px !important;
        font-weight: 800 !important;
    }

    .total_amount {
        background-color: #fff !important;
        color: #000 !important;
        border: 1px solid orangered !important;
        font-size: 20px !important;
        font-weight: 900 !important;
    }

    .jtl-info-box:hover {
        outline: 2px solid orange;
        cursor: pointer;
    }
</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content" style="padding-top: 10px;">
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

            <style>
                .category-group>.row {
                    overflow-x: auto;
                    white-space: nowrap;
                }

                .category-group>.row>.col-sm-1 {
                    display: inline-block;
                    float: none;
                }
            </style>

            <div class="container category-group">
                <div class="row text-center flex-nowrap" id="container">
                    <?php
                    if (isset($_SESSION['shop_id'])) :
                        $categories = $this->db->get('categories')->result();
                        foreach ($categories as $cat) {
                    ?>
                            <div class="col-md-1" style="width: 120px; padding: 1px 5px 1px 5px;">
                                <div class="info-box jtl-info-box" title="<?= $cat->cat_name ?>" onclick="get_category_items(<?= $cat->cat_id ?>)">
                                    <span class="info-box-icon bg-orange elevation-1" style="width: 100% !important; font-size:unset;"> <?= $cat->cat_name ?> </span>
                                </div>
                            </div>
                    <?php
                        }
                    endif;
                    ?>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-1">
                        <button type="button" class="btn btn-xs btn-rgp pull-right mr-1" title="Next" onclick="slide('right')">Next <i class="fa fa-forward"></i></button>
                        <button type="button" class="btn btn-xs btn-rgp pull-right mr-1" title="Previous" onclick="slide('left')"><i class="fa fa-backward"></i> Prev</button>
                    </div>
                </div>
            </div>

            <script>
                function slide(direction) {
                    var container = document.getElementById('container');
                    scrollCompleted = 0;
                    var slideVar = setInterval(function() {
                        if (direction == 'left') {
                            container.scrollLeft -= 10;
                        } else {
                            container.scrollLeft += 10;
                        }
                        scrollCompleted += 10;
                        if (scrollCompleted >= 100) {
                            window.clearInterval(slideVar);
                        }
                    }, 50);
                }
            </script>

            <div class="row">

                <div class="col-md-7 col-sm-12">
                    <div class="card card-outline card-warning">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="place_order_form" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="order_type" value="sale" required readonly>
                                <div class="row">
                                    <div class="col-md-4" hidden>
                                        <label class="">Select customer <span class="text text-danger">*</span> </label>
                                        <select class="select2 form-control" name="cutomer_supplier_id" required>
                                            <option value="0" selected>Walk in customer</option>
                                        </select>

                                        <label class="control-label" style="padding-top: 10px; display: none;">Date</label>
                                        <div style="padding-top: 10px; display: none;">
                                            <input type="date" class="form-control" readonly name="date_time" value="<?php echo date('Y-m-d'); ?>" required />
                                        </div>

                                        <input type="number" class="form-control" id="transaction_type" name="transaction_type_id" value="3" readonly required />
                                        <?php if (isset($_SESSION['shop_id'])) : ?>
                                            <input type="number" class="form-control" id="store_id" name="store_id" value="<?= $_SESSION['shop_id'] ?>" readonly required style="visibility: hidded; display: none;" />
                                        <?php endif; ?>

                                    </div>

                                    <div class="col-md-12">

                                        <?php
                                        //only sell if the selling point has been selected, and in session
                                        if (isset($_SESSION['shop_id'])) {
                                            $shop_name = $this->db->where('org_id', $_SESSION['shop_id'])->get('orgs')->row('org_name');
                                            echo 'Selling from: <b>' . $shop_name . '</b>';
                                        } else {
                                            //no selling point selected
                                            echo '<span class="text-danger fa fa-warning"> No selling point selected. Kindly click the button at the top-right to select your selling point. </span>';
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

                                <div class="row" style="margin-top: 30px;">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover" id="order_table">
                                            <thead>
                                                <tr>
                                                    <td class="td"><b>Item</b></td>
                                                    <td style="width: 90px;"><b>Qty</b></td>
                                                    <td><b>Unit Price</b></td>
                                                    <td style="width: 100px"><b>Tax</b></td>
                                                    <td><b>Amount + Tax</b></td>
                                                    <td>
                                                        <!-- <button type="button" class="btn btn-default" id="add_row_button" onclick="add_row(null)"><span class="fa fa-plus"></span></button> -->
                                                    </td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <label>Tax: </label>
                                        <input type="text" readonly name="itemstax" id="itemstax" class="money form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Total: </label>
                                        <input type="text" readonly name="total" id="itemstotal" class="money total_amount form-control">
                                    </div>
                                    <div class="col-md-4" title="Table can only be release upon settling of the order bill or by admin!">
                                        <label>Counter/Table </label>
                                        <select class="form-control" name="eating_table_id" required>
                                            <?php
                                            foreach ($eating_tables as $eat) {
                                                if($eat->active == 0) continue;
                                            ?>
                                                <option value="<?php echo $eat->eating_table_id; ?>"> <?php echo $eat->eating_table_name; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Payment Method: </label>
                                        <select class="form-control" name="payment_mode_id" required>
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
                                        <label>Amount Paying: </label>
                                        <input type="number" name="paid_amount" id="paid_amount" onkeyup="get_change_return(this)" class="money paid_amount form-control" autofocus="false" />
                                    </div>
                                    <div class="col-md-4">
                                        <label>Reference: </label>
                                        <input type="text" maxlength="20" name="reference" id="other_reference" value="NA" placeholder="Other reference" class="money form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Balance: </label>
                                        <input type="number" readonly name="paying_balance" id="paying_balance" class="money form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Change Return: </label>
                                        <input type="number" readonly name="change_return" id="change_return" class="money form-control" style=" background-color: #E6A56C;">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Discount: </label>
                                        <input type="number" name="discount" id="discount" class="money form-control" value="0" autofocus="false" />
                                    </div>
                                    <div class="col-md-12 pt-3">
                                        <p style="padding-right: 10px" id="action_buttons">
                                            <button type="submit" class="btn btn-app bg-primary btn-lg pull-right btnapp-rg " id="submit" disabled title="Submit Data"><span class="fa fa-money"></span> Sell</button>

                                            <a href="<?= site_url('pages/pos_signin'); ?>" class="btn btn-app bg-default btn-lg pull-left btnapp-rg " title="Logout?"><i class="fa fa-sign-out"></i> Logout</a>
                                            <button type="button" onclick="get_discount()" class="btn btn-app bg-success btn-lg pull-left btnapp-rg" title="Apply Discount?" id="disc"><i class="fa fa-minus-square-o"></i> Apply Discount</button>
                                        </p>
                                    </div>

                                </div>

                            </form>
                        </div><!-- /.card-body -->
                    </div>

                </div>

                <?php if (isset($_SESSION['shop_id'])) : ?>
                    <div class="col-md-5 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-6" style="display: none;">
                                        <label><input type="radio" class="flat" name="search_type" id="search_type1" value="1" /> General</label>
                                        <label><input type="radio" class="flat" name="search_type" id="search_type2" checked value="2" /> Specified</label>
                                    </div>
                                    <!-- <div class="col-md-9 col-sm-8 col-xs-6"> -->
                                    <div class="col-md-12">
                                        <input type="text" name="search" id="search" onchange="get_stock(this)" onkeyup="get_stock(this)" class="form-control" placeholder="Search item here..." />
                                    </div>
                                </div>

                                <div class="row" style="max-height:800px; overflow-y:auto; margin: 2px" id="fetch_content">
                                    <?php

                                    foreach ($all_items as $itm) {
                                        //if($itm->for_sale != 1) continue;
                                    ?>
                                        <div class="col-md-3 col-sm-4 col-xs-6" style="border: 1px solid #007f7629; padding: 10px;">
                                            <div class="thumbnail" style="height: 180px !important;">
                                                <button class="wrapper" onclick="add_row(<?php echo $itm->item_id; ?>)" <?php if ($itm->available_qty < 1) echo 'disabled'; ?> style="background: none; border: none;">
                                                    <span class="badge bg-info" titlw="Balance Qty"><?= $itm->available_qty ?></span>
                                                    <div class="image view view-first" style="height: 90px !important;">
                                                        <img style="height: 100%; display: block;" src="<?php echo base_url('assets/images/items/' . $itm->image); ?>" alt="image" />
                                                    </div>
                                                    <div class="caption" style="background-color: transparent !important;">
                                                        <small><?= $itm->item_name; ?></small>
                                                        <br />
                                                        <small><b><?= number_format($itm->marked_price); ?></b></small>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    <?php
                                    }

                                    ?>
                                </div>

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


<!-- SP Modal -->
<div id="sp" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button> -->
                <h4 class="modal-title">Selling Point(SP)</h4>
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


<script>
    function get_discount() {
        var discount = $('#discount').val();;
        var balance = $('#paying_balance').val();
        var paid_amount = $('#paid_amount').val();
        var new_balance = balance - discount;
        var new_paid = paid_amount - discount;
        //set the new balance
        if (new_balance > 0) {
            $('#paying_balance').val(new_balance);
        } else {
            $('#paying_balance').val(0);
        }

        $('#paid_amount').val(new_paid);

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
                // document.getElementById('fetch_content').innerHTML = html;
                $('#fetch_content').html('').html(html);
            }
        });
    }

    function get_category_items(id) {
        //get the search type
        $.ajax({
            url: '<?php echo site_url('data/get_category_items'); ?>',
            type: 'POST',
            cache: false,
            data: {
                id: id,
            },
            success: function(html) {
                console.log("Response: " + html);
                $('#fetch_content').html('').html(html);
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
        //         document.getElementById('fetch_content').innerHTML = html;
        //     }
        // });
    });
</script>

<script>
    function set_discount(e) {
        var discount = $('#discount').val();
        var paid_amount = $('#paid_amount').val();
        var bal = paid_amount - discount;
        //set the amount paid
        //$('#paid_amount').val(bal); //wrong logic
        //alert(discount);
    }
</script>

<script type="text/javascript">
    function add_row(e) {
        //where 'e' is the item_id
        console.log("ItemID: " + e);

        $rowno = $("#order_table tr").length;
        $rowno = $rowno + 1;

        $("#order_table tr:last").after("<tr id='row" + $rowno + "' >  " +
            "<td class='td'> " +
            "<input name='item[]' type='hidden' class='rm form-control' id='item_" + $rowno + "' value='" + e + "' style='pointer-events: none;' required />" +
            "<input name='item_name[]' class='rm form-control' id='item_name" + $rowno + "' style='pointer-events: none;'  required />" +
            "</td> " +
            "<td><input type='number' class='rm form-control' onkeyup=qty('" + $rowno + "') onchange=qty('" + $rowno + "') name='qty[]' id='qty_" + $rowno + "' value='1'></td> " +
            "<td> " +
            "<input type='text' class='rm form-control' readonly onkeyup='set_amount(" + $rowno + ")' name='rate[]' id='rate_" + $rowno + "' style='pointer-events: none;' > " +
            "<input type='hidden' class='rm form-control' readonly id='rateb_" + $rowno + "' style='pointer-events: none;' >" +
            "<input type='hidden' class='rm form-control' readonly id='ratec_" + $rowno + "' name='buying_price[]' style='pointer-events: none;' >" +
            "</td> " +
            "<td> " +
            "<input type='text' class='rm form-control tax' name='tax[]' id='tax_" + $rowno + "' style='pointer-events: none;' >" +
            "<input type='hidden' readonly class='rm form-control' id='taxrate_" + $rowno + "' style='pointer-events: none;' >" +
            "</td> " +
            "<td><input type='text' class='rm form-control total' name='amount[]' id='amount_" + $rowno + "' style='pointer-events: none;' ></td> " +
            "<td><button type='button' class='btn btn-xs btn-rgd' title='Remove Item?' onclick=delete_row('" + $rowno + "')><span class='fa fa-minus'></span></button></td> " +
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
                        $("#item_name" + $rowno).val(obj.item_name + ' - ' + obj.barcode);
                        $("#qty_" + $rowno).val(1);
                        $("#rate_" + $rowno).val(obj.marked_price);
                        $("#rateb_" + $rowno).val(obj.marked_price);
                        $("#ratec_" + $rowno).val(obj.buying_price);
                        $("#tax_" + $rowno).val(obj.marked_price * (obj.tax_rate / 100));
                        $("#taxrate_" + $rowno).val(obj.marked_price * (obj.tax_rate / 100));
                        $("#amount_" + $rowno).val(amountt);
                        console.log("Cell Amount Value1: " + amountt);
                        console.log("Cell Amount Value2: " + $("#amount_" + $rowno).val());

                        refresh_table();
                    }
                }
            });
        } else {
            //do nothing
        }

        //$("#order_table tr:last").after(html);
        $(".select2").select2({
            placeholder: "Select a state",
            allowClear: true
        });

        //remove focus from the button
        //document.getElementById("add_row_button").blur(); 
        //focus on the input field
        //document.getElementById("barcode_"+$rowno).focus(); 
    }
</script>
<script type="text/javascript">
    function delete_row(rowno) {
        $('#row' + rowno).remove();

        refresh_table();
    }
</script>
<script type="text/javascript">
    function set_qty(e) { //where e is row number
        if (e != null) {
            var itemid = $("#item_" + e).val();
            var itemqty = Number($("#qty_" + e).val());
            var itemname = null;
            var itemprice = null;
            var itemtax = null;
            var barcode = null;
            var total = null;
            <?php foreach ($all_items as $im) : ?>
                if (itemid == '<?php echo $im->item_id ?>') {
                    itemprice = Number('<?php echo $im->marked_price ?>');
                    itemtax = Number('<?php echo $im->tax_rate ?>');
                    barcode = '<?php echo $im->barcode; ?>';
                    itemname = '<?php echo $im->brand_name . ' ' . $im->model_name . ' ' . $im->color . ' ' . $im->capacity; ?>';
                }
            <?php endforeach; ?>
            total = ((itemprice * (itemtax / 100)) + itemprice) * itemqty;

            $("#qty_" + e).val(itemqty);
            $("#item_name" + e).val(itemname);
            $("#barcode_" + e).val(barcode);
            $("#tax_" + e).val(itemtax);
            $("#rate_" + e).val(itemprice);
            $("#rateb_" + e).val(itemprice);
            $("#amount_" + e).val(total.toFixed(2));

            document.getElementById("item_name" + e).blur();

            refresh_table();
        }

    }

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

            if (paidAmount != 0) {
                if (balance < 0) {
                    //kuna deficit, deni
                    document.getElementById("submit").disabled = false;
                    balance = balance * -1;
                    $("#paying_balance").val(balance.toFixed(2));
                    $("#change_return").val(0.00);

                    //set transaction_type to credit sale
                    $("#transaction_type").val(3);

                } else if (balance == 0) {
                    //hakuna change
                    document.getElementById("submit").disabled = false;
                    $("#paying_balance").val(balance.toFixed(2));
                    $("#change_return").val(0.00);
                    //set transaction_type to cash sale
                    $("#transaction_type").val(1);

                } else if (balance > 0) {
                    //kuna change
                    document.getElementById("submit").disabled = false;
                    $("#paying_balance").val(0.00);
                    $("#change_return").val(balance.toFixed(2));
                    //set transaction_type to cash sale
                    $("#transaction_type").val(1);

                }
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
        var itemtaxrate = Number($("#taxrate_" + e).val());
        var total = null;
        var total_tax = itemtaxrate * itemqty;
        // total = ((itemprice * (itemtax / 100)) + itemprice) * itemqty;
        total = total_tax + (itemprice * itemqty);
        $("#amount_" + e).val(total.toFixed(2));
        $("#tax_" + e).val(total_tax.toFixed(2));

        //console.log(itemqty + " : " + itemprice + " : " + itemtax + " : TT = " + total);
        refresh_table();
    }
</script>
<script type="text/javascript">
    function refresh_table() {
        var table = document.getElementById("order_table");
        var sumTax = 0;
        var sumVal = 0;

        console.log("Table Length: " + table.rows.length);
        //get the total prices
        var tt = document.getElementsByClassName("total");
        for (var i = 0; i < tt.length; ++i) {
            if (typeof tt[i].value !== "undefined") {
                //names.push(elem[i].value);
                sumVal = sumVal + Number(tt[i].value);
            }
        }
        //get the total taxes
        var tax = document.getElementsByClassName("tax");
        var names = [];
        for (var i = 0; i < tax.length; ++i) {
            if (typeof tax[i].value !== "undefined") {
                //names.push(elem[i].value);
                sumTax = sumTax + Number(tax[i].value);
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
        document.getElementById("submit").disabled = false;
        // $("#paid_amount").val(grandTotal);
        $("#paid_amount").val(0.00); // make zero be default
        $("#paying_balance").val(grandTotal);
        // $("#change_return").val(0.00);

        //set transaction_type to cash sale
        // $("#transaction_type").val(1);
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
        e.preventDefault;
        var barcode = $("#barcode_" + e).val();
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
                //console.log("Resp: " + data);
                var obj = JSON.parse(data);
                if (obj.data_control == '0') {
                    //no data available. reset form
                    //console.log("No data available: " + obj.data_control);
                    alert('No data');
                } else {
                    //data available
                    var amountt = (obj.marked_price * (obj.tax_rate / 100)) + Number(obj.marked_price);
                    $("#item_" + e).val(obj.item_id);
                    $("#item_name" + e).val(obj.brand_name + ' ' + obj.model_name + ' ' + obj.color + ' ' + obj.capacity);
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
            //kuna deficit, deni
            document.getElementById("submit").disabled = false;
            balance = balance * -1;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

            //set transaction_type to cash sale
            $("#transaction_type").val(3);

        } else if (balance == 0) {
            //hakuna change
            document.getElementById("submit").disabled = false;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

            //set transaction_type to cash sale
            $("#transaction_type").val(1);

        } else if (balance > 0) {
            //kuna change
            document.getElementById("submit").disabled = false;
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
            e.preventDefault();
            if ($("#paid_amount").val() == '' || $("#paid_amount").val() == null) {
                swal({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Missing value in payment amount field'
                });
                exit();
            }

            $('#submit').html('').html('Wait while processing <i class="fa fa-spinner"></i>');
            $("#submit").attr("disabled", true);

            var orgtype = '<?=$_SESSION['organizationtype']?>';

            $.ajax({
                url: '<?php echo site_url(); ?>business/place_order', //this is the submit URL
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

                        window.open("<?php echo site_url(); ?>business/sales_receipt/" + obj.last_id + " ", "receipt", "width=400, height=800");

                        swal({
                            icon: 'success',
                            title: 'Success',
                            text: 'Transaction complete'
                        });

                        $("#submit").removeAttr('disabled');

                        //reset form
                        $('#order_table > tr').remove();
                        $('#place_order_form').trigger("reset");

                        if(orgtype == 'Restaurant') {
                            // logout now
                            window.location.replace("<?=site_url('pages/pos_signin')?>");
                        }

                    } else {

                        error_sound();

                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: obj.message
                        });

                        $('#submit').html('').html('Sell <span class="fa fa-money"></span>');
                        $("#submit").removeAttr('disabled');
                    }
                    //action_buttons

                }
            });
        }); //end registration
    });
</script>