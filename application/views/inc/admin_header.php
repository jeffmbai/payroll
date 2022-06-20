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

    <style>
        form {
            padding: 10px !important;
        }

        .custom_nav_theme {
            color: black !important;
            border-bottom: 1px grey solid;
        }

        .backbtn {
            border-radius: 10rem;
            border: 1px solid #b10000;
            font-size: 1.2rem;
            margin: 5px;
            padding-right: 1.3rem;
            color: #00817a;
            background-color: transparent;
        }

        .backbtn:hover {
            background-color: #b10000 !important;
            color: white !important;
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

        .tb_title {
            height: 30px;
            background: #2A3F54;
            position: relative;
            color: #fff;
            font-weight: bold;
            border: none;
            width: 200px;
            text-align: left;
        }

        .tb_title:hover,
        .tb_title:active {
            color: #A6A6A6;
        }

        .tb_title:before {
            content: '';
            position: absolute;
            right: 0;
            border-top: 30px solid white;
            border-left: 30px solid #2A3F54;
            width: 0;
            top: 0;
        }

        .fa-ian {
            color: #393B3D !important;
        }

        .select2 {
            width: 100% !important;
        }
    </style>

</head>

<body id="body" class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo site_url('') ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#contact">Contact</a>
                </li>
            </ul>

            <span class="badge badge-success"><?= $_SESSION['fiscalyearname'] ?> <i class="fa fa-check-circle-o"></i></span>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

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
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo site_url('') ?>" class="brand-link">
                <!-- <img src="<?php echo base_url(); ?>assets/POS-JiPOS-icon.png" alt="jtlSales Logo" class="brand-image img-dot-circle-o elevation-3" style="opacity: .8; background-color: #fff;"> -->
                <span class="brand-text font-weight-light"> <?= $org->org_name ?> </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <?php if ($CI->permissions('dashboard_view')) { ?>
                            <li class="nav-item">
                                <a href="<?php echo site_url(); ?>" class="nav-link <?php if ($page == 'Dashboard') echo 'active'; ?> ">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p> Dashboard </p>
                                </a>
                            </li>
                        <?php } ?>

                    <!-- purchases
                        <?php if ($CI->permissions('purchase_add') || $CI->permissions('purchase_view') || $CI->permissions('purchase_payment')) { ?>
                            <li class="nav-item has-treeview">

                                <a href="#" class="nav-link <?php if ($page == 'Purchases' || $page == 'Purchase Profile' || $page == 'New Purchase') echo 'active'; ?>">
                                    <i class="nav-icon fas fa-rub"></i>
                                    <p>Purchases <i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php if ($CI->permissions('purchase_edit') || $CI->permissions('purchase_view') || $CI->permissions('purchase_payment')) { ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('business/purchases'); ?>" class="nav-link">
                                                <i class="nav-icon far fa-dot-circle-o"></i>
                                                <p>Purchase List</p>
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($CI->permissions('purchase_add')) { ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('business/new_purchase'); ?>" class="nav-link">
                                                <i class="nav-icon far fa-dot-circle-o"></i>
                                                <p>New Purchase</p>
                                            </a>
                                        </li>
                                    <?php } ?>

                                </ul>
                            </li>
                        <?php } ?>
                        
                        <?php if ($CI->permissions('general_product_view')) { ?>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link <?php if ($page == 'Items') echo 'active'; ?>">
                                    <i class="nav-icon fas fa-th-list"></i>
                                    <p>Products <i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <?php if ($CI->permissions('item_add') || $CI->permissions('item_view') || $CI->permissions('item_delete') || $CI->permissions('item_breakdown')) { ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('sys/items'); ?>" class="nav-link">
                                                <i class="nav-icon far fa-dot-circle-o"></i>
                                                <p>Items </p>
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($CI->permissions('item_request_approve') || $CI->permissions('item_request_add') || $CI->permissions('item_request_edit') || $CI->permissions('item_request_view') || $CI->permissions('item_request_delete')) { ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('business/item_request'); ?>" class="nav-link">
                                                <i class="nav-icon far fa-dot-circle-o"></i>
                                                <p>Item Requests </p>
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($CI->permissions('stock_add') || $CI->permissions('stock_view') || $CI->permissions('stock_edit') || $CI->permissions('stock_delete')) { ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('sys/item_stock'); ?>" class="nav-link">
                                                <i class="nav-icon far fa-dot-circle-o"></i>
                                                <p>Stocks </p>
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($CI->permissions('recipe_add') || $CI->permissions('recipe_view') || $CI->permissions('recipe_edit') || $CI->permissions('recipe_delete')) { ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('kitchen/recipe'); ?>" class="nav-link">
                                                <i class="nav-icon far fa-dot-circle-o"></i>
                                                <p>Recipe </p>
                                            </a>
                                        </li>
                                    <?php } ?>

                                </ul>
                            </li>
                        <?php } ?>
                    -->
                    <!--sales
                        <?php if ($CI->permissions('salesgeneral_view')) { ?>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link <?php if ($page == 'Document Types') echo 'active'; ?>">
                                    <i class="nav-icon fas fa-shopping-cart"></i>
                                    <p>Sales <i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <?php if ($CI->permissions('sale_add')) { ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('posale/home'); ?>" target="_blank" class="nav-link">
                                                <i class="nav-icon far fa-dot-circle-o"></i>
                                                <p>PoS </p>
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($CI->permissions('sale_view') || $CI->permissions('sale_edit') || $CI->permissions('sale_delete')) { ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('business/sales'); ?>" class="nav-link">
                                                <i class="nav-icon far fa-dot-circle-o"></i>
                                                <p>Sales </p>
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($CI->permissions('returns_add') || $CI->permissions('returns_edit') || $CI->permissions('returns_delete')) { ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('business/item_return'); ?>" class="nav-link">
                                                <i class="nav-icon far fa-dot-circle-o"></i>
                                                <p>Returns </p>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                    -->
                    
                    <!--rooms
                        <?php if ($CI->permissions('room_add') || $CI->permissions('room_configs') || $CI->permissions('room_view')  || $CI->permissions('room_delete')) { ?>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link <?php if ($page == 'Rooms' || $page == 'Book Room' || $page == 'Bookings' || $page == 'Room Types') echo 'active'; ?>">
                                    <i class="nav-icon fa fa-cutlery"></i>
                                    <p>Rooms <i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <?php if ($CI->permissions('bookings_add')) { ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('rooms/book_room'); ?>" target="_blank" class="nav-link">
                                                <i class="nav-icon far fa-dot-circle-o"></i>
                                                <p>Book Room </p>
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($CI->permissions('bookings_view') || $CI->permissions('bookings_edit') || $CI->permissions('bookings_delete')) { ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('rooms/bookings'); ?>" target="_blank" class="nav-link">
                                                <i class="nav-icon far fa-dot-circle-o"></i>
                                                <p>Bookings </p>
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($CI->permissions('room_configs')) { ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('rooms/room_types'); ?>" class="nav-link">
                                                <i class="nav-icon far fa-dot-circle-o"></i>
                                                <p>Room Types </p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('rooms/room'); ?>" class="nav-link">
                                                <i class="nav-icon far fa-dot-circle-o"></i>
                                                <p>Rooms </p>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                    -->
                    
                        <?php if ($CI->permissions('payroll_view') || $CI->permissions('payroll_add')) { ?>
                            <!--<li class="nav-item">
                                <a href="#" class="nav-link <?php if ($page == 'Payroll' || $page == 'Advances' || $page == 'P9') echo 'active'; ?>">
                                    <i class="nav-icon fa fa-ruble"></i>
                                    <p>Payroll <i class="fas fa-angle-left right"></i></p>
                                </a>
                            </li> 
                            <li class="nav-item">
                                <!--<a href="<?php echo site_url('payroll/index'); ?>" class="nav-link">
                                    <i class="nav-icon far fa-dot-circle-o"></i>
                                    <p>Payroll </p>
                                </a>-->
                                <li class="nav-item">
                                        <a href="<?php echo site_url('payroll/index'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p>Payroll </p>
                                        </a>
                                    </li>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('payroll/index'); ?>" target="_blank" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p>Payroll </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo site_url('payroll/advances'); ?>" target="_blank" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p>Advances </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo site_url('payroll/employee_p9'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p>P9 Forms </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo site_url('payroll/bank_cashouts'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p>Bank Cashouts </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo site_url('payroll/advances'); ?>" class="nav-link">
                                    <i class="nav-icon far fa-dot-circle-o"></i>
                                    <p>Advances </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo site_url('payroll/employee_p9'); ?>" class="nav-link">
                                    <i class="nav-icon far fa-dot-circle-o"></i>
                                    <p>P9 Froms </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo site_url('payroll/bank_cashouts'); ?>" class="nav-link">
                                    <i class="nav-icon far fa-dot-circle-o"></i>
                                    <p>Bank Cashouts </p>
                                </a>
                            </li>
                           
                        <?php } ?>
                            
                    <!-- bulk sms
                        <?php if ($CI->permissions('sms_view') || $CI->permissions('email_view')) { ?>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link <?php if ($page == 'Document Types') echo 'active'; ?>">
                                    <i class="nav-icon fas fa-send"></i>
                                    <p>Bulk SMS <i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php //echo site_url('notifications/email'); 
                                                    ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p>Emails </p>
                                        </a>
                                    </li> 

                                    <li class="nav-item">
                                        <a href="<?php echo site_url('sms/index'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p>SMS </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo site_url('sms/templates'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p>SMS Templates </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                    -->

                    <!--debt management
                        <?php if ($CI->permissions('debtmanagement_view')) { ?>
                            <li class="nav-item">
                                <a href="<?php echo site_url('debts/home'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-minus-square"></i>
                                    <p> Debt Management </p>
                                </a>
                            </li>
                        <?php } ?>
                    -->

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link <?php if ($page == 'Document Types') echo 'active'; ?>">
                                <i class="nav-icon fas fa-balance-scale"></i>
                                <p>Accounting <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">

                                <?php if ($CI->permissions('pettycash_add') || $CI->permissions('pettycash_view') || $CI->permissions('pettycash_approval') || $CI->permissions('pettycash_allocation')) { ?>
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('pettycash/home'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p>Petty Cash </p>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if ($CI->permissions('budget_add') || $CI->permissions('budget_view')) { ?>
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('budgeting/home'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p>Budgeting </p>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if ($CI->permissions('expense_view') || $CI->permissions('payment_view')) { ?>
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('expense/home'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Expenses & Payments </p>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if ($CI->permissions('income_view') || $CI->permissions('income_view')) { ?>
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('income/index'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Income </p>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if ($CI->permissions('acconfigs_add') || $CI->permissions('acconfigs_view')) { ?>
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('accounting/account_types'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Account Types </p>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if ($CI->permissions('acconfigs_add') || $CI->permissions('acconfigs_view')) { ?>
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('accounting/accounts'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Charts of Accounts </p>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if ($CI->permissions('journalentry_add')) { ?>
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('transfers/index'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Journal Entry </p>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if ($CI->permissions('accountreports_view')) { ?>
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('accounting/account_balances'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Account Balances </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('accounting/cash_flow'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Cash Flow </p>
                                        </a>
                                    </li>
                                    <!-- <li><a href="<?php echo site_url('accounting/trial_balance'); ?>">Trial Balance</a></li> -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('accounting/balance_sheet'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Balance Sheet </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('accounting/profit_and_loss'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Profit & Loss </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('accounting/general_ledger'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> General Ledger </p>
                                        </a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </li>

                        <?php if ($CI->permissions('reports_view')) : ?>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link <?php if ($page == 'Reports') echo 'active'; ?>">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Reports <i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <!-- <li class="nav-item">
                                    <a href="<?php echo site_url('reports/my_close_day'); ?>" class="nav-link">
                                        <i class="nav-icon far fa-dot-circle-o"></i>
                                        <p>Close Day </p>
                                    </a>
                                </li> -->

                                <!--customer reports
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('reports/customers'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Customers </p>
                                        </a>
                                    </li>
                                -->

                                <!--supplier reports
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('reports/suppliers'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Suppliers </p>
                                        </a>
                                    </li>
                                -->

                                <!--staff sale summary
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('reports/agentsales'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Staff Sales Summary </p>
                                        </a>
                                    </li>
                                -->

                                <!--sales
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('sys/sales_report'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Sales </p>
                                        </a>
                                    </li>
                                -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('reports/account_statements'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Account Statements </p>
                                        </a>
                                    </li>

                                <!--supplier statements
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('accounting/supplier_statements'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Supplier Statements </p>
                                        </a>
                                    </li>
                                -->

                                <!--supplier balances
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('accounting/supplier_balances'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Supplier Balances </p>
                                        </a>
                                    </li>
                                -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('expense/general_expenses'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> General Expenses </p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if ($CI->permissions('general_view') || $CI->permissions('users_view') || $CI->permissions('users_add')) : ?>
                            <li class="nav-header">Settings</li>

                            <?php if ($_SESSION['superuser'] == 1 || $CI->permissions('backup_view')) : ?>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('backups/index') ?>" class="nav-link <?php if ($page == 'Backups') echo 'active'; ?>"">
                                        <i class=" fa fa-database nav-icon"></i>
                                        <p>Backups</p>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <li class="nav-item has-treeview">

                                <?php if ($CI->permissions('users_view') || $CI->permissions('users_add')) : ?>
                                    <a href="#" class="nav-link <?php if ($page == 'Users' || $page == 'System Roles') echo 'active'; ?>">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>System Users <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <?php if ($CI->permissions('users_view') || $CI->permissions('users_add')) : ?>
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('users/index'); ?>" class="nav-link <?php if ($page == 'Users') echo 'active'; ?>">
                                                    <i class="far fa-dot-circle-o nav-icon"></i>
                                                    <p>System Users</p>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if ($CI->permissions('staff_view') || $CI->permissions('staff_add')) : ?>
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('staff/index'); ?>" class="nav-link <?php if ($page == 'Staff') echo 'active'; ?>">
                                                    <i class="far fa-dot-circle-o nav-icon"></i>
                                                    <p>Staff</p>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if ($CI->permissions('supplier_view') || $CI->permissions('supplier_add')) : ?>
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('users/suppliers'); ?>" class="nav-link <?php if ($page == 'Users') echo 'active'; ?>">
                                                    <i class="far fa-dot-circle-o nav-icon"></i>
                                                    <p>Suppliers</p>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if ($CI->permissions('customer_view') || $CI->permissions('customer_add')) : ?>
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('users/customers'); ?>" class="nav-link <?php if ($page == 'Users') echo 'active'; ?>">
                                                    <i class="far fa-dot-circle-o nav-icon"></i>
                                                    <p>Customers</p>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if ($CI->permissions('roles_view')) : ?>
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('systemroles/index') ?>" class="nav-link <?php if ($page == 'System Roles') echo 'active'; ?>">
                                                    <i class="far fa-dot-circle-o nav-icon"></i>
                                                    <p>Role Management</p>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if ($_SESSION['superuser'] == 1 && $_SESSION['userid'] < 3) : ?>
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('sys/general_audit') ?>" class="nav-link">
                                                    <i class="fa fa-cogs nav-icon"></i>
                                                    <p>Audit Trails</p>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                    </ul>
                                <?php endif; ?>

                            </li>
                        <?php endif; ?>

                        <?php if ($CI->permissions('general_add')) : ?>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link <?php if ($page == 'Document Types') echo 'active'; ?>">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>Configurations <i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="<?php echo site_url('sys/categories'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Categories </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo site_url('sys/colors'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Colors </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo site_url('sys/units'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Units </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo site_url('sys/countries'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Countries </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo site_url('sys/countries'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Countries </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo site_url('sys/currencies'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Currencies </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo site_url('sys/tax_types'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Tax Types </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo site_url('sys/fiscal_years'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Fiscal Years </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo site_url('sys/stores'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Stores </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo site_url('sys/eating_tables'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle-o"></i>
                                            <p> Eating Tables </p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if ($CI->permissions('org_view') || $CI->permissions('stations_view') || $CI->permissions('departments_view')) : ?>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link <?php if ($page == 'Organization' || $page == 'Stations' || $page == 'Departments') echo 'active'; ?>">
                                    <i class="nav-icon fas fa-sitemap"></i>
                                    <p>Organizations <i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php if ($CI->permissions('org_view')) : ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('orgs/index'); ?>" class="nav-link <?php if ($page == 'Organizations') echo 'active'; ?>">
                                                <i class="far fa-dot-circle-o nav-icon"></i>
                                                <p>Orgs</p>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if ($CI->permissions('stations_view')) : ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('stations/index'); ?>" class="nav-link <?php if ($page == 'Stations') echo 'active'; ?>">
                                                <i class="far fa-dot-circle-o nav-icon"></i>
                                                <p>Stations</p>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if ($CI->permissions('departments_view')) : ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('departments/index'); ?>" class="nav-link <?php if ($page == 'Departments') echo 'active'; ?>">
                                                <i class="far fa-dot-circle-o nav-icon"></i>
                                                <p>Departments</p>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                </ul>
                            </li>
                        <?php endif; ?>


                        <li class="nav-item">
                            <a href="<?php echo site_url('pages/logout'); ?>" class="nav-link text-orange">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p><b>Logout</b></p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>