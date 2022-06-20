<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $page ?> | JiPos</title>
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

        $org = $this->db->where('org_id', $_SESSION['orgid'])->get('orgs')->row();
        $yearName = $this->db->where('fiscal_year_id',$_SESSION['fsid'])->get('fiscal_years')->row('fiscal_year_name');
        ?>

        <div class="row">

            <p>
                <!-- <img img src="assets/school_logo.jpg" style="float:left; width:100px; height:100px;" /> -->
                <center>
                    <h2><?= $org->org_name ?></h2>
                    <h3>School Budget</h3>
                    <p>
                        Year: <?=$yearName?>
                        <br/>
                        Quarter: <?=$_SESSION['tmid']?>
                    </p>
                </center>
            </p>

            <div style="width: 100%;">

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="table">
                            <table>
                                <thead>
                                    <tr class="tr-h">
                                        <th class="td-h">Name</th>
                                        <th class="td-h">Year</th>
                                        <th class="td-h">Quarter</th>
                                        <th class="td-h">Account</th>
                                        <th class="td-h">Monitor</th>
                                        <th class="td-h">Budget Amount</th>
                                        <th class="td-h">Practical Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="table-data">
                                    <?php

                                    foreach ($budgets as $dt) {
                                        $total_cr = $this->db->where("account_id = '$dt->account_id' AND voucher_type = 'cr' AND term_id = '$_SESSION[termid]' AND fiscal_year_id = '$dt->fiscal_year_id' ")->select_sum('voucher_amount')->get('vouchers')->row('voucher_amount');
                                    ?>
                                        <tr>
                                            <td>
                                                <a href="#" onclick="window.open('<?php echo site_url('budgeting/budget_journals/' . $dt->budget_id); ?>','Budget Journals','width=900')"> <?= $dt->budget_name ?> </a>
                                            </td>
                                            <td> <?= $dt->fiscal_year_name ?> </td>
                                            <td> <?= $dt->term_id ?> </td>
                                            <td> <?= $dt->account_name ?> </td>
                                            <td> <?= $dt->first_name . ' ' . $dt->last_name ?> </td>
                                            <td> <?= number_format($dt->budget_amount, 2) ?> </td>
                                            <td>
                                                <?php
                                                if ($dt->budget_amount > $total_cr) echo '<span style="color: green"> ' . number_format($total_cr, 2) . '</span>';
                                                else echo '<span style="color: red"> ' . number_format($total_cr, 2) . '</span>';
                                                ?>
                                            </td>
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