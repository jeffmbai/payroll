<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <button class="pull-left backbtn" title="Back" onclick="window.history.back()"><i class="fa fa-arrow-left" aria-hidden="true">  </i></button>
                <?php echo $page;?>
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12">
            <?php
                if(isset($_SESSION['alert'])) {
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-condensed">
                                <thead style="background-color: #025757; color: aliceblue;">
                                    <tr>
                                        <th>Account</th>
                                        <th>DEBIT</th>
                                        <th>CREDIT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- expenses first -->
                                    <?php
                                        $expenses = $this->db->where(" account_type_id = 3 AND subaccount_type_code <> 'SA001' ")->get('vw_accounts')->result();
                                        foreach($expenses as $exp) {
                                            ?>
                                                <tr>
                                                    <td><?=ucwords($exp->account_name)?></td>
                                                    <td><?=''?></td>
                                                    <td><?=''?></td>
                                                </tr>
                                            <?php
                                        }
                                    ?>

                                    <!-- assets second -->
                                    <?php
                                        $assets = $this->db->where(" account_type_id = 1 ")->get('vw_accounts')->result();
                                        foreach($assets as $ass) {
                                            ?>
                                                <tr>
                                                    <td><?=ucwords($ass->account_name)?></td>
                                                    <td><?=''?></td>
                                                    <td><?=''?></td>
                                                </tr>
                                            <?php
                                        }
                                    ?>

                                    <!-- liabilities third -->
                                    <!-- revenue forth -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                    <table class="table table-striped table-condensed table-responsive table-hover table-bordered">
                        <tbody id="table-data"></tbody>
                    </table> 
                </div>
            </div>
        </div>

        <br />
        <br />
        <br />

    </div>
</div>

<script>
    function get_data () {
        var sheet_date = $('#sheet_date').val();

        $('#table-data').html('');

        $.ajax({
            url: '<?php echo site_url('accounting/get_balance_sheet'); ?>',
            type: 'POST',
            cache: false,
            data: {
                    sheet_date : sheet_date
                },
            success: function(html){
                console.log(html);
                $('#table-data').html(html);
            }
        });
    }
</script>
