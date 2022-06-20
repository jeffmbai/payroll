<?php
    foreach($entity as $staff) {
        $entity_id = $staff->entity_id;
        $org_id = $staff->org_id;
        $org_name = $staff->org_name;
        $firstname = $staff->firstname;
        $secondname = $staff->secondname;
        $lastname = $staff->lastname;
        $email= $staff->email;
        $phone= $staff->phone;
        $gender= $staff->gender;
        $dob= $staff->dob;
        $id_passport= $staff->id_passport;
        $role_name= $staff->role_name;
        $sub_department_id= $staff->sub_department_id;
        $sub_department_name= $staff->sub_department_name;
        $department_id= $staff->department_id;
        $department_name= $staff->department_name;
        $station_id= $staff->station_id;
        $station_name= $staff->station_name;
    }
?>
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3><?php echo 'Profile for ' . $firstname;?></h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Loan Statistics</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                    <div class="row">

                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <ul class="stats-overview">
                                                <li>
                                                    <span class="name"> Total Loans </span>
                                                    <span class="value text-success"> <?php if($entity_total_loan != 0) echo number_format($entity_total_loan,2); else echo number_format(0.00, 2);  ?> </span>
                                                </li>
                                                <li>
                                                    <span class="name"> Paid Loan </span>
                                                    <span class="value text-success"> <?php if($entity_paid_loan != 0) echo number_format($entity_paid_loan,2); else echo number_format(0.00,2);?> </span>
                                                </li>
                                                <li>
                                                    <span class="name"> Unpaid Loan </span>
                                                    <span class="value text-success"> <?php if($entity_unpaid_loan != 0) echo number_format($entity_unpaid_loan,2); else echo number_format(0.00,2);?> </span>
                                                </li>
                                                <li class="hidden-phone">
                                                    <span class="name"> Pending Loan </span>
                                                    <span class="value text-success"> <?php if($entity_pending_loan != 0) echo number_format($entity_pending_loan,2); else echo number_format(0.00,2);?> </span>
                                                </li>
                                            </ul>
                                            
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-9 col-sm-9 col-xs-12">

                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Staff Loans</h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    <a href="<?php echo site_url('loan/new_loan');?>" class="btn btn-primary btn-xs" >New Loan</a>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <table id="example" class="table table-striped responsive-utilities jambo_table">
                                                    <thead>
                                                        <tr class="headings">
                                                            <th>
                                                                <input type="checkbox" class="tableflat">
                                                            </th>
                                                            <th>LoanID</th>
                                                            <th>Amount</th>
                                                            <th>Currency</th>
                                                            <th>Status</th>
                                                            <th>Loan Date</th>
                                                            <th class=" no-link last"><span class="nobr">Action</span>
                                                            </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $c = 0;
                                                        foreach($individual_loans as $loan) {
                                                            $c++;
                                                            ?>
                                                            <tr class="even pointer">
                                                                    <td class="a-center ">
                                                                        <input type="checkbox" class="tableflat">
                                                                    </td>
                                                                    <td class=" "> <a href="<?php echo site_url('loan/loan_details/'.$loan->loan_id);?>" > <?php echo $loan->loan_id;?> </a> </td>
                                                                    <td class=" "><?php echo $loan->principal;?></td>
                                                                    <td class=" "><?php echo $loan->currency_code;?></td>
                                                                    <td class=" "><?php echo $loan->loan_status;?></td>
                                                                    <td class=" "><?php echo $loan->time_stamp;?></td>
                                                                    <td class=" last">
                                                                        <a href="<?php echo site_url('loan/loan_details/'.$loan->loan_id);?>"><span class="fa fa-eye"></span></a>
                                                                        &nbsp;
                                                                        <a href="<?php echo site_url('loan');?>" class="text text-danger"><span class="fa fa-trash"></span></a>
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

                                         <!-- start project-detail sidebar -->
                                        <div class="col-md-3 col-sm-3 col-xs-12">

                                        <section class="panel">

                                            <div class="x_title">
                                                <h2>Staff Details</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="panel-body">
                                                <h3 class="green"><?php echo $firstname.' '.$secondname.' '.$lastname;?> </h3>
                                                
                                                <p>
                                                    <b>Email: </b><?php echo $email;?> <br>
                                                    <b>Phone: </b><?php echo $phone;?> <br>
                                                    <b>ID/ Passport: </b><?php echo $id_passport;?> <br>
                                                    <b>Gender: </b><?php echo $gender;?> <br>
                                                    <b>Dob: </b><?php echo $dob;?>
                                                </p>

                                                <div class="project_detail">
                                                    <p class="title">Organization</p>
                                                    <p><?php echo $org_name;?></p>
                                                    <p class="title">Station</p>
                                                    <p><?php echo $station_name;?></p>
                                                    <p class="title">Department</p>
                                                    <p><?php echo $department_name;?></p>
                                                    <p class="title">Sub-department</p>
                                                    <p><?php echo $sub_department_name;?></p>
                                                </div>

                                            </div>

                                        </section>

                                        </div>
                                        <!-- end project-detail sidebar -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               