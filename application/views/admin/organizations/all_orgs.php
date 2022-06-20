<?php
$CI = &get_instance();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><button class="pull-left backbtn" title="Back" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"> </i></button>
                        <?= $page ?></h1>
                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
                    if (isset($_SESSION['alert'])) {
                        echo $_SESSION['alert'];
                        unset($_SESSION['alert']);
                    }
                    ?>
                </div>
            </div>

            <div class="row">

                <?php if ($CI->permissions('general_view')) : ?>
                    <div class="col-md-7 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Settings</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('submitform/update_org/' . $org->org_id); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-6">
                                            <label for="">Organization Name <span class="text text-danger">*</span> </label>
                                            <input type="text" name="name" class="form-control" value="<?php echo $org->org_name; ?>" required />
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <label for="">Email <span class="text text-danger">*</span> </label>
                                            <input type="text" name="email" class="form-control" value="<?php echo $org->email; ?>" required />
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <label for="">Phone <span class="text text-danger">*</span> </label>
                                            <input type="number" name="phone" class="form-control" value="<?php echo $org->phone; ?>" required />
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <label for="">KRA Pin </label>
                                            <input type="text" maxlength="15" name="kra_pin" class="form-control" value="<?php echo $org->kra_pin; ?>" placeholder="PSJDJI22" />
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <label for="">V.A.T Number </label>
                                            <input type="text" maxlength="15" name="vat_no" class="form-control" value="<?php echo $org->vat_no; ?>" placeholder="PIUW78728" />
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <label for="">Box Number <span class="text text-danger">*</span> </label>
                                            <input type="text" name="box_number" class="form-control" value="<?php echo $org->box_number; ?>" required placeholder="P.O Box 22139-00100 GPO, Nairobi" />
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <label for="">Address <span class="text text-danger">*</span> </label>
                                            <input type="text" name="address" class="form-control" value="<?php echo $org->address; ?>" required />
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <label for="">Mpesa Details </label>
                                            <input type="text" name="mpesa_details" maxlength="100" class="form-control" value="<?php echo $org->mpesa_details; ?>" />
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <label for="">Country <span class="text text-danger">*</span> </label>
                                            <select name="country" class="select2 form-control" id="" style="width: 100%">
                                                <option>Select country</option>
                                                <?php
                                                foreach ($countries as $nchi) {
                                                ?>
                                                    <option value="<?php echo $nchi->country_id; ?>" <?php if ($nchi->country_id == $org->country_id) echo "Selected"; ?>> <?php echo $nchi->name ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <label for="">Currency <span class="text text-danger">*</span> </label>
                                            <select name="currency" class="select2 form-control" id="" style="width: 100%" required >
                                                <option value="" >Select currency</option>
                                                <?php
                                                foreach ($currencies as $sarafu) {
                                                ?>
                                                    <option value="<?php echo $sarafu->currency_id; ?>" <?php if ($sarafu->currency_id == $org->currency_id) echo "Selected"; ?>> <?php echo $sarafu->currency_code; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <label for="">Organization Type <span class="text text-danger">*</span> </label>
                                            <select name="organization_type" class="select2 form-control" required >
                                                <option value="" >Select type</option>
                                                <option value="Retail" <?=($org->organization_type == 'Retail') ? 'selected' : '' ?> >Retail Shop</option>
                                                <option value="Restaurant" <?=($org->organization_type == 'Restaurant') ? 'selected' : '' ?> >Restaurants or Bar</option>
                                                <option value="Other" <?=($org->organization_type == 'Other') ? 'selected' : '' ?> >Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <label> Active </label>
                                            <p>
                                                <input type="checkbox" value="1" name="active" <?php if ($org->org_active == 1) echo "checked"; ?>>
                                            </p>
                                        </div>

                                        <div class="col-md-6 col-xs-6">
                                            <label> POS Mode </label>
                                            <p>
                                                Tablet Mode: <input type="radio" value="0" name="pos_mode" <?php if ($org->pos_mode == 0) echo "checked"; ?> >
                                                Desktop Mode: <input type="radio" value="1" name="pos_mode" <?php if ($org->pos_mode == 1) echo "checked"; ?> >
                                            </p>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label for="">Narrative </label>
                                            <textarea name="narrative" id="" class="form-control"><?php echo $org->org_narrative; ?></textarea>
                                        </div>
                                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="Submit" class="btn btn-primary pull-right">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->