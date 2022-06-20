<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trial Balance | JiPos</title>
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
            margin-left: auto;
            margin-right: auto;
        }
        th, td {
            border: 1px solid !important;
            text-align: center;
            padding: 2px;
        }
    </style>
  
</head>
<body style="background-color: #fff;">

<?php

#logo
$imagePath = base_url('assets/POS-JiPOS-logo.png');
$base64Image = 'data:'.$imagePath.';base64,'.base64_encode(file_get_contents($imagePath));

$vote_head_count = count($vote_heads);


?>

<div class="container-fluid">
    <div style="text-align: center;">
        ST. MARY'S GIRLS' SECONDARY SCHOOL NYAMOGO <br>
        P.O BOX 000-04000 NDHIWA
    </div>
  <div class="row" style="margin-top: 10px;">
      <div class="col-md-12" style="text-align: center;">
          <h4><u>TRIAL BALANCE FOR THE MONTH ENDED 'DATE'</u></h4>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12">
          <div class="table table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>VOTE HEAD</th>
                        <th>LF</th>
                        <th>ESTIMATE</th>
                        <th>DR</th>
                        <th>CR</th>
                        <th>COMMIT</th>
                        <th>BALANCES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ctrl = 0;
                        $total_payment = 0;
                        $query2 = $this->db->query("SELECT vote_head_id, sum(amount) as fee_amount FROM fee_payment_details group by vote_head_id ");
                        $query3 = $this->db->query("SELECT vote_head_id, sum(expense_balance) as expense_balance, sum(expense_amount) as expense_amount FROM expenses group by vote_head_id ");
                        $diff_1 = 0;

                        foreach($budgets as $budget) {
                            echo '<tr><th colspan="7">'.strtoupper($budget->budget_type).'</th></tr>';

                            #get budget_breakdown within this single budget
                            $query1 = $this->db->query("select * from budget_breakdown 
                                        INNER JOIN vote_heads ON budget_breakdown.vote_head_id = vote_heads.vote_head_id 
                                        LEFT JOIN budget ON budget_breakdown.budget_id = budget.budget_id 
                                        WHERE budget_breakdown.budget_id = ".$budget->budget_id." ");
                            foreach($query1->result() as $q1) {
                                #get budget_breakdown
                                echo "<tr>";

                                echo '<th>'.$q1->vote_head_name.'</th>';
                                echo '<th>'.$q1->budget_code.'</th>';
                                echo '<th>'.number_format($q1->budget_amount, 2).'</th>';

                                if($budget->budget_type == 'expenditure') { ##==================#expenditure  :: CR :: expense==================##
                                    $xx = 0; $xy = 0;
                                    foreach($query3->result() as $q3) {
                                        if($q3->vote_head_id == $q1->vote_head_id) {
                                            $xy = $q3->expense_amount;
                                            $xx = $q3->expense_balance;
                                        }
                                    }
                                    if($xy != 0) {
                                        echo '<td>'.number_format($xy, 2).'</td> <td></td>';
                                        $diff_1 = $q1->budget_amount - $xy - $xx;  # Balances = Estimate - DR - Commit OR ba = estimate - (DR + Commit) 
                                    }else {
                                        echo '<td>-</td> <td></td>';
                                        $diff_1 = 0;
                                    }

                                    #echo balance if available
                                    if($q3->expense_balance != 0 && $xx != 0) echo '<td>'.$xx.'</td>';
                                    else echo '<td></td>';

                                } elseif ($budget->budget_type == 'income') { ##===================income :: DR :: fee payment=================##
                                    $xy = 0;
                                    foreach($query2->result() as $q2) {
                                        if($q2->vote_head_id == $q1->vote_head_id) $xy = $q2->fee_amount;
                                    }
                                    if($xy != 0) {
                                        echo '<td></td> <td>'.number_format($xy, 2).'</td> <td></td>';
                                        $diff_1 = $q1->budget_amount - $xy;
                                    }else {
                                        echo '<td></td> <td>-</td> <td></td>';
                                        $diff_1 = 0;
                                    }
                                    
                                }

                                if($diff_1 != 0) echo '<td>'.number_format($diff_1, 2).'</td>';
                                else echo '<td></td>';

                                echo "</tr>";
                            }

                        ?>
                        <?php
                        }
                        echo '<tr>
                                <th>Others</th>
                                <th colspan="6"></th>
                            </tr>';
                        echo '<tr>
                            <td>FEES ARREARS</td>
                            <td>LF19</td>
                            <td></td>
                            <td></td>
                            <td>'.number_format((-1 * $arrears), 2).'</td>
                            <td></td>
                            <td></td>
                        </tr>';
                        echo '<tr>
                            <td>FEES ARREARS</td>
                            <td>LF19</td>
                            <td></td>
                            <td></td>
                            <td>'.number_format($prepayments, 2).'</td>
                            <td></td>
                            <td></td>
                        </tr>';

                        #financial controls
                        foreach($financial_control as $fc) {
                            echo '<tr>';
                            
                                echo '<td>'.$fc->financial_control_name.'</td>';
                                echo '<td>'.$fc->financial_control_code.'</td>';
                                echo '<td></td>';
                                if($fc->financial_control_type == 'DR') {  #debit
                                    echo '<td>'.$fc->financial_control_amount.'</td> <td></td>';
                                } elseif($fc->financial_control_type == 'CR') {  #credit
                                    echo '<td></td> <td>'.$fc->financial_control_amount.'</td>';
                                } else {
                                    echo '<td></td> <td></td>';
                                }

                                echo '<td></td>';
                                echo '<td></td>';

                            echo '</tr>';
                        }
                            
                    ?>
                </tbody>
            </table>
          </div>
      </div>
  </div>

</div>

</body>
</html> 