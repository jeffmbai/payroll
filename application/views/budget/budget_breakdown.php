<?php
foreach ($this_budget as $dt) {
$budget_id = $dt->budget_id;
$org_id = $dt->org_id;
$org_name = $dt->org_name;
$budget_type = $dt->budget_type;
$fiscal_year_id = $dt->fiscal_year_id;
$fiscal_year_name = $dt->fiscal_year_name;
$start_date = $dt->start_date;
$end_date = $dt->end_date;
$budget_total_amount = $dt->budget_total_amount;
$budget_code = $dt->budget_code;
$active = $dt->active;
$narrative = $dt->narrative;
$date_modified = $dt->date_modified;
$time_stamp = $dt->time_stamp;
}
?>

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                Budget Details
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="row">
                <div class="col-md-5">
                    <?php
                    if (isset($_SESSION['alert'])) {
                        echo $_SESSION['alert'];
                        unset($_SESSION['alert']);
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="col-md-5 col-sm-5 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Budget details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <a href="<?php echo site_url('budget/index');?>" class="btn btn-primary btn-xs">See Budgets </a>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-repsonsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Budget ID</b></td>
                                    <td class="rm_border_top bd_left"><?php echo $budget_id; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b> Budget Code</b></td>
                                    <td class="rm_border_top bd_left"><?php echo $budget_code; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b> Budget Type</b></td>
                                    <td class="rm_border_top bd_left"><span class="label label-default"><?php echo $budget_type; ?></span></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Budget Amount</b></td>
                                    <td class="rm_border_top bd_left"><?php echo 'Shs ' . number_format($budget_total_amount, 2); ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Fiscal Year</b></td>
                                    <td class="rm_border_top bd_left"><?php echo $fiscal_year_name.'<br><small>'.$start_date.' to '.$end_date.'</small>'; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Narrative</b></td>
                                    <td class="rm_border_top bd_left"><?php echo $narrative; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Org Name</b></td>
                                    <td class="rm_border_top bd_left"><?php echo $org_name; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7 col-sm-7 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Budget breakdown</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="<?php echo site_url('budget/add_budget_breakdown/'.$budget_id);?>" method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label for="">Vote Head <span class="text text-danger">*</span> </label>
                                <select name="vote_head_id" class="select2 form-control" required tabindex="-1" >
                                    <option value="">~Select Vote Head~</option>
                                    <?php
                                        foreach($vote_heads as $vh){
                                            ?>
                                            <option value="<?php echo $vh->vote_head_id;?>"  > <?php echo $vh->vote_head_name;?> </option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="">Amount <span class="text text-danger">*</span> </label>
                                <input type="number" name="budget_amount" class="form-control" required  />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label> Active </label>
                                <p>
                                    <input type="checkbox" class="flat" value="1" name="active"  >
                                </p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label for="">Narrative </label>
                                <textarea name="narrative" id="" class="form-control"> </textarea>
                            </div>
                        </div>

                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                            <button type="Submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <br />

    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
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
                                <th>Budget Amount <small>(Shs)</small></th>
                                <th>Year</th>
                                <th>Vote Head</th>
                                <th>Amount <small>(Shs)</small></th>
                                <th>Narrative</th>
                                <th>Status </th>
                                <th class=" no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $c = 0; $totals = 0;
                            foreach($budget_breakdown as $dt) {
                                $c++;
                                $totals += $dt->budget_amount;
                                ?>
                                    <tr class="even pointer">
                                        <td><?php echo number_format($dt->budget_total_amount, 2);?></td>
                                        <td><?php echo $dt->fiscal_year_name;?></td>
                                        <td><?php echo $dt->vote_head_name;?></td>
                                        <td><?php echo number_format($dt->budget_amount, 2);?></td>
                                        <td><?php echo $dt->narrative;?></td>
                                        <td>
                                            <?php if($dt->active == 1) echo "Active"; else echo "Inactive";?>
                                        </td>
                                        <td class=" last">
                                            <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal<?php echo $dt->budget_breakdown_id;?>"> <span class="fa fa-edit"></span> </button>
                                            <a href="<?php echo site_url('budget/delete_breakdown/'.$dt->budget_breakdown_id.'/'.$budget_id);?>" class="btn btn-xs btn-danger"> <span class="fa fa-trash"></span> </a>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div id="myModal<?php echo $dt->budget_breakdown_id;?>" class="modal fade" role="dialog">
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
                                                            <form action="<?php echo site_url('budget/update_budget_breakdown/'.$dt->budget_breakdown_id.'/'.$budget_id);?>" method="post">   

                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <label for="">Vote Head <span class="text text-danger">*</span> </label>
                                                                        <select name="vote_head_id" class="select2 form-control" required tabindex="-1" >
                                                                            <option value="">~Select Vote Head~</option>
                                                                            <?php
                                                                                foreach($vote_heads as $vh){
                                                                                    ?>
                                                                                    <option value="<?php echo $vh->vote_head_id;?>"  <?php if($vh->vote_head_id == $dt->vote_head_id) echo "selected";?>  > <?php echo $vh->vote_head_name;?> </option>
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <label for="">Amount <span class="text text-danger">*</span> </label>
                                                                        <input type="number" name="budget_amount" class="form-control" value="<?php echo $dt->budget_amount;?>" required  />
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

                        <tfoot>
                            <tr>
                                <th colspan="6">TOTAL</th>
                                <th>
                                    <?php
                                        if($totals > $budget_total_amount) echo '<span class="text text-danger"><i class="fa fa-warning"></i> '.number_format($totals, 2).'</span>';
                                        elseif($totals < $budget_total_amount) echo '<span class="text text-warning"><i class="fa fa-warning"></i> '.number_format($totals, 2).'</span>';
                                        elseif($totals == $budget_total_amount) echo '<span class="text text-success"><i class="fa fa-info-circle"></i> '.number_format($totals, 2).'</span>';
                                    ?>
                                </th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>



</div>
