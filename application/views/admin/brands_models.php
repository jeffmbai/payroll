<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                Item Brands Models
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
                    <h2>Register a model </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                   <div class="row">
                        <form action="<?php echo site_url('submitform/add_brand_model');?>" method="post">
                            <div class="col-md-12 col-xs-12">
                                <label for="">Org Name <span class="text text-danger">*</span> </label>
                                <select class="select2 form-control" name="org_id" required >
                                    <option value=""> ~Select org/ business~ </option>
                                    <?php
                                        foreach($all_orgs as $org) {
                                            echo '<option value="'.$org->org_id.'"> '.$org->org_name.' </option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <label for="">Brand Name <span class="text text-danger">*</span> </label>
                                <select class="select2 form-control" name="brand_id" required >
                                    <option value=""> ~Select brand~ </option>
                                    <?php
                                        foreach($all_brands as $ab) {
                                            echo '<option value="'.$ab->brand_id.'"> '.$ab->brand_name.' </option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <label for="">Model Name <span class="text text-danger">*</span> </label>
                                <input type="text" class="form-control" name="model_name" required />
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <label for="">Reorder Level <span class="text text-danger">*</span> </label>
                                <input type="number" class="form-control" name="reorder_level" required />
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <label> Active </label>
                                <p>
                                    <input type="checkbox" class="flat" value="1" name="active">
                                </p>
                            </div> <div class="col-md-12 col-xs-12">
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
                    <h2>Registered Brands </h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addBrand">Add brand</button>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>Model</th>
                                <th>Brand</th>
                                <th>Reorder Lvl</th>
                                <th>Narrative </th>
                                <th>Active </th>
                                <th class=" no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $c = 0;
                            foreach($brand_models as $dt) {
                                $c++;
                                ?>
                                <tr class="even pointer">
                                        <td class=" "><?php echo $dt->model_name;?></td>
                                        <td class=" "><?php echo $dt->brand_name;?></td>
                                        <td class=" "><?php echo $dt->reorder_level;?></td>
                                        <td class=" "><?php echo $dt->narrative;?></td>
                                        <td class="a-right a-right ">
                                            <?php
                                                if($dt->active == 1) echo "True";
                                                else echo "False";
                                            ?>
                                        </td>
                                        <td class=" last">
                                            <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#myModal<?php echo $dt->brand_model_id;?>" ><span class="fa fa-pencil"></span></button>
                                            <a href="<?php echo site_url('delete/brand_model/'.$dt->brand_model_id);?>" class="btn btn-xs btn-danger"><span class="fa fa-close"></span></a>
                                        </td>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal<?php echo $dt->brand_model_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Details</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <form action="<?php echo site_url('submitform/update_brand_model/'.$dt->brand_model_id);?>" method="post">
                                                                <div class="col-md-12 col-xs-12">
                                                                    <label for="">Org Name <span class="text text-danger">*</span> </label>
                                                                    <select class="select2 form-control" name="org_id" required style="width: 100%" >
                                                                        <option value=""> ~Select org/ business~ </option>
                                                                        <?php
                                                                            foreach($all_orgs as $org) {
                                                                                ?>
                                                                                <option value="<?php echo $org->org_id;?>"  <?php if($dt->org_id == $org->org_id) echo "selected";?>  > <?php echo $ab->brand_name;?> </option>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-xs-12">
                                                                    <label for="">Brand Name <span class="text text-danger">*</span> </label>
                                                                    <select class="select2 form-control" name="brand_id" required style="width: 100%" >
                                                                        <option value=""> ~Select brand~ </option>
                                                                        <?php
                                                                            foreach($all_brands as $ab) {
                                                                                ?>
                                                                                <option value="<?php echo $ab->brand_id;?>"  <?php if($dt->brand_id == $ab->brand_id) echo "selected";?>  > <?php echo $ab->brand_name;?> </option>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="">Model Name <span class="text text-danger">*</span> </label>
                                                                    <input type="text" name="model_name" class="form-control" required  value="<?php echo $dt->model_name;?>" />
                                                                </div>
                                                                <div class="col-md-12 col-xs-12">
                                                                    <label for="">Reorder Level <span class="text text-danger">*</span> </label>
                                                                    <input type="number" class="form-control" name="reorder_level" required value="<?php echo $dt->reorder_level;?>" />
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

