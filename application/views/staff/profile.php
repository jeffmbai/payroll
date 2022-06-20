<?php
$CI = &get_instance();
?>
<?php
foreach ($staff as $dt) {
    $employee_id = $dt->employee_id;
    $org_id = $dt->org_id;
    $designation_id = $dt->designation_id;
    $department_id = $dt->department_id;
    $first_name = $dt->first_name;
    $second_name = $dt->second_name;
    $last_name = $dt->last_name;
    $email = $dt->email;
    $id_number = $dt->id_number;
    $primary_phone = $dt->primary_phone;
    $secondary_phone = $dt->secondary_phone;
    $dob = $dt->dob;
    $gender = $dt->gender;
    $address = $dt->address;
    $employment_number = $dt->employment_number;
    $kra_pin = $dt->kra_pin;
    $nssf = $dt->nssf;
    $nhif = $dt->nhif;
    $job_grade = $dt->job_grade;
    $joining_date = $dt->joining_date;
    $leaving_date = $dt->leaving_date;
    $marital_status = $dt->marital_status;
    $disability = $dt->disability;
    $basic_salary = $dt->basic_salary;
    $active = $dt->active;
    $narrative = $dt->narrative;
    $date_modified = $dt->date_modified;
    $time_stamp = $dt->time_stamp;
    $org_name = $dt->org_name;
    $department_name = $dt->department_name;
    $designation_name = $dt->designation_name;
    $paye = $dt->paye;
    $nssf_amount = $dt->nssf_amount;
    $nhif_amount = $dt->nhif_amount;
    $tax_relief_amount = $dt->tax_relief_amount;
    $insurance_relief_amount = $dt->insurance_relief_amount;
}
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
                <div class="col-12 col-sm-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Staff Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-allowances-tab" data-toggle="pill" href="#custom-tabs-allowances" role="tab" aria-controls="custom-tabs-allowances" aria-selected="false">Allowances</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-deductibles-tab" data-toggle="pill" href="#custom-tabs-deductibles" role="tab" aria-controls="custom-tabs-deductibles" aria-selected="false">Deductibles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-bank_details-tab" data-toggle="pill" href="#custom-tabs-bank_details" role="tab" aria-controls="custom-tabs-bank_details" aria-selected="false">Bank Details</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <h2>Basic Information</h2>
                                    <form action="<?php echo site_url('staff/update_staff/' . $employee_id); ?>" method="post">

                                        <div class="row">
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">Organization <span class="text text-danger">*</span> </label>
                                                <select class="form-control select2_single" name="org_id" required>
                                                    <option value=""> ~Select Org/School~ </option>
                                                    <?php
                                                    foreach ($orgs as $org) {
                                                    ?>
                                                        <option value="<?php echo $org->org_id; ?>" <?php if ($org->org_id == $org_id) echo "selected"; ?>> <?php echo $org->org_name; ?> </option>
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
                                                        <option value="<?php echo $dep->department_id; ?>" <?php if ($dep->department_id == $department_id) echo "selected"; ?>> <?php echo $dep->department_name; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">First Name <span class="text text-danger">*</span> </label>
                                                <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>" required />
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">Second Name </label>
                                                <input type="text" class="form-control" name="second_name" value="<?php echo $second_name; ?>" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">Last Name</label>
                                                <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>" />
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">ID Number <span class="text text-danger">*</span> </label>
                                                <input type="number" class="form-control" name="id_number" required value="<?php echo $id_number; ?>" />
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">Date of Birth <span class="text text-danger">*</span> </label>
                                                <input type="date" class="form-control" name="dob" required value="<?php echo $dob; ?>" />
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">Email <span class="text text-danger">*</span> </label>
                                                <input type="email" class="form-control" name="email" required value="<?php echo $email; ?>" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">Primary Phone <span class="text text-danger">*</span> </label>
                                                <input type="" class="form-control" name="primary_phone" required value="<?php echo $primary_phone; ?>" />
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">Secondary Phone </label>
                                                <input type="number" class="form-control" name="secondary_phone" value="<?php echo $secondary_phone; ?>" />
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">Gender <span class="text text-danger">*</span> </label>
                                                <select class="form-control" name="gender" required>
                                                    <option value="M" <?php if ($gender == 'M') echo "selected"; ?>>Male</option>
                                                    <option value="F" <?php if ($gender == 'F') echo "selected"; ?>>Female</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">Address </label>
                                                <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">KRA Pin </label>
                                                <input type="text" class="form-control" name="kra_pin" value="<?php echo $kra_pin; ?>" />
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">NSSF </label>
                                                <input type="number" class="form-control" name="nssf" value="<?php echo $nssf; ?>" />
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">NHIF </label>
                                                <input type="number" class="form-control" name="nhif" value="<?php echo $nhif; ?>" />
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">Job Grade </label>
                                                <input type="text" class="form-control" name="job_grade" value="<?php echo $job_grade; ?>" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">Joining Date </label>
                                                <input type="date" class="form-control" name="joining_date" value="<?php echo $joining_date; ?>" />
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">Leaving Date </label>
                                                <input type="date" class="form-control" name="leaving_date" value="<?php echo $leaving_date; ?>" />
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">Marital Status </label>
                                                <select class="form-control select2_single" name="marital_status" required>
                                                    <option value="Single" <?php if ($marital_status == 'Single') echo "selected"; ?>>Single</option>
                                                    <option value="Married" <?php if ($marital_status == 'Married') echo "selected"; ?>>Married</option>
                                                    <option value="Divorced" <?php if ($marital_status == 'Divorced') echo "selected"; ?>>Divorced/ Separated</option>
                                                    <option value="Widowed" <?php if ($marital_status == 'Widowed') echo "selected"; ?>>Widowed</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">Disabled? </label>
                                                <p>
                                                    Yes:<input type="radio" class="flat" name="disability" id="yes" value="1" <?php if ($disability == 1) echo "checked"; ?> />
                                                    No:<input type="radio" class="flat" name="disability" id="no" value="0" <?php if ($disability == 0) echo "checked"; ?> />
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
                                                        <option value="<?php echo $des->designation_id; ?>" <?php if ($designation_id == $des->designation_id) echo "selected"; ?>> <?php echo $des->designation_name; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">Employment No./ID </label>
                                                <input type="text" class="form-control" name="employment_number" value="<?php echo $employment_number; ?>" />
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <label for="">Basic Salary </label>
                                                <input type="number" class="form-control" name="basic_salary" value="<?php echo $basic_salary; ?>" />
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label> Active </label>
                                                <p>
                                                    <input type="checkbox" class="flat" value="1" name="active" <?php if ($active == 1) echo "checked"; ?>>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <label>PAYE <i class="text-danger">*</i></label>
                                                <input type="number" class="form-control" step="0.01" name="paye" value="<?php echo $paye; ?>" required />
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <label>NSSF Amount <i class="text-danger">*</i></label>
                                                <input type="number" class="form-control" step="0.01" name="nssf_amount" value="<?php echo $nssf_amount; ?>" required />
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <label>NHIF Amount <i class="text-danger">*</i></label>
                                                <input type="number" class="form-control" step="0.01" name="nhif_amount" value="<?php echo $nhif_amount; ?>" required />
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <label>Tax Relief <i class="text-danger">*</i></label>
                                                <input type="number" class="form-control" step="0.01" name="tax_relief_amount" required value="<?php echo $tax_relief_amount; ?>" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <label>Insurance Relief <i class="text-danger">*</i></label>
                                                <input type="number" class="form-control" step="0.01" name="insurance_relief_amount" value="<?php echo $insurance_relief_amount; ?>" required />
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label for="">Narrative </label>
                                                <textarea class="form-control" name="narrative" placeholder="Type here..."><?php echo $narrative; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                            <button type="Submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-allowances" role="tabpanel" aria-labelledby="custom-tabs-allowances-tab">
                                    <div class="card card-outline card-warning">
                                        <div class="card-header">
                                            <h3 class="card-title">Add Allowance</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <form action="<?php echo site_url('staff/add_allowance/' . $employee_id); ?>" method="post">

                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6">
                                                        <label for="">Allowance Name <span class="text text-danger">*</span> </label>
                                                        <select class="form-control select2_single" name="allowance_id" required>
                                                            <option value=""> ~Select Allowance~ </option>
                                                            <?php
                                                            foreach ($allowances as $allw) {
                                                            ?>
                                                                <option value="<?php echo $allw->allowance_id; ?>"> <?php echo $allw->allowance_name; ?> </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <label for="">Allowance Amount <span class="text text-danger">*</span> </label>
                                                        <input type="number" name="allowance_amount" class="form-control" required />
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <label> Is One-Time </label>
                                                        <p>
                                                            Yes:<input type="radio" class="flat" name="is_one_time" id="is_one_time" value="1" required />
                                                            No:<input type="radio" class="flat" name="is_one_time" id="is_one_time" value="0" required />
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6">
                                                        <label> Active </label>
                                                        <p>
                                                            <input type="checkbox" class="flat" value="1" name="active">
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <label for="">Narrative </label>
                                                        <textarea name="narrative" id="" class="form-control"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                    <button type="Submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div><!-- /.card-body -->
                                    </div>

                                    <div class="card card-outline card-warning">
                                        <div class="card-header">
                                            <h3 class="card-title">Allowances</h3>
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
                                                                <th>Allowance Name</th>
                                                                <th>Allowance Amount</th>
                                                                <th>Is Taxable?</th>
                                                                <th>Is One-Time?</th>
                                                                <th>Status </th>
                                                                <th>Time_Stamp </th>
                                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                            $c = 0;
                                                            foreach ($staff_allowances as $dt) {
                                                                $c++;
                                                            ?>
                                                                <tr class="even pointer">
                                                                    <td><?php echo $dt->allowance_name; ?></td>
                                                                    <td><?php echo $dt->allowance_amount; ?></td>
                                                                    <td>
                                                                        <?php if ($dt->is_taxable == 1) echo "<span class='badge badge-success'>Yes</span>";
                                                                        else echo "<span class='badge badge-danger'>No</span>"; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($dt->is_one_time == 1) echo "<span class='badge badge-success'>Yes</span>";
                                                                        else echo "<span class='badge badge-danger'>No</span>"; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($dt->active == 1) echo "Active";
                                                                        else echo "Inactive"; ?>
                                                                    </td>
                                                                    <td><?php echo $dt->time_stamp; ?></td>
                                                                    <td class=" last">
                                                                        <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal<?php echo $dt->employee_allowance_id; ?>"> <span class="fa fa-edit"></span> </button>
                                                                        <a href="<?php echo site_url('staff/delete_allowance/' . $employee_id . '/' . $dt->employee_allowance_id); ?>" class="btn btn-xs btn-danger"> <span class="fa fa-trash"></span> </a>
                                                                    </td>
                                                                </tr>

                                                                <!-- Modal -->
                                                                <div id="myModal<?php echo $dt->employee_allowance_id; ?>" class="modal fade" role="dialog">
                                                                    <div class="modal-dialog">

                                                                        <!-- Modal content-->
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Details</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="<?php echo site_url('staff/update_allowance/' . $employee_id . '/' . $dt->employee_allowance_id); ?>" method="post">

                                                                                    <div class="row">
                                                                                        <div class="col-md-6 col-sm-12">
                                                                                            <label for="">Allowance Name <span class="text text-danger">*</span> </label>
                                                                                            <select class="form-control select2_single" name="allowance_id" required>
                                                                                                <option value=""> ~Select Allowance~ </option>
                                                                                                <?php
                                                                                                foreach ($allowances as $allw) {
                                                                                                ?>
                                                                                                    <option value="<?php echo $allw->allowance_id; ?>" <?php if ($dt->allowance_id == $allw->allowance_id) echo "selected"; ?>> <?php echo $allw->allowance_name; ?> </option>
                                                                                                <?php
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-sm-12">
                                                                                            <label for="">Allowance Amount <span class="text text-danger">*</span> </label>
                                                                                            <input type="number" name="allowance_amount" class="form-control" value="<?php echo $dt->allowance_amount; ?>" required />
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-6 col-sm-12">
                                                                                            <label> Is One-Time </label>
                                                                                            <p>
                                                                                                Yes:<input type="radio" class="flat" name="is_one_time" id="is_one_time" value="1" <?php if ($dt->is_one_time == 1) echo "checked"; ?> required />
                                                                                                No:<input type="radio" class="flat" name="is_one_time" id="is_one_time" value="0" <?php if ($dt->is_one_time == 0) echo "checked"; ?> required />
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-sm-12">
                                                                                            <label> Active </label>
                                                                                            <p>
                                                                                                <input type="checkbox" value="1" name="active" <?php if ($dt->active == 1) echo "checked"; ?>>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <label for="">Narrative </label>
                                                                                            <textarea name="narrative" id="" class="form-control"><?php echo $dt->narrative; ?></textarea>
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
                                <div class="tab-pane fade" id="custom-tabs-deductibles" role="tabpanel" aria-labelledby="custom-tabs-deductibles-tab">
                                    <div class="card card-outline card-warning">
                                        <div class="card-header">
                                            <h3 class="card-title">Add Deductible</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <form action="<?php echo site_url('staff/add_deductible/' . $employee_id); ?>" method="post">

                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6">
                                                        <label for="">Deductible Name <span class="text text-danger">*</span> </label>
                                                        <select class="form-control select2_single" name="deductible_id" required>
                                                            <option value=""> ~Select Deductible~ </option>
                                                            <?php
                                                            foreach ($deductibles as $ded) {
                                                            ?>
                                                                <option value="<?php echo $ded->deductible_id; ?>"> <?php echo $ded->deductible_name; ?> </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <label for="">Deductible Amount <span class="text text-danger">*</span> </label>
                                                        <input type="number" name="deductible_amount" class="form-control" required />
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <label> Is One-Time </label>
                                                        <p>
                                                            Yes:<input type="radio" class="flat" name="is_one_time" id="is_one_time" value="1" required />
                                                            No:<input type="radio" class="flat" name="is_one_time" id="is_one_time" value="0" required />
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6">
                                                        <label> Active </label>
                                                        <p>
                                                            <input type="checkbox" class="flat" value="1" name="active">
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <label for="">Narrative </label>
                                                        <textarea name="narrative" id="" class="form-control"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                    <button type="Submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div><!-- /.card-body -->
                                    </div>

                                    <div class="card card-outline card-warning">
                                        <div class="card-header">
                                            <h3 class="card-title">Deductibles</h3>
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
                                                                <th>Deductible Name</th>
                                                                <th>Deductible Amount</th>
                                                                <th>Is One-Time?</th>
                                                                <th>Status </th>
                                                                <th>Time_Stamp </th>
                                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                            $c = 0;
                                                            foreach ($staff_deductibles as $dt2) {
                                                                $c++;
                                                            ?>
                                                                <tr class="even pointer">
                                                                    <td><?php echo $dt2->deductible_name; ?></td>
                                                                    <td><?php echo $dt2->deductible_amount; ?></td>
                                                                    <td>
                                                                        <?php if ($dt2->is_one_time == 1) echo "<span class='badge badge-success'>Yes</span>";
                                                                        else echo "<span class='badge badge-danger'>No</span>"; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($dt2->active == 1) echo "Active";
                                                                        else echo "Inactive"; ?>
                                                                    </td>
                                                                    <td><?php echo $dt2->time_stamp; ?></td>
                                                                    <td class=" last">
                                                                        <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal<?php echo $dt2->employee_deductible_id; ?>"> <span class="fa fa-edit"></span> </button>
                                                                        <a href="<?php echo site_url('staff/delete_deductible/' . $employee_id . '/' . $dt2->employee_deductible_id); ?>" class="btn btn-xs btn-danger"> <span class="fa fa-trash"></span> </a>
                                                                    </td>
                                                                </tr>

                                                                <!-- Modal -->
                                                                <div id="myModal<?php echo $dt2->employee_deductible_id; ?>" class="modal fade" role="dialog">
                                                                    <div class="modal-dialog">

                                                                        <!-- Modal content-->
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                                                                <h4 class="modal-title">Details</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="<?php echo site_url('staff/update_deductible/' . $employee_id . '/' . $dt2->employee_deductible_id); ?>" method="post">

                                                                                    <div class="row">
                                                                                        <div class="col-md-6 col-sm-12">
                                                                                            <label for="">Deductible Name <span class="text text-danger">*</span> </label>
                                                                                            <select class="form-control select2_single" name="deductible_id" required>
                                                                                                <option value=""> ~Select Deductible~ </option>
                                                                                                <?php
                                                                                                foreach ($deductibles as $ded) {
                                                                                                ?>
                                                                                                    <option value="<?php echo $ded->deductible_id; ?>" <?php if ($dt2->deductible_id == $ded->deductible_id) echo "selected"; ?>> <?php echo $ded->deductible_name; ?> </option>
                                                                                                <?php
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-sm-12">
                                                                                            <label for="">Deductible Amount <span class="text text-danger">*</span> </label>
                                                                                            <input type="number" name="deductible_amount" class="form-control" value="<?php echo $dt2->deductible_amount; ?>" required />
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-6 col-sm-12">
                                                                                            <label> Is One-Time </label>
                                                                                            <p>
                                                                                                Yes:<input type="radio" class="flat" name="is_one_time" id="is_one_time" value="1" <?php if ($dt2->is_one_time == 1) echo "checked"; ?> required />
                                                                                                No:<input type="radio" class="flat" name="is_one_time" id="is_one_time" value="0" <?php if ($dt2->is_one_time == 0) echo "checked"; ?> required />
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-sm-12">
                                                                                            <label> Active </label>
                                                                                            <p>
                                                                                                <input type="checkbox" value="1" name="active" <?php if ($dt2->active == 1) echo "checked"; ?>>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <label for="">Narrative </label>
                                                                                            <textarea name="narrative" id="" class="form-control"><?php echo $dt2->narrative; ?></textarea>
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
                                <div class="tab-pane fade" id="custom-tabs-bank_details" role="tabpanel" aria-labelledby="custom-tabs-bank_details-tab">
                                    <div class="card card-outline card-warning">
                                        <div class="card-header">
                                            <h3 class="card-title">Add Bank</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <form action="<?php echo site_url('staff/add_bank/' . $employee_id); ?>" method="post">

                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6">
                                                        <label for="">Bank Name <span class="text text-danger">*</span> </label>
                                                        <input type="text" class="form-control" name="bank_name" required />
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <label for="">Branch Name <span class="text text-danger">*</span> </label>
                                                        <input type="text" name="branch_name" class="form-control" required />
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <label for="">Branch Code <span class="text text-danger">*</span> </label>
                                                        <input type="number" name="branch_code" class="form-control" required />
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6">
                                                        <label for="">Account Number <span class="text text-danger">*</span> </label>
                                                        <input type="text" name="account_number" class="form-control" required />
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <label> Active </label>
                                                        <p>
                                                            <input type="checkbox" class="flat" value="1" name="active">
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                    <button type="Submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div><!-- /.card-body -->
                                    </div>

                                    <div class="card card-outline card-warning">
                                        <div class="card-header">
                                            <h3 class="card-title">Banks</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="col-md-12 table-responsive">
                                                <table id="example" class="table table-striped responsive-utilities jambo_table">
                                                    <thead>
                                                        <tr class="headings">
                                                            <th>Bank Name</th>
                                                            <th>Account No.</th>
                                                            <th>Branch Name</th>
                                                            <th>Branch Code</th>
                                                            <th>Status </th>
                                                            <th class=" no-link last"><span class="nobr">Action</span>
                                                            </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $c = 0;
                                                        foreach ($bank_details as $dt3) {
                                                            $c++;
                                                        ?>
                                                            <tr class="even pointer">
                                                                <td><?php echo $dt3->bank_name; ?></td>
                                                                <td><?php echo $dt3->account_number; ?></td>
                                                                <td><?php echo $dt3->branch_name; ?></td>
                                                                <td><?php echo $dt3->branch_code; ?></td>
                                                                <td>
                                                                    <?php if ($dt3->active == 1) echo "Active";
                                                                    else echo "Inactive"; ?>
                                                                </td>
                                                                <td class=" last">
                                                                    <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#bankModal<?php echo $dt3->employee_bank_detail_id; ?>"> <span class="fa fa-edit"></span> </button>
                                                                    <a href="<?php echo site_url('staff/delete_bank/' . $employee_id . '/' . $dt3->employee_bank_detail_id); ?>" class="btn btn-xs btn-danger"> <span class="fa fa-trash"></span> </a>
                                                                </td>
                                                            </tr>

                                                            <!-- Modal -->
                                                            <div id="bankModal<?php echo $dt3->employee_bank_detail_id; ?>" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                                                            <h4 class="modal-title">Details</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<?php echo site_url('staff/update_bank/' . $employee_id . '/' . $dt3->employee_bank_detail_id); ?>" method="post">

                                                                                <div class="row">
                                                                                    <div class="col-md-6 col-sm-12">
                                                                                        <label for="">Bank Name <span class="text text-danger">*</span> </label>
                                                                                        <input type="text" class="form-control" name="bank_name" value="<?php echo $dt3->bank_name; ?>" required />
                                                                                    </div>
                                                                                    <div class="col-md-6 col-sm-12">
                                                                                        <label for="">Branch Name <span class="text text-danger">*</span> </label>
                                                                                        <input type="text" name="branch_name" class="form-control" value="<?php echo $dt3->branch_name; ?>" required />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-6 col-sm-12">
                                                                                        <label for="">Branch Code <span class="text text-danger">*</span> </label>
                                                                                        <input type="number" name="branch_code" class="form-control" value="<?php echo $dt3->branch_code; ?>" required />
                                                                                    </div>
                                                                                    <div class="col-md-6 col-sm-12">
                                                                                        <label for="">Account Number <span class="text text-danger">*</span> </label>
                                                                                        <input type="number" name="account_number" class="form-control" required value="<?php echo $dt3->account_number; ?>" />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-6 col-sm-12">
                                                                                        <label> Active </label>
                                                                                        <p>
                                                                                            <input type="checkbox" value="1" name="active" <?php if ($dt3->active == 1) echo "checked"; ?>>
                                                                                        </p>
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

                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div><!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!--/. container-fluid -->

    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->


