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

                <div class="col-md-8 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Form</h3>
                            <div class="card-tools">
                                <a href="<?php echo site_url('sys/item_stock'); ?>" class="btn btn-xs btn-rgp" style="color: black;">Stock Items Summary </a>
                                <a href="<?php echo site_url('business/item_request'); ?>" class="btn btn-xs btn-rgp" style="color: black;">Item Requests </a>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?php echo site_url('stocks/move_stock'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">From Store <span class="text text-danger">*</span> </label>
                                        <select name="org_id1" id="org_id1" onchange="get_items3()" class="select2 form-control" tabindex="-1" required>
                                            <option value="">Select store</option>
                                            <?php
                                            foreach ($all_stores as $fstore) {
                                                if ($fstore->parent_org == null) continue; //this is not for the parent
                                            ?>
                                                <option value="<?php echo $fstore->org_id; ?>"> <?php echo $fstore->org_name; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">To Store <span class="text text-danger">*</span> </label>
                                        <select name="org_id2" id="org_id2" onchange="get_items4()" class="select2 form-control" required tabindex="-1" required>
                                            <option value="">Select store</option>
                                            <?php
                                            foreach ($all_stores as $tstore) {
                                                if ($tstore->parent_org == null) continue; //this is not for the parent
                                            ?>
                                                <option value="<?php echo $tstore->org_id; ?>"> <?php echo $tstore->org_name; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <hr />

                                <div class="row">
                                    <div class="col-md-12">
                                        <small class="text text info">Move the item here</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Item <span class="text text-danger">*</span> </label>
                                        <select name="item_id1" id="org_items2" class="select2 form-control" required>
                                            <option value="">Select item</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6" style="display: none;">
                                        <label for="">To Item</label>
                                        <select name="item_id2" id="org_items4" class="select2 form-control">
                                            <option value="">Select item</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Quantity <span class="text text-danger">*</span> </label>
                                        <input type="number" name="quantity" class="form-control" required />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                        <button type="Submit" class="btn btn-primary"><span class="fa fa-exchange"></span> Move</button>
                                    </div>
                                </div>

                            </form>
                        </div><!-- /.card-body -->
                    </div>

                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Check Availability</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Store <span class="text text-danger">*</span> </label>
                                        <select name="org_id3" onchange="get_items2()" id="org_id3" class="select2 form-control" required tabindex="-1">
                                            <option value="">Select store</option>
                                            <?php
                                            foreach ($all_stores as $store) {
                                            ?>
                                                <option value="<?php echo $store->org_id; ?>"> <?php echo $store->org_name; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Item <span class="text text-danger">*</span> </label>
                                        <select name="item_id" id="org_items3" onchange="get_item_quantity()" class="select2 form-control">
                                            <option value="">Select item</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Quantity <span class="text text-danger">*</span> </label>
                                        <input type="number" name="availability" id="availability" class="form-control" readonly />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <br />
                <br />
                <br />

            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->