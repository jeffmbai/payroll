<?php
$CI = &get_instance();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><button class="pull-left backbtn" title="Back" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"> </i></button>
                        <?= $page ?></h1>
                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
                    if (isset($_SESSION['alert'])) {
                        echo $_SESSION['alert'];
                        unset($_SESSION['alert']);
                    }
                    ?>
                </div>
            </div>

            <div class="row">

                <?php if ($CI->permissions('archivestaff_view')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Form</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Name</th>
                                                    <th>Desig.</th>
                                                    <th>ID No. </th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Gender</th>
                                                    <th>Address</th>
                                                    <th>Active</th>
                                                    <th class=" no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($staff as $dt) {
                                                    $c++;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td><?php echo $dt->first_name . ' ' . $dt->second_name . ' ' . $dt->last_name; ?></td>
                                                        <td><?php echo $dt->designation_name; ?></td>
                                                        <td><?php echo $dt->id_number; ?></td>
                                                        <td><?php echo $dt->primary_phone; ?></td>
                                                        <td><?php echo $dt->email; ?></td>
                                                        <td><?php echo $dt->gender; ?></td>
                                                        <td><?php echo $dt->address; ?></td>
                                                        <td>
                                                            <?php if ($dt->active == 1) echo "<span class='fa fa-check'></span>";
                                                            else echo "<span class='fa fa-check'></span>"; ?>
                                                        </td>
                                                        <td class=" last">
                                                            <div class="dropdown">
                                                                <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                                    <span class="caret"></span></button>
                                                                <ul class="dropdown-menu">
                                                                    <?php if ($CI->permissions('staff_view')) : ?>
                                                                        <li><a href="<?php echo site_url('staff/profile/' . $dt->employee_id); ?>"><span class="fa fa-eye"></span> View</a></li>
                                                                    <?php endif; ?>
                                                                    <?php if ($CI->permissions('staff_edit')) : ?>
                                                                        <li><a href="#" data-toggle="modal" data-target="#myModal<?php echo $dt->employee_id; ?>"><span class="fa fa-pencil"></span> Edit</a></li>
                                                                    <?php endif; ?>
                                                                    <?php if ($CI->permissions('staff_delete')) : ?>
                                                                        <li><a href="<?php echo site_url('staff/delete_staff/' . $dt->employee_id); ?>"><span class="fa fa-trash"></span> Delete</a></li>
                                                                    <?php endif; ?>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <?php if ($CI->permissions('staff_edit')) : ?>
                                                        <!-- Modal -->
                                                        <div id="myModal<?php echo $dt->employee_id; ?>" class="modal fade" role="dialog">
                                                            <div class="modal-dialog modal-lg">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">Details</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?php echo site_url('staff/update_staff/' . $dt->employee_id); ?>" method="post">

                                                                            <div class="row">
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Organization <span class="text text-danger">*</span> </label>
                                                                                    <select class="form-control select2_single" name="org_id" required>
                                                                                        <option value=""> ~Select Org/School~ </option>
                                                                                        <?php
                                                                                        foreach ($orgs as $org) {
                                                                                        ?>
                                                                                            <option value="<?php echo $org->org_id; ?>" <?php if ($org->org_id == $dt->org_id) echo "selected"; ?>> <?php echo $org->org_name; ?> </option>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Department <span class="text text-danger">*</span> </label>
                                                                                    <select class="form-control select2_single" name="department_id" required>
                                                                                        <option value=""> ~Select Department~ </option>
                                                                                        <?php
                                                                                        foreach ($departments as $dep) {
                                                                                        ?>
                                                                                            <option value="<?php echo $dep->department_id; ?>" <?php if ($dep->department_id == $dt->department_id) echo "selected"; ?>> <?php echo $dep->department_name; ?> </option>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">First Name <span class="text text-danger">*</span> </label>
                                                                                    <input type="text" class="form-control" name="first_name" value="<?php echo $dt->first_name; ?>" required />
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Second Name </label>
                                                                                    <input type="text" class="form-control" name="second_name" value="<?php echo $dt->second_name; ?>" />
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Last Name</label>
                                                                                    <input type="text" class="form-control" name="last_name" value="<?php echo $dt->last_name; ?>" />
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">ID Number <span class="text text-danger">*</span> </label>
                                                                                    <input type="number" class="form-control" name="id_number" required value="<?php echo $dt->id_number; ?>" />
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Date of Birth <span class="text text-danger">*</span> </label>
                                                                                    <input type="date" class="form-control" name="dob" required value="<?php echo $dt->dob; ?>" />
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Email <span class="text text-danger">*</span> </label>
                                                                                    <input type="email" class="form-control" name="email" required value="<?php echo $dt->email; ?>" />
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Primary Phone <span class="text text-danger">*</span> </label>
                                                                                    <input type="" class="form-control" name="primary_phone" required value="<?php echo $dt->primary_phone; ?>" />
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Secondary Phone </label>
                                                                                    <input type="number" class="form-control" name="secondary_phone" value="<?php echo $dt->secondary_phone; ?>" />
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Gender <span class="text text-danger">*</span> </label>
                                                                                    <select class="form-control" name="gender" required>
                                                                                        <option value="M" <?php if ($dt->gender == 'M') echo "selected"; ?>>Male</option>
                                                                                        <option value="F" <?php if ($dt->gender == 'F') echo "selected"; ?>>Female</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Address </label>
                                                                                    <input type="text" class="form-control" name="address" value="<?php echo $dt->address; ?>" />
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">KRA Pin </label>
                                                                                    <input type="text" class="form-control" name="kra_pin" value="<?php echo $dt->kra_pin; ?>" />
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">NSSF </label>
                                                                                    <input type="number" class="form-control" name="nssf" value="<?php echo $dt->nssf; ?>" />
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">NHIF </label>
                                                                                    <input type="number" class="form-control" name="nhif" value="<?php echo $dt->nhif; ?>" />
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Job Grade </label>
                                                                                    <input type="text" class="form-control" name="job_grade" value="<?php echo $dt->job_grade; ?>" />
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Joining Date </label>
                                                                                    <input type="date" class="form-control" name="joining_date" value="<?php #echo $dt->joining_date;
                                                                                                                                                        ?>" />
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Leaving Date </label>
                                                                                    <input type="date" class="form-control" name="leaving_date" value="<?php echo $dt->leaving_date; ?>" />
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Marital Status </label>
                                                                                    <select class="form-control select2_single" name="marital_status" required>
                                                                                        <option value="Single" <?php if ($dt->marital_status == 'Single') echo "selected"; ?>>Single</option>
                                                                                        <option value="Married" <?php if ($dt->marital_status == 'Married') echo "selected"; ?>>Married</option>
                                                                                        <option value="Divorced" <?php if ($dt->marital_status == 'Divorced') echo "selected"; ?>>Divorced/ Separated</option>
                                                                                        <option value="Widowed" <?php if ($dt->marital_status == 'Widowed') echo "selected"; ?>>Widowed</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Disabled? </label>
                                                                                    <p>
                                                                                        Yes:<input type="radio" class="flat" name="disability" id="yes" value="1" <?php if ($dt->disability == 1) echo "checked"; ?> />
                                                                                        No:<input type="radio" class="flat" name="disability" id="no" value="0" <?php if ($dt->disability == 0) echo "checked"; ?> />
                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Designations <span class="text text-danger">*</span> </label>
                                                                                    <select class="form-control select2_single" name="designation_id" required>
                                                                                        <option value=""> ~Select Designation~ </option>
                                                                                        <?php
                                                                                        foreach ($designations as $des) {
                                                                                        ?>
                                                                                            <option value="<?php echo $des->designation_id; ?>" <?php if ($dt->designation_id == $des->designation_id) echo "selected"; ?>> <?php echo $des->designation_name; ?> </option>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Employment No./ID </label>
                                                                                    <input type="text" class="form-control" name="employment_number" value="<?php echo $dt->employment_number; ?>" />
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6">
                                                                                    <label for="">Basic Salary </label>
                                                                                    <input type="number" class="form-control" name="basic_salary" value="<?php echo $dt->basic_salary; ?>" />
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-12">
                                                                                    <label> Active </label>
                                                                                    <p>
                                                                                        <input type="checkbox" class="" value="1" name="active" <?php if ($dt->active == 1) echo "checked"; ?>>
                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            <hr />
                                                                            <div class="row">
                                                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                                                    <label>PAYE <i class="text-danger">*</i></label>
                                                                                    <input type="number" class="form-control" step="0.01" name="paye" value="<?php echo $dt->paye; ?>" required />
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                                                    <label>NSSF Amount <i class="text-danger">*</i></label>
                                                                                    <input type="number" class="form-control" step="0.01" name="nssf_amount" value="<?php echo $dt->nssf_amount; ?>" required />
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                                                    <label>NHIF Amount <i class="text-danger">*</i></label>
                                                                                    <input type="number" class="form-control" step="0.01" name="nhif_amount" value="<?php echo $dt->nhif_amount; ?>" required />
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                                                    <label>Tax Relief <i class="text-danger">*</i></label>
                                                                                    <input type="number" class="form-control" step="0.01" name="tax_relief_amount" required value="<?php echo $dt->tax_relief_amount; ?>" />
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                                                    <label>Insurance Relief <i class="text-danger">*</i></label>
                                                                                    <input type="number" class="form-control" step="0.01" name="insurance_relief_amount" value="<?php echo $dt->insurance_relief_amount; ?>" required />
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-12">
                                                                                    <label for="">Narrative </label>
                                                                                    <textarea class="form-control" name="narrative" placeholder="Type here..."><?php echo $dt->narrative; ?></textarea>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                                                <button type="Submit" class="btn btn-primary">Update</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer"></div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                <?php
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>


            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->