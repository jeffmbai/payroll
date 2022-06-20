<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kitchen extends MY_Controller {

    public $role;
    public $username;
    var $data;

    function __construct()
    {
        parent::__construct();

        if( !isset($_SESSION['userrole']) || !isset($_SESSION['username']) ){
            //session is not set. cancel back to login page
            redirect(site_url('pages/logout'));
        }
        else{
            #echo "Success";
            $this->role = $_SESSION['userrole'];
            $this->username = $this->session->userdata('username');
            
            $this->load->model('Majorselects');
            $this->load->model('Inserts');
            $this->load->model('Users_Model');
            // $this->load->model('Inventory_Model', 'inventory');
            $this->load->model('Kitchen_Model', 'kitchen');

            $this->load->model('Majorselects');
            $this->load->model('Business_Model','business');
            $this->load->model('Sms_Model','sms');
            $this->load->model('Debt_Model','debt');
            
            
            $this->data['active_user'] = $this->Majorselects->get_user();

            // $this->load->library('csvimport'); //old method to import
            $this->load->library('excel'); //new method to import
        }
    }

    public function recipe () {
        // $this->permission_check('property_view');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Recipe';

        // $this->data['properties'] = $this->property->all_properties();
        $this->data['all_items'] = $this->Majorselects->all_items();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('kitchen/recipe', $this->data);
        $this->load->view('inc/footer');
    }

    public function make_recipe () {
        $resp = array("resp"=>0, "message"=>"Action not allowed");

        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $recipe_code = substr(str_shuffle($permitted_chars), 0, 10);

        $recipe_name = $_POST['recipe_name'];
        $form_data = array();        
        $item = $_POST['item'];
        $measurement = $_POST['measurement'];
        $amount = $_POST['amount'];
        $total_price = 0;
        for($x=0; $x<count($item); $x++) {
            $form_data[] = array(
                "recipe_code" => $recipe_code,
                "item_id" => $item[$x],
                "measurement" => $measurement[$x],
                "amount" => $amount[$x],
            );
            $total_price += $amount[$x];
        }

        // insert into items 
        $items_data = array(
            "item_name"      => $recipe_name,
            "recipe_code"    => $recipe_code,
            "org_id"         => 1,
            "category_id"    => $this->input->post('category_id'),
            "unit_id"        => trim($this->input->post('unit_id')),
            "brand_id"       => trim($this->input->post('brand_id')),
            // "attribute_id"   => json_encode($this->input->post('attribute_id')),
            "tax_type_id"    => trim($this->input->post('tax_type_id')),
            "buying_price"   => $total_price,
            "selling_price"  => $total_price,
            "for_sale"       => 1,
            "image"          => 'default.png',
            "narrative"      => 'Recipe',
            "availability"   => trim($this->input->post('availability')),
            "active"         => 1
        );

        if($this->db->insert('items', $items_data)){
            $insertID = $this->db->insert_id();

            // do the barcode
            
            $barcode = 'PROD_' . str_pad($insertID, 4, '0', STR_PAD_LEFT);
            $this->db->update('items', array('barcode' => $barcode), array('item_id' => $insertID));

            // insert the recipe item
            if($this->db->insert_batch('item_recipe_items', $form_data)) {
                $resp = array("resp"=>1, "message"=>"Recipe successfully created");
                $this->session->set_flashdata('alert', '<div class="alert alert-success">Product successfully created. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            } else {
                // delete item
                $this->db->delete('items', array('item_id'=>$insertID));
                $resp = array("resp"=>0, "message"=>"Failed! Try again later");
            }
        } else {
            $resp = array("resp"=>0, "message"=>"Failed at first instance");
        }

        echo json_encode($resp);
    }

    public function update_recipe () {
        $resp = array("resp"=>0, "message"=>"Action not allowed");

        $recipe_code = $_POST['code'];

        $active = 0;
        if(isset($_POST['active'])) $active = 1;

        $recipe_name = $_POST['recipe_name'];
        $form_data = array();        
        $item = $_POST['item'];
        $measurement = $_POST['measurement'];
        $amount = $_POST['amount'];
        $total_price = 0;
        for($x=0; $x<count($item); $x++) {
            $form_data[] = array(
                "recipe_code" => $recipe_code,
                "item_id" => $item[$x],
                "measurement" => $measurement[$x],
                "amount" => $amount[$x],
            );
            $total_price += $amount[$x];
        }

        // insert into items 
        $items_data = array(
            "item_name"      => $recipe_name,
            "recipe_code"    => $recipe_code,
            "org_id"         => 1,
            "category_id"    => $this->input->post('category_id'),
            "unit_id"        => trim($this->input->post('unit_id')),
            "brand_id"       => trim($this->input->post('brand_id')),
            // "attribute_id"   => json_encode($this->input->post('attribute_id')),
            "tax_type_id"    => trim($this->input->post('tax_type_id')),
            "buying_price"   => $total_price,
            "selling_price"  => $total_price,
            "for_sale"       => 1,
            // "is_asset"       => 0,
            "image"          => 'default.png',
            "narrative"      => 'Recipe',
            "availability"   => trim($this->input->post('availability')),
            "active"         => $active
        );

        if($this->db->update('items', $items_data, array('recipe_code'=>$recipe_code))){
            
            // delete recipe items and insert new onces
            $this->db->delete('item_recipe_items', array('recipe_code'=>$recipe_code));
            // insert the recipe item
            if($this->db->insert_batch('item_recipe_items', $form_data)) {
                $resp = array("resp"=>1, "message"=>"Recipe successfully updated");
                $this->session->set_flashdata('alert', '<div class="alert alert-success">Recipe successfully created. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            } else {
                $resp = array("resp"=>0, "message"=>"Failed! Try again later");
            }
        } else {
            $resp = array("resp"=>0, "message"=>"Failed at first instance");
        }

        echo json_encode($resp);
    }

    public function get_recipe () {
        $code = $_POST['data'];

        $dat = $this->db->select("a.*, b.unit_name, c.cat_name, d.tax_type_name, e.brand_name")
                        ->from('items as a')
                        ->join('units as b', 'a.unit_id = b.unit_id', 'left')
                        ->join('categories as c', 'a.category_id = c.cat_id', 'left')
                        ->join('tax_types as d', 'a.tax_type_id = d.tax_type_id', 'left')
                        ->join('brands as e', 'a.brand_id = e.brand_id', 'left')
                        ->where('a.recipe_code', $code)
                        ->get()->row();

        $datas = $this->db->select("a.*, b.item_name, c.unit_name, d.cat_name, e.tax_type_name, f.brand_name")
                        ->from('item_recipe_items as a')
                        ->join('items as b','a.item_id = b.item_id')

                        ->join('units as c', 'b.unit_id = c.unit_id', 'left')
                        ->join('categories as d', 'b.category_id = d.cat_id', 'left')
                        ->join('tax_types as e', 'b.tax_type_id = e.tax_type_id', 'left')
                        ->join('brands as f', 'b.brand_id = f.brand_id', 'left')

                        ->where('a.recipe_code', $code)
                        ->get()->result();
        ?>
            <div class="row">
                <div class="col-md-3"><b>Item name:</b> <?=$dat->item_name?></div>
                <div class="col-md-3"><b>Unit:</b> <?=$dat->unit_name?></div>
                <div class="col-md-3"><b>Category:</b> <?=$dat->cat_name?></div>
                <div class="col-md-3"><b>Brand:</b> <?=$dat->brand_name?></div>
                <div class="col-md-3"><b>Tax Type:</b> <?=$dat->tax_type_name?></div>
                <div class="col-md-3"><b>Qty:</b> <?=$dat->availability?></div>
                <div class="col-md-3"><b>Price:</b> <?=number_format($dat->selling_price, 2)?></div>
                <div class="col-md-3"><b>Active:</b> <?=($dat->active == 1) ? 'Active' : 'Inactive'?></div>
            </div>
            <div class="row pt-3">
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped table-condensed table-hover">
                        <thead class="bg-primary">
                            <tr>
                                <th>Name</th>
                                <th>Measurement</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($datas as $dt) {
                                ?>
                                <tr>
                                    <td><?=$dt->item_name?></td>
                                    <td><?=$dt->measurement?></td>
                                    <td><?=number_format($dt->amount, 2)?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
            </div>
        <?php

    }

    public function get_edit_recipe () {
        $code = $_POST['data'];

        $dat = $this->db->select("a.*, b.unit_name, c.cat_name, d.tax_type_name, e.brand_name")
                        ->from('items as a')
                        ->join('units as b', 'a.unit_id = b.unit_id', 'left')
                        ->join('categories as c', 'a.category_id = c.cat_id', 'left')
                        ->join('tax_types as d', 'a.tax_type_id = d.tax_type_id', 'left')
                        ->join('brands as e', 'a.brand_id = e.brand_id', 'left')
                        ->where('a.recipe_code', $code)
                        ->get()->row();

        $datas = $this->db->select("a.*, b.item_name, c.unit_name, d.cat_name, e.tax_type_name, f.brand_name")
                        ->from('item_recipe_items as a')
                        ->join('items as b','a.item_id = b.item_id')

                        ->join('units as c', 'b.unit_id = c.unit_id', 'left')
                        ->join('categories as d', 'b.category_id = d.cat_id', 'left')
                        ->join('tax_types as e', 'b.tax_type_id = e.tax_type_id', 'left')
                        ->join('brands as f', 'b.brand_id = f.brand_id', 'left')

                        ->where('a.recipe_code', $code)
                        ->get()->result();

        $all_items = $this->Majorselects->all_items();

        ?>
            <div class="row">
                <form id="recipe_update_form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="code" hidden readonly required value="<?=$dat->recipe_code?>" />
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <label>Recipe name [product name] <i class="text-danger">*</i></label>
                            <input type="text" name="recipe_name" value="<?=$dat->item_name?>" class="form-control" required placeholder="Enter the name of the recipe/product." />
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label>Units <i class="text-danger">*</i></label>
                            <select class="form-control" name="unit_id" required>
                                <option value="">~Select output unit~</option>
                                <?php
                                $units = $this->db->get('units')->result();
                                foreach ($units as $unit) {
                                    $selected = null;
                                    if($unit->unit_id == $dat->unit_id) $selected = 'selected';
                                    echo '<option value="' . $unit->unit_id . '"  '.$selected.'  > ' . $unit->unit_name . ' </option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-4 col-xs-12">
                            <label>Category <i class="text-danger">*</i></label>
                            <select class="form-control" name="category_id" required>
                                <option value="">~Select output category~</option>
                                <?php
                                $categories = $this->db->get('categories')->result();
                                foreach ($categories as $cat) {
                                    $selected = null;
                                    if($cat->cat_id == $dat->category_id) $selected = 'selected';
                                    echo '<option value="' . $cat->cat_id . '"  '.$selected.'  > ' . $cat->cat_name . ' </option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label>Tax Type <i class="text-danger">*</i></label>
                            <select class="form-control" name="tax_type_id" required>
                                <option value="">~Select output tax type~</option>
                                <?php
                                $taxs = $this->db->get('tax_types')->result();
                                foreach ($taxs as $tax) {
                                    $selected = null;
                                    if($tax->tax_type_id == $dat->tax_type_id) $selected = 'selected';
                                    echo '<option value="' . $tax->tax_type_id . '"  '.$selected.'  > ' . $tax->tax_type_name . ' </option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label>Brands </label>
                            <select class="form-control" name="brand_id">
                                <option value="">~Select output brand~</option>
                                <?php
                                $brands = $this->db->get('brands')->result();
                                foreach ($brands as $brand) {
                                    $selected = null;
                                    if($brand->brand_id == $dat->brand_id) $selected = 'selected';
                                    echo '<option value="' . $brand->brand_id . '"  '.$selected.'  > ' . $brand->brand_name . ' </option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-4 col-xs-12">
                            <label>Qty produced <i class="text-danger">*</i></label>
                            <input type="number" name="availability" step="0.01" value="<?=$dat->availability?>" class="form-control" required placeholder="Enter qty to be produced" />
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <br/>
                            <label>Active </label>
                            <input type="checkbox" name="active" value="1" <?=($dat->active == 1) ? 'checked' : ''?> />
                        </div>

                        <div class="col-md-12 col-xs-12 table-responsive mt-2">
                            <label>Add recipe items <i class="text-danger">*</i></label>
                            <table class="table table-condensed table-bordered" id="recipe_table2">
                                <thead>
                                    <tr id="row1">
                                        <th style="width: 300px;">Item Name</th>
                                        <th>Measurement</th>
                                        <th>Amount (KES)</th>
                                        <th>
                                            <button type="button" class="btn btn-sm btn-default" onclick="add_row2()"><span class="fa fa-plus"></span></button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $x = 1;
                                    $totals = 0;
                                        foreach($datas as $dt) {
                                            $x++;
                                            $totals += $dt->amount;
                                            ?>
                                            <tr id="row2<?=$x?>">
                                                <td>
                                                    <select name="item[]" class="select2 form-control input-rg" id="item_<?=$x?>" required style='width: 100%;'>
                                                        <option value="">Select item</option>
                                                        <?php
                                                        foreach ($all_items as $ait) {
                                                            $selected = null;
                                                            if($dt->item_id == $ait->item_id) $selected = 'selected';
                                                            echo '<option value="' . $ait->item_id . '"  '.$selected.'  > ' . $ait->item_name . ' </option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" name="measurement[]" class="form-control" id="measurement_<?=$x?>" value="<?=$dt->measurement?>" required />
                                                </td>
                                                <td>
                                                    <input type="number" name="amount[]" onkeyup="set_amount2(<?=$x?>)" onchange="set_amount2(<?=$x?>)" value="<?=$dt->amount?>" step="0.01" class="form-control" id="amount2_<?=$x?>" required />
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-default" onclick="delete_row2(<?=$x?>)"><span class="fa fa-minus"></span></button>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <button class="btn btn-default" id="itemstotal2" style="color: orangered; font-weight: 900; font-size: 20px;">Total <?=number_format($totals, 2)?></button>
                            <button class="btn btn-primary pull-right" type="submit" style="font-size: 20px;">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <script>
                $(".select2").select2({
                    allowClear: true
                });                
            </script>
            <script>
                $(function() {
                    $('#recipe_update_form').on('submit', function(e) {
                        /*for add item*/
                        e.preventDefault();

                        $.ajax({
                            url: '<?php echo site_url(); ?>kitchen/update_recipe', //this is the submit URL
                            type: 'POST',
                            data: $('#recipe_update_form').serialize(),
                            success: function(data) {
                                var obj = JSON.parse(data);
                                if (obj.resp == '1') {

                                    success_sound();

                                    swal({
                                        icon: 'success',
                                        title: 'Success',
                                        text: obj.message
                                    });
                                    setTimeout(function() {
                                        window.location.reload();
                                    }, 3000);
                                } else {

                                    error_sound();

                                    swal({
                                        icon: 'warning',
                                        title: 'Failed',
                                        text: obj.message
                                    });
                                }

                            }
                        });
                    }); //end
                });
            </script>
        <?php

    }

    public function delete_recipe () {
        $code = $_POST['data'];
        
        $resp = array("resp"=>0, "message"=>"Action not allowed");

        // delete item
        $delete1 = $this->db->delete('items', array('recipe_code'=>$code));
        // delete recipe details
        $delete2 = $this->db->delete('item_recipe_items', array('recipe_code'=>$code));

        if($delete1 && $delete2) {
            $resp = array("resp"=>1, "message"=>"Deleted successfully");
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Deleted successfully. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
        } else {
            $resp = array("resp"=>0, "message"=>"Delete failed!");
        }

        echo json_encode($resp);

    }







}



