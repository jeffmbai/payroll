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

                <div class="col-md-12 col-xs-12">
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> <span class="fa fa-info-circle"></span> </strong> Ensure you select the 'From Date' and 'To Date' before selecting a room to help calculate the rates accurately.
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Available rooms</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="x_content" id="x_content">
                                <!-- Search content displayed here -->
                            </div>
                        </div><!-- /.card-body -->
                    </div>

                </div>

                <div class="col-md-8 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Checkout</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-horizontal form-label-left" id="place_order_form" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <label class="">Phone <small>(optional)</small> </label>
                                        <input type="number" class="form-control" name="customer_phone" id="customer_phone" placeholder="07123..." />

                                        <label class="control-label" style="padding-top: 10px; display: none;">Date</label>
                                        <div style="padding-top: 10px; display: none;">
                                            <input type="date" class="form-control" readonly name="date_time" value="<?php echo date('Y-m-d'); ?>" required />
                                        </div>

                                        <input type="number" class="form-control" id="transaction_type" name="transaction_type_id" value="1" readonly required style="visibility: hidded; display: none;" />

                                    </div>

                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <label for="">Name </label>
                                        <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="Customer name" />
                                    </div>

                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <label for="">ID/Passport <span class="text text-danger">*</span></label>
                                        <input type="text" name="id_passport" class="form-control" id="id_passport" placeholder="Customer ID/Passport" required />
                                    </div>

                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <label for="">Email <small>(optional)</small></label>
                                        <input type="email" name="customer_email" class="form-control" id="customer_email" placeholder="Customer email" />
                                    </div>

                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <label for="">From Date <span class="text text-danger">*</span></label>
                                        <input type="date" onchange="get_days()" name="from_date" id="from_date" class="form-control" required />
                                    </div>

                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <label for="">To Date <span class="text text-danger">*</span></label>
                                        <input type="date" onchange="get_days()" name="to_date" id="to_date" class="form-control" required />
                                    </div>

                                    <div class="col-md-3 col-sm-6 col-xs-12" style="display: none;">
                                        <label for="">Days <span class="text text-danger">*</span></label>
                                        <input type="number" name="days" id="days" class="form-control" required />
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label for="">Narrative</label>
                                        <textarea name="narrative" class="form-control" placeholder="Write here..."></textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="pull-right">
                                            Date: <?php echo date('d-m-Y'); ?>
                                            Time: <?php echo date('H:m:s'); ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="row" style="border-top: 1px solid #DDDDDD; margin-top: 30px;">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="order_table">
                                                <thead>
                                                    <tr>
                                                        <td class="td" style="display: none;"><b>Room</b></td>
                                                        <td style='width: 300px;'><b>Description</b></td>
                                                        <td><b>Unit Price</b></td>
                                                        <td style="display:none;"><b>Tax</b></td>
                                                        <td><b>Amount + Tax</b></td>
                                                        <td>
                                                            <!-- <button type="button" class="btn btn-default" id="add_row_button" onclick="add_row(null)"><span class="fa fa-plus"></span></button> -->
                                                        </td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row pt-3" style="border-top: 1px solid #DDDDDD;">
                                    <div class="col-md-4">
                                        <label>Tax: </label>
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
                                                <option value="<?php echo $pm->payment_mode_id; ?>" <?php if ($pm->payment_mode_id == 2) echo "selected"; ?>> <?php echo $pm->payment_mode_name; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Amount Paid: </label>
                                        <input type="number" name="paid_amount" id="paid_amount" value="0.00" onkeyup="get_change_return(this)" class="money form-control" style="background-color: #008394; color: #fff;" autofocus="false" />
                                    </div>
                                    <div class="col-md-4">
                                        <label style="color: red;">Balance: </label>
                                        <input type="number" readonly name="paying_balance" id="paying_balance" class="money form-control" style="color: red;">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Change Return: </label>
                                        <input type="number" readonly name="change_return" id="change_return" class="money form-control" style="background-color: #EA973C;">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 pt-2">
                                        <p id="action_buttons">
                                            <input type="submit" class="btn btn-primary pull-right" id="submit" disabled value="Proceed" />
                                        </p>
                                    </div>
                                </div>

                            </form>
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



<script>
    function get_days() {
        const date1 = new Date($("#from_date").val());
        const date2 = new Date($("#to_date").val());
        const diffTime = Math.abs(date2 - date1);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        console.log(diffDays + " days");
        $("#days").val(diffDays);
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
                stype: searchtype
            },
            success: function(html) {
                //$('#room_description').html(html);
                console.log("Response: " + html);
                document.getElementById('x_content').innerHTML = html;
            }
        });
    }

    $(document).ready(function() {
        //get the general stock
        $.ajax({
            url: '<?php echo site_url('data/get_room'); ?>',
            type: 'POST',
            cache: false,
            //data: { stxt : searchtxt },
            success: function(html) {
                console.log("Response: " + html);
                document.getElementById('x_content').innerHTML = html;
            }
        });
    });
</script>

