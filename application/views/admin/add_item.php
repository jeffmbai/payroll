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
                    $colors = $this->db->query("SELECT * FROM colors")->result();
                    ?>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Products | Add item </h3>
                            <div class="card-tools">
                                <a href="<?php echo site_url('sys/items'); ?>" class="btn btn-primary btn-xs">Manage Items </a>
                                <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#uploadModal">Upload items</button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if ($CI->permissions('item_add')) : ?>
                                <div class="row">
                                    <form action="<?php echo site_url('submitform/add_item'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">

                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label for="">Default Organization/ Store <span class="text text-danger">*</span> </label>
                                                <select name="org_id" class="select2 form-control" required tabindex="-1">
                                                    <option value="">Select store</option>
                                                    <?php
                                                    foreach ($all_stores as $store) {
                                                        if ($store->org_id != 1) continue;
                                                    ?>
                                                        <option value="<?php echo $store->org_id; ?>" <?php if ($store->org_id == $_SESSION['orgid']) echo 'selected'; ?>> <?php echo $store->org_name; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label for="">Category <span class="text text-danger">*</span> </label>
                                                <select name="category_id" class="select2 form-control" required>
                                                    <option value="">Select category</option>
                                                    <?php
                                                    foreach ($all_categories as $category) {
                                                    ?>
                                                        <option value="<?php echo $category->cat_id; ?>"> <?php echo $category->cat_name; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label for="">Brand</label>
                                                <!-- <select name="brand_id" class="select2 form-control" tabindex="-1" id="brand_id" onchange="get_models(this)" required > -->
                                                <select name="brand_id" class="select2 form-control" tabindex="-1" id="brand_id">
                                                    <option value="">Select brand</option>
                                                    <?php
                                                    foreach ($all_brands as $brand) {
                                                    ?>
                                                        <option value="<?php echo $brand->brand_id; ?>"> <?php echo $brand->brand_name; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label for="">Name <span class="text text-danger">*</span> </label>
                                                <input type="text" name="itemname" class="form-control" required />
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label for="">Units <span class="text text-danger">*</span> </label>
                                                <select name="unit_id" class="select2 form-control" required tabindex="-1">
                                                    <option value="">Select unit</option>
                                                    <?php
                                                    foreach ($all_units as $unit) {
                                                    ?>
                                                        <option value="<?php echo $unit->unit_id; ?>"> <?php echo $unit->unit_name; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-6" style="display: none;">
                                                <label for="">Attributes </label>
                                                <select name="attribute_id[]" class="select2 form-control" multiple="multiple">
                                                    <option value="">Select unit</option>
                                                    <?php
                                                    foreach ($all_attributes as $attr) {
                                                    ?>
                                                        <option value="<?php echo $attr->attribute_id; ?>"> <?php echo $attr->attribute_name; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label for="">Tax Type <span class="text text-danger">*</span> </label>
                                                <select name="tax_type_id" class="select2 form-control" required tabindex="-1">
                                                    <option value="">Select tax type</option>
                                                    <?php
                                                    foreach ($all_tax_types as $tax) {
                                                    ?>
                                                        <option value="<?php echo $tax->tax_type_id; ?>"> <?php echo $tax->tax_type_name; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label for="">Color </label>
                                                <select name="color_id" class="select2 form-control" tabindex="-1">
                                                    <option value="">Select color</option>
                                                    <?php
                                                    foreach ($colors as $color) {
                                                    ?>
                                                        <option value="<?php echo $color->color_id; ?>"> <?php echo $color->color_name; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label for="">Image </label>
                                                <input type="file" name="image" class="form-control" />
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-6" hidden>
                                                <label for="">SKU <span class="text text-danger">*</span> </label>
                                                <input type="text" name="barcode" class="form-control" />
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label for="">Reorder Level </label>
                                                <input type="number" name="reorder_level" class="form-control" />
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label for="">Availability <span class="text text-danger">*</span> </label>
                                                <p>
                                                    Yes: <input type="radio" class="flat" name="availability" id="availability" value="1" checked="" />
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    No: <input type="radio" class="flat" name="availability" id="availability" value="0" />
                                                </p>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label for="">Class <span class="text text-danger">*</span>
                                                </label>
                                                <p>
                                                    For Sale: <input type="checkbox" class="flat" name="for_sale" checked id="for_sale" value="1" />
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    For Purchase: <input type="checkbox" class="flat" name="for_purchase" checked id="for_purchase" value="1" checked="" />
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    For bar: <input type="checkbox" class="flat" name="for_bar" id="for_bar" checked value="1" />
                                                </p>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row">

                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label for="">Unit Buying Price <span class="text text-danger">*</span> </label>
                                                <input type="number" name="buying_price" id="buying_price" class="form-control" required />
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label for="">Markup Percentage (%) </label>
                                                <input type="number" name="" id="mark_up" onkeyup="get_marked_price(this)" class="form-control" />
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label for="">Marked Price <span class="text text-danger">*</span> </label>
                                                <input type="number" name="marked_price" id="marked_price" class="form-control" required />
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label for="">Opening Stock <span class="text text-danger">*</span> </label>
                                                <input type="number" name="available_qty" id="available_qty" class="form-control" required />
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Narrative</label>
                                                <textarea name="narrative" class="form-control" placeholder="Short item description..."></textarea>
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label> Active </label>
                                                <p>
                                                    <input type="checkbox" class="flat" value="1" checked name="active">
                                                </p>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                <button type="Submit" class="btn btn-default btn-lg pull-right" style="border: 2px solid green;">Save <span class="fa fa-save"></span></button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            <?php endif; ?>
                        </div><!-- /.card-body -->
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


<!-- Modal Start -->
<div id="uploadModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title">Upload items</h4>
            </div>
            <div class="modal-body">
                <p>
                    <span class="text text-warning fa fa-info-circle"></span>
                    Before uploading a file, ensure you have downloaded the 'csv template' below and filled in the data appropriately. You can dowload too the demo template for your practice.
                    <br />
                    <a href="<?php echo site_url('SysCsvs/items_template'); ?>" class="btn btn-xs btn-success">CSV Template</a>
                    <a href="<?php echo site_url('SysCsvs/items_template_demo'); ?>" class="btn btn-xs btn-info">Demo Data</a>
                </p>
                <form role="form" method="post" id="import_items" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Attach the excel/csv file</label>
                            <input type="file" name="items_upload" class="form-control" required />
                        </div>

                        <div class="col-md-12">
                            <br />
                            <button type="submit" name="import_items" class="btn btn-info" id="import_items_btn">Import</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script>
    function get_models(e) {
        var brandID = e.value;
        console.log("BID: " + brandID);
        //now get the brands
        $.ajax({
            url: '<?php echo site_url('data/brand_models'); ?>',
            type: 'POST',
            cache: false,
            data: 'data=' + brandID,
            success: function(html) {
                console.log(html);
                $('#model_id').html(html);
            }
        });
    }

    function get_marked_price(e) {
        var markUp = e.value;
        var buyingPrice = document.getElementById("buying_price").value;
        var markedPrice = null;
        console.log("Markup: " + markUp + "\n Buying P.: " + buyingPrice);

        var a = Number(markUp) + 100;
        console.log("a: " + a);
        var b = a / 100;
        console.log("b: " + b);
        markedPrice = b * buyingPrice;
        console.log("markedPrice: " + markedPrice);

        // $("#marked_price").val(markedPrice);
        document.getElementById("marked_price").value = markedPrice;

    }

    function get_print() {
        var divToPrint = null;

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('business/testr'); ?>',
            //data: 'industry=' + industry,
            cache: false,
            success: function(data) {
                //$('#industry_category').html(data);
                divToPrint = data;
                console.log("Data: " + data);
            }
        });

        var popupWin = window.open('', '_blank', 'width=300,height=300');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }

    $(document).ready(function() {
        //import data
        $('#import_items').on('submit', function(event) {
            event.preventDefault();
            console.log("Process started...");

            $.ajax({
                //url:"<?php echo site_url('SysCsvs/import'); ?>",
                url: "<?php echo site_url('SysCsvs/new_import'); ?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#import_items_btn').html('Importing...');
                    console.log("Button started...");
                },
                success: function(data) {
                    console.log("Success 1...");
                    $('#import_items')[0].reset();
                    $('#import_items_btn').attr('disabled', false);
                    $('#import_items_btn').html('Import Done');
                    //load_data();
                    if (data.trim() == 'success') {
                        window.location.href = "<?php echo site_url('sys/items'); ?>";
                    } else if (data.trim() == 'failed_partially') {
                        window.location.href = "<?php echo site_url('sys/failed_imports'); ?>";
                    } else {
                        swal({
                            icon: 'success',
                            title: 'Success',
                            text: 'Transaction complete'
                        });
                    }

                }
            })
        });
    });
</script>