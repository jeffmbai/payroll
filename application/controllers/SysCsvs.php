<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SysCsvs extends CI_Controller {

    public $role;
    public $username;
    var $data;

    function __construct()
    {
        parent::__construct();

        $this->role = $_SESSION['userrole'];
        $this->username = $this->session->userdata('username');
        if( !isset($_SESSION['userrole']) || !isset($_SESSION['username']) ){
            //session is not set. cancel back to login page
            redirect(site_url('pages/logout'));
        }
        else{
            #echo "Success";
            $this->load->model('Stations_Model');
            $this->load->model('Organization');
            $this->load->model('Majorselects');
            $this->load->model('Users_Model');
            $this->load->model('Inserts');
            $this->load->model('Deletes');
            $this->load->model('Auth_model');
            $this->load->model('Email');
            $this->load->model('Data_Import');
            
            $this->data['active_user'] = $this->Majorselects->get_user();
        }

        $this->load->library('csvimport'); //old method to import
        $this->load->library('excel'); //new method to import
    }


    /* TEMPLATES START */
    public function orgs_template() {
        header('Content-type: text/csv');
        header('Content-disposition: attachment;filename=orgs.csv');
        
        echo "org_name,email, phone, address, kra_pin, vat_no, narrative".PHP_EOL;
        #echo "a,b,XXXX,YYYYYYY,10,700,7000".PHP_EOL;
    }

    public function stations_template() {
        header('Content-type: text/csv');
        header('Content-disposition: attachment;filename=stations.csv');
        
        echo "org_name,station_category,station_name,primary_phone,secondary_phone,narrative".PHP_EOL;
    }

    public function departments_template() {
        header('Content-type: text/csv');
        header('Content-disposition: attachment;filename=departments.csv');
        
        echo "org_name,station_name,department_name,narrative".PHP_EOL;
    }

    public function employees_template() {
        header('Content-type: text/csv');
        header('Content-disposition: attachment;filename=staff.csv');
        
        echo "first_name, second_name, last_name, email, id_number, primary_phone, secondary_phone, dob, gender, address, employment_number, disability, marital_status, kra_pin, nssf, nhif, job_grade, joining_date, leaving_date, basic_salary, narrative".PHP_EOL;
    }

    public function items_template() {
        header('Content-type: text/csv');
        header('Content-disposition: attachment;filename=items_upload_template.csv');
        
        echo "Item Name, Category, Brand, Unit, Color, Tax Type, Buying Price, Marked Price, SKU, Opening Stock, Reorder Level, Narrative".PHP_EOL;
    }
    public function items_template_demo() {
        header('Content-type: text/csv');
        header('Content-disposition: attachment;filename=items_upload_template.csv');
        
        echo "brand_id, brand_model_id, package_type, tax_type, ship_number, buying_price, mark_up_percentage, capacity, color, imei_one, imei_two, barcode, narrative".PHP_EOL;
        echo "1, 2, Open Box, VAT, SHIP001, 10000, 20, 2, Red, IMEI28282892, , 77726272, test description one".PHP_EOL;
        echo "2, 4, Original, Excempted, SHIP001, 25000, 15, 4, Black, IM144282892, , 85895272, test description two".PHP_EOL;
        echo "1, 2, Open Box, VAT, SHIP002, 5000, 20, 2, Blue, IMEI773282892, IME28883833, 777545212, test description three".PHP_EOL;
    }
    public function items() {
        $items = $this->Majorselects->all_items();

        header('Content-type: text/csv');
        header('Content-disposition: attachment;filename=items_list.csv');
        echo "No, Item Name, Buying Price, Marked Price, Tax Type, Brand, Units, Narrative".PHP_EOL;

        $x= 1;
        foreach($items as $dt) {
            echo  $x.','.$dt->item_name.','.$dt->buying_price.','.$dt->marked_price.','.$dt->tax_type_name.','.$dt->brand_name.','.$dt->unit_name.','.$dt->narrative.''.PHP_EOL;
            $x++;
        }
    }

    /* TEMPLATES END */

    #=============================================================================

    /* Imports Start */
    function import () {

        $file = $_FILES["items_upload"]["tmp_name"];
        if(isset($file) || $file != null || $file != '') {
            #do the upload
            $config['upload_path']   = './assets/imports/';
            $config['allowed_types'] = 'csv|xlsx|xls|excel';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('items_upload'))  {
                echo $this->upload->display_errors();
            }
            else {
                $upload_data = $this->upload->data();              #returns upload data
                $file_name =   $upload_data['file_name'];          #get the file name
                $full_path =   $upload_data['full_path'];   #get the full path of the uploaded file

                #get the data from uploaded file
                $file_data = $this->csvimport->get_array($full_path);
                
                foreach($file_data as $row) {
                    $upload_import[] = array(
                        'item_name' => $row['item_name'],
                        'category' => $row['category'],
                        'attribute' => $row['attribute'],
                        'buying_price' => $row['buying_price'],
                        'marked_price' => $row['marked_price'],
                        'brand_id' => $row['brand'],
                        'color' => $row['color'],
                        'unit' => $row['unit'],
                        'barcode' => $row['sku']
                    );
                }
                //if($this->Data_Import->insert($data)) {
                if($this->db->insert_batch('items_two', $upload_import)) {
                    echo "Success";
                } else {
                    echo "Failed";
                    var_dump($this->db->error());
                }
            }
            
        } else {
            #there is no upload file set
            echo 'No upload file set';
        }
        
    }
    function new_import () {

        #generate the code
        $day = date('d');
        $permitted_chars    = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_code        =  substr(str_shuffle($permitted_chars), 0, 10);
        #get last order id
        $last_item = null;
        $last_item = $this->db->select("item_id")->from("items")->order_by("item_id","DESC")->limit(1)->get()->row("item_id");
    
        $code = 'J' . $day. 'I' . $last_item . $random_code;

        $code = substr($code, 0, 10); #get the final code to a string of 10 characters
        #End of code generation

        $specify = 'item_import';

        $file = $_FILES["items_upload"]["tmp_name"];
        if(isset($file) || $file != null || $file != '') {
            #do the upload
            $config['upload_path']   = './assets/imports/';
            $config['allowed_types'] = 'csv|CSV|xls|XLS|xlsx|XLSX';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('items_upload'))  {
                echo $this->upload->display_errors();
            }
            else {
                $upload_data = $this->upload->data();              #returns upload data
                $file_name =   $upload_data['file_name'];          #get the file name
                $full_path =   $upload_data['full_path'];   #get the full path of the uploaded file

                #get the data from uploaded file
                $object = PHPExcel_IOFactory::load($full_path);
                $cy = 0;
                
                foreach($object->getWorksheetIterator() as $worksheet) {
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
                    $cy = $highestRow - 1;
             
                    for($row = 2; $row <= $highestRow; $row++) {
                        #get tax type
                        $tax_type_id = 3; #default
                        $taxType = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        if($taxType == 'VAT' || $taxType == 'V.A.T') $tax_type_id = 3;
                        else if($taxType == 'Excempted' || $taxType == 'Excempt') $tax_type_id = 4;
                
                        $data[] = array(
                            'specify' => $specify,
                            'reference' => $code,
                            'item_name' => trim($worksheet->getCellByColumnAndRow(0, $row)->getValue()),
                            'category' => trim($worksheet->getCellByColumnAndRow(1, $row)->getValue()),
                            'brand_id' => trim($worksheet->getCellByColumnAndRow(2, $row)->getValue()),
                            'unit' => trim($worksheet->getCellByColumnAndRow(3, $row)->getValue()),
                            'color' => trim($worksheet->getCellByColumnAndRow(4, $row)->getValue()),
                            'tax_type_id' => $tax_type_id,
                            'buying_price' => trim($worksheet->getCellByColumnAndRow(5, $row)->getValue()),
                            'marked_price' => trim($worksheet->getCellByColumnAndRow(6, $row)->getValue()),
                            'selling_price' => trim($worksheet->getCellByColumnAndRow(7, $row)->getValue()),
                            'barcode' => trim($worksheet->getCellByColumnAndRow(8, $row)->getValue()),
                            'opening_stock' => trim($worksheet->getCellByColumnAndRow(9, $row)->getValue()),
                            'reorder_level' => trim($worksheet->getCellByColumnAndRow(10, $row)->getValue()),
                            'narrative' => trim($worksheet->getCellByColumnAndRow(11, $row)->getValue())
                        );             
             
                    }
                }

                //var_dump($data); exit();
                
                if($this->db->insert_batch('items_two',$data)) {
                    
                    // get the items from items_two table and insert in the order_items table
                    $items = $this->db->select("a.*")
                                    ->from('items as a')
                                    //->join('items_two as b', "a.imei_one = b.imei_one")
                                    ->where("a.reference", $code)                                    
                                    ->get()->result();
                    $itemscount = count($items);
                    if($itemscount > 0) {
                        //items available
                        if($cy > $itemscount) {
                            //delete imported items from items_two table.
                            $this->db->query( "DELETE FROM items_two WHERE reference = '$code'" );
                            //show the user that some files have been rejected
                            $this->session->set_flashdata('alert', '<div class="alert alert-success">Items successfully and partially uploaded. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                            $_SESSION['reference_code'] = $code;
                            echo "failed_partially";
                        } else {
                            //import success
                            //delete imported items from items_two table.
                            $this->db->query( "DELETE FROM items_two WHERE reference = '$code'" );
                            echo "success";
                        }
                        
                    } else {
                        //delete imported items from items_two table.
                        $this->db->query( "DELETE FROM items_two WHERE reference = '$code'" );
                        //display error as items weren't registered in the items table
                        $this->session->set_flashdata('alert', '<div class="alert alert-success">Items successfully and partially uploaded. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                        $_SESSION['reference_code'] = $code;
                        echo "failed_partially";
                    }


                } else {
                    echo "failed";
                }
            }
            
        } else {
            #there is no upload file set
            echo 'file_error';
        }
        
    }
    /* Imports End */

    function reimport () {
        #var_dump($_POST);
        $color=$brand=$category=$unit=null;
        $barcode = 0;
        $condition = null;
        $resp = array( "resp"=>0, "message"=>"Nothing happened" );

        //get color
        $color = $this->db->where('color_name',$_POST['color'])->get('colors')->row();
        if(count($color) > 0) { 
            $color = $color->color_id; 
        } else { $condition .= 'Color name does not exist, '; }
        //get unit
        $unit = $this->db->where('unit_name',$_POST['unit'])->get('units')->row();
        if(count($unit) > 0) { 
            $unit = $unit->unit_id; 
        } else { $condition .= 'Unit name does not exist, '; }
        //get category
        $category = $this->db->where('cat_name',$_POST['category'])->get('categories')->row();
        if(count($category) > 0) { 
            $category = $category->cat_id; 
        } else { $condition .= 'Category name does not exist, '; }
        //get brand
        $brand = $this->db->where('brand_name',$_POST['brand_id'])->get('brands')->row();
        if(count($brand) > 0) { 
            $brand = $brand->brand_id; 
        } else { $condition .= 'Brand name does not exist, '; }
        //check barcode
        $barcode = $this->db->where('barcode',$_POST['barcode'])->get('items')->num_rows();
        if($barcode > 0) { 
            $condition .= 'SKU already exist, ';
        }

        if($condition != null) {
            $resp = array ("resp"=>0, "message"=>$condition);
        } else {
            //do some insert here
            $insert_data = array(
                "item_name"      => trim($this->input->post('item_name')),
                "org_id"         => $_SESSION['orgid'],
                "category_id"    => "['".$category."']",
                "unit_id"        => $unit,
                "brand_id"       => $brand,
                //"attribute_id"   => json_encode($this->input->post('attribute_id')),
                "tax_type_id"    => trim($this->input->post('tax_type_id')),
                "buying_price"   => trim($this->input->post('buying_price')),
                "marked_price"   => trim($this->input->post('marked_price')),
                "color_id"       => $color,
                "barcode"        => trim($this->input->post('barcode')),
                "for_sale"       => 1,
                "for_purchase"   => 1,
                "for_bar"        => 0,
                "narrative"      => trim($this->input->post('narrative')),
                "availability"   => 1,
                "available_qty"  => trim($this->input->post('opening_stock')),
                "reorder_level"  => trim($this->input->post('reorder_level')),
                "active"         => 1
            );
            if($this->db->insert('items',$insert_data)) {
                //delete from items three table
                $this->db->delete('items_three', array("item_id"=>$_POST['item_id']));

                $this->session->set_flashdata('alert', '<div class="alert alert-success">Item successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                $resp = array ("resp"=>1, "message"=>'Item successfully registered');
            } else {
                $resp = array ("resp"=>0, "message"=>'An error occurred. Please try again later');
                //$resp = array ("resp"=>0, "message"=> $this->db->error());
            }
        }

        echo json_encode($resp);
        
    }



}