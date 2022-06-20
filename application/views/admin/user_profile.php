<?php
$entity_id = null;
$name = null;
$firstname = null;
$secondname = null;
$lastname = null;
$email = null;
$phone = null;
$id_passport = null;
$profile_picture = null;
$gender = null;
$dob = null;
$active = null;
$super_user = null;
$role_id = null;
$role_name = null;
$org_id = null;
$org_name = null;
$modified = null;
$registration = null;

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
$modified = $usr->date_modified;
$registration = $usr->time_stamp;
}
?>

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                User Profile
                <small>
                    User details
                </small>
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

        <div class="col-md-7 col-sm-7 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Daily active users <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <a href="<?php echo site_url('sys/users');?>" class="btn btn-primary btn-xs">See users <span class="fa fa-users"></span> </a>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-repsonsive">
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
                                    <td class="rm_border_top pd_right"><b><b>Store</b></b></td>
                                    <td class="rm_border_top bd_left"><?php echo $org_name; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b><b>Active</b></b></td>
                                    <td class="rm_border_top bd_left"><?php if($active == 1) echo "Yes"; else echo "No"; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b><b>System Role</b></b></td>
                                    <td class="rm_border_top bd_left"><?php echo $role_name; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b><b>Super User</b></b></td>
                                    <td class="rm_border_top bd_left"><?php if($super_user == 1) echo "Yes"; else echo "No"; ?></td>
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
            </div>
        </div>

        <div class="col-md-5 col-sm-5 col-xs-12">

            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <br><br>
                        <div class="col-md-3 col-sm-2"></div>
                        <div class="col-md-6 col-sm-8" style=" text-align: center;">
                            <img src="<?php echo base_url('assets/images/profile/' . $profile_picture); ?>" alt="<?php echo $profile_picture; ?>" style="max-height: 300px;" />
                               <br><br><br><br>
                            <form action="<?php echo site_url('submitform/update_user_picture/'.$entity_id);?>" method="post" enctype="multipart/form-data">
                                <label for="">Change profile picture</label>
                                <input type="file" name="profile_picture" required="required" class="form-control" />
                                <br>
                                <input type="submit" class="btn btn-primary " value="Save" />
                            </form>
                        </div>
                        <div class="col-md-3 col-sm-2"></div>
                    </div>
                </div>
            </div>
        </div>

        <br />
        <br />

    </div>

    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            <a class="collapse-link">User Information <small>Edit user information</small></a>
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
                            <form action="<?php echo site_url('submitform/user_info_update/'.$entity_id); ?>" method="post">
                                <div class="col-md-3">
                                    <label for="">First Name <span class="text text-danger">*</span> </label>
                                    <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>" required />
                                </div>
                                <div class="col-md-3">
                                    <label for="">Second Name <span class="text text-danger">*</span> </label>
                                    <input type="text" name="secondname" class="form-control" value="<?php echo $secondname; ?>" required />
                                </div>
                                <div class="col-md-3">
                                    <label for="">Last Name <span class="text text-danger">*</span> </label>
                                    <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>" required />
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
                                        M:<input type="radio" class="flat" name="gender" id="genderM" value="M" <?php if($gender == 'M') echo 'Checked';?> required />
                                        F:<input type="radio" class="flat" name="gender" id="genderF" value="F" <?php if($gender == 'F') echo 'Checked';?> required />
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Date of birth <span class="text text-danger">*</span> </label>
                                    <input type="date" class="form-control" required="required" name="dob" value="<?php echo $dob; ?>" />
                                </div>
                                <div class="col-md-3">
                                    <label> Super User </label>
                                    <p>
                                        <input type="checkbox" class="flat" value="1" name="super_user" <?php if($super_user == '1') echo 'Checked';?>>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <label> Active </label>
                                    <p>
                                        <input type="checkbox" class="flat" value="1" name="active" <?php if($active == '1') echo 'Checked';?>>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <label>Store</label>
                                    <select name="store" class="form-control" required id="">
                                        <option value=""> Select store </option>
                                        <?php
                                        foreach ($orgs as $org) {
                                            ?>
                                            <option value="<?php echo $org->org_id; ?>"  <?php if($org->org_id == $org_id ) echo "selected";?>  >  <?php echo $org->org_name; ?>  </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>System Role</label>
                                    <select name="system_role" class="form-control" required id="">
                                        <option value=""> Select user role </option>
                                        <?php
                                        foreach ($system_roles as $sr) {
                                            ?>
                                            <option value="<?php echo $sr->role_id; ?>"  <?php if($sr->role_id == $role_id ) echo "selected";?>  >  <?php echo $sr->role_name; ?>  </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="Submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
