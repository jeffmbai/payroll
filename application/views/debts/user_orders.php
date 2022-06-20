<?php
    foreach($this_user as $user) {
        $name = $user->firstname.' '.$user->secondname.' '.$user->lastname;
        $id_passport = $user->id_passport;
        $email = $user->email;
        $phone = $user->phone;
        $gender = $user->gender;
        $dob = $user->dob;
        $address = $user->address;
        $role_name = $user->role_name;
        $profile_picture = $user->profile_picture;
    }
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?php echo $role_name;?> Orders</h3>
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
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>User Details</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <img src="<?php echo base_url('assets/images/profile/'.$profile_picture);?>" height="100px" />
                        </div>
                        <div class="col-md-3 col-xs-6" style="border-left: 5px solid #017870;">
                            Name: <?php echo $name;?> <br/>
                            Phone: <?php echo $phone;?> <br/>
                            Email: <?php echo $email;?> <br/>
                            Address: <?php echo $address;?>
                        </div>
                        <div class="col-md-3 col-xs-6" style="border-left: 5px solid #017870;">
                            <h4><b>Debts</b></h4>
                            <?php
                                foreach($user_debt as $userD) {
                                    echo '
                                        <div class="">
                                            <strong>'.$userD->bill_no.'</strong>
                                            <span class="pull-right">'.$userD->paying_balance.'</span>
                                        </div>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <div class="x_panel">
                <div class="x_title">
                    <h2>Orders Table</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>Bill No</th>
                                <th>Date</th>
                                <th>T.Type</th>
                                <th>Net Amount</th>
                                <th>Paid Amount</th>
                                <th>Balance</th>
                                <th>Payment Status</th>
                                <th class=" no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody id="orders">
                            <?php
                            $c = 0;
                            foreach($user_orders as $dt) {
                                #if($dt->transaction_type_id == 2 || $dt->transaction_type_id == 4) continue;
                                $c++;
                                ?>
                                <tr class="even pointer">
                                        <td class=" "><?php echo $dt->bill_no;?></td>
                                        <td class=" "><?php echo $dt->date_time;?></td>
                                        <td class=" "><?php echo $dt->transaction_type_name;?></td>
                                        <td class=" "><?php echo $dt->net_amount;?></td>
                                        <td class=" "><?php echo $dt->paid_amount;?></td>
                                        <td class=" "><?php echo $dt->paying_balance;?></td>
                                        <td class="a-right a-right ">
                                            <?php
                                                if($dt->paid_status == 1) echo "Paid";
                                                elseif($dt->paid_status == 0) echo "Pending";
                                                elseif($dt->paid_status == 2) echo "Cancelled";
                                            ?>
                                        </td>
                                        <td class=" last">
                                            <a href="<?php echo site_url('business/sale_profile/'.$dt->order_id);?>" class="btn btn-xs btn-info"><span class="fa fa-eye"></span></a>
                                            <a href="<?php echo site_url('delete/order/'.$dt->order_id);?>" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
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