<!DOCTYPE html>
<?php
foreach($order_header as $header) {
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
}
?>

<html lang="en">

<head>
  <title>Purchase Receipt</title>

  <style>
      .invoice-POS{
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        padding:2mm;
        margin: 0 auto;
        /* width: 44mm; */
        width: 370px !important;
        background: #FFF;
        border: 1px solid black; 
      }
        
      ::selection {background: #f31544; color: #FFF;}
      ::moz-selection {background: #f31544; color: #FFF;}
      h1{
        font-size: 2.0em;
        color: #222;
      }
      h2{font-size: 1.5em;}
      h3{
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
      }
      p{
        font-size: 1.0em;
        color: #666;
        line-height: 1.2em;
      }
      
      #top, #mid,#bot{ /* Targets all id with 'col-' */
      border-bottom: 1px solid #EEE;
      }

      #top{min-height: 100px;}
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
      .service{border-bottom: 1px solid #EEE;}
      .item{width: 24mm;}
      .itemtext{font-size: .8em;}

      #legalcopy{
        margin-top: 5mm;
      }
      .legal { font-size: .9em; }
      .right { text-align: right; }

  </style>

</head>

<body>

    <div class="">
        
  <div class="invoice-POS" id="invoice-POS" >
    
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2><?php echo $transaction_type_name;?></h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    
    <div id="mid">
      <div class="info" style="text-align: center;">
        <h2>Company Name</h2>
        <p>
            P.O. Box 00100 - 22139 <br>
            Loita street Nairobi, Kenya <br>
            info@domain.com <br>
            254 712 345 678 <br>
        </p>
        <p style="font-size: 12px;">
            Code: <?php echo $bill_no;?>  <br>     
            Date:  <?php echo $date_time; ?>  <br>
            Supplier:  <?php echo $customer_name; ?>   <br>
            Time:  <?php echo $time_stamp; ?>  <br>
        </p>
      </div>
    </div><!--End Invoice Mid-->
    
    <div id="bot">

        <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="item"><h2>Item</h2></td>
                    <td class="item"><h2>Description</h2></td>
                    <td class="Hours right"><h2>Qty</h2></td>
                    <td class="Rate right"><h2>Price Estimate</h2></td>
                </tr>

                <?php
                    $total = null;
                    $tax = null;
                    foreach($order_items as $item) {
                        $total += $item->price_estimate * $item->qty;
                        $narrative = $item->model_year.', '.$item->capacity.', '.$item->color.', '.$item->narrative;
                        ?>
                        <tr class="service">
                            <td class="tableitem"><p class="itemtext"><?php echo $item->brand_name.' '.$item->model_name;?></p></td>
                            <td class="tableitem"><p class="itemtext"><?php echo $narrative;?></p></td>
                            <td class="tableitem right"><p class="itemtext"><?php echo $item->qty;?></p></td>
                            <td class="tableitem right"><p class="itemtext">Ksh <?php echo number_format($item->price_estimate, 2);?></p></td>
                        </tr>
                        <?php
                    }
                ?>

                <!-- <tr class="tabletitle">
                    <td></td>
                    <td class="Rate right"><h2>tax</h2></td>
                    <td class="payment right"><h2>Ksh <?php echo number_format($tax, 2);?></h2></td>
                </tr> -->

                <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td class="Rate right"><h2>Total</h2></td>
                    <td class="payment right"><h2>Ksh <?php echo number_format($total, 2);?></h2></td>
                </tr>

                <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td class="Rate right"><h2>Amount Paid</h2></td>
                    <td class="payment right"><h2>Ksh <?php echo number_format($paid_amount, 2);?></h2></td>
                </tr>

                <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td class="Rate right"><h2>Change Return</h2></td>
                    <td class="payment right"><h2>Ksh <?php echo number_format($change_return, 2);?></h2></td>
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