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
                                <h3 class="card-title">Form</h3>
                                <div class="card-tools">
                                    <a href="<?php echo site_url('sys/item_stock'); ?>" class="btn btn-sm btn-rgp" name="">Stock Summary Listing</a>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('stocks/new_stock'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="">Organization <span class="text text-danger">*</span> </label>
                                            <select name="org" class="select2 form-control" required tabindex="-1">
                                                <option value="">~Select Org~</option>
                                                <?php
                                                foreach ($all_orgs as $org) {
                                                ?>
                                                    <option value="<?php echo $org->org_id; ?>" <?php if ($org->org_id == 1) echo "selected"; ?>> <?php echo $org->org_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <label for="">Stock Name <span class="text text-danger">*</span> </label>
                                            <input type="text" name="stock_name" class="form-control" value="<?php echo 'Stock take as ' . date('d M Y') ?>" required />
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <label for="">Stock Date <span class="text text-danger">*</span> </label>
                                            <input type="date" name="stock_date" class="form-control" value="<?= date('Y-m-d') ?>" required />
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <label> Active </label>
                                            <p>
                                                <input type="checkbox" class="flat" value="1" name="active">
                                            </p>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <label for="">Narrative </label>
                                            <textarea name="narrative" id="" class="form-control"></textarea>
                                        </div>

                                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                            <button type="Submit" class="btn btn-primary">Add</button>
                                        </div>

                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

                <?php if ($CI->permissions('general_view')) : ?>
                    <div class="col-md-7 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">List</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="example1" class="table table-striped table-bordered table-hover table-condensed responsive-utilities">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Stock Name</th>
                                                    <th>Org</th>
                                                    <th>Stock Take Date</th>
                                                    <th class=" no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($stocks as $dt) {
                                                    $c++;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td class=" ">
                                                            <a href="<?php echo site_url('stocks/stock_details/' . $dt->stock_id); ?>"><?php echo $dt->stock_name; ?></a>
                                                        </td>
                                                        <td class=" "><?php echo $dt->org_name; ?></td>
                                                        <td class=" "><?php echo $dt->stock_date; ?></td>
                                                        <td class=" last">
                                                            <div class="dropdown">
                                                                <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                                    <span class="caret"></span></button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a href="<?php echo site_url('stocks/stock_details/' . $dt->stock_id); ?>"><span class="fa fa-eye"> View</span></a></li>
                                                                    <li><a href="" onclick="window.open('<?php echo site_url('stocks/stock_report/' . $dt->stock_id); ?>','stock','width=1000, height=1000')"><span class="fa fa-print"> Print</span></a></li>
                                                                    <li><a href="" data-toggle="modal" data-target="#stockModal<?php echo $dt->stock_id; ?>"><span class="fa fa-pencil"> Edit</span></a></li>
                                                                    <li><a href="<?php echo site_url('stocks/delete_stock/' . $dt->stock_id); ?>"><span class="fa fa-trash"> Delete</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </td>

                                                        <!-- Update Stock Modal -->
                                                        <div id="stockModal<?php echo $dt->stock_id; ?>" class="modal fade" role="dialog">
                                                            <div class="modal-dialog">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button> -->
                                                                        <h4 class="modal-title">Details</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <form action="<?php echo site_url('stocks/update_stock/' . $dt->stock_id); ?>" method="post">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <label for="">Organization <span class="text text-danger">*</span> </label>
                                                                                            <select name="org" class="select2 form-control" required tabindex="-1" style="width: 100%;">
                                                                                                <option value="">~Select Org~</option>
                                                                                                <?php
                                                                                                foreach ($all_orgs as $org) {
                                                                                                ?>
                                                                                                    <option value="<?php echo $org->org_id; ?>" <?php if ($org->org_id == $dt->org_id) echo "selected"; ?>> <?php echo $org->org_name; ?> </option>
                                                                                                <?php
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>

                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <label for="">Stock Name <span class="text text-danger">*</span> </label>
                                                                                            <input type="text" name="stock_name" class="form-control" required value="<?php echo $dt->stock_name; ?>" />
                                                                                        </div>

                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <label for="">Stock Date <span class="text text-danger">*</span> </label>
                                                                                            <input type="date" name="stock_date" class="form-control" required value="<?php echo $dt->stock_date; ?>" />
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
                                                                    <div class="modal-footer"></div>
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