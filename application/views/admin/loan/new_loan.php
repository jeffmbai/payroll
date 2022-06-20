<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                New Loan
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php
            if (isset($_SESSION['alert'])) {
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }
            ?>
        </div>
    </div>

    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create new loan </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a href="<?php echo site_url('loan');?>" class="btn btn-primary btn-xs">Manage Loans <span class="fa fa-users"></span> </a>
                            </li>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">
                            <form action="<?php echo site_url('loan/apply_loan/'); ?>" method="post" enctype="multipart/form-data">
                            
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
                                            <option value="" class="text text-warning">~ Select Sub_departments ~</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Employee <span class="text text-danger">*</span> </label>
                                        <select class="select2 form-control" name="sdemployee" id="sdemployee" required>
                                            <option value="" >~ Select employee ~</option>
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
                                                $conc2 .= '<option value="' . $type_category->loan_type_category_id . '"> ' . $type_category->loan_type_category_name . ' </option>';
                                            }
                                            $conc2 .= '</optgroup>';
                                            echo $conc2;
                                            ?>
                                        </select>
                                    </div>                                    
                                    <div class="col-md-4">
                                        <label for="">Reference </label>
                                        <input type="text" name="reference" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Release Date <span class="text text-danger">*</span> </label>
                                        <input type="date" name="release_date" class="form-control" required />
                                    </div>
                                </div>

                                <div class="row">                                    
                                    <div class="col-md-4">
                                        <label for="">Maturity Date <span class="text text-danger">*</span> </label>
                                        <input type="date" name="maturity_date" class="form-control" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Applied Amount <span class="text text-danger">*</span> </label>
                                        <input type="number" name="applied_amount" class="form-control" required />
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
                                        <input type="number" name="loan_duration" class="form-control" required />
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
                                                    <option value="<?php echo $currency->currency_id;?>"> <?php echo $currency->currency_code;?> </option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label> Narrative </label>
                                        <textarea name="narrative" class="form-control" ></textarea>
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

</div>
