<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Invoice | <?php echo $page ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/POS-JiPOS-icon.png'); ?>" />

    <style>
        .lead {
            font-size: 18px;
        }

        .x_content {
            border: 1px solid;
            padding-right: 20px;
            padding-left: 20px;
        }

        @media print {
            #printPageButton {
                display: none;
            }
        }
    </style>

    <?php
    $org = $this->db->where('org_id', $_SESSION['orgid'])->get('orgs')->row();
    ?>

    <?php
    $paid = $balance = 0;
    $paid = $this->db->select("SUM(payment_amount) as total_paid")->from('income_payments')->where('income_id', $income->income_id)->get()->row();
    $balance = $income->income_amount - $paid->total_paid;
    ?>

</head>

<body class="nav-md" style=" background-color: transparent;">

    <div class="container body">


        <div class="main_container">

            <!-- page content -->
            <div role="main">

                <div class="">

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">

                                <div class="x_content">

                                    <section class="content invoice">
                                        <!-- title row -->
                                        <div class="row">
                                            <div class="col-xs-12 invoice-header">
                                                <h1>
                                                    <i class="fa fa-globe"></i> Invoice.
                                                    <small class="pull-right">Date: <?php echo date('d-m-Y'); ?></small>
                                                </h1>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- info row -->
                                        <div class="row invoice-info">
                                            <div class="col-sm-4 invoice-col">
                                                From
                                                <address>
                                                    <strong><?php echo $org->org_name; ?></strong>
                                                    <br><?php echo $org->address; ?>
                                                    <br>Email: <?php echo $org->email; ?>
                                                </address>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 invoice-col">
                                                To
                                                <address>
                                                    <strong><?php echo $income->customer_name; ?></strong>
                                                </address>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 invoice-col">
                                                <b>Invoice <u><?php echo $income->reference; ?></u></b>
                                                <br>
                                                <br>
                                                <b>Order date:</b> <?php echo $income->income_date; ?>
                                                <!-- <br>
                                                <b>Account:</b> 968-34567 -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <div class="row">
                                            <!-- accepted payments column -->
                                            <div class="col-xs-6">
                                                <p class="lead">Description: </p>
                                                <?php echo $income->narrative; ?>
                                                <!--<span class="fa fa-money"></span>-->
                                                <br /><br />
                                                <p class="lead">Payment Status: </p>
                                                <?php
                                                if ($income->status_id == 1) echo 'Paid <span class="text text-success fa fa-check"></span>';
                                                else echo 'Not paid <span class="text text-danger fa fa-close"></span>';
                                                ?>

                                            </div>
                                            <!-- /.col -->
                                            <div class="col-xs-6">
                                                <p class="lead">Amount Due <?php echo $balance; ?></p>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width:50%">Total amount:</th>
                                                                <td><?php echo number_format($income->income_amount, 2); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width:50%">Paid amount:</th>
                                                                <td><?php echo number_format($paid->total_paid, 2); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Paying balance</th>
                                                                <td><?php echo number_format($balance, 2); ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- this row will not appear when printing -->
                                        <div class="row no-print">
                                            <div class="col-xs-12" style="padding-top: 30px;">
                                                <button class="btn btn-default pull-right" id="printPageButton" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                                <!--<button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>-->
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /page content -->
        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

</body>

</html>