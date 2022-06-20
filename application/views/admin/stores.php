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
                                <form action="<?php echo site_url('submitform/add_org'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12">
                                            <label for="">Select Parent Store/Organization <span class="text text-danger">*</span> </label>
                                            <select class="select2 form-control" name="org_id" required>
                                                <option value="">~Select org~</option>
                                                <?php
                                                if ($_SESSION['superuser'] == 1) {
                                                    foreach ($all_stores as $org) {
                                                ?>
                                                        <option value="<?php echo $org->org_id ?>"> <?php echo $org->org_name; ?> </option>
                                                    <?php
                                                    }
                                                } else {
                                                    foreach ($all_stores as $org) {
                                                        if ($org->org_id != $_SESSION['orgid']) continue;
                                                    ?>
                                                        <option value="<?php echo $org->org_id ?>"> <?php echo $org->org_name; ?> </option>
                                                <?php
                                                    }
                                                }

                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <label for="">Store Name <span class="text text-danger">*</span> </label>
                                            <input type="text" name="name" class="form-control" required />
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <label for="">Address <span class="text text-danger">*</span> </label>
                                            <input type="text" name="address" class="form-control" required />
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <label for="">Email <span class="text text-danger">*</span> </label>
                                            <input type="text" name="email" class="form-control" required />
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <label for="">Phone <span class="text text-danger">*</span> </label>
                                            <input type="number" name="phone" class="form-control" required />
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <label for="">Country <span class="text text-danger">*</span> </label>
                                            <select name="country" class="select2 form-control" id="">
                                                <option>Select country</option>
                                                <?php
                                                foreach ($countries as $nchi) {
                                                ?>
                                                    <option value="<?php echo $nchi->country_id; ?>" <?php if ($nchi->country_id == 119) echo "Selected"; ?>> <?php echo $nchi->name ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <label for="">Currency <span class="text text-danger">*</span> </label>
                                            <select name="currency" class="select2 form-control" id="">
                                                <option>Select currency</option>
                                                <?php
                                                foreach ($currencies as $sarafu) {
                                                ?>
                                                    <option value="<?php echo $sarafu->currency_id; ?>" <?php if ($sarafu->currency_id == 1) echo "Selected"; ?>> <?php echo $sarafu->currency_code; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- <div class="col-md-6 col-xs-12">
                                <label> Active </label>
                                <p>
                                    <input type="checkbox" class="flat" value="1" checked name="active">
                                </p>
                            </div>  -->

                                        <div class="col-md-6 col-xs-12">
                                            <label> Make Default Selling Point </label>
                                            <p>
                                                Yes <input type="radio" value="yes" name="default_sp">
                                            </p>
                                            <p>
                                                No <input type="radio" value="no" checked name="default_sp">
                                            </p>
                                        </div>
                                        <div class="col-md-12 col-xs-12">
                                            <label for="">Narrative </label>
                                            <textarea name="narrative" id="" class="form-control"></textarea>
                                        </div>
                                        <div class="col-md-12 col-xs-12" style="padding-top: 15px; margin-top: 15px;">
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
                                    <div class="col-md-12 col-xs-12 table-responsive">
                                        <table id="example1" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Store Name</th>
                                                    <th>Parent Org</th>
                                                    <th>Address</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Default SP</th>
                                                    <th>Currency</th>
                                                    <th>Country</th>
                                                    <th class=" no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                $parent_org = null;
                                                foreach ($all_stores as $store) {
                                                    $parent_org = $this->db->select("org_name")->from("orgs")->where("org_id", $store->parent_org)->get()->row('org_name');
                                                    $c++;
                                                    if ($_SESSION['superuser'] == 1) {
                                                ?>
                                                        <tr class="even pointer">
                                                            <td><?php echo $store->org_name; ?></td>
                                                            <td><?php echo $parent_org; ?></td>
                                                            <td><?php echo $store->address; ?></td>
                                                            <td><?php echo $store->email; ?></td>
                                                            <td><?php echo $store->phone; ?></td>
                                                            <td><?php echo $store->default_sp; ?></td>
                                                            <td><?php echo $store->currency_code; ?></td>
                                                            <td><?php echo $store->country_name; ?></td>
                                                            <td class=" last">
                                                                <!-- <a href="<?php echo site_url('sys/store_profile/' . $store->org_id); ?>" class="btn btn-rgp btn-xs"><span class="fa fa-eye"></span></a> -->
                                                                <a href="" class="btn btn-rgp btn-xs" data-toggle="modal" data-target="#editModal<?= $store->org_id ?>"><span class="fa fa-edit"></span></a>
                                                                <a href="<?php echo site_url('sys/orders?str=' . $store->org_id); ?>" class="btn btn-xs btn-rgs"> <i class="fa fa-shopping-cart"></i> </a>
                                                                <?php if ($store->org_id != 1) { ?>
                                                                    <a href="<?php echo site_url('delete/org/' . $store->org_id); ?>" class="btn btn-rgd btn-xs"><span class="fa fa-trash"></span></a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php

                                                    } else {
                                                        if ($store->parent_org != $_SESSION['orgid']) continue;
                                                    ?>
                                                        <tr class="even pointer">
                                                            <td><?php echo $store->org_name; ?></td>
                                                            <td><?php echo $parent_org; ?></td>
                                                            <td><?php echo $store->address; ?></td>
                                                            <td><?php echo $store->email; ?></td>
                                                            <td><?php echo $store->phone; ?></td>
                                                            <td><?php echo $store->currency_code; ?></td>
                                                            <td><?php echo $store->country_name; ?></td>
                                                            <td class=" last">
                                                                <a href="" class="btn btn-rgp btn-xs" data-toggle="modal" title="Edit store" data-target="#editModal<?= $store->org_id ?>"><span class="fa fa-edit"></span></a>
                                                                <a href="<?php echo site_url('sys/orders?str=' . $store->org_id); ?>" title="Store orders" class="btn btn-xs btn-rgs"> <i class="fa fa-shopping-cart"></i> </a>
                                                                <?php if ($store->org_id != 1) { ?>
                                                                    <a href="<?php echo site_url('delete/org/' . $store->org_id); ?>" title="Delete store ?" class="btn btn-rgd btn-xs"><span class="fa fa-trash"></span></a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }

                                                    ?>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal<?php echo $store->org_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                                                    <h4 class="modal-title" id="myModalLabel">Store</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">

                                                                        <form action="<?php echo site_url('submitform/update_org/' . $store->org_id); ?>" method="post">
                                                                            <div class="col-md-12 col-xs-12">
                                                                                <label for="">Select Parent Store/Organization <span class="text text-danger">*</span> </label>
                                                                                <select class="select2 form-control" name="org_id" required style="width: 100%;">
                                                                                    <option value="">~Select org~</option>
                                                                                    <?php
                                                                                    if ($_SESSION['superuser'] == 1) {
                                                                                        foreach ($all_stores as $org) {
                                                                                    ?>
                                                                                            <option value="<?php echo $org->org_id ?>" <?php if ($org->org_id == $store->org_id) echo "selected"; ?>> <?php echo $org->org_name; ?> </option>
                                                                                        <?php
                                                                                        }
                                                                                    } else {
                                                                                        foreach ($all_stores as $org) {
                                                                                            if ($org->org_id != $_SESSION['orgid']) continue;
                                                                                        ?>
                                                                                            <option value="<?php echo $org->org_id ?>" <?php if ($org->org_id == $store->org_id) echo "selected"; ?>> <?php echo $org->org_name; ?> </option>
                                                                                    <?php
                                                                                        }
                                                                                    }

                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-6 col-xs-12">
                                                                                <label for="">Store Name <span class="text text-danger">*</span> </label>
                                                                                <input type="text" name="name" class="form-control" value="<?= $store->org_name; ?>" required />
                                                                            </div>
                                                                            <div class="col-md-6 col-xs-12">
                                                                                <label for="">Address <span class="text text-danger">*</span> </label>
                                                                                <input type="text" name="address" class="form-control" value="<?= $store->address; ?>" required />
                                                                            </div>
                                                                            <div class="col-md-6 col-xs-12">
                                                                                <label for="">Email <span class="text text-danger">*</span> </label>
                                                                                <input type="text" name="email" class="form-control" value="<?= $store->email; ?>" required />
                                                                            </div>
                                                                            <div class="col-md-6 col-xs-12">
                                                                                <label for="">Phone <span class="text text-danger">*</span> </label>
                                                                                <input type="number" name="phone" class="form-control" value="<?= $store->phone; ?>" required />
                                                                            </div>
                                                                            <div class="col-md-6 col-xs-12">
                                                                                <label for="">Country <span class="text text-danger">*</span> </label>
                                                                                <select name="country" class="select2 form-control" id="" style="width: 100%;">
                                                                                    <option>Select country</option>
                                                                                    <?php
                                                                                    foreach ($countries as $nchi) {
                                                                                    ?>
                                                                                        <option value="<?php echo $nchi->country_id; ?>" <?php if ($nchi->country_id == $store->country_id) echo "Selected"; ?>> <?php echo $nchi->name ?> </option>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-6 col-xs-12">
                                                                                <label for="">Currency <span class="text text-danger">*</span> </label>
                                                                                <select name="currency" class="select2 form-control" id="" style="width: 100%;">
                                                                                    <option>Select currency</option>
                                                                                    <?php
                                                                                    foreach ($currencies as $sarafu) {
                                                                                    ?>
                                                                                        <option value="<?php echo $sarafu->currency_id; ?>" <?php if ($sarafu->currency_id == $store->currency_id) echo "Selected"; ?>> <?php echo $sarafu->currency_code; ?> </option>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <!-- <div class="col-md-6 col-xs-12">
                                                                <label> Active </label>
                                                                <p>
                                                                    <input type="checkbox" class="flat" value="1" checked name="active">
                                                                </p>
                                                            </div>  -->

                                                                            <div class="col-md-6 col-xs-12">
                                                                                <label> Make Default Selling Point </label>
                                                                                <p>
                                                                                    Yes <input type="radio" value="yes" name="default_sp" <?= ($store->default_sp == 'yes') ? 'checked' : '' ?>>
                                                                                </p>
                                                                                <p>
                                                                                    No <input type="radio" value="no" name="default_sp" <?= ($store->default_sp == 'no') ? 'checked' : '' ?>>
                                                                                </p>
                                                                            </div>

                                                                            <div class="col-md-12 col-xs-12">
                                                                                <label for="">Narrative </label>
                                                                                <textarea name="narrative" id="" class="form-control"> <?= $store->org_narrative ?></textarea>
                                                                            </div>
                                                                            <div class="col-md-12 col-xs-12" style="padding-top: 15px; margin-top: 15px;">
                                                                                <button type="Submit" class="btn btn-primary pull-right">Update</button>
                                                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

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