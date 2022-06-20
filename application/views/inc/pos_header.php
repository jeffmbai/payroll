<?php
$CI = &get_instance();
?>
<?php
$name = null;
$email = null;
$phone = null;
$pic = null;
foreach ($active_user as $user) {
    $name = $user->firstname . ' ' . $user->lastname;
    $email = $user->email;
    $phone = $user->phone;
    $pic = $user->profile_picture;
}
$org = $this->db->where('org_id', $_SESSION['orgid'])->get('orgs')->row();
$_SESSION['orgname'] = $org->org_name;
// $page = str_replace('_', ' ', $page);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php echo $page; ?> | Portal </title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">

    <!-- Custom style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/custom.css">
    
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- CDN Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/POS-JiPOS-icon.png'); ?>" />

    <!-- Others Start -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Others End -->

    <!-- Sweet alert -->
    <script src="<?php echo base_url(); ?>assets/dist/js/sweetalert/sweetalert.min.js"></script>

    <style type="text/css">
        .rm_border_top {
            border-top: none !important;
        }

        .pd_right {
            text-align: right;
        }

        .bd_left {
            border-left: 2px solid !important;
            text-align: left;
        }

        .form-control {
            height: 42px;
        }

        .top_nav {
            margin-left: 0px !important;
        }

        .right_col {
            padding: 10px 20px 0;
            margin-left: 0px !important;
            width: 100%;
        }

        .nav_menu {
            float: left;
            background: #EDEDED;
            border-bottom: 1px solid black !important;
            margin-bottom: 10px;
            width: 100%;
            box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.2), 0 4px 20px 0 rgba(0, 0, 0, 0.19) !important;
        }

        .my-btn {
            background-color: #E1E1E1;
            border-radius: 0px;
            border-top: none;
            border-right: none;
            border-left: 2px solid black;
            border-bottom: 3px solid black;
            color: black !important;
            font-weight: bold;
        }

        .my-a {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        #active {
            border: unset !important;
            color: #fff !important;
            background: #017870 !important;
        }

        .wrapper {
            position: relative;
            display: inline-block;
        }

        .close:before {
            /* content: '✕'; */
        }

        .close {
            position: absolute;
            top: 0;
            right: 0;
            cursor: pointer;
        }

        .btn-rgp {
            border: 1px solid #1177BB;
            color: #000;
        }

        .btn-rgp:hover {
            background-color: #569CD6;
        }

        .btn-rgs {
            border: 1px solid green;
            color: green;
        }

        .btn-rgs:hover {
            background-color: #AEDAE4;
        }

        .btn-rgd {
            border: 1px solid red;
            color: red;
        }
    </style>

</head>

<body id="body" class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed layout-top-nav">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo site_url('') ?>" class="nav-link my-btn" <?php if ($page == 'Dashboard') echo 'id="active"'; ?>>Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link my-btn" data-toggle="modal" data-target="#contact">Contact</a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= site_url('business/item_return') ?>" class="nav-link my-btn" <?php if ($page == 'item_return') echo 'id="active"'; ?>>Returns</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= site_url('business/item_request') ?>" class="nav-link my-btn" <?php if ($page == 'Item Request') echo 'id="active"'; ?>>Request Item</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo site_url('rooms/book_room') ?>" class="nav-link my-btn" <?php if ($page == 'Book Room') echo 'id="active"'; ?>>Book Room</a>
                </li> -->

                <?php
                $unpaid = $this->db->select('a.*, b.eating_table_name')
                                    ->from('orders as a')
                                    ->join('eating_tables as b', 'a.eating_table_id = b.eating_table_id')
                                    ->where("a.entity_id = $_SESSION[userid] AND a.paid_status = 0")
                                    ->order_by('a.date_time desc')
                                    ->get();
                ?>

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" data-toggle="modal" data-target="#unpaidModal" class="nav-link my-btn" <?php if ($page == 'Edit Sales') echo 'id="active"'; ?>>Open Sales <span class="badge badge-success navbar-badge"><?= $unpaid->num_rows() ?></span> </a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a href="#" title="Select selling point" class="nav-link" role="button" data-toggle="modal" data-target="#sp"> <u>Selling Point</u> </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" title="Logout" href="<?php echo site_url('pages/pos_signin'); ?>" role="button"><i class="fa fa-sign-out"></i></a>
                </li>

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="<?php echo base_url('assets/images/profile/' . $pic); ?>" class="img-dot-circle-o elevation-2" style="height: 30px;" alt="User Image">
                        <?php echo $name; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="<?= site_url('sys/my_profile'); ?>" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> My Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo site_url('pages/logout'); ?>" class="dropdown-item text-orange">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Modal -->
        <div class="modal fade" id="unpaidModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?=$_SESSION['firstname']?> Unsettled Orders</h5>
                    </div>
                    <div class="modal-body" style="max-height: 700px; overflow-y: scroll;">
                        <div class="row">
                            <div class="col-md-12">
                                <p><i class="fa fa-info-circle"></i> This presents the list of all your unpaid/unsettled orders. Pick any order to add more items. The receipt generated will be only for the added items. Visit the <code>admin</code> / <code>cashier</code> to get the whole receipt printed.</p>
                            </div>
                            <div class="col-12 table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead class="bg-orange">
                                        <tr>
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Point</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $x = 0;
                                            foreach ($unpaid->result() as $un) {
                                                ?>
                                                <tr>
                                                    <td> <?=++$x?> </td>
                                                    <td><a href="<?=site_url('posale/sale_edit/' . $un->order_id);?>"> <?=$un->bill_no?> </a></td>
                                                    <td><?=$un->eating_table_name?></td>
                                                    <td><?=date('d M Y', strtotime($un->date_time))?></td>
                                                    <th><?=number_format($un->paying_balance, 2)?></th>
                                                    <td>
                                                        <a href="<?=site_url('posale/sale_edit/' . $un->order_id);?>" class="btn btn-block btn-outline-info btn-sm"> <span class="fa fa-edit"> Edit order</span>  </a>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>