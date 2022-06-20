<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>JiPOS | <?php echo $page ?></title>
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
    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: #1D2856;
      color: white;
      text-align: center;
      height: 30px;
      font-size: 12px;
    }

    .card-rg {
      box-shadow: 0 0 1px rgba(181, 104, 104, 0.47),
        0 1px 20px rgba(55, 45, 45, 0.54);
      margin-bottom: 1rem;
    }
  </style>

  <?php
  $expiry_date = date('Y-m-d', strtotime('14-12-2021'));
  $today = date('Y-m-d');
  $diff = strtotime($expiry_date) - strtotime($today);
  
  // 1 day = 24 hours
  // 24 * 60 * 60 = 86400 seconds
  $days = abs(round($diff / 86400));

  $message = '';
  if ($today < $expiry_date) {
    $message = '<p class="text-orange"><span class="fa fa-warning"></span> Software Licence Expires in '.$days.' day(s)! Renew Your License</p>';
  } elseif ($today == $expiry_date) {
    $message = '<p class="text-danger"><span class="fa fa-warning"></span> Software Licence Expiring Today! Renew Your License</p>';
  } else {
    $message = '<p class="text-danger"><span class="fa fa-warning"></span> Software Licence Expired! Renew Your Licence! </p>';
  }
  ?>

</head>

<body class="hold-transition login-page">
  <div class="login-box" style="min-height: 500px;">
    <div class="login-logo">
      <!-- <a href="<?php echo base_url('#'); ?>" style="color: #a70000; font-weight: 900"><b style="color: #007d76;">Ji</b>POS</a> -->
      <img src="<?php echo base_url('assets/POS-JiPOS-logo.png'); ?>" style="max-height: 50px;" >
    </div>
    <!-- /.login-logo -->
    <div class="card card-rg">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session </p>
        <?php
        if (isset($_SESSION['alert'])) {
          echo $_SESSION['alert'];
          unset($_SESSION['alert']);
        }
        ?>

        <form action="<?php echo site_url('user/signin_auth'); ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" maxlength="50" name="username" id="username" class="form-control" placeholder="Email" required />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mb-1">
          <a href="<?php echo site_url('pages/forgot_password') ?>">I forgot my password</a>
        </p>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <div class="footer">
    <p>©<?php echo date('Y'); ?>, JTL. All Rights Reserved.</p>
  </div>

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

</body>

</html>