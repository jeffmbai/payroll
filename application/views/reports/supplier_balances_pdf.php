<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$page?> | JiPOS</title>
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
        $org = $this->db->where('org_id',$_SESSION['orgid'])->get('orgs')->row();
    ?>

    <div class="row">
        
        <p>
            <!-- <img img src="assets/school_logo.jpg" style="float:left; width:100px; height:100px;" /> -->
            <center>
                <h3><?=$org->org_name?></h3>
                <h3><?=$org->address;?></h3>
                <span style="color: #107470; font-weight:bold">As at <?=date("Y-M-d");?></span>
            </center>
        </p>
        
        <div style="width: 100%;">
            
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="table" style="margin-top: 10px;">
                        <table>
                            <thead>
                                <tr class="headings">
                                    <th class="td-h">Name </th>
                                    <th class="td-h">Phone </th>
                                    <th class="td-h">TT. Amount </th>
                                    <th class="td-h">Amount Paid </th>
                                    <th class="td-h">Amount Due </th>
                                </tr>
                            </thead>
                            <tbody id="table-data">
                                <?php
                                    $totalamount = $totaldues = $totalpayments = 0;
                                    if(count($suppliers) < 1) {
                                        echo '<tr> <td colspan="7" style="color: orange;" >No data found!</td> </tr>';
                                    } else {
                                        
                                        foreach($suppliers as $tbd) {
                                            // Get voucher cr/dr
                                            $total_cr = $this->db->where(" account_code = '800001' AND customer_supplier_id = '$tbd->entity_id' AND voucher_type = 'cr' ")->select_sum('voucher_amount')->get('vw_general_ledger')->row('voucher_amount');
                                            $total_dr = $this->db->where(" account_id = '800001' AND customer_supplier_id = '$tbd->entity_id' AND voucher_type = 'dr' ")->select_sum('voucher_amount')->get('vw_general_ledger')->row('voucher_amount');
                                            $total_due = $total_cr - $total_dr;

                                            // $totalamount += $opening_balance;
                                            $totalamount += $total_cr;
                                            $totalpayments += $total_dr;
                                            $totaldues += $total_due;

                                            $color = null;
                                            if($total_due > 0) $color = ' style="background-color:#C6BFBF !important;" ';

                                            ?>
                                                <tr <?=$color;?> >
                                                    <td><?=$tbd->firstname.' '.$tbd->secondname.' '.$tbd->lastname?></td>
                                                    <td><?=$tbd->phone?></td>
                                                    <td><?=number_format($total_cr, 2)?></td>
                                                    <td><?=number_format($total_dr, 2)?></td>
                                                    <th><?=number_format($total_due, 2)?></th>
                                                </tr>
                                            <?php
                                        }

                                        ?>
                                            <tr>
                                                <th colspan="2">TOTAL (KES)</th>
                                                <th class="td-h"><?=number_format($totalamount, 2)?></th>
                                                <th class="td-h"><?=number_format($totalpayments, 2)?></th>
                                                <th class="td-h"><?=number_format($totaldues, 2)?></th>
                                            </tr>
                                        <?php
                                        
                                    }
                                ?>
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