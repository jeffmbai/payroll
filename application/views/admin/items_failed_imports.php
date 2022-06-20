<?php
$CI = &get_instance();
?>
    <style>
        .jtl_input {
            border: unset !important;
        }
    </style>
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
                            <table id="itemtable" class="table table-condensed table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="headings">
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Unit</th>
                                        <th>Color</th>
                                        <th>Tax Type</th>
                                        <th>B.Price</th>
                                        <th>M.Price</th>
                                        <th>SKU</th>
                                        <th>Opening Stk</th>
                                        <th>Reorder lvl</th>                                
                                        <th>Narrative</th>
                                        <th class=" no-link last"><span class="nobr">Action</span></th>
                                    </tr>
                                </thead>

                                <tbody>
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
    function import_item (e) {
        var item_name = $('#item_name'+e).val();
        var category = $('#category'+e).val();
        var brand_id = $('#brand_id'+e).val();
        var unit = $('#unit'+e).val();
        var color = $('#color'+e).val();
        var tax_type_id = $('#tax_type_id'+e).val();
        var buying_price = $('#buying_price'+e).val();
        var marked_price = $('#marked_price'+e).val();
        var barcode = $('#barcode'+e).val();
        var opening_stock = $('#opening_stock'+e).val();
        var reorder_level = $('#reorder_level'+e).val();
        var narrative = $('#narrative'+e).val();

        $.ajax({
            url: '<?php echo site_url('syscsvs/reimport'); ?>',
            type: 'POST',
            cache: false,
            data: { 
                item_id : e, 
                item_name : item_name, 
                category : category,
                brand_id : brand_id, 
                unit : unit, 
                color : color, 
                tax_type_id : tax_type_id, 
                buying_price : buying_price, 
                marked_price : marked_price,  
                barcode : barcode,
                opening_stock : opening_stock,
                reorder_level : reorder_level,
                narrative : narrative
            },
            success: function(resp){
                console.log(resp);
                var obj = JSON.parse(resp); 
                if(obj.resp == 1) {
                    window.location.href = "<?php echo site_url('sys/items');?>";
                    // swal({
                    //     icon: 'success',
                    //     title: 'Success',
                    //     text: 'Transaction complete'
                    // });
                } else {
                    swal({
                        icon: 'warning',
                        title: 'Failed',
                        text: obj.message
                    });
                }
            }
        });

    }
</script>

<script type="text/javascript">
$(document).ready(function() {
    
    $('#itemtable').DataTable({
        "pageLength" : 10,  //specify the number of rows to be displayed
        "order": [[ 10, "desc" ]],
        "responsive": true,
        "autoWidth": false,
        "destroy": true,
        "ajax": {
            url : "<?php echo site_url("sys/all_failed_imports") ?>",
            type : 'GET'
        },
    });

});
</script>