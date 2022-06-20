<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$page?> | JiPos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
            font-size: 10px;
            font-weight: 400;
            line-height: 1.471;
        }
        table {
        border-collapse: collapse;
        width: 100%;
        }

        .td-h {
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        }
    </style>
  
</head>
<body style="background-color: #fff; top: 0; margin-top: 0px">

<div class="container-fluid" style="margin-bottom: 20px; margin-left: 20px; margin-right: 20px; margin-top: 3px">

    <?php
        $total_cr = $total_dr = 0;
        // $difference = $account->opening_balance;
        $difference = 0;

        $org = $this->db->where('org_id',$_SESSION['orgid'])->get('orgs')->row();
    ?>

    <div class="row">
        
        <p>
            <!-- <img img src="assets/school_logo.jpg" style="float:left; width:100px; height:100px;" /> -->
            <center><h3><?=$org->org_name?></h3>
            </center>
        </p>

        <div class="" style="width: 100%;">
            <div class="" style="width: 50%; float:left; padding-top: 10px; height: 70px">
                <table style="width: 100%;">
                    <tbody>
                        <tr>
                            <th>Account</th>
                            <th></th>
                            <td>: <?=$account->account_code?></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <th></th>
                            <td>: <?=$account->account_name?></td>
                        </tr>
                        <tr style="color: #047774;">
                            <td>From <?=date('d-m-Y', strtotime($_SESSION['fromdate']))?></td>
                            <th>to</th>
                            <td><?=date('d-m-Y', strtotime($_SESSION['todate']))?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="" style="width: 50%; float:right; padding-top: 10px; height: 70px">
                <table style="width: 100%;">
                    <tbody>
                        <tr>
                            <th>Organization</th>
                            <td>: <?=$org->org_name?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>: <?=$org->address?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: <?=$org->email?></td>
                        </tr>
                        <tr>
                            <th>Tel</th>
                            <td>: <?=$org->phone?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div style="width: 100%;">
            
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="table" style="margin-top: 90px;">
                        <table>
                            <thead>
                                <tr class="tr-h">
                                    <th class="td-h" style="width: 60px">Date</th>
                                    <!--<th class="td-h">Ref</th>-->
                                    <th class="td-h" style="width: 320px">Details</th>
                                    <th class="td-h">IN</th>
                                    <th class="td-h">OUT</th>
                                    <th class="td-h">Balance</th>
                                </tr>
                            </thead>
                            <tbody id="table-data">
                                <?php
                                    
                                    $total_cr = $total_dr = 0;
                                    // $difference = $account->opening_balance;
                                    $difference = 0;
                                    if($balance_brought_forward != null || $balance_brought_forward != '') $difference = $balance_brought_forward; // get the carry forward here

                                    ?>
                                        <tr>
                                            <td><?=date('d-m-Y', strtotime($_SESSION['fromdate']));?></td>
                                            <td>Balance Brought Forward</td>
                                            <th></th>
                                            <th></th>
                                            <td><?=number_format($difference, 2);?></td>
                                        </tr>
                                    <?php

                                    foreach($crdrs as $dt) {
                                        $cr = $dr  = 0;
                                        $refs = $narrs = null;
                                        if($dt->voucher_type == 'dr') $dr = $dt->voucher_amount; else $dr = 0;
                                        if($dt->voucher_type == 'cr') $cr = $dt->voucher_amount; else $cr = 0;
                                        $total_cr += $cr;
                                        $total_dr += $dr;
                                        $difference += $dr - $cr;

                                        if($dt->table_name == 'payments') {
                                            $res1 = $this->db->where('payment_id',$dt->table_id)->get($dt->table_name)->row();
                                            if(count($res1) > 0) {
                                                $refs = $res1->reference;
                                                $narrs = $res1->narrative;
                                                // $this->db->where(" table_id = '$dt->table_id' AND table_name = 'payments' ")->update('vouchers',array('transaction_date'=>$res1->payment_date));
                                            }
                                        } elseif($dt->table_name == 'income_payments') {
                                            $res2 = $this->db->where('income_payment_id',$dt->table_id)->get($dt->table_name)->row();
                                            if(count($res2) > 0) {
                                                $refs = $res2->reference;
                                                $narrs = $res2->narrative;
                                                // $this->db->where(" table_id = '$dt->table_id' AND table_name = '$dt->table_name' ")->update('vouchers',array('transaction_date'=>$res1->payment_date));
                                            }
                                            
                                        }

                                        $studs = null;
                                        if(isset($dt->student_id)) {
                                            $stud = $this->db->select('admission_no, first_name, second_name, last_name')->from('students')->where('student_id',$dt->student_id)->get()->row();
                                            $studs = '<i>('.$stud->admission_no.' '.$stud->first_name.' '.$stud->second_name.' '.$stud->last_name.')</i>';
                                        }

                                        ?>
                                        <tr>
                                            <td><?=date('d-m-Y', strtotime($dt->transaction_date));?></td>
                                            <!--<td><?=$dt->account_name;?></td>-->
                                            <td><?=$dt->narrative.' '.$narrs.' '.$refs.' ~ '.$dt->voucher_code.' '.$studs;?></td>
                                            <td><?=number_format($dr,2);?></td>
                                            <td><?=number_format($cr,2);?></td>
                                            <td><?=number_format($difference, 2);?></td>
                                        </tr>
                                        <?php
                                    }

                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2"></th>
                                    <th><?='Total IN: KES' . number_format($total_dr,2)?></th>
                                    <th><?='Total OUT: KES' . number_format($total_cr,2)?></th>
                                    <th><?='Available Bal: KES' . number_format($difference,2)?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>



</div>

<pagebreak />

</body>
</html> 