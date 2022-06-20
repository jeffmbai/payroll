<!DOCTYPE html>
<?php
$header = $order_header;
    $order_id = $header->order_id;
    $bill_no = $header->bill_no;
    $customer_name = $header->customer_supplier_name;
    $date_time = $header->date_time;
    $service_charge = $header->service_charge;
    $tax_charge = $header->tax_charge;
    $net_amount = $header->net_amount;
    $paid_amount = $header->paid_amount;
    $paying_balance = $header->paying_balance;
    $change_return = $header->change_return;
    $discount = $header->discount;
    $transaction_type_name = $header->transaction_type_name;
    $paid_status = $header->paid_status;
    $time_stamp = $header->time_stamp;
    $cashier_name = $header->firstname.' '.$header->secondname;
    $from_date = $header->from_date;
    $to_date = $header->to_date;
    $narrative = $header->narrative;


$org = $this->db->where('org_id', $_SESSION['orgid'])->get('orgs')->row();
?>

<html lang="en">

<head>
  <title>Receipt</title>

  <style>
      .invoice-POS{
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        padding:1.5mm;
        margin: 0 auto;
        /* width: 44mm; */
        width: 500px !important;
        background: #FFF;
        /* border: 1px solid black;  */
      }
        
      ::selection {background: #f31544; color: #FFF;}
      ::moz-selection {background: #f31544; color: #FFF;}
      h1{
        font-size: 40px;
      }
      h2{font-size: 30px;}
      h3{
        font-size: 26px;
        font-weight: 300;
        line-height: 2em;
      }
      p{
        font-size: 25px;
        color: #000;
        line-height: 1.5em;
      }
      
      #top, #mid,#bot{ /* Targets all id with 'col-' */
      border-bottom: 1px solid #EEE;
      }

      #top{min-height: 20px;}
      #mid{min-height: 80px;} 
      #bot{ min-height: 50px;}

      #top .logo{
      //float: left;
        height: 60px;
        width: 60px;
        background: url(http://localhost:8080/uza/assets/POS-JiPOS-logo.png) no-repeat;
        background-size: 60px 60px;
      }
      .clientlogo{
        float: left;
        height: 60px;
        width: 60px;
        background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
        background-size: 60px 60px;
        border-radius: 50px;
      }
      .info{
        display: block;
        //float:left;
        margin-left: 0;
      }
      .title{
        float: right;
      }
      .title p{text-align: right;} 
      table{
        width: 100%;
        border-collapse: collapse;
      }
      .tabletitle{
        //padding: 5px;
        font-size: .5em;
        background: #EEE;
      }
      /* .service{border-bottom: 1px solid #EEE;} */
      .itemtext{
        font-size: 25px;
        color: black;
      }

      #legalcopy{
        margin-top: 5mm;
      }
      .legal { font-size: 20px; }
      .right { text-align: right; }
      body {
        color: black !important;
        font-weight: bold !important;
      }
      tr {
        border-spacing: unset !important;
        line-height: 0px;
      }

  </style>

</head>

<body onload="window.print()">

    <div class="">
        
  <div class="invoice-POS" id="invoice-POS" >
    
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h1 style="font-size: 40px"><?php echo $transaction_type_name;?></h1>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    
    <div id="mid">
      <div class="info" style="text-align: center;">
        <h1 style="font-size: 40px"><?=$org->org_name?></h1>
        <p style="font-size: 30px">
            <!-- P.O. Box 73031-00200<br> -->
            <?=$org->address?> <br>
            Phone: <?=$org->phone?><br>
        </p>
        <p style="font-size: 30px;">
            Code: <?php echo $bill_no;?>  <br>     
            Duration:  <?php echo $from_date.' '.$to_date; ?>  <br>
            Cashier:  <?php echo $cashier_name; ?>   <br>
            Narrative: <?php echo $narrative;?>  <br>
            Time:  <?php echo $time_stamp; ?>  <br>
        </p>
        
      </div>
    </div><!--End Invoice Mid-->
    
    <div id="bot">

        <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="item" colspan="3"><h2>Room</h2></td>
                    <td class="Rate right"><h2>Amount</h2></td>
                </tr>

                <?php
                    $total = null;
                    $tax = null;
                    $till_no = 860915;
                    foreach($order_items as $item) {

                        $total += $item->amount;
                        $tax += $item->tax;
                        ?>
                        <tr class="service">
                            <td class="tableitem" colspan="3"><p class="itemtext"><?php echo $item->room_name.' '.$item->room_type_name;?></p></td>
                            <td class="tableitem right"><p class="itemtext">Ksh <?php echo number_format($item->amount, 2);?></p></td>
                        </tr>
                        <?php
                    }
                ?>

                <tr class="tabletitle" style="display: none;" >
                    <td colspan="2" class="Rate right"><h2>Tax</h2></td>
                    <td colspan="2" class="payment right"><h2><?php echo number_format($tax, 2);?></h2></td>
                </tr>

                <tr class="tabletitle">
                    <td colspan="2" class="Rate right"><h2>Total</h2></td>
                    <td colspan="2" class="payment right"><h2><?php echo number_format($total, 2);?></h2></td>
                </tr>

                <tr class="tabletitle">
                    <td colspan="2" class="Rate right"><h2>Amount Paid</h2></td>
                    <td colspan="2" class="payment right"><h2>Ksh <?php echo number_format($paid_amount, 2);?></h2></td>
                </tr>

                <tr class="tabletitle">
                    <td colspan="2" class="Rate right"><h2>Paying Balance</h2></td>
                    <td colspan="2" class="payment right"><h2>Ksh <?php echo number_format($paying_balance, 2);?></h2></td>
                </tr>

                <tr class="tabletitle">
                    <td colspan="2" class="Rate right"><h2>Change Returned</h2></td>
                    <td colspan="2" class="payment right"><h2>Ksh <?php echo number_format($change_return, 2);?></h2></td>
                </tr>

                <tr class="tabletitle" style="background-color: #fff;">
                    <td colspan="2" class="Rate right"><h3>BUY GOODS</h3></td>
                    <td class="payment right"><h3><?php echo $till_no;?></h3></td>
                </tr>

            </table>
        </div><!--End Table-->

        <div id="legalcopy">
            <p class="legal"><strong>Thank you <?php echo $customer_name;?> for your business!</strong>  Always giving you the best. 
            </p>
        </div>

    </div><!--End InvoiceBot-->
  </div><!--End Invoice-->

    </div>

</body>
</html>