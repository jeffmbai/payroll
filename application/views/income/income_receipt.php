<!DOCTYPE html>
<html lang="en">

<?php
$org = $this->db->where('org_id', 1)->get('orgs')->row();
$ref = null;
// echo json_encode($details);
foreach ($expense_details as $dt) {
  $expense_id = $dt->expense_id;
  $org_id = $dt->org_id;
  $account_id = $dt->account_id;
  $vote_head_id = $dt->vote_head_id;
  $vote_head_code = $dt->vote_head_code;
  $entity_id = $dt->entity_id;
  $status_id = $dt->status_id;
  $department_id = $dt->department_id;
  $reference = $dt->reference;
  $expense_amount = $dt->expense_amount;
  $expense_balance = $dt->expense_balance;
  $paid_to = $dt->paid_to;
  $active = $dt->active;
  $narrative = $dt->narrative;
  $expense_date = $dt->expense_date;
  $date_modified = $dt->date_modified;
  $time_stamp = $dt->time_stamp;
  $org_name = $dt->org_name;
  $address = $dt->address;
  $currency_id = $dt->currency_id;
  $country_id = $dt->country_id;
  $currency_code = $dt->currency_code;
  $name = $dt->name;
  $status_name = $dt->status_name;
  $department_name = $dt->department_name;
  $account_name = $dt->account_name;
  $account_code = $dt->account_code;
  $vote_head_name = $dt->vote_head_name;
  $vote_head_ratio = $dt->vote_head_ratio;
  $entity_name = $dt->entity_name;
  $firstname = $dt->firstname;
  $secondname = $dt->secondname;
  $lastname = $dt->lastname;
  $phone = $dt->phone;
  $gender = $dt->gender;
  $dob = $dt->dob;
  $id_passport = $dt->id_passport;
  $email = $dt->email;
}

$paid_amount = $this->db->where('expense_id',$expense_id)->select_sum('payment_amount')->get('payments')->row('payment_amount');
?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Receipt <?= $dt->reference ?></title>

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
                          <img src="../../../assets/POS-JiPOS-logo.png" style="height: 80px;" />
                          <i style="font-size: 25px;" class="fa fa-globe pull-right">
                            Payment voucher
                            <br />
                            <small class="pull-right" style="font-size: 15px;">Date: <?php echo date('d-m-Y', strtotime($expense_date)); ?></small>
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
                          <strong><?php echo $paid_to; ?></strong>
                          <br>Phone: <?php echo '-'; ?>
                          <br>Email: <?php echo '-'; ?>
                        </address>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        Order details
                        <address>
                          <b>Reference <u><?php echo $reference; ?></u></b>
                          <br><b>Order ID:</b> #<?php echo str_pad($expense_id, 3, '0', STR_PAD_LEFT);; ?>
                          <br><b>Order date:</b> <?php echo date('d-m-Y', strtotime($expense_date)); ?>
                          <br>Posted by: <?=$firstname.' '.$secondname.' '.$lastname; ?>
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
                                  echo $account_name.'. '.$narrative
                                ?>
                              </td>
                              <td><?=number_format($expense_amount)?></td>
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
                                <td><?php echo number_format($expense_amount, 2); ?></td>
                              </tr>
                              <tr>
                                <th style="width:50%">Paid amount:</th>
                                <td><?php echo number_format($paid_amount, 2); ?></td>
                              </tr>
                              <tr>
                                <th>Balance</th>
                                <td><?php echo number_format($expense_amount - $paid_amount, 2); ?></td>
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