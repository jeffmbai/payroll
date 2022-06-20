<!DOCTYPE html>
<?php
foreach ($stock_details as $stk) {
$stock_id = $stk->stock_id;
$org_id = $stk->org_id;
$org_name = $stk->org_name;
$stock_name = $stk->stock_name;
$stock_date = $stk->stock_date;
$active = $stk->active;
$narrative = $stk->narrative;
$date_modified = $stk->date_modified;
$time_stamp = $stk->time_stamp;
}
?>

<html lang="en">

<head>
  <title>Stock Report</title>

  <style>
      #invoice-POS{
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        padding:2mm;
        margin: 0 auto;
        /* width: 55mm; */
        background: #FFF;
      }
        
        ::selection {background: #f31544; color: #FFF;}
        ::moz-selection {background: #f31544; color: #FFF;}
        h1{
        font-size: 1.5em;
        color: #222;
        }
        h2{font-size: 1.1em;}
        h3{
        font-size: 1.0em;
        font-weight: 300;
        line-height: 2em;
        }
        p{
        font-size: .9em;
        color: #666;
        line-height: 1.2em;
        }
        
        #top, #mid,#bot{ /* Targets all id with 'col-' */
        border-bottom: 1px solid #EEE;
        }

        /* #top{min-height: 100px;}
        #mid{min-height: 80px;} 
        #bot{ min-height: 50px;} */

        #top .logo{
            /* height: 60px;
            width: 60px; */
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
        text-align: center;
        }
        .tabletitle{
        font-size: .9em;
        background: #EEE;
        }
        .service{border-bottom: 1px solid #EEE;}
        .item{width: 24mm;}
        .itemtext{font-size: .8em;}

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
        <h2>Stock Report</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    
    <div id="mid">
      <div class="info">
        <h2><?php echo $org_name?></h2>
        <div style="text-align: left;">
            P.O. Box 00100 - 22139 Loita street Nairobi, Kenya <br>
            info@domain.com | 254 712 345 678 <br>
        </div>
        <div style="text-align: left;">
            Stock Name:  <?php echo $stock_name; ?> | Stock Date:  <?php echo $stock_date; ?> | Timestamp:  <?php echo $time_stamp; ?>  <br>
        </div>
      </div>
    </div><!--End Invoice Mid-->
    
    <div id="bot" style="margin-top: 10px;">

        <div id="table">
            <table>
                <tr class="tabletitle">
                    <th>Item Name</th>
                    <th>Actual Qty</th>
                    <th>System Qty</th>
                    <th>Status</th>
                    <th>Narrative</th>
                </tr>

                <?php
                  $actual_total = null;
                  $system_total = null;
                  foreach($stock_lines as $sl) {
                      $actual_total += $sl->item_quantity;
                      $system_total += $sl->system_quantity;
                      ?>
                      <tr class="service">
                          <td><p class="itemtext"><?php echo $sl->item_name.' '.$sl->barcode;?></p></td>
                          <td><p class="itemtext"><?php echo $sl->item_quantity;?></p></td>
                          <td><p class="itemtext"><?php echo $sl->system_quantity;?></p></td>
                          <td>
                            <p class="itemtext">
                              <?php 
                                $diff = $sl->system_quantity - $sl->item_quantity;
                                if($diff > 0) echo '<span class="text text-warning">More</span>';
                                elseif($diff == 0) echo '<span class="text text-success">Balanced</span>';
                                elseif($diff < 0) echo '<span class="text text-danger">Less</span>';
                              ?>
                            </p>
                          </td>
                          <td class="tableitem"><p class="itemtext">Ksh <?php echo $sl->narrative;?></p></td>
                      </tr>
                      <?php
                    }
                ?>

                <tr class="tabletitle">
                  <td colspan="3"></td>
                  <td class="Rate"><h2>System Stock</h2></td>
                  <td class="payment"><h2><?php echo $system_total;?></h2></td>
                </tr>

                <tr class="tabletitle">
                  <td colspan="3"></td>
                  <td class="Rate"><h2>Available Stock</h2></td>
                  <td class="payment"><h2><?php echo $actual_total;?></h2></td>
                </tr>

            </table>
        </div><!--End Table-->

        <div id="legalcopy">
            <p class="legal">
              This report is system generated 
            </p>
        </div>

    </div><!--End InvoiceBot-->
  </div><!--End Invoice-->

    </div>

</body>
</html>