<?php
$types = $this->db->get('account_types')->result();
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

                <?php if ($CI->permissions('accounts_view')) : ?>
                    <div class="col-md-5 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Account Types</h3>
                                <div class="card-tools">
                                    <span data-toggle="tooltip" title="Account Types" class="badge badge-warning"><?php echo count($types); ?></span>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12"> <br />
                                        <table class="table table-striped responsive-utilities">
                                            <thead>
                                                <tr class="headings">
                                                    <th>#</th>
                                                    <th>Acc. Type Name</th>
                                                    <th>Code</th>
                                                    <!-- <th>Narrative</th> -->
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($types as $type) {
                                                    $c++;
                                                ?>
                                                    <tr>
                                                        <td><?= $c; ?></td>
                                                        <td><?= $type->account_type_name; ?></td>
                                                        <td><?= $type->account_type_code; ?></td>
                                                        <!-- <td><?= $type->narrative; ?></td> -->
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

                <?php if ($CI->permissions('accounts_add')) : ?>
                    <div class="col-md-7 col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Register Subaccount Type </h3>
                                <div class="card-tools">
                                    <a href="<?=site_url('accounting/accounts')?>" class="btn btn-rgp btn-sm" ><i class="fas fa-coins"></i> Accounts </a>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo site_url('accounting/add_subaccoutype'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label for="">Organization <span class="text text-danger">*</span> </label>
                                            <select class="form-control select2" name="org_id" id="" required>
                                                <option value="">~Select account type~</option>
                                                <?php
                                                $orgs = $this->db->get('orgs')->result();
                                                foreach ($orgs as $org) {
                                                ?>
                                                    <option value="<?= $org->org_id ?>"> <?= $org->org_name ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label for="">Account Type <span class="text text-danger">*</span> </label>
                                            <select class="form-control select2" name="account_type_id" id="" required>
                                                <option value="">~Select account type~</option>
                                                <?php
                                                foreach ($types as $stp) {
                                                ?>
                                                    <option value="<?= $stp->account_type_id ?>"> <?= $stp->account_type_name ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label for="">Account Type Name <span class="text text-danger">*</span> </label>
                                            <input type="text" name="subaccount_type_name" class="form-control" required />
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label for="">Code </label>
                                            <input type="text" name="subaccount_type_code" class="form-control" />
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label> Is Payment mode? </label>
                                            <p>
                                                <label> Yes <input type="radio" name="is_paymentmode" value="1" /> </label>
                                                <label> No <input type="radio" name="is_paymentmode" checked value="0" /> </label>
                                            </p>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label for="">Narrative </label>
                                            <textarea name="narrative" id="" class="form-control"></textarea>
                                        </div>
                                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                            <button type="Submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-outline card-warning">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="example1" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>#</th>
                                                    <th>Sub Account Type</th>
                                                    <th>Account Type</th>
                                                    <th>Code</th>
                                                    <th>Is Paymnet Mode?</th>
                                                    <th>Narrative</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $c = 0;
                                                $subtps = $this->db->select('a.*, b.account_type_code, b.account_type_name, c.org_name')->from('subaccount_types as a')
                                                    ->join('account_types as b', 'a.account_type_id = b.account_type_id')
                                                    ->join('orgs as c', 'a.org_id = c.org_id')
                                                    ->get()->result();
                                                foreach ($subtps as $subtp) {
                                                    $c++;
                                                ?>
                                                    <tr>
                                                        <td><?= $c; ?></td>
                                                        <td><?= $subtp->subaccount_type_name; ?></td>
                                                        <td><?= $subtp->account_type_name; ?></td>
                                                        <td><?= $subtp->subaccount_type_code; ?></td>
                                                        <td><?php if ($subtp->is_paymentmode == 1) echo '<span class="text-success">True</span>';
                                                            else echo '<span class="text-danger">False</span>'; ?></td>
                                                        <td><?= $subtp->narrative; ?></td>
                                                        <td>
                                                            <?php if ($CI->permissions('accounts_edit')) : ?>
                                                                <button class="btn btn-xs btn-rgp" data-toggle="modal" data-target="#edit<?= $subtp->subaccount_type_id ?>"><i class="fa fa-edit"></i></button>
                                                            <?php endif; ?>
                                                            <?php if ($CI->permissions('accounts_delete')) : ?>
                                                                <?php if ($subtp->subaccount_type_id > 5 && $subtp->subaccount_type_id != 17 && $subtp->subaccount_type_id != 21) : ?>
                                                                    <a class="btn btn-xs btn-rgd" href="<?php echo site_url('accounting/delete_subaccounttype/' . $subtp->subaccount_type_id) ?>"><i class="fa fa-trash"></i></a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>

                                                    <!-- Modal -->
                                                    <?php if ($CI->permissions('accounts_edit')) : ?>
                                                        <div class="modal fade" id="edit<?= $subtp->subaccount_type_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Details</h4>
                                                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?php echo site_url('accounting/update_subaccoutype'); ?>" method="post">
                                                                            <div class="row">
                                                                                <input type="hidden" style="display: none;" name="id" value="<?= $subtp->subaccount_type_id ?>" required />
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <label for="">Organization <span class="text text-danger">*</span> </label>
                                                                                    <select class="form-control select2" name="org_id" id="" required style="width: 100%" >
                                                                                        <option value="">~Select account type~</option>
                                                                                        <?php
                                                                                        $orgs = $this->db->get('orgs')->result();
                                                                                        foreach ($orgs as $org) {
                                                                                        ?>
                                                                                            <option value="<?= $org->org_id ?>" <?php if ($subtp->org_id == $org->org_id) echo 'selected'; ?>> <?= $org->org_name ?> </option>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <label for="">Account Type <span class="text text-danger">*</span> </label>
                                                                                    <select class="form-control select2" name="account_type_id" id="" required style="width: 100%" >
                                                                                        <option value="">~Select account type~</option>
                                                                                        <?php
                                                                                        foreach ($types as $stp) {
                                                                                        ?>
                                                                                            <option value="<?= $stp->account_type_id ?>" <?php if ($subtp->account_type_id == $stp->account_type_id) echo 'selected'; ?>> <?= $stp->account_type_name ?> </option>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <label for="">Account Type Name <span class="text text-danger">*</span> </label>
                                                                                    <input type="text" name="subaccount_type_name" class="form-control" value="<?= $subtp->subaccount_type_name ?>" required />
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <label for="">Code </label>
                                                                                    <input type="text" name="subaccount_type_code" class="form-control" value="<?= $subtp->subaccount_type_code ?>" />
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <label> Is Payment mode? </label>
                                                                                    <p>
                                                                                        <label> Yes <input type="radio" name="is_paymentmode" value="1" <?php if ($subtp->is_paymentmode == 1) echo 'checked'; ?> /> </label>
                                                                                        <label> No <input type="radio" name="is_paymentmode" checked value="0" <?php if ($subtp->is_paymentmode == 0) echo 'checked'; ?> /> </label>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <label for="">Narrative </label>
                                                                                    <textarea name="narrative" id="" class="form-control"><?= $subtp->narrative ?></textarea>
                                                                                </div>
                                                                                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                                                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                                                                                    <button type="Submit" class="btn btn-primary">Update</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                <?php
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
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