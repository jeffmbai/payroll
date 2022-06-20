<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                System Users
                <small>
                    System Users
                </small>
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php
                if(isset($_SESSION['alert'])) {
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daily active users </h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addUser">Add user</button>
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
                                <th>Name</th>
                                <th>Email </th>
                                <th>Phone </th>
                                <th>ID/ Passport </th>
                                <th>Store </th>
                                <th>Super user </th>
                                <th>Active </th>
                                <th class=" no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $c = 0;
                            foreach($all_users as $usr) {
                                $c++;
                                #skip me as the user logged in
                                if($usr->email != $_SESSION['username']) {
                                    ?>
                                    <tr class="even pointer">
                                        <td class="a-center ">
                                            <input type="checkbox" class="tableflat">
                                        </td>
                                        <td class=" "><?php echo $usr->firstname.' '.$usr->secondname.' '.$usr->lastname;?></td>
                                        <td class=" "><a href="mailto:<?php echo $usr->email;?>" target="_blank"> <?php echo $usr->email;?></a></td>
                                        <td class=" "><a href="tel:<?php echo $usr->phone;?>"><?php echo $usr->phone;?></a> <i class="success fa fa-phone"></i>
                                        </td>
                                        <td class=" "><?php echo $usr->id_passport;?></td>
                                        <td class=" "><?php echo $usr->org_name;?></td>
                                        <td class="a-right a-right ">
                                            <?php
                                                if($usr->super_user == 1) echo "True";
                                                else echo "False";
                                            ?>
                                        </td>
                                        <td class="a-right a-right ">
                                            <?php
                                                if($usr->active == 1) echo "True";
                                                else echo "False";
                                            ?>
                                        </td>
                                        <td class=" last"><a href="<?php echo site_url('sys/user_profile/'.$usr->entity_id);?>">View</a>
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
        </div>

        <br />
        <br />
        <br />

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New User</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="<?php echo site_url('user/register');?>" method="post">
                        <div class="col-md-6">
                            <label for="">First Name <span class="text text-danger">*</span> </label>
                            <input type="text" name="firstname" class="form-control" required />
                        </div>
                        <div class="col-md-6">
                            <label for="">Second Name <span class="text text-danger">*</span> </label>
                            <input type="text" name="secondname" class="form-control" required />
                        </div>
                        <div class="col-md-6">
                            <label for="">Last Name <span class="text text-danger">*</span> </label>
                            <input type="text" name="lastname" class="form-control" required />
                        </div>
                        <div class="col-md-6">
                            <label for="">Phone <span class="text text-danger">*</span> </label>
                            <input type="text" name="phone" class="form-control" required />
                        </div>
                        <div class="col-md-6">
                            <label for="">Email <span class="text text-danger">*</span> </label>
                            <input type="text" name="email" class="form-control" required />
                        </div>
                        <div class="col-md-6">
                            <label for="">ID/ Passport <span class="text text-danger">*</span> </label>
                            <input type="text" name="id_passport" class="form-control" required />
                        </div>
                        <div class="col-md-6">
                            <label for="">Gender <span class="text text-danger">*</span> </label>
                            <p>
                                M:<input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required />
                                F:<input type="radio" class="flat" name="gender" id="genderF" value="F" />
                            </p>
                        </div>
                        <div class="col-md-6">
                            <label for="">Date of birth <span class="text text-danger">*</span> </label>
                            <input type="date" class="form-control" required="required" name="dob" />
                        </div>
                        <div class="col-md-3">
                            <label> Super User </label>
                            <p>
                                <input type="checkbox" class="flat" value="1" name="super_user">
                            </p>
                        </div>
                        <div class="col-md-3">
                            <label> Active </label>
                            <p>
                                <input type="checkbox" class="flat" value="1" name="active">
                            </p>
                        </div>
                        <div class="col-md-6">
                            <label>Organization</label>
                            <select name="org" id="org" class="form-control" onchange="stations()" required >
                                <option value=""> Select Organization </option>
                                <?php
                                foreach($orgs as $org) {
                                    ?>
                                    <option value="<?php echo $org->org_id;?>"><?php echo $org->org_name;?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Station</label>
                            <select name="station" id="station" class="form-control" required >
                                <option value=""> Select Station </option>]
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>System Role</label>
                            <select name="system_role" class="form-control" required id="">
                                <option value=""> Select user role </option>
                                <?php
                                foreach($system_roles as $sr) {
                                    ?>
                                    <option value="<?php echo $sr->role_id;?>"><?php echo $sr->role_name;?></option>
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