<script type="text/javascript">
    function add_row(e) {
        //where 'e' is the room_id
        console.log("RoomID: " + e);

        $rowno = $("#order_table tr").length;
        $rowno = $rowno + 1;

        $("#order_table tr:last").after("<tr id='row" + $rowno + "'>  " +
            "<td class='td' style='display: none;'> " +
            "<input name='item[]' class='form-control' id='roomid_" + $rowno + "' value='" + e + "' readonly required /> " +
            "</td> " +
            "<td><input class='form-control' readonly id='description_" + $rowno + "' /></td> " +
            "<td> " +
            "<input type='text' class='form-control' onkeyup='set_amount(" + $rowno + ")' name='rate[]' id='rate_" + $rowno + "' > " +
            "<input type='text' class='form-control' readonly id='rateb_" + $rowno + "' style='display:none;' >" +
            "</td> " +
            "<td style='display: none;'><input type='text' class='form-control' name='tax[]' id='tax_" + $rowno + "' readonly></td> " +
            "<td><input type='text' class='form-control' name='amount[]' id='amount_" + $rowno + "' readonly ></td> " +
            "<td><button class='btn btn-default' onclick=delete_row('" + $rowno + "')><span class='fa fa-close'></span></button></td> " +
            "</tr>");

        if (e != null || e != 0) {
            //get item details
            var days = $("#days").val();

            $.ajax({
                url: '<?php echo site_url('data/specific_room'); ?>',
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
                        //$("#room_"+e).val(obj.room_id);
                        //var amountt = (obj.room_rate * (16/100)) + Number(obj.room_rate);
                        var amountt = Number(obj.room_rate) * days;
                        $("#description_" + $rowno).val(obj.room_name + ', ' + obj.room_type_name + ', ' + obj.narrative);
                        $("#rate_" + $rowno).val(obj.room_rate);
                        $("#rateb_" + $rowno).val(obj.room_rate);
                        // $("#tax_"+$rowno).val(obj.room_rate * (16/100));
                        $("#tax_" + $rowno).val(0); //make tax zero for now
                        $("#amount_" + $rowno).val(amountt);

                        //$().css("editable", false);
                        //$("#barcode_"+$rowno).attr('disabled', true);

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
        document.getElementById("add_row_button").blur();
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
            var itemid = $("#room_" + e).val();
            var itemqty = Number($("#qty_" + e).val());
            var itemname = null;
            var itemprice = null;
            var itemtax = null;
            var barcode = null;
            var total = null;
            <?php foreach ($all_items as $im) : ?>
                if (itemid == '<?php echo $im->room_id ?>') {
                    itemprice = Number('<?php echo $im->marked_price ?>');
                    itemtax = Number('<?php echo $im->tax_rate ?>');
                    barcode = '<?php echo $im->barcode; ?>';
                    itemname = '<?php echo $im->brand_name . ' ' . $im->model_name . ' ' . $im->color . ' ' . $im->capacity; ?>';
                }
            <?php endforeach; ?>
            total = ((itemprice * (itemtax / 100)) + itemprice) * itemqty;

            $("#qty_" + e).val(itemqty);
            $("#room_name" + e).val(itemname);
            $("#barcode_" + e).val(barcode);
            $("#tax_" + e).val(itemtax);
            $("#rate_" + e).val(itemprice);
            $("#rateb_" + e).val(itemprice);
            $("#amount_" + e).val(total.toFixed(2));

            document.getElementById("room_name" + e).blur();

            refresh_table();
        }

    }
</script>
<script type="text/javascript">
    function set_amount(e) {
        var itemprice = Number($("#rate_" + e).val());
        var itemprice2 = Number($("#rateb_" + e).val());
        var itemtax = Number($("#tax_" + e).val());
        var paidAmount = Number(document.getElementById("paid_amount").value);
        var total = null;
        var balance = null;

        //check whether this amount is less than the marked price, then reassign the original value
        if (itemprice < itemprice2) {
            itemprice = itemprice2;
            $("#rate_" + e).val(itemprice2);
        }

        total = (itemprice + itemtax) * 1;

        $("#tax_" + e).val(itemtax);
        $("#amount_" + e).val(total.toFixed(2));

        if (paidAmount != null || paidAmount != '' || paidAmount != 0) {
            console.log("Paid Amount: " + paidAmount);
            //then update the payment section
            paidAmount = Number(paidAmount);
            balance = paidAmount - total;

            console.log("Balance: " + balance);

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
        } else {
            console.log("No paid amount");
        }

        refresh_table();

    }
</script>

<script type="text/javascript">
    function refresh_table() {
        var table = document.getElementById("order_table");
        var sumTax = 0;
        var sumVal = 0;

        console.log("Table Length: " + table.rows.length);
        for (var i = 1; i <= table.rows.length; i++) {
            if (($("#amount_" + i).val()) != null) {
                //console.log("#amount_" + i + ":" + Number($("#amount_"+i).val()) );
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
        document.getElementById("submit").disabled = false;
        $("#paid_amount").val(grandTotal);
        $("#paying_balance").val(0.00);
        $("#change_return").val(0.00);

        //set transaction_type to cash sale
        $("#transaction_type").val(1);
    }
</script>

<script type="text/javascript">
    function refresh_table2() {
        var table = document.getElementById("order_table");
        var sumTax = 0;
        var sumVal = 0;

        console.log("Table Length: " + table.rows.length);
        for (var i = 1; i <= table.rows.length; i++) {
            if (($("#amount_" + i).val()) != null) {
                //console.log("#amount_" + i + ":" + Number($("#amount_"+i).val()) );
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
        document.getElementById("submit").disabled = false;
        $("#paid_amount").val(grandTotal);
        $("#paying_balance").val(0.00);
        $("#change_return").val(0.00);

        //set transaction_type to cash sale
        $("#transaction_type").val(1);
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
            $.ajax({
                url: '<?php echo site_url(); ?>rooms/place_order', //this is the submit URL
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
                        var urll = "window.open('<?php echo site_url(); ?>rooms/receipt/" + obj.last_id + "','receipt','width=400, height=800')";
                        document.getElementById("action_buttons").innerHTML = '<a href=""  onclick="' + urll + '" class="btn btn-success pull-right"><span class="fa fa-print"> Print Receipt</span></a>';

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