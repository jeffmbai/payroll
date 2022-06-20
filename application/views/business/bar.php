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
    .my-form{
        border-top: none;
        border-left: none;
        border-right: none;
        border-color: #008394;
    }
    .my-color {
        color: #000;
    }
    .rm, td .select2-selection {
        border: none !important;
    }
    .td {
        width: 250px;
    }
    .large {
        font-weight: bold;
    }
</style>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>New sale</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php
                            if(isset($_SESSION['alert'])) {
                                echo $_SESSION['alert'];
                                unset($_SESSION['alert']);
                            }
                        ?>
                        </div>
                    </div>

                    <div class="row">
                        <form class="form-horizontal form-label-left" id="place_order_form" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="">Phone <small>(optional)</small> </label>
                                    <!-- <select class="select2 form-control" name="cutomer_supplier_id" required > 
                                        <option value="0" selected >Walk in customer</option>
                                    </select> -->
                                    <input type="number" class="form-control" name="customer_phone" id="customer_phone" placeholder="07123..." />

                                    <label class="control-label" style="padding-top: 10px; display: none;">Date</label>
                                    <div style="padding-top: 10px; display: none;">
                                        <input type="date" class="form-control" readonly name="date_time" value="<?php echo date('Y-m-d');?>" required /> 
                                    </div>

                                    <input type="number" class="form-control" id="transaction_type" name="transaction_type_id" value="1" readonly required style="visibility: hidded; display: none;" /> 

                                </div>

                                <div class="col-md-4">
                                    <label for="">Name <small>(optional)</small> </label>
                                    <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="Customer name" />
                                </div>

                                <div class="col-md-4">
                                    <label for="">Email <small>(optional)</small></label>
                                    <input type="email" name="customer_email" class="form-control" id="customer_email" placeholder="Customer email" />
                                </div>

                                <div class="col-md-12">
                                    <p class="pull-right">
                                    Date: <?php echo date('d-m-Y');?>
                                    Time: <?php echo date('H:m:s');?>
                                    </p>
                                </div>
                            </div>

                            <div class="row" style="border-top: 1px solid #DDDDDD; margin-top: 30px;">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-condensed table-primary" id="order_table">
                                        <thead>
                                            <tr>
                                                <td class="td"><b>Item</b></td>
                                                <td style="width: 80px;"><b>Qty</b></td>
                                                <td><b>Unit Price</b></td>
                                                <td><b>Tax</b></td>
                                                <td><b>Amount + Tax</b></td>
                                                <td>
                                                    <!-- <button type="button" class="btn btn-default" id="add_row_button" onclick="add_row(null)"><span class="fa fa-plus"></span></button> -->
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <div class="row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tax: </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" readonly name="itemstax" id="itemstax" class="money form-control" style="width: 90%;" >
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Total: </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" readonly name="total" id="itemstotal" class="money form-control" style="width: 90%;" >
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Payment Method: </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select class="select2 form-control" name="payment_mode_id" style="width: 90%;" required>
                                                    <option value="" > Select payment mode </option>
                                                    <?php
                                                        foreach($payment_modes as $pm) {
                                                            ?>
                                                            <option value="<?php echo $pm->payment_mode_id;?>"  <?php if($pm->payment_mode_id == 2) echo "selected";?>  > <?php echo $pm->payment_mode_name; ?> </option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Table </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select class="select2 form-control" name="eating_table_id" style="width: 90%;">
                                                    <option value="" > Select table </option>
                                                    <?php
                                                        foreach($eating_tables as $eat) {
                                                            ?>
                                                            <option value="<?php echo $eat->eating_table_id;?>"   > <?php echo $eat->eating_table_name; ?> </option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-4">                                            
                                        <div class="row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount Paid: </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="number" name="paid_amount" id="paid_amount" onkeyup="get_change_return(this)" class="money form-control" style="width: 90%; background-color: #1ABB9C; color: #fff;" autofocus="false" />
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Balance: </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="number" readonly name="paying_balance" id="paying_balance" class="money form-control" style="width: 90%;" >
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Change Return: </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="number" readonly name="change_return" id="change_return" class="money form-control" style="width: 90%; background-color: #E6A56C;" >
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <p style="padding-right: 30px" id="action_buttons">
                                                <button type="submit" class="btn btn-info pull-right" id="submit" disabled>Sell <span class="fa fa-money"></span></button>
                                            </p>
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Item Listing Start -->
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-6" style="display: none;">
                            <label><input type="radio" class="flat" name="search_type" id="search_type1" value="1" /> General</label>
                            <label><input type="radio" class="flat" name="search_type" id="search_type2" checked value="2" /> Specified</label>
                        </div>
                        <!-- <div class="col-md-9 col-sm-8 col-xs-6"> -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text" name="search" id="search" onkeyup="get_stock(this)" class="form-control" placeholder="Type here to find the bottle..."  />
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="x_content"> 
                    <!-- Search content displayed here -->
                    <div class="row" style="max-height:800px; overflow-y:auto">
                        <?php
                        
                            foreach($all_items as $itm) {
                                if($itm->for_bar != 1) continue;
                                ?>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="thumbnail" style="height: 180px !important;">
                                            <button class="" onclick="add_row(<?php echo $itm->item_id;?>)" style="background: none; border: none;">
                                            <div class="image view view-first" style="height: 100px !important;">
                                                <img style="width: 100%; display: block;" src="<?php echo base_url('assets/images/items/'.$itm->image);?>" alt="image" />
                                            </div>
                                            <div class="caption" style="background-color: transparent !important;">
                                                <small><?php echo $itm->item_name;?></small>
                                                <br/>
                                                <small><b><?php echo number_format($itm->marked_price);?></b></small>
                                            </div>
                                            </button>
                                        </div>
                                    </div>

                                <?php
                            }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item Listing End -->

        <br />
        <br />
        <br />

    </div>
</div>

<script type="text/javascript">
    function get_stock (reag) {
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
            data: { stxt : searchtxt, stype : searchtype, spurpose : 'bar' },
            success: function(html){
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

        $rowno=$("#order_table tr").length;
        $rowno=$rowno+1;

        $("#order_table tr:last").after("<tr id='row"+$rowno+"'>  "
            +   "<td class='td'> "
                +   "<input name='item[]' type='hidden' class='rm form-control' id='item_"+$rowno+"' value='"+e+"' readonly required />"
                +   "<input name='item_name[]' class='rm form-control' id='item_name"+$rowno+"' style='pointer-events: none;' required />"
            +   "</td> "
            +   "<td><input type='number' class='rm form-control' onchange=qty('"+$rowno+"') name='qty[]' id='qty_"+$rowno+"' value='1' placeholder='Enter Qty'></td> "
            +   "<td> "
            +   "<input type='text' class='rm form-control' onkeyup='set_amount("+$rowno+")' name='rate[]' id='rate_"+$rowno+"' > "
            +   "<input type='hidden' class='rm form-control' id='rateb_"+$rowno+"' style='pointer-events: none;' >"
            +   "</td> "
            +   "<td><input type='text' class='rm form-control' name='tax[]' id='tax_"+$rowno+"' style='pointer-events: none;' ></td> "
            +   "<td><input type='text' class='rm form-control' name='amount[]' id='amount_"+$rowno+"' style='pointer-events: none;' ></td> "
            +   "<td><button class='btn btn-default' onclick=delete_row('"+$rowno+"')><span class='fa fa-close'></span></button></td> "
            + "</tr>");

        if(e != null || e != 0 ) {
            //get item details
            $.ajax({
                url: '<?php echo site_url('data/specific_item'); ?>',
                type: 'POST',
                cache: false,
                data: 'data='+e,
                success: function(data){
                    console.log("Resp: " + data);
                    var obj = JSON.parse(data); 
                    if(obj.data_control == '0') {
                        //no data available
                    } else {
                        //data available
                        //$("#item_"+e).val(obj.item_id);
                        var amountt = (obj.marked_price * (obj.tax_rate/100)) + Number(obj.marked_price);
                        $("#barcode_"+$rowno).val(obj.barcode);
                        $("#item_"+$rowno).val(obj.item_id).change();
                        $("#item_name"+$rowno).val(obj.item_name);  
                        $("#qty_"+$rowno).val(1);
                        $("#rate_"+$rowno).val(obj.marked_price);
                        $("#rateb_"+$rowno).val(obj.marked_price);
                        $("#tax_"+$rowno).val(obj.marked_price * (obj.tax_rate/100));
                        $("#amount_"+$rowno).val(amountt);
                        console.log("Cell Amount Value1: " + amountt);
                        console.log("Cell Amount Value2: " + $("#amount_"+$rowno).val());

                        refresh_table ();
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
        $('#row'+rowno).remove();

        refresh_table ();
    }
</script>
<script type="text/javascript">
    function set_qty(e) { //where e is row number
        if(e != null) {
            var itemid   = $("#item_"+e).val();
            var itemqty  = Number($("#qty_"+e).val());
            var itemname = null;
            var itemprice = null;
            var itemtax = null;
            var barcode = null;
            var total = null;
            <?php foreach($all_items as $im): ?>
            if(itemid == '<?php echo $im->item_id ?>') {
                itemprice = Number('<?php echo $im->marked_price ?>');
                itemtax  = Number('<?php echo $im->tax_rate ?>');
                barcode = '<?php echo $im->barcode; ?>';
                itemname = '<?php echo $im->item_name.' '.$im->brand_name.' '.$im->color.' '.$im->capacity; ?>';
            }
            <?php endforeach; ?>
            total = ((itemprice * (itemtax/100)) + itemprice) * itemqty;

            $("#qty_"+e).val(itemqty);
            $("#item_name"+e).val(itemname);        
            $("#barcode_"+e).val(barcode);
            $("#tax_"+e).val(itemtax);
            $("#rate_"+e).val(itemprice);
            $("#rateb_"+e).val(itemprice);
            $("#amount_"+e).val(total.toFixed(2));

            document.getElementById("item_name"+e).blur(); 

            refresh_table ();
        }

    }

    function set_amount(e) {
        var itemid   = $("#item_"+e).val();
        var itemqty  = Number($("#qty_"+e).val());
        var itemprice = Number($("#rate_"+e).val());
        var itemprice2 = Number($("#rateb_"+e).val());
        var itemtax = Number($("#tax_"+e).val());
        var paidAmount = document.getElementById("paid_amount").value;
        var total = null;

        //check whether this amount is less than the marked price, then reassign the original value
        if(itemprice < itemprice2) {
            itemprice = itemprice2;
            $("#rate_"+e).val(itemprice2);
        }

        total = (itemprice + itemtax) * itemqty;

        $("#qty_"+e).val(itemqty);
        $("#tax_"+e).val(itemtax);
        $("#amount_"+e).val(total.toFixed(2));

        if(paidAmount != null || paidAmount != '') {
            console.log("Paid Amount: " + paidAmount);
            //then update the payment section
            paidAmount = Number(paidAmount);
            var balance = paidAmount - total;
            
            console.log("Balance: " + balance);

            if(balance < 0) {
                //kuna deficit, deni
                document.getElementById("submit").disabled = false; 
                balance = balance * -1;
                $("#paying_balance").val(balance.toFixed(2));
                $("#change_return").val(0.00);

                //set transaction_type to credit sale
                $("#transaction_type").val(3);

            } else if(balance == 0) {
                //hakuna change
                document.getElementById("submit").disabled = false;
                $("#paying_balance").val(balance.toFixed(2));
                $("#change_return").val(0.00);
                //set transaction_type to cash sale
                $("#transaction_type").val(1);

            } else if(balance > 0) {
                //kuna change
                document.getElementById("submit").disabled = false;
                $("#paying_balance").val(0.00);
                $("#change_return").val(balance.toFixed(2));
                //set transaction_type to cash sale
                $("#transaction_type").val(1);

            }
        } else {
            console.log("No paid amount");
        }

        refresh_table ();

    }
</script>
<script type="text/javascript">
    function qty(e) {
        //get the qty and increase appropriately
        var itemid   = $("#item_"+e).val();
        var itemqty  = Number($("#qty_"+e).val());        

        $.ajax({
            url: '<?php echo site_url('data/check_availability'); ?>',
            type: 'POST',
            cache: false,
            //data: 'itemid='+itemid+'$itemqty='+itemid,
            data: { "itemid" : itemid, "itemqty" : itemqty },
            success: function(html){
                console.log("Response: " + html);
                if(html == '1') {
                    var itemprice  = Number($("#rate_"+e).val());
                    var itemtax  = Number($("#tax_"+e).val());
                    var total = null;
                    total = (itemprice + itemtax) * itemqty;
                    $("#amount_"+e).val(total.toFixed(2));
                } else if(html == '0') {
                    $("#qty_"+e).val(itemqty-1);  
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: 'The quantity left is way less'
                    });
                } else {
                    $("#qty_"+e).val(itemqty-1);  
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong!'
                    });
                }
            }
        });

        //console.log(itemqty + " : " + itemprice + " : " + itemtax + " : TT = " + total);
        refresh_table();
    }
</script>
<script type="text/javascript">
    function refresh_table () {
        var table = document.getElementById("order_table");
        var sumTax = 0;
        var sumVal = 0;

        console.log("Table Length: " + table.rows.length);
        for(var i = 1; i <= table.rows.length; i++)
        {
            if(($("#amount_"+i).val()) != null) {
                //console.log("#amount_" + i + ":" + Number($("#amount_"+i).val()) );
                sumVal = sumVal + Number($("#amount_"+i).val());
                sumTax = sumTax + Number($("#tax_"+i).val());
            }
        }
        $("#itemstotal").val(sumVal.toFixed(2));
        $("#itemstax").val(sumTax.toFixed(2));
        console.log(sumVal.toFixed(2));
        console.log(sumTax.toFixed(2));
        console.log('MESSAGE: Success');

        //update then payment part too
        //var grandTotal = (sumVal + sumTax).toFixed(2);
        var grandTotal = (sumVal).toFixed(2);
        console.log("Grand Total: " + grandTotal);
        document.getElementById("submit").disabled = false;
        $("#paid_amount").val(grandTotal);
        $("#paying_balance").val(0.00);
        $("#change_return").val(0.00);

        //set transaction_type to cash sale
        $("#transaction_type").val(1);
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
            data: 'data='+item,
            success: function(html){
                $('#item_description').html(html);
            }
        });
    }

    function get_this_item (e) {
        //search item by barcode
        e.preventDefault;
        var barcode = $("#barcode_"+e).val();
        console.log("Search Barcode: " + barcode);
        if(barcode == null || barcode == '') {
            return;
            console.log("No search item...");
        }
        $.ajax({
            url: '<?php echo site_url('data/search_barcode'); ?>',
            type: 'POST',
            cache: false,
            data: 'data='+barcode,
            success: function(data){
                //console.log("Resp: " + data);
                var obj = JSON.parse(data); 
                if(obj.data_control == '0') {
                    //no data available. reset form
                    //console.log("No data available: " + obj.data_control);
                    alert('No data');
                } else {
                    //data available
                    var amountt = (obj.marked_price * (obj.tax_rate/100)) + Number(obj.marked_price);
                    $("#item_"+e).val(obj.item_id); 
                    $("#item_name"+e).val(obj.brand_name+' '+obj.model_name+' '+obj.color+' '+obj.capacity);  
                    $("#qty_"+e).val(1);
                    $("#rate_"+e).val(obj.marked_price);
                    $("#rateb_"+e).val(obj.marked_price);
                    $("#tax_"+e).val(obj.marked_price * (obj.tax_rate/100));
                    $("#amount_"+e).val(amountt);
                    //console.log("#amount_"+ e + $("#amount_"+e).val());
                }
            }
        });

        refresh_table ();
    }

    function select_item(e) {
        //alert(e);
    }
</script>

<script>
    function get_change_return (e) {
        var paidAmount = Number(e.value);
        var itemstotal = Number($("#itemstotal").val());
        var balance = paidAmount - itemstotal;
        if(balance < 0) {
            //kuna deficit, deni
            document.getElementById("submit").disabled = false; 
            balance = balance * -1;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

            //set transaction_type to cash sale
            $("#transaction_type").val(3);

        } else if(balance == 0) {
            //hakuna change
            document.getElementById("submit").disabled = false;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

            //set transaction_type to cash sale
            $("#transaction_type").val(1);

        } else if(balance > 0) {
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
    $(function(){
        $('#place_order_form').on('submit', function(e){ /*for add item*/
            e.preventDefault();
            if($("#paid_amount").val() == '' || $("#paid_amount").val() == null){
                swal({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Missing value in payment amount field'
                });
                exit();
            }
            $.ajax({
                url: '<?php echo site_url();?>business/place_order', //this is the submit URL
                type: 'POST',
                data: $('#place_order_form').serialize(),
                success: function(data){
                        console.log("Response: " + data);
                        var obj = JSON.parse(data); 
                        //$('#alert').html(data);
                        console.log("resp: " + obj.resp);
                        console.log("message: " + obj.message);
                        if(obj.resp == '1') {
                            //success. then print receipt
                            var urll = "window.open('<?php echo site_url(); ?>business/sales_receipt/"+obj.last_id+"','receipt','width=400, height=800')";
                            document.getElementById("action_buttons").innerHTML = '<a href=""  onclick="'+urll+'" class="btn btn-success pull-right"><span class="fa fa-print"> Print Receipt</span></a>';
                            
                            swal({
                            icon: 'success',
                            title: 'Success',
                            text: 'Transaction complete'
                            });
                            
                        } else {
                            console.log(obj.resp);
                            swal({
                            icon: 'error',
                            title: 'Error',
                            text: 'Transaction failed!'
                            });
                        }
                        //action_buttons
                        
                }
            });
        }); //end registration
    });
</script>