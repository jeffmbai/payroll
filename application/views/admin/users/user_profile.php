<?php
foreach ($this_user as $usr) {
    $entity_id = $usr->entity_id;
    $firstname = $usr->firstname;
    $secondname = $usr->secondname;
    $lastname = $usr->lastname;
    $name = $usr->firstname . ' ' . $usr->secondname . ' ' . $usr->lastname;
    $email = $usr->email;
    $phone = $usr->phone;
    $id_passport = $usr->id_passport;
    $profile_picture = $usr->profile_picture;
    $gender = $usr->gender;
    $dob = $usr->dob;
    $active = $usr->active;
    $super_user = $usr->super_user;
    $role_id = $usr->system_role;
    $role_name = $usr->role_name;
    $org_id = $usr->org_id;
    $org_name = $usr->org_name;
    $station_id = $usr->station_id;
    $station_name = $usr->station_name;
    $department_id = $usr->department_id;
    $department_name = $usr->department_name;
    $sub_department_id = $usr->sub_department_id;
    $sub_department_name = $usr->sub_department_name;
    $modified = $usr->date_modified;
    $registration = $usr->time_stamp;
}
?>
<?php
$roles_arr = array(1, 3, 4, 7);
?>

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

                <?php if ($CI->permissions('orgs_add')) : ?>
                    <div class="col-md-5 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Details</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#changePin">Change Pin <span class="fa fa-lock"></span> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-repsonsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Name</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Email</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $email; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Phone</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $phone; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>ID/ Passport</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $id_passport; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b><b>Gender</b></b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $gender; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b><b>Organization</b></b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $org_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b><b>Station</b></b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $station_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b><b>Department</b></b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $department_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b><b>Sub Department</b></b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $sub_department_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b><b>Active</b></b></td>
                                                    <td class="rm_border_top bd_left"><?php if ($active == 1) echo "Yes";
                                                                                        else echo "No"; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b><b>System Role</b></b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $role_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b><b>Super User</b></b></td>
                                                    <td class="rm_border_top bd_left"><?php if ($super_user == 1) echo "Yes";
                                                                                        else echo "No"; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b><b>Last Modified</b></b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $modified; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b><b>Registration</b></b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $registration; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($CI->permissions('orgs_add')) : ?>
                    <div class="col-md-7 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-sm-2"></div>
                                    <div class="col-md-6 col-sm-8" style=" text-align: center;">
                                        <img src="<?php echo base_url('assets/images/profile/' . $profile_picture); ?>" alt="<?php echo $profile_picture; ?>" style="max-height: 300px;" />
                                        <br><br><br><br>
                                        <form action="<?php echo site_url('users/update_user_picture/' . $entity_id); ?>" method="post" enctype="multipart/form-data">
                                            <label for="">Change profile picture</label>
                                            <input type="file" name="profile_picture" required="required" class="form-control" />
                                            <br>
                                            <input type="submit" class="btn btn-primary " value="Save" />
                                        </form>
                                    </div>
                                    <div class="col-md-3 col-sm-2"></div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>

                        <div class="card card-outline card-warning">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <form role="form" action="<?php echo site_url('users/change_password'); ?>" method="post" enctype="multipart/form-data">
                                            <label>New Password</label> <br />
                                            <input type="hidden" hidden class="" name="userid" value="<?php echo $entity_id; ?>" required /> <br />
                                            <input type="password" class="form-control" name="password" placeholder="your new password" required /> <br />
                                            <label>Confirm Password</label> <br />
                                            <input type="password" class="form-control" name="cpassword" placeholder="confirm password" required /> <br />
                                            <input type="submit" name="change" value="Change" class="btn btn-primary" />
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                <?php endif; ?>

                <div class="col-md-12 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Details</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?php echo site_url('users/user_info_update/' . $entity_id); ?>" method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">First Name <span class="text text-danger">*</span> </label>
                                        <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>" required />
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Second Name <span class="text text-danger">*</span> </label>
                                        <input type="text" name="secondname" class="form-control" value="<?php echo $secondname; ?>" required />
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Last Name </label>
                                        <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>" />
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Phone <span class="text text-danger">*</span> </label>
                                        <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>" required />
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Email <span class="text text-danger">*</span> </label>
                                        <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" required />
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">ID/ Passport <span class="text text-danger">*</span> </label>
                                        <input type="text" name="id_passport" class="form-control" value="<?php echo $id_passport; ?>" required />
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Gender <span class="text text-danger">*</span> </label>
                                        <p>
                                            M:<input type="radio" class="flat" name="gender" id="genderM" value="M" <?php if ($gender == 'M') echo 'Checked'; ?> required />
                                            F:<input type="radio" class="flat" name="gender" id="genderF" value="F" <?php if ($gender == 'F') echo 'Checked'; ?> required />
                                        </p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Date of birth </label>
                                        <input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>" />
                                    </div>

                                    <div class="col-md-3">
                                        <label>Organization <span class="text text-danger">*</span> </label>
                                        <select name="org" id="org" class="form-control" onchange="get_stations()" required>
                                            <option value=""> Select Organization </option>
                                            <?php
                                            foreach ($orgs as $org) {
                                            ?>
                                                <option value="<?php echo $org->org_id; ?>" <?php if ($org_id == $org->org_id) echo "selected"; ?>><?php echo $org->org_name; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Station <span class="text text-danger">*</span> </label>
                                        <select name="" id="station" onchange="get_department()" class="form-control" required>
                                            <option value="<?php echo $station_id; ?>" selected> <?php echo $station_name; ?> </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Department <span class="text text-danger">*</span> </label>
                                        <select name="" id="department" onchange="get_sub_department()" class="form-control" required>
                                            <option value="<?php echo $department_id; ?>" selected> <?php echo $department_name; ?> </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Sub Department <span class="text text-danger">*</span> </label>
                                        <select name="sub_department" id="sub_department" class="form-control" required>
                                            <option value="<?php echo $sub_department_id; ?>" selected> <?php echo $sub_department_name; ?> </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>System Role</label>
                                        <select name="system_role" class="form-control" required id="">
                                            <option value=""> Select user role </option>
                                            <?php
                                            foreach ($system_roles as $sr) {
                                                if (!in_array($sr->role_id, $roles_arr)) continue;
                                            ?>
                                                <option value="<?php echo $sr->role_id; ?>" <?php if ($sr->role_id == $role_id) echo "selected"; ?>> <?php echo $sr->role_name; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <?php if ($_SESSION['superuser'] == 1) : ?>
                                        <div class="col-md-3">
                                            <label> Super User </label>
                                            <p>
                                                <input type="checkbox" class="flat" value="1" name="super_user" <?php if ($super_user == '1') echo 'Checked'; ?>>
                                            </p>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-md-3">
                                        <label> Active </label>
                                        <p>
                                            <input type="checkbox" class="flat" value="1" name="active" <?php if ($active == '1') echo 'Checked'; ?>>
                                        </p>
                                    </div>

                                    <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                        <button type="Submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.card-body -->
                    </div>
                </div>

                <br />
                <br />
                <br />

            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->


<!-- Modal -->
<div id="changePin" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button> -->
                <h4 class="modal-title">Change Pin</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="<?php echo site_url('users/change_pin'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12 col-xs-12" hidden>
                            <input type="number" name="userid" class="form-control" value="<?php echo $entity_id; ?>" required />
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <label>New Pin</label>
                            <input type="number" name="pin" class="form-control" required />
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br />
                            <input type="submit" name="change" class="btn btn-primary" value="Change" />
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>