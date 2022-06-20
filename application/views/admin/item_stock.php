<?php
$CI = &get_instance();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0 text-dark"><button class="pull-left backbtn" title="Back" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"> </i></button>
                        <?= $page ?></h1>
                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script>

                    <a href="<?php echo site_url('stocks/home'); ?>" class="btn btn-rgs">Stock Take <i style="color: black;" class="fa fa-list-ol"></i></a>
                    <?php if ($_SESSION['superuser'] == 1 || $_SESSION['userrole'] == 1) : ?>
                        <button data-toggle="modal" data-target="#reconciliationModal" class="btn btn-rgd">Reconcile Stock <span style="color: green;" class="fa fa-question-circle"></span></button>
                    <?php endif; ?>
                    <a href="#" data-toggle="modal" data-target="#redistributeModal" class="btn btn-rgp">Redistribute Items <i style="color: blue;" class="fa fa-expand"></i></a>
                    <a href="<?=site_url('sys/move_stock')?>" class="btn btn-rgp">Move Stock <i style="color: blue;" class="fa fa-exchange"></i></a>
                    
                </div><!-- /.col -->
                <div class="col-sm-4">
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

                <?php if ($CI->permissions('orgs_add')) : ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Stock List</h3>
                                <div class="card-tools">

                                    <?php if ($_SESSION['userrole'] == 1 || $_SESSION['superuser'] == 1) : ?>
                                        <!-- <select name="" class="select2 form-control" onchange="get_org_stock()" id="orgid"> -->
                                        <select name="" class="" onchange="get_org_stock2(this)" id="orgid">
                                            <option value="">Select order based on Store</option>
                                            <?php foreach ($orgs as $org) : ?>
                                                <option value="<?php echo $org->org_id ?>"> <?php echo $org->org_name ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php endif; ?>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if (isset($_SESSION['storeid'])) { //display on the items in stock when the store_id is live in session
                                        ?>
                                            <table id="example" class="table table-condensed table-bordered responsive-utilities jambo_table">
                                                <thead>
                                                    <tr class="headings">
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th>Stock Qty</th>
                                                        <th>Last Stock Take</th>
                                                        <th>Active</th>
                                                    </tr>
                                                </thead>

                                                <tbody id="stocks">
                                                    <?php
                                                    $c = 0;
                                                    //var_dump($stock_items);
                                                    foreach ($stock_items as $item) {
                                                        $last_qty = 0;
                                                        //$last = $this->db->query("SELECT item_quantity from stock_lines where item_id = $item->item_id AND org_id = $item->store_id ")->row("item_quantity");
                                                        $last = $this->db->select("a.item_quantity, b.org_id")
                                                            ->from("stock_lines as a")
                                                            ->join('stocks as b', 'a.stock_id = b.stock_id')
                                                            ->where("a.item_id = $item->item_id AND b.org_id = $item->store_id ")
                                                            ->get()->row();
                                                        if ($last) $last_qty = $last->item_quantity;
                                                        $c++;
                                                    ?>
                                                        <tr class="even pointer">
                                                            <td><?= $item->item_name . ' - ' . $item->barcode; ?></td>
                                                            <td><?= $item->brand_name . ' ' . $item->unit_name; ?></td>
                                                            <td><?= $item->available_qty; ?></td>
                                                            <td><?= $last_qty; ?></td>
                                                            <td class="a-right a-right ">
                                                                <?php
                                                                if ($item->active == 1) echo "True";
                                                                else echo "False";
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>

                                            </table>

                                        <?php } else  echo '<h4 style="text-align: center; color: #3EC2A4; font-weight: bold">Select store at the top-right side of the page to view stock <i class="fa fa-external-link"></i></h4>';  ?>

                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->


<!-- MODAL START -->

<!-- Redistribute -->
<div id="redistributeModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Redistribute Items</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <p><i class="text-success fa fa-info-circle"></i> Spread items in main store registry to prefered store/shop below</p>
                <form action="<?php echo site_url('stocks/redistribute_items'); ?>" role="form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Prefered Store/Shop <i class="text-danger">*</i></label>
                            <select class="select2 form-control" name="store_id" required style="width: 100%;">

                                <?php
                                $stores = $this->db->get('orgs')->result();
                                foreach ($stores as $st) {
                                    if ($st->parent_org == null) continue;
                                ?>
                                    <option value="<?= $st->org_id ?>"> <?= $st->org_name ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Get Items <i class="text-danger">*</i> </label>
                            <select class="select2 form-control" name="item_id[]" multiple="multiple" required style="width: 100%;">
                                <option value="All">All items</option>
                                <?php
                                $items = $this->db->get('items')->result();
                                foreach ($items as $it) {
                                ?>
                                    <option value="<?= $it->item_id ?>"> <?= $it->item_name . ' - ' . $it->barcode; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12" style="padding-top: 10px;">
                            <label>Choose action point <i class="text-danger">*</i> </label>
                            <p>
                                Distribute: <input type="radio" class="flat" name="action_point" id="action_point" required value="distribute" checked="" />
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                Rollback: <input type="radio" class="flat" name="action_point" id="action_point" required value="rollback" />
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                Override Stock: <input type="radio" class="flat" name="action_point" id="action_point" required value="override" />
                            </p>

                        </div>
                        <div class="col-md-12" style="padding-top: 10px;">
                            <label>If "distribute", then would you like to transfer with the current opening stock? <i class="text-danger">*</i> </label>
                            <p>
                                Yes: <input type="radio" class="flat" name="with_opening_stock" id="with_opening_stock" required value="yes" />
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                No: <input type="radio" class="flat" name="with_opening_stock" id="with_opening_stock" required value="no"  checked="" />
                            </p>

                        </div>
                        <div class="col-md-12">
                            <br />
                            <button type="button" class="btn btn-rgd" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-rgs" name="submit">Submit <i class="fa fa-check"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Reconcile Stock -->
<div id="reconciliationModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reconcile Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <p><i class="text-success fa fa-info-circle"></i> Reconcile stock in prefered store registry and initial stock takes</p>
                <form id="reconciliation_form" role="form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Prefered store/shop <i class="text-danger">*</i></label>
                            <select class="select2 form-control" name="store_id" required style="width: 100%;">

                                <?php
                                $stores = $this->db->get('orgs')->result();
                                foreach ($stores as $st) {
                                    if ($st->parent_org == null) continue;
                                ?>
                                    <option value="<?= $st->org_id ?>"> <?= $st->org_name ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label>Stock take dates <i class="text-danger">*</i></label>
                            <select class="select2 form-control" name="stock_id" required style="width: 100%;">

                                <?php
                                $stocks = $this->db->select('a.*, b.org_name')->from('stocks as a')->join('orgs as b', 'a.org_id = b.org_id')
                                    ->order_by('a.stock_date DESC')->get()->result();
                                foreach ($stocks as $skt) {
                                ?>
                                    <option value="<?= $skt->stock_id ?>"> <?= $skt->org_name . ' | ' . $skt->stock_name . ' | ' . $skt->stock_date ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <br />
                            <button type="button" class="btn btn-rgd" data-dismiss="modal">Close</button>
                            <button type="submit" id="reconcile_btn" class="btn btn-rgs" name="submit">Submit <i class="fa fa-check"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>




<script>
    function reconcile_stock(e) {
        swal({
                title: "Do you wan to reconcile the stock?",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willContinue) => {
                if (willContinue) {
                    // swal("Poof! Your imaginary file has been deleted!", {
                    //   icon: "success",
                    // });
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo site_url('data/stock_reconciliation'); ?>',
                        //data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(result) {
                            console.log(result);
                            //window.location = '<?php echo site_url('sys/item_stock'); ?>';
                            location.reload();
                            return;
                        }
                    });
                } else {
                    swal("This process has been cancelled. Bye!");
                    return;
                }
            });
    }
</script>

<script>
    function get_org_stock2(e) {
        var id = e.value;
        console.log("ID: " + id);
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('sys/store_stock'); ?>',
            data: 'data=' + id,
            cache: false,
            success: function(result) {
                console.log("SESSION: " + result);
                location.reload();
                return;
            }
        });
    }
</script>

<script>
    $(function() {
        $('#reconciliation_form').on('submit', function(e) {
            /*for add item*/
            e.preventDefault();

            swal({
                    title: "Do you wan to reconcile the stock?",
                    text: "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willContinue) => {
                    if (willContinue) {

                        $("#reconcile_btn").attr("disabled", true);
                        $("#reconcile_btn").html("Wait while processing...");

                        $.ajax({
                            url: '<?php echo site_url(); ?>data/stock_reconciliation', //this is the submit URL
                            type: 'POST',
                            data: $('#reconciliation_form').serialize(),
                            success: function(data) {
                                console.log("Response: " + data);
                                var obj = JSON.parse(data);
                                console.log("resp: " + obj.resp);
                                console.log("message: " + obj.message);
                                if (obj.resp == '1') {
                                    location.reload();
                                } else {
                                    $("#reconcile_btn").attr("disabled", false);
                                    $("#reconcile_btn").html("Submit");
                                    swal({
                                        icon: 'warning',
                                        title: 'Failed',
                                        text: 'Sorry! Something went wrong'
                                    });
                                }
                            }
                        });

                    } else {
                        swal("This process has been cancelled. Bye!");
                        return;
                    }
                });

        }); //end registration
    });
</script>