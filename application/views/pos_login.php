<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>JiPOS</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/login/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/login/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/login/login.css">
  <link rel="icon" href="<?php echo base_url(); ?>/assets/POS-JiPOS-icon.png">
  <style>
    .btn-app {
      border-radius: 20px !important;
      padding: unset !important;
      width: 90px !important;
      height: 90px !important;
      background-color: #9c0000;
      color: #fff;
    }

    .btn-app:hover {
      padding: unset !important;
      background-color: #007776;
      color: #fff;
    }

    .calc_item {
      font-size: 30px;
    }

    .col-md-4 {
      padding: inherit !important;
    }
  </style>
</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">

          <div class="col-md-5 d-none d-sm-block">
            <img src="<?php echo base_url(); ?>/assets/login/login.jpg" alt="login" class="login-card-img">
            <div class="row" style="padding: 30px;">
              <p style="text-align: center;">
                <button class="btn btn-app" onclick="set_value(0)"><strong class="calc_item">0</strong> </button>
                <button class="btn btn-app" onclick="set_value(1)"><strong class="calc_item">1</strong> </button>
                <button class="btn btn-app" onclick="set_value(2)"><strong class="calc_item">2</strong> </button> <br />
                <button class="btn btn-app" onclick="set_value(3)"><strong class="calc_item">3</strong> </button>
                <button class="btn btn-app" onclick="set_value(4)"><strong class="calc_item">4</strong> </button>
                <button class="btn btn-app" onclick="set_value(5)"><strong class="calc_item">5</strong> </button> <br />
                <button class="btn btn-app" onclick="set_value(6)"><strong class="calc_item">6</strong> </button>
                <button class="btn btn-app" onclick="set_value(7)"><strong class="calc_item">7</strong> </button>
                <button class="btn btn-app" onclick="set_value(8)"><strong class="calc_item">8</strong> </button> <br />
                <button class="btn btn-app" onclick="set_value(9)"><strong class="calc_item">9</strong> </button>
                <button class="btn btn-app" onclick="clearform()"><strong class="calc_item">Clear</strong> </button>
              </p>
            </div>
          </div>

          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <?php
                if (isset($_SESSION['alert'])) {
                  echo $_SESSION['alert'];
                  unset($_SESSION['alert']);
                }
                ?>
              </div>
              <p class="login-card-description">Sign into your account</p>
              <form action="<?php echo site_url('user/pos_auth'); ?>" method="post">
                <div class="form-group">
                  <label for="pin" class="sr-only">PIN</label>
                  <input type="password" name="pin" id="pin" class="form-control" placeholder="Pin number">
                </div>
                <div class="form-group" style="display: none !important">
                  <div class="radio">
                    <label>POS <input type="radio" class="flat" name="wapi" value="1" checked></label>
                    &nbsp;&nbsp;&nbsp;
                    <!-- <label>Bar <input type="radio" class="flat" name="wapi" value="2" ></label> -->
                  </div>

                </div>
                <div class="form-group">
                  <button name="login" class="btn btn-info" type="submit" value="Login"> Login <i class="fas fa-sign-in"></i> </button>
                </div>

              </form>
              <nav class="login-card-footer-nav">
                <a href="#!">Terms of use.</a>
                <a href="#!">Privacy policy</a>
                <a href="http://jiwanitech.com" target="_blank"> <span class="float-right" style="color: #919aa3"> &copy; <?php echo date('Y'); ?> JTL </span> </a> 
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script>
    function set_value(e) {
      console.log("Pin Clicked: " + e);
      var controlVariable = $("#pin").val();
      $("#pin").val(controlVariable + e);
      console.log("Total: " + controlVariable + e);
    }
  </script>
  <script>
    function clearform() {
      //$("#pin").val();
      document.getElementById("pin").value = '';
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>