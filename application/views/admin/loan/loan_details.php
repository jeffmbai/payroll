<?php
foreach ($individual_loans as $loan) {
$loan_id = $loan->loan_id;
$org_name = $loan->org_name;
$loan_type_category_name = $loan->loan_type_category_name;
$loan_type_name = $loan->loan_type_name;
$entity_id = $loan->entity_id;
$reference = $loan->reference;
$release_date = $loan->release_date;
$maturity_date = $loan->maturity_date;
$currency_id = $loan->currency_id;
$currency_code = $loan->currency_code;
$principal = $loan->principal;
$interest_method = $loan->interest_method;
$interest_period = $loan->interest_period;
$loan_duration = $loan->loan_duration;
$loan_duration_type = $loan->loan_duration_type;
$repayment_cycle = $loan->repayment_cycle;
$loan_status = $loan->loan_status;
$closed_notes = $loan->closed_notes;
$closed_date = $loan->closed_date;
$date_modified = $loan->date_modified;
$time_stamp = $loan->time_stamp;
$loanee_email = $loan->loanee_email;
$loanee_name = $loan->loanee_name;
$loanee_phone = $loan->loanee_phone;
$loanee_profile_picture = $loan->loanee_profile_picture;
$department_id = $loan->department_id;
$department_name = $loan->department_name;
$sub_department_id = $loan->sub_department_id;
$sub_department_name = $loan->sub_department_name;
$loan_type_category_id = $loan->loan_type_category_id;
$loan_type_category_name = $loan->loan_type_category_name;
$loan_type_name = $loan->loan_type_name;
$narrative = $loan->narrative;
}
?>

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Loan Details</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-6 col-sm-10">
            <?php
            if (isset($_SESSION['alert'])) {
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-5 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Loan Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <a href="<?php echo site_url('loan/index');?>" class="btn btn-primary btn-xs">Loans<span class="fa fa-money"></span> </a>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-repsonsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>LoaID</b></td>
                                    <td class="rm_border_top bd_left"><?php echo '#'.$loan_id; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Loan Amount</b></td>
                                    <td class="rm_border_top bd_left"><?php echo $principal; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Duration</b></td>
                                    <td class="rm_border_top bd_left"><?php echo $loan_duration.' '.$loan_duration_type; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Reference</b></td>
                                    <td class="rm_border_top bd_left"><?php echo $reference; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Loan Type</b></td>
                                    <td class="rm_border_top bd_left"><?php echo $loan_type_name; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b><b>Loan Category</b></b></td>
                                    <td class="rm_border_top bd_left"><?php echo $loan_type_category_name; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b><b>Loanee</b></b></td>
                                    <td class="rm_border_top bd_left"><?php echo $loanee_name; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b><b>Phone</b></b></td>
                                    <td class="rm_border_top bd_left"><?php echo $loanee_phone; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b><b>Email</b></b></td>
                                    <td class="rm_border_top bd_left"><?php echo $loanee_email; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b><b>Organization</b></b></td>
                                    <td class="rm_border_top bd_left"><?php echo $org_name; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b><b>Department</b></b></td>
                                    <td class="rm_border_top bd_left"><?php echo $department_name; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b><b>Repayment Cycle</b></b></td>
                                    <td class="rm_border_top bd_left"> <?php $repayment_cycle;?> </td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b><b>Registration</b></b></td>
                                    <td class="rm_border_top bd_left"><?php echo $time_stamp; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-7 col-xs-12">
        
        <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            <a class="collapse-link">Loan <small>Edit loan information</small></a>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">
                            <form action="<?php echo site_url('loan/edit_loan/'.$loan_id); ?>" method="post">
                                                   
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Organization - Station <span class="text text-danger">*</span> </label>
                                        <select class="select2_group form-control" id="station" name="station" onchange="getDepartmentAndSub()"  required>
                                            <option value="">~ Select Station ~</option>
                                            <?php
                                            $control_org = null;
                                            $conc = null;
                                            foreach ($stations as $station) {
                                                if ($control_org !== $station->org_name) {
                                                    $control_org = $station->org_name;
                                                    $conc .= '<optgroup label="' . $control_org . '">';
                                                }
                                                $conc .= '<option value="' . $station->station_id . '"> ' . $station->station_name . ' </option>';
                                            }
                                            $conc .= '</optgroup>';
                                            echo $conc;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Department - Subdepartment <span class="text text-danger">*</span> </label>
                                        <select class="select2_group form-control" id="departments_and_subdepartments" name="departments_and_subdepartments" onchange="get_subd_employees()" required >
                                            <option value="<?php echo $sub_department_id;?>" class="text text-warning"> <?php echo $department_name.' - '.$sub_department_name;?> </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Employee <span class="text text-danger">*</span> </label>
                                        <select class="select2 form-control" name="sdemployee" id="sdemployee" required>
                                            <option value="<?php echo $entity_id;?>" > <?php echo $loanee_name;?> </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Loan Type - Category <span class="text text-danger">*</span> </label>
                                        <select name="loan_type_category" class="select2_group form-control">
                                            <option value="">~ Select Loan Type-Category ~</option>
                                            <?php
                                            $ctl_loan_type = null;
                                            $conc2 = null;
                                            foreach ($loan_type_category as $type_category) {
                                                if ($ctl_loan_type !== $type_category->loan_type_name) {
                                                    $ctl_loan_type = $type_category->loan_type_name;
                                                    $conc2 .= '<optgroup label="' . $ctl_loan_type . '">';
                                                }
                                                $conc2 .= '<option value="' . $type_category->loan_type_category_id . ' "  > ' . $type_category->loan_type_category_name . ' </option>';
                                            }
                                            $conc2 .= '</optgroup>';
                                            echo $conc2;
                                            ?>
                                        </select>
                                    </div>                                    
                                    <div class="col-md-4">
                                        <label for="">Reference </label>
                                        <input type="text" name="reference" class="form-control" value="<?php echo $reference;?>" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Release Date <span class="text text-danger">*</span> </label>
                                        <input type="date" name="release_date" class="form-control" value="<?php echo $reference;?>" required />
                                    </div>
                                </div>

                                <div class="row">                                    
                                    <div class="col-md-4">
                                        <label for="">Maturity Date <span class="text text-danger">*</span> </label>
                                        <input type="date" name="maturity_date" class="form-control" value="<?php echo $maturity_date;?>" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Applied Amount <span class="text text-danger">*</span> </label>
                                        <input type="number" name="applied_amount" class="form-control" value="<?php echo $principal;?>" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Loan Duration Type <span class="text text-danger">*</span> </label>
                                        <select name="loan_duration_type" class="select2 form-control" tabindex="-1" required >
                                            <option value="">Select duration type</option>
                                            <option value="day">Day</option>
                                            <option value="week">Week</option>
                                            <option value="month">Month</option>
                                            <option value="year">Year</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">  
                                    
                                    <div class="col-md-4">
                                        <label for=""> Loan Duration <span class="text text-danger">*</span> </label>
                                        <input type="number" name="loan_duration" class="form-control" value="<?php echo $loan_duration;?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Loan Repayment Cycle <span class="text text-danger">*</span> </label>
                                        <select name="repayment_cycle" class="select2 form-control" tabindex="-1" required>
                                            <option value="">Select repayment cycle</option> 'one_off','daily','weekly','monthly','bi_monthly','quarterly','semi_annually','annually'
                                            <option value="one_off">One Off</option>
                                            <option value="daily">Daily</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="bi_monthly">Bi-monthly</option>
                                            <option value="quarterly">Quarterly</option>
                                            <option value="semi_annually">Semi_annually</option>
                                            <option value="annually">Annually</option>
                                        </select>
                                    </div>                                  
                                    
                                    <div class="col-md-4">
                                        <label for="">Attachment </label>
                                        <input type="file" name="attachment" class="form-control" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Loan Currency <span class="text text-danger">*</span> </label>
                                        <select name="currency" class="select2 form-control" tabindex="-1" required>
                                            <option value="">~Select currency~</option>
                                            <?php
                                                foreach($currencies as $currency) {
                                                    ?>
                                                    <option value="<?php echo $currency->currency_id;?>" <?php if($currency_id) echo "selected";?> > <?php echo $currency->currency_code;?> </option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-8">
                                        <label> Narrative </label>
                                        <textarea name="narrative" class="form-control" > <?php echo $narrative;?> </textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="Submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>

                                
                            </form>
                        </div>

                    </div>
                </div>
        
        </div>

    </div>

</div>
