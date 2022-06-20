<style>
    .td {
        width: 200px;
    }
    .item_div {
        background-color: #1ABB9C;
    }
    #item_description{
        padding: 15px;
        color: #fff;
    }
    .money {
        font-size: 25px !important;
        font-weight: bold;
    }
</style>

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Credit Purchase</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-5 col-sm-12">
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
                        <h2>Business | New credit purchase </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">
                            <form class="form-horizontal form-label-left" method="post" id="place_order_form" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Supplier name</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select class="select2 form-control" name="cutomer_supplier_id" required > 
                                                <option value="" >Select supplier</option>
                                                <?php
                                                    foreach($buyers as $buyer) {
                                                        if($buyer->entity_id == 0) continue;
                                                        echo '<option value="'.$buyer->entity_id.'" >  '.$buyer->phone.' - '.$buyer->firstname.' '.$buyer->secondname.' '.$buyer->lastname.'  </option>';
                                                    }
                                                ?>    
                                                <!-- <option value="0" >Walk in customer</option> -->
                                            </select>
                                        </div>

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-top: 10px; display: none;">Date</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12" style="padding-top: 10px; display: none;">
                                            <input type="date" class="form-control" readonly name="date_time" value="<?php echo date('Y-m-d');?>" required /> 
                                        </div>

                                        <input type="number" class="form-control" name="transaction_type_id" value="4" readonly required style="visibility: hidded; display: none;" /> 

                                        <div class="col-md-12">
                                            <p style="padding-left: 25px;">
                                            Date: <?php echo date('d-m-Y');?>
                                            Time: <?php echo date('H:m:s');?>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <!-- <div class="col-md-8 col-sm-8 col-xs-12 pull-right">
                                            <input type="text" class="form-control" id="search_item" onkeyup="get_item(this)" placeholder="Search for item..." >
                                            <br/>
                                            <div class="item_div">
                                                <small><p id="item_description" style="padding: 15px;">
                                                Search is empty..
                                                </p></small>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>

                                <div class="row" style="border-top: 1px solid #DDDDDD; margin-top: 30px;">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="order_table">
                                            <thead>
                                                <tr>
                                                    <td><b>Model</b></td>
                                                    <td style="width: 100px;"><b>Year</b></td>
                                                    <td><b>Capacity</b></td>
                                                    <td><b>Color</b></td>
                                                    <td><b>Qty</b></td>
                                                    <td><b>Unit Price</b></td>
                                                    <td><b>Amount</b></td>
                                                    <td><b>Narrative</b></td>
                                                    <td>
                                                        <button class="btn btn-default" onclick="add_row()"><span class="fa fa-plus"></span></button>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tr id="row1">
                                                <td class="td">
                                                    <select name="item[]" class="select2_group form-control" onchange="set_qty(1)" id="item_1" required>
                                                        <option value="">Select item</option>
                                                        <?php
                                                            $control_dt = null;
                                                            foreach ($brands_models as $dm) {
                
                                                                if ($control_dt !== $dm->brand_name) {
                                                                    $control_dt = $dm->brand_name;
                                                                    echo '<optgroup label="' . $control_dt . '">';
                                                                }
                                                                echo '<option value="' . $dm->brand_model_id . '"> ' . $dm->model_name . ' </option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="model_year[]" class="select2 form-control" id="year_1" required>
                                                        <option value="">Year</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" class="form-control" name="capacity[]" id="capacity_1" placeholder="Capacity" /></td>
                                                <td><input type="text" class="form-control" name="color[]" id="color_1" placeholder="Color" /></td>
                                                <td><input type="number" class="form-control" onchange="qty(1)" name="qty[]" id="qty_1" value='1' placeholder="Quantity" /></td>
                                                <td><input type="number" class="form-control" onkeyup="qty(1)" name="rate[]" id="rate_1" /></td>
                                                <td><input type="text" class="form-control" readonly name="amount[]" id="amount_1" /></td>
                                                <td><input class="form-control" name="narrative[]" id="narrative_1" placeholder="description here..." /></td>
                                                <td>
                                                    <button class="btn btn-default" onclick="delete_row(1)"><span class="fa fa-close"></span></button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-3">
                                            <!-- <div class="row" >
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tax: </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" readonly name="itemstax" id="itemstax" class="money form-control" style="width: 90%;" >
                                                </div>
                                            </div>
                                            <br> -->
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
                                                    <select class="form-control" name="payment_mode_id" style="width: 90%;" required>
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
                                            
                                        </div>

                                        <div class="col-md-3">                                            
                                            <div class="row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount Paid: </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="number" name="paid_amount" id="paid_amount" onkeyup="get_change_return(this)" class="money form-control" style="width: 90%; background-color: #1ABB9C; color: #fff;" required />
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
                                                <input type="submit" class="btn btn-primary pull-right" id="submit" disabled value="Submit"/>
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
        </div>
    </div>


</div>
<script type="text/javascript">
    function add_row() {
        $rowno=$("#order_table tr").length;
        $rowno=$rowno+1;
        $("#order_table tr:last").after("<tr id='row"+$rowno+"'>  "
            +   "<td class='td'> "
                +   "<select name='item[]' class='select2_group form-control' onchange='set_qty("+$rowno+")' id='item_"+$rowno+"' tabindex='-1' required>"
                    + "<option value='' > Select item </option>"
                    <?php  $control_dt = null; ?>
                    <?php foreach($brands_models as $dm): ?>
                        <?php if ($control_dt !== $dm->brand_name): ?>
                            <?php $control_dt = $dm->brand_name; ?>
                            + "<optgroup label='<?php echo $control_dt ?>' > "
                        <?php endif; ?>
                    + "<option value='<?php echo $dm->brand_model_id ?>' ><?php  echo $dm->model_name; ?></option>"
                    <?php endforeach; ?>
                +   "</select> "
            +   "</td> "
            +   "<td> "
                +   "<select name='model_year[]' class='select2 form-control' required> "
                            +   "<option value=''>Year</option> "
                            +   "<option value='2016'>2016</option> "
                            +   "<option value='2017'>2017</option> "
                            +   "<option value='2018'>2018</option> "
                            +   "<option value='2019'>2019</option> "
                            +   "<option value='2020'>2020</option> "
                            +   "<option value='2021'>2021</option> "
                            +   "<option value='2022'>2022</option> "
                +   "</select>"
            +   "</td> "
            +   "<td><input type='text' class='form-control' name='capacity[]' id='capacity_"+$rowno+"' placeholder='Capacity'></td> "
            +   "<td><input type='text' class='form-control' name='color[]' id='color_"+$rowno+"' placeholder='Color'></td> "
            +   "<td><input type='number' class='form-control' name='qty[]' id='qty_"+$rowno+"' onchange=qty('"+$rowno+"') value='1'></td> "
            +   "<td><input type='number' class='form-control' name='rate[]' id='rate_"+$rowno+"' onkeyup=qty('"+$rowno+"') ></td> "
            +   "<td><input type='text' class='form-control' name='amount[]' id='amount_"+$rowno+"' readonly ></td> "
            +   "<td><input type='text' class='form-control' name='narrative[]' id='narrative_"+$rowno+"' placeholder='write here...' ></td> "
            +   "<td><button class='btn btn-default' onclick=delete_row('"+$rowno+"')><span class='fa fa-close'></span></button></td> "
            + "</tr>");

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
        $('#row'+rowno).remove();

        refresh_table ();
    }
</script>
<script type="text/javascript">
    function qty(e) {
        //get the qty and increase appropriately
        var itemqty  = Number($("#qty_"+e).val());
        var itemprice  = $("#rate_"+e).val();
        if(itemprice != 0 || itemprice != null || itemprice != '') {
            itemprice  = Number($("#rate_"+e).val());
            console.log("Itemprice: " + itemprice);
        } else {
            itemprice = 0;
        }
        var total = 0.00;
        total = itemprice * itemqty;
        $("#amount_"+e).val(total.toFixed(2));

        console.log(itemqty + " : " + itemprice + " : TT = " + total);

        refresh_table();

        //to balance the second part of footer section
        var paidAmount = Number($("#paid_amount").val());
        var itemstotal = Number($("#itemstotal").val());
        var balance = paidAmount - itemstotal;
        if(balance < 0) {
            //kuna deficit
            document.getElementById("submit").disabled = false; 
            balance = balance * -1;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

        } else if(balance == 0) {
            //hakuna change
            document.getElementById("submit").disabled = true;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

        } else if(balance > 0) {
            //kuna change
            document.getElementById("submit").disabled = true;
            $("#paying_balance").val(0.00);
            $("#change_return").val(balance.toFixed(2));

        }
        
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
            // sumTax = sumTax + Number($("#tax_"+i).val());
            }
        }
        $("#itemstotal").val(sumVal.toFixed(2));
        // $("#itemstax").val(sumTax.toFixed(2));
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
        data: 'data='+item,
        success: function(html){
            $('#item_description').html(html);
        }
    });
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
            //kuna deficit
            document.getElementById("submit").disabled = true; 
            balance = balance * -1;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

        } else if(balance == 0) {
            //hakuna change
            document.getElementById("submit").disabled = false;
            $("#paying_balance").val(balance.toFixed(2));
            $("#change_return").val(0.00);

        } else if(balance > 0) {
            //kuna change
            document.getElementById("submit").disabled = false;
            $("#paying_balance").val(0.00);
            $("#change_return").val(balance.toFixed(2));

        }
    }
</script>

<script>
    $(function(){
        $('#place_order_form').on('submit', function(e){ /*for add item*/
            e.preventDefault();

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
                            var urll = "window.open('<?php echo site_url(); ?>business/purchase_receipt/"+obj.last_id+"','receipt','width=400, height=800')";
                            document.getElementById("action_buttons").innerHTML = '<a href=""  onclick="'+urll+'" class="btn btn-success pull-right"><span class="fa fa-print"> Print Receipt</span></a>';
                            
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