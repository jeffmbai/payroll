<?php
foreach ($stock_details as $stk) {
    $stock_id = $stk->stock_id;
    $org_id = $stk->org_id;
    $org_name = $stk->org_name;
    $stock_name = $stk->stock_name;
    $stock_date = $stk->stock_date;
    $active = $stk->active;
    $narrative = $stk->narrative;
    $date_modified = $stk->date_modified;
    $time_stamp = $stk->time_stamp;
}
?>

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

                <?php if ($CI->permissions('general_add')) : ?>
                    <div class="col-md-5 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Stock details</h3>
                                <div class="card-tools">
                                    <a href="<?php echo site_url('stocks/home'); ?>" class="btn btn-sm btn-rgp">See stocks </a>
                                    <button class="btn btn-sm btn-rgs" data-toggle="modal" data-target="#addStockLine">Add Stock Line</button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-repsonsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Stock ID</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $stock_id; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Stock Name</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $stock_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Stock Date</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $stock_date; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Store</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $org_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Active</b></td>
                                                    <td class="rm_border_top bd_left"><?php if ($active == 1) echo '<span class="label label-success">Yes</span>';
                                                                                        else echo '<span class="label label-danger">No</span>'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Narrative</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $narrative; ?></td>
                                                </tr>
                                                <?php if ($_SESSION['superuser'] == 1 || $_SESSION['userrole'] == 1) : ?>
                                                    <tr>
                                                        <td class="rm_border_top pd_right"><b>Export</b></td>
                                                        <td class="rm_border_top bd_left">
                                                            <a href="<?php #echo site_url('stocks/generate_pdf/'.$stock_id)
                                                                        ?>" style="font-size: 20px; padding-right: 10px; color: red;" title="Export to PDF"><i class="fa fa-file-pdf-o"></i></a>
                                                            <a href="<?php echo site_url('stocks/generate_excel/' . $stock_id) ?>" class="text-success" style="font-size: 20px;" title="Export to Excel"><i class="fa fa-file-excel-o"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

                <?php if ($CI->permissions('general_view')) : ?>
                    <div class="col-md-7 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Stock Lines |<span style="color: green"> <?= $org_name ?></span></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="example1" class="table table-striped responsive-utilities">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Item Name</th>
                                                    <?php if ($_SESSION['superuser'] == 1 || $_SESSION['userrole'] == 1) : ?>
                                                        <th>System Qty<br /><small>(system generated)</small></th>
                                                        </th>
                                                    <?php endif; ?>
                                                    <th>Item Qty<br /><small>(manually inserted)</small></th>
                                                    </th>
                                                    <?php if ($_SESSION['superuser'] == 1 || $_SESSION['userrole'] == 1) : ?>
                                                        <th>Deviation <br /><small>(system - actual)</small></th>
                                                    <?php endif; ?>
                                                    <th>Active</th>
                                                    <th class=" no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($stock_lines as $dt) {
                                                    $deviation = $dt->system_quantity - $dt->item_quantity;
                                                    $c++;
                                                    $deviation = $dt->system_quantity - $dt->item_quantity;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td><?php echo $dt->item_name . ' - ' . $dt->barcode; ?></td>
                                                        <td><?php echo $dt->system_quantity; ?></td>
                                                        <td><?php echo $dt->item_quantity; ?></td>
                                                        <td>
                                                            <?php
                                                            if ($deviation < 0) echo '<span class="text-danger"><b>' . $deviation . '</b></span>';
                                                            else echo '<span class="text-success"><b>' . $deviation . '</b></span>';
                                                            ?>
                                                        </td>
                                                        <td class="a-right a-right ">
                                                            <?php
                                                            if ($dt->active == 1) echo '<i class="fa fa-check"></i>';
                                                            else echo '<i class="fa fa-close"></i>';
                                                            ?>
                                                        </td>
                                                        <td class=" last">
                                                            <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal<?php echo $dt->stock_line_id; ?>"> <span class="fa fa-edit"></span> </button>
                                                            <?php if ($_SESSION['superuser'] == 1 || $_SESSION['userrole'] == 1) : ?>
                                                                <a href="<?php echo site_url('stocks/delete_stock_line/' . $dt->stock_line_id); ?>" class="btn btn-xs btn-danger"> <span class="fa fa-trash"></span> </a>
                                                            <?php endif; ?>
                                                        </td>

                                                        <!-- Modal -->
                                                        <div id="myModal<?php echo $dt->stock_line_id; ?>" class="modal fade" role="dialog">
                                                            <div class="modal-dialog">

                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button> -->
                                                                        <h4 class="modal-title">Item Stock Details</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <form action="<?php echo site_url('stocks/update_stock_line/' . $dt->stock_line_id); ?>" method="post">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <label for="">Item <span class="text text-danger">*</span> </label>
                                                                                            <select name="item_id" class="select2 form-control" required tabindex="-1" style="width: 100%;">
                                                                                                <?php
                                                                                                foreach ($all_items as $item) {
                                                                                                    if ($item->item_id != $dt->item_id) continue;
                                                                                                ?>
                                                                                                    <option value="<?php echo $item->item_id; ?>" <?php if ($item->item_id == $dt->item_id) echo "selected"; ?>> <?php echo $item->item_name . ' - ' . $item->barcode; ?> </option>
                                                                                                <?php
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>

                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <label for="">Item Quantity <span class="text text-danger">*</span> </label>
                                                                                            <input type="number" name="item_quantity" class="form-control" required value="<?php echo $dt->item_quantity; ?>" />
                                                                                        </div>

                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <label> Active </label>
                                                                                            <p>
                                                                                                <input type="checkbox" value="1" name="active" <?php if ($dt->active == 1) echo "checked"; ?>>
                                                                                            </p>
                                                                                        </div>

                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <label for="">Narrative </label>
                                                                                            <textarea name="narrative" id="" class="form-control"> <?php echo $dt->narrative; ?> </textarea>
                                                                                        </div>

                                                                                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                            <button type="Submit" class="btn btn-primary">Update</button>
                                                                                        </div>

                                                                                    </div>
                                                                                </form>
                                                                            </div>
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
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

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



<!-- Page Modals Start -->
<!-- Update Stock Modal -->
<div id="addStockLine" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button> -->
                <h4 class="modal-title">Item Details</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('stocks/new_stock_line/' . $stock_id); ?>" method="post">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <label for="">Item <span class="text text-danger">*</span> </label>
                            <select name="item_id" class="select2 form-control" required tabindex="-1" style="width: 100%;">
                                <option value="">~Select Item~</option>
                                <?php
                                foreach ($all_items as $item) {
                                ?>
                                    <option value="<?php echo $item->item_id; ?>"> <?php echo $item->item_name . ' - ' . $item->barcode; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <label for="">Item Quantity <span class="text text-danger">*</span> </label>
                            <input type="number" name="item_quantity" class="form-control" required />
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <label> Active </label>
                            <p>
                                <input type="checkbox" class="flat" value="1" name="active">
                            </p>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <label for="">Narrative </label>
                            <textarea name="narrative" id="" class="form-control"> </textarea>
                        </div>

                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="Submit" class="btn btn-primary">Add</button>
                        </div>

                    </div>

                </form>
            </div>
            <div class="modal-footer"></div>
        </div>

    </div>
</div>