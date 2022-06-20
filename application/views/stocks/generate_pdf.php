<!DOCTYPE html>
<html lang="en">

<?php
// foreach ($stock_details as $stk) {
//   $stock_id = $stk->stock_id;
//   $org_id = $stk->org_id;
//   $org_name = $stk->org_name;
//   $stock_name = $stk->stock_name;
//   $stock_date = $stk->stock_date;
//   $active = $stk->active;
//   $narrative = $stk->narrative;
//   $date_modified = $stk->date_modified;
//   $time_stamp = $stk->time_stamp;
// }
?>

<head>
  <title> Stock Details PDF</title>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <style>
    body {
      font-size: 10px !important;
    }
    table, td, th {
      border: 1px solid black;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }
  </style>
</head>

<body>

    <div class="container-fluid" style="margin: 10px;">

        <div class="row" style="text-align: center;">
          <p>
            <h2><u>Stock List</h2>
            <!-- <h4><?=$org_name?></h4>
            <h4><?=$stock_name?></h4>
            <h4><?=$stock_date?></h4> -->
          </div>
        </p> 

        <div class="row" style="width: 100%;">
          <div style="margin: 1px !important;">
            <table class="">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>SKU</th>
                      <th>System Qty</th>
                      <th>Actual Qty</th>
                      <th>Deviation</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
    </div>

</body>
</html>