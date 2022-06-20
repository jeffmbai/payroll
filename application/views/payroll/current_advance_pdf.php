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
        .btn-xs {
            margin: 0px !important;
        }
        .basic{
            color: blue;
        }
        .allow {
            color: green;
        }
        .gross {
            color: black;
        }
        .dedct {
            color: red;
        }
        .net {
            color: green;
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
            <center><h3><?=$org->address?></h3>
            <span style="color: #047774;"><?php echo $_SESSION['payroll_month'].' / '.$_SESSION['payroll_year'];?></span>
            </center>
        </p>

        <div style="width: 100%;">
            
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="table" style="margin-top: 10px;">
                        <table>
                            <thead>
                                <tr class="tr-h">
                                    <th class="td-h">Staff</th>
                                    <th class="td-h gross">Bank</th>
                                    <th class="td-h gross">Code</th>
                                    <th class="td-h gross">Account No.</th>
                                    <th class="td-h net">Amount</th>   
                                </tr>
                            </thead>
                            <tbody id="table-data">
                                <?php
                                $c = 0;
                                $total = 0;
                                foreach($current_payroll as $p) {
                                    $c++;
                                    $total += $p->advance_amount;
                                    ?>
                                        <tr class="even pointer">
                                            <td>
                                                <?php 
                                                    echo strtoupper($p->first_name.' '.$p->last_name.' <i>(ID:'.$p->id_number.')</i>');
                                                ?>
                                            </td>
                                            <td class="gross"><?=$p->bank_name.' '.$p->branch_name;?></td>
                                            <td class="gross"><?=$p->branch_code;?></td>
                                            <td class="gross"><?=$p->bank_account_no;?></td>
                                            <td class="net"><?=number_format($p->advance_amount);?></td>   

                                        </tr>

                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr class="tr-h">
                                    <th class="td-h" colspan="4">TOTALS</th>
                                    <th class="td-h gross"><u><?=number_format($total);?></u></th>
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