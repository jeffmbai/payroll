<!DOCTYPE html>
<html lang="en">

<?php
$org = $this->db->where('org_id', 1)->get('orgs')->row();
$ref = null;
// echo json_encode($details);
$id = $details->id;
$org_id = $details->org_id;
$entity_id = $details->entity_id;
$term_id = $details->term_id;
$department_id = $details->department_id;
$account_id = $details->account_id;
$pettycash_amount = $details->pettycash_amount;
$pettycash_date = $details->pettycash_date;
$status_id = $details->status_id;
$paid_by = $details->paid_by;
$reference = $details->reference;
$narrative = $details->narrative;
$date_modified = $details->date_modified;
$time_stamp = $details->time_stamp;
$approvedby_one = $details->approvedby_one;
$approvedby_two = $details->approvedby_two;
$status_name = $details->status_name;
$account_name = $details->account_name;
$department_name = $details->department_name;
$firstname = $details->firstname;
$secondname = $details->secondname;
$lastname = $details->lastname;
$phone = $details->phone;
$id_passport = $details->id_passport;
$email = $details->email;
?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Payment Voucher <?= $reference ?></title>

  <!-- Bootstrap core CSS -->

  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/icheck/flat/green.css" rel="stylesheet">


  <script src="<?php echo base_url(); ?>assets/<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

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
              <div class="x_panel">

                <div class="x_content">

                  <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-xs-12 invoice-header">
                        <h1>
                          <img src="<?php echo base_url('assets/school_logo.jpg') ?>" style="height: 80px;" />
                          <i style="font-size: 25px;" class="fa fa-globe pull-right">
                            Payment voucher
                            <br />
                            <small class="pull-right" style="font-size: 15px;">Date: <?php echo date('d-m-Y', strtotime($pettycash_date)); ?></small>
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
                          <strong><?php echo $firstname . ' ' . $secondname . ' ' . $lastname; ?></strong>
                          <br>Phone: <?php echo $phone; ?>
                          <br>Email: <?php echo $email; ?>
                        </address>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        Order details
                        <address>
                          <b>Reference <u><?php echo $reference; ?></u></b>
                          <br><b>Order ID:</b> #<?php echo str_pad($id, 3, '0', STR_PAD_LEFT);; ?>
                          <br><b>Order date:</b> <?php echo date('d-m-Y', strtotime($pettycash_date)); ?>
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
                                echo $account_name . '. ' . $narrative
                                ?>
                              </td>
                              <td><?= number_format($pettycash_amount) ?></td>
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
                                <td><?php echo number_format($pettycash_amount, 2); ?></td>
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

  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

  <!-- chart js -->
  <script src="<?php echo base_url(); ?>assets/js/chartjs/chart.min.js"></script>
  <!-- bootstrap progress js -->
  <script src="<?php echo base_url(); ?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="<?php echo base_url(); ?>assets/js/icheck/icheck.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

</body>

</html>