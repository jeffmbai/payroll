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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table id="example1" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th>Name</th>
                                                <th>Email </th>
                                                <th>Phone </th>
                                                <th>ID/ Passport </th>
                                                <th>Org </th>
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
                                                        <td><?php echo $usr->org_name; ?></td>
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
                                                                    <li><a href="<?php echo site_url('users/profile/' . $usr->entity_id); ?>"><span class="fa fa-eye"></span> View</a></li>
                                                                    <li><a href="<?php echo site_url('business/user_orders/' . $usr->entity_id); ?>"><span class="fa fa-shopping-cart"></span> Orders</a></li>
                                                                    <!-- <li><a href="<?php echo site_url('users/user_payments/' . $usr->entity_id); ?>"><span class="fa fa-money"></span> Payments</a></li> -->
                                                                </ul>
                                                            </div>
                                                        </td>
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

            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->