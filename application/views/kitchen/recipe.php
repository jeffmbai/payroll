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
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Make Recipe</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: none;">
                                <form id="recipe_form" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4 col-xs-12">
                                            <label>Recipe name [product name] <i class="text-danger">*</i></label>
                                            <input type="text" name="recipe_name" class="form-control" required placeholder="Enter the name of the recipe/product." />
                                        </div>
                                        <div class="col-md-4 col-xs-12">
                                            <label>Units <i class="text-danger">*</i></label>
                                            <select class="form-control" name="unit_id" required>
                                                <option value="">~Select output unit~</option>
                                                <?php
                                                $units = $this->db->get('units')->result();
                                                foreach ($units as $unit) {
                                                    echo '<option value="' . $unit->unit_id . '"> ' . $unit->unit_name . ' </option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-xs-12">
                                            <label>Category <i class="text-danger">*</i></label>
                                            <select class="form-control" name="category_id" required>
                                                <option value="">~Select output category~</option>
                                                <?php
                                                $categories = $this->db->get('categories')->result();
                                                foreach ($categories as $cat) {
                                                    echo '<option value="' . $cat->cat_id . '"> ' . $cat->cat_name . ' </option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-xs-12">
                                            <label>Tax Type <i class="text-danger">*</i></label>
                                            <select class="form-control" name="tax_type_id" required>
                                                <option value="">~Select output tax type~</option>
                                                <?php
                                                $taxs = $this->db->get('tax_types')->result();
                                                foreach ($taxs as $tax) {
                                                    echo '<option value="' . $tax->tax_type_id . '"> ' . $tax->tax_type_name . ' </option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-xs-12">
                                            <label>Brands </label>
                                            <select class="form-control" name="brand_id">
                                                <option value="">~Select output brand~</option>
                                                <?php
                                                $brands = $this->db->get('brands')->result();
                                                foreach ($brands as $brand) {
                                                    echo '<option value="' . $brand->brand_id . '"> ' . $brand->brand_name . ' </option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-xs-12">
                                            <label>Qty produced <i class="text-danger">*</i></label>
                                            <input type="number" name="availability" step="0.01" class="form-control" required placeholder="Enter qty to be produced" />
                                        </div>
                                        <div class="col-md-12 col-xs-12 table-responsive">
                                            <label>Add recipe items <i class="text-danger">*</i></label>
                                            <table class="table table-condensed table-bordered" id="recipe_table">
                                                <thead>
                                                    <tr id="row1">
                                                        <th style="width: 300px;">Item Name</th>
                                                        <th>Measurement</th>
                                                        <th>Amount (KES)</th>
                                                        <th>
                                                            <button type="button" class="btn btn-sm btn-default" onclick="add_row()"><span class="fa fa-plus"></span></button>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="row2">
                                                        <td>
                                                            <select name="item[]" class="select2 form-control input-rg" id="item_2" required style='width: 100%;'>
                                                                <option value="">Select item</option>
                                                                <?php
                                                                foreach ($all_items as $ait) {
                                                                    echo '<option value="' . $ait->item_id . '" > ' . $ait->item_name . ' </option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="measurement[]" class="form-control" id="measurement_2" required />
                                                        </td>
                                                        <td>
                                                            <input type="number" name="amount[]" onkeyup="set_amount(2)" onchange="set_amount(2)" step="0.01" class="form-control" id="amount_2" required />
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-default" onclick="delete_row(2)"><span class="fa fa-minus"></span></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-12 col-xs-12">
                                            <button class="btn btn-default" id="itemstotal" style="color: orangered; font-weight: 900; font-size: 20px;">Total 0.00</button>
                                            <button class="btn btn-primary pull-right" type="submit" style="font-size: 20px;">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

                <?php if ($CI->permissions('general_view')) : ?>
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
                                    <div class="col-md-12 col-xs-12 table-responsive">
                                        <table id="example1" class="table table-striped table-condensed responsive-utilities">
                                            <thead class="bg-primary">
                                                <tr class="headings">
                                                    <th>Product Code</th>
                                                    <th>Price</th>
                                                    <th>Qty</th>
                                                    <th>Name</th>
                                                    <th>Unit</th>
                                                    <th>Category</th>
                                                    <th>Tax Type</th>
                                                    <th>Active</th>
                                                    <th class=" no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $recipes = $this->db->select("a.*, b.unit_name, c.cat_name, d.tax_type_name, e.brand_name")
                                                    ->from('items as a')
                                                    ->join('units as b', 'a.unit_id = b.unit_id', 'left')
                                                    ->join('categories as c', 'a.category_id = c.cat_id', 'left')
                                                    ->join('tax_types as d', 'a.tax_type_id = d.tax_type_id', 'left')
                                                    ->join('brands as e', 'a.brand_id = e.brand_id', 'left')
                                                    ->where("a.recipe_code IS NOT NULL AND a.recipe_code <> 'NA' ")
                                                    ->get()->result();
                                                foreach ($recipes as $recipe) {
                                                ?>
                                                    <tr>
                                                        <td><a href="<?=site_url('sys/item_profile/' . $recipe->item_id)?>"> #<?= $recipe->barcode ?> </a></td>
                                                        <td><?= $recipe->selling_price ?></td>
                                                        <td><?= $recipe->availability ?></td>
                                                        <td><?= $recipe->item_name ?></td>
                                                        <td><?= $recipe->unit_name ?></td>
                                                        <td><?= $recipe->cat_name ?></td>
                                                        <td><?= $recipe->tax_type_name ?></td>
                                                        <td><?= ($recipe->active == 1) ? 'Active' : 'Inactive' ?></td>
                                                        <td>
                                                            <button class="btn btn-xs btn-rgp" onclick="get_recipe('<?= $recipe->recipe_code ?>')" title="View recipe"><i class="fa fa-cutlery"></i></button>
                                                            <button class="btn btn-xs btn-rgp" onclick="get_edit_recipe('<?= $recipe->recipe_code ?>')" title="Edit"><i class="fa fa-edit"></i></button>
                                                            <button class="btn btn-xs btn-rgd" onclick="delete_recipe('<?= $recipe->recipe_code ?>')" title="Delete"><i class="fa fa-trash"></i></button>
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

            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->




<div class="modal fade" id="info_modal" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Information display</h5>
            </div>
            <div class="modal-body">
                <div class="form-content p-2" id="modal_data">

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function add_row() {
        $rowno = $("#recipe_table tr").length;
        $rowno = $rowno + 1;
        $("#recipe_table tr:last").after("<tr id='row" + $rowno + "'>  " +
            "<td> " +
            "<select name='item[]' class='select2 form-control' id='item_" + $rowno + "' tabindex='-1' required style='width: 100%;' >" +
            "<option >Select item</option>"
            <?php foreach ($all_items as $itm) : ?> +
                "<option value='<?php echo $itm->item_id ?>' ><?php echo $itm->item_name ?></option>"
            <?php endforeach; ?> +
            "</select> " +
            "</td> " +
            "<td><input type='text' class='form-control' name='measurement[]' id='measurement_" + $rowno + "' required ></td> " +
            "<td><input type='number' step='0.01' onchange='set_amount(" + $rowno + ")' onkeyup='set_amount(" + $rowno + ")' class='form-control' name='amount[]' id='amount_" + $rowno + "' required ></td> " +
            "<td><button type='button' class='btn btn-sm btn-default' onclick=delete_row('" + $rowno + "')><span class='fa fa-minus'></span></button></td> " +
            "</tr>");

        //$("#recipe_table tr:last").after(html);
        $(".select2_single").select2({
            allowClear: true
        });

        // refresh_table ();
    }

    function add_row2() {
        $rowno = $("#recipe_table2 tr").length;
        $rowno = $rowno + 1;
        $("#recipe_table2 tr:last").after("<tr id='row2" + $rowno + "'>  " +
            "<td> " +
            "<select name='item[]' class='select2_single form-control' id='item_" + $rowno + "' tabindex='-1' required style='width: 100%;' >" +
            "<option >Select item</option>"
            <?php foreach ($all_items as $itm) : ?> +
                "<option value='<?php echo $itm->item_id ?>' ><?php echo $itm->item_name ?></option>"
            <?php endforeach; ?> +
            "</select> " +
            "</td> " +
            "<td><input type='text' class='form-control' name='measurement[]' id='measurement_" + $rowno + "' required ></td> " +
            "<td><input type='number' step='0.01' onchange='set_amount2(" + $rowno + ")' onkeyup='set_amount2(" + $rowno + ")' class='form-control' name='amount[]' id='amount2_" + $rowno + "' required ></td> " +
            "<td><button type='button' class='btn btn-sm btn-default' onclick=delete_row2('" + $rowno + "')><span class='fa fa-minus'></span></button></td> " +
            "</tr>");

        //$("#recipe_table tr:last").after(html);
        $(".select2").select2({
            allowClear: true
        });
    }
</script>

<script type="text/javascript">
    function delete_row(rowno) {
        $('#row' + rowno).remove();
        refresh_table();
    }

    function delete_row2(rowno) {
        $('#row2' + rowno).remove();
        refresh_table2();
    }

    function set_amount(e) {
        refresh_table();
    }

    function set_amount2(e) {
        refresh_table2();
    }
</script>

<script>
    function refresh_table() {
        var table = document.getElementById("recipe_table");
        var sumVal = 0;

        for (var i = 1; i <= table.rows.length; i++) {
            if (($("#amount_" + i).val()) != null) {
                sumVal = sumVal + Number($("#amount_" + i).val());
            }
        }

        $("#itemstotal").html('').html("Total " + sumVal.toFixed(2));

        console.log(sumVal.toFixed(2));
        console.log('MESSAGE: Success');
    }

    function refresh_table2() {
        var table = document.getElementById("recipe_table2");
        var sumVal = 0;

        for (var i = 1; i <= table.rows.length; i++) {
            if (($("#amount2_" + i).val()) != null) {
                sumVal = sumVal + Number($("#amount2_" + i).val());
            }
        }

        $("#itemstotal2").html('').html("Total " + sumVal.toFixed(2));

        console.log(sumVal.toFixed(2));
        console.log('MESSAGE2: Success');
    }

    $(function() {
        $('#recipe_form').on('submit', function(e) {
            /*for add item*/
            e.preventDefault();

            $.ajax({
                url: '<?php echo site_url(); ?>kitchen/make_recipe', //this is the submit URL
                type: 'POST',
                data: $('#recipe_form').serialize(),
                success: function(data) {
                    var obj = JSON.parse(data);
                    // console.log("resp: " + obj.resp);
                    // console.log("message: " + obj.message);
                    if (obj.resp == '1') {
                        
                        success_sound();

                        swal({
                            icon: 'success',
                            title: 'Success',
                            text: obj.message
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 3000);
                    } else {

                        error_sound();

                        swal({
                            icon: 'warning',
                            title: 'Failed',
                            text: obj.message
                        });
                    }

                }
            });
        }); //end registration
    });
</script>

<script>
    function delete_recipe(code) {
        swal("Are you sure you want to delete ?", {
                buttons: {
                    no: {
                        text: "No",
                        value: "no",
                    },
                    yes: {
                        text: "Yes",
                        value: "yes",
                    }
                },
            })
            .then((value) => {
                switch (value) {

                    case "no":
                        return;
                        break;

                    case "yes":
                        $.ajax({
                            url: '<?php echo site_url('kitchen/delete_recipe'); ?>',
                            type: 'POST',
                            data: {
                                data: code
                            },
                            success: function(output) {
                                console.log(output);
                                var obj = JSON.parse(output);
                                console.log("resp: " + obj.resp);
                                console.log("message: " + obj.message);
                                if (obj.resp == 1) {

                                    success_sound();

                                    swal({
                                        icon: 'success',
                                        title: 'Success',
                                        text: obj.message
                                    });
                                    setTimeout(function() {
                                        window.location.reload();
                                    }, 3000);
                                } else {

                                    error_sound();
                                    
                                    swal({
                                        icon: 'warning',
                                        title: 'Failed',
                                        text: obj.message
                                    });
                                }
                            }
                        });
                        break;

                    default:
                        swal("Got away safely!");
                }
            });
    }

    function get_recipe(e) {
        $.ajax({
            url: '<?php echo site_url('kitchen/get_recipe'); ?>',
            type: 'POST',
            cache: false,
            data: 'data=' + e,
            success: function(resp) {
                $('#modal_data').html('').html(resp);
                $('#info_modal').modal('toggle');
            }
        });
    }

    function get_edit_recipe(e) {
        $.ajax({
            url: '<?php echo site_url('kitchen/get_edit_recipe'); ?>',
            type: 'POST',
            cache: false,
            data: 'data=' + e,
            success: function(resp) {
                $('#modal_data').html('').html(resp);
                $('#info_modal').modal('toggle');
            }
        });
    }
</script>