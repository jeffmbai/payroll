<style>
  .nav-reag {
    border-bottom: 1px solid #dee2e6 !important;
    color: #555555 !important;
    font-family: Poppins, sans-serif !important;
    font-size: 14px;
    font-weight: bold !important;
  }

  .nav-tabs.flex-column .nav-link.active {
    border-bottom: 1px solid green !important;
    background-color: #F5F7FA !important;
  }

  .count {
    font-size: 28px !important;
  }
</style>

<?php
$credit = $this->db->where('id', 1)->get('sms_credit')->row();
$credo = $credit->credit_balance;
$sms_alert = null;
if ($credo < 50) {
  $sms_alert = 'style="color: red;"';
}
?>

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

      <!-- Tiles Begin -->
      <div class="row">

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Outbox</span>
              <span class="info-box-number"><?= $count_outbox ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-orange elevation-1"><i class="fa fa-send-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Sent</span>
              <span class="info-box-number"><?= $count_sent; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-money-bill-wave"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Credit Bal <?= $sms_alert; ?></span>
              <span class="info-box-number"><?php if ($credo >= 0) echo $credo;
                                            else echo 0; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-bill-alt"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Credit Consumed</span>
              <span class="info-box-number"><?= $credit->credit_consumed ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="card card-outline card-warning">
            <div class="card-body">
              <div class="row">

                <div class="col-md-3">
                  <!-- required for floating -->
                 
                  <?php if ($CI->permissions('subscriptions_view')) : ?>
                    <button class="btn btn-block btn-xs btn-rgp" data-toggle="modal" data-target="#topup" style="margin-top: 10px; color: #FF4500; font-size: 14px; font-weight: 800">
                      Recharge Airtime <br />
                      <i class="fa fa-angle-double-down"></i>
                    </button>
                    <p style="padding-top: 10px;" class="text-primary">
                      <i class="fa fa-info-circle"></i> To recharge your account, pay a preferred amount to the bank below: <br />
                      <b>Bank name: Coorperative Bank <br />
                        Branch: Kimathi <br />
                        Account Name: <?=$_SESSION['orgname']?> <br />
                        Account Number: 0119 2846 1562 00 </b> <br />
                      Note: The bulk sms rate is Kes 2.0 per sms
                    </p>
                  <?php endif; ?>

                </div>

                <div class="col-12 col-sm-9">
                  <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                      <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="custom-tabs-one-sent-tab" data-toggle="pill" href="#custom-tabs-one-sent" role="tab" aria-controls="custom-tabs-one-sent" aria-selected="false">Sent</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="custom-tabs-one-outbox-tab" data-toggle="pill" href="#custom-tabs-one-outbox" role="tab" aria-controls="custom-tabs-one-outbox" aria-selected="false">Outbox</a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                          <p class="lead">Send Bulk SMS</p>
                          <form method="post" action="<?php echo site_url('sms/tuma'); ?>">
                            <div class="row">
                              <div class="col-md-6">
                                <label>Organization <i class="text-danger">*</i> </label>
                                <select class="form-control select2_single" name="org_id" onchange="get_clients(this)">
                                  <option value=""> Select organization </option>
                                  <?php
                                  $orgs = $this->db->get('orgs')->result();
                                  foreach ($orgs as $org) echo '<option value="' . $org->org_id . '"> ' . $org->org_name . ' </option>';
                                  ?>
                                </select>
                              </div>

                              <div class="col-md-6">
                                <label>Template <i class="text-danger">*</i> </label>
                                <select class="form-control select2_single" name="template_id">
                                  <option value=""> Select template </option>
                                  <?php
                                  $temps = $this->db->get('sms_templates')->result();
                                  foreach ($temps as $temp) echo '<option value="' . $temp->template_id . '"> ' . $temp->template_name . ' </option>';
                                  ?>
                                </select>
                              </div>

                              <div class="col-md-12">
                                <label>Sudents <i class="text-danger">*</i> </label>
                                <select class="form-control select2_multiple" name="student_id[]" id="student_id" multiple>
                                  <option value="all"> Select all </option>
                                </select>
                              </div>

                              <div class="col-md-12">
                                <br />
                                <input type="submit" class="btn btn-rgp" name="submit" value="Send" />
                              </div>

                            </div>
                          </form>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-sent" role="tabpanel" aria-labelledby="custom-tabs-one-sent-tab">
                          <p class="lead">Sent</p>
                          <div class="row">
                            <div class="col-md-12 table-responsive">
                              <table id="sentitems" class="table table-striped responsive-utilities jambo_table" style="width:100%">
                                <thead>
                                  <tr>
                                    <td>Phone</td>
                                    <td>Message</td>
                                    <td>Timestamp</td>
                                    <td>Action</td>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-outbox" role="tabpanel" aria-labelledby="custom-tabs-one-outbox-tab">
                          <p class="lead">Outbox</p>
                          <div class="row">
                            <div class="col-md-12 table-responsive">
                              <table id="outboxitems" class="table table-striped responsive-utilities jambo_table" style="width:100%">
                                <thead>
                                  <tr>
                                    <td>Phone</td>
                                    <td>Message</td>
                                    <td>Timestamp</td>
                                    <td>Action</td>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
    <!--/. container-fluid -->
  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->




<?php if ($_SESSION['userid'] == 1) : ?>
  <!-- Modal -->
  <div id="topup" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Airtime Top Up</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <form role="" method="post" action="<?php echo site_url('sms/topup') ?>">
              <div class="col-md-12">
                <label>Enter amount <i class="text-danger">*</i> </label>
                <input type="number" name="amount" class="form-control" required placeholder="Enter amount" />
              </div>
              <div class="col-md-12">
                <br />
                <button type="submit" class="btn btn-primary">Topup</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>

    </div>
  </div>
<?php endif; ?>


<script>
  function get_clients(e) {
    //get clients: orgs
    var id = e.value;
    console.log('Data: ' + id);
    $.ajax({
      url: '<?php echo site_url(); ?>sms/get_clients', //this is the submit URL
      type: 'POST',
      data: {
        data: id
      },
      success: function(data) {
        console.log("Response: " + data);
        $("#client_id").html(data);
        //action_buttons

      }
    }); //end registration
  }
</script>

<script type="text/javascript">
  $(document).ready(function() {

    $('#sentitems').DataTable({
      "pageLength": 10, //specify the number of rows to be displayed
      // "order": [[ 2, "desc" ]],
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
        url: "<?php echo site_url("sms/all_sentsms_ajax") ?>",
        type: 'GET'
      },

      "columnDefs": [{
        "targets": [0],
        "orderable": false
      }]
    }).clear().draw();
  });

  $(document).ready(function() {

    $('#outboxitems').DataTable({
      "pageLength": 10, //specify the number of rows to be displayed
      // "order": [[ 2, "desc" ]],
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
        url: "<?php echo site_url("sms/all_outboxsms_ajax") ?>",
        type: 'GET'
      },

      "columnDefs": [{
        "targets": [0],
        "orderable": false
      }]
    }).clear().draw();
  });
</script>