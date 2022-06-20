<!DOCTYPE html>
<html lang="en">
<?php

foreach($staff as $emp) {
    $employee_id = $emp->employee_id;
    $org_id = $emp->org_id;
    $designation_id = $emp->designation_id;
    $department_id = $emp->department_id;
    $first_name = $emp->first_name;
    $second_name = $emp->second_name;
    $last_name = $emp->last_name;
    $employee_name = $first_name.' '.$second_name.' '.$last_name;
    $email = $emp->email;
    $id_number = $emp->id_number;
    $primary_phone = $emp->primary_phone;
    $secondary_phone = $emp->secondary_phone;
    $dob = $emp->dob;
    $gender = $emp->gender;
    $address = $emp->address;
    $employment_number = $emp->employment_number;
    $employee_kra_pin = $emp->kra_pin;
    $nssf_number = $emp->nssf;
    $nhif_number = $emp->nhif;
    $job_grade = $emp->job_grade;
    $basic_salary = $emp->basic_salary;
    $org_name = $emp->org_name;
    $org_kra_pin = $emp->org_kra_pin;
    $department_name = $emp->department_name;
    $designation_name = $emp->designation_name;
}

$fiscal_year_name = null;
foreach($p9 as $d){
    $fiscal_year_name = $d->fiscal_year_name;
    break;
}

#declarations
$t_basic_salary = 0;
$t_gross_pay = 0;
$t_B = 0;
$t_C = 0;
$t_E1 = 0;
$t_E2 = 0;
$t_E3 = 0;
$t_F = 0;
$t_G = 0;
$t_H = 0;
$t_J = 0;
$t_K = 0;
$t_L = 0;

$E3 = 0;
$F = 0;

?>
<head>
    <title><?php echo $org_name;?> | JiPos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
            font-size: 10px;
            font-weight: 400;
            line-height: 1.0;
        }
        th, td{
            text-align: center;
        }
    </style>
  
</head>
<body style="background-color: #fff;">

