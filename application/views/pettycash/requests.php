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

                <?php if ($CI->permissions('pettycash_approve')) : ?>
                    <div class="col-md-12 col-sm-12">
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
                                        <table id="example1" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Type</th>
                                                    <th>Department`</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Staff</th>
                                                    <th>Narrative </th>
                                                    <th class=" no-link last"> <span class="nobr">Action</span> </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                foreach ($requests as $dt) {
                                                ?>
                                                    <tr>
                                                        <td><?= $dt->account_name ?></td>
                                                        <td><?= $dt->department_name ?></td>
                                                        <td><?= $dt->pettycash_amount ?></td>
                                                        <td><?= $dt->status_name ?></td>
                                                        <td><?= $dt->pettycash_date ?></td>
                                                        <td><?= strtoupper($dt->firstname . ' ' . $dt->secondname . ' ' . $dt->lastname) ?></td>
                                                        <td><?= $dt->narrative ?></td>
                                                        <td>
                                                            <a href="#" onclick="get_request(<?= $dt->id ?>)" class="btn btn-xs btn-rgp" title="View Petty Cash ?">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <?php
                                                            if ($dt->status_id == 2) {
                                                                echo '<a href="#" onclick="pay(' . $dt->id . ')" class="btn btn-xs btn-rgp" title="Pay ?">
                                                            <i class="fa fa-money"></i>
                                                        </a>';
                                                            }

                                                            if ($dt->status_id == 3 || $dt->status_id == 2) {
                                                                echo '<a href="' . site_url('pettycash/delete2/' . $dt->id) . '" class="btn btn-xs btn-rgd" title="Delete Petty Cash ?">
                                                            <i class="fa fa-trash"></i>
                                                        </a>';
                                                            }

                                                            ?>

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



<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title">Details</h4>
            </div>
            <div class="modal-body" id="modal-body">
            </div>
        </div>

    </div>
</div>

<script>
    function get_request(e) {
        $.ajax({
            url: '<?php echo site_url('pettycash/view_request'); ?>',
            type: 'POST',
            cache: false,
            data: {
                id: e
            },
            success: function(html) {
                $('#modal-body').html('').html(html);
                $('#editModal').modal('toggle');
            }
        });
    }

    function pay(e) {
        $.ajax({
            url: '<?php echo site_url('pettycash/initiate_pay'); ?>',
            type: 'POST',
            cache: false,
            data: {
                id: e
            },
            success: function(html) {
                $('#modal-body').html('').html(html);
                $('#editModal').modal('toggle');
            }
        });
    }
</script>