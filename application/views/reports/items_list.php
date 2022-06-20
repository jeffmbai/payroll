<!DOCTYPE html>

<html lang="en">

<head>
  <title>Pambo Hotel Bar & Restaurant</title>

  <style>
    @media print {
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td {
           font-size: 20pt !important;
	  }
	  h1.entry-title {
	  font-size: 13px !important;
         }
}
  </style>

</head>

<body>

    <div class="">
        
  <div id="invoice-POS" style="border: 1px solid black;">
    
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2>Pambo Hotel Bar and Restaurant</h2>
        Item List
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    
    
    <div id="bot">

        <div id="table">
            <table style="width: 100%l">
                <tr class="tabletitle">
                    <th>No</th>
                    <th>Item</th>
                    <th>Buying Price</th>
                    <th>Marked Price</th>
                    <th>Tax Type</th>
                    <th>Unit</th>
                    <th>Brand</th>
                    <th></th>Narrative</th>
                </tr>

                <?php
                  $x = 1;
                  foreach($items as $item) {
                    ?>
                    <tr class="service">
                        <td class="tableitem"><p class="itemtext"><?php echo $x++;?></p></td>
                        <td class="tableitem"><p class="itemtext"><?php echo $item->item_name;?></p></td>
                        <td class="tableitem"><p class="itemtext"><?php echo $item->buying_price;?></p></td>
                        <td class="tableitem"><p class="itemtext"><?php echo $item->marked_price;?></p></td>
                        <td class="tableitem"><p class="itemtext"><?php echo $item->tax_type_name;?></p></td>
                        <td class="tableitem"><p class="itemtext"><?php echo $item->unit_name;?></p></td>
                        <td class="tableitem"><p class="itemtext"><?php echo $item->brand_name;?></p></td>
                        <td class="tableitem"><p class="itemtext"><?php echo $item->narrative;?></p></td>
                    </tr>
                    <?php
                }
                ?>

            </table>
        </div><!--End Table-->

        <div id="legalcopy">
            <p class="legal">
              <small>This file is system generated at <?php echo date('Y-m-d H:m:s');?> </small>
            </p>
        </div>

    </div><!--End InvoiceBot-->
  </div><!--End Invoice-->

    </div>

</body>
</html>