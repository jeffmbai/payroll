<script type="text/javascript">
    window.onload = function() {
        //script that gets the location cordinates upon clicking on the location in the map
        var mapOptions = {
            center: new google.maps.LatLng(-1.2925383809064919, 36.819457611227755),
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var infoWindow = new google.maps.InfoWindow();
        var latlngbounds = new google.maps.LatLngBounds();
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        google.maps.event.addListener(map, 'click', function(e) {
            //alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
            console.log("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
            document.getElementById("latitude").value = e.latLng.lat();
            document.getElementById("longitude").value = e.latLng.lng();
        });
    }
</script>

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
                        <div class="card card-outline card-warning collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Form</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('stations/add_station'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Organization <span class="text text-danger">*</span> </label>
                                            <select name="org" class="select2 form-control" id="" style="width: 100%">
                                                <option>Select organization</option>
                                                <?php
                                                if ($_SESSION['superuser'] == 1) {
                                                    foreach ($orgs as $org) {
                                                ?>
                                                        <option value="<?php echo $org->org_id ?>"> <?php echo $org->org_name; ?> </option>
                                                    <?php
                                                    }
                                                } else {
                                                    foreach ($orgs as $org) {
                                                        if ($org->org_id != $_SESSION['orgid']) continue;
                                                    ?>
                                                        <option value="<?php echo $org->org_id ?>"> <?php echo $org->org_name; ?> </option>
                                                <?php
                                                    }
                                                }

                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Station Name <span class="text text-danger">*</span> </label>
                                            <input type="text" name="station_name" class="form-control" required />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Station Category <span class="text text-danger">*</span> </label>
                                            <select name="station_category" class="select2 form-control" id="" style="width: 100%">
                                                <option>Select category</option>
                                                <?php
                                                foreach ($categories as $cat) {
                                                ?>
                                                    <option value="<?php echo $cat->cat_id; ?>"> <?php echo $cat->cat_name; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Primary Phone <span class="text text-danger">*</span> </label>
                                            <input type="text" name="primary_phone" class="form-control" required />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Secondary Phone </label>
                                            <input type="text" name="secondary_phone" class="form-control" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Other Phone</label>
                                            <input type="text" name="other_phone" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Primary Email <span class="text text-danger">*</span> </label>
                                            <input type="text" name="primary_email" class="form-control" required />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Secondary Email </label>
                                            <input type="text" name="secondary_email" class="form-control" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Other Email</label>
                                            <input type="text" name="other_email" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <small class="text text-success"><span class="fa fa-info-circle"></span> Type in the coordinates of the station's location or click the location on the map</small>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Latitude</label>
                                            <input type="text" name="latitude" id="latitude" class="form-control" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Longitude</label>
                                            <input type="text" name="longitude" id="longitude" class="form-control" />
                                        </div>
                                        <!-- <div class="col-md-12 col-sm-12" style="padding: 15px; display">
                                    <div id="dvMap" style="width: 100%; height: 250px"></div>
                                </div> -->
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label> Active </label>
                                            <p>
                                                <input type="checkbox" class="flat" value="1" checked name="active">
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Narrative </label>
                                            <textarea name="narrative" id="" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                            <button type="Submit" class="btn btn-primary">Save</button>
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
                                <h3 class="card-title">List</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>Station Name</th>
                                                    <th>Organization</th>
                                                    <th>Category</th>
                                                    <th>Address</th>
                                                    <th>Lat | Long</th>
                                                    <th>Country</th>
                                                    <th>Active</th>
                                                    <th class=" no-link last"><span class="nobr">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;

                                                foreach ($stations as $station) {
                                                    $c++;

                                                ?>
                                                    <tr class="even pointer">
                                                        <td>
                                                            <?php echo $station->station_name; ?><br>
                                                            <small><?php echo $station->primary_phone . ' | ' . $station->primary_email; ?></small>
                                                        </td>
                                                        <td><?php echo $station->org_name; ?></td>
                                                        <td><?php echo $station->cat_name; ?></td>
                                                        <td><?php echo $station->address; ?></td>
                                                        <td><small> <?php echo 'Lat: ' . $station->latitude . '<br>Long: ' . $station->longitude; ?> </small></td>
                                                        <td><?php echo $station->country_name; ?></td>
                                                        <td class="a-right a-right ">
                                                            <?php
                                                            if ($station->active == 1) echo "True";
                                                            else echo "False";
                                                            ?>
                                                        </td>
                                                        <td class=" last">
                                                            <a href="#" class="btn btn-rgp btn-xs" data-toggle="modal" data-target="#editStation<?php echo $station->station_id; ?>"><span class="fa fa-eye"></span></a>
                                                            <a href="<?php echo site_url('stations/delete/' . $station->station_id); ?>" class="btn btn-xs btn-rgd"><span class="fa fa-trash"></span></a>
                                                        </td>

                                                        <div class="modal fade" id="editStation<?php echo $station->station_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                                                        <h4 class="modal-title" id="myModalLabel">Edit Station</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?php echo site_url('stations/update_station/' . $station->station_id); ?>" method="post" enctype="multipart/form-data">

                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <label for="">Station Name <span class="text text-danger">*</span> </label>
                                                                                    <input type="text" name="station_name" class="form-control" value="<?php echo $station->station_name; ?>" required />
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <label for="">Organization <span class="text text-danger">*</span> </label>
                                                                                    <select name="org" class="select2 form-control" id="" style="width: 100%">
                                                                                        <option>Select organization</option>
                                                                                        <?php
                                                                                        if ($_SESSION['superuser'] == 1) {
                                                                                            foreach ($orgs as $org) {
                                                                                        ?>
                                                                                                <option value="<?php echo $org->org_id ?>" <?php if ($station->org_id == $org->org_id) echo "selected"; ?>> <?php echo $org->org_name; ?> </option>
                                                                                            <?php
                                                                                            }
                                                                                        } else {
                                                                                            foreach ($orgs as $org) {
                                                                                                if ($org->org_id != $_SESSION['orgid']) continue;
                                                                                            ?>
                                                                                                <option value="<?php echo $org->org_id ?>" <?php if ($station->org_id == $org->org_id) echo "selected"; ?>> <?php echo $org->org_name; ?> </option>
                                                                                        <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <label for="">Station Category <span class="text text-danger">*</span> </label>
                                                                                    <select name="station_category" class="select2 form-control" id="" style="width: 100%">
                                                                                        <option>Select category</option>
                                                                                        <?php
                                                                                        foreach ($categories as $cat) {
                                                                                        ?>
                                                                                            <option value="<?php echo $cat->cat_id; ?>" <?php if ($station->category_id == $cat->cat_id) echo "Selected"; ?>> <?php echo $cat->cat_name; ?> </option>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>

                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <label for="">Primary Phone <span class="text text-danger">*</span> </label>
                                                                                    <input type="text" name="primary_phone" class="form-control" value="<?php echo $station->primary_phone; ?>" required />
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="">Secondary Phone </label>
                                                                                    <input type="text" name="secondary_phone" value="<?php echo $station->secondary_phone; ?>" class="form-control" />
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="">Other Phone</label>
                                                                                    <input type="text" name="other_phone" value="<?php echo $station->other_phone; ?>" class="form-control" />
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <label for="">Primary Email <span class="text text-danger">*</span> </label>
                                                                                    <input type="text" name="primary_email" value="<?php echo $station->primary_email; ?>" class="form-control" required />
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="">Secondary Email </label>
                                                                                    <input type="text" name="secondary_email" value="<?php echo $station->secondary_email; ?>" class="form-control" />
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="">Other Email</label>
                                                                                    <input type="text" name="other_email" value="<?php echo $station->other_email; ?>" class="form-control" />
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <label for="">Latitude</label>
                                                                                    <input type="text" name="latitude" id="latitude" value="<?php echo $station->latitude; ?>" class="form-control" />
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="">Longitude</label>
                                                                                    <input type="text" name="longitude" id="longitude" value="<?php echo $station->longitude; ?>" class="form-control" />
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="">Narrative <small class="text text-success">Can be detailed address & contact info</small> </label>
                                                                                    <textarea name="narrative" id="" class="form-control"> <?php echo $station->narrative; ?> </textarea>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <label> Active </label>
                                                                                    <p>
                                                                                        <input type="checkbox" class="flat" <?php if ($station->active == 1) echo "checked"; ?> value="1" name="active">
                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                    <button type="Submit" class="btn btn-primary pull-right">Update</button>
                                                                                </div>
                                                                            </div>

                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


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




<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <button class="pull-left backbtn" title="Back" style="border-radius: 10rem;border:white;font-size: 2rem;margin: 5px;padding-right: 3rem;color: #527cf2;background-color: transparent;" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"> </i></button>
                Stations
            </h3>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12">
            <?php
            if (isset($_SESSION['alert'])) {
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }
            ?>
        </div>

        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> <a class="btn btn-sm btn-primary collapse-link">Add Station <i class="fa fa-chevron-up"></i></a></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: none">
                    <div class="dashboard-widget-content">



                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Registered Stations </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                </div>
            </div>
        </div>

        <br />
        <br />
        <br />

    </div>
</div>