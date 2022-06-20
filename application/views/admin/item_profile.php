<?php
$x = 0;
foreach ($this_item as $item) {
    $x++;
    $item_id = $item->item_id;
    $item_name = $item->item_name;
    $buying_price = $item->buying_price;
    $marked_price = $item->marked_price;
    $selling_price = $item->selling_price;
    $image = $item->image;
    $color_id = $item->color_id;
    $color_name = $item->color_name;
    $capacity = $item->capacity;
    $model_year = $item->model_year;
    $imei_one = $item->imei_one;
    $imei_two = $item->imei_two;
    $narrative = $item->narrative;
    $availability = $item->availability;
    $barcode = $item->barcode;
    $for_sale = $item->for_sale;
    $for_purchase = $item->for_purchase;
    $for_bar = $item->for_bar;
    $active = $item->active;
    $date_modified = $item->date_modified;
    $time_stamp = $item->time_stamp;
    $org_id = $item->org_id;
    $org_name = $item->org_name;
    $address = $item->address;
    // $category_ids = json_decode($item->category_id);
    $category_id = $item->category_id;
    $unit_id = $item->unit_id;
    $unit_name = $item->unit_name;
    $brand_id = $item->brand_id;
    $brand_name = $item->brand_name;
    $attribute_ids = json_decode($item->attribute_id);
    $tax_type_id = $item->tax_type_id;
    $tax_type_name = $item->tax_type_name;
    $available_qty = $item->available_qty;
    $reorder_level = $item->reorder_level;
}

$category_name = $this->db->where('cat_id', $category_id)->get('categories')->row('cat_name');
// $category_name = $this->db->last_query();
$colors = $this->db->query("SELECT * FROM colors")->result();

$stores = $this->db->select('a.*, b.org_name')->from('items_store as a')->join('orgs as b', 'b.org_id = a.store_id')->where('a.item_id', $item_id)->get()->result();

