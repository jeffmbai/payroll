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
                                <form action="<?php echo site_url('submitform/add_eating_table'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12" hidden>
                                            <label for="">Org Name <span class="text text-danger">*</span> </label>
                                            <select class="select2 form-control" name="org_id" id="" required>
                                                <option value="">~Select org~</option>
                                                <?php
                                                foreach ($all_orgs as $org) {
                                                ?>
                                                    <option value="<?php echo $org->org_id; ?>" <?php if($org->org_id == 1) echo 'selected';?> > <?php echo $org->org_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Table name <span class="text text-danger">*</span> </label>
                                            <input type="text" name="eating_table_name" class="form-control" required />
                                        </div>
                                        <div class="col-md-3">
                                            <label> Active </label>
                                            <p>
                                                <input type="checkbox" class="flat" value="1" name="active">
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Narrative </label>
                                            <textarea name="narrative" id="" class="form-control"></textarea>
                                        </div>
                                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                            <button type="Submit" class="btn btn-primary">Save</button>
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
                                    <div class="col-md-12 table">
                                        <table id="example1" class="table table-striped table-condensed">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Table Name</th>
                                                    <!-- <th>Org</th> -->
                                                    <th>Narrative </th>
                                                    <th>Active </th>
                                                    <th class=" no-link last"><span class="nobr">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($all_eating_tables as $dt) {
                                                    $c++;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td><?php echo $dt->eating_table_name; ?></td>
                                                        <!-- <td><?php echo $dt->org_name; ?></td> -->
                                                        <td><?php echo $dt->narrative; ?></td>
                                                        <td class="a-right a-right ">
                                                            <?php
                                                            if ($dt->active == 1) echo "True";
                                                            else echo "False";
                                                            ?>
                                                        </td>
                                                        <td class=" last">
                                                            <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $dt->eating_table_id; ?>"> <span class="fa fa-pencil"></span> </button>
                                                            <a href="<?php echo site_url('delete/eating_table/' . $dt->eating_table_id); ?>" class="btn btn-xs btn-danger"><span class="fa fa-close"></span></a>
                                                        </td>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="myModal<?php echo $dt->eating_table_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Table Details</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?php echo site_url('submitform/update_eating_table/' . $dt->eating_table_id); ?>" method="post" >
                                                                            <div class="row">
                                                                                <div class="col-md-12" hidden>
                                                                                    <label for="">Org Name <span class="text text-danger">*</span> </label>
                                                                                    <select class="select2 form-control" name="org_id" id="" required style="width: 100%;">
                                                                                        <option value="">~Select org~</option>
                                                                                        <?php
                                                                                        foreach ($all_orgs as $org) {
                                                                                        ?>
                                                                                            <option value="<?php echo $org->org_id; ?>" <?php if ($org->org_id == 1) echo "selected"; ?>> <?php echo $org->org_name; ?> </option>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <label for="">Table Name <span class="text text-danger">*</span> </label>
                                                                                    <input type="text" name="eating_table_name" class="form-control" value="<?php echo $dt->eating_table_name; ?>" required />
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label> Active </label>
                                                                                    <p>
                                                                                        <input type="checkbox" class="" value="1" name="active" <?php if ($dt->active == 1) echo "checked"; ?>>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <label for="">Narrative </label>
                                                                                    <textarea name="narrative" id="" class="form-control"><?php echo $dt->narrative; ?></textarea>
                                                                                </div>
                                                                                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                    <button type="Submit" class="btn btn-primary pull-right">Update</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
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