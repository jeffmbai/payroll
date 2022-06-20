<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?php echo $page;?></h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-5 col-sm-6 col-xs-10">
            <?php
                if(isset($_SESSION['alert'])) {
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
                    <h2>Register Role</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <form action="<?php echo site_url('submitform/add_role');?>" method="post">
                            <div class="col-md-12 col-xs-12 col-xs-12">
                                <label for="">Role Name <span class="text text-danger">*</span> </label>
                                <input type="text" name="role_name" class="form-control" required />
                            </div>
                            <div class="col-md-12 col-xs-12 col-xs-12">
                                <label> Active </label>
                                <p>
                                    <input type="checkbox" class="flat" value="1" name="active">
                                </p>
                            </div>
                            <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                <button type="Submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-8 col-sm-7 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Registered Roles </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="" class="table table-striped table-condensed responsive-utilities">
                        <thead>
                            <tr class="headings">
                                <th>ID</th>
                                <th>Role</th>
                                <th>Active</th>
                                <th class=" no-link last"><span class="nobr">Action</span> </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $c = 0;
                            foreach($system_roles as $dt) {
                                $c++;
                                ?>
                                <tr class="even pointer">
                                        <td class=" "><?php echo $dt->role_id;?></td>
                                        <td class=" "><?php echo $dt->role_name;?></td>
                                        <td class="a-right a-right ">
                                            <?php
                                                if($dt->active == 1) echo "True";
                                                else echo "False";
                                            ?>
                                        </td>
                                        <td class=" last">
                                            <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $dt->role_id;?>" ><span class="fa fa-pencil"></span></button>
                                            <a href="<?php #echo site_url('delete/role/'.$dt->role_id);?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                                        </td>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal<?php echo $dt->role_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Details</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <form action="<?php echo site_url('submitform/update_role/'.$dt->role_id);?>" method="post">
                                                                <div class="col-md-12 col-xs-12">
                                                                    <label for="">Role Name <span class="text text-danger">*</span> </label>
                                                                    <input type="text" name="role_name" class="form-control" value="<?php echo $dt->role_name;?>" required />
                                                                </div>
                                                                <div class="col-md-12 col-xs-12">
                                                                    <label> Active </label>
                                                                    <p>
                                                                        <input type="checkbox" value="1" name="active"  <?php if($dt->active == 1) echo "checked";?>  >
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    <button type="Submit" class="btn btn-primary">Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </tr>
                                <?php
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



