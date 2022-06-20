<!-- Modal Start -->

<!-- Modal -->
<div id="contact" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Contact</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('sys/contact_support') ?>" method="post">
          <div class="row">
            <div class="col-md-12">
              <label>Subject <i class="text-danger">*</i> </label>
              <input class="form-control" maxlength="100" type="text" name="subject" placeholder="Enter subject" required />
            </div>
            <div class="col-md-12">
              <label>Narrative <i class="text-danger">*</i> </label>
              <textarea class="form-control" name="narrative" required maxlength="400" placeholder="Write here...(max 400 characters)"></textarea>
            </div>
            <div class="col-md-12">
              <br />
              <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-sm btn-info">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <small>
          You can contact us via: <br />
          Email: info@jiwanitech.com | Phone: +284 739 698 964 | P.O Box 22139 - 00100 GPO
        </small>
      </div>
    </div>

  </div>
</div>
<!-- Modal End -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer no-print">
  <strong>Copyright &copy; <?= date('Y') ?> <a href="https://jiwanitech.com">Jiwani</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 2.0
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

<!-- PAGE <?php echo base_url(); ?>assets/PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<!-- <script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script> -->

<!-- Sound Script Start -->
<script>
  function success_sound() {
    jQuery("<audio>").attr({ //create the audio object
      "hidden": true,
      "autostart": true,
      "loop": false,
      "src": "<?php echo site_url('assets/sound/success.mp3') ?>"
    }).bind("ended", function() {
      // do nothing
    }).appendTo("#body"); //add the audio to the DOM

    jQuery("audio")[0].play();
  }
  function error_sound() {
    jQuery("<audio>").attr({ //create the audio object
      "hidden": true,
      "autostart": true,
      "loop": false,
      "src": "<?php echo site_url('assets/sound/failed.mp3') ?>"
    }).bind("ended", function() {
      // do nothing
    }).appendTo("#body"); //add the audio to the DOM

    jQuery("audio")[0].play();
  }
  function login_sound() {
    jQuery("<audio>").attr({ //create the audio object
      "hidden": true,
      "autostart": true,
      "loop": false,
      "src": "<?php echo site_url('assets/sound/login.mp3') ?>"
    }).bind("ended", function() {
      // do nothing
    }).appendTo("#body"); //add the audio to the DOM

    jQuery("audio")[0].play();
  }
</script>
<!-- Sound Script End -->

<!-- Page script -->
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
      format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function() {
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>

<!-- For Datatables -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


<!-- Custom JS Start -->
<!-- 
  By JiPOS
  Author: Reagan Omondi
  Site: www.jiwanitech.com
 -->

<script type="text/javascript">
  function get_org_orders() {
    console.log($('#orgid').val());
    var orgid = $('#orgid').val();
    $.ajax({
      url: '<?php echo site_url('data/store_orders'); ?>',
      type: 'POST',
      cache: false,
      data: 'data=' + orgid,
      success: function(html) {
        $('#orders').html(html);
      }
    });
  }

  function get_org_stock() {
    console.log($('#orgid').val());
    var orgid = $('#orgid').val();
    $.ajax({
      url: '<?php echo site_url('data/store_stock'); ?>',
      type: 'POST',
      cache: false,
      data: 'data=' + orgid,
      success: function(html) {
        $('#stocks').html(html);
      }
    });
  }

  function get_items2() {
    console.log($('#org_id3').val());
    var orgid = $('#org_id3').val();
    $.ajax({
      url: '<?php echo site_url('data/org_items'); ?>',
      type: 'POST',
      cache: false,
      data: 'data=' + orgid,
      success: function(html) {
        $('#org_items3').html(html);
        //select2();
      }
    });
  }

  function get_items3() {
    console.log($('#org_id1').val());
    var orgid = $('#org_id1').val();
    $.ajax({
      url: '<?php echo site_url('data/org_items'); ?>',
      type: 'POST',
      cache: false,
      data: 'data=' + orgid,
      success: function(html) {
        $('#org_items2').html(html);
        //select2();
      }
    });
  }

  function get_store_items() {
    console.log($('#storeid').val());
    var storeid = $('#storeid').val();
    $.ajax({
      url: '<?php echo site_url('data/store_items'); ?>',
      type: 'POST',
      cache: false,
      data: 'data=' + storeid,
      success: function(html) {
        $('#store_items').html(html);
        //select2();
      }
    });
  }

  function get_items4() {
    console.log($('#org_id2').val());
    var orgid = $('#org_id2').val();
    $.ajax({
      url: '<?php echo site_url('data/org_items'); ?>',
      type: 'POST',
      cache: false,
      data: 'data=' + orgid,
      success: function(html) {
        $('#org_items4').html(html);
      }
    });
  }

  function get_item_quantity() {
    console.log($('#org_items3').val());
    var itemid = $('#org_items3').val();
    var orgid = $('#org_id3').val();
    console.log("Item: " + itemid);
    console.log("Org: " + orgid);

    $.ajax({
      url: '<?php echo site_url('data/this_item'); ?>',
      type: 'POST',
      cache: false,
      data: 'data=' + itemid + '&orgid=' + orgid,
      success: function(html) {
        console.log('Response: ' + html);
        $('#availability').val(html);
      }
    });
  }

  /* Example */
  $(function() {
    $('#registerform').on('submit', function(e) {
      /*for add item*/
      e.preventDefault();

      $.ajax({
        url: 'functions/register.php', //this is the submit URL
        type: 'POST',
        data: $('#registerform').serialize(),
        success: function(html) {
          //alert(data);
          $('#alert').html(html);
        }
      });
    }); //end registration
  });
</script>

<!-- Custom JS End-->

<?php
if(isset($_SESSION['login'])) {
  echo $_SESSION['login'];
  unset($_SESSION['login']);
}
?>

</body>

</html>