<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                Budget
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12">
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
        </div>

        <div class="col-md-5 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>New Budget Year </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="<?php echo site_url('budget/add_budget');?>" method="post">
                        
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label for="">Organization <span class="text text-danger">*</span> </label>
                                <select name="org_id" class="select2 form-control" required tabindex="-1" >
                                    <option value=""> ~Select Org~ </option>
                                    <?php
                                        foreach($orgs as $org) {
                                            ?>
                                            <option value="<?php echo $org->org_id; ?>"  <?php if($org->org_id == 1) echo "selected";?>  > <?php echo $org->org_name; ?> </option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label for="">Fiscal Year <span class="text text-danger">*</span> </label>
                                <select name="fiscal_year_id" class="select2 form-control" required tabindex="-1" >
                                    <option value=""> ~Select Fiscal Year~ </option>
                                    <?php
                                        foreach($fiscal_years as $fs) {
                                            ?>
                                            <option value="<?php echo $fs->fiscal_year_id;?>" <?php if($fs->fiscal_year_name == date('Y')) echo "selected"; ?> > <?php echo $fs->fiscal_year_name;?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label for="">Budget Total Amount <span class="text text-danger">*</span> </label>
                                <input type="number" name="budget_total_amount" class="form-control" required  />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label for="">Budget Code </label>
                                <input type="text" name="budget_code" class="form-control"  />
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="">Budget Type <span class="text text-danger">*</span></label>
                                <select class="form-control" name="budget_type" required >
                                    <option value="">~Select budget type~</option>
                                    <option value="expenditure">Expenditure</option>
                                    <option value="income">Income</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label> Active </label>
                                <p>
                                    <input type="checkbox" class="flat" value="1" name="active">
                                </p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label for="">Narrative </label>
                                <textarea name="narrative" id="" class="form-control"></textarea>
                            </div>
                        </div> 

                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                            <button type="Submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-7 col-sm-12 col-xs-12">    

            <div class="x_panel">
                <div class="x_title">
                    <h2>Budgets</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>Budget Type</th>
                                <th>Year</th>
                                <th>Code</th>
                                <th>Amount</th>
                                <th>Status </th>
                                <th class=" no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $c = 0;
                            foreach($budgets as $dt) {
                                $c++;
                                ?>
                                    <tr class="even pointer">
                                        <td><?php echo $dt->budget_type;?></td>
                                        <td><?php echo $dt->fiscal_year_name;?></td>
                                        <td><?php echo $dt->budget_code;?></td>
                                        <td><?php echo number_format($dt->budget_total_amount, 2);?></td>
                                        <td>
                                            <?php if($dt->active == 1) echo "Active"; else echo "Inactive";?>
                                        </td>
                                        <td class=" last">
                                            <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal<?php echo $dt->budget_id;?>"> <span class="fa fa-edit"></span> </button>
                                            <a href="<?php echo site_url('budget/budget_breakdown/'.$dt->budget_id);?>" class="btn btn-xs btn-info"> <span class="fa fa-eye"></span> </a>
                                            <a href="<?php echo site_url('budget/delete/'.$dt->budget_id);?>" class="btn btn-xs btn-danger"> <span class="fa fa-trash"></span> </a>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div id="myModal<?php echo $dt->budget_id;?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                                    <h4 class="modal-title">Details</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form action="<?php echo site_url('budget/update_budget/'.$dt->budget_id);?>" method="post">                         
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <label for="">Organization <span class="text text-danger">*</span> </label>
                                                                        <select name="org_id" class="select2 form-control" required tabindex="-1" >
                                                                            <option value=""> ~Select Org~ </option>
                                                                            <?php
                                                                                foreach($orgs as $og) {
                                                                                    ?>
                                                                                    <option value="<?php echo $og->org_id;?>" <?php if($og->org_id == $dt->org_id) echo "selected";?> > <?php echo $og->org_name;?> </option>
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <label for="">Fiscal Year <span class="text text-danger">*</span> </label>
                                                                        <select name="fiscal_year_id" class="select2 form-control" required tabindex="-1" >
                                                                            <option value=""> ~Select Fiscal Year~ </option>
                                                                            <?php
                                                                                foreach($fiscal_years as $fs) {
                                                                                    ?>
                                                                                    <option value="<?php echo $fs->fiscal_year_id;?>" <?php if($fs->fiscal_year_id == $dt->fiscal_year_id) echo "selected"; ?> > <?php echo $fs->fiscal_year_name;?></option>
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <label for="">Budget Total Amount <span class="text text-danger">*</span> </label>
                                                                        <input type="number" name="budget_total_amount" class="form-control" value="<?php echo $dt->budget_total_amount;?>" required  />
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <label for="">Budget Code </label>
                                                                        <input type="text" name="budget_code" class="form-control" value="<?php echo $dt->budget_code;?>"  />
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <label for="">Budget Type <span class="text text-danger">*</span></label>
                                                                        <select class="form-control" name="budget_type" required >
                                                                            <option value="">~Select budget type~</option>
                                                                            <option value="expenditure" <?php if($dt->budget_type == 'expenditure') echo "selected";?> >Expenditure</option>
                                                                            <option value="income" <?php if($dt->budget_type == 'income') echo "selected";?> >Income</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <label> Active </label>
                                                                        <p>
                                                                            <input type="checkbox"  value="1" <?php if($dt->active == 1) echo "checked";?> name="active">
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <label for="">Narrative </label>
                                                                        <textarea name="narrative" id="" class="form-control"> <?php echo $dt->narrative;?> </textarea>
                                                                    </div>
                                                                </div> 

                                                                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
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
            
        </div>

        <br />
        <br />
        <br />

    </div>
</div>


