<style>
    .btn-xs {
        margin: 0px !important;
    }
</style>
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

                <?php if ($CI->permissions('general_add')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-body">
                                <form id="getp9">
                                    <p>
                                        <span class="fa fa-info-circle"> Select Organization first to list down employees/staff.</span>
                                    </p>

                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <label for="">Organization <span class="text text-danger">*</span> </label>
                                            <select class="form-control select2" onchange="get_employees2()" id="org_id2" name="org_id" required>
                                                <option value=""> ~Select Org~ </option>
                                                <?php
                                                foreach ($orgs as $org) {
                                                ?>
                                                    <option value="<?php echo $org->org_id; ?>"> <?php echo $org->org_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <label for="">Staff <span class="text text-danger">*</span> </label>
                                            <select name="employee_id" id="employee_id2" class="form-control select2" required>
                                                <option value=""> ~Select Staff~ </option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <label for="">Year <span class="text text-danger">*</span> </label>
                                            <select class="form-control select2" name="fiscal_year_id" required>
                                                <option value=""> ~Select Year~ </option>
                                                <?php
                                                foreach ($fiscal_years as $year) {
                                                ?>
                                                    <option value="<?php echo $year->fiscal_year_id ?>"><?php echo $year->fiscal_year_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-xs-12" style="padding-top: 8px; margin-top: 8px;">
                                            <input type="submit" class="btn btn-success" value="Process" />
                                        </div>
                                    </div>

                                </form>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

                <?php if ($CI->permissions('general_view')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">P9 Form List</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped responsive-utilities jambo_table">
                                                <thead>
                                                    <tr class="headings">
                                                        <th style="width: 250px;">Staff</th>
                                                        <th>Basic Salary</th>
                                                        <th>Gross Salary</th>
                                                        <th>Net Salary</th>
                                                        <th>Disbursed? </th>
                                                        <th>Paid? </th>
                                                        <th class=" no-link last"><span class="nobr">Action</span>
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody id="table_data"></tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

                <br />
                <br />
                <br />

            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->


<script type="text/javascript">
    function get_employees2() {
        var orgid = document.getElementById("org_id2").value;
        console.log("OrgID: " + orgid);
        $.ajax({
            url: '<?php echo site_url('data/employees'); ?>',
            type: 'POST',
            cache: false,
            data: 'data=' + orgid,
            success: function(data) {
                console.log(data);
                $('#employee_id2').html(data);
            }
        });
    }

    $(function() {
        $('#getp9').on('submit', function(e) {
            /*for getting p9*/
            e.preventDefault();

            $.ajax({
                url: '<?php echo site_url(); ?>/payroll/get_staff_p9', //this is the submit URL
                type: 'POST',
                data: $('#getp9').serialize(),
                success: function(html) {
                    //alert(data);
                    $('#table_data').html(html);
                }
            });
        });
    });
</script>