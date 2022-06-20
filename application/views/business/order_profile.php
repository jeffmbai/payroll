<?php
$customername = null;
$customeraddress = null;
$order_id = null;
$customerphone = null;
$billno = null;
$netamount = null;
$nettax = null;
$paymentstatus = null;
$orderdate = null;
foreach($order_profile as $op) {
    $order_id = $op->order_id;
    $customername = $op->customer_name;
    $customeraddress = $op->customer_address;
    $customerphone = $op->customer_phone;
    $billno = $op->bill_no;
    $netamount = $op->net_amount;
    $nettax = $op->tax_charge;
    $paymentstatus = $op->paid_status;
    $orderdate = $op->date_time;
}
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                Order Profile
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php
            if (isset($_SESSION['alert'])) {
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }
            ?>
        </div>
    </div>

    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create order </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a href="<?php #echo site_url('sys/invoice');?>" class="btn btn-success btn-xs"><span class="fa fa-download" style="color: white"></span> Generate PDF </a></li>
                            <li><a href="<?php echo site_url('sys/orders');?>" class="btn btn-primary btn-xs">Manage Orders </a></li>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">
                            <form class="form-horizontal form-label-left" action="<?php echo site_url('submitform/update_order/'.$order_id); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer name</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" name="customername" value="Walk-in customer" class="form-control" value="<?php echo $customername;?>" placeholder="Customer name">
                                        </div>
                                        <br>
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer phone</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="number" name="customerphone" class="form-control" value="<?php echo $customerphone;?>" placeholder="Phone number">
                                        </div>
                                         <br>
                                        <p>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer address</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" name="customeraddress" class="form-control" placeholder="Address" value="<?php echo $customeraddress;?>">
                                            </div>
                                        </p>
                                    </div>
                                    <div class="col-md-6">

                                        <p style=" text-align: center;">
                                            Date: <?php echo $orderdate;?>
                                            <br>
                                            Time: <?php echo date('H:m:s');?>
                                            <br>
                                            JiPOS
                                            <br><br>
                                            <b>Bill No: <?php echo $billno;?></b>
                                        </p>
                                    </div>
                                </div>

                                <div class="row" style="border-top: 1px solid #DDDDDD; margin-top: 30px;">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="order_table">
                                            <thead>
                                                <tr>
                                                    <td><b>Item</b></td>
                                                    <td><b>Qty</b></td>
                                                    <td><b>Rate</b></td>
                                                    <td><b>Tax (%)</b></td>
                                                    <td><b>Amount</b></td>
                                                    <td>
                                                        <button class="btn btn-default" onclick="add_row()"><span class="fa fa-plus"></span></button>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <?php
                                                $x = 0;
                                                foreach($order_items as $oitem) {
                                                    $x++;
                                                    ?>
                                                    <tr id="row<?php echo $x;?>">
                                                        <td>
                                                            <select name="item[]" class="select2 form-control" onchange="set_qty(<?php echo $x;?>)" id="item_<?php echo $x;?>" required>
                                                                <option value="">Select item</option>
                                                                <?php
                                                                foreach($all_items as $item){
                                                                    ?>
                                                                    <option value="<?php echo $item->item_id;?>" <?php if($item->item_id == $oitem->item_id)echo "selected";?> > <?php echo $item->item_name;?> </option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control" onchange="qty(<?php echo $x;?>)" name="qty[]" id="qty_<?php echo $x;?>" value="<?php echo $oitem->qty;?>" placeholder="Enter Qty" />
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" readonly name="rate[]" id="rate_<?php echo $x;?>" value="<?php echo $oitem->rate;?>" />
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" readonly name="tax[]" id="tax_<?php echo $x;?>" value="<?php echo $oitem->tax_id;?>" />
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" readonly name="amount[]" id="amount_<?php echo $x;?>" value="<?php echo $oitem->amount;?>" />
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-default" onclick="delete_row(<?php echo $x;?>)"><span class="fa fa-close"></span></button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tax: </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" readonly name="itemstax" id="itemstax" class="form-control" value="<?php echo $nettax;?>" style="width: 50%;" >
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Total: </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" readonly name="total" id="itemstotal" class="form-control" value="<?php echo $netamount;?>" style="width: 50%;" >
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status: </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select name="order_status" id="" class="form-control" required style="width: 50%;" >
                                                        <option value="1">Paid</option>
                                                        <option value="2">Cancel</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="submit" class="btn btn-success" value="Submit"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    function add_row() {
        $rowno=$("#order_table tr").length;
        $rowno=$rowno+1;
        $("#order_table tr:last").after("<tr id='row"+$rowno+"'>  "
            +   "<td> "
                +   "<select name='item[]' class='select2 form-control' onchange='set_qty("+$rowno+")' id='item_"+$rowno+"' tabindex='-1' required>"
                    + "<option ></option>"
                    <?php foreach($all_items as $itm): ?>
                    + "<option value='<?php echo $itm->item_id ?>' ><?php echo $itm->item_name ?></option>"
                    <?php endforeach; ?>
                +   "</select> "
            +   "</td> "
            +   "<td><input type='number' class='form-control' onchange=qty('"+$rowno+"') name='qty[]' id='qty_"+$rowno+"' value='1' placeholder='Enter Qty'></td> "
            +   "<td><input type='text' class='form-control' name='rate[]' id='rate_"+$rowno+"' readonly></td> "
            +   "<td><input type='text' class='form-control' name='tax[]' id='tax_"+$rowno+"' readonly></td> "
            +   "<td><input type='text' class='form-control' name='amount[]' id='amount_"+$rowno+"' readonly></td> "
            +   "<td><button class='btn btn-default' onclick=delete_row('"+$rowno+"')><span class='fa fa-close'></span></button></td> "
            + "</tr>");

        //$("#order_table tr:last").after(html);
        $(".select2").select2({
            placeholder: "Select a state",
            allowClear: true
        });
    }
</script>
<script type="text/javascript">
    function delete_row(rowno) {
        $('#row'+rowno).remove();

        refresh_table();
    }
</script>
<script type="text/javascript">
    function set_qty(e) {
        var itemid   = $("#item_"+e).val();
        var itemqty  = Number($("#qty_"+e).val());
        var itemprice = null;
        var itemtax = null;
        var total = null;
        <?php foreach($all_items as $im): ?>
        if(itemid == '<?php echo $im->item_id ?>') {
            itemprice = Number('<?php echo $im->selling_price ?>');
            itemtax  = Number('<?php echo $im->tax_rate ?>');
        }
        <?php endforeach; ?>
        total = ((itemprice * (itemtax/100)) + itemprice) * itemqty;

        $("#qty_"+e).val(itemqty);
        $("#tax_"+e).val(itemtax);
        $("#rate_"+e).val(itemprice);
        $("#amount_"+e).val(total.toFixed(2));

        refresh_table();

    }
</script>
<script type="text/javascript">
    function qty(e) {
        //get the qty and increase appropriately
        var itemqty  = Number($("#qty_"+e).val());
        var itemprice  = Number($("#rate_"+e).val());
        var itemtax  = Number($("#tax_"+e).val());
        var total = null;
        total = ((itemprice * (itemtax/100)) + itemprice) * itemqty;
        $("#amount_"+e).val(total.toFixed(2));

        //console.log(itemqty + " : " + itemprice + " : " + itemtax + " : TT = " + total);
        refresh_table();
    }
</script>
<script type="text/javascript">
    function refresh_table () {
        var table = document.getElementById("order_table");
        var sumTax = 0;
        var sumVal = 0;

        for(var i = 1; i <= table.rows.length; i++)
        {
            if(($("#amount_"+i).val()) != null) {
            //console.log($("#tax_"+i).val());
            sumVal = sumVal + Number($("#amount_"+i).val());
            sumTax = sumTax + Number($("#tax_"+i).val());
            }
        }
        $("#itemstotal").val(sumVal.toFixed(2));
        $("#itemstax").val(sumTax.toFixed(2));
        //console.log(table.rows.length);
        console.log(sumVal.toFixed(2));
        console.log(sumTax.toFixed(2));
        console.log('MESSAGE: Success');
    }
</script>