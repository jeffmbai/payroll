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

                <div class="col-md-4 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Item Request</h3>
                            <div class="card-tools">
                                <a href="<?php echo site_url('sys/move_stock'); ?>" class="btn btn-xs btn-rgp">Move Stock</a>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?php echo site_url('business/add_item_request'); ?>" method="post">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="">Requesting from <span class="text text-danger">*</span> </label>
                                        <select name="store_id" id="storeid" onchange="get_store_items()" class="select2 form-control" tabindex="-1" required>
                                            <option value="">Select store</option>
                                            <?php
                                            foreach ($orgs as $fstore) {
                                                if ($fstore->parent_org == null) continue; //this is not for the parent
                                            ?>
                                                <option value="<?php echo $fstore->org_id; ?>"> <?php echo $fstore->org_name; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <label for="">Item <span class="text text-danger">*</span> </label>
                                        <select class="select2 form-control" name="item_store_id" id="store_items" required>
                                            <option value="">Select item</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <label for="">Quantity <span class="text text-danger">*</span> </label>
                                        <input type="number" class="form-control" name="qty" required />
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <label for="">Date <span class="text text-danger">*</span> </label>
                                        <input type="date" class="form-control" name="request_date" value="<?= date('Y-m-d') ?>" required />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Narrative </label>
                                        <textarea name="narrative" id="" class="form-control"></textarea>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                        <button type="Submit" class="btn btn-primary">Request</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.card-body -->
                    </div>

                </div>

                <div class="col-md-8 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Requested Items/Products </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th>Item</th>
                                                <th>Store</th>
                                                <th>Qty</th>
                                                <th>Request person</th>
                                                <th>Approved by </th>
                                                <th>Narrative </th>
                                                <th>Status </th>
                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $c = 0;
                                            foreach ($item_request_list as $dt) {
                                                $c++;

                                            ?>
                                                <tr class="even pointer">
                                                    <td class=" "><?php echo $dt->item_name . ' - ' . $dt->barcode; ?></td>
                                                    <td class=" "><?php echo $dt->org_name; ?></td>
                                                    <td class=" "><?php echo $dt->qty; ?></td>
                                                    <td class=" "><?php echo $dt->requested_by; ?></td>
                                                    <td class=" "><?php echo $dt->approved_by; ?></td>
                                                    <td class=" "><?php echo $dt->narrative; ?></td>
                                                    <td class="a-right a-right ">
                                                        <?php
                                                        if ($dt->active == 1) echo "Approved";
                                                        else echo "Not Approved";
                                                        ?>
                                                    </td>
                                                    <td class=" last">
                                                        <?php
                                                        if ($_SESSION['superuser'] == 1) {
                                                        ?> <button type="button" data-toggle="modal" data-target="#editModal<?php echo $dt->item_request_id; ?>" class="btn btn-rgs btn-xs" title="Approve Request"> <span class="fa fa-check"></span> </button> <?php
                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                if ($_SESSION['userid'] == $dt->entity_id && $dt->active != 1) {
                                                                                                                                                                                                                                                                    ?>
                                                            <a class="btn btn-rgd btn-xs" href="<?php echo site_url('business/delete_itemrequest/' . $dt->item_request_id); ?>" title="Delete Request"> <span class="fa fa-trash"></span> </a>
                                                        <?php
                                                                                                                                                                                                                                                                }
                                                        ?>
                                                    </td>

                                                </tr>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editModal<?php echo $dt->item_request_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <p style="text-align: center; font-size: 20px;"> Are you sure you want to approve this request? </p>
                                                                    <div class="col-md-12" style="padding-top: 15px; margin-top: 15px; text-align: center">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                                        <a href="<?php echo site_url('business/approve_item_request/' . $dt->item_request_id); ?>" name="yes" class="btn btn-primary">Yes</a>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                        </div><!-- /.card-body -->
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