<div class="container-fluid">
    <div class="row">
        <div style="text-align: center;">
            KENYA REVENUE AUTHORITY <br/>
            DOMESTIC TAXES DEPARTMENT <br/>
            TAX DEDUCTION CARD YEAR <?php echo $fiscal_year_name;?>
        </div>
    </div>
  <div class="row">
      <div class="col-md-12 table">
          <table class="table-condensed" style="width: 100%;">
              <thead>
                  <tr>
                      <th>Employers Name:</th>
                      <td><u><?php echo $org_name;?></u></td>
                      <th style="padding-left: 50px;">Employers PIN:</th>
                      <td><u><?php echo $org_kra_pin;?></u></td>
                  </tr>
                  <tr>
                      <th>Employee Name:</th>
                      <td><u><?php echo $employee_name;?></u></td>
                      <th style="padding-left: 50px;">Employee PIN:</th>
                      <td><u><?php echo $employee_kra_pin;?></u></td>
                  </tr>
              </thead>
          </table>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12">

          <div class="table">
            <table class="table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Basic Salary</th>
                        <th>Benefits-Non Cash</th>
                        <th>Value of Quarters</th>
                        <th>Total Gross Pay</th>
                        <th colspan="3">Defined Contribution Retirement Scheme</th>
                        <th>Owner Occupied Interest</th>
                        <th>Retirement Contribution & Owner Occupied Interest</th>
                        <th>Chargeable Pay</th>
                        <th>Tax Charged</th>
                        <th>Tax Relief + Insurance Relief</th>
                        <th>PAYE Tax (J-K)</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>Ksh.</th>
                        <th>Ksh.</th>
                        <th>Ksh.</th>
                        <th>Ksh.</th>
                        <th colspan="3">Ksh.</th>
                        <th>Ksh.</th>
                        <th>Ksh.</th>
                        <th>Ksh.</th>
                        <th>Ksh.</th>
                        <th>Ksh.</th>
                        <th>Ksh.</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th colspan="3">E</th>
                        <th>F</th>
                        <th>G</th>
                        <th>H</th>
                        <th>J</th>
                        <th>K</th>
                        <th>L</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>

                        <th>E1 <br/>30% of A</th>
                        <th>E2 <br/>Actual</th>
                        <th>E3<br/>Fixed</th>

                        <th>Amount of Interest</th>
                        <th>The lower of E added</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($p9 as $dt){
                        ?>
                        <tr>
                            <td><?php echo $dt->month_name;?></td>
                            <td><?php echo number_format($dt->basic_salary);?></td>
                            <td><?php echo 0;?></td>
                            <td><?php echo 0;?></td>
                            <td><?php echo number_format($dt->gross_salary);?></td>

                            <td><?php echo number_format((0.3 * $dt->basic_salary));?></td>
                            <td><?php echo number_format($dt->nssf);?></td>
                            <td>
                                <?php 
                                    if($dt->basic_salary > 14500) $E3 = 20000;
                                    echo number_format($E3);
                                ?>
                            </td>

                            <td><?php echo number_format($F);?></td>
                            <td><?php echo $dt->nssf;?></td>
                            <td><?php echo number_format(($dt->basic_salary - $dt->nssf));?></td>
                            <td><?php echo number_format($dt->tax);?></td>
                            <td><?php echo number_format($dt->tax_relief);?></td>
                            <td><?php echo number_format(($dt->tax - $dt->tax_relief));?></td>
                        </tr>
                        <?php
                        #get totals
                        $t_basic_salary += $dt->basic_salary;
                        $t_gross_pay += $dt->gross_salary;
                        $t_B += 0;
                        $t_C += 0;
                        $t_E1 += (0.3 * $dt->basic_salary);
                        $t_E2 += $dt->nssf;
                        $t_E3 += $E3;
                        $t_F += $F;
                        $t_G += $dt->nssf;
                        $t_H += ($dt->basic_salary - $dt->nssf);
                        $t_J += $dt->tax;
                        $t_K += $dt->tax_relief;
                        $t_L += ($dt->tax - $dt->tax_relief);
                    }
                    ?>
                    <tr>
                        <th>TOTALS</th>
                        <th><?php echo number_format($t_basic_salary);?></th>
                        <th><?php echo number_format($t_B);?></th>
                        <th><?php echo number_format($t_C);?></th>
                        <th><?php echo number_format($t_gross_pay);?></th>

                        <th><?php echo number_format($t_E1);?></th>
                        <th><?php echo number_format($t_E2);?></th>
                        <th><?php echo number_format($t_E3);?></th>

                        <th><?php echo number_format($t_F);?></th>
                        <th><?php echo number_format($t_G);?></th>
                        <th><?php echo number_format($t_H);?></th>
                        <th><?php echo number_format($t_J);?></th>
                        <th><?php echo number_format($t_K);?></th>
                        <th><?php echo number_format($t_L);?></th>
                    </tr>
                </tbody>
            </table> 
          </div>

      </div>
  </div>

  <div class="row">
        <p style="width: 100%; padding-left: 20px;">
            To be completed by Employer at end of year &nbsp; &nbsp;<b>TOTALS CHARGEABLE PAY (COL H) Kshs. &nbsp; &nbsp; <?php echo number_format($t_H, 2);?> &nbsp; &nbsp; TOTALS TAX (COL L) Kshs. &nbsp; &nbsp; <?php echo number_format($t_L, 2);?> </b>
        </p>
  </div>

  <div class="row">
      <div class="col-md-12">
          <div class="table">
                <table class="" style="width: 100%;">
                    <tbody>
                        <tr>
                            <td style="text-align: left !important;">
                                <h5><u>IMPORTANT</u></h5>
                                <p>
                                    User P9A <br/>
                                    (a) For all liable employees and where director/employee received
                                    benefits in addition to cash emolument.<br/>
                                    (b) Where an employee is eligible to deduction on owner occupier interest.<br/>
                                    (a) Allowable intrest in respect of any month must not exceed Kshs, 12,500/= or
                                    Kshs 150,000 per year
                                </p>
                            </td>

                            <td style="text-align: left !important; padding-left: 5px">
                                <p>
                                    (b) Attach <br/>
                                    (i) Photostat copy of interest certificate and statement of account from the
                                    financial institution. <br/>
                                    (ii) The DECLARATION duty signed by the employee. <br/><br/>
                                    NAME OF FINANCIAL INSTITUTION ADVANCING MORTGAGE LOAN <br/><br/>
                                    LR NO. OF OWNER OCCUPIEED PROPERTY: <br/>
                                    DATE OF OCCUPATION OF HOUSE: <br/>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
          </div>
      </div>
  </div>



</div>

</body>
</html> 