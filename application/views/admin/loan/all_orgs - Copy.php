<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                Organizations
            </h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
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
                    <h2>Registered Organizations </h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addOrg">Add org</button>
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
                                <th>Organization Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Currency</th>
                                <th>Country</th>
                                <th>Active</th>
                                <th class=" no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $c = 0;
                            foreach($orgs as $org) {
                                $c++;
                                ?>
                                <tr class="even pointer">
                                        <td class="a-center ">
                                            <input type="checkbox" class="tableflat">
                                        </td>
                                        <td class=" "><?php echo $org->org_name;?></td>
                                        <td class=" "><?php echo $org->address;?></td>
                                        <td class=" "><?php echo $org->email;?></td>
                                        <td class=" "><?php echo $org->phone;?></td>
                                        <td class=" "><?php echo $org->currency_code;?></td>
                                        <td class=" "><?php echo $org->country_name;?></td>
                                        <td class="a-right a-right ">
                                            <?php
                                                if($org->org_active == 1) echo "True";
                                                else echo "False";
                                            ?>
                                        </td>
                                        <td class=" last">
                                            <a href="<?php #echo site_url('sys/store_profile/'.$org->org_id);?>"><span class="fa fa-eye"></span></a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="<?php echo site_url('delete/org/'.$org->org_id);?>" class="text text-danger"><span class="fa fa-trash"></span></a>
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

        <br />
        <br />
        <br />

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addOrg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Organization</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="<?php echo site_url('submitform/add_org');?>" method="post">
                        <div class="col-md-4">
                            <label for="">Store Name <span class="text text-danger">*</span> </label>
                            <input type="text" name="name" class="form-control" required />
                        </div>
                        <div class="col-md-4">
                            <label for="">Address <span class="text text-danger">*</span> </label>
                            <input type="text" name="address" class="form-control" required />
                        </div>
                        <div class="col-md-4">
                            <label for="">Email <span class="text text-danger">*</span> </label>
                            <input type="text" name="email" class="form-control" required />
                        </div>
                        <div class="col-md-4">
                            <label for="">Phone <span class="text text-danger">*</span> </label>
                            <input type="number" name="phone" class="form-control" required />
                        </div>
                        <div class="col-md-4">
                            <label for="">Country <span class="text text-danger">*</span> </label>
                            <select name="country" class="form-control" id="">
                                <option>Select country</option>
                                <?php
                                foreach($countries as $nchi) {
                                    ?>
                                    <option value="<?php echo $nchi->country_id; ?>"  <?php if($nchi->country_id == 1) echo "Selected";?>  > <?php echo $nchi->name?> </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Currency <span class="text text-danger">*</span> </label>
                            <select name="currency" class="form-control" id="">
                                <option>Select currency</option>
                                <?php
                                foreach($currencies as $sarafu) {
                                    ?>
                                    <option value="<?php echo $sarafu->currency_id; ?>"  <?php if($sarafu->currency_id == 1) echo "Selected";?>  > <?php echo $sarafu->currency_code;?> </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label> Active </label>
                            <p>
                                <input type="checkbox" class="flat" value="1" name="active">
                            </p>
                        </div> <div class="col-md-12">
                            <label for="">Narrative </label>
                            <textarea name="narrative" id="" class="form-control"></textarea>
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