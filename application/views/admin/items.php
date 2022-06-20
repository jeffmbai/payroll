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

                <div class="col-md-12 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Items</h3>
                            <div class="card-tools">
                                <a href="<?php echo site_url('sys/add_item'); ?>" class="btn btn-primary btn-xs">Add Item</a>
                                <a href="<?php echo site_url('sys/failed_imports'); ?>" class="btn btn-primary btn-xs">Failed Imports</a>
                                <a href="<?php echo site_url('sys/items_list'); ?>" target="_blank" class="btn btn-default btn-xs"><span class="">PDF</span></a>
                                <a href="<?php echo site_url('syscsvs/items'); ?>" class="btn btn-default btn-xs"><span class="">CSV</span></a>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <?php if ($CI->permissions('item_view')) : ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table id="itemtable" class="table table-condensed table-striped table-hover">
                                        <thead>
                                            <tr class="headings">
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>SKU</th>
                                                <!-- <th>Store</th> -->
                                                <th>Brand</th>
                                                <th>Color</th>
                                                <th>B.Price</th>
                                                <th>M.Price</th>
                                                <th>Total Qty</th>
                                                <th>Reorder lvl</th>
                                                <th>Reorder Status</th>
                                                <th>Tax Type</th>
                                                <th>Narrative</th>
                                                <th>Active</th>
                                                <th class=" no-link last"><span class="nobr">Action</span></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                        <?php endif;?>
                    </div>

                </div>

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


<script type="text/javascript">
    $(document).ready(function() {

        $('#itemtable').DataTable({
            "pageLength": 10, //specify the number of rows to be displayed
            "responsive": true,
            language: {
                processing: '<div class="text-primary bg-primary" style="position: relative;z-index:100;overflow: visible;">Processing...</div>'
            },
            "ajax": {
                url: "<?php echo site_url("sys/all_items") ?>",
                type: 'GET'
            },
        });
    });
</script>