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
        text-align: left;
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
            <span style="color: #047774;"><?php echo date("d-M-Y");?></span>
            </center>
        </p>

        <div class="" style="width: 100%;">
            <div class="" style="width: 50%; float:left; padding-top: 10px; height: 70px">
                <table style="width: 100%;">
                    <tbody>
                        <tr>
                            <th>Account</th>
                            <td>: <?=$account->account_code?></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>: <?=$account->account_name?></td>
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
                                    $crdrs = $this->db->select('a.*, b.account_code, b.account_name')
                                        ->from('vouchers as a')
                                        ->join('accounts as b','a.account_id = b.account_id')
                                        ->where("a.account_id = '$account->account_id'")
                                        ->order_by('a.transaction_date', 'asc')
                                        // ->order_by('a.transaction_date', 'desc')
                                        ->get()->result();
                                    $total_cr = $total_dr = 0;
                                    // $difference = $account->opening_balance;
                                    $difference = 0;
                                    

                                    foreach($crdrs as $dt) {
                                        $cr = $dr  = 0;
                                        $refs = $narrs = null;
                                        if($dt->voucher_type == 'dr') $dr = $dt->voucher_amount; else $dr = 0;
                                        if($dt->voucher_type == 'cr') $cr = $dt->voucher_amount; else $cr = 0;
                                        $total_cr += $cr;
                                        $total_dr += $dr;
                                        $difference += $dr - $cr;
                                        $account_name = null;
                                        $student_name = null;

                                        if($cr == 0 && $dr == 0) continue;

                                        if($dt->table_name == 'payments') {
                                            $res1 = $this->db->where('payment_id',$dt->table_id)->get($dt->table_name)->row();
                                            if($res1) {
                                                $refs = $res1->reference;
                                                $narrs = $res1->narrative;
                                                // $this->db->where(" table_id = '$dt->table_id' AND table_name = 'payments' ")->update('vouchers',array('transaction_date'=>$res1->payment_date));
                                            }
                                        } elseif($dt->table_name == 'income_payments') {
                                            $res2 = $this->db->where('income_payment_id',$dt->table_id)->get($dt->table_name)->row();
                                            if($res2) {
                                                $refs = $res2->reference;
                                                $narrs = $res2->narrative;
                                                // $this->db->where(" table_id = '$dt->table_id' AND table_name = '$dt->table_name' ")->update('vouchers',array('transaction_date'=>$res1->payment_date));
                                            }
                                        } elseif($dt->account_type_id == 4 && $dt->subaccount_type_id == 4) {
                                            $account = $this->db->select('a.*, b.account_name')->from('vouchers as a')
                                                    ->join('accounts as b','a.account_id = b.account_id')
                                                    ->where("a.account_type_id = 1 AND a.voucher_code = '$dt->voucher_code' ")
                                                    ->get()->row();
                                            
                                            if(isset($account->account_name)) $account_name = $account->account_name;
                                        } 
                                       
                                        if($dt->account_code == '500004' && $dt->table_name == 'orders') { // uniform sales2
                                            $account = $this->db->select('a.account_id, b.account_name')->from('vouchers as a')->join('accounts as b','a.account_id = b.account_id')->where("a.voucher_code = '$dt->voucher_code' AND a.account_type_id = '1'")->get()->row();
                                            if(isset($account->account_name)) $account_name = $account->account_name;
                                        }
                                        if($dt->account_code == 'INTV01' && $dt->table_name == 'income_payments') { // interview
                                            $account = $this->db->select('a.account_id, b.account_name')->from('vouchers as a')->join('accounts as b','a.account_id = b.account_id')->where("a.voucher_code = '$dt->voucher_code' AND a.account_type_id = '1'")->get()->row();
                                            if(isset($account->account_name)) $account_name = $account->account_name;
                                        }
                                        if($dt->account_code == '500003' && $dt->table_name == 'income_payments') { // bread sales
                                            $account = $this->db->select('a.account_id, b.account_name')->from('vouchers as a')->join('accounts as b','a.account_id = b.account_id')->where("a.voucher_code = '$dt->voucher_code' AND a.account_type_id = '1'")->get()->row();
                                            if(isset($account->account_name)) $account_name = $account->account_name;
                                        }
                                        if($dt->account_code == '500002' && $dt->table_name == 'income_payments') { // bus hire
                                            $account = $this->db->select('a.account_id, b.account_name')->from('vouchers as a')->join('accounts as b','a.account_id = b.account_id')->where("a.voucher_code = '$dt->voucher_code' AND a.account_type_id = '1'")->get()->row();
                                            if(isset($account->account_name)) $account_name = $account->account_name;
                                        }
                                        if($dt->account_type_id == 1 && $dt->table_name == 'orders') { // uniform_sales
                                            // $get
                                            
                                        }
                                        
                                        ?>
                                        <tr>
                                            <td><?=date('d-m-Y', strtotime($dt->transaction_date));?></td>
                                            <!-- <td><?=$dt->account_name;?></td> -->
                                            <td><?=$dt->narrative.' '.$narrs.' '.$refs.' ~ '.$student_name.' '.$account_name.' '.$dt->voucher_code;?></td>
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