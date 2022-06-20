<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll extends MY_Controller {

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
            $this->load->model('Deletes');
            $this->load->model('School_Model');
            $this->load->model('Student_Model');
            $this->load->model('Organization');
            $this->load->model('Staff_Model');
            $this->load->model('Departments_Model');
            $this->load->model('Payroll_Model');
            
            $this->data['active_user'] = $this->Majorselects->get_user();

            $this->load->library('csvimport'); //old method to import
            $this->load->library('excel'); //new method to import
        }
    }

    #Payroll start
    public function index() {
        $this->permission_check('payroll_view');    
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Generate Payroll';

        $this->data['staff'] = $this->Staff_Model->staff();
        $this->data['orgs'] = $this->Majorselects->all_orgs();
        $this->data['year_months'] = $this->Majorselects->year_months();
        $this->data['fiscal_years'] = $this->Majorselects->fiscal_years();
        $this->data['current_payroll'] = $this->Payroll_Model->current_payroll();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('payroll/index', $this->data);
        $this->load->view('inc/footer');

    }

    public function advances() {
        $this->permission_check('payroll_view');    
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Salary Advances';

        // $this->data['staff'] = $this->Staff_Model->staff();
        $this->data['staff'] = $this->Staff_Model->staff_with_advance();
        $this->data['orgs'] = $this->Majorselects->all_orgs();
        $this->data['year_months'] = $this->Majorselects->year_months();
        $this->data['fiscal_years'] = $this->Majorselects->fiscal_years();
        $this->data['current_payroll'] = $this->Payroll_Model->current_advance();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('payroll/advances', $this->data);
        $this->load->view('inc/footer');
    }

    public function bank_cashouts() {
        $this->permission_check('payroll_view');    
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Bank Cashouts';

        $this->data['orgs'] = $this->Majorselects->all_orgs();
        $this->data['year_months'] = $this->Majorselects->year_months();
        $this->data['fiscal_years'] = $this->Majorselects->fiscal_years();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('payroll/bank_cashouts', $this->data);
        $this->load->view('inc/footer');

    }

    public function employee_p9() {
        $this->permission_check('payroll_view');    
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'P9';

        $this->data['staff'] = $this->Staff_Model->staff();
        $this->data['orgs'] = $this->Majorselects->all_orgs();
        $this->data['year_months'] = $this->Majorselects->year_months();
        $this->data['fiscal_years'] = $this->Majorselects->fiscal_years();
        $this->data['current_payroll'] = $this->Payroll_Model->current_payroll();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('payroll/p9', $this->data);
        $this->load->view('inc/footer');

    }

    public function get_bank_cashouts(){ #get ban cashouts data on org, month and year basis
        if(isset($_POST)){
            #get the post items
            $orgID = trim($_POST['org_id']);
            $monthID = trim($_POST['year_month_id']);
            $yearID = trim($_POST['fiscal_year_id']);

            $count = 0;
            $get_bank_cashouts = $this->Payroll_Model->monthly_bank_cashouts($orgID, $monthID, $yearID);
            foreach($get_bank_cashouts as $dt) {
                ?>
                <tr class="even pointer">
                    <td>
                        <?php 
                            echo $dt->first_name.' '.$dt->last_name.' <br/><small>('.$dt->org_name.' ID:'.$dt->id_number.')</small>';
                        ?>
                    </td>
                    <td><?php echo $dt->bank_name;?></td>
                    <td><?php echo $dt->branch_name;?></td>
                    <td><?php echo $dt->branch_code;?></td> 
                    <td><?php echo $dt->bank_account_no;?></td> 
                    <td><?php echo $dt->net_salary;?></td> 
                </tr>
                <?php
                $count++;
            }

            if($count > 0) {
                echo '<tr>
                    <td colspan="5"></td>
                    <td colspan="1"> <a href="'.site_url('payroll/print_bank_cashouts/'.$orgID.'/'.$monthID.'/'.$yearID).'"class="btn btn-sm btn-success" target="_blank" >Download and Print</a> </td>
                </tr>';
            } else {
                #no data
                echo '<tr><td colspan="6"><span class="text text-warning">Sorry!!! No data available.</span></td></tr>';
            }


        } else {
            echo "<div class='alert alert-warning'>Sorry! This is not allowed.</div>";
        }
    }

    public function get_staff_p9 () {
        if(isset($_POST)){
            #get the post items
            $empID = trim($_POST['employee_id']);
            $yearID = trim($_POST['fiscal_year_id']);

            $get_staff_p9 = $this->Payroll_Model->get_staff_p9($empID, $yearID);
            foreach($get_staff_p9 as $dt) {
                ?>
                <tr class="even pointer">
                    <td>
                        <?php 
                            echo $dt->first_name.' '.$dt->last_name.' <br/><small>('.$dt->org_name.' ID:'.$dt->id_number.')</small>';
                        ?>
                    </td>
                    <td><?php echo $dt->basic_salary;?></td>
                    <td><?php echo $dt->gross_salary;?></td>
                    <td><?php echo $dt->net_salary;?></td>
                    <td>
                        <?php if($dt->is_disbursed == 1) echo "Yes"; else echo "No";?>
                    </td>
                    <td>
                        <?php if($dt->is_paid == 1) echo "Yes"; else echo "No";?>
                    </td>
                    <td class=" last">
                        <?php 
                            #if has already been paid then show download button
                            if($dt->is_paid == 1 && $dt->is_disbursed == 1) {
                                echo '<a href="'.site_url('payroll/payslip/'.$dt->employee_id.'/'.$dt->employee_month_id).'" target="_blank" class="btn btn-xs btn-default fa fa-print"> </a>';
                            }
                        ?>
                    </td>

                </tr>
                <?php
            }

            echo '<tr>
                    <td colspan="5"></td>
                    <td colspan="2"> <a href="'.site_url('payroll/print_staff_p9/'.$empID.'/'.$yearID).'"class="btn btn-sm btn-success" target="_blank" >Download and Print P9</a> </td>
                </tr>';


        } else {
            echo "<div class='alert alert-warning'>Sorry! This is not allowed.</div>";
        }
    }

    public function print_bank_cashouts($orgID, $monthID, $yearID) {
        #print cash outs for a given org in a given month and year
        $this->data['get_bank_cashouts'] = $this->Payroll_Model->monthly_bank_cashouts($orgID, $monthID, $yearID);
        $this->data['this_org'] = $this->Organization->this_org($orgID);

        #var_dump($this->data); exit();
        
        $this->load->library('pdf');
        $html = $this->load->view('reports/bank_cashouts', $this->data, true);
        $this->pdf->createPDF($html, 'bank_cashout_'.$orgID.'_'.$monthID.'_'.$yearID, false);
    }

    public function print_staff_p9($empID, $yearID) {
        #print p9 for specific employee and specific year
        $this->data['staff'] = $this->Staff_Model->staff_profile($empID);
        $this->data['p9'] = $this->Payroll_Model->get_staff_p9($empID, $yearID);

        #var_dump($this->data['p9']); exit();
        
        $this->load->library('pdf');
        $html = $this->load->view('reports/single_p9', $this->data, true);
        $this->pdf->createPDF($html, 'p9_'.$empID.'_'.$yearID, false);
    }
    
    public function payslip($id) {
        #generate payslip for a given emplpyee/staff
        $this->data['payslip'] = $this->Payroll_Model->payslip($id);

        if(count($this->data['payslip']) < 1) {
            redirect(site_url('payroll/index'));
        }
        
        $this->load->library('pdf');
        $html = $this->load->view('reports/payslip', $this->data, true);
        $this->pdf->createPDF($html, 'countless_stars_payslip', false);
    }

    public function p9s($empID) {
        #generate payslip for a given emplpyee/staff
        $this->data['payslip'] = $this->Payroll_Model->payslip($empID);
        
        $this->load->library('pdf');
        $html = $this->load->view('reports/payslip', $this->data, true);
        $this->pdf->createPDF($html, 'countless_stars_payslip', false);
    }

    #new payment start
    public function new_payment() {
        $this->permission_check('payroll_process');

        $active         = $this->input->post('active');
        if($active == '') $active = 0;
        $employeeID     = $this->input->post('employee_id');
        $org_id         = $this->input->post('org_id');
        $fiscal_year_id = $this->input->post('fiscal_year_id');
        $year_month_id  = $this->input->post('year_month_id');
        $year = $this->db->where('fiscal_year_id',$fiscal_year_id)->get('fiscal_years')->row('fiscal_year_name');

        date_default_timezone_set('Africa/Nairobi');
        $reference = date('YmdHis').round(microtime(), 4);

        $insertArray = array();
        $insertDRCR = array();
        #number of employees                
        $arrayLength = count($employeeID);
        $xy = $total_salo = $ttnhif = $ttnssf = 0;
        $error = false; #control to find whether some transactions have failed
        $queryData = false; #to confirm if there exist insert data
        // Get the salaries account
        $salo_payable = $this->db->where('account_code','600002')->get('accounts')->row(); // liability
        $salo = $this->db->where('account_code','800002')->get('accounts')->row(); // expense
        $salo_nssf = $this->db->where('account_code','800004')->get('accounts')->row(); // expense
        $salo_nhif = $this->db->where('account_code','800003')->get('accounts')->row(); // expense

        // exit();

        if(in_array("all", $employeeID)){
            #process salary for all employees
            #get all active employees
            $empID = null;
            $basicSalary = 0;            
            $staffDetails = $this->db->query("SELECT * FROM employees WHERE active = 1 AND org_id = ".$org_id." ");
            $data = $staffDetails->result();
            $dataLength = count($data); #get length of array/number of employees
            if($dataLength == 0) {
                #no employee existing
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">You currently do not have active employees to process for payments. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($this->session->userdata('referred_from'));
            }
            foreach($data as $res) {
                $xy++;
                $grossTaxableIncome = 0;
                $netTaxableIncome = 0;
                $basicSalary = 0;
                $bank_id = $bank_name = $branch_name = $branch_code = $bank_account_no = $bank_account_no = null;
                $tax_relief = 0;
                $insurance_relief = 0;

                #get employee b-salary and employee_id
                $basicSalary = $res->basic_salary;
                $basicSalary = $res->basic_salary;
                $nssf = $res->nssf_amount;
                $nhif = $res->nhif_amount;
                $paye = $res->paye;
                $tax_relief = $res->tax_relief_amount;
                $insurance_relief = $res->insurance_relief_amount;
                $empID = $res->employee_id;

                #get bank details
                $bank_details = $this->db->where("employee_id = '$empID' AND active = 1")->limit(1)->get('employee_bank_details')->result();
                foreach($bank_details as $bd) {
                    $bank_id = $bd->employee_bank_detail_id;
                    $bank_name = $bd->bank_name;
                    $branch_name = $bd->branch_name;
                    $branch_code = $bd->branch_code;
                    $bank_account_no = $bd->account_number;
                }
                // if($bank_id == null) {  #get the error as true and continue to the next row
                //     $error = true;
                //     continue;
                // } else $queryData = true;

                #get allowances
                $totalAllowance = 0;
                $allowances = $this->db->query("SELECT * FROM employee_allowances WHERE employee_id = ".$empID." AND active = 1 ");
                foreach($allowances->result() as $allw) {
                    $totalAllowance += $allw->allowance_amount;
                }

                #get deductions
                $totalDeductibles = 0;
                $deductibles = $this->db->query("SELECT * FROM employee_deductibles WHERE employee_id = ".$empID." AND active = 1 ");
                foreach($deductibles->result() as $ded) {
                    $totalDeductibles += $ded->deductible_amount;
                }

                $totalDeductibles += $nssf + $nhif + $paye;

                $grossTaxableIncome = $basicSalary + $totalAllowance;
                $netTaxableIncome = $grossTaxableIncome - $totalDeductibles;

                // $tax = $this->calculatetax($netTaxableIncome);
                $tax = $paye;

                $insertdata = array (
                    "org_id" => $org_id,
                    "employee_id" => $empID,
                    "fiscal_year_id" => $fiscal_year_id,
                    "year_month_id" => $year_month_id,
                    "is_disbursed" => true,
                    "is_paid" => true,
                    "basic_salary" => $basicSalary,
                    "gross_salary" => $grossTaxableIncome,
                    "net_salary" => $netTaxableIncome,
                    "allowance" => $totalAllowance,
                    "deductible" => $totalDeductibles,
                    "tax" => $tax,
                    "nhif" => $nhif,
                    "nssf" => $nssf,
                    "tax_relief" => $tax_relief,
                    "insurance_relief" => $insurance_relief,
                    "bank_id" => $bank_id,
                    "branch_name" => $branch_name,
                    "bank_name" => $bank_name,
                    "branch_code" => $branch_code,
                    "bank_account_no" => $bank_account_no,
                    "payroll_code" => $reference,
                );
                $insertArray[] = $insertdata;

                $ttnssf += $nssf;  // total nssf to be deposited in the bank acc.
                $ttnhif += $nhif;  // total nhif to be deposited in the bank acc.
                $total_salo += $netTaxableIncome;  // total amount to be deposited in the bank acc.
                
            }

        } else {
            #process specified employee salaries
            foreach($employeeID as $empID) {
                $xy++;
                $grossTaxableIncome = 0;
                $netTaxableIncome = 0;
                $basicSalary = 0;
                $bank_id = $bank_name = $branch_name = $branch_code = $bank_account_no = $bank_account_no = null;
                $tax_relief = 0;
                $insurance_relief = 0;

                #get employee b-salary
                $staffDetails = $this->db->where('employee_id',$empID)->get('employees')->row();
                $basicSalary = $staffDetails->basic_salary;
                $nssf = $staffDetails->nssf_amount;
                $nhif = $staffDetails->nhif_amount;
                $paye = $staffDetails->paye;
                $tax_relief = $staffDetails->tax_relief_amount;
                $insurance_relief = $staffDetails->insurance_relief_amount;

                #get bank details
                $bank_details = $this->db->where("employee_id = '$empID' AND active = 1")->limit(1)->get('employee_bank_details')->result();
                foreach($bank_details as $bd) {
                    $bank_id = $bd->employee_bank_detail_id;
                    $bank_name = $bd->bank_name;
                    $branch_name = $bd->branch_name;
                    $branch_code = $bd->branch_code;
                    $bank_account_no = $bd->account_number;
                }
                
                #get allowances
                $totalAllowance = 0;
                $allowances = $this->db->query("SELECT * FROM employee_allowances WHERE employee_id = ".$empID." AND active = 1 ");
                foreach($allowances->result() as $allw) {
                    $totalAllowance += $allw->allowance_amount;
                }

                #get deductions
                $totalDeductibles = 0;
                $deductibles = $this->db->query("SELECT * FROM employee_deductibles WHERE employee_id = ".$empID." AND active = 1 ");
                foreach($deductibles->result() as $ded) {
                    $totalDeductibles += $ded->deductible_amount;
                }

                $totalDeductibles += $nssf + $nhif + $paye;
                
                $grossTaxableIncome = $basicSalary + $totalAllowance;
                $netTaxableIncome = $grossTaxableIncome - $totalDeductibles;

                // $tax = $this->calculatetax($netTaxableIncome);
                $tax = $paye;

                $insertdata = array (
                    "org_id" => $org_id,
                    "employee_id" => $empID,
                    "fiscal_year_id" => $fiscal_year_id,
                    "year_month_id" => $year_month_id,
                    "is_disbursed" => true,
                    "is_paid" => true,
                    "basic_salary" => $basicSalary,
                    "gross_salary" => $grossTaxableIncome,
                    "net_salary" => $netTaxableIncome,
                    "allowance" => $totalAllowance,
                    "deductible" => $totalDeductibles,
                    "tax" => $tax,
                    "nhif" => $nhif,
                    "nssf" => $nssf,
                    "tax_relief" => $tax_relief,
                    "insurance_relief" => $insurance_relief,
                    "bank_id" => $bank_id,
                    "bank_name" => $bank_name,
                    "branch_name" => $branch_name,
                    "branch_code" => $branch_code,
                    "bank_account_no" => $bank_account_no,
                    "payroll_code" => $reference,
                );
                $insertArray[] = $insertdata;

                $ttnssf += $nssf;  // total nssf to be deposited in the bank acc.
                $ttnhif += $nhif;  // total nhif to be deposited in the bank acc.
                $total_salo += $netTaxableIncome;  // total amount to be deposited in the bank acc.
            }
        }

        #insert payment into the database in bulk
        // echo $payQuery; exit();

        if($this->db->insert_batch('employee_month',$insertArray)) {
            #success
            // insert into vouchers total salary
            $cr = array (
                array ( // cr salaries payable
                    "org_id"=> $_SESSION['orgid'],
                    "account_id"=> $salo_payable->account_id,
                    "account_code"=> $salo_payable->account_code,
                    "account_type_id"=>  $salo_payable->account_type_id,
                    "subaccount_type_id"=>  $salo_payable->subaccount_type_id,
                    "fiscal_year_id"=> $_SESSION['fiscalyearid'],
                    "voucher_code"=> $reference,
                    "voucher_amount"=> $total_salo,
                    "voucher_type"  => 'cr',
                    "opening_closing_balance" => '',
                    "transaction_date"=> date('Y-m-d'),
                    "created_by"=> $_SESSION['userid'],
                    "approved_by"=> '',
                    "term_id"=> $_SESSION['termid'],
                    "narrative"=> 'Salary for the month '.$year_month_id.'/'.$year,
                ),
                array ( // dr salaries account
                    "org_id"=> $_SESSION['orgid'],
                    "account_id"=> $salo->account_id,
                    "account_code"=> $salo->account_code,
                    "account_type_id"=>  $salo->account_type_id,
                    "subaccount_type_id"=>  $salo->subaccount_type_id,
                    "fiscal_year_id"=> $_SESSION['fiscalyearid'],
                    "voucher_code"=> $reference,
                    "voucher_amount"=> $total_salo,
                    "voucher_type"  => 'dr',
                    "opening_closing_balance" => '',
                    "transaction_date"=> date('Y-m-d'),
                    "created_by"=> $_SESSION['userid'],
                    "approved_by"=> '',
                    "term_id"=> $_SESSION['termid'],
                    "narrative"=> 'Salary for the month '.$year_month_id.'/'.$year,
                ),
                array ( // dr nhif account
                    "org_id"=> $_SESSION['orgid'],
                    "account_id"=> $salo_nhif->account_id,
                    "account_code"=> $salo_nhif->account_code,
                    "account_type_id"=>  $salo_nhif->account_type_id,
                    "subaccount_type_id"=>  $salo_nhif->subaccount_type_id,
                    "fiscal_year_id"=> $_SESSION['fiscalyearid'],
                    "voucher_code"=> $reference,
                    "voucher_amount"=> $ttnhif,
                    "voucher_type"  => 'dr',
                    "opening_closing_balance" => '',
                    "transaction_date"=> date('Y-m-d'),
                    "created_by"=> $_SESSION['userid'],
                    "approved_by"=> '',
                    "term_id"=> $_SESSION['termid'],
                    "narrative"=> 'NHIF for the month '.$year_month_id.'/'.$year,
                ),
                array ( // dr nssf account
                    "org_id"=> $_SESSION['orgid'],
                    "account_id"=> $salo_nssf->account_id,
                    "account_code"=> $salo_nssf->account_code,
                    "account_type_id"=>  $salo_nssf->account_type_id,
                    "subaccount_type_id"=>  $salo_nssf->subaccount_type_id,
                    "fiscal_year_id"=> $_SESSION['fiscalyearid'],
                    "voucher_code"=> $reference,
                    "voucher_amount"=> $ttnssf,
                    "voucher_type"  => 'dr',
                    "opening_closing_balance" => '',
                    "transaction_date"=> date('Y-m-d'),
                    "created_by"=> $_SESSION['userid'],
                    "approved_by"=> '',
                    "term_id"=> $_SESSION['termid'],
                    "narrative"=> 'NSSF for the month '.$year_month_id.'/'.$year,
                )
                
            );

            $this->db->insert_batch('vouchers',$cr);

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('payroll/index'), 'refresh');
        } else {
            #failed
            $this->db->where('payroll_code',$reference)->delete('employee_month');
            $error = $this->db->error();
            $err = $error['message'];
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! '.$err.'. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('payroll/index'), 'refresh');
        }
        

    }   
    
    public function new_payment_advances() {
        $this->permission_check('payroll_process');

        $active         = $this->input->post('active');
        if($active == '') $active = 0;
        $employeeID     = $this->input->post('employee_id');
        $org_id         = $this->input->post('org_id');
        $fiscal_year_id = $this->input->post('fiscal_year_id');
        $year_month_id  = $this->input->post('year_month_id');
        $year = $this->db->where('fiscal_year_id',$fiscal_year_id)->get('fiscal_years')->row('fiscal_year_name');

        date_default_timezone_set('Africa/Nairobi');
        $reference = date('YmdHis').round(microtime(), 4);

        $insertArray = array();
        $insertDRCR = array();
        #number of employees                
        $arrayLength = count($employeeID);
        $xy = $total_salo = 0;
        $error = false; #control to find whether some transactions have failed
        // Get the salaries account
        $salo = $this->db->where('account_code','SALP_001')->get('accounts')->row();

        if(in_array("all", $employeeID)){
            #process salary for all employees
            #get all active employees
            $empID = null;
            $basicSalary = 0;            
            $staffDetails = $this->Staff_Model->staff_with_advance();
            $data = $staffDetails;
            $dataLength = count($data); #get length of array/number of employees
            if($dataLength == 0) {
                #no employee existing
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">You currently do not have active employees to process for advances. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($this->session->userdata('referred_from'));
            }
            foreach($data as $res) {
                $xy++;
                $advance = 0;
                $bank_id = $bank_name = $branch_name = $branch_code = $bank_account_no = $bank_account_no = null;

                #get employee b-salary and employee_id
                $empID = $res->employee_id;

                $advance = $res->deductible_amount;

                #get bank details
                $bank_details = $this->db->where("employee_id = '$empID' AND active = 1")->limit(1)->get('employee_bank_details')->result();
                foreach($bank_details as $bd) {
                    $bank_id = $bd->employee_bank_detail_id;
                    $bank_name = $bd->bank_name;
                    $branch_name = $bd->branch_name;
                    $branch_code = $bd->branch_code;
                    $bank_account_no = $bd->account_number;
                }
                
                $insertdata = array (
                    "org_id" => $org_id,
                    "employee_id" => $empID,
                    "fiscal_year_id" => $fiscal_year_id,
                    "year_month_id" => $year_month_id,
                    "is_disbursed" => true,
                    "is_paid" => true,
                    "basic_salary" => 0,
                    "gross_salary" => 0,
                    "net_salary" => 0,
                    "allowance" => 0,
                    "deductible" => 0,
                    "tax" => 0,
                    "nhif" => 0,
                    "nssf" => 0,
                    "tax_relief" => 0,
                    "insurance_relief" => 0,
                    "advance_amount" => $advance,
                    "is_advance" => 1,
                    "bank_id" => $bank_id,
                    "bank_name" => $bank_name,
                    "branch_name" => $branch_name,
                    "branch_code" => $branch_code,
                    "bank_account_no" => $bank_account_no,
                    "payroll_code" => $reference,
                );
                $insertArray[] = $insertdata;

                $total_salo += $advance;  // total amount to be deposited in the bank acc.
                
            }

        } else {
            #process specified employee salaries
            foreach($employeeID as $empID) {
                $xy++;
                $advance = 0;
                $bank_id = $bank_name = $branch_name = $branch_code = $bank_account_no = $bank_account_no = null;
                #get employee b-salary
                $staffDetails = $this->Staff_Model->staff_with_advance_specific($empID);
                
                $advance = $staffDetails->deductible_amount;

                #get bank details
                $bank_details = $this->db->where("employee_id = '$empID' AND active = 1")->limit(1)->get('employee_bank_details')->result();
                foreach($bank_details as $bd) {
                    $bank_id = $bd->employee_bank_detail_id;
                    $bank_name = $bd->bank_name;
                    $branch_name = $bd->branch_name;
                    $branch_code = $bd->branch_code;
                    $bank_account_no = $bd->account_number;
                }
                
                $insertdata = array (
                    "org_id" => $org_id,
                    "employee_id" => $empID,
                    "fiscal_year_id" => $fiscal_year_id,
                    "year_month_id" => $year_month_id,
                    "is_disbursed" => true,
                    "is_paid" => true,
                    "basic_salary" => 0,
                    "gross_salary" => 0,
                    "net_salary" => 0,
                    "allowance" => 0,
                    "deductible" => 0,
                    "tax" => 0,
                    "nhif" => 0,
                    "nssf" => 0,
                    "tax_relief" => 0,
                    "insurance_relief" => 0,
                    "advance_amount" => $advance,
                    "is_advance" => 1,
                    "bank_id" => $bank_id,
                    "bank_name" => $bank_name,
                    "branch_name" => $branch_name,
                    "branch_code" => $branch_code,
                    "bank_account_no" => $bank_account_no,
                    "payroll_code" => $reference,
                );
                $insertArray[] = $insertdata;

                $total_salo += $advance;  // total amount to be deposited in the bank acc.
            }
        }

        #insert payment into the database in bulk
        // echo $payQuery; exit();

        if($this->db->insert_batch('employee_month',$insertArray)) {
            #success
            // insert into vouchers total salary
            $cr = array ( // cr salaries account
                "org_id"=> $_SESSION['orgid'],
                "account_id"=> $salo->account_id,
                "account_code"=> $salo->account_code,
                "account_type_id"=>  $salo->account_type_id,
                "subaccount_type_id"=>  $salo->subaccount_type_id,
                "fiscal_year_id"=> $_SESSION['fiscalyearid'],
                // "student_id"=> $studentid,              
                "voucher_code"=> $reference,
                "voucher_amount"=> $total_salo,
                "voucher_type"  => 'cr',
                "opening_closing_balance" => '',
                "transaction_date"=> date('Y-m-d'),
                "created_by"=> $_SESSION['userid'],
                "approved_by"=> '',
                "term_id"=> $_SESSION['termid'],
                "narrative"=> 'Advance for the month '.$year_month_id.'/'.$year,
            );

            $this->db->insert('vouchers',$cr);

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "generate_salary",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'employee_month',
                // 'source_id' => $empID,
                'narrative' => json_encode($insertArray),
                'task' => json_encode($insertArray),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('payroll/advances'), 'refresh');
        } else {
            #failed
            $error = $this->db->error();
            $err = $error['message'];
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! '.$err.'. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('payroll/advances'), 'refresh');
        }
        

    }   

    public function current_payroll_pdf () {
        $this->permission_check('payroll_view');
        $this->data['page'] = 'Payroll List';

        $period = $_SESSION['payroll_month'].'-'.$_SESSION['payroll_year'];

        $this->data['current_payroll'] = $this->Payroll_Model->current_payroll();

        $this->load->library('pdf');
        $html = $this->load->view('payroll/current_payroll_pdf', $this->data, true);
        $this->pdf->createPDF($html, 'Payroll_'.$period, false, 'A4', 'landscape');
    }

    public function current_payroll_excel () {
        $this->permission_check('payroll_view');
        $this->data['page'] = 'Payroll List';

        $current_payroll = $this->Payroll_Model->current_payroll();

        $period = 'Payroll_'.$_SESSION['payroll_month'].'-'.$_SESSION['payroll_year'];

        header('Content-type: text/csv');
        header('Content-disposition: attachment;filename='.$period.'.csv');

        echo "MALINDI PREMIER SCHOOL".PHP_EOL;
        echo $period." ".PHP_EOL;
        echo "Staff, Bank, Branch, Branch Code, Account Number, Net Salary".PHP_EOL;

        $x= 1;
        $tbasic = $tallow = $tgross = $tnssf = $tnhif = $tdeduct = $tnet = 0;
        foreach($current_payroll as $p) {
            $tbasic += $p->basic_salary;
            $tallow += $p->allowance;
            $tgross += $p->gross_salary;
            $tnet += $p->net_salary;
            $tnssf += $p->nssf;
            $tnhif += $p->nhif;
            $tdeduct += $p->deductible;

            $name = $p->first_name.' '.$p->last_name;
            $account_no = '=T("'.$p->bank_account_no.'")';

            echo  $name.','.$p->bank_name.','.$p->branch_name.','.$p->branch_code.','.$account_no.','.$p->net_salary.''.PHP_EOL;
            $x++;
        }
    }
    
    public function current_advances_pdf () {
        $this->permission_check('payroll_view');
        $this->data['page'] = 'Advances List';

        $this->data['current_payroll'] = $this->Payroll_Model->current_advance();

        $this->load->library('pdf');
        $html = $this->load->view('payroll/current_advance_pdf', $this->data, true);
        $this->pdf->createPDF($html, 'current_advance', false, 'A4', 'potrait');
    }
    
    public function current_advances_excel () {
        $this->permission_check('payroll_view');
        $this->data['page'] = 'Advances List';

        $current_payroll = $this->Payroll_Model->current_advance();

        $period = 'Advances_'.$_SESSION['payroll_month'].'-'.$_SESSION['payroll_year'];

        header('Content-type: text/csv');
        header('Content-disposition: attachment;filename='.$period.'.csv');

        echo "MALINDI PREMIER SCHOOL".PHP_EOL;
        echo $period." ".PHP_EOL;
        echo "Staff, Bank, Branch, Branch Code, Account Number, Net Salary".PHP_EOL;

        $x= 1;
        $tbasic = $tallow = $tgross = $tnssf = $tnhif = $tdeduct = $tnet = 0;
        foreach($current_payroll as $p) {

            $name = $p->first_name.' '.$p->last_name;
            $account_no = '=T("'.$p->bank_account_no.'")';

            echo  $name.','.$p->bank_name.','.$p->branch_name.','.$p->branch_code.','.$account_no.','.$p->advance_amount.''.PHP_EOL;
            $x++;
        }
    }








    function calculatetax($amount1){
        $totaltax = 0;
        $amount = $amount1 - 200;
        if($amount <= 13686){
            $totaltax = 0;
        }elseif($amount > 13686 && $amount <= 23885){
            $balance = $amount - 12298;
            $totaltax = 0.1 * 12298 + 0.15 * $balance;
        }elseif($amount > 23885 && $amount <= 35472){
            $bal1 = $bal2 = $bal3 = 0;
            $bal1 = 12298;
            $bal2 = 11587;
            $bal3 = $amount - 23885;
            $totaltax = (0.1 * $bal1) + (0.15 * $bal2) + (0.2 * $bal3);
        }elseif($amount > 35472 && $amount <= 47059){
            $bal1 = 12298;
            $bal2 = 11587;
            $bal3 = 11587;
            $bal4 = $amount - 35472;
            $totaltax = (0.1 * $bal1) + (0.15 * $bal2) + (0.2 * $bal3) + (0.25 * $bal4);
        }
        else{
            $bal1 = 12298;
            $bal2 = 11587;
            $bal3 = 11587;
            $bal4 = 11587;
            $bal5 = $amount - 47059;
            $totaltax = (0.1 * $bal1) + (0.15 * $bal2) + (0.2 * $bal3) + (0.25 * $bal4) + (0.3 * $bal5);
            //$totaltax=$amount*0.3;
        }
        return  $totaltax;
    }

    function nhif_charge($amount){
        $total=0;
        if($amount<=5999){
            $total=150;
        }
        elseif ($amount>5999 && $amount<=7999){
            $total=300;
        }
        elseif ($amount>7999 && $amount<=11999){
            $total=400;
        }
        elseif ($amount>11999 && $amount<=14999){
            $total=500;
        }
        elseif ($amount>14999 && $amount<=19999){
            $total=600;
        }
        elseif ($amount>19999 && $amount<=24999){
            $total=750;
        }
        elseif ($amount>24999 && $amount<=29999){
            $total=850;
        }
        elseif ($amount>29999 && $amount<=34999){
            $total=900;
        }
        elseif ($amount>34999 && $amount<=39999){
            $total=950;
        }
        elseif ($amount>39999 && $amount<=44999){
            $total=1000;
        }
        elseif ($amount>44999 && $amount<=49999){
            $total=1100;
        }
        elseif ($amount>49999 && $amount<=59999){
            $total=1200;
        }
        elseif ($amount>59999 && $amount<=69999){
            $total=1300;
        }
        elseif ($amount>69999 && $amount<=79999){
            $total=1400;
        }
        elseif ($amount>79999 && $amount<=89999){
            $total=1500;
        }
        elseif ($amount>89999 && $amount<=99999){
            $total=1600;
        }
        elseif ($amount>=100000){
            $total=1700;
        }
        return $total;
    }

    #delete payment start
    public function delete_payment($empID) {
        $this->permission_check('payroll_delete');

        $data = array( "employee_month_id" => $empID );
        $delete_data = $this->db->where('employee_month_id',$empID)->get('employee_month')->row();
        $ref = $delete_data->payroll_code;

        // delete also from vouchers
        $find = $this->db->where('voucher_code',$ref)->get('vouchers')->row();
        $total_salo =  $delete_data->net_salary;
        $total_nhif =  $delete_data->nhif;
        $total_nssf =  $delete_data->nssf;

        if($this->Deletes->delete_data('employee_month', $data)){

            // process voucher to delete
            // compare
            if($total_salo == $delete_data->voucher_amount) {
                // just delete the whole voucher because this was individual salary processing; plus nhif and nssf
                $this->db->where('voucher_code',$ref)->delete('vouchers');
            } else {
                // just reduce the voucher amount because this was bulk salary processing
                $this->db->query("UPDATE vouchers SET voucher_amount = voucher_amount - $total_salo WHERE voucher_code = '$ref' "); // reduce salary
                $this->db->query("UPDATE vouchers SET voucher_amount = voucher_amount - $total_nhif WHERE voucher_code = '$ref' "); // reduce nhif
                $this->db->query("UPDATE vouchers SET voucher_amount = voucher_amount - $total_nssf WHERE voucher_code = '$ref' "); // reduce nssf
            }

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "delete_salary",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'employee_month',
                'source_id' => $empID,
                'narrative' => json_encode($delete_data),
                'task' => json_encode($delete_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    } 

    public function delete_payment_advance($empID) {
        $this->permission_check('payroll_delete');

        $data = array( "employee_month_id" => $empID );
        $delete_data = $this->db->where('employee_month_id',$empID)->get('employee_month')->row();
        $ref = $delete_data->payroll_code;

        // delete also from vouchers
        $find = $this->db->where('voucher_code',$ref)->get('vouchers')->row();
        $total_salo =  $delete_data->advance_amount;

        if($this->Deletes->delete_data('employee_month', $data)){

            // process voucher to delete
            // compare
            if($total_salo == $delete_data->voucher_amount) {
                // just delete the whole voucher because this was individual salary processing
                $this->db->where('voucher_code',$ref)->delete('vouchers');
            } else {
                // just reduce the voucher amount because this was bulk salary processing
                $this->db->query("UPDATE vouchers SET voucher_amount = voucher_amount - $total_salo WHERE voucher_code = '$ref' ");
            }

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "delete_salary",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'employee_month',
                'source_id' => $empID,
                'narrative' => json_encode($delete_data),
                'task' => json_encode($delete_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    } 

    






}