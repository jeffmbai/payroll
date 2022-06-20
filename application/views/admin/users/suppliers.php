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

                <?php if ($CI->permissions('orgs_add')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">List</h3>
                                <div class="card-tools">
                                    <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#addSupplier">New Supplier</button>
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
                                                    <th>Name</th>
                                                    <th>Email </th>
                                                    <th>Phone </th>
                                                    <th>ID/ Passport </th>
                                                    <th>Address</th>
                                                    <th>Active </th>
                                                    <th class=" no-link last"><span class="nobr">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($business_users as $usr) {
                                                    $c++;
                                                    #skip me as the user logged in
                                                    if ($usr->email != $_SESSION['username']) {
                                                ?>
                                                        <tr class="even pointer">
                                                            <td><?php echo $usr->firstname . ' ' . $usr->secondname . ' ' . $usr->lastname; ?></td>
                                                            <td><a href="mailto:<?php echo $usr->email; ?>" target="_blank"> <?php echo $usr->email; ?></a></td>
                                                            <td>
                                                                <a href="tel:<?php echo $usr->phone; ?>"><?php echo $usr->phone; ?></a> <i class="success fa fa-phone"></i>
                                                            </td>
                                                            <td><?php echo $usr->id_passport; ?></td>
                                                            <td><?php echo $usr->address; ?></td>
                                                            <td class="a-right a-right ">
                                                                <?php
                                                                if ($usr->active == 1) echo "True";
                                                                else echo "False";
                                                                ?>
                                                            </td>
                                                            <td class=" last">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                                        <span class="caret"></span></button>
                                                                    <ul class="dropdown-menu">
                                                                        <!-- <li><a href="<?php echo site_url('users/profile/' . $usr->entity_id); ?>"><span class="fa fa-eye"></span> View</a></li> -->
                                                                        <li><a href="#" data-toggle="modal" data-target="#editUser<?php echo $usr->entity_id; ?>"><span class="fa fa-pencil"></span> Edit</a></li>
                                                                        <li><a href="<?php echo site_url('business/user_orders/' . $usr->entity_id); ?>"><span class="fa fa-shopping-cart"></span> Orders</a></li>
                                                                        <!-- <li><a href="<?php echo site_url('users/user_payments/' . $usr->entity_id); ?>"><span class="fa fa-money"></span> Payments</a></li> -->
                                                                    </ul>
                                                                </div>
                                                            </td>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="editUser<?php echo $usr->entity_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                                                            <h4 class="modal-title" id="myModalLabel">Details</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <form action="<?php echo site_url('users/update_supplier_customer/' . $usr->entity_id); ?>" method="post">
                                                                                    <div class="row">
                                                                                        <div class="col-md-4 col-sm-6 col-xs-6">
                                                                                            <label for="">First Name <span class="text text-danger">*</span> </label>
                                                                                            <input type="text" name="firstname" class="form-control" required value="<?php echo $usr->firstname; ?>" />
                                                                                        </div>
                                                                                        <div class="col-md-4 col-sm-6 col-xs-6">
                                                                                            <label for="">Second Name <span class="text text-danger">*</span> </label>
                                                                                            <input type="text" name="secondname" class="form-control" required value="<?php echo $usr->secondname; ?>" />
                                                                                        </div>
                                                                                        <div class="col-md-4 col-sm-6 col-xs-6">
                                                                                            <label for="">Last Name </label>
                                                                                            <input type="text" name="lastname" class="form-control" value="<?php echo $usr->lastname; ?>" />
                                                                                        </div>
                                                                                        <div class="col-md-4 col-sm-6 col-xs-6">
                                                                                            <label for="">Phone <span class="text text-danger">*</span> </label>
                                                                                            <input type="text" name="phone" class="form-control" required value="<?php echo $usr->phone; ?>" />
                                                                                        </div>
                                                                                        <div class="col-md-4 col-sm-6 col-xs-6">
                                                                                            <label for="">Email <span class="text text-danger">*</span> </label>
                                                                                            <input type="text" name="email" class="form-control" required value="<?php echo $usr->email; ?>" />
                                                                                        </div>
                                                                                        <div class="col-md-4 col-sm-6 col-xs-6">
                                                                                            <label for="">ID/ Passport <span class="text text-danger">*</span> </label>
                                                                                            <input type="text" name="id_passport" class="form-control" required value="<?php echo $usr->id_passport; ?>" />
                                                                                        </div>
                                                                                        <div class="col-md-4 col-sm-6 col-xs-6">
                                                                                            <label for="">Address </label>
                                                                                            <input type="text" name="entity_address" class="form-control" value="<?php echo $usr->entity_address; ?>" />
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-12" style="padding-top: 30px;">
                                                                                            <label> Active </label>
                                                                                            <input type="checkbox" class="" value="1" name="active">
                                                                                        </div>
                                                                                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                            <button type="Submit" class="btn btn-primary">Update</button>
                                                                                        </div>
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


<!-- Modal -->
<div class="modal fade" id="addSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                <h4 class="modal-title" id="myModalLabel">New Supplier</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="<?php echo site_url('users/add_supplier_customer/3'); ?>" method="post">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <label for="">First Name <span class="text text-danger">*</span> </label>
                                <input type="text" name="firstname" class="form-control" required />
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <label for="">Second Name <span class="text text-danger">*</span> </label>
                                <input type="text" name="secondname" class="form-control" required />
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <label for="">Last Name </label>
                                <input type="text" name="lastname" class="form-control" />
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <label for="">Phone <span class="text text-danger">*</span> </label>
                                <input type="text" name="phone" class="form-control" required />
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <label for="">Email <span class="text text-danger">*</span> </label>
                                <input type="text" name="email" class="form-control" required />
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <label for="">ID/ Passport <span class="text text-danger">*</span> </label>
                                <input type="text" name="id_passport" class="form-control" required />
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <label for="">Address </label>
                                <input type="text" name="entity_address" class="form-control" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="padding-top: 30px;">
                                <label> Active </label>
                                <input type="checkbox" class="" value="1" name="active">
                            </div>
                            <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="Submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>