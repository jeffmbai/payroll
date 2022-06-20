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
    </style>

</head>

<?php
$org = $this->db->where('org_id', $_SESSION['orgid'])->get('orgs')->row();
$date = $_SESSION['sheet_date'];
?>

<body style="background-color: #fff;">

    <div class="container-fluid" style="margin-bottom: 10px; margin-left: 10px; margin-right: 10px;">

        <div style="float: left; width: 5%;">
            <img img src="assets/POS-JiPOS-logo.png" style="float:left; max-height:100px;" />
        </div>
        <div style="float: left; width: 40%; text-align: center;">
            
                <h3><?= $org->org_name ?></h3>
                <h3><?= $org->address ?></h3>
                <h4>Balance Sheet</h4>
                <h4>as per: <?= date("d-M-Y", strtotime($_SESSION['sheet_date'])); ?></h4>
            
        </div>

        <br/>

        <div class="row" style="margin-top: 110px;">

            <?php
            $total_assets = $total_libilities = 0;
            ?>

            <div style="width: 100%;">

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="table" style="margin-top: 5px;">
                            <table class="" style="width: 100%">
                                <tbody>
                                    <!-- ASSETS START -->
                                    <tr style="background-color: #025757; color: #fff">
                                        <th>ASSETS</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php // Main Assets Category
                                    $assets_types = $this->db->where('account_type_id', 1)->get('subaccount_types')->result();
                                    foreach ($assets_types as $astype) {
                                    ?>
                                        <tr style="background-color: #EAF4F2;">
                                            <th></th>
                                            <th><?= $astype->subaccount_type_name ?></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <?php
                                        //get accounts
                                        $subasset_accounts = $this->db->select('account_id, account_code, account_name, opening_balance')
                                            ->from('accounts')
                                            ->where('subaccount_type_id', $astype->subaccount_type_id)
                                            ->get()->result();
                                        $totals2 = 0;
                                        foreach ($subasset_accounts as $subacc) {
                                            // get total debit and credit for this account
                                            $ttdr = $this->db->where(" account_id = '$subacc->account_id' AND voucher_type = 'dr' AND transaction_date <= '$date' ")->select_sum('voucher_amount')->get('vouchers')->row();
                                            $ttcr = $this->db->where(" account_id = '$subacc->account_id' AND voucher_type = 'cr' AND transaction_date <= '$date' ")->select_sum('voucher_amount')->get('vouchers')->row();

                                            // special case for accounts receivable
                                            if ($subacc->account_code == '300001') {
                                                $ttcr = $this->db->where(" voucher_type = 'cr' AND transaction_date <= '$date' AND is_duplicate = 0 ")->select_sum('voucher_amount')->get('vw_balances')->row();
                                                $ttdr = $this->db->where(" voucher_type = 'dr' AND transaction_date <= '$date' AND is_duplicate = 0 ")->select_sum('voucher_amount')->get('vw_balances')->row();

                                                // to get total, subtract credit from debit
                                                // then exempt overpayments
                                                $diff1 = $ttcr->voucher_amount - $ttdr->voucher_amount;
                                                if ($diff1 < 0 && $subacc->account_code == '300001') $diff1 = 0;
                                            } else {

                                                // to get total, subtract credit from debit
                                                // then exempt overpayments
                                                $diff1 = $ttdr->voucher_amount - $ttcr->voucher_amount;
                                                if ($diff1 < 0) $diff1 = 0;
                                            }
                                            $totals2 += $diff1;

                                        ?>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <td><?= $subacc->account_name ?></td>
                                                <td><?= number_format($diff1, 2) ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr style="background-color: #EAF4F2;">
                                            <th></th>
                                            <th></th>
                                            <th>Total <?= $astype->subaccount_type_name ?></th>
                                            <th style="border-top: 1px solid; border-bottom: 1px solid;"><?= number_format($totals2, 2) ?></th>
                                        </tr>
                                    <?php
                                        $total_assets += $totals2;
                                    }
                                    ?>

                                    <?php // Income balances as Assets
                                    $income_types = $this->db->where("account_type_id = 4 AND subaccount_type_id = 17 ")->get('subaccount_types')->result();
                                    foreach ($income_types as $astype) {
                                    ?>
                                        <tr style="background-color: #EAF4F2;">
                                            <th></th>
                                            <th><?= $astype->subaccount_type_name ?></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <?php
                                        //get accounts
                                        $subincome_accounts = $this->db->select('account_id, account_code, account_name, opening_balance')
                                            ->from('accounts')
                                            ->where('subaccount_type_id', $astype->subaccount_type_id)
                                            ->get()->result();
                                        $totals2 = 0;
                                        foreach ($subincome_accounts as $subacc) {
                                            // get total debit and credit for this account
                                            $ttdr = $this->db->where(" account_id = '$subacc->account_id' AND voucher_type = 'dr' AND transaction_date <= '$date' ")->select_sum('voucher_amount')->get('vouchers')->row();
                                            $ttcr = $this->db->where(" account_id = '$subacc->account_id' AND voucher_type = 'cr' AND transaction_date <= '$date' ")->select_sum('voucher_amount')->get('vouchers')->row();
                                            // to get total, subtract debbit from credit: the opposite. These are the amount due
                                            // then exempt overpayments
                                            $diff1 = $ttcr->voucher_amount - $ttdr->voucher_amount;
                                            // if($diff1 < 0 && $subacc->account_code == '300001') $diff1 = 0;
                                            $totals2 += $diff1;

                                        ?>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <td><?= $subacc->account_name ?></td>
                                                <td><?= number_format($diff1, 2) ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr style="background-color: #EAF4F2;">
                                            <th></th>
                                            <th></th>
                                            <th>Total <?= $astype->subaccount_type_name ?></th>
                                            <th style="border-top: 1px solid; border-bottom: 1px solid;"><?= number_format($totals2, 2) ?></th>
                                        </tr>
                                    <?php
                                        $total_assets += $totals2;
                                    }
                                    ?>


                                    <!-- LIABILITIES START -->
                                    <tr style="background-color: #025757; color: #fff">
                                        <th>LIABILITIES</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php
                                    $assets_types = $this->db->where('account_type_id', 5)->get('subaccount_types')->result();
                                    foreach ($assets_types as $astype) {
                                    ?>
                                        <tr style="background-color: #EAF4F2;">
                                            <th></th>
                                            <th><?= $astype->subaccount_type_name ?></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <?php
                                        //get accounts

                                        $subasset_accounts = $this->db->select('account_id, account_code, account_name, opening_balance')
                                            ->from('accounts')
                                            ->where('subaccount_type_id', $astype->subaccount_type_id)
                                            ->where('active', 1)
                                            // ->where(" account_code <> '600002' ")
                                            ->get()->result();
                                        
                                        $totals3 = 0;
                                        foreach ($subasset_accounts as $subacc) {
                                            // if ($subacc->account_code == '600002') continue; // skip the supplier balances account and do the manual voucher query
                                            // get total debit and credit for this account
                                            $ttdr = $this->db->where(" account_id = '$subacc->account_id' AND voucher_type = 'dr' AND transaction_date <= '$date' ")->select_sum('voucher_amount')->get('vouchers')->row();
                                            $ttcr = $this->db->where(" account_id = '$subacc->account_id' AND voucher_type = 'cr' AND transaction_date <= '$date' ")->select_sum('voucher_amount')->get('vouchers')->row();
                                            // to get total, subtract credit from debit
                                            $totals3 += ($ttdr->voucher_amount - $ttcr->voucher_amount);

                                        ?>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <td><?= $subacc->account_name ?></td>
                                                <td><?= number_format($ttdr->voucher_amount - $ttcr->voucher_amount, 2) ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        // supplier balances
                                        $totaldues = 0;
                                        // $suppliers = $this->db->where('system_role', 3)->get('entitys')->result();
                                        // foreach ($suppliers as $tbd) {
                                        //     // $supp = $this->db->where("account_code =  '$tbd->business_code' AND table_name = 'entitys' ")->get('accounts')->row();
                                        //     $suptotal_cr = $this->db->where(" account_code = '$tbd->business_code' AND voucher_type = 'cr' AND transaction_date <= '$date' ")->select_sum('voucher_amount')->get('vouchers')->row('voucher_amount');
                                        //     $suptotal_dr = $this->db->where(" account_code = '$tbd->business_code' AND voucher_type = 'dr' AND transaction_date <= '$date' ")->select_sum('voucher_amount')->get('vouchers')->row('voucher_amount');
                                        //     $suptotal_due = $suptotal_cr - $suptotal_dr;
                                        //     $totaldues += $suptotal_due;
                                        // }

                                        ?>


                                        <tr style="background-color: #EAF4F2;">
                                            <th></th>
                                            <th></th>
                                            <th>Total <?= $astype->subaccount_type_name ?></th>
                                            <th style="border-top: 1px solid; border-bottom: 1px solid;"><?= number_format($totals3 + $totaldues, 2) ?></th>
                                        </tr>
                                    <?php
                                        $total_libilities += $totals3;
                                    }
                                    ?>

                                    <!-- SHAREHOLDER'S EQUITY START -->
                                    <tr style="background-color: #025757; color: #fff">
                                        <th>SHAREHOLDER'S EQUITY</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr style="background-color: #EAF4F2;">
                                        <th></th>
                                        <th>S.Equity</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <td>Combined S.Equity</td>
                                        <td><?= number_format($total_assets - $total_libilities, 2) ?></td>
                                    </tr>
                                    <tr style="background-color: #EAF4F2;">
                                        <th></th>
                                        <th></th>
                                        <th>Total <?= $astype->subaccount_type_name ?></th>
                                        <th style="border-top: 1px solid; border-bottom: 1px solid;"><?= number_format($total_assets - $total_libilities, 2) ?></th>
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