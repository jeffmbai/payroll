<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pettycash extends MY_Controller
{

    public $role;
    public $username;
    var $data;

    function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION['userrole']) || !isset($_SESSION['username'])) {
            //session is not set. cancel back to login page
            redirect(site_url('pages/logout'));
        } else {
            #echo "Success";
            $this->role = $_SESSION['userrole'];
            $this->username = $this->session->userdata('username');

            $this->load->model('Majorselects');
            $this->load->model('Accounting_Model', 'accounting');
            $this->load->model('Pettycash_Model', 'pettycash');

            $this->data['active_user'] = $this->Majorselects->get_user();
        }
    }

    public function home()
    {
        $this->permission_check('pettycash_view');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Petty Cash';

        $this->data['my_requests'] = $this->pettycash->my_pettycash();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('pettycash/home', $this->data);
        $this->load->view('inc/footer');
    }

    public function new_pettycash()
    {
        $this->permission_check('pettycash_add');

        date_default_timezone_set('Africa/Nairobi');
        $reference = date('YmdHis');

        $form_data = array(
            "org_id"    => $_SESSION['orgid'],
            // "term_id"   => $_SESSION['termid'],
            "entity_id"   => $_SESSION['userid'],
            "status_id"   => 3,
            "reference"   => $reference,
            "account_id"    => trim($this->input->post('account_id')),
            "department_id"    => trim($this->input->post('department_id')),
            "pettycash_amount"    => trim($this->input->post('pettycash_amount')),
            "pettycash_date"    => trim($this->input->post('pettycash_date')),
            "narrative"    => trim($this->input->post('narrative')),
        );
        if ($this->db->insert('petty_cash', $form_data)) {

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "add_pettycash",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "' . gethostname() . '" , "os" : "' . php_uname() . '" }',
                'source' => 'petty_cash',
                'source_id' => $this->db->insert_id(),
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Request successfully saved. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('pettycash/home', 'refresh');
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            // redirect('pettycash/home', 'refresh');
        }
    }


    public function update_pettycash($id)
    {
        $this->permission_check('pettycash_edit');

        $form_data = array(
            "org_id"    => $_SESSION['orgid'],
            // "term_id"   => $_SESSION['termid'],
            "entity_id"   => $_SESSION['userid'],

            "account_id"    => trim($this->input->post('account_id')),
            "department_id"    => trim($this->input->post('department_id')),
            "pettycash_amount"    => trim($this->input->post('pettycash_amount')),
            "pettycash_date"    => trim($this->input->post('pettycash_date')),
            "narrative"    => trim($this->input->post('narrative')),
        );
        if ($this->db->update('petty_cash', $form_data, array('id' => $id))) {

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "update_pettycash",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "' . gethostname() . '" , "os" : "' . php_uname() . '" }',
                'source' => 'petty_cash',
                'source_id' => $id,
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Request successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('pettycash/home', 'refresh');
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('pettycash/home', 'refresh');
        }
    }

    public function delete($id)
    {

        $form_data = $this->db->where('id', $id)->get('petty_cash')->row();
        if ($this->db->delete("petty_cash", array("id" => $id))) {
            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "delete_pettycash",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "' . gethostname() . '" , "os" : "' . php_uname() . '" }',
                'source' => 'petty_cash',
                'source_id' => $id,
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Success! Request deleted.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('pettycash/home'));
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Failed! Try again later.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('pettycash/home'));
        }
    }

    public function delete2($id)
    {

        $form_data = $this->db->where('id', $id)->get('petty_cash')->row();
        if ($this->db->delete("petty_cash", array("id" => $id))) {
            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "delete_pettycash",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "' . gethostname() . '" , "os" : "' . php_uname() . '" }',
                'source' => 'petty_cash',
                'source_id' => $id,
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Success! Request deleted.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('pettycash/requests'));
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Failed! Try again later.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('pettycash/requests'));
        }
    }

    public function get_request()
    {
        $id = $_POST['id'];
        $dt = $this->db->where('id', $id)->get('petty_cash')->row();

?>
        <div class="row">
            <form action="<?php echo site_url('pettycash/update_pettycash/' . $id); ?>" method="post">
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <label for="">Type <span class="text text-danger">*</span> </label>
                        <select name="account_id" class="select2 form-control" required tabindex="-1">
                            <option value="">~Select Type~</option>
                            <?php
                            $expense_types = $this->db->where(" account_type_id = 3 AND narrative <> 'Supplier Account' ")->get('accounts')->result();
                            foreach ($expense_types as $expenseT) {
                            ?>
                                <option value="<?php echo $expenseT->account_id; ?>" <?php if ($expenseT->account_id == $dt->account_id) echo 'selected'; ?>> <?php echo $expenseT->account_name; ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12 col-sm-12" style="display: block;">
                        <label for="">Department <span class="text text-danger">*</span> </label>
                        <select name="department_id" class="select2 form-control" required tabindex="-1">
                            <option value="">~Select Department~</option>
                            <?php
                            $departments = $this->db->get('departments')->result();
                            foreach ($departments as $dep) {
                            ?>
                                <option value="<?php echo $dep->department_id; ?>" <?php if ($dep->department_id == $dt->department_id) echo 'selected'; ?>> <?php echo $dep->department_name; ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <label for="">Amount <span class="text text-danger">*</span> </label>
                        <input type="number" name="pettycash_amount" class="form-control" value="<?= $dt->pettycash_amount ?>" required />
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <label for="">Date <span class="text text-danger">*</span> </label>
                        <input type="date" name="pettycash_date" class="form-control" value="<?php echo $dt->pettycash_date; ?>" required />
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <label for="">Narrative </label>
                        <textarea name="narrative" id="" class="form-control"> <?= $dt->narrative ?> </textarea>
                    </div>

                </div>

                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                    <button type="Submit" class="btn btn-primary pull-right">Update</button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                </div>

            </form>
        </div>
    <?php
    }

    public function requests()
    {
        $this->permission_check('pettycash_approve');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Petty Cash List';

        $this->data['requests'] = $this->pettycash->all_pettycash();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('pettycash/requests', $this->data);
        $this->load->view('inc/footer');
    }

    public function view_request()
    {
        $id = $_POST['id'];
        $dt = $this->pettycash->this_pettycash($id);

    ?>
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-striped table-condensed">
                    <tbody>
                        <tr>
                            <td>Name: <?= $dt->firstname . ' ' . $dt->secondname . ' ' . $dt->lastname ?> </td>
                            <td>Phone: <?= $dt->phone ?> </td>
                            <td>Email: <?= $dt->email ?> </td>
                        </tr>
                        <tr>
                            <td>Department: <?= $dt->department_name ?> </td>
                            <td>Status: <?= $dt->status_name ?> </td>
                            <td>Amount: <?= number_format($dt->pettycash_amount) ?> </td>
                        </tr>
                        <tr>
                            <td>Date: <?= $dt->pettycash_date ?> </td>
                            <td>Account: <?= $dt->account_name ?> </td>
                            <td>Narrative: <?= $dt->narrative ?> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <?php if ($dt->status_id != 1) { ?>
            <div class="row">
                <form action="<?php echo site_url('pettycash/approve_pettycash/' . $id); ?>" method="post">
                    <div class="row">

                        <div class="col-md-12 col-sm-12" style="display: block;">
                            <label for="">Status <span class="text text-danger">*</span> </label>
                            <select name="status_id" class="select2 form-control" required tabindex="-1">
                                <option value="">~Select Status~</option>
                                <?php
                                $status = $this->db->get('status')->result();
                                foreach ($status as $st) {
                                    if ($st->status_id == 1) continue;
                                ?>
                                    <option value="<?php echo $st->status_id; ?>" <?php if ($st->status_id == $dt->status_id) echo 'selected'; ?>> <?php echo $st->status_name; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                    </div>

                    <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                        <button type="Submit" class="btn btn-primary pull-right">Update</button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                    </div>

                </form>
            </div>
        <?php } else {
        ?>
            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
            <button type="button" class="btn btn-rgd" onclick="window.open('<?= site_url('pettycash/payment_voucher/' . $id) ?>','Print','width=1000')">Print <i class="fa fa-print"></i></button>
        <?php
        } ?>

    <?php
    }

    public function approve_pettycash($id)
    {
        $statusID = $this->input->post('status_id');
        if ($statusID == 2) {
            $form_data = array("status_id"    => $statusID, "approvedby_one" => $_SESSION['userid']);
        } else {
            $form_data = array("status_id"    => $statusID);
        }

        if ($this->db->update('petty_cash', $form_data, array('id' => $id))) {

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "update_pettycash_status",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "' . gethostname() . '" , "os" : "' . php_uname() . '" }',
                'source' => 'petty_cash',
                'source_id' => $id,
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Request approval status successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('pettycash/requests', 'refresh');
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('pettycash/requests', 'refresh');
        }
    }

    public function initiate_pay()
    {
        $id = $_POST['id'];
        $dt = $this->pettycash->this_pettycash($id);

    ?>

        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-striped table-condensed">
                    <tbody>
                        <tr>
                            <td>Name: <?= $dt->firstname . ' ' . $dt->secondname . ' ' . $dt->lastname ?> </td>
                            <td>Phone: <?= $dt->phone ?> </td>
                            <td>Email: <?= $dt->email ?> </td>
                        </tr>
                        <tr>
                            <td>Department: <?= $dt->department_name ?> </td>
                            <td>Status: <?= $dt->status_name ?> </td>
                            <td>Amount: <?= number_format($dt->pettycash_amount) ?> </td>
                        </tr>
                        <tr>
                            <td>Date: <?= $dt->pettycash_date ?> </td>
                            <td>Account: <?= $dt->account_name ?> </td>
                            <td>Narrative: <?= $dt->narrative ?> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <form name="" action="<?php echo site_url('pettycash/release_pettycash') ?>" method="post">
            <input type="hidden" name="id" readonly value="<?= $id ?>" required />
            <div class="row">
                <div class="col-md-12">
                    <label>Payment Date *</label>
                    <input type="date" class="form-control" name="payment_date" value="<?= date('Y-m-d') ?>" required />
                </div>
                <div class="col-md-12">
                    <label>Account *</label>
                    <select class="select2 form-control" name="account_id" required>
                        <option value=""> Select paying account </option>
                        <?php
                        $accounts = $this->db->select('account_id, account_code, account_name, subaccount_type_name')->from('vw_accounts')->where('is_paymentmode', 1)->get()->result();
                        foreach ($accounts as $acc) {
                        ?>
                            <option value="<?= $acc->account_id ?>"> <?= $acc->account_name ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-12">
                    <label>Amount *</label>
                    <input type="number" step="0.01" class="form-control" name="amount" value="<?= $dt->pettycash_amount ?>" required />
                </div>

                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                    <button type="Submit" class="btn btn-primary pull-right">Submit</button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                </div>

            </div>
        </form>
<?php
    }

    public function release_pettycash()
    {
        $this->permission_check('pettycash_approve');
        $id = $_POST['id'];
        $dt = $this->pettycash->this_pettycash($id);
        $expense_account = $dt->account_id;
        $pettycash_amount = $dt->pettycash_amount;
        $paying_amount = $_POST['amount'];
        $paying_account = $_POST['account_id'];
        $payment_date = $_POST['payment_date'];

        $expense_acc = $this->db->where('account_id', $expense_account)->get('accounts')->row();
        $paying_acc = $this->db->where('account_id', $paying_account)->get('accounts')->row();

        // update the pettycash details
        // then do the journal entries
        $form_data = array(
            "status_id" => 1,
            "paid_by" => $_SESSION['userid']
        );
        if ($this->db->update("petty_cash", $form_data, array("id" => $id))) {
            // successfully updated

            $drcr = array(
                array( // dr expense account
                    "org_id" => $_SESSION['orgid'],
                    "account_id" => $expense_acc->account_id,
                    "account_code" => $expense_acc->account_code,
                    "account_type_id" => $expense_acc->account_type_id,
                    "subaccount_type_id" => $expense_acc->subaccount_type_id,
                    "fiscal_year_id" => $_SESSION['fiscalyearid'],
                    "term_id" => $_SESSION['termid'],
                    "table_id" => $id,
                    "table_name" => 'petty_cash',
                    "voucher_code" => $dt->reference,
                    "voucher_amount" => $paying_amount,
                    "voucher_type"  => 'dr',
                    "transaction_date" => $payment_date,
                    "created_by" => $_SESSION['userid'],
                    "approved_by" => $_SESSION['userid'],
                    "narrative" => 'Petty Cash: ' . $dt->narrative,
                ),
                array( // cr expense account
                    "org_id" => $_SESSION['orgid'],
                    "account_id" => $expense_acc->account_id,
                    "account_code" => $expense_acc->account_code,
                    "account_type_id" => $expense_acc->account_type_id,
                    "subaccount_type_id" => $expense_acc->subaccount_type_id,
                    "fiscal_year_id" => $_SESSION['fiscalyearid'],
                    "term_id" => $_SESSION['termid'],
                    "table_id" => $id,
                    "table_name" => 'petty_cash',
                    "voucher_code" => $dt->reference,
                    "voucher_amount" => $paying_amount,
                    "voucher_type"  => 'cr',
                    "transaction_date" => $payment_date,
                    "created_by" => $_SESSION['userid'],
                    "approved_by" => $_SESSION['userid'],
                    "narrative" => 'Petty Cash: ' . $dt->narrative,
                ),
                array( // cr paying account
                    "org_id" => $_SESSION['orgid'],
                    "account_id" => $paying_acc->account_id,
                    "account_code" => $paying_acc->account_code,
                    "account_type_id" => $paying_acc->account_type_id,
                    "subaccount_type_id" => $paying_acc->subaccount_type_id,
                    "fiscal_year_id" => $_SESSION['fiscalyearid'],
                    "term_id" => $_SESSION['termid'],
                    "table_id" => $id,
                    "table_name" => 'petty_cash',
                    "voucher_code" => $dt->reference,
                    "voucher_amount" => $paying_amount,
                    "voucher_type"  => 'cr',
                    "transaction_date" => $payment_date,
                    "created_by" => $_SESSION['userid'],
                    "approved_by" => $_SESSION['userid'],
                    "narrative" => 'Petty Cash: ' . $dt->narrative,
                ),
            );
            if ($this->db->insert_batch('vouchers', $drcr)) {
                // success

                #Trail Start
                date_default_timezone_set('Africa/Nairobi');
                $trail = array(
                    'event_name' => "pay_pettycash",
                    'operator' => $_SESSION['userid'],
                    'username' => $_SESSION['username'],
                    'computer' => '{"hostname" : "' . gethostname() . '" , "os" : "' . php_uname() . '" }',
                    'source' => 'petty_cash',
                    'source_id' => $id,
                    'narrative' => json_encode($form_data),
                    'task' => json_encode($drcr),
                    "start_time" => date('Y-m-d H:m:s')
                );
                $this->db->insert('sys_logs', $trail);
                //Trail End

                $this->session->set_flashdata('alert', '<div class="alert alert-success">Payment successfully released. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect('pettycash/requests', 'refresh');
            } else {
                // failed
                $form_data = array(
                    "status_id" => 2,
                    "paid_by" => null
                );
                $this->db->update("petty_cash", $form_data, array("id" => $id));

                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect('pettycash/requests', 'refresh');
            }
        }
    }

    public function payment_voucher($id)
    {
        $this->data['page'] = 'Payment Voucher';

        $this->data['details'] = $this->pettycash->this_pettycash($id);

        $this->load->view('pettycash/payment_voucher', $this->data);
    }
}
