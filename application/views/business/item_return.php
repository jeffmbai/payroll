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

            <?php if ($CI->permissions('returns_add')) : ?>
                <div class="col-md-12 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><i class="fa fa-info-circle"></i> Fill the form sequentially <small><i>(from left to right, top to bottom)</i></small> to get the right data filtered in the <code>select input types</code>.</p>
                                </div>
                            </div>
                            <form action="<?php echo site_url('business/add_return'); ?>" method="post">
                                <div class="row">
                                    <div class="col-md-3 col-xs-12">
                                        <label for="">Item Return Option <span class="text text-danger">*</span> </label>
                                        <select class="select2 form-control" name="item_status_id" onchange="get_orders(this)" required>
                                            <option value="">Select return option</option>
                                            <?php
                                            foreach ($item_status as $it) {
                                            ?>
                                                <option value="<?php echo $it->item_status_id; ?>"> <?php echo $it->item_status_name; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label for="">Orders <span class="text text-danger">*</span> </label>
                                        <select class="select2 form-control" name="order_id" id="order_id" onchange="get_order_items(this)" required>
                                            <option value="">Search and select order</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label for="">Order Items <span class="text text-danger">*</span> </label>
                                        <select class="select2 form-control" name="order_item_id" id="order_item_id" required>
                                            <option value="">Search and select order item</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label for="">Quantity Returning <span class="text text-danger">*</span> </label>
                                        <input type="number" class="form-control" name="qty" id="qty" required /> 
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label for="">Return Condition <span class="text text-danger">*</span> </label>
                                        <select class="select2 form-control" name="return_condition" id="return_condition" required>
                                            <option value="">Select item(s) condition</option>
                                            <option value="Good">Good</option>
                                            <option value="Spoilt">Spoilt</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
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
                <?php endif;?>

                <?php if ($CI->permissions('returns_view')) : ?>
                <div class="col-md-12 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Returned Items/Products </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table id="example1" class="table table-striped table-hover table-sm">
                                        <thead>
                                            <tr class="headings">
                                                <th>Item</th>
                                                <th>Item Code</th>
                                                <th>Qty</th>
                                                <th>Return Type</th>
                                                <th>Staff</th>
                                                <th>Return Date</th>
                                                <th>Order Code</th>
                                                <th>Narrative </th>
                                                <!-- <th class=" no-link last"><span class="nobr">Action</span></th> -->
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $c = 0;
                                            foreach ($item_returned as $dt) {
                                                $c++;
                                                $link = null;
                                                if($dt->item_status_id == 1) $link = site_url('business/purchase_profile/' . $dt->order_id);
                                                else $link = site_url('business/sale_profile/' . $dt->order_id);
                                            ?>
                                                <tr class="even pointer">
                                                    <td><?=$dt->item_name; ?></td>
                                                    <td><?=$dt->barcode; ?></td>
                                                    <td><?=$dt->qty; ?></td>
                                                    <td><?=$dt->item_status_name; ?></td>
                                                    <td><?=$dt->firstname.' '.$dt->secondname.' '.$dt->lastname; ?></td>
                                                    <td><?=date('d-m-Y', strtotime($dt->return_date)); ?></td>

                                                    <td><a href="<?=$link ?>"> <?=$dt->bill_no; ?> </a></td>

                                                    <td><?=$dt->narrative; ?></td>
                                                    <!-- <td class=" last">
                                                        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $dt->item_return_id; ?>"> <span class="fa fa-pencil"></span> </button>
                                                    </td> -->

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal<?php echo $dt->item_return_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Details</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <form action="<?php echo site_url('business/update_return/' . $dt->item_return_id); ?>" method="post">
                                                                            <div class="col-md-12 col-xs-12">
                                                                                <label for="">Item Return Option <span class="text text-danger">*</span> </label>
                                                                                <select class="select2 form-control" name="item_status_id" required style="width: 100%;">
                                                                                    <option value="">Select return option</option>
                                                                                    <?php
                                                                                    foreach ($item_status as $it) {
                                                                                    ?>
                                                                                        <option value="<?php echo $it->item_status_id; ?>" <?php if ($it->item_status_id == $dt->item_status_id) echo "selected"; ?>> <?php echo $it->item_status_name; ?> </option>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-12 col-xs-12">
                                                                                <label for="">Item <span class="text text-danger">*</span> </label>
                                                                                <select class="select2 form-control" name="item_id" required style="width: 100%;">
                                                                                    <option value="">Select item</option>
                                                                                    <?php
                                                                                    foreach ($all_items as $item) {
                                                                                    ?>
                                                                                        <option value="<?php echo $item->item_id; ?>" <?php if ($item->item_id == $dt->item_id) echo "selected"; ?>> <?php echo $item->item_name . ', ' . $item->brand_name; ?> </option>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <label for="">Narrative </label>
                                                                                <textarea name="narrative" id="" class="form-control"><?php echo $dt->narrative; ?></textarea>
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
                <?php endif;?>

            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->


<script>
    function get_orders (e) {
        $.ajax({
            url: '<?php echo site_url('data/get_orders'); ?>',
            type: 'POST',
            cache: false,
            data: {
                id: e.value,
            },
            success: function(html) {
                $('#order_item_id').html('');
                $('#order_id').html('').html(html);
            }
        });
    }
    function get_order_items (e) {
        $.ajax({
            url: '<?php echo site_url('data/get_order_items'); ?>',
            type: 'POST',
            cache: false,
            data: {
                id: e.value,
            },
            success: function(html) {
                $('#order_item_id').html('').html(html);
            }
        });
    }

</script>