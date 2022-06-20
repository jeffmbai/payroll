<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Voucher | JiPos</title>
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
// $base64Image = 'data:'.$imagePath.';base64,'.base64_encode(file_get_contents($imagePath));

$expense = $payment;
$expense_id = $expense->expense_id;
$org_id = $expense->org_id;
// $expense_type_id = $expense->expense_type_id;
$vote_head_id = $expense->vote_head_id;
// $vote_head_name = $expense->vote_head_name;
$paid_to = $expense->paid_to;
$expense_balance = $expense->expense_balance;
$status_id = $expense->status_id;
$active = $expense->active;
$expense_amount = $expense->expense_amount;
$narrative = $expense->narrative;
$expense_date = $expense->expense_date;
$date_modified = $expense->date_modified;
$time_stamp = $expense->time_stamp;
$org_name = $expense->org_name;
$address = $expense->address;
$currency_id = $expense->currency_id;
$country_id = $expense->country_id;
$currency_code = $expense->currency_code;
$name = $expense->name;
$status_name = $expense->status_name;
//$expense_type_name = $expense->expense_type_name;
$entity_name = $expense->entity_name;
$firstname = $expense->firstname;
$secondname = $expense->secondname;
$lastname = $expense->lastname;
$phone = $expense->phone;
$gender = $expense->gender;
$dob = $expense->dob;
$id_passport = $expense->id_passport;

$payment_id = $expense->payment_id;
$payment_amount = $expense->payment_amount;
$subaccount_type_name = $expense->subaccount_type_name;
$account_name = $expense->account_name;
$account_code = $expense->account_code;
$payment_date = $expense->payment_date;
$check_no = $expense->check_no;

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
              Account: <u><?=$subaccount_type_name.'/'.$account_name.'/'.$account_code?></u>
            </span>
          <span style="padding-left: 250px">
              Payment Voucher No. <u><?php echo $payment_id;?></u>
          </span>
          <br><br>
          <span style="text-align: left">
              Mr/Mrs. <u><?php echo $paid_to;?></u>
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
                      <td><?php echo $payment_date;?></td>
                      <td><?php echo $narrative;?></td>
                      <th><?php echo number_format($payment_amount, 2);?></th>
                  </tr>
                  <tr>
                      <th colspan="2">TOTAL</th>
                      <th><?php echo number_format($payment_amount, 2);?></th>
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
                 Date _____<u><?php echo $payment_date;?></u>______ Cash / M-pesa / Cheque _______<u><?php if($check_no != '' || $check_no != null || $check_no != 0) echo $check_no; else echo number_format($payment_amount, 2); ?></u>_________
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
             In payment of the above account balance being <b><u><?php echo number_format($expense_balance, 2);?></u></b>
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



