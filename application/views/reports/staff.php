<!DOCTYPE html>
<html lang="en">
<head>
    <title>Staff List | JiPos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <style>
        body {
            font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
            font-size: 13px;
            font-weight: 400;
            line-height: 1.471;
        }
    </style>
    <style>
        body {
            font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
            font-size: 13px;
            font-weight: 400;
            line-height: 1.471;
        }
        table {
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }
        th, td {
            border: 1px solid !important;
            text-align: left;
        }
    </style>
  
</head>
<body style="background-color: #fff;">

<?php
    $org = $this->db->where('org_id',$_SESSION['orgid'])->get('orgs')->row();
?>

<div class="container-fluid">
    <div class="row">
        <!-- <span style="float: left;">
            <img src="./assets/school_logo.jpg" width="100px"   />   
        </span> -->
        <center>
            <h3><?=$org->org_name?></h3>
            <h4><?=$org->address?></h4>
            <span style="color: #047774;">As at <?php echo date("d-M-Y")?></span>
            <h4><u>STAFF/EMPLOYEE REPORT</u></h4>
        </center>
    </div>
  <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-condensed table-striped">
            <thead>
                <tr class="headings">
                    <th>Name</th>
                    <th>Desig.</th>
                    <th>ID No. </th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Active</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $c = 0;
                foreach($staff as $dt) {
                    $c++;
                    ?>
                        <tr class="even pointer">
                            <td class=" "><?php echo $dt->first_name.' '.$dt->second_name.' '.$dt->last_name;?></td>
                            <td class=" "><?php echo $dt->designation_name;?></td>
                            <td class=" "><?php echo $dt->id_number;?></td>
                            <td class=" "><?php echo $dt->primary_phone;?></td>
                            <td class=" "><?php echo $dt->email;?></td>
                            <td class=" "><?php echo $dt->gender;?></td>
                            <td class=" "><?php echo $dt->address;?></td>
                            <td class=" ">
                                <?php if($dt->active == 1) echo "<span class='fa fa-check'></span>"; else echo "<span class='fa fa-check'></span>";?>
                            </td>
                        </tr>

                    <?php
                }
                ?>
            </tbody>
        </table>
      </div>
  </div>

  <br />



</div>

</body>
</html> 