<?php
foreach ($department as $dpt) {
    $department_id = $dpt->department_id;
    $department_name = $dpt->department_name;
    $station_name = $dpt->station_name;
    $org_id = $dpt->org_id;
    break;
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
                                <h3 class="card-title">Form</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('departments/add_departmental_head/' . $department_id); ?>" class="" role="form" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for=""></label>
                                            <select class="select2 form-control" name="entity_id" tabindex="-1" required>
                                                <option value="">~ Select Staff ~</option>
                                                <?php
                                                foreach ($all_entitys as $entity) {
                                                ?>
                                                    <option value="<?php echo $entity->entity_id ?>"> <?php echo $entity->firstname . ' ' . $entity->secondname . ' ' . $entity->lastname; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">From</label>
                                            <input type="date" class="form-control" name="date_from" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">To</label>
                                            <input type="date" class="form-control" name="date_to" required>
                                        </div>
                                        <div class="col-md-12 checkbox">
                                            <label for="">
                                                <input type="checkbox" name="current" value="1">
                                                Current
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-sm btn-primary" name="" value="Submit">
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
                                    <div class="co-md-12 table-responsive">
                                        <table id="example1" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Staff Name</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>Current</th>
                                                    <th class=" no-link last"><span class="nobr">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($departmental_heads as $heads) {
                                                    $c++;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td><?php echo $heads->firstname . ' ', $heads->lastname; ?></td>
                                                        <td><?php echo $heads->from_date; ?></td>
                                                        <td><?php echo $heads->to_date; ?></td>
                                                        <td class="a-right a-right ">
                                                            <?php
                                                            if ($heads->current == 1) echo "True <span class='fa fa-check'></span>";
                                                            else echo "False <span class='fa fa-times'></span>";
                                                            ?>
                                                        </td>
                                                        <td class=" last">
                                                            <a href="#" class="btn btn-xs btn-rgp" data-toggle="modal" data-target="#editHead<?php echo $heads->departmental_head_id; ?>"><span class="fa fa-edit"></span></a>
                                                            <a href="<?php echo site_url('#'); ?>" class="btn btn-xs btn-rgd"><span class="fa fa-trash"></span></a>
                                                        </td>

                                                        <div class="modal fade" id="editHead<?php echo $heads->departmental_head_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                                                        <h4 class="modal-title" id="myModalLabel">Edit Departmental Head</h4>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <form action="<?php echo site_url('departments/update_head/' . $heads->departmental_head_id . '/' . $department_id); ?>" method="post" enctype="multipart/form-data">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label for="">Staff</label>
                                                                                    <select class="select2 form-control" name="entity_id" required style="width: 100%">
                                                                                        <option value="">~ Select Staff ~</option>
                                                                                        <?php
                                                                                        foreach ($all_entitys as $entity) {
                                                                                        ?>
                                                                                            <option value="<?php echo $entity->entity_id ?>" <?php if ($entity->entity_id == $heads->entity_id) echo 'selected'; ?>> <?php echo $entity->firstname . ' ' . $entity->secondname . ' ' . $entity->lastname; ?> </option>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <label for="">From</label>
                                                                                    <input type="date" class="form-control" name="date_from" value="<?php echo $heads->from_date; ?>" required>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <label for="">To</label>
                                                                                    <input type="date" class="form-control" name="date_to" value="<?php echo $heads->to_date; ?>" required>
                                                                                </div>
                                                                                <div class="col-md-12 checkbox">
                                                                                    <label for="">
                                                                                        <input type="checkbox" name="current" value="1" <?php if ($heads->current == 1) echo "checked"; ?>>
                                                                                        Current
                                                                                    </label>
                                                                                </div>

                                                                                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                                                    <button type="Submit" class="btn btn-primary">Update</button>
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



<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                Departmental Heads
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-10">
            <?php
            if (isset($_SESSION['alert'])) {
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }
            ?>
        </div>

    </div>

    <div class="row">

        <div class="col-md-3 col-sm-12 col-xs-12">
            <h4>Add Departmental Head</h4>

        </div>

        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> <?php echo $department_name; ?> </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <a href="<?php echo site_url('departments/index'); ?>" class="btn btn-success btn-xs"><span class="fa fa-external-link"></span> Departmets</a>
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