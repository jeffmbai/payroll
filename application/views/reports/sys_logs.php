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
            <h1 class="m-0 text-dark"><?php echo $page;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $page;?></li>
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
                        if(isset($_SESSION['alert'])) {
                            echo $_SESSION['alert'];
                            unset($_SESSION['alert']);
                        }
                    ?>
                </div>
            </div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12" style="display: none;">
                <div class="card direct-chat direct-chat-warning">
                    <div class="card-header">
                        <h3 class="card-title">Filter Bookings</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">                        
                        <form id="filter_bookings" action="<?php echo site_url('bookings/export_filter');?>" method="post">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">From Date</label>
                                    <input type="date" name="from_date" id="from_date" class="form-control" required />
                                </div>
                                <div class="col-md-3">
                                    <label for="">To Date</label>
                                    <input type="date" name="to_date" id="to_date" class="form-control" required />
                                </div>
                                <div class="col-md-6">
                                    <br/>
                                    <div class="" style="padding-top: 10px;">
                                        <button type="button" class="btn btn-primary btn-sm" onclick="generate_rpt()" name="filter" title="Filter Query" >Filter <span class="fa fa-filter"></span></button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-default btn-sm btn-rgd" name="pdf" title="Export to PDF" >PDF <span class="fas fa-file-pdf"></span></button>
                                        <button type="submit" class="btn btn-default btn-sm btn-rgs" name="excel" title="Export to Excel/CSV" >Excel <span class="fa fa-file-excel"></span></button>
                                    </div>
                                </div>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card direct-chat direct-chat-warning">
                    <div class="card-header">
                        <h3 class="card-title">All Trail Listing</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-md-12 table"> <br/>
                            <table id="example1" class="table table-striped responsive-utilities jambo_table" style="font-size: 13px;">
                                <thead>
                                    <tr class="headings">
                                        <th>Ref#</th>
                                        <th>Event</th>
                                        <th>Username</th>
                                        <th>Table</th>
                                        <th>Start Time</th>
                                        <th>Timestamp</th>
                                        <?php if($_SESSION['superuser'] == 1 && $_SESSION['userid'] == 2):?>
                                        <th>Action</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>

                                <tbody id="result">
                                    <?php                                        
                                        foreach($trails as $dt) {
                                            ?>
                                            <tr>
                                                <td><?='#'.$dt->sys_log_id;?></td>
                                                <td><?=$dt->event_name;?></td>
                                                <td><?=$dt->username;?></td>
                                                <td><?=$dt->source.': '.$dt->source_id;?></td>
                                                <td><?=$dt->start_time;?></td>
                                                <td><?=$dt->time_stamp;?></td>
                                                <?php if($_SESSION['superuser'] == 1 && $_SESSION['userid'] == 2):?>
                                                <td>
                                                    <a href="#" onclick="more_info(<?=$dt->sys_log_id;?>)" >More <i class="fas fa-expand-alt"></i></a>
                                                </td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div><!-- /.card-body -->
                </div>

            </div>

            <br />
            <br />
            <br />

        </div>


        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->



  <!-- Modals Start -->
  <div id="more_info" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Sys Logs</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div id="log-data"></div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
</div>


  <script type="text/javascript">
    
    function more_info (e) {
        
        $.ajax({
        url: '<?php echo site_url('sys/this_audit');?>',
        type: 'POST',
        cache: false,
        data: { data : e },
        success: function(html){
            console.log("Response: " + html);
            
            document.getElementById("log-data").innerHTML = html;
            $("#more_info").modal("show");
        }
        });
    }

    function generate_rpt() {
        var fromdate = $('#from_date').val();
        var todate = $('#to_date').val();
        if(fromdate == null || fromdate == '') {
            alert('Warning! Ensure your have selected from date');
            return;
        }
        if(todate == null || todate == '') {
            alert('Warning! Ensure your have selected to date');
            return;
        }
        console.log(fromdate+" : "+todate);
        $('#result').html('');
        $.ajax({
            url: '<?php echo site_url('bookings/filter_rpt'); ?>',
            type: 'POST',
            cache: false,
            data: { fromdate : fromdate, todate : todate },
            success: function(html){
                $('#result').html(html);
                //console.log(html);
            }
        });
    }
</script>


















