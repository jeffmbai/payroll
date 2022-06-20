<?php
$org = $this->db->where('org_id', 1)->get('orgs')->row();
$ref = null;

$paid_amount = $this->db->where('expense_id', $dt->expense_id)->select_sum('payment_amount')->get('payments')->row('payment_amount');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Payment Voucher | <?php echo $dt->reference ?></title>
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
      .noprint {
        visibility: hidden;
      }
    }
  </style>

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
              <div class="card">

                <div class="card-body">

                  <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-xs-12 invoice-header">
                        <h1>
                          <!-- <img src="<?php echo base_url('assets/POS-JiPOS-logo.png') ?>" style="height: 80px;" /> -->
                          <i style="font-size: 25px;" class="fa fa-globe pull-right">
                            Payment voucher
                            <br />
                            <small class="pull-right" style="font-size: 15px;">Date: <?php echo date('d-m-Y', strtotime($dt->expense_date)); ?></small>
                          </i>
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
                          <br>Phone: <?php echo $org->phone; ?>
                          <br>Email: <?php echo $org->email; ?>
                        </address>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        To
                        <address>
                          <strong><?php echo $dt->paid_to; ?></strong>
                          <br>Phone: <?php echo '-'; ?>
                          <br>Email: <?php echo '-'; ?>
                        </address>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        Order details
                        <address>
                          <b>Reference <u><?php echo $dt->reference; ?></u></b>
                          <br><b>Order ID:</b> #<?php echo str_pad($dt->expense_id, 3, '0', STR_PAD_LEFT);; ?>
                          <br><b>Order date:</b> <?php echo date('d-m-Y', strtotime($dt->expense_date)); ?>
                          <br>Posted by: <?= $dt->firstname . ' ' . $dt->secondname . ' ' . $dt->lastname; ?>
                        </address>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                      <div class="col-xs-12 table">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th style="width: 70%;">Description</th>
                              <th>Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <?php
                                echo $dt->account_name . '. ' . $dt->narrative
                                ?>
                              </td>
                              <td><?= number_format($dt->expense_amount) ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                      <!-- accepted payments column -->
                      <div class="col-xs-6">

                        <p class="lead">Approved By: </p>
                        <table class="table">
                          <tbody>
                            <tr>
                              <td>Name: _________________</td>
                              <td>Signature: _________________</td>
                            </tr>

                            <tr>
                              <td>Name: _________________</td>
                              <td>Signature: _________________</td>
                            </tr>

                            <tr>
                              <td>Name: _________________</td>
                              <td>Signature: _________________</td>
                            </tr>
                          </tbody>
                        </table>

                      </div>
                      <!-- /.col -->
                      <div class="col-xs-6">
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
                              <tr>
                                <th style="width:50%">Total amount:</th>
                                <td><?php echo number_format($dt->expense_amount, 2); ?></td>
                              </tr>
                              <tr>
                                <th style="width:50%">Paid amount:</th>
                                <td><?php echo number_format($dt->paid_amount, 2); ?></td>
                              </tr>
                              <tr>
                                <th>Balance</th>
                                <td><?php echo number_format($dt->expense_amount - $dt->paid_amount, 2); ?></td>
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
                        <button class="btn btn-default pull-right noprint" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
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