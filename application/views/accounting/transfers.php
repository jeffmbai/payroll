<?php
$accounts = $this->db->where('is_votehead', 0)->get('vw_accounts')->result();
$fiscal_years = $this->db->get('fiscal_years')->result();
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

            <div class="row">

                <?php if ($CI->permissions('orgs_add')) : ?>
                    <div class="col-md-6 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">New Transfer</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('transfers/add_transfer'); ?>" method="post">

                                    <div class="row">

                                        <div class="col-sm-12 col-xs-12">
                                            <h4>From Accounts (OUT Account)</h4>

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <label for="">OUT Account <i class="text-danger">*</i></label>
                                                    <select name="account_idcr" id="account_idcr" onchange="" required class="select2 form-control">
                                                        <option>~Select account~</option>
                                                        <?php
                                                        foreach ($accounts as $acc) {
                                                        ?>
                                                            <option value="<?= $acc->account_id ?>"> <?= $acc->subaccount_type_name . ' ' . $acc->account_code . ' ~ ' . $acc->account_name ?> </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <hr />

                                        <div class="col-sm-12 col-xs-12">
                                            <h4>To Accounts (IN account)</h4>

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <label for="">IN Account <i class="text-danger">*</i></label>
                                                    <select name="account_iddr" id="account_iddr" onchange="" class="select2 form-control" required>
                                                        <option>~Select account~</option>
                                                        <?php
                                                        foreach ($accounts as $acc) {
                                                        ?>
                                                            <option value="<?= $acc->account_id ?>"> <?= $acc->subaccount_type_name . ' ' . $acc->account_code . ' ~ ' . $acc->account_name ?> </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-xs-12" style="display: none;">
                                            <label for="">Fiscal Year <i class="text-danger">*</i></label>
                                            <select name="fiscal_year" onchange="" class="select2 form-control" required>
                                                <option>~Select fiscal year~</option>
                                                <?php
                                                foreach ($fiscal_years as $fy) {
                                                ?>
                                                    <option value="<?= $fy->fiscal_year_id ?>" <?php if ($_SESSION['fiscalyearid'] == $fy->fiscal_year_id) echo 'selected'; ?>> <?= $fy->fiscal_year_name ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-xs-12">
                                            <label>Amount <i class="text-danger">*</i></label>
                                            <input type="number" step='0.01' name="amount" required class="form-control" />
                                        </div>

                                        <div class="col-md-6 col-xs-12">
                                            <label>Reference <i class="text-danger">*</i></label>
                                            <input type="text" name="reference" required class="form-control" />
                                        </div>

                                        <div class="col-md-6 col-xs-12">
                                            <label>Transaction Date <i class="text-danger">*</i></label>
                                            <input type="date" name="transaction_date" required class="form-control" />
                                        </div>

                                        <div class="col-md-12 col-xs-12">
                                            <label>Narrative </label>
                                            <textarea name="narrative" class="form-control" placeholder="Write a note here..."></textarea>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <button type="submit" name="Submit" class="btn btn-primary" required style="margin-top: 28px;">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                <?php endif; ?>

                <?php if ($CI->permissions('orgs_add')) : ?>
                    <div class="col-md-6 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">New Posting</h3>
                                <div class="card-tools">
                                    <button type="button" data-toggle="modal" data-target="#bulkUpload" class="btn btn-sm btn-primary">Bulk Posting <i class="fa fa-upload"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('transfers/add_posting'); ?>" method="post">

                                    <div class="row">

                                        <div class="col-sm-12 col-xs-12">

                                            <div class="row">
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <label for="">Account <i class="text-danger">*</i></label>
                                                    <select name="account_id" onchange="" class="select2 form-control" required>
                                                        <option>~Select account~</option>
                                                        <?php
                                                        foreach ($accounts as $acc) {
                                                        ?>
                                                            <option value="<?= $acc->account_id ?>"> <?= $acc->subaccount_type_name . ' ' . $acc->account_code . ' ~ ' . $acc->account_name ?> </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-xs-12" style="display: none;">
                                                    <label for="">Fiscal Year <i class="text-danger">*</i></label>
                                                    <select name="fiscal_year" onchange="" class="select2 form-control" required>
                                                        <option>~Select fiscal year~</option>
                                                        <?php
                                                        foreach ($fiscal_years as $fy) {
                                                        ?>
                                                            <option value="<?= $fy->fiscal_year_id ?>" <?php if ($_SESSION['fiscalyearid'] == $fy->fiscal_year_id) echo 'selected'; ?>> <?= $fy->fiscal_year_name ?> </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <label>Amount <i class="text-danger">*</i></label>
                                                    <input type="number" name="amount" step='0.01' required class="form-control" />
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                    <label>Reference</label>
                                                    <input type="text" name="reference" class="form-control" />
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                    <label>Transaction Date <i class="text-danger">*</i></label>
                                                    <input type="date" name="transaction_date" required class="form-control" />
                                                </div>
                                                <div class="col-md-12 col-xs-12">
                                                    <p class="text-info fa fa-info-circle"> All opening balances will automatically be registered by the system as 'out'</p>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <label for="">Opening Balance? <i class="text-danger">*</i></label> </br>
                                                    <label>Yes <input type="radio" value="obyes" name="opening" required></label> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <label>No <input type="radio" value="obno" checked name="opening" required></label>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <label for="">Money IN/OUT? <i class="text-danger">*</i></label> </br>
                                                    <label>IN <input type="radio" value="dr" name="drcr" required></label> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <label>OUT <input type="radio" value="cr" name="drcr" required></label>
                                                </div>

                                                <div class="col-md-12 col-xs-12">
                                                    <label>Narrative </label>
                                                    <textarea name="narrative" class="form-control" placeholder="Write a note here..."></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <button type="submit" name="Submit" class="btn btn-primary" required style="margin-top: 28px;">Submit</button>
                                        </div>
                                    </div>

                                </form>
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



<!-- Modal -->
<div id="bulkUpload" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl" style="width:80%">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title">Bulk journal entry</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="<?php echo site_url("transfers/add_bulk_posting"); ?>" role="" method="post">
                        <div class="col-md-12 col-xs-12 table-responsive">
                            <table class="table table-bordered table-striped table-condensed" id="order_table">
                                <tr>
                                    <th style="width: 300px;">Account</th>
                                    <th>Amount</th>
                                    <th>Reference</th>
                                    <th>Journal Date</th>
                                    <th>Opening Bal?</th>
                                    <th>IN/Out</th>
                                    <th>Narrative</th>
                                    <th><button type="button" class="btn btn-default" onclick="add_row()"><span class="fa fa-plus"></span></button></th>
                                </tr>

                                <tr id="row1">
                                    <td>
                                        <select name="account_id[]" class="select2 form-control" id="account_1" required style='width: 100%;'>
                                            <option>~Select account~</option>
                                            <?php
                                            foreach ($accounts as $acc) {
                                            ?>
                                                <option value="<?= $acc->account_id ?>"> <?= $acc->subaccount_type_name . ' ' . $acc->account_code . ' ~ ' . $acc->account_name ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" class="form-control input-rg" name="amount[]" placeholder='Enter amount' required />
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-rg" name="reference[]" required placeholder='Mpesa/Bank/Receipt no.' />
                                    </td>
                                    <td>
                                        <input type="date" class="form-control input-rg" name="transaction_date[]" required />
                                    </td>
                                    <td>
                                        <select class="form-control" name="opening[]" required>
                                            <option value="obyes"> Yes </option>
                                            <option value="obno" selected> No </option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="drcr[]" required>
                                            <option value="dr"> IN </option>
                                            <option value="cr" selected> OUT </option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control input-rg" name="narrative[]" /></td>
                                    <td>
                                        <button type="button" class="btn btn-rgd" onclick="delete_row(1)"><span class="fa fa-minus"></span></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-xs-12 col-md-12">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<script>
    function add_row() {
        $rowno = $("#order_table tr").length;
        $rowno = $rowno + 1;
        $("#order_table tr:last").after("<tr id='row" + $rowno + "'>  " +
            "<td> " +
            "<select name='account_id[]' class='select2 form-control' tabindex='-1' required style='width: 100%;' >" +
            "<option >Select account</option>"
            <?php foreach ($accounts as $itm) : ?> +
                "<option value='<?php echo $acc->account_id ?>' ><?= $acc->subaccount_type_name . ' ' . $acc->account_code . ' ~ ' . $acc->account_name ?> </option>"
            <?php endforeach; ?> +
            "</select> " +
            "</td> " +
            "<td><input type='number' class='form-control' step='0.01' name='amount[]' placeholder='Enter amount' requierd></td> " +
            "<td><input type='text' class='form-control' name='reference[]' required placeholder='Mpesa/Bank/Receipt no.' ></td> " +
            "<td><input type='date' class='form-control' name='transaction_date[]' required ></td> " +
            "<td> " +
            "<select class='form-control' name='opening[]' required> " +
            "<option value='obyes'> Yes </option>" +
            "<option value='obno' selected > No </option>" +
            "</select> " +
            "</td> " +
            "<td> " +
            "<select class='form-control' name='opening[]' required> " +
            "<option value='dr'> IN </option>" +
            "<option value='cr' selected > OUT </option>" +
            "</select> " +
            "</td> " +
            "<td><input type='text' class='form-control' name='narrative[]' ></td> " +
            "<td><button type='button' class='btn btn-rgd' onclick=delete_row('" + $rowno + "')><span class='fa fa-minus'></span></button></td> " +
            "</tr>");

        //$("#order_table tr:last").after(html);
        $(".select2").select2({
            allowClear: true
        });
        $(".select2_group").select2({
            allowClear: true
        });
    }
</script>

<script type="text/javascript">
    function delete_row(rowno) {
        $('#row' + rowno).remove();

        refresh_table();
    }
</script>