if ($x < 1) {
    redirect($this->session->userdata('referred_from'));
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

                <div class="col-md-7 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Item</h3>
                            <div class="card-tools">
                                <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#breakdown-list" style="border: 1px solid blue;">Breakdown List <span class="fa fa-list"></span> </button>
                                <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#breakdown" style="border: 1px solid orange;">Breakdown? <span class="fa fa-sort-amount-desc"></span> </button>
                                <a href="<?php echo site_url('sys/items'); ?>" class="btn btn-primary btn-xs" style="border: 1px solid green;">Manage items <span class="fa fa-users"></span> </a>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 table-repsonsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="rm_border_top pd_right"><b>Name</b></td>
                                                <td class="rm_border_top bd_left"> <?php echo $item_name; ?> </td>
                                            </tr>
                                            <tr>
                                                <td class="rm_border_top pd_right"><b>Buying Price</b></td>
                                                <td class="rm_border_top bd_left"><?php echo $buying_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="rm_border_top pd_right"><b>Marked Price</b></td>
                                                <td class="rm_border_top bd_left"><?php echo $marked_price; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="rm_border_top pd_right"><b>Availability</b></td>
                                                <td class="rm_border_top bd_left"><?php if ($availability == 1) echo "Yes";
                                                                                    else echo "No"; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="rm_border_top pd_right"><b><b>Active</b></b></td>
                                                <td class="rm_border_top bd_left"><?php if ($active == 1) echo "Yes";
                                                                                    else echo "No"; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="rm_border_top pd_right"><b><b>Tax Type</b></b></td>
                                                <td class="rm_border_top bd_left"><?php echo $tax_type_name; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="rm_border_top pd_right"><b><b>Category</b></b></td>
                                                <td class="rm_border_top bd_left"><?php echo $category_name; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="rm_border_top pd_right"><b><b>Default Store</b></b></td>
                                                <td class="rm_border_top bd_left"><?php echo $org_name; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="rm_border_top pd_right"><b><b>Distributed Stores/Shops</b></b></td>
                                                <td class="rm_border_top bd_left"><?php foreach ($stores as $sts) echo $sts->org_name . ' / '; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="rm_border_top pd_right"><b><b>Unit</b></b></td>
                                                <td class="rm_border_top bd_left"><?php echo $unit_name; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="rm_border_top pd_right"><b><b>Brand</b></b></td>
                                                <td class="rm_border_top bd_left"><?php echo $brand_name; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="rm_border_top pd_right"><b><b>Last Modified</b></b></td>
                                                <td class="rm_border_top bd_left"><?php echo $date_modified; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="rm_border_top pd_right"><b><b>Registration</b></b></td>
                                                <td class="rm_border_top bd_left"><?php echo $time_stamp; ?></td>
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

                <div class="col-md-5 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-body">
                            <br><br>
                            <div class="col-md-3 col-sm-2"></div>
                            <div class="col-md-6 col-sm-8" style=" text-align: center;">
                                <img src="<?php echo base_url('assets/images/items/' . $image); ?>" alt="<?php echo $image; ?>" style="max-height: 300px;" />
                                <br><br><br><br>
                                <form action="<?php echo site_url('submitform/update_item_image/' . $item_id); ?>" method="post" enctype="multipart/form-data">
                                    <label for="">Change item picture</label>
                                    <input type="file" name="image" required="required" class="form-control" />
                                    <br>
                                    <input type="submit" class="btn btn-primary " value="Change" />
                                </form>
                            </div>
                            <div class="col-md-3 col-sm-2"></div>
                        </div><!-- /.card-body -->
                    </div>

                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Edit details</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <form action="<?php echo site_url('submitform/update_item/' . $item_id); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Hotel/Store <span class="text text-danger">*</span> </label>
                                            <select name="org_id" class="select2 form-control" required tabindex="-1">
                                                <option value="">Select store</option>
                                                <?php
                                                foreach ($all_stores as $store) {
                                                    if ($store->org_id != 1) continue;
                                                ?>
                                                    <option value="<?php echo $store->org_id; ?>" <?php if ($store->org_id == $org_id) echo "selected"; ?>> <?php echo $store->org_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Category <span class="text text-danger">*</span> </label>
                                            <select name="category_id" class="select2 form-control" required >
                                                <option value="">Select category</option>
                                                <?php
                                                foreach ($all_categories as $category) {
                                                ?>
                                                    <option value="<?=$category->cat_id; ?>" <?php if ($category_id == $category->cat_id) echo "selected"; ?> >
                                                        <?=$category->cat_name; ?>
                                                    </option>
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
                                                    <option value="<?php echo $tax->tax_type_id; ?>" <?php if ($tax->tax_type_id == $tax_type_id) echo "selected"; ?>> <?php echo $tax->tax_type_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Item Name</label>
                                            <input type="text" name="itemname" class="form-control" value="<?php echo $item_name; ?>" />
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Brand </label>
                                            <select name="brand_id" class="select2 form-control" tabindex="-1" id="brand_id" onchange="get_models(this)">
                                                <option value="">Select brand</option>
                                                <?php
                                                foreach ($all_brands as $brand) {
                                                ?>
                                                    <option value="<?php echo $brand->brand_id; ?>" <?php if ($brand->brand_id == $brand_id) echo "selected"; ?>> <?php echo $brand->brand_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Units <span class="text text-danger">*</span> </label>
                                            <select name="unit_id" class="select2  form-control" required tabindex="-1">
                                                <option value="">Select unit</option>
                                                <?php
                                                foreach ($all_units as $unit) {
                                                ?>
                                                    <option value="<?php echo $unit->unit_id; ?>" <?php if ($unit->unit_id == $unit_id) echo "selected"; ?>> <?php echo $unit->unit_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Attributes</label>
                                            <select name="attribute_id[]" class="select2 form-control" multiple="multiple">
                                                <option value="">Select attribute</option>
                                                <?php
                                                foreach ($all_attributes as $attr) {
                                                ?>
                                                    <option value="<?php echo $attr->attribute_id; ?>" <?php if ($attribute_ids != null && in_array($attr->attribute_id, $attribute_ids)) echo "selected"; ?>>
                                                        <?php echo $attr->attribute_name; ?>
                                                    </option>
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
                                                    <option value="<?php echo $color->color_id; ?>" <?php if ($color->color_id == $color_id) echo "selected"; ?>> <?php echo $color->color_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>

                                    <hr>

                                    <div class="row">

                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Buying Price</label>
                                            <input type="number" name="buying_price" id="buying_price" class="form-control" value="<?php echo $buying_price; ?>" />
                                        </div>

                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Markup Percentage (%) </label>
                                            <input type="number" name="" id="mark_up" onkeyup="get_marked_price(this)" class="form-control" />
                                        </div>

                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Marked Price <span class="text text-danger">*</span> </label>
                                            <input type="number" name="marked_price" id="marked_price" class="form-control" value="<?php echo $marked_price; ?>" required />
                                        </div>

                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Opening Balance</label>
                                            <input type="number" name="available_qty" id="available_qty" class="form-control" value="<?php echo $available_qty; ?>" required />
                                        </div>

                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">SKU <span class="text text-danger">*</span> </label>
                                            <input type="text" name="barcode" id="barcode" class="form-control" value="<?php echo $barcode; ?>" required />
                                        </div>

                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Reorder Level </label>
                                            <input type="number" name="reorder_level" class="form-control" value="<?php echo $reorder_level; ?>" />
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label> Active </label>
                                            <p>
                                                <input type="checkbox" class="flat" value="1" <?php if ($active == 1) echo "checked"; ?> name="active">
                                            </p>
                                        </div>

                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <label for="">Availability <span class="text text-danger">*</span> </label>
                                            <p>
                                                Yes: <input type="radio" class="flat" name="availability" id="availability" value="1" <?php if ($availability == 1) echo "checked";; ?> />
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                No: <input type="radio" class="flat" name="availability" id="availability" value="0" <?php if ($availability == 0) echo "checked";; ?> />
                                            </p>
                                        </div>

                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <label for="">Class <span class="text text-danger">*</span> </label>
                                            <p>
                                                For sale: <input type="checkbox" class="flat" name="for_sale" id="for_sale" value="1" <?php if ($for_sale == 1) echo "checked"; ?> />
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                For purchase: <input type="checkbox" class="flat" name="for_purchase" id="for_purchase" value="1" <?php if ($for_purchase == 1) echo "checked"; ?> />
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                For bar: <input type="checkbox" class="flat" name="for_bar" id="for_bar" value="1" <?php if ($for_bar == 1) echo "checked"; ?> />
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Narrative</label>
                                            <textarea name="narrative" class="form-control"><?php echo $narrative; ?></textarea>
                                        </div>
                                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                            <button type="Submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
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


<!-- Modals Start -->

<!-- Breakdown -->
<div id="breakdown" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title">Breakdown <?php echo $item_name; ?></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <p class="text text-success">
                            <span class="fa fa-info-circle"></span> Breakdown this item into prefered quantities.
                        </p>
                    </div>
                    <form role="form" id="item_breakdown" method="post">
                        <div class="col-md-12 col-xs-12">
                            <!-- Vizuizo -->
                            <input type="hidden" name="item_id" value="<?php echo $item_id; ?>" required />
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <label for="">Unit <span class="text text-danger">*</span></label>
                            <select name="unit_id" class="form-control select2" required style="width: 100%;">
                                <option value="">~Select unit~</option>
                                <?php
                                foreach ($all_units as $un) {
                                ?>
                                    <option value="<?php echo $un->unit_id; ?>"> <?php echo $un->unit_name; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <label for="">Breakdown Value <small class="text text-success">(optional)</small> </label>
                            <input type="number" class="form-control" name="breakdown_value" id="breakdown_value" step="0.001" placeholder="e.g 1 or 2 or 5 or 10 ..." />
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <label for="">Unit price <span class="text text-danger">*</span></label>
                            <input type="number" class="form-control" name="unit_price" required placeholder="" />
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <label for="">Formula <span class="text text-danger">*</span>
                                <small class="text text-warning">(how many sub-items makes one whole item <i class="fa fa-question"></i>)</small>
                                <br />
                                <small>Note: This formula is used in calculating the approximate buying price of the sub-item</small>
                            </label>
                            <input type="number" class="form-control" name="formula" required placeholder="e.g. 20 pieces" />
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br />
                            <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal" style="border: 2px solid red">Close</button>
                            <input class="btn btn-default btn-sm pull-right" type="submit" name="submit" style="border: 2px solid green" value="Submit">
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Breakdown List -->
<div id="breakdown-list" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title"><?php echo $item_name; ?> Breakdown List</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-xs-12 table">
                        <table class="table-striped table-hover table-striped jambo_table" id="example">
                            <thead>
                                <th style="width: 100px;">Item Name</th>
                                <th>Unit</th>
                                <th>Available Qty</th>
                                <th>Apx B.P</th>
                                <th>M.P</th>
                                <th>Timestamp</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $breakdown_list = $this->db->query("SELECT items.*, units.unit_name FROM items JOIN units ON units.unit_id = items.unit_id WHERE items.parent_item_id = '$item_id' ")->result();
                                foreach ($breakdown_list as $blist) {
                                ?>
                                    <tr>
                                        <td><?php echo $blist->item_name; ?></td>
                                        <td><?php echo $blist->unit_name; ?></td>
                                        <td><?php echo $blist->available_qty; ?></td>
                                        <td><?php echo $blist->buying_price; ?></td>
                                        <td><?php echo $blist->marked_price; ?></td>
                                        <td><?php echo $blist->time_stamp; ?></td>
                                        <td>
                                            <a href="#" onclick="re_stock(<?php echo $blist->item_id; ?>)" id="dis<?php echo $blist->item_id; ?>" class="btn btn-xs btn-rgp" title="Adjust available quantity"> <span class="fa fa-cart-plus"></span> </a>
                                            <a href="<?php echo site_url('sys/item_profile/' . $blist->item_id); ?>" class="btn btn-xs btn-rgs" title="View item profile"> <span class="fa fa-edit"></span> </a>
                                            <a href="#" onclick="delete_child(<?php echo $blist->item_id; ?>)" class="btn btn-xs btn-rgd" title="Delete this child item"> <span class="fa fa-trash"></span> </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Modals End -->

<script>
    $("#breakdown_value").blur(function() {
        this.value = parseFloat(this.value).toFixed(3);
    });
</script>

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

        $("#marked_price").val(markedPrice.toFixed(2));

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
</script>

<script>
    function re_stock(id) {
        //add new quatities to this child item while you reduce the parent item value by one
        var id2 = '<?php echo $item_id ?>';
        $('#dis' + id).prop('disabled', true); //disable button

        console.log('You clicked me');
        $.ajax({
            url: '<?php echo site_url(); ?>sys/item_breakdown2', //this is the submit URL
            type: 'POST',
            data: {
                childid: id,
                parentid: id2
            },
            success: function(data) {
                console.log(data);
                if (data == 'success') {
                    //success. then print receipt
                    location.reload();
                } else {
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: 'Sorry! Something went wrong. Try again later or contact your administrator'
                    });
                }

            }
        });
    }

    function delete_child(id) {
        //delete
        $.ajax({
            url: '<?php echo site_url('sys/delete_item_breakdown'); ?>', //this is the submit URL
            type: 'POST',
            data: {
                childid: id
            },
            success: function(data) {
                console.log(data);
                if (data == 'success') {
                    //success. then print receipt
                    location.reload();
                } else {
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: 'Sorry! Something went wrong. Try again later or contact your administrator'
                    });
                }

            }
        });
    }
</script>

<script>
    $(function() {
        $('#item_breakdown').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url(); ?>sys/item_breakdown', //this is the submit URL
                type: 'POST',
                data: $('#item_breakdown').serialize(),
                success: function(data) {
                    console.log(data);

                    if (data == 'success') {
                        //success. then print receipt
                        location.reload();
                    } else {
                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: 'Sorry! Something went wrong. Try again later or contact your administrator'
                        });
                    }

                }
            });
        }); //end registration
    });
</script>