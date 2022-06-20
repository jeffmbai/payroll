<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $page ?> | JiPOS</title>
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

        $org = $this->db->where('org_id', $_SESSION['orgid'])->get('orgs')->row();
        ?>

        <div class="row">

            <p>
                <!-- <img img src="assets/school_logo.jpg" style="float:left; width:100px; height:100px;" /> -->
                <center>
                    <h3><?= $org->org_name ?></h3>
                    <span style="color: #047774;">From <?php echo date("Y-M-d", strtotime($_SESSION['fromdate'])) . ' to ' . date("Y-M-d", strtotime($_SESSION['todate'])); ?></span>
                </center>
            </p>

            <div class="" style="width: 100%;">
                <div class="" style="width: 50%; float:left; padding-top: 10px; height: 70px">
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>: <?= $acc->firstname . ' ' . $acc->secondname . ' ' . $acc->lastname ?></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>: <?= $acc->phone ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>: <?= $acc->email ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>: <?= $acc->entity_address ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="" style="width: 50%; float:right; padding-top: 10px; height: 70px">
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <th>Organization</th>
                                <td>: <?= $org->org_name ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>: <?= $org->address ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>: <?= $org->email ?></td>
                            </tr>
                            <tr>
                                <th>Tel</th>
                                <td>: <?= $org->phone ?></td>
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
                                        <th class="td-h" style="width: 100px;">Date</th>
                                        <th class="td-h">Ref</th>
                                        <th class="td-h">Details</th>
                                        <th class="td-h">IN</th>
                                        <th class="td-h">OUT</th>
                                        <th class="td-h">Balance</th>
                                    </tr>
                                </thead>
                                <tbody id="table-data">
                                    <?php
                                    $balance_brought_forward = 0;
                                    $balance_brought_forward = $this->accounting->balance_brought_forward($from_date, '800001', $acc->entity_id);
                                    $statements = $this->accounting->account_statements($from_date, $to_date, '800001', $acc->entity_id);
                                    if (count($statements) < 1) {
                                        echo '<tr> <td><span class="text-warning">No data available</span></td> </tr>';
                                        exit();
                                    }

                                    $total_cr = $total_dr = 0;
                                    // $difference = $account->opening_balance;
                                    $difference = 0;
                                    if ($balance_brought_forward != null || $balance_brought_forward != '') $difference = $balance_brought_forward; // get the carry forward here

                                    ?>
                                    <tr>
                                        <td><?= date('d-m-Y', strtotime($from_date)); ?></td>
                                        <td></td>
                                        <td>Balance Brought Forward</td>
                                        <th></th>
                                        <th></th>
                                        <td><?= number_format($difference, 2); ?></td>
                                    </tr>
                                    <?php

                                    $statements = $this->accounting->account_statements($from_date, $to_date, '800001', $acc->entity_id);
                                    if (count($statements) < 1) {
                                        echo '<tr> <td><span class="text-warning">No data available</span></td> </tr>';
                                        exit();
                                    }

                                    foreach ($statements as $dt) {
                                        $cr = $dr = 0;
                                        if ($dt->voucher_type == 'dr') $dr = $dt->voucher_amount;
                                        else $dr = 0;
                                        if ($dt->voucher_type == 'cr') $cr = $dt->voucher_amount;
                                        else $cr = 0;
                                        $total_cr += $cr;
                                        $total_dr += $dr;
                                        $difference += $dr - $cr;
                                    ?>
                                        <tr>
                                            <td><?= date('d-m-Y', strtotime($dt->transaction_date)); ?></td>
                                            <td><?= $dt->voucher_code; ?></td>
                                            <td><?= $dt->narrative; ?></td>
                                            <th><?php if ($dt->voucher_type == 'dr') echo number_format($dt->voucher_amount, 2); ?></th>
                                            <th><?php if ($dt->voucher_type == 'cr') echo number_format($dt->voucher_amount, 2); ?></th>
                                            <td><?= number_format($difference, 2); ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <th>Total IN: <?= number_format($total_dr, 2); ?></th>
                                        <th>Total OUT: <?= number_format($total_cr, 2); ?></th>
                                        <th>Balance: <?= number_format($difference, 2); ?></th>
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