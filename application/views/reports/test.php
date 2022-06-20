<!DOCTYPE html>
<?php
foreach($order_header as $header) {
    $order_id = $header->order_id;
    $bill_no = $header->bill_no;
    #$customer_name = $header->customer_name;
    $date_time = $header->date_time;
    $service_charge = $header->service_charge;
    $tax_charge = $header->tax_charge;
    $net_amount = $header->net_amount;
    $discount = $header->discount;
    $paid_status = $header->paid_status;
    $time_stamp = $header->time_stamp;
    $cashier_name = $header->firstname.' '.$header->secondname;
}
?>

<html lang="en">

<head>
  <title>Sales Receipt</title>

  <style>
      #invoice-POS{
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        padding:2mm;
        margin: 0 auto;
        width: 44mm;
        background: #FFF;
      }
        
        ::selection {background: #f31544; color: #FFF;}
        ::moz-selection {background: #f31544; color: #FFF;}
        h1{
        font-size: 1.5em;
        color: #222;
        }
        h2{font-size: .9em;}
        h3{
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
        }
        p{
        font-size: .7em;
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
        td{
        //padding: 5px 0 5px 15px;
        //border: 1px solid #EEE
        }
        .tabletitle{
        //padding: 5px;
        font-size: .5em;
        background: #EEE;
        }
        .service{border-bottom: 1px solid #EEE;}
        .item{width: 24mm;}
        .itemtext{font-size: .5em;}

        #legalcopy{
        margin-top: 5mm;
        }
  </style>

</head>

<body>

    <div class="">
        
  <div id="invoice-POS" style="border: 1px solid black;">
    
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2>Sales Receipt</h2>
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
        <p style="font-size: 8px;">
            Code: <?php echo $bill_no;?>  <br>     
            Date:  <?php echo $date_time; ?>  <br>
            Cashier:  <?php echo $cashier_name; ?>   <br>
            Time:  <?php echo $time_stamp; ?>  <br>
        </p>
      </div>
    </div><!--End Invoice Mid-->
    
    <div id="bot">

        <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="item"><h2>Item</h2></td>
                    <td class="Hours"><h2>Qty</h2></td>
                    <td class="Rate"><h2>Amount</h2></td>
                </tr>

                <?php
                    $total = null;
                    $tax = null;
                    foreach($order_items as $item) {
                        $total += $item->amount;
                        $tax += ($item->tax_id / 100) * $item->rate;
                        ?>
                        <tr class="service">
                            <td class="tableitem"><p class="itemtext"><?php echo $item->item_name;?></p></td>
                            <td class="tableitem"><p class="itemtext"><?php echo $item->qty;?></p></td>
                            <td class="tableitem"><p class="itemtext">Ksh <?php echo number_format($item->rate, 2);?></p></td>
                        </tr>
                        <?php
                    }
                ?>

                <tr class="tabletitle">
                    <td></td>
                    <td class="Rate"><h2>tax</h2></td>
                    <td class="payment"><h2>Ksh <?php echo number_format($tax, 2);?></h2></td>
                </tr>

                <tr class="tabletitle">
                    <td></td>
                    <td class="Rate"><h2>Total</h2></td>
                    <td class="payment"><h2>Ksh <?php echo number_format($total, 2);?></h2></td>
                </tr>

            </table>
        </div><!--End Table-->

        <div id="legalcopy">
            <p class="legal"><strong>Thank you for your business!</strong>  Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices. 
            </p>
        </div>

    </div><!--End InvoiceBot-->
  </div><!--End Invoice-->

    </div>

</body>
</html>