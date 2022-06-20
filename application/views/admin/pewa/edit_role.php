<?php
$CI = &get_instance();
?>
<style>
    td {
        text-align: right !important;
    }
</style>

<?php
$role_id = $role->role_id;
$role_name = $role->role_name;
$active = $role->active;
$narrative = $role->narrative;
if ($role->permission == null) {
    $permission = array();
} else {
    $permission = json_decode($role->permission);
}

?>

<style>
    td {
        text-align: right !important;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <button class="pull-left backbtn" title="Back" onclick="window.history.back()"><i class="fa fa-arrow-left" aria-hidden="true"> </i></button>
                        <?php echo $page; ?>
                    </h1>
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

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card direct-chat direct-chat-warning">
                        <div class="card-header">
                            <h3 class="card-title">Update <?php echo $role_name; ?> role</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo site_url('systemroles/update_role/' . $role_id); ?>">

                                <div class="row">
                                    <div class="col-md-3 col-xs-12"></div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-3"><label> Role Name <span class="text text-danger">*</span> </label></div>
                                            <div class="col-md-9"><input type="text" name="role_name" value="<?php echo $role_name; ?>" class="form-control" required /></div>
                                        </div>
                                        <div class="row" style="padding-top: 10px;">
                                            <div class="col-md-3"><label> Active </label></div>
                                            <div class="col-md-9">
                                                <p><input type="checkbox" class="flat" value="1" name="active" <?php if ($active) echo 'checked'; ?>></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"><label> Narrative </label></div>
                                            <div class="col-md-9"><textarea class="form-control" name="narrative" placeholder="Write description here..."><?php echo $narrative; ?></textarea></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12"></div>
                                </div>
                                <hr />

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="col-sm-12 col-md-12 col-xs-12">

                                            <button type="button" data-toggle="collapse" data-target="#settings" class="btn btn-action tb_title"><span class="pull-left fa fa-angle-down"></span> System</button> <br />
                                            <div id="settings" class="col-md-12 table-responsive collapse show" style="padding: 0">
                                                <table class="table table-condensed table-striped">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Role Name</th>
                                                            <th>Select All</th>
                                                            <th>Permissions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>

                                                        <!-- DASHBOARD -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Dashboard</td>
                                                            <td> </td>
                                                            <td>
                                                                <input type="hidden" name="module[dashboard]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="dashboard" id='dashboard_view' name="permission[dashboard_view]" <?php if (in_array('dashboard_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- GENERAL SETTINGS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>General Settings</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="general" onclick="select_all('general')" id="general"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[banks]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="general" id='general_add' name="permission[general_add]" <?php if (in_array('general_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="general" id='general_edit' name="permission[general_edit]" <?php if (in_array('general_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="general" id='general_delete' name="permission[general_delete]" <?php if (in_array('general_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="general" id='general_view' name="permission[general_view]" <?php if (in_array('general_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- SYSTEM ROLES -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Role Management</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="roles" id="roles" onclick="select_all('roles')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[roles]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="roles" id='roles_add' name="permission[roles_add]" <?php if (in_array('roles_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="roles" id='roles_edit' name="permission[roles_edit]" <?php if (in_array('roles_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="roles" id='roles_delete' name="permission[roles_delete]" <?php if (in_array('roles_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="roles" id='roles_view' name="permission[roles_view]" <?php if (in_array('roles_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- BACKUPS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Backups</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="backup" id="backup" onclick="select_all('backup')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[backup]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="backup" id='backup_add' name="permission[backup_add]" <?php if (in_array('backup_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="backup" id='backup_download' name="permission[backup_download]" <?php if (in_array('backup_download', $permission)) echo 'checked'; ?>> Download
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="backup" id='backup_delete' name="permission[backup_delete]" <?php if (in_array('backup_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="backup" id='backup_view' name="permission[backup_view]" <?php if (in_array('backup_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <br />

                                            <!-- New Roles Start ///////////////////////////////////////////////// -->
                                            <button type="button" data-toggle="collapse" data-target="#purchases" class="btn btn-orange btn-action tb_title"><span class="pull-left fa fa-angle-down"></span> Purchase</button> <br />
                                            <div id="purchases" class="col-md-12 table-responsive collapse" style="padding: 0">
                                                <table class="table table-condensed table-striped">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Role Name</th>
                                                            <th>Select All</th>
                                                            <th>Permissons</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- PURCHASE -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Purchase</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="purchase" id="purchase" onclick="select_all('purchase')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[purchase]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="purchase" id='purchase_add' name="permission[purchase_add]" <?php if (in_array('purchase_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="purchase" id='purchase_edit' name="permission[purchase_edit]" <?php if (in_array('purchase_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="purchase" id='purchase_view' name="permission[purchase_view]" <?php if (in_array('purchase_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="purchase" id='purchase_delete' name="permission[purchase_delete]" <?php if (in_array('purchase_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="purchase" id='purchase_payment' name="permission[purchase_payment]" <?php if (in_array('purchase_payment', $permission)) echo 'checked'; ?>> Purchase payment
                                                                    </label></div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br />

                                            <button type="button" data-toggle="collapse" data-target="#sales" class="btn btn-orange btn-action tb_title"><span class="pull-left fa fa-angle-down"></span> Sales</button> <br />
                                            <div id="sales" class="col-md-12 table-responsive collapse" style="padding: 0">
                                                <table class="table table-condensed table-striped">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Role Name</th>
                                                            <th>Select All</th>
                                                            <th>Permissons</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- GENERAL SALE -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>General Sales</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="salesgeneral" id="salesgeneral" onclick="select_all('salesgeneral')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[salesgeneral]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="salesgeneral" id='salesgeneral_view' name="permission[salesgeneral_view]" <?php if (in_array('salesgeneral_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- SALE -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Sale</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="sale" id="sale" onclick="select_all('sale')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[sale]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="sale" id='sale_add' name="permission[sale_add]" <?php if (in_array('purchase_payment', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="sale" id='sale_edit' name="permission[sale_edit]" <?php if (in_array('purchase_payment', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="sale" id='sale_view' name="permission[sale_view]" <?php if (in_array('purchase_payment', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="sale" id='sale_delete' name="permission[sale_delete]" <?php if (in_array('purchase_payment', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="sale" id='sale_payment' name="permission[sale_payment]" <?php if (in_array('purchase_payment', $permission)) echo 'checked'; ?>> Sale payment
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- RETURNS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Returns</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="returns" id="returns" onclick="select_all('returns')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[sale]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="returns" id='returns_add' name="permission[returns_add]" <?php if (in_array('returns_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="returns" id='returns_edit' name="permission[returns_edit]" <?php if (in_array('returns_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="returns" id='returns_view' name="permission[returns_view]" <?php if (in_array('returns_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="returns" id='returns_delete' name="permission[returns_delete]" <?php if (in_array('returns_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br />

                                            <button type="button" data-toggle="collapse" data-target="#products" class="btn btn-orange btn-action tb_title"><span class="pull-left fa fa-angle-down"></span> Products</button> <br />
                                            <div id="products" class="col-md-12 table-responsive collapse" style="padding: 0">
                                                <table class="table table-condensed table-striped">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Role Name</th>
                                                            <th>Select All</th>
                                                            <th>Permissons</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- GENERAL VIEW -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>General View</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="general_product" id="general_product" onclick="select_all('general_product')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[general_product]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="general_product" id='general_product_view' name="permission[general_product_view]" <?php if (in_array('general_product_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                            </td>
                                                        </tr>
                                                        <!-- ITEMS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Items</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="items" id="items" onclick="select_all('items')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[items]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="items" id='item_add' name="permission[item_add]" <?php if (in_array('item_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="items" id='item_edit' name="permission[item_edit]" <?php if (in_array('item_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="items" id='item_view' name="permission[item_view]" <?php if (in_array('item_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="items" id='item_delete' name="permission[item_delete]" <?php if (in_array('item_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="items" id='item_breakdown' name="permission[item_breakdown]" <?php if (in_array('item_breakdown', $permission)) echo 'checked'; ?>> Item Breakdown
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- ITEMS REQUESTS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Item Requests</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="items_request" id="items_request" onclick="select_all('items_request')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[items_request]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="items_request" id='item_request_approve' name="permission[item_request_approve]" <?php if (in_array('item_request_approve', $permission)) echo 'checked'; ?>> Approve
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="items_request" id='item_request_add' name="permission[item_request_add]" <?php if (in_array('item_request_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="items_request" id='item_request_edit' name="permission[item_request_edit]" <?php if (in_array('item_request_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="items_request" id='item_request_view' name="permission[item_request_view]" <?php if (in_array('item_request_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="items_request" id='item_request_delete' name="permission[item_request_delete]" <?php if (in_array('item_request_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- STOCKS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Stocks</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="stocks" id="stocks" onclick="select_all('stocks')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[stocks]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="stocks" id='stock_add' name="permission[stock_add]" <?php if (in_array('stock_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="stocks" id='stock_edit' name="permission[stock_edit]" <?php if (in_array('stock_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="stocks" id='stock_view' name="permission[stock_view]" <?php if (in_array('stock_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="stocks" id='stock_delete' name="permission[stock_delete]" <?php if (in_array('stock_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="stocks" id='stock_reconciliation' name="permission[stock_reconciliation]" <?php if (in_array('stock_reconciliation', $permission)) echo 'checked'; ?>> Reconciliation
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="stocks" id='stock_move' name="permission[stock_move]" <?php if (in_array('stock_move', $permission)) echo 'checked'; ?>> Move Stock
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- RECIPE -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Recipe</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="recipe" id="recipe" onclick="select_all('recipe')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[recipe]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="recipe" id='recipe_add' name="permission[recipe_add]" <?php if (in_array('recipe_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="recipe" id='recipe_edit' name="permission[recipe_edit]" <?php if (in_array('recipe_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="recipe" id='recipe_view' name="permission[recipe_view]" <?php if (in_array('recipe_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="recipe" id='recipe_delete' name="permission[recipe_delete]" <?php if (in_array('recipe_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <br />

                                            <button type="button" data-toggle="collapse" data-target="#roomz" class="btn btn-orange btn-action tb_title"><span class="pull-left fa fa-angle-down"></span> Rooms</button> <br />
                                            <div id="roomz" class="col-md-12 table-responsive collapse" style="padding: 0">
                                                <table class="table table-condensed table-striped">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Role Name</th>
                                                            <th>Select All</th>
                                                            <th>Permissons</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- ROOMS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Rooms</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="room" id="room" onclick="select_all('items')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[room]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="room" id='room_add' name="permission[room_add]" <?php if (in_array('room_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="room" id='room_edit' name="permission[room_edit]" <?php if (in_array('room_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="room" id='room_view' name="permission[room_view]" <?php if (in_array('room_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="room" id='room_delete' name="permission[room_delete]" <?php if (in_array('room_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="room" id='room_configs' name="permission[room_configs]" <?php if (in_array('room_configs', $permission)) echo 'checked'; ?>> Room Configs
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- BOOKINGS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Bookings</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="bookings" id="bookings" onclick="select_all('bookings')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[bookings]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="bookings" id='bookings_add' name="permission[bookings_add]" <?php if (in_array('bookings_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="bookings" id='bookings_edit' name="permission[bookings_edit]" <?php if (in_array('bookings_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="bookings" id='bookings_delete' name="permission[bookings_delete]" <?php if (in_array('bookings_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="bookings" id='bookings_view' name="permission[bookings_view]" <?php if (in_array('bookings_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <br />

                                            <button type="button" data-toggle="collapse" data-target="#payrolls" class="btn btn-orange btn-action tb_title"><span class="pull-left fa fa-angle-down"></span> Payroll</button> <br />
                                            <div id="payrolls" class="col-md-12 table-responsive collapse" style="padding: 0">
                                                <table class="table table-condensed table-striped">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Role Name</th>
                                                            <th>Select All</th>
                                                            <th>Permissons</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- PAYROLL -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Payroll</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="payroll" id="payroll" onclick="select_all('payroll')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[payroll]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="payroll" id='payroll_add' name="permission[payroll_add]" <?php if (in_array('payroll_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="payroll" id='payroll_edit' name="permission[payroll_edit]" <?php if (in_array('payroll_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="payroll" id='payroll_view' name="permission[payroll_view]" <?php if (in_array('payroll_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="payroll" id='payroll_delete' name="permission[payroll_delete]" <?php if (in_array('payroll_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <br />

                                            <button type="button" data-toggle="collapse" data-target="#notifications" class="btn btn-orange btn-action tb_title"><span class="pull-left fa fa-angle-down"></span> Notifications</button> <br />
                                            <div id="notifications" class="col-md-12 table-responsive collapse" style="padding: 0">
                                                <table class="table table-condensed table-striped">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Role Name</th>
                                                            <th>Select All</th>
                                                            <th>Permissons</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- BULKSMS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Bulk SMS</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="sms" id="sms" onclick="select_all('sms')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[sms]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="sms" id='sms_add' name="permission[sms_add]" <?php if (in_array('sms_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="sms" id='sms_edit' name="permission[sms_edit]" <?php if (in_array('sms_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="sms" id='sms_view' name="permission[sms_view]" <?php if (in_array('sms_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="sms" id='sms_delete' name="permission[sms_delete]" <?php if (in_array('sms_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <br />

                                            <button type="button" data-toggle="collapse" data-target="#accounting" class="btn btn-orange btn-action tb_title"><span class="pull-left fa fa-angle-down"></span> Accounting</button> <br />
                                            <div id="accounting" class="col-md-12 table-responsive collapse" style="padding: 0">
                                                <table class="table table-condensed table-striped">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Role Name</th>
                                                            <th>Select All</th>
                                                            <th>Permissons</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- PETTY CASH -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Petty Cash</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="pettycash" id="pettycash" onclick="select_all('pettycash')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[pettycash]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="pettycash" id='pettycash_approval' name="permission[pettycash_approval]" <?php if (in_array('pettycash_approval', $permission)) echo 'checked'; ?> > Approval
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="pettycash" id='pettycash_allocation' name="permission[pettycash_allocation]" <?php if (in_array('pettycash_allocation', $permission)) echo 'checked'; ?> > Allocation
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="pettycash" id='pettycash_add' name="permission[pettycash_add]" <?php if (in_array('pettycash_add', $permission)) echo 'checked'; ?> > Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="pettycash" id='pettycash_edit' name="permission[pettycash_edit]" <?php if (in_array('pettycash_edit', $permission)) echo 'checked'; ?> > Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="pettycash" id='pettycash_view' name="permission[pettycash_view]" <?php if (in_array('pettycash_view', $permission)) echo 'checked'; ?> > View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="pettycash" id='pettycash_delete' name="permission[pettycash_delete]" <?php if (in_array('pettycash_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- BUDGETING -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Budgeting</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="budget" id="budget" onclick="select_all('budget')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[budget]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="budget" id='budget_add' name="permission[budget_add]" <?php if (in_array('budget_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="budget" id='budget_edit' name="permission[budget_edit]" <?php if (in_array('budget_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="budget" id='budget_view' name="permission[budget_view]" <?php if (in_array('budget_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="budget" id='budget_delete' name="permission[budget_delete]" <?php if (in_array('budget_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- EXPENSES -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Expenses & Payments</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="expense" id="expense" onclick="select_all('expense')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[expense]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="expense" id='expense_add' name="permission[expense_add]" <?php if (in_array('expense_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="expense" id='expense_edit' name="permission[expense_edit]" <?php if (in_array('expense_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="expense" id='expense_view' name="permission[expense_view]" <?php if (in_array('expense_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="expense" id='expense_delete' name="permission[expense_delete]" <?php if (in_array('expense_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- INCOME -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Income</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="income" id="income" onclick="select_all('income')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[income]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="income" id='income_add' name="permission[income_add]" <?php if (in_array('income_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="income" id='income_edit' name="permission[income_edit]" <?php if (in_array('income_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="income" id='income_view' name="permission[income_view]" <?php if (in_array('income_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="income" id='income_delete' name="permission[income_delete]" <?php if (in_array('income_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- JOURNAL ENTRY -->
                                                        <tr>
                                                                <td><?= $i++; ?></td>
                                                                <td>Journal Entry</td>
                                                                <td>
                                                                    <div class="checkbox"><label>
                                                                            <input type="checkbox" class="journalentry" id="journalentry" onclick="select_all('journalentry')"> Select all
                                                                        </label></div>
                                                                </td>
                                                                <td>
                                                                    <input type="hidden" name="module[journalentry]" value="on">
                                                                    <div class="checkbox"><label>
                                                                            <input type="checkbox" class="journalentry" id='journalentry_add' name="permission[journalentry_add]" <?php if (in_array('journalentry_add', $permission)) echo 'checked'; ?> > Add
                                                                        </label></div>
                                                                </td>
                                                            </tr>

                                                        <!-- ACCOUNITNG CONFIGS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Accounting Configs</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="acconfigs" id="acconfigs" onclick="select_all('acconfigs')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[acconfigs]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="acconfigs" id='acconfigs_add' name="permission[acconfigs_add]" <?php if (in_array('acconfigs_add', $permission)) echo 'checked'; ?> > Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="acconfigs" id='acconfigs_edit' name="permission[acconfigs_edit]" <?php if (in_array('acconfigs_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="acconfigs" id='acconfigs_view' name="permission[acconfigs_view]" <?php if (in_array('acconfigs_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="acconfigs" id='acconfigs_delete' name="permission[acconfigs_delete]" <?php if (in_array('acconfigs_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- ACCOUNITNG REPORTS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Accounting Reports</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="accountreports" id="accountreports" onclick="select_all('accountreports')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[accountreports]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="accountreports" id='accountreports_view' name="permission[accountreports_view]" <?php if (in_array('accountreports_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <br />
                                            <!-- New Roles End //////////////////////////////////////////////////////////-->


                                            <button type="button" data-toggle="collapse" data-target="#organization" class="btn btn-orange btn-action tb_title"><span class="pull-left fa fa-angle-down"></span> Organization</button> <br />
                                            <div id="organization" class="col-md-12 table-responsive collapse" style="padding: 0">
                                                <table class="table table-condensed table-striped">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Role Name</th>
                                                            <th>Select All</th>
                                                            <th>Permissons</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ($_SESSION['superuser'] == 1) : ?>
                                                            <!-- ORGANIZATION -->
                                                            <tr>
                                                                <td><?= $i++; ?></td>
                                                                <td>Organizations</td>
                                                                <td>
                                                                    <div class="checkbox"><label>
                                                                            <input type="checkbox" class="org" id="org" onclick="select_all('org')"> Select all
                                                                        </label></div>
                                                                </td>
                                                                <td>
                                                                    <input type="hidden" name="module[org]" value="on">
                                                                    <div class="checkbox"><label>
                                                                            <input type="checkbox" class="org" id='org_add' name="permission[org_add]" <?php if (in_array('org_add', $permission)) echo 'checked'; ?>> Add
                                                                        </label></div>
                                                                    <div class="checkbox"><label>
                                                                            <input type="checkbox" class="org" id='org_edit' name="permission[org_edit]" <?php if (in_array('org_edit', $permission)) echo 'checked'; ?>> Edit
                                                                        </label></div>
                                                                    <div class="checkbox"><label>
                                                                            <input type="checkbox" class="org" id='org_view' name="permission[org_view]" <?php if (in_array('org_view', $permission)) echo 'checked'; ?>> View
                                                                        </label></div>
                                                                    <div class="checkbox"><label>
                                                                            <input type="checkbox" class="org" id='org_delete' name="permission[org_delete]" <?php if (in_array('org_delete', $permission)) echo 'checked'; ?>> Delete
                                                                        </label></div>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>

                                                        <!-- STATIONS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Stations</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="stations" id="stations" onclick="select_all('stations')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[stations]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="stations" id='stations_add' name="permission[stations_add]" <?php if (in_array('stations_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="stations" id='stations_edit' name="permission[stations_edit]" <?php if (in_array('stations_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="stations" id='stations_view' name="permission[stations_view]" <?php if (in_array('stations_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="stations" id='stations_delete' name="permission[stations_delete]" <?php if (in_array('stations_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- DEPARTMENTS & SUB-DEPARTMENTS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Departments & Sub-Departments</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="department" id="department" onclick="select_all('department')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[department]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="department" id='departments_add' name="permission[departments_add]" <?php if (in_array('departments_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="department" id='departments_edit' name="permission[departments_edit]" <?php if (in_array('departments_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="department" id='departments_view' name="permission[departments_view]" <?php if (in_array('departments_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="department" id='departments_delete' name="permission[departments_delete]" <?php if (in_array('departments_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br />

                                            <button type="button" data-toggle="collapse" data-target="#user_m" class="btn btn-orange btn-action tb_title"><span class="pull-left fa fa-angle-down"></span> User Management</button> <br />
                                            <div id="user_m" class="col-md-12 table-responsive collapse" style="padding: 0">
                                                <table class="table table-condensed table-striped">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Role Name</th>
                                                            <th>Select All</th>
                                                            <th>Permissions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- USERS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>System Users</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="users" id="users" onclick="select_all('users')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[users]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="users" id='users_add' name="permission[users_add]" <?php if (in_array('users_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="users" id='users_edit' name="permission[users_edit]" <?php if (in_array('users_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="users" id='users_delete' name="permission[users_delete]" <?php if (in_array('users_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="users" id='users_view' name="permission[users_view]" <?php if (in_array('users_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- STAFF -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Staff</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="staff" id="staff" onclick="select_all('staff')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[staff]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="staff" id='staff_add' name="permission[staff_add]" <?php if (in_array('staff_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="staff" id='staff_edit' name="permission[staff_edit]" <?php if (in_array('staff_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="staff" id='staff_delete' name="permission[staff_delete]" <?php if (in_array('staff_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="staff" id='staff_view' name="permission[staff_view]" <?php if (in_array('staff_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- CUSTOMERS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Customers</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="customer" id="customer" onclick="select_all('customer')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[customer]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="customer" id='customer_add' name="permission[customer_add]" <?php if (in_array('customer_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="customer" id='customer_edit' name="permission[customer_edit]" <?php if (in_array('customer_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="customer" id='customer_delete' name="permission[customer_delete]" <?php if (in_array('customer_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="customer" id='customer_view' name="permission[customer_view]" <?php if (in_array('customer_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- SUPPLIERS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Suppliers</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="supplier" id="supplier" onclick="select_all('supplier')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[supplier]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="supplier" id='supplier_add' name="permission[supplier_add]" <?php if (in_array('supplier_add', $permission)) echo 'checked'; ?>> Add
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="supplier" id='supplier_edit' name="permission[supplier_edit]" <?php if (in_array('supplier_edit', $permission)) echo 'checked'; ?>> Edit
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="supplier" id='supplier_delete' name="permission[supplier_delete]" <?php if (in_array('supplier_delete', $permission)) echo 'checked'; ?>> Delete
                                                                    </label></div>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="supplier" id='supplier_view' name="permission[supplier_view]" <?php if (in_array('supplier_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <br />

                                            <button type="button" data-toggle="collapse" data-target="#reports" class="btn btn-orange btn-action tb_title"><span class="pull-left fa fa-angle-down"></span> Reports</button> <br />
                                            <div id="reports" class="col-md-12 table-responsive collapse" style="padding: 0">
                                                <table class="table table-condensed table-striped">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Role Name</th>
                                                            <th>Select All</th>
                                                            <th>Permissions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <!-- GENERAL REPORTS -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>General Reports</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="reports" id="reports" onclick="select_all('reports')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[reports]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="reports" id='reports_view' name="permission[reports_view]" <?php if (in_array('reports_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                        <!-- DEPT MANAGEMENT -->
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td>Debt Management</td>
                                                            <td>
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="debtmanagement" id="debtmanagement" onclick="select_all('debtmanagement')"> Select all
                                                                    </label></div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="module[debtmanagement]" value="on">
                                                                <div class="checkbox"><label>
                                                                        <input type="checkbox" class="debtmanagement" id='debtmanagement_view' name="permission[debtmanagement_view]" <?php if (in_array('debtmanagement_view', $permission)) echo 'checked'; ?>> View
                                                                    </label></div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <br />

                                        </div>
                                    </div>
                                </div>

                                <hr />
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <button type="submit" name="tuma" value="tuma" class="btn btn-primary">Update <span class="fa fa-save"></span> </button>
                                    </div>
                                </div>
                            </form>
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




<script>
    function select_all(cl) {
        //check the value if checked or not. 
        var checked = $('#' + cl).is(':checked');

        if (checked) {
            $('.' + cl).attr("checked", true);
            console.log(cl + " -> Yyyey");
        } else {
            $('.' + cl).attr("checked", false);
            console.log(cl + " -> Nnney");
        }
        return;
    }
</script>