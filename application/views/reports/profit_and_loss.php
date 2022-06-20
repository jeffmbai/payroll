<!DOCTYPE html>
<html lang="en">
<head>
    <title> <?=$page?> | JiPos</title>
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

        table, td, th {
        border: 1px solid black;
        }
    </style>
  
</head>
<body style="background-color: #fff;">

<div class="container-fluid" style="margin-bottom: 20px; margin-left: 20px; margin-right: 20px;">

    <?php
        $total_expense = $total_income = $difference = 0;
    ?>

    <?php
        $org = $this->db->where('org_id',$_SESSION['orgid'])->get('orgs')->row();

        $total_expense = $total_income = $difference = 0;

        $totalamount = $totaldiscount = $totaldues = $totalpayments = $totalcr = $ttarear = $ttarear2 = $xyz = 0;
        $fromdate = $_SESSION['fromdate'];
        $todate = $_SESSION['todate'];
        //change date formats to be acceptable by mysql db
        // $fromdate = date('Y-d-m', strtotime($fromdate));
        // $todate = date('Y-d-m', strtotime($todate));

        // get all the fee receivable/ to be paid here within the given time-range
        $where1 = "AND (transaction_date BETWEEN '$fromdate' AND '$todate')";        
        // $fee_payable = $this->db->where(" voucher_type = 'cr' AND opening_closing_balance = 'Opening' AND table_name = 'student_fee' $where1 ")->select_sum('voucher_amount')->get('vouchers')->row('voucher_amount');
        $fee_payable = $this->db->where(" voucher_type = 'dr' AND account_code = '300001' AND is_duplicate = 0 $where1 ")->select_sum('voucher_amount')->get('vouchers')->row('voucher_amount');
        

        $total_income += $fee_payable;
    ?>

    <div class="row">
        
        <p>
            <!-- <img img src="assets/school_logo.jpg" style="float:left; width:100px; height:100px;" /> -->
            <center>
                <h3><?=$org->org_name?></h3>
                <h3><?=$org->address;?></h3>
                <span style="color: #047774;">From <?php echo date("Y-M-d", strtotime($_SESSION['fromdate'])).' to '.date("Y-M-d", strtotime($_SESSION['todate']));?></span>
            </center>
        </p>

        <div style="width: 100%;">
            
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="table" style="margin-top: 5px;">
                        <table class="" style="width: 100%">
                            <tbody>
                                <tr>
                                    <th>INCOME</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <?php
                                    foreach($incomes as $income) {
                                        $total_income += $income->total_amount;
                                        ?>
                                        <tr>
                                            <td></td>
                                            <!-- <td><?=$income->subaccount_type_name?></td> -->
                                            <td><a href="<?php echo site_url('accounting/account_ledger/'.$income->account_code);?>"><?=$income->account_name?></a></td>
                                            <td><?=number_format($income->total_amount, 2)?></td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                                <tr>
                                    <td></td>
                                    <td><a href="<?php echo site_url('accounting/account_ledger/300001');?>">School Fees</a></td>
                                    <td><?=number_format($fee_payable, 2)?></td>
                                </tr>
                                <tr>
                                    <th>Total Income</th>
                                    <th></th>
                                    <th><?=number_format($total_income, 2)?></th>
                                </tr>


                                <tr>
                                    <th>EXPENSES</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <?php
                                    foreach($expenses as $expense) {
                                        $total_expense += $expense->total_amount;
                                        ?>
                                        <tr>
                                            <td></td>
                                            <!-- <td><?=$expense->subaccount_type_name?></td> -->
                                            <td><a href="<?php echo site_url('accounting/account_ledger/'.$expense->account_code);?>"><?=$expense->account_name?></a></td>
                                            <td><?=number_format($expense->total_amount, 2)?></td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                                <tr>
                                    <th>Total Expense</th>
                                    <th></th>
                                    <th><?=number_format($total_expense, 2)?></th>
                                </tr>

                                <?php
                                    $difference = $total_income - $total_expense;
                                    $info = null;
                                    if($difference >= 0) $info = 'NET Profit';
                                    else $info = 'NET Loss';
                                ?>
                                <tr> <td style="height: 15px;" colspan="3"></td> </tr>
                                <tr>
                                    <th><?=$info?></th>
                                    <th></th>
                                    <th>
                                        <u>
                                            <?php
                                                if($difference >= 0) echo '<span class="text-success"> '.number_format($difference, 2).' </span>';
                                                else echo '<span class="text-danger"> '.number_format(abs($difference), 2).' </span>';
                                            ?>
                                        </u>
                                    </th>
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