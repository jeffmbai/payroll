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

                                <form action="<?php echo site_url('departments/add_department'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Organization <span class="text text-danger">*</span> </label>
                                            <select name="org" class="select2 form-control" id="orgid" style="width: 100%" id="org" onchange="get_stations(this)" required>
                                                <option value="">Select organization</option>
                                                <?php
                                                foreach ($orgs as $org) {
                                                ?>
                                                    <option value="<?php echo $org->org_id; ?>"> <?php echo $org->org_name ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Station <span class="text text-danger">*</span> </label>
                                            <select name="station" class="select2 form-control" id="station" style="width: 100%" required>
                                                <option value="">Select station</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Name <span class="text text-danger">*</span> </label>
                                            <input type="text" name="department_name" class="form-control" required />
                                        </div>
                                        <div class="col-md-12">
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
                                    <div class="col-md-12 table-responsive">
                                        <table id="example1" class="table table-striped responsive-utilities">
                                            <thead>
                                                <tr>
                                                    <th>Department Name</th>
                                                    <th>Station Name</th>
                                                    <th>Active</th>
                                                    <th class=" no-link last"><span class="nobr">Action</span> </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($departments as $department) {
                                                    $c++;
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $department->department_name; ?> </br>
                                                            <small><a href="<?php echo site_url('departments/sub_departments/' . $department->department_id); ?>">Sub Departments</a> |
                                                                <a href="<?php echo site_url('departments/departmental_heads/' . $department->department_id); ?>">Heads</a>
                                                            </small>
                                                        </td>
                                                        <td><?php echo $department->station_name; ?></td>
                                                        <td class="a-right a-right ">
                                                            <?php
                                                            if ($department->active == 1) echo "True";
                                                            else echo "False";
                                                            ?>
                                                        </td>
                                                        <td class=" last">
                                                            <a href="#" class="btn btn-xs btn-rgp" data-toggle="modal" data-target="#editDepartment<?php echo $department->department_id; ?>"><span class="fa fa-edit"></span></a>
                                                            <a href="<?php echo site_url('department/delete/' . $department->department_id); ?>" class="btn btn-xs btn-rgd"><span class="fa fa-trash"></span></a>
                                                        </td>

                                                        <div class="modal fade" id="editDepartment<?php echo $department->department_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Edit Department</h4>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <form action="<?php echo site_url('departments/update_department/' . $department->department_id); ?>" method="post" enctype="multipart/form-data">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label for="">Organization <span class="text text-danger">*</span> </label>
                                                                                    <select name="org" id="org" onchange="get_stations2(<?=$department->department_id?>)" class="select2 form-control" tabindex="-1" required style="width: 100%">
                                                                                        <option value="">Select organization</option>
                                                                                        <?php
                                                                                        foreach ($orgs as $org) {
                                                                                        ?>
                                                                                            <option value="<?php echo $org->org_id; ?>" <?php if ($org->org_id == $department->org_id) echo "Selected"; ?>> <?php echo $org->org_name ?> </option>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="">Station <span class="text text-danger">*</span> </label>
                                                                                    <select name="station" class="select2 form-control" id="station<?=$department->department_id?>" required style="width: 100%">
                                                                                        <option value="<?php echo $department->station_id; ?>"> <?php echo $department->station_name; ?> </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <label for="">Name <span class="text text-danger">*</span> </label>
                                                                                    <input type="text" name="department_name" class="form-control" value="<?php echo $department->department_name; ?>" required />
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <label> Active </label>
                                                                                    <p>
                                                                                        <input type="checkbox" class="" value="1" <?php if ($department->active == 1) echo "checked"; ?> name="active">
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <label for="">Narrative </label>
                                                                                    <textarea name="narrative" id="" class="form-control"> <?php echo $department->narrative; ?> </textarea>
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

            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->


<script>
    function get_stations(e) {
        $.ajax({
            url: '<?php echo site_url('data/get_stations'); ?>',
            type: 'POST',
            cache: false,
            data: 'data=' + e.value,
            success: function(html) {
                $('#station').html(html);
            }
        });
    }

    function get_stations2(e) {
        console.log('ID: ' + e);
        
        $.ajax({
            url: '<?php echo site_url('data/get_stations'); ?>',
            type: 'POST',
            cache: false,
            data: 'data=' + e,
            success: function(html) {
                $('#station' + e).html(html);
            }
        });
    }
</script>