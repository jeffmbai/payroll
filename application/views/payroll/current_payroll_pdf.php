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
                                    <!-- <th class="td-h">Account No.</th> -->
                                    <th class="td-h basic">Basic Salary</th>
                                    <th class="td-h allow">Allowances</th>
                                    <th class="td-h gross">Gross Salary</th>
                                    <th class="td-h">NSSF</th>
                                    <th class="td-h">NHIF</th>
                                    <th class="td-h dedct">T.Deduct</th>
                                    <th class="td-h net">Net Salary</th>
                                </tr>
                            </thead>
                            <tbody id="table-data">
                                <?php
                                $c = 0;
                                $tbasic = $tallow = $tgross = $tnssf = $tnhif = $tdeduct = $tnet = 0;
                                foreach($current_payroll as $p) {
                                    $c++;
                                    $tbasic += $p->basic_salary;
                                    $tallow += $p->allowance;
                                    $tgross += $p->gross_salary;
                                    $tnet += $p->net_salary;
                                    $tnssf += $p->nssf;
                                    $tnhif += $p->nhif;
                                    $tdeduct += $p->deductible;
                                    ?>
                                        <tr class="even pointer">
                                            <td>
                                                <?php 
                                                    echo strtoupper($p->first_name.' '.$p->last_name.' <i>(ID:'.$p->id_number.')</i>');
                                                ?>
                                            </td>
                                            <!-- <td><?=$p->bank_account_no;?></td> -->
                                            <td class="basic"><?=number_format($p->basic_salary);?></td>
                                            <td class="allow"><?=number_format($p->allowance);?></td>
                                            <td class="gross"><?=number_format($p->gross_salary);?></td>
                                            <td><?=number_format($p->nssf);?></td>
                                            <td><?=number_format($p->nhif);?></td>
                                            <td class="dedct"><?=number_format($p->deductible);?></td>
                                            <td class="net"><?=number_format($p->net_salary);?></td>
                                        </tr>

                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr class="tr-h">
                                    <!-- <th class="tr-h"></th> -->
                                    <th class="tr-h">TOTALS</th>
                                    <th class="tr-h basic"><?=number_format($tbasic);?></th>
                                    <th class="tr-h allow"><?=number_format($tallow);?></th>
                                    <th class="tr-h gross"><?=number_format($tgross);?></th>
                                    <th class="tr-h"><?=number_format($tnssf);?></th>
                                    <th class="tr-h"><?=number_format($tnhif);?></th>
                                    <th class="tr-h dedct"><?=number_format($tdeduct);?></th>
                                    <th class="tr-h net"><?=number_format($tnet);?></th>
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