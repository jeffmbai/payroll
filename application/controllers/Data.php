<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Inserts');
        $this->load->model('Departments_Model');
        $this->load->model('Business_Model');
        $this->load->model('Organization');
        $this->load->model('Stations_Model');
        $this->load->model('Majorselects');
        $this->load->model('Stocks_Model', 'stocks');
        $this->load->model('Business_Model', 'business');
        $this->load->model('Deletes');
    }


    public function store_orders()
    {
        #get orders per store, based on storeID
        $data['orders'] = $this->Majorselects->orders($_POST['data']);
        foreach ($data['orders'] as $order) {
?>
            <tr class="even pointer">
                <td class="a-center ">
                    <input type="checkbox" class="tableflat">
                </td>
                <td class=" "><?php echo $order->bill_no; ?></td>
                <td class=" "><?php echo $order->customer_name; ?></td>
                <td class=" "><?php echo $order->date_time; ?></td>
                <td class=" "><?php echo $order->tax_charge; ?></td>
                <td class=" "><?php echo $order->net_amount; ?></td>
                <td class="a-right a-right ">
                    <?php
                    if ($order->paid_status == 1) echo "Paid";
                    elseif ($order->paid_status == 0) echo "Pending";
                    elseif ($order->paid_status == 2) echo "Cancelled";
                    ?>
                </td>
                <td class=" last">
                    <a href="<?php echo site_url('sys/order_profile/' . $order->order_id); ?>"><span class="fa fa-eye"></span></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="<?php echo site_url('delete/order/' . $order->order_id); ?>" class="text text-danger"><span class="fa fa-trash"></span></a>
                </td>
            </tr>
        <?php
        }
    }


    public function store_stock()
    {
        #get stockes per store, based on storeID
        $data['stock'] = $this->Majorselects->stock_items($_POST['data']);
        foreach ($data['stock'] as $item) {
            $last = 0;
            $last = $this->db->query("SELECT item_quantity from stock_lines where item_id = $item->item_id ORDER BY stock_line_id DESC LIMIT 1 ")->row("item_quantity");
        ?>
            <tr class="even pointer">
                <td><?php echo $item->item_name . ' ' . $item->barcode; ?></td>
                <td><?php echo $item->brand_name . ' ' . $item->unit_name; ?></td>
                <td><?php echo $item->available_qty; ?></td>
                <td><?php echo $last; ?></td>
                <td class="a-right a-right ">
                    <?php
                    if ($item->active == 1) echo "True";
                    else echo "False";
                    ?>
                </td>
            </tr>
        <?php
        }
    }


    public function org_items()
    {
        $org_items = $this->stocks->store_items($_POST['data']);
        echo "<option> Select Item  </option>";
        foreach ($org_items as $item) {
        ?>
            <option value="<?php echo $item->item_id; ?>"> <?php echo $item->item_name . ' - ' . $item->barcode; ?> </option>
        <?php
        }
    }

    public function store_items()
    {
        $store_items = $this->stocks->store_items($_POST['data']);
        echo "<option> Select Item  </option>";
        foreach ($store_items as $item) {
        ?>
            <option value="<?php echo $item->item_store_id; ?>"> <?php echo $item->item_name . ' - ' . $item->barcode; ?> </option>
        <?php
        }
    }

    public function this_item()
    {
        $itemid = $_POST['data'];
        $storeid = $_POST['orgid'];

        $data = $this->stocks->this_item($itemid, $storeid);
        echo $data->available_qty;
        //echo $data;
    }

    public function item_sales_rpt()
    {
        /** get the sales report based on
         * Store/ Org
         * From date
         * To date
         * Paid status
         **/
        $orgid = $_POST['store'];
        $from = $_POST['from'];
        $to = $_POST['to'];
        $paid = 1;

        $data['report'] = $this->business->sales($orgid, $from, $to);
        foreach ($data['report'] as $r) {
            if ($r->paid_status == 1) $paid = 'Paid';
            elseif ($r->paid_status == 0) $paid = 'Pending';
            elseif ($r->paid_status == 2) $paid = 'Cancelled';

            $discount = $tt_net_amount = $tt_paid_amount = $tt_paying_balance = $tt_discount = 0;

            if ($r->discount != null || $r->discount != '') $discount = $r->discount;

            $tt_net_amount += $r->net_amount;
            $tt_paid_amount += $r->total_paid;
            $tt_paying_balance += $r->paying_balance;
            $tt_discount += $discount;

        ?>
            <tr>
                <td><?= $r->bill_no ?></td>
                <td><?= $r->customer_supplier_name ?></td>
                <td><?= $r->eating_table_name ?></td>
                <td><?= $r->date_time ?></td>
                <td><?= $r->transaction_type_name ?></td>
                <td><?= number_format((float)$r->net_amount, 2) ?></td>
                <td><?= number_format((float)$r->total_paid, 2) ?></td>
                <td><?= number_format((float)$r->paying_balance, 2) ?></td>
                <td><?= number_format((float)$discount, 2) ?></td>
                <td><?= $paid ?></td>
            </tr>
        <?php
        }

        ?>
        <tr>
            <th colspan="5">TOTALS</th>
            <th><?= number_format((float)$tt_net_amount, 2) ?></th>
            <th><?= number_format((float)$tt_paid_amount, 2) ?></th>
            <th><?= number_format((float)$tt_paying_balance, 2) ?></th>
            <th><?= number_format((float)$tt_discount, 2) ?></th>
            <td></td>
        </tr>
        <?php
    }

    public function staff_sales_rpt()
    {
        /** get the sales report based on
         * Staff
         * From date
         * To date
         * Paid status
         **/
        $staffid = (isset($_POST['staffid']) && $_POST['staffid'] != null) ? $_POST['staffid'] : null;
        $from = date('Y-m-d', strtotime($_POST['from']));
        $to = date('Y-m-d', strtotime($_POST['to']));
        $paid = 1;

        $data['report'] = $this->Majorselects->staff_sales_rpt($staffid, $from, $to, $paid);
        // echo $data['report'];
        // exit();
        echo '<thead>
                <tr class="headings">
                    <th>Name</th>
                    <th>Period</th>
                    <th>Tax Charge </th>
                    <th>Discount </th>
                    <th class="text-primary">Net Amount </th>
                    <th class="text-danger">Balances </th>
                </tr>
            </thead>
            <body>';
        foreach ($data['report'] as $rpt) {
        ?>
            <tr>
                <td> <a href="<?= site_url('reports/agent_orders/' . $rpt->entity_id) ?>"> <?= $rpt->firstname . ' ' . $rpt->secondname . ' ' . $rpt->lastname; ?> </a> </td>
                <td> <?= $from . ' to ' . $to; ?> </td>
                <td> <?= number_format($rpt->tax_charge, 2) ?> </td>
                <td> <?= number_format($rpt->discount, 2); ?> </td>
                <td class="text-primary"> <?= number_format($rpt->net_amount, 2); ?> </td>
                <td class="text-danger"> <?= number_format($rpt->paying_balance, 2); ?> </td>
            </tr>
<?php
        }
        echo '</body>';
    }

    public function brand_models()
    {
        $query = $this->db->query("SELECT * FROM brand_models WHERE brand_id = " . $_POST['data'] . " ");
        echo '<option value=""> Select model </option>';
        foreach ($query->result() as $dt) {
            echo '<option value="' . $dt->brand_model_id . '">  ' . $dt->model_name . '  </option>';
        }
    }

    function get_accounts()
    {
        $id = $_POST['subacctype'];
        $data = $this->db->where('subaccount_type_id', $id)->get('accounts')->result();
        echo '<option> ~Select account~ </option>';
        foreach ($data as $dt) {
            echo '<option value="' . $dt->account_id . '" > ' . $dt->account_name . ' ~ ' . $dt->account_code . ' </option>';
        }
    }

    public function brand_model_names()
    {
        $model_id           = $_POST['model_id'];
        $package_type_id    = $_POST['package_type_id'];
        $brand_name         = null;
        $model_name         = null;
        $package_type_name  = null;
        $query1 = $this->db->query("SELECT brand_models.brand_model_id, brand_models.org_id, brand_models.brand_id, brand_models.model_name,
                                    brand_models.reorder_level, brand_models.narrative,
                                    brands.brand_name
                                    FROM brand_models 
                                    JOIN brands ON brands.brand_id = brand_models.brand_id WHERE brand_models.brand_model_id = " . $model_id . " ");
        foreach ($query1->result() as $dt1) {
            $brand_name = $dt1->brand_name;
            $model_name = $dt1->model_name;
        }
        $query2 = $this->db->query("SELECT package_type_name FROM package_types WHERE package_type_id = " . $package_type_id . " ");
        foreach ($query2->result() as $dt2) {
            $package_type_name = $dt2->package_type_name;
        }

        #response
        echo '{ "brand_name" : "' . $brand_name . '", "model_name" : "' . $model_name . '", "package_type_name" : "' . $package_type_name . '" }';
    }

    public function search_item()
    {
        #search item
        $x = 0;

        if ($_POST['data'] != '' || $_POST['data'] != null) {
            $data = $this->Business_Model->search_item($_POST['data']);
            #var_dump($data);
            #echo $data; exit();
            echo '<div style="overflow-y: scroll; height: 150px;">';
            echo '<ul class="to_do">';
            foreach ($data as $dt) {
                echo '<li style="background-color: 1ABB9C; color: #000;" onclick="select_item(' . $dt->item_id . ')"><p>
                        ' . $dt->brand_name . ' | ' . $dt->barcode . ' | ' . $dt->model_name . ' | ' . $dt->model_year . ' | ' . $dt->capacity . ' | ' . $dt->color . ' | ' . number_format($dt->marked_price, 2) . '
                        <button class="btn btn-info btn-xs pull-right"><span class="fa fa-check"></span></button>
                        </p></li>';
                $x++;
            }
            echo '</ul>';
            echo '</div>';
        }

        if ($x == 0) echo "No results...";
    }

    public function specific_item()
    {
        #search item details via item_id
        $itemID = $_POST['data'];
        $data = $this->Majorselects->this_item($itemID);

        $item_id = null;
        $brand_name = null;
        $item_name = null;
        $tax_rate = null;
        $model_name = null;
        $color_name = null;
        $capacity = null;
        $model_year = null;
        $barcode = null;
        $color = null;
        $marked_price = null;
        $selling_price = null;
        $buying_price = null;
        $x = 0;
        foreach ($data as $dt) {
            $x = 1;
            $item_id = $dt->item_id;
            $item_name = $dt->item_name;
            $color_name = $dt->color_name;
            $brand_name = $dt->brand_name;
            $item_name = $dt->item_name;
            $tax_rate = $dt->tax_rate;
            $model_name = $dt->model_name;
            $barcode = $dt->barcode;
            $capacity = $dt->capacity;
            $model_year = $dt->model_year;
            $marked_price = $dt->marked_price;
            $buying_price = $dt->buying_price;
        }
        $resp = '{ "data_control":"' . $x . '","item_id":"' . $item_id . '","item_name":"' . $item_name . '","barcode":"' . $barcode . '","color_name":"' . $color_name . '","brand_name":"' . $brand_name . '","tax_rate":"' . $tax_rate . '","model_name":"' . $model_name . '","capacity":"' . $capacity . '","model_year":"' . $model_year . '","marked_price":"' . $marked_price . '","selling_price":"' . $selling_price . '","buying_price":"' . $buying_price . '" }';
        echo $resp;
    }

    public function search_barcode()
    {
        #search item details via barcode
        $data = $this->Business_Model->search_barcode($_POST['data']);
        #var_dump($data);
        $item_id = null;
        $brand_name = null;
        $item_name = null;
        $tax_rate = null;
        $model_name = null;
        $color_name = null;
        $capacity = null;
        $model_year = null;
        $color = null;
        $marked_price = null;
        $selling_price = null;
        $buying_price = null;
        $x = 0;
        foreach ($data as $dt) {
            $x = 1;
            $item_id = $dt->item_id;
            $brand_name = $dt->brand_name;
            $color_name = $dt->color_name;
            $tax_rate = $dt->tax_rate;
            $model_name = $dt->model_name;
            $capacity = $dt->capacity;
            $model_year = $dt->model_year;
            $marked_price = $dt->marked_price;
            $buying_price = $dt->buying_price;
        }
        $resp = '{ "data_control":"' . $x . '","item_id":"' . $item_id . '","item_name":"' . $item_name . '","color_name":"' . $color_name . '","brand_name":"' . $brand_name . '","tax_rate":"' . $tax_rate . '","model_name":"' . $model_name . '","capacity":"' . $capacity . '","model_year":"' . $model_year . '","marked_price":"' . $marked_price . '","selling_price":"' . $selling_price . '","buying_price":"' . $buying_price . '" }';
        echo $resp;
    }

    //perform search
    public function get_stock()
    {
        $stockText = $_POST['stxt'];
        $stockType = $_POST['stype'];
        $stockPurpose = $_POST['spurpose'];
        $html = null;

        if ($stockType == 1) { //idle for now
            //this is general stock
            $query1 = ("SELECT a.*, a.selling_price,
                        b.color_name,
                        c.brand_name,
                        d.unit_name,
                        FROM items as a
                        LEFT JOIN colors as b ON a.color_id = b.color_id 
                        LEFT JOIN brands AS c ON a.brand_id = c.brand_id 
                        LEFT JOIN units AS d ON a.unit_id = d.brand_id 
                        WHERE CONCAT(a.item_name,' ',a.barcode,' ',a.selling_price,' ',b.color_name,' ',c.brand_name,' ',d.unit_name) LIKE '%" . $stockText . "%' ");
            //echo $query1;
            $qr1 = $this->db->query($query1);

            $html .= '
                        <thead>
                            <tr>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Available Qty</th>
                                <th>Narrative</th>
                            </tr>
                        </thead>
                        <tbody>
                    ';

            foreach ($qr1->result() as $dt1) {
                $html .= '
                            <tr>
                                <td>' . $dt1->brand_name . '</td>
                                <td>' . $dt1->model_name . '</td>
                                <td>' . $dt1->available_qty . '</td>
                                <td>' . $dt1->narrative . '</td>
                            </tr>
                        ';
            }

            $html .= '</tbody>';
        } elseif ($stockType == 2) {
            //this is specific stock item
            $searchResult = $this->Business_Model->search_item($stockText, $stockPurpose);
            #var_dump($searchResult); exit();
            #echo $searchResult; exit();

            foreach ($searchResult as $dt2) {
                $disabled = null;
                if ($dt2->available_qty < 1) $disabled = 'disabled';
                $html .= '
                            <div class="col-md-3 col-sm-4 col-xs-6" style="border: 1px solid #007f7629; padding: 10px;">
                                <div class="thumbnail" style="height: 180px !important;">
                                    <button class="wrapper" onclick="add_row(' . $dt2->item_id . ')" ' . $disabled . ' style="background: none; border: none;">
                                        <span class="badge bg-info" titlw="Balance Qty">' . $dt2->available_qty . '</span>
                                        <div class="image view view-first" style="height: 90px !important;">
                                            <img style="height: 100%; display: block;" src="' . base_url('assets/images/items/' . $dt2->image) . '" alt="image" />
                                        </div>
                                        <div class="caption" style="background-color: transparent !important;">
                                            <small>' . $dt2->item_name . '</small>
                                            <br/>
                                            <small><b>' . number_format($dt2->marked_price) . '</b></small>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        ';
            }
        }

        echo $html;
    }

    public function get_category_items()
    {
        $catid = $_POST['id'];
        $html = null;

        //this is specific stock item
        $searchResult = $this->Business_Model->search_category_items($catid);

        if(count($searchResult) == 0) {
            $html .= '
                <div class="col-md-12 col-12">
                    <div class="text text-danger">
                    <i class="fa fa-warning"></i> No Data Available Under this Category
                    </div>
                </div>
            ';
        }

        foreach ($searchResult as $dt2) {
            $disabled = null;
            if ($dt2->available_qty < 1) $disabled = 'disabled';
            $html .= '
                        <div class="col-md-3 col-sm-4 col-xs-6" style="border: 1px solid #007f7629; padding: 10px;">
                            <div class="thumbnail" style="height: 180px !important;">
                                <button class="wrapper" onclick="add_row(' . $dt2->item_id . ')" ' . $disabled . ' style="background: none; border: none;">
                                    <span class="badge bg-info" titlw="Balance Qty">' . $dt2->available_qty . '</span>
                                    <div class="image view view-first" style="height: 90px !important;">
                                        <img style="height: 100%; display: block;" src="' . base_url('assets/images/items/' . $dt2->image) . '" alt="image" />
                                    </div>
                                    <div class="caption" style="background-color: transparent !important;">
                                        <small>' . $dt2->item_name . '</small>
                                        <br/>
                                        <small><b>' . number_format($dt2->marked_price) . '</b></small>
                                    </div>
                                </button>
                            </div>
                        </div>
                    ';
        }

        echo $html;
    }

    //perform available room search
    public function get_room()
    {
        $html = null;
        //this is general stock
        $query1 = ("SELECT rooms.*, room_types.room_type_name, orgs.org_name
                        FROM rooms 
                        JOIN room_types ON room_types.room_type_id = rooms.room_type_id
                        JOIN orgs ON orgs.org_id = rooms.org_id
                        #WHERE rooms.active = 1
                        ");
        //echo $query1;
        $qr1 = $this->db->query($query1);

        $html .= '<div class="table-responsive">
                        <table id="example" class="table table-striped table-condensed responsive-utilities jambo_table">
                            <thead>
                                <tr>
                                    <th>Room</th>
                                    <th>Rate</th>
                                    <th>Type</th>
                                    <th>Narrative</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                    ';

        foreach ($qr1->result() as $dt1) {
            if ($dt1->active == 1) {
                $html .= '
                            <tr>
                                <td>' . $dt1->room_name . '</td>
                                <td>' . $dt1->room_rate . '</td>
                                <td>' . $dt1->room_type_name . '</td>
                                <td>' . $dt1->narrative . '</td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-default" onclick="add_row(' . $dt1->room_id . ')" ><span class="fa fa-check"></span></button>
                                </td>
                            </tr>
                        ';
            } else {
                $html .= '
                            <tr>
                                <td>' . $dt1->room_name . '</td>
                                <td>' . $dt1->room_rate . '</td>
                                <td>' . $dt1->room_type_name . '</td>
                                <td>' . $dt1->narrative . '</td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-warning" disabled ><span class="fa fa-check"></span></button>
                                </td>
                            </tr>
                        ';
            }
        }

        $html .= '          </tbody>
                            </table>
                        </div>';


        echo $html;
    }

    public function get_stations () {
        $id = $_POST['data'];
        $stations = $this->db->where('station_id', $id)->get('stations')->result();
        foreach($stations as $dt) {
            echo '<option value="'.$dt->station_id.'"> '.$dt->station_name.' </option>';
        } 
    }

    public function check_availability()
    {
        $itemid = $_POST['itemid'];
        $itemqty = $_POST['itemqty'];

        $bal = $this->db->query("SELECT available_qty from items where item_id = $itemid ")->row();
        if ($bal->available_qty < $itemqty) echo 0;
        else echo 1;
    }

    public function specific_room()
    {
        #search room details via room_id
        $roomID = $_POST['data'];
        $query1 = ("SELECT rooms.*, room_types.room_type_name, orgs.org_name
                        FROM rooms 
                        JOIN room_types ON room_types.room_type_id = rooms.room_type_id
                        JOIN orgs ON orgs.org_id = rooms.org_id
                        WHERE rooms.room_id = '$roomID' ");
        //echo $query1;
        $qr1 = $this->db->query($query1);

        $room_id = null;
        $room_name = null;
        $room_rate = null;
        $narrative = null;
        $room_type_name = null;
        $x = 0;
        foreach ($qr1->result() as $dt) {
            $x = 1;
            $room_id = $dt->room_id;
            $room_name = $dt->room_name;
            $room_type_name = $dt->room_type_name;
            $room_rate = $dt->room_rate;
            $narrative = $dt->narrative;
        }
        $resp = '{ "data_control":"' . $x . '","room_id":"' . $room_id . '","room_name":"' . $room_name . '","room_type_name":"' . $room_type_name . '","room_rate":"' . $room_rate . '","narrative":"' . $narrative . '" }';
        echo $resp;
    }

    public function set_org()
    {
        if (isset($_POST['id'])) {
            $data = $this->db->where('org_id', $_POST['id'])->get('orgs')->num_rows();

            if ($data > 0) $_SESSION['shop_id'] = $_POST['id'];
            else {
                unset($_SESSION['shop_id']);
                echo 'Failed! No data found';
            }
        } else {
            unset($_SESSION['shop_id']);
            echo 'Failed! Bad request';
        }
    }

    public function get_profit()
    {
        //get profit between different dates
        $fromDate = $_POST['fromDate'];
        $toDate = $_POST['toDate'];
        $profit = 0;
        $get_profit = $this->db->query("SELECT
                    SUM(amount -(a.buying_price * a.qty)) AS profit,
                    b.date_time, b.paid_amount, b.paying_balance
                    FROM
                        order_items as a
                    JOIN 
                        orders as b ON b.order_id = a.order_id
                    WHERE
                        a.transaction_type_id IN(1, 3) AND b.date_time BETWEEN '$fromDate' AND '$toDate' ")->result();
        foreach ($get_profit as $p) $profit = $p->profit;
        $resp = array("resp" => 1, "message" => "success", "profit" => number_format($profit, 2));
        echo json_encode($resp);
    }










    //UPDATE items SET available_qty = (SELECT item_quantity FROM stock_lines WHERE stock_lines.item_id = items.item_id);

    public function stock_reconciliation()
    {
        $storeid = $_POST['store_id'];
        $stockid = $_POST['stock_id'];
        $qry1 = $this->db->query("SELECT * FROM stock_lines WHERE stock_id = '$stockid' ")->result();
        foreach ($qry1 as $q1) {
            //update items_store and stock_lines tables
            $this->db->query("UPDATE stock_lines SET system_quantity = $q1->item_quantity WHERE stock_line_id = $q1->stock_line_id ");
        }

        $qry2 = $this->db->query("SELECT * FROM stock_lines WHERE stock_id = '$stockid' ")->result();
        foreach ($qry2 as $q2) {
            //update items_store and stock_lines tables
            $this->db->query("UPDATE items_store SET available_qty = $q2->item_quantity WHERE item_id = $q2->item_id AND store_id = $q2->org_id ");
        }

        $this->db->query("UPDATE items SET available_qty = 0 WHERE available_qty < 1");
        $this->db->query("UPDATE items_store SET available_qty = 0 WHERE available_qty < 1 AND store_id = '$storeid' ");

        $this->session->set_flashdata('alert', '<div class="alert alert-success">Reconciliation Completed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');

        echo '{ "resp" : "1", "message" : "Success" }';
    }


    // Returns Start
    public function get_orders() {
        $id =$_POST['id'];
        $arr = '(0)';
        if($id == 1) $arr = '(2, 4)';
        elseif($id == 2) $arr = '(1, 3)';

        $query = $this->db->select('order_id, bill_no, date_time')
                        ->from('orders')
                        ->where("transaction_type_id in $arr ")
                        ->order_by("date_time desc")
                        ->get()->result();
        echo '<option value=""> Search and select order </option>';
        foreach($query as $dt) {
            ?>
                <option value="<?=$dt->order_id?>" > <?=$dt->bill_no . ' ['.date('d-m-Y', strtotime($dt->date_time)).']'?> </option>
            <?php
        }
    }
    
    public function get_order_items() {
        $id =$_POST['id'];
        $query = $this->db->select('a.*, b.item_name, b.barcode')
                        ->from('order_items as a')
                        ->join('items as b', 'a.item_id = b.item_id')
                        ->where("order_id ", $id)
                        ->get()->result();
        echo '<option value=""> Search and select order item </option>';
        foreach($query as $dt) {
            ?>
                <option value="<?=$dt->order_item_id?>" > <?=$dt->barcode . ' ['.$dt->item_name.' / Qty: '.$dt->qty.']'?> </option>
            <?php
        }
    }
    // Returns End


















}



?>