<?php
foreach ($department as $dpt) {
    $department_id = $dpt->department_id;
    $department_name = $dpt->department_name;
    $station_name = $dpt->station_name;
    $org_id = $dpt->org_id;
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
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo $department_name; ?> department</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSubDepartment">Add Sub-department</button>
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
                                                    <th>Sub Department Name</th>
                                                    <th>Station Name</th>
                                                    <th>Active</th>
                                                    <th class=" no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($sub_departments as $sub_department) {
                                                    $c++;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td class=" "><?php echo $sub_department->sub_department_name; ?></td>
                                                        <td class=" "><?php echo $sub_department->station_name; ?></td>
                                                        <td class="a-right a-right ">
                                                            <?php
                                                            if ($sub_department->active == 1) echo "True";
                                                            else echo "False";
                                                            ?>
                                                        </td>
                                                        <td class=" last">
                                                            <a href="#" class="btn btn-xs btn-rgp" data-toggle="modal" data-target="#editSubDepartment<?php echo $sub_department->sub_department_id; ?>"><span class="fa fa-edit"></span></a>
                                                            <a href="<?php echo site_url('departments/delete_sub_department/' . $sub_department->sub_department_id . '/' . $department_id); ?>" class="btn btn-xs btn-rgd"><span class="fa fa-trash"></span></a>
                                                        </td>

                                                        <div class="modal fade" id="editSubDepartment<?php echo $sub_department->sub_department_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                                                        <h4 class="modal-title" id="myModalLabel">Edit Department</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <form action="<?php echo site_url('departments/update_sub_department/' . $sub_department->sub_department_id . '/' . $department_id); ?>" method="post" enctype="multipart/form-data">

                                                                                <div class="col-md-12">
                                                                                    <label for="">Sub Department Name <span class="text text-danger">*</span> </label>
                                                                                    <input type="text" name="sub_department_name" class="form-control" value="<?php echo $sub_department->sub_department_name; ?>" required />
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <label> Active </label>
                                                                                    <p>
                                                                                        <input type="checkbox" <?php if ($sub_department->active == 1) echo "checked"; ?> value="1" name="active">
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <label for="">Narrative </label>
                                                                                    <textarea name="narrative" id="" class="form-control"><?php echo $sub_department->narrative; ?></textarea>
                                                                                </div>

                                                                                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                    <button type="Submit" class="btn btn-primary pull-right">Update</button>
                                                                                </div>
                                                                            </form>
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


<!-- Modal -->
<div class="modal fade" id="addSubDepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                <h4 class="modal-title" id="myModalLabel">New Department</h4>
            </div>
            <div class="modal-body">

                <form action="<?php echo site_url('departments/add_sub_department/' . $department_id . '/' . $org_id); ?>" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Sub Department Name <span class="text text-danger">*</span> </label>
                            <input type="text" name="sub_department_name" class="form-control" required />
                        </div>
                        <div class="col-md-12">
                            <label> Active </label>
                            <p>
                                <input type="checkbox" class="" value="1" name="active">
                            </p>
                        </div>
                        <div class="col-md-12">
                            <label for="">Narrative </label>
                            <textarea name="narrative" id="" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="Submit" class="btn btn-primary pull-right">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>