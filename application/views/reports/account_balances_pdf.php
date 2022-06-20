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
            <center>
                <h3><?=$org->org_name?></h3>
                <h4><?=$org->address?></h4>
                <span style="color: #047774;">As at <?php echo date("d-M-Y")?></span>
            </center>
        </p>

        <div style="width: 100%;">
            
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="table" style="margin-top: 20px;">
                        <table>
                            <thead>
                                <tr class="tr-h">
                                    <th class="td-h">#</th>
                                    <th class="td-h">Acc. Name</th>
                                    <th class="td-h">Acc. Code/Number</th>
                                    <th class="td-h">IN</th>
                                    <th class="td-h">OUT</th>
                                    <th class="td-h">Balance</th>
                                </tr>
                            </thead>
                            <tbody id="table-data">
                                <?php
                                    $accounts = $this->db->where("account_type_id = 1 and is_paymentmode = 1")->get('vw_accounts')->result();
                                    $c = $ttin = $ttout = 0;
                                    foreach($accounts as $acc) {
                                        $debit = $this->db->where("account_id = '$acc->account_id' AND voucher_type = 'dr' ")->select_sum('voucher_amount', 'total')->get('vouchers')->row();
                                        $credit = $this->db->where("account_id = '$acc->account_id'  AND voucher_type = 'cr'  ")->select_sum('voucher_amount', 'credo')->get('vouchers')->row();
                                        // $account_balance = number_format(($acc->opening_balance + $debit->total) - $credit->credo, 2);
                                        $account_balance = number_format($debit->total - $credit->credo, 2);
                                        $ttin += $debit->total;
                                        $ttout += $credit->credo;
                                        $c++;
                                        ?>
                                        <tr>
                                            <td><?=$c;?></td>
                                            <td><?=$acc->account_name;?></td>
                                            <td><a href="<?php echo site_url('accounting/account_ledger/'.$acc->account_code);?>"><?=$acc->account_code;?></a></td>                                         
                                            <td><?=$debit->total;?></td>
                                            <td><?=$credit->credo;?></td>
                                            <td><?=$account_balance;?></td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>                                         
                                    <th><u><?=number_format($ttin,2);?></u></th>
                                    <th><u><?=number_format($ttout, 2);?></u></th>
                                    <th><u><?=number_format($ttin - $ttout, 2);?></u></th>
                                </tr>
                            </tbody>
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