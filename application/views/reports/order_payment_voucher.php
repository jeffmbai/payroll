<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Voucher | JTL School</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
            font-size: 13px;
            font-weight: 400;
            line-height: 1.471;
        }
        table {
        border-collapse: collapse;
        width: 100%;
        }

        table, td, th {
        border: 1px solid black;
        }
    </style>
  
</head>
<body style="background-color: #fff;">

<?php

#logo
$imagePath = base_url('assets/POS-JiPOS-logo.png');

$balance = 0;

$totalpaid = $this->db->where('order_id',$payment->order_id)->select_sum('payment_amount')->get('order_payments')->row('payment_amount');

$balance = $payment->net_amount - $totalpaid;


$org = $this->db->where('org_id',$_SESSION['orgid'])->get('orgs')->row();

?>

<div class="container-fluid">
    <div class="row">
        <div style="text-align: center;">
            <?=$org->org_name?> <br>
            <?=$org->address?>
        </div>
    </div>
  <div class="row">
      <div class="col-md-12" style="text-align: center;">
          <h4><u><?php echo date('Y').' Payment Voucher';?></u></h4>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12">
            <span style="text-align: left">
              Account: <u><?=$payment->account_name.'/'.$payment->account_code?></u>
            </span>
          <span style="padding-left: 250px">
              Payment Voucher No. <u><?php echo $payment->order_payment_id;?></u>
          </span>
          <br><br>
          <span style="text-align: left">
              <u><?php echo $payment->firstname.' '.$payment->secondname.' '.$payment->lastname;?></u>
          </span>
      </div>
  </div>

  <br>

  <div class="row">
      <div class="col-md-12">
          <table class="table ">
              <thead>
                  <tr>
                    <th>DATE</th>
                    <th>DETAILED DESCRIPTION OF SERVICES</th>
                    <th>TOTAL AMOUNT</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td><?php echo $payment->payment_date;?></td>
                      <td><?php echo $payment->narrative;?></td>
                      <th><?php echo number_format($payment->payment_amount, 2);?></th>
                  </tr>
                  <tr>
                      <th colspan="2">TOTAL</th>
                      <th><?php echo number_format($payment->payment_amount, 2);?></th>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12">
         <p>
             I certify that the above account is correct and was incurred under the authority 
             and that the amount paid is chargeable to this account
         </p>
         <!--<div class="table">
             <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th>VOTE HEAD</th>
                         <th>AMOUNT</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <td><?php echo $vote_head_name;?></td>
                         <td><?php echo number_format($payment_amount, 2);?></td>
                     </tr>
                     
                     <tr>
                         <td style="text-align: center;"> TOTAL </td>
                         <th><?php echo number_format($payment_amount, 2);?></th>
                     </tr>
                 </tbody>
             </table>
         </div>-->

         <p>
             <span class="">
                 Date _____<u><?php echo $payment->payment_date;?></u>______ Cash / M-pesa / Cheque _______<u><?php if($payment->check_number != '' || $payment->check_number != null || $payment->check_number != 0) echo $payment->check_number; else echo number_format($payment->payment_amount, 2); ?></u>_________
                 <br>
                 Prepared by ______________________ Authorised by _____________________
             </span>
         </p>

         <p style="text-align: center;">
            <u>RECEIPT</u>
         </p>

         <p>            
             Received this _____________________________________ Day of ________________________________
             <br>
             In payment of the above account balance being <b><u><?php echo number_format($balance, 2);?></u></b>
             <br>
             As per previous Voucher No ___________________________________________
             <br>
             ID No. __________________________________   Signature of the receiver _____________________
         </p>

      </div>
  </div>


  

</div>


</body>
</html> 



