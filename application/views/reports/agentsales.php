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

            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Staff Sale Report</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Staff</label>
                                    <select name="staff_sales" id="staff_sales" class="select2 form-control">
                                        <option value="">Select staff</option>
                                        <?php
                                        if($_SESSION['userid'] == 1)
                                            $staffs = $this->db->query("SELECT entity_id, firstname, secondname, lastname FROM entitys WHERE system_role NOT IN (3,4) ")->result();
                                        else 
                                            $staffs = $this->db->query("SELECT entity_id, firstname, secondname, lastname FROM entitys WHERE system_role NOT IN (3,4) AND entity_id != 1 ")->result();
                                        ?>
                                        <?php foreach ($staffs as $staff) : ?>
                                            <option value="<?php echo $staff->entity_id ?>"> <?php echo $staff->firstname . ' ' . $staff->secondname . ' ' . $staff->lastname; ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">From date/month</label>
                                    <input type="date" class="form-control" name="from_date" id="from_date" />
                                </div>
                                <div class="col-md-4">
                                    <label for="">To date/month</label>
                                    <input type="date" class="form-control" name="to_date" id="to_date" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <br/>
                                    <button class="btn btn-primary" name="submit" onclick="generate_rpt()" type="button">Generate Report</button>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>

                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="card card-outline card-warning">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 table-response">
                                    <table id="example1" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th>Name</th>
                                                <th>Email </th>
                                                <th>Phone </th>
                                                <th>ID/ Passport </th>
                                                <th>Org </th>
                                                <th class=" no-link last"><span class="nobr">Action</span> </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $c = 0;
                                            foreach ($all_users as $usr) {
                                                $c++;
                                            ?>
                                                <tr class="even pointer">
                                                    <td><?php echo $usr->firstname . ' ' . $usr->secondname . ' ' . $usr->lastname; ?></td>
                                                    <td><a href="mailto:<?php echo $usr->email; ?>" target="_blank"> <?php echo $usr->email; ?></a></td>
                                                    <td><a href="tel:<?php echo $usr->phone; ?>"><?php echo $usr->phone; ?></a> <i class="success fa fa-phone"></i>
                                                    </td>
                                                    <td><?php echo $usr->id_passport; ?></td>
                                                    <td><?php echo $usr->org_name; ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                                <span class="caret"></span></button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="<?php echo site_url('users/profile/' . $usr->entity_id); ?>"><span class="fa fa-eye"></span> View</a></li>
                                                                <li><a href="<?php echo site_url('reports/agent_orders/' . $usr->entity_id); ?>"><span class="fa fa-shopping-cart"></span> Orders</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>

                </div>

            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->


<script type="text/javascript">
    function generate_rpt() {
        var staffid = $('#staff_sales').val();
        var fromdate = $('#from_date').val();
        var todate = $('#to_date').val();
        console.log(staffid + " : " + fromdate + " : " + todate);
        $.ajax({
            url: '<?php echo site_url('data/staff_sales_rpt'); ?>',
            type: 'POST',
            cache: false,
            data: 'staffid=' + staffid + '&from=' + fromdate + '&to=' + todate,
            success: function(html) {
                $('#example1').html('').html(html);
                //console.log(html);
            }
        });
    }
</script>