<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                Payments
            </h3>
            <a href="<?php echo site_url('expense/home');?>" class="btn btn-info btn-xs"><span class="fa fa-plus"> Create Expense</span> </a>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12">
        <?php
            if(isset($_SESSION['alert'])) {
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }
        ?>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
                <div class="x_title">
                    <h2>New Payment </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: none;">
                    <form action="<?php echo site_url('expense/new_payment');?>" method="post">
                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                <label for="">Expense <span class="text text-danger">*</span>   <small class="text text-warning fa fa-info-circle"> Ensure you select the right expense</small> </label>
                                <select name="expense_id" class="select2 form-control" required tabindex="-1" >
                                    <option value="">~Select Expense~</option>
                                    <?php
                                        foreach($unsettled_expenses as $ex){
                                            ?>
                                            <option value="<?php echo $ex->expense_id;?>"> <?php echo $ex->paid_to.' | '.$ex->expense_balance.', [ '.$ex->expense_type_name.', '.$ex->vote_head_name.', '.$ex->expense_date.' ]';?> </option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="">Payment Mode <span class="text text-danger">*</span> </label>
                                <select name="payment_mode_id" class="select2 form-control" required tabindex="-1" >
                                    <option value="">~Select Payment Mode~</option>
                                    <?php
                                        foreach($payment_modes as $pm){
                                            ?>
                                            <option value="<?php echo $pm->payment_mode_id;?>"> <?php echo $pm->payment_mode_name;?> </option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                <label for="">Amount Paid <span class="text text-danger">*</span> </label>
                                <input type="number" name="payment_amount" class="form-control" required  />
                            </div>
                            
                            <div class="col-md-6 col-sm-6">
                                <label for="">Payment Date <span class="text text-danger">*</span> </label>
                                <input type="date" name="payment_date" class="form-control" value="<?php echo date('Y-m-d');?>" required  />
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                <label for="">Check No. </label>
                                <input type="text" name="check_no" class="form-control" placeholder="" />
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label> Active </label>
                                <p>
                                    <input type="checkbox" class="flat" value="1" checked name="active">
                                </p>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 col-sm-12">
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

        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <div class="x_panel">
                <div class="x_title">
                    <h2>List of payments</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>PaymentID</th>
                                <th>ExpenseID</th>
                                <th>P. Mode</th>
                                <th>P. Amount</th>
                                <th>Exp. Amount</th>                                
                                <th>Check No.</th>
                                <th>P. Date</th>
                                <th>Bal.</th>
                                <th>Status </th>
                                <th class=" no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $c = 0;
                            foreach($payments as $p) {
                                $c++;
                                ?>
                                    <tr class="even pointer">
                                        <td class=" "><?php echo $p->payment_id;?></td>
                                        <td class=" "><?php echo $p->expense_id;?></td>
                                        <td class=" "><?php echo $p->payment_mode_name;?></td>
                                        <td class=" "><?php echo $p->payment_amount;?></td>
                                        <td class=" "><?php echo $p->expense_amount;?></td>
                                        <td class=" "><?php echo $p->check_no;?></td>
                                        <td class=" "><?php echo $p->payment_date;?></td>                                        
                                        <th class=" "><?php echo $p->expense_amount - $p->payment_amount;?></th>
                                        <th class=" "><?php echo $p->status_name;?></th>
                                        <td class=" last">
                                            <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#myModal<?php echo $p->payment_id;?>" ><span class="fa fa-pencil"></span></button>
                                            <a href="<?php echo site_url('expense/print_payment/'.$p->payment_id);?>" target="_blank" class="btn btn-default btn-xs"><span class="fa fa-print"></span></a>
                                            <a href="<?php echo site_url('expense/delete_payment/'.$p->payment_id);?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                                        </td>
                                    </tr>

                                    <div id="myModal<?php echo $p->payment_id;?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                                    <h4 class="modal-title">Details</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form action="<?php echo site_url('expense/update_payment/'.$p->payment_id);?>" method="post">                         

                                                                <div class="row">

                                                                    <div class="col-md-6 col-sm-6">
                                                                        <label for="">Expense <span class="text text-danger">*</span>   <small class="text text-warning fa fa-info-circle"> Ensure you select the right expense</small> </label>
                                                                        <select name="expense_id" class="select2 form-control" required tabindex="-1" >
                                                                            <option value="<?php echo $p->expense_id;?>"> <?php echo $p->paid_to.' | '.$p->expense_amount;?> </option>
                                                                            <?php
                                                                                foreach($unsettled_expenses as $ex){
                                                                                    ?>
                                                                                    <option value="<?php echo $ex->expense_id;?>"  <?php if($ex->expense_id == $p->expense_id) echo "selected";?>  > <?php echo $ex->paid_to.' | '.$ex->expense_balance.', [ '.$ex->expense_type_name.', '.$ex->vote_head_name.', '.$ex->expense_date.' ]';?> </option>
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-6">
                                                                        <label for="">Payment Mode <span class="text text-danger">*</span> </label>
                                                                        <select name="payment_mode_id" class="select2 form-control" required tabindex="-1" >
                                                                            <option value="">~Select Payment Mode~</option>
                                                                            <?php
                                                                                foreach($payment_modes as $pm){
                                                                                    ?>
                                                                                    <option value="<?php echo $pm->payment_mode_id;?>"  <?php if($pm->payment_mode_id == $p->payment_mode_id) echo "selected";?>  > <?php echo $pm->payment_mode_name;?> </option>
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-6 col-sm-6">
                                                                        <label for="">Amount Paid <span class="text text-danger">*</span> </label>
                                                                        <input type="number" name="payment_amount" class="form-control" required value="<?php echo $p->payment_amount;?>" />
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-6">
                                                                        <label for="">Payment Date <span class="text text-danger">*</span> </label>
                                                                        <input type="date" name="payment_date" class="form-control" value="<?php echo date('Y-m-d');?>" required value="<?php echo $p->payment_date;?>"  />
                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-6 col-sm-6">
                                                                        <label for="">Check No. </label>
                                                                        <input type="text" name="check_no" class="form-control" placeholder="Name of individual/company/inst." value="<?php echo $p->check_no;?>" />
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-6">
                                                                        <label> Active </label>
                                                                        <p>
                                                                            <input type="checkbox" value="1" checked name="active" <?php if($p->active == 1) echo "checked";?> >
                                                                        </p>
                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-12 col-sm-12">
                                                                        <label for="">Narrative </label>
                                                                        <textarea name="narrative" id="" class="form-control"><?php echo $p->narrative;?></textarea>
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


