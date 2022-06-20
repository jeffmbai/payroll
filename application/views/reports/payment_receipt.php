<!DOCTYPE html>
<html lang="en">
<head>
    <title> <?=$page?> | JiPos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
         @media print {
            html, body {
                display: block; 
                margin: 0;
            }

            @page {
            size: 21.59cm 13.97cm;
            }

            .logo {
            width: 30%;
            }

        }
        /* html, body {
            height: 100px;
        } */
        body {
            font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
            letter-spacing: 2px;
            font-size: 11px;
            font-weight: 400;
            /* line-height: 1.471; */
            line-height: 1.41;
        }
        .mtable{
            border: none !important; 
            text-align: left;
            padding-right: 8px;
        }
        .twd {
            width: 100px;
        }

    </style>
  
</head>
<body style="background-color: #fff;">

<?php

#logo
$imagePath = base_url('assets/POS-JiPOS-logo.png');

foreach($payment_receipt_header as $prh) {
    $fee_payment_id = $prh->fee_payment_id;
    $amount = $prh->amount;
    $current_balance = $prh->current_balance;
    $payment_date = $prh->payment_date;
    $paid_by = $prh->paid_by;
    $time_stamp = $prh->time_stamp;
    $first_name = $prh->first_name;
    $second_name = $prh->second_name;
    $last_name = $prh->last_name;
    $admission_no = $prh->admission_no;
    $student_type_name = $prh->student_type_name;
    $payment_mode_name = $prh->payment_mode_name;
    $reference = $prh->reference;
    $other_reference = $prh->other_reference;
    $classname = $prh->class_name;
    $streamid = $prh->stream_id;
    $entityid = $prh->entity_id;
}

$org = $this->db->where('org_id', $_SESSION['orgid'])->get('orgs')->row();
$user = $this->db->where('entity_id', $entityid)->get('entitys')->row();


?>

<div class="container-fluid" style="margin-bottom: 20px; margin-left: 20px; margin-right: 20px; border: 1px solid blue; padding: 1px;">
    <!-- <div class="row">
        <div class="col-md-12">
            <img src="assets/letter_head.jpg" width="100%"   />
        </div>
    </div>  -->

    <div class="row">
        
        <p style="float:left">
            <img img src="assets/school_logo.jpg" style="float:left; width:100px; height:100px; padding-right: 10px" />
            <h3 style="margin-right: 100px !important; padding-right: 100px !important"><u>OFFICIAL RECEIPT</u></h3>
            <h2><?=strtoupper($org->org_name)?></h2>
            <h3><?=strtoupper($org->address)?></h3>
        </p>

        <div style="width: 60%; float:left">
            
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="table">
                        <table class="" style="width: 60%">
                            <tr>
                                <th class="mtable">Student Name:</th>
                                <td class="mtable twd"><?php echo $first_name.' '.$second_name.' '.$last_name;?></td>
                                
                                <th class="mtable">Payment Date:</th>
                                <td class="mtable twd"><?php echo date("d-m-Y", strtotime($payment_date));?></td>
                            </tr>
                            <tr>
                                <th class="mtable">Adm</th>
                                <td class="mtable twd"><?php echo $admission_no;?></td>
                                
                                <th class="mtable">Receipt Date:</th>
                                <td class="mtable twd"><?php echo date("d-m-Y H:i", strtotime($time_stamp));?></td>
                            </tr>
                            <tr>
                                <th class="mtable">Paid:</th>
                                <td class="mtable twd"><?php echo 'KES'.number_format($amount);?></td>
                                
                                <th class="mtable">Fee Balance:</th>
                                <th class="mtable twd"><?php echo 'KES'.number_format($total_due);?></th>
                            </tr>
                            <tr>
                                <th class="mtable">Ref 1:</th>
                                <td class="mtable twd"><?=$reference;?></td>

                                <th class="mtable">Ref 2:</th>
                                <td class="mtable twd"><?php if($other_reference != '') echo $other_reference; else echo 'null';?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <p>
                <b>Student type:</b> <?php echo $student_type_name;?> <br>
                <b>Payment mode:</b> <?php echo $payment_mode_name;?> <br>
                <b>Paid by:</b>  <?php echo $paid_by;?> <br>
            </p>

        </div>

        <div style="width: 40%; float:right">
            <div class="row">
                <div class="col-md-12 col-xs-12" style="margin-right: 40px;">
                    <!-- <h4 style="text-align: right">Fee payment distribution</h4> -->
                    <p>
                        <u><b>Payment Options</b></u> <br>
                        <b>KCB:</b> 118 157 5397 <br>
                        <b>CFC Stanbic: </b> 010 000 016 6817 <br/>
                        <b>Bank of Africa: </b> 020 047 400 80 <br/>
                        <b>Paybill 522123, Acc No. 61806K </b>  <br/>
                    </p>
                </div>
            </div>
        </div>
    </div>



  <div style="margin-top: 100px; padding-top: 100px;">

    <div class="row">
        <div style="width: 50%; float:left;">
            <p>Served by: <?=$user->lastname.' '.$user->firstname.' '.$user->secondname?></p>
        </div>
        <div style="width: 50%; float:left;">
            <p>Signature __________________</p>
        </div>
    </div> 

    <div class="" style="text-align: left;">
        <p>
            <small>Note: This is system generated receipt on <?php echo date('d-m-Y');?></small>
        </p>
    </div>

    <div class="" style="color: red; text-align: center;">
        <hr>
        <p>
            <i>Motto: "School Motto"</i>
        </p>
    </div>


  </div>

</div>

<pagebreak />

</body>
</html> 