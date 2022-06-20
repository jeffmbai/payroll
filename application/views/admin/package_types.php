<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                Package Types
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-5">
            <?php
                if(isset($_SESSION['alert'])) {
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?>
        </div>
    </div>

    <div class="row">

        <div class="col-md-5 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Register Package Type </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <form action="<?php echo site_url('submitform/add_package_type');?>" method="post">
                            <div class="col-md-12">
                                <label for="">Package Type Name <span class="text text-danger">*</span> </label>
                                <input type="text" name="package_type_name" class="form-control" required />
                            </div>
                            <div class="col-md-3">
                                <label> Active </label>
                                <p>
                                    <input type="checkbox" class="flat" value="1" name="active">
                                </p>
                            </div> <div class="col-md-12">
                                <label for="">Narrative </label>
                                <textarea name="narrative" id="" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                <button type="Submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Registered Package Types </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>Name</th>
                                <th>Narrative </th>
                                <th>Active </th>
                                <th class=" no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $c = 0;
                            foreach($package_types as $dt) {
                                $c++;
                                ?>
                                <tr class="even pointer">
                                        <td class=" "><?php echo $dt->package_type_name;?></td>
                                        <td class=" "><?php echo $dt->narrative;?></td>
                                        <td class="a-right a-right ">
                                            <?php
                                                if($dt->active == 1) echo "True";
                                                else echo "False";
                                            ?>
                                        </td>
                                        <td class=" last">
                                            <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $dt->package_type_id;?>"> <span class="fa fa-pencil"></span> </button>
                                            <a href="<?php echo site_url('delete/package_type/'.$dt->package_type_id);?>" class="btn btn-xs btn-danger"><span class="fa fa-close"></span></a>
                                        </td>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal<?php echo $dt->package_type_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Details</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <form action="<?php echo site_url('submitform/update_package_type/'.$dt->package_type_id);?>" method="post">
                                                                <div class="col-md-12">
                                                                    <label for="">Brand Name <span class="text text-danger">*</span> </label>
                                                                    <input type="text" name="package_type_name" class="form-control" value="<?php echo $dt->package_type_name;?>" required />
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label> Active </label>
                                                                    <p>
                                                                        <input type="checkbox" class="" value="1" name="active" <?php if($dt->active == 1) echo "checked";?> >
                                                                    </p>
                                                                </div> <div class="col-md-12">
                                                                    <label for="">Narrative </label>
                                                                    <textarea name="narrative" id="" class="form-control"><?php echo $dt->narrative;?></textarea>
                                                                </div>
                                                                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    <button type="Submit" class="btn btn-primary">Update</button>
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
