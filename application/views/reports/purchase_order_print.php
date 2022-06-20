<!DOCTYPE html>
<html lang="en">

<?php
foreach ($order_header as $header) {

  $order_id = $header->order_id;
  $bill_no = $header->bill_no;
  $org_name = $header->org_name;
  $org_email = $header->org_email;
  $org_phone = $header->org_phone;
  $org_address = $header->org_address;
  $customer_supplier_id = $header->customer_supplier_id;
  $date_time = $header->date_time;
  $payment_due = $header->payment_due;
  $service_charge = $header->service_charge;
  $tax_charge = $header->tax_charge;
  $net_amount = $header->net_amount;
  $discount = $header->discount;
  $paid_status = $header->paid_status;
  $entity_id = $header->entity_id;
  $transaction_type_id = $header->transaction_type_id;
  $payment_mode_id = $header->payment_mode_id;
  $paid_amount = $header->paid_amount;
  $paying_balance = $header->paying_balance;
  $change_return = $header->change_return;
  $narrative = $header->narrative;
  $date_modified = $header->date_modified;
  $time_stamp = $header->time_stamp;
  $cashier_name = $header->firstname . ' ' . $header->secondname;
  $phone = $header->phone;
  $id_passport = $header->id_passport;
  $email = $header->email;
  $payment_mode_name = $header->payment_mode_name;
  $transaction_type_name = $header->transaction_type_name;
  $customer_name = $header->customer_supplier_name;

  #get customer_supplier details
  $customer_supplier = $this->db->where('entity_id', $customer_supplier_id)->get('entitys')->row();
}
?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Payment Voucher <?= $bill_no ?></title>

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

    .rmb {
      border: none !important;
      height: 70px;
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

                <div class="x_cont class=" rmb" <section class="content invoice">
                  <!-- title row -->
                  <div class="row">
                    <div class="col-xs-12 invoice-header">
                      <h1>
                        <img src="<?php echo base_url('assets/school_logo.jpg') ?>" style="height: 80px;" />
                        <i style="font-size: 25px;" class="fa fa-globe pull-right">
                          Payment voucher
                          <br />
                          <small class="pull-right" style="font-size: 15px;">Date: <?php echo date('d-m-Y'); ?></small>
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
                        <strong><?php echo $org_name; ?></strong>
                        <br><?php echo $org_address; ?>
                        <br>Phone: <?php echo $org_phone; ?>
                        <br>Email: <?php echo $org_email; ?>
                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      To
                      <address>
                        <strong><?php echo $customer_name; ?></strong>
                        <br><?php echo $customer_supplier->entity_address; ?>
                        <br>Phone: <?php echo $customer_supplier->phone; ?>
                        <br>Email: <?php echo $customer_supplier->email; ?>
                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      Order details
                      <address>
                        <b>Invoice <u><?php echo $bill_no; ?></u></b>
                        <br><b>Order ID:</b> #<?php echo str_pad($order_id, 3, '0', STR_PAD_LEFT);; ?>
                        <br><b>Order date:</b> <?php echo $date_time; ?>
                        <br>Posted by: <?= $cashier_name ?>
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
                            <th>Qty</th>
                            <th style="width: 20%">Unit Price</th>
                            <th style="width: 20%">Product</th>
                            <th style="width: 15%">Serial #</th>
                            <th style="width: 10%">Tax</th>
                            <th style="width: 20%">Subtotal</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $total = 0;
                          foreach ($order_items as $item) {
                            $total += $item->amount;
                          ?>
                            <tr>
                              <td><?= $item->qty ?></td>
                              <td><?= number_format($item->rate) ?></td>
                              <td><?= $item->item_name ?></td>
                              <td><?= $item->barcode; ?></td>
                              <td>
                                <?php
                                if ($item->tax_id == 0 || $item->tax_id == '') {
                                  echo '-';
                                } else {
                                  $tax = ($item->tax_id / 100) * $item->qty * $item->rate;
                                  echo number_format($tax);
                                }
                                ?>
                              </td>
                              <td><?= number_format($item->amount) ?></td>
                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- /.row -->

                  <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-xs-6">

                      <!-- <p class="lead">Payment Status: </p>
                        <?php
                        // if ($paid_status == 1) echo 'Paid <span class="text text-success fa fa-check"></span>';
                        // else echo 'Not paid <span class="text text-danger fa fa-close"></span>';
                        ?> -->

                      <!-- <p class="lead">Payment Method: </p>
                        <?php echo $payment_mode_name; ?> <span class="fa fa-money"></span> -->

                    </div>
                    <!-- /.col -->
                    <div class="col-xs-6">
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th style="width:50%">Total amount:</th>
                              <td><?php echo number_format($total, 2); ?></td>
                            </tr>
                            <tr>
                              <th style="width:50%">Paid amount:</th>
                              <td><?php echo number_format($total - $paying_balance, 2); ?></td>
                            </tr>
                            <tr>
                              <th>Balance</th>
                              <td><?php echo number_format($paying_balance, 2); ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <div class="row" style="width: 100% !important;">
                    <div class="col-md-12" style="width: 100% !important;">
                      <p class="lead">Approval </p>
                      <table class="table table-borderless" style="border: 1px solid #f4f0f0; width: 100% !important;">
                        <tbody>

                          <tr class="rmb">
                            <th class="rmb">Accountant</th>
                            <td class="rmb">_________________</td>
                            <th class="rmb" style="width: 200px;">Sign</th>
                            <td class="rmb"></td>
                            <th class="rmb">Date</th>
                            <td class="rmb">_________________</td>
                          </tr>

                          <tr class="rmb">
                            <th class="rmb">Principal</th>
                            <td class="rmb">_________________</td>
                            <th class="rmb">Sign</th>
                            <td class="rmb"></td>
                            <th class="rmb">Date</th>
                            <td class="rmb">_________________</td>
                          </tr>

                          <tr class="rmb">
                            <th class="rmb">Treasurer</th>
                            <td class="rmb">_________________</td>
                            <th class="rmb">Sign</th>
                            <td class="rmb"></td>
                            <th class="rmb">Date</th>
                            <td class="rmb">_________________</td>
                          </tr>

                          <tr class="rmb">
                            <th class="rmb">Vice-chairperson</th>
                            <td class="rmb">_________________</td>
                            <th class="rmb">Sign</th>
                            <td class="rmb"></td>
                            <th class="rmb">Date</th>
                            <td class="rmb">_________________</td>
                          </tr>

                          <tr class="rmb">
                            <th class="rmb">Chairperson</th>
                            <td class="rmb">_________________</td>
                            <th class="rmb">Sign</th>
                            <td class="rmb"></td>
                            <th class="rmb">Date</th>
                            <td class="rmb">_________________</td>
                          </tr>







                        </tbody>
                      </table>
                    </div>
                  </div>

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