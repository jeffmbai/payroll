<?php
$org_id = null;
$name = null;
$address = null;
$email = null;
$phone = null;
$currency_id = null;
$currency_code = null;
$country_id = null;
$country_name = null;
$active = null;
$narrative = null;

foreach ($this_store as $duka) {
$org_id = $duka->org_id;
$parent_org = $duka->parent_org;
$name = $duka->org_name;
$address = $duka->address;
$phone = $duka->phone;
$email = $duka->email;
$currency_id = $duka->currency_id;
$currency_code = $duka->currency_code;
$country_id = $duka->country_id;
$country_name = $duka->country_name;
$active = $duka->org_active;
$narrative = $duka->org_narrative;
break;
}
?>

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
            <button class="pull-left backbtn" title="Back" style="border-radius: 10rem;border:white;font-size: 2rem;margin: 5px;padding-right: 3rem;color: #527cf2;background-color: transparent;" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true">  </i></button>
            Store Profile</h3>
            <script>
                function goBack() {
                window.history.back();
                }
            </script>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-!2 col-sm-12 col-xs-12">
            <?php
            if (isset($_SESSION['alert'])) {
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }
            ?>
        </div>
    </div>

    <div class="row">
        
        <div class="col-md-5 col-sm-5 col-xs-12" style="display: none;">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Store details</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-repsonsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Store Name</b></td>
                                    <td class="rm_border_top bd_left"><?php echo $name; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Address</b></td>
                                    <td class="rm_border_top bd_left"><?php echo $address; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Phone</b></td>
                                    <td class="rm_border_top bd_left"><?php echo $phone; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Email</b></td>
                                    <td class="rm_border_top bd_left"><?php echo $email; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Currency</b></td>
                                    <td class="rm_border_top bd_left"><?php echo $currency_code; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Country</b></td>
                                    <td class="rm_border_top bd_left"><?php echo $country_name; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Active</b></td>
                                    <td class="rm_border_top bd_left"><?php if($active == 1) echo "True"; else echo "False"; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b><b>Narrative</b></b></td>
                                    <td class="rm_border_top bd_left"><?php echo $narrative; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_title">
                    <a href="<?php echo site_url('sys/orders?str='.$org_id);?>" class="btn btn-primary">See Orders <small>(Purchases/Sales)</small> </a>
                    <div class="clearfix"></div>
                </div>
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                    <form action="<?php echo site_url('submitform/update_org/'.$org_id);?>" method="post">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <label for="">Parent Org <span class="text text-danger">*</span> </label>
                            <select class="select2 form-control" name="org_id" required>
                                <option value="">~Select parent org~</option>
                                <?php
                                    if($_SESSION['superuser'] == 1) {
                                        foreach($all_stores as $org) {
                                            ?>
                                            <option value="<?php echo $org->org_id?>" <?php if($org->org_id == $org_id) echo "selected";?> > <?php echo $org->org_name;?> </option>
                                            <?php
                                        }
                                    } else {
                                        foreach($all_stores as $org) {
                                            if($org->org_id != $_SESSION['orgid']) continue;
                                            ?>
                                            <option value="<?php echo $org->org_id?>" <?php if($org->org_id == $org_id) echo "selected";?> > <?php echo $org->org_name;?> </option>
                                            <?php
                                        }
                                    }
                                    
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <label for="">Store Name <span class="text text-danger">*</span> </label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name;?>" required />
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <label for="">Address <span class="text text-danger">*</span> </label>
                            <input type="text" name="address" class="form-control" value="<?php echo $address;?>" required />
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <label for="">Email <span class="text text-danger">*</span> </label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email;?>" required />
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <label for="">Phone <span class="text text-danger">*</span> </label>
                            <input type="number" name="phone" class="form-control" value="<?php echo $phone;?>" required />
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <label for="">Country <span class="text text-danger">*</span> </label>
                            <select name="country" class="select2 form-control" id="">
                                <option>Select country</option>
                                <?php
                                foreach($countries as $nchi) {
                                    ?>
                                    <option value="<?php echo $nchi->country_id; ?>"  <?php if($nchi->country_id == $country_id) echo "Selected";?>  > <?php echo $nchi->name?> </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <label for="">Currency <span class="text text-danger">*</span> </label>
                            <select name="currency" class="select2 form-control" id="">
                                <option>Select currency</option>
                                <?php
                                foreach($currencies as $sarafu) {
                                    ?>
                                    <option value="<?php echo $sarafu->currency_id; ?>"  <?php if($sarafu->currency_id == $currency_id) echo "Selected";?>  > <?php echo $sarafu->currency_code;?> </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <label> Active </label>
                            <p>
                                <input type="checkbox" class="flat" value="1" name="active" <?php if($active == 1) echo "checked";?>  >
                            </p>
                        </div> <div class="col-md-4 col-sm-6 col-xs-12">
                            <label for="">Narrative </label>
                            <textarea name="narrative" id="" class="form-control"> <?php if($narrative != '')echo $narrative;?> </textarea>
                        </div>
                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                            <button type="Submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <br />
        <br />

    </div>



</div>
