<!DOCTYPE html>
<html lang="en">

<?php
    foreach($payslip as $d) {
        $employee_month_id = $d->employee_month_id; 
        $employee_id = $d->employee_id; 
        $org_id = $d->org_id; 
        $fiscal_year_id = $d->org_id;
        $org_name = $d->org_name;
                
        $year_month_id = $d->year_month_id; 
        $is_disbursed = $d->is_disbursed; 
        $is_paid = $d->is_paid; 
        $doc_no = $d->doc_no; 
                    
        $basic_salary = $d->basic_salary; 
        $gross_salary = $d->gross_salary; 
        $net_salary = $d->net_salary; 
        $allowance = $d->allowance; 
                    
        $deductible = $d->deductible; 
        $nssf = $d->nssf; 
        $nhif = $d->nhif; 
        $tax = $d->tax; 
        $date_modified = $d->date_modified; 
                    
        $time_stamp = $d->time_stamp;

        $fiscal_year_name = $d->fiscal_year_name;
        $month_name = $d->month_name;

        $first_name = $d->first_name; 
        $second_name = $d->second_name; 
        $last_name = $d->last_name; 
        $email = $d->email;
        $employment_number = $d->employment_number;
        $nhif_number = $d->employee_nhif;
        $nssf_number = $d->employee_nssf;
        $kra_pin = $d->kra_pin;
                    
        $primary_phone = $d->primary_phone; 
        $id_number = $d->id_number;

        $designation_name = $d->designation_name;
                    
        $department_name = $d->department_name;

        $tax_relief = $d->tax_relief;
        $insurance_relief = $d->insurance_relief;
        $bank_name = $d->bank_name;
        $branch_name = $d->branch_name;
        $branch_code = $d->branch_code;
        $bank_account_no = $d->bank_account_no;
    }
    $org = $this->db->where('org_id',$_SESSION['orgid'])->get('orgs')->row();
?>

<head>
  <title>Payslip #<?php echo $employee_month_id.' | '.$org_name; ?></title>

  <style>
      #invoice-POS{
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        padding:2mm;
        margin: 0 auto;
        width: 100mm;
        background: #FFF;
      }
        
        ::selection {background: #f31544; color: #FFF;}
        ::moz-selection {background: #f31544; color: #FFF;}
        h1{
        font-size: 2.0em;
        color: #222;
        }
        h2{font-size: .9em;}
        h3{
        font-size: 1.5em;
        font-weight: 300;
        line-height: 2em;
        }
        p{
        font-size: 0.7em;
        color: #666;
        line-height: 1.2em;
        }
                
        #top, #mid,#bot{ /* Targets all id with 'col-' */
        border-bottom: 1px solid #EEE;
        }

        #top{min-height: 100px;}
        #mid{min-height: 80px;} 
        #bot{ min-height: 50px;}

        #top .logo{
        //float: left;
            height: 60px;
            width: 60px;
            background: url(http://localhost:8080/uza/assets/POS-JiPOS-logo.png) no-repeat;
            background-size: 60px 60px;
        }
        .clientlogo{
        float: left;
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
            background-size: 60px 60px;
        border-radius: 50px;
        }
        .info{
        display: block;
        //float:left;
        margin-left: 0;
        }
        .title{
        float: right;
        }
        .title p{text-align: right;} 
        table{
        width: 100%;
        //border-collapse: collapse;
        }
        td, th{
        font-size: 0.7em;
        width: 150px;
        color: #666;
        line-height: 1.2em;
        }
        .td-r {
            text-align: right;
            padding-right: 5px;
        }
        .tabletitle{
        //padding: 5px;
        font-size: 1.0em;
        background: #EEE;
        }
        .service{border-bottom: 1px solid #EEE;}
        .item{width: 24mm;}
        .itemtext{font-size: .5em;}

        #legalcopy{
        margin-top: 5mm;
        }
  </style>

</head>

<body>

    <div class="">
        
  <div id="invoice-POS" style="border: 1px solid black;">
    
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2>Payslip</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    
    <div id="mid">
      <div class="info" >
        <h2><?php echo $org_name;?></h2>
        <p><b><?php echo $org->address;?></b></p>
        <p style="font-size: 12px;">
            Payslip: #<?php echo $employee_month_id;?>  <br>     
            Period:  <?php echo $month_name.' '.$fiscal_year_name; ?>  <br>
            Name:  <?php echo $first_name.' '.$second_name.' '.$last_name; ?>   <br>
            Employee No:  <?php echo $employment_number; ?>  <br>
            <!-- <b>Basic Salary:</b>  <?php echo number_format($basic_salary, 2); ?>  <br> -->
        </p>
      </div>
    </div><!--End Invoice Mid-->
    
    <div id="bot">

        <div id="table">
            <table>
                <tbody>
                    <tr class="tabletitle">
                        <td class="item"><h2>Earnings</h2></td>
                        <td class="Rate td-r"><h2>Amount</h2></td>
                    </tr>

                    <tr>
                        <td class="">Basic Salary</td>
                        <td class="td-r"><?=number_format($basic_salary, 2)?></td>
                    </tr>

                    <tr><th colspan="2"><u>Allowances</u></th></tr>
                    <?php
                        $totalAllowance = 0;
                        $allowances = $this->db->query("SELECT employee_allowances.allowance_amount, allowances.allowance_name
                                    FROM employee_allowances
                                    JOIN allowances ON allowances.allowance_id = employee_allowances.allowance_id 
                                    WHERE employee_allowances.employee_id = ".$employee_id." ");
                        foreach($allowances->result() as $allw) {
                            echo '<tr>
                                    <td>'.$allw->allowance_name.'</td>
                                    <td class="td-r">'.number_format($allw->allowance_amount, 2).'</td>
                                </tr>';
                                $totalAllowance += $allw->allowance_amount;
                        }
                        if($totalAllowance == 0) echo '<tr><td colspan="2" style="color: #E7AD60;">No allowances.</td></tr>';
                    ?>
                    <tr>
                        <th>Total Income</th>
                        <th class="td-r"><?php echo number_format($totalAllowance + $basic_salary, 2);?></th>
                    </tr>

                    <tr>
                        <th>GROSS PAY</th>
                        <td class="td-r"><?php echo number_format($gross_salary, 2);?></td>
                    </tr>


                    <tr><th colspan="2"><u>Deductibles</u></th></tr>
                    <?php
                        #get deductions
                        $totalDeductibles = 0;
                        $deductibles = $this->db->query("SELECT employee_deductibles.deductible_amount, deductibles.deductible_name
                                        FROM employee_deductibles 
                                        JOIN deductibles ON deductibles.deductible_id = employee_deductibles.deductible_id
                                        WHERE employee_id = ".$employee_id." ");
                        foreach($deductibles->result() as $ded) {
                            echo '<tr>
                                    <td>'.$ded->deductible_name.'</td>
                                    <td class="td-r">'.number_format($ded->deductible_amount, 2).'</td>
                                </tr>';
                                $totalDeductibles += $ded->deductible_amount;
                        }
                        if($totalDeductibles == 0) echo '<tr><td colspan="2" style="color: #E7AD60;">No deductibles.</td></tr>';
                    ?>

                    =============================

                    <tr>
                        <th>PAYE</th>
                        <td class="td-r"><?php echo number_format($tax, 2);?></td>
                    </tr>
                    <tr>
                        <th>NHIF</th>
                        <td class="td-r"><?php echo number_format($nhif, 2);?></td>
                    </tr>
                    <tr>
                        <th>NSSF</th>
                        <td class="td-r"><?php echo number_format($nssf, 2);?></td>
                    </tr>

                    <tr>
                        <th>Total Deductions</th>
                        <td class="td-r"><?php echo number_format($totalDeductibles, 2);?></td>
                    </tr>

                    
                    <tr>
                        <th>NET PAY</th>
                        <td class="td-r"><?php echo number_format($net_salary, 2);?></td>
                    </tr>
                </tbody>
            </table>
        </div><!--End Table-->

    </div><!--End InvoiceBot-->

    <div id="mid">
      <div class="info" >
        <h2>Employee Details</h2>
        <p style="font-size: 8px;">
            P.I.N: #<?php echo $kra_pin;?>  <br>     
            Employee Bank: <?php echo $bank_name;?>  <br>
            Bank Branch: <?php echo $branch_name;?>   <br>
            Branch Code: <?php echo $branch_code;?>   <br>
            Acc No:  <?php echo $bank_account_no;?> <br>
            NSSF No:  <?php echo $nssf_number; ?>  <br>
            NHIF No:  <?php echo $nhif_number; ?>  <br>
        </p>
      </div>
    </div><!--End Invoice Mid-->

    <div id="legalcopy">
        <p class="legal"><strong><?php echo $org_name;?> is proud of you.</strong>  
            "Example is not the main thing in influencing others, it is the only thing." - <i>Albert Schweitzer</i>
        </p>
    </div>

  </div><!--End Invoice-->

    </div>

</body>
</html>