<?php
$discount = 0;
$order_id = $order_header->order_id;
$bill_no = $order_header->bill_no;
$customer_name = $order_header->customer_supplier_name;
$date_time = $order_header->date_time;
$service_charge = $order_header->service_charge;
$tax_charge = $order_header->tax_charge;
$net_amount = $order_header->net_amount;
$paid_amount = $order_header->paid_amount;
$paying_balance = $order_header->paying_balance;
$change_return = $order_header->change_return;
$discount = $order_header->discount;
$transaction_type_name = $order_header->transaction_type_name;
$paid_status = $order_header->paid_status;
$time_stamp = $order_header->time_stamp;
$cashier_name = $order_header->firstname . ' ' . $order_header->secondname;

$total_payments = $this->db->select_sum('payment_amount')->where('order_id', $order_id)->get('order_payments')->row('payment_amount');

$org = $this->db->where('org_id', 1)->get('orgs')->row();

if ($discount == 0 || $discount == '' || $discount == null) $discount = 0;
?>
<style>
  #invoice-POS {
    box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
    padding: 2mm;
    margin: 0 auto;
    width: 88mm;
    background: #FFF;


    ::selection {
      background: #f31544;
      color: #FFF;
    }

    ::moz-selection {
      background: #f31544;
      color: #FFF;
    }

    h1 {
      font-size: 1.5em;
      color: #222;
    }

    h2 {
      font-size: .9em;
    }

    h3 {
      font-size: 1.2em;
      font-weight: 300;
      line-height: 2em;
    }

    p {
      font-size: .7em;
      color: #666;
      line-height: 1.2em;
    }

    #top,
    #mid,
    #bot {
      /* Targets all id with 'col-' */
      border-bottom: 1px solid #EEE;
    }

    #top {
      min-height: 100px;
    }

    #mid {
      min-height: 80px;
    }

    #bot {
      min-height: 50px;
    }

    #top .logo {
      //float: left;
      height: 60px;
      width: 60px;
      background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
      background-size: 60px 60px;
    }

    .clientlogo {
      float: left;
      height: 60px;
      width: 60px;
      background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
      background-size: 60px 60px;
      border-radius: 50px;
    }

    .info {
      display: block;
      //float:left;
      margin-left: 0;
    }

    .title {
      float: right;
    }

    .title p {
      text-align: right;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    td {
      //padding: 5px 0 5px 15px;
      //border: 1px solid #EEE
    }

    .tabletitle {
      //padding: 5px;
      font-size: .5em;
      background: #EEE;
    }

    .service {
      border-bottom: 1px solid #EEE;
    }

    .item {
      width: 24mm;
    }

    .itemtext {
      font-size: .5em;
    }

    #legalcopy {
      margin-top: 5mm;
    }

  }
</style>
<div id="invoice-POS" onload="window.print()">

  <center id="top">
    <div class="logo"></div>
    <div class="info">
      <h2><?= $_SESSION['orgname'] ?></h2>
    </div>
    <!--End Info-->
  </center>
  <!--End InvoiceTop-->

  <div id="mid">
    <div class="info" style="text-align: center;">
      <p>
        <?= $org->box_number ?> <br>
        <?= $org->address ?> <br>
        Tel: <?= $org->phone ?><br>
        <?= $transaction_type_name; ?>
      </p>
      <p style="font-size: 15px;">
        Code: <?php echo $bill_no; ?> <br>
        Date: <?php echo $date_time; ?> <br>
        Cashier: <?php echo $cashier_name; ?> <br>
        Time: <?php echo $time_stamp; ?> <br>
        <?php echo $org->mpesa_details; ?> <br>
        Currency: KES <br>
      </p>

    </div>
  </div>
  <!--End Invoice Mid-->

  <div id="bot">

    <div id="table">
      <table style="width: 100%">
        <tr class="tabletitle">
          <td class="item"><b>Item</b></td>
          <td class="Hours"><b>Qty</b></td>
          <td class="Rate"><b>Subtotal</b></td>
        </tr>

        <?php
        $total = null;
        $tax = null;
        $till_no = $org->mpesa_details;
        foreach ($order_items as $item) {

          // find if this is editted sale
          if(isset($_SESSION['print_session']) && $item->print_session != $_SESSION['print_session'])
            continue;

          $total += $item->amount;
        ?>
          <tr class="service">
            <td class="tableitem">
              <p class="itemtext"><?=strtoupper($item->item_name) . '<br/><small>' . $item->barcode; ?></small></p>
            </td>
            <td class="tableitem right">
              <p class="itemtext"><?php echo $item->qty; ?></p>
            </td>
            <td class="tableitem right">
              <p class="itemtext"><?php echo number_format($item->rate, 2); ?></p>
            </td>

            <!-- <td class="tableitem"><p class="itemtext"><?php echo $item->item_name . ' - ' . $item->barcode; ?></p></td>
                          <td class="tableitem"><p class="itemtext"><?= $item->qty; ?></p></td>
                          <td class="tableitem"><p class="itemtext"><?= number_format($item->rate, 2); ?></p></td> -->
          </tr>
        <?php
        }
        ?>

        <tr class="tabletitle" hidden >
          <td colspan="2" class="Rate right" style="border-top: 1px solid grey">Tax</td>
          <td class="payment right" style="border-top: 1px solid grey"><b><?php echo number_format($tax_charge, 2); ?></b></td>
        </tr>

        <tr class="tabletitle">
          <td colspan="2" class="Rate right" style="border-top: 1px solid grey">Total</td>
          <td class="payment right" style="border-top: 1px solid grey"><b><?php echo number_format($total+$tax_charge, 2); ?></b></td>
        </tr>

        <tr class="tabletitle">
          <td colspan="2" class="Rate right">Amount Paid</td>
          <td class="payment right"><b><?= number_format($total_payments, 2); ?></b></td>
        </tr>

        <tr class="tabletitle">
          <td colspan="2" class="Rate right">Discount</td>
          <td class="payment right"><b><?php echo number_format($discount, 2); ?></b></td>
        </tr>

        <tr class="tabletitle">
          <td colspan="2" class="Rate right">Paying Balance</td>
          <td class="payment right"><b><?php echo number_format($paying_balance, 2); ?></b></td>
        </tr>

        <tr class="tabletitle">
          <td colspan="2" class="Rate right">Change Returned</td>
          <td class="payment right"><b><?php echo number_format($change_return, 2); ?></b></td>
        </tr>

      </table>
    </div>
    <!--End Table-->

    <div id="legalcopy">
      <p style="text-align: center !important">
        <strong>Thank you <?php echo $customer_name; ?> for your business!</strong> Always giving you the best.
        <br />
        <b>JiPOS</b>
      </p>
    </div>

  </div>
  <!--End InvoiceBot-->
</div>
<!--End Invoice-->

<?php
// unset session
if(isset($_SESSION['print_session'])) unset($_SESSION['print_session']);
?>

<script type="text/javascript">
  window.onload = function() {
    window.print();
  }
</script>