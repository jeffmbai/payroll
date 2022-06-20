<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payment Receipt | JiPos</title>
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
            width: 100%;
        }

        table,
        td,
        th {
            border: 1px solid black;
        }
    </style>

</head>

<body style="background-color: #fff;">

    <?php

    // var_dump($payment);

    #logo
    $imagePath = base_url('assets/POS-JiPOS-logo.png');
    // $base64Image = 'data:'.$imagePath.';base64,'.base64_encode(file_get_contents($imagePath));

    $expense = $payment;
    $income_id = $payment->income_id;
    $org_id = $payment->org_id;
    //$expense_type_id = $payment->expense_type_id;
    // $vote_head_id = $payment->vote_head_id;
    $paid_by = $payment->paid_by;
    $status_id = $payment->status_id;
    $active = $payment->active;
    $income_amount = $payment->income_amount;
    $narrative = $payment->narrative;
    $income_date = $payment->income_date;
    $date_modified = $payment->date_modified;
    $time_stamp = $payment->time_stamp;
    $org_name = $payment->org_name;
    $address = $payment->address;
    $currency_id = $payment->currency_id;
    $country_id = $payment->country_id;
    $currency_code = $payment->currency_code;
    $name = $payment->name;
    $status_name = $payment->status_name;
    //$expense_type_name = $payment->expense_type_name;
    $entity_name = $payment->entity_name;
    $firstname = $payment->firstname;
    $secondname = $payment->secondname;
    $lastname = $payment->lastname;
    $phone = $payment->phone;
    $gender = $payment->gender;
    $dob = $payment->dob;
    $id_passport = $payment->id_passport;

    $income_payment_id = $payment->income_payment_id;
    $payment_amount = $payment->payment_amount;
    $subaccount_type_name = $payment->subaccount_type_name;
    $account_name = $payment->account_name;
    $account_code = $payment->account_code;
    $payment_date = $payment->payment_date;
    $reference = $payment->reference;

    $org = $this->db->where('org_id', $_SESSION['orgid'])->get('orgs')->row();

    $paid = $balance = 0;
    $paid = $this->db->select("SUM(payment_amount) as total_paid")->from('income_payments')->where('income_id', $income_id)->get()->row();
    $balance = $payment->income_amount - $paid->total_paid;

    ?>

    <div class="container-fluid">
        <div class="row">
            <div style="text-align: center;">
                <img src="./assets/school_logo.jpg" style="height: 80px;" />
                <br />
                <?= $org->org_name ?> <br>
                <?= $org->address ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="text-align: center;">
                <h4><u><?php echo date('d-m-Y', strtotime($payment_date)) . ' Payment Receipt'; ?></u></h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <span style="text-align: left">
                    Account: <u><?= $subaccount_type_name . '/' . $account_name . '/' . $account_code ?></u>
                </span>
                <span style="padding-left: 250px">
                    Payment Receipt No. <u><?php echo $income_payment_id; ?></u>
                </span>
                <br><br>
                <span style="text-align: left">
                    Mr/Mrs. <u><?php echo $paid_by; ?></u>
                </span>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-12">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>DETAILED DESCRIPTION OF SERVICES</th>
                            <th>TOTAL AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $payment_date; ?></td>
                            <td><?php echo $narrative; ?></td>
                            <th><?php echo number_format($payment_amount, 2); ?></th>
                        </tr>
                        <tr>
                            <th colspan="2">TOTAL</th>
                            <th><?php echo number_format($payment_amount, 2); ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <small>
                    This is system generated receipt on <?php echo date('d-m-Y H:m:i') ?>
                </small>

            </div>
        </div>




    </div>


</body>

</html>