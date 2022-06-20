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
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('submitform/add_fiscal_year'); ?>" method="post">

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="">Organization <span class="text text-danger">*</span> </label>
                                            <select name="org_id" class="select2_single form-control" required tabindex="-1">
                                                <option value=""> ~Select Org~ </option>
                                                <?php
                                                foreach ($orgs as $org) {
                                                    echo '<option value="' . $org->org_id . '"> ' . $org->org_name . ' </option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="">Fiscal Year Name <span class="text text-danger">*</span> </label>
                                            <input type="text" name="fiscal_year_name" class="form-control" required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="">Start Date <span class="text text-danger">*</span> </label>
                                            <input type="date" name="start_date" class="form-control" required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="">End Date <span class="text text-danger">*</span> </label>
                                            <input type="date" name="end_date" class="form-control" required />
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
                                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Year</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>Status </th>
                                                    <th>Time_Stamp </th>
                                                    <th class=" no-link last"><span class="nobr">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($fiscal_years as $dt) {
                                                    $c++;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td><?php echo $dt->fiscal_year_name; ?></td>
                                                        <td><?php echo $dt->start_date; ?></td>
                                                        <td><?php echo $dt->end_date; ?></td>
                                                        <td>
                                                            <?php if ($dt->active == 1) echo "Active";
                                                            else echo "Inactive"; ?>
                                                        </td>
                                                        <td><?php echo $dt->time_stamp; ?></td>
                                                        <td class=" last">
                                                            <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal<?php echo $dt->fiscal_year_id; ?>"> <span class="fa fa-edit"></span> </button>
                                                            <a href="<?php echo site_url('delete/fiscal_year/' . $dt->fiscal_year_id); ?>" class="btn btn-xs btn-danger"> <span class="fa fa-trash"></span> </a>
                                                        </td>
                                                    </tr>

                                                    <!-- Modal -->
                                                    <div id="myModal<?php echo $dt->fiscal_year_id; ?>" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                                                    <h4 class="modal-title">Details</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <form action="<?php echo site_url('submitform/update_fiscal_year/' . $dt->fiscal_year_id); ?>" method="post">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12">
                                                                                        <label for="">Organization <span class="text text-danger">*</span> </label>
                                                                                        <select name="org_id" class="select2_single form-control" required tabindex="-1">
                                                                                            <option value=""> ~Select Org~ </option>
                                                                                            <?php
                                                                                            foreach ($orgs as $og) {
                                                                                            ?>
                                                                                                <option value="<?php echo $og->org_id; ?>" <?php if ($og->org_id == $dt->org_id) echo "selected"; ?>> <?php echo $og->org_name; ?> </option>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12">
                                                                                        <label for="">Fiscal Year Name <span class="text text-danger">*</span> </label>
                                                                                        <input type="text" name="fiscal_year_name" class="form-control" value="<?php echo $dt->fiscal_year_name; ?>" required />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12">
                                                                                        <label for="">Start Date <span class="text text-danger">*</span> </label>
                                                                                        <input type="date" name="start_date" class="form-control" value="<?php echo $dt->start_date; ?>" required />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12">
                                                                                        <label for="">End Date <span class="text text-danger">*</span> </label>
                                                                                        <input type="date" name="end_date" class="form-control" value="<?php echo $dt->end_date; ?>" required />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12">
                                                                                        <label> Active </label>
                                                                                        <p>
                                                                                            <input type="checkbox" value="1" <?php if ($dt->active == 1) echo "checked"; ?> name="active">
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
                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Update</button>
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


<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                Fiscal Year
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (isset($_SESSION['alert'])) {
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
                    <h2>New Fiscal Year </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                </div>
            </div>
        </div>

        <div class="col-md-7 col-sm-12 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Fiscal Years</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                </div>
            </div>


        </div>

        <br />
        <br />
        <br />

    </div>
</div>