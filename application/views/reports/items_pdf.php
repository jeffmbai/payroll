<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$page?> | JiPos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
            font-size: 9px;
            font-weight: 400;
            line-height: 1.4;
        }
        table {
        border-collapse: collapse;
        width: 100%;
        }

        .td-h {
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        }
    </style>
  
</head>
<body style="background-color: #fff; top: 0; margin-top: 0px">

<div class="container-fluid" style="margin-bottom: 20px; margin-left: 20px; margin-right: 20px; margin-top: 3px">

    <?php
        $total_cr = $total_dr = 0;
        // $difference = $account->opening_balance;
        $difference = 0;

        $org = $this->db->where('org_id',$_SESSION['orgid'])->get('orgs')->row();
    ?>

    <div class="row">
        
        <p>
            <!-- <img img src="assets/school_logo.jpg" style="float:left; width:100px; height:100px;" /> -->
            <center>
                <h3><?=$org->org_name?></h3>
                <h4><?=$org->address?></h4>
                <h4><?=$page?></h4>
                <span style="color: #047774;"><?php echo date("d-M-Y")?></span>
            </center>
        </p>

        <div style="width: 100%;">
            
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="table" style="margin-top: 20px;">
                        <table>
                            <thead>
                                <tr class="tr-h">
                                    <th class="td-h">Name</th>
                                    <th class="td-h">Category</th>
                                    <th class="td-h">QTY</th>
                                    <th class="td-h">Comment</th>
                                </tr>
                            </thead>
                            <tbody id="table-data">
                                <?php
                                    foreach($all_items as $td) {
                                        ?>
                                            <tr>
                                                <td><?=strtoupper($td->item_name)?></td>
                                                <td><?=$td->cat_name?></td>
                                                <td><?=$td->availability?></td>
                                                <td><input type="checkbox" style="height: 15px;" /></td>
                                            </tr>
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



</div>

<pagebreak />

</body>
</html> 