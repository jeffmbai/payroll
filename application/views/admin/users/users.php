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
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Form</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('users/register_user?u=nusr-a'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-4">
                                            <label for="">First Name <span class="text text-danger">*</span> </label>
                                            <input type="text" name="firstname" class="form-control" required />
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <label for="">Second Name <span class="text text-danger">*</span> </label>
                                            <input type="text" name="secondname" class="form-control" required />
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <label for="">Last Name </label>
                                            <input type="text" name="lastname" class="form-control" />
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <label for="">Phone <span class="text text-danger">*</span> </label>
                                            <input type="text" name="phone" class="form-control" required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 col-sm-4">
                                            <label for="">Email <span class="text text-danger">*</span> </label>
                                            <input type="text" name="email" class="form-control" required />
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <label for="">ID/ Passport <span class="text text-danger">*</span> </label>
                                            <input type="text" name="id_passport" class="form-control" required />
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <label for="">Gender <span class="text text-danger">*</span> </label>
                                            <p>
                                                M:<input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required />
                                                F:<input type="radio" class="flat" name="gender" id="genderF" value="F" />
                                            </p>
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <label for="">Date of birth </label>
                                            <input type="date" class="form-control" name="dob" />
                                        </div>
                                    </div>

                                    <div class="row" style="display: none;">
                                        <div class="col-md-3 col-sm-4" style="display: none;">
                                            <label>Organization <span class="text text-danger">*</span> </label>
                                            <select name="org" id="org" class="form-control" onchange="get_stations()" required>
                                                <option value=""> Select Organization </option>
                                                <?php
                                                foreach ($orgs as $org) {
                                                ?>
                                                    <option value="<?php echo $org->org_id; ?>" <?php if ($org->org_id == 1) echo "selected"; ?>><?php echo $org->org_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-4" style="display: none;">
                                            <label>Station </label>
                                            <select name="" id="station" onchange="get_department()" class="form-control">
                                                <option value="1" selected> Default </option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-4" style="display: none;">
                                            <label>Department </label>
                                            <select name="" id="department" onchange="get_sub_department()" class="form-control">
                                                <option value="1" selected> Default </option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-4" style="display: none;">
                                            <label>Sub Department </label>
                                            <select name="sub_department" id="sub_department" class="form-control">
                                                <option value="1" selected> Default </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 col-sm-4">
                                            <label>System Role <span class="text text-danger">*</span> </label>
                                            <select name="system_role" class="form-control" required id="">
                                                <option value=""> Select user role </option>
                                                <?php
                                                foreach ($system_roles as $sr) {
                                                    if (!in_array($sr->role_id, $roles_arr)) continue;
                                                ?>
                                                    <option value="<?php echo $sr->role_id; ?>"><?php echo $sr->role_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <?php if ($_SESSION['superuser'] == 1) : ?>
                                            <div class="col-md-3 col-sm-4" style="padding-top: 25px;">
                                                <label> Super User </label>
                                                <input type="checkbox" class="" value="1" name="super_user">
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="row" style="display: none;">
                                        <h4>Contact Persons Details</h4>
                                    </div>
                                    <div class="row" style="display: none;">
                                        <div class="col-md-12 col-sm-12">
                                            <h5><u>Contact Person One</u></h5>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Name </label>
                                            <input type="text" name="contact_person_name1" class="form-control" />
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Phone </label>
                                            <input type="text" name="contact_person_phone1" class="form-control" />
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Email </label>
                                            <input type="text" name="contact_person_email1" class="form-control" />
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Address </label>
                                            <input type="text" name="contact_person_address1" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row" style="display: none;">
                                        <div class="col-md-12 col-sm-12">
                                            <h5><u>Contact Person Two</u></h5>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Name </label>
                                            <input type="text" name="contact_person_name2" class="form-control" />
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Phone </label>
                                            <input type="text" name="contact_person_phone2" class="form-control" />
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Email </label>
                                            <input type="text" name="contact_person_email2" class="form-control" />
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Address </label>
                                            <input type="text" name="contact_person_address2" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12" style="padding-top: 30px;">
                                            <label> Active </label>
                                            <input type="checkbox" class="" value="1" name="active">
                                        </div>
                                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                            <button type="Submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Users List</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="example1" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>PIN</th>
                                                    <th>Name</th>
                                                    <th>Email </th>
                                                    <th>Phone </th>
                                                    <th>ID/ Passport </th>
                                                    <th>Org </th>
                                                    <th>Role </th>
                                                    <th>Super user </th>
                                                    <th>Active </th>
                                                    <th class=" no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($all_users as $usr) {
                                                    $c++;
                                                    #skip me as the user logged in
                                                    if ($usr->email != $_SESSION['username']) {
                                                ?>
                                                        <tr class="even pointer">
                                                            <td class="a-center "><?=($usr->pin != '') ? $usr->pin : '-'; ?></td>
                                                            <td><?php echo $usr->firstname . ' ' . $usr->secondname . ' ' . $usr->lastname; ?></td>
                                                            <td><a href="mailto:<?php echo $usr->email; ?>" target="_blank"> <?php echo $usr->email; ?></a></td>
                                                            <td><a href="tel:<?php echo $usr->phone; ?>"><?php echo $usr->phone; ?></a> <i class="success fa fa-phone"></i>
                                                            </td>
                                                            <td><?php echo $usr->id_passport; ?></td>
                                                            <td><?php echo $usr->org_name; ?></td>
                                                            <td><?php echo $usr->role_name; ?></td>
                                                            <td class="a-right a-right ">
                                                                <?php
                                                                if ($usr->super_user == 1) echo "True";
                                                                else echo "False";
                                                                ?>
                                                            </td>
                                                            <td class="a-right a-right ">
                                                                <?php
                                                                if ($usr->active == 1) echo "True";
                                                                else echo "False";
                                                                ?>
                                                            </td>
                                                            <td class=" last">
                                                                <a href="<?php echo site_url('users/profile/' . $usr->entity_id); ?>" title="View profile" class="btn btn-xs btn-rgp"> <span class="fa fa-eye"></span> </a>
                                                                <a href="<?php echo site_url('users/delete/' . $usr->entity_id); ?>" title="Delete user?" class="btn btn-xs btn-rgd"> <span class="fa fa-trash"></span> </a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
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