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
                                <form action="<?php echo site_url('submitform/add_currency'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Currency Code <span class="text text-danger">*</span> </label>
                                            <input type="text" name="currency_code" class="form-control" required />
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
                                    <div class="col-md-12 table-responsive">
                                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Currency Code</th>
                                                    <th>Narrative </th>
                                                    <th>Active </th>
                                                    <th class=" no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($all_currencies as $sarafu) {
                                                    $c++;
                                                ?>
                                                    <tr class="even pointer">
                                                        <td><?php echo $sarafu->currency_code; ?></td>
                                                        <td><?php echo $sarafu->narrative; ?></td>
                                                        <td class="a-right a-right ">
                                                            <?php
                                                            if ($sarafu->active == 1) echo "True";
                                                            else echo "False";
                                                            ?>
                                                        </td>
                                                        <td class=" last">
                                                            <a href="<?php echo site_url('sys/currency_profile/' . $sarafu->currency_id); ?>" class="btn btn-xs btn-rgp" ><span class="fa fa-eye"></span></a>
                                                            <a href="<?php echo site_url('delete/currency/' . $sarafu->currency_id); ?>" class="btn btn-xs btn-rgd"><span class="fa fa-trash"></span></a>
                                                        </td>
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