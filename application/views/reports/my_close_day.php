<?php
    $ycd = null;
    foreach($yesterday_close_day as $yesterday_cd) {
        $ycd += $yesterday_cd->net_amount;
    }
?>
<style>
    .btn-apk{
        color: #fff !important;
        font-weight: bold !important;
        font-size: 15px !important;
    }
    .btn-rig {
        font-size: 30px;
        font-weight: bold;
    }
</style>

<!-- <div class="row">
    <div class="col-md-2"></div>

    <div class="col-md-8">
        <form class="form" method="post" action="" role="form">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <label for="from">From:</label>
                </div>
                <div class="col-md-10 col-sm-6 col-xs-12">
                    <input type="date" class="form-control" name="from_date" id="from_date" required />
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <label for="to">To:</label>
                </div>
                <div class="col-md-10 col-sm-6 col-xs-12">
                    <input type="date" class="form-control" name="to_date" id="to_date" />
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <button type="submit" class="btn btn-primary" name="filter" >Filter <span class="fa fa-filter"></span></button>
            </div>
        </form>
    </div>

    <div class="col-md-2"></div>
</div> -->

<div class="row" style="padding-top: 20px;">

    <div class="col-md-8 col-sm-6 col-xs-12">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sales trend in last 20 days</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <canvas id="canvas_bar"></canvas>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sales summary</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div style="width: 100%;" class="table-responsive">
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item Brand</th>
                                                <th>Qty</td>                                                
                                                <th>Net Amount</th>
                                                <th>Total Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $x = 0;
                                                $total_sold = 0;
                                                $total_balances = 0;
                                                foreach($my_close_day AS $mcd) {
                                                    if($mcd->number_sold == 0) continue;
                                                    $x++;
                                                    $total_sold += $mcd->net_amount;
                                                    $total_balances += $mcd->paying_balance;
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $x;?></td>
                                                            <td><?php echo $mcd->brand_name;?></td>
                                                            <td><?php echo $mcd->number_sold;?></td>
                                                            <td><?php echo $mcd->net_amount;?></td>
                                                            <td><?php echo $mcd->paying_balance;?></td>
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

        </div>

        
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
            
                <div class="row">
                    <div class="col-md-12 col-xs-12" style="text-align: center;">
                        <h3>Today</h3>
                        <button class="btn btn-lg btn-success btn-rig"><?php echo number_format($total_sold, 2);?></button>
                        <br>
                        <h3>Yesterday</h3>
                        <button class="btn btn-lg btn-primary btn-rig"><?php echo number_format($ycd, 2);?></button>
                        <br>
                        <h3>Credits</h3>
                        <button class="btn btn-lg btn-warning btn-rig"><?php echo number_format($total_balances, 2);?></button>
                    </div>
                </div>
            
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Items Sold</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div style="width: 100%;" class="table-responsive">
                            <table class="table table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <td>Item name</td>
                                        <td>Brand</td>
                                        <td>Code</td>                                                 
                                        <td>Customer</td>                                                
                                        <td>Amount</td>
                                        <td>Balance</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_b = 0;
                                    $total_amount = 0;
                                        foreach($my_close_day_detailed as $mcdd) {
                                            $total_b += $mcdd->paying_balance;
                                            $total_amount += $mcdd->net_amount;
                                            ?>
                                                <tr>
                                                    <td><?php echo $mcdd->item_name;?></td>
                                                    <td><?php echo $mcdd->brand_name;?></td>
                                                    <td><?php echo $mcdd->imei_one;?></td>
                                                    <td><?php echo $mcdd->customer_name;?></td>
                                                    <td><b><?php echo number_format($mcdd->net_amount, 2);?></b></td>
                                                    <td><b><?php echo number_format($mcdd->paying_balance, 2);?></b></td>
                                                </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4"><b>TOTAL</b></th>
                                        <th> <u><?php echo number_format($total_amount, 2);?></u> </th>
                                        <th> <u><?php echo number_format($total_b, 2);?></u> </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>

</div>



<br />


<?php
    $query = $this->db->query("SELECT SUM(net_amount) AS net_amount, date_time FROM vw_my_close_day GROUP BY date_time DESC LIMIT 20")->result();
    $arr_length = count($query);
        $jsonHeader = null;
        $jsonData = null;
        $x = 0;
        $arrayDate = array();
        
        foreach( $query as $thisdt) {
            $arrayDate[$thisdt->date_time] = $thisdt->net_amount;
        } 


        //get last 20 calendar days
        $now = new DateTime( "20 days ago", new DateTimeZone('Africa/Nairobi'));
        $interval = new DateInterval( 'P1D'); // 1 Day interval
        $period = new DatePeriod( $now, $interval, 20); // 20 Days

        $sale_data = array();
        $dates = array();
        foreach( $period as $day ) {
            $key = $day->format( 'Y-m-d');
            array_push($dates, $key); // Add this data to 
            if( array_key_exists($key, $arrayDate) ) {  //check if date exists in the data from db
                array_push($sale_data, $arrayDate[$key]); //if yes, then push the data
            } else {
                array_push($sale_data, '0');
            }
        }
 
        //replace " with ' as the graph only accepts single quotes
        $jsonHeader = str_replace("\"","'", json_encode($dates));
        $jsonData =  str_replace("\"","'", json_encode($sale_data));
        
?>


<script type="text/javascript">
    $(document).ready(function() {
        var barChartData = {
            //labels: ['2020-09-09','2020-09-08','2020-08-22','2020-08-17','2020-08-15','2020-08-11'],
            labels: <?php echo $jsonHeader;?>,
            datasets: [
                {
                    fillColor: "#26B99A", //rgba(220,220,220,0.5)
                    strokeColor: "#26B99A", //rgba(220,220,220,0.8)
                    highlightFill: "#36CAAB", //rgba(220,220,220,0.75)
                    highlightStroke: "#36CAAB", //rgba(220,220,220,1)
                    //data: ['0','55680','27840','139200','113360','20000']
                    data: <?php echo $jsonData;?>
                }
            ],
            options: {
                responsive: true,
                scales: {
                    xAxes: [ {
                    type: 'time',
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Date'
                    },
                    ticks: {
                        major: {
                        fontStyle: 'bold',
                        fontColor: '#FF0000'
                        }
                    }
                    } ],
                    yAxes: [ {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                    } ]
                }
            }
        }
        new Chart($("#canvas_bar").get(0).getContext("2d")).Bar(barChartData, {
            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
            responsive: true,
            barDatasetSpacing: 6,
            barValueSpacing: 5
        });
    });
    
    var json_header;
    var json_data;

    // $(document).ready(function() {
    //     $.ajax({
    //         url: '<?php echo site_url();?>reports/last_days', //this is the submi
    //         success: function(data){
    //             //console.log("Response: " + data);
    //             var obj = JSON.parse(data); 

    //             json_header = obj.jsonheader;
    //             json_data = obj.jsondata;

    //             console.log(json_header);
    //             console.log(json_data);

    //             var barChartData = {
    //                 labels: ['2020-09-09','2020-09-08','2020-08-22','2020-08-17','2020-08-15','2020-08-11'],
    //                 //labels: json_header,
    //                 datasets: [
    //                     {
    //                         fillColor: "#26B99A", //rgba(220,220,220,0.5)
    //                         strokeColor: "#26B99A", //rgba(220,220,220,0.8)
    //                         highlightFill: "#36CAAB", //rgba(220,220,220,0.75)
    //                         highlightStroke: "#36CAAB", //rgba(220,220,220,1)
    //                         data: ['0','55680','27840','139200','113360','20000']
    //                         //data: json_data
    //                 }
    //             ],
    //             }
    //             new Chart($("#canvas_bar").get(0).getContext("2d")).Bar(barChartData, {
    //                 tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    //                 responsive: true,
    //                 barDatasetSpacing: 6,
    //                 barValueSpacing: 5
    //             });

    //         }
    //     });
    // });


</script>








