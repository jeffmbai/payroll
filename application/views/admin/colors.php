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
                                <form action="<?php echo site_url('submitform/add_color'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Color Name <span class="text text-danger">*</span> </label>
                                            <input type="text" name="color_name" class="form-control" required />
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
                                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Color Name</th>
                                                    <th class=" no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;

                                                foreach ($colors as $dt) {
                                                    $c++;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td class=" "><?php echo $dt->color_name; ?></td>
                                                        <td class=" last">
                                                            <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $dt->color_id; ?>"> <span class="fa fa-pencil"></span> </button>
                                                            <a href="<?php echo site_url('submitform/delete_color/' . $dt->color_id); ?>" class="btn btn-xs btn-danger"><span class="fa fa-close"></span></a>
                                                        </td>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="myModal<?php echo $dt->color_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                                                        <h4 class="modal-title" id="myModalLabel">Color</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <form action="<?php echo site_url('submitform/update_color/' . $dt->color_id); ?>" method="post">
                                                                                <div class="col-md-12">
                                                                                    <label for="">Brand Name <span class="text text-danger">*</span> </label>
                                                                                    <input type="text" name="color_name" class="form-control" value="<?php echo $dt->color_name; ?>" required />
                                                                                </div>
                                                                                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                    <button type="Submit" class="btn btn-primary">Update</button>
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



<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?php echo $page; ?></h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-5">
            <?php
            if (isset($_SESSION['alert'])) {
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }
            ?>
        </div>
    </div>

    <div class="row">

        <div class="col-md-5 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add <?php echo $page; ?> </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                </div>
            </div>
        </div>

        <div class="col-md-7 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo $page; ?> List </h2>
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