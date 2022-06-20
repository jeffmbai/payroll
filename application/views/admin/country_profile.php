<?php
$country_id = null;
$name = null;
$active = null;
$narrative = null;

foreach ($this_country as $nchi) {
    $country_id = $nchi->country_id;
    $name = $nchi->name;
    $active = $nchi->active;
    $narrative = $nchi->narrative;
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
                                <div class="row">
                                    <div class="table-repsonsive col-md-12">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Country Name</b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b>Active</b></td>
                                                    <td class="rm_border_top bd_left"><?php if ($active == 1) echo "True";
                                                                                        else echo "False"; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="rm_border_top pd_right"><b><b>Narrative</b></b></td>
                                                    <td class="rm_border_top bd_left"><?php echo $narrative; ?></td>
                                                </tr>
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
                                <h3 class="card-title">List</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('submitform/update_country/' . $country_id); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Category Name <span class="text text-danger">*</span> </label>
                                            <input type="text" name="country_name" class="form-control" value="<?php echo $name; ?>" required />
                                        </div>
                                        <div class="col-md-3">
                                            <label> Active </label>
                                            <p>
                                                <input type="checkbox" class="flat" value="1" name="active" <?php if ($active == 1) echo "checked"; ?>>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Narrative </label>
                                            <textarea name="narrative" id="" class="form-control"> <?php if ($narrative != '') echo $narrative; ?> </textarea>
                                        </div>
                                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                            <button type="Submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>

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