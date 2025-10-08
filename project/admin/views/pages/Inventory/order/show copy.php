
  <!-- <style>
    /* Small visual tweaks */
    body { background: #f6f8fb; color: #212529; padding: 2rem; }
    .invoice { background: #fff; padding: 2rem; border-radius: .5rem; box-shadow: 0 6px 18px rgba(0,0,0,.06);}
    

    .table thead th { border-bottom: 2px solid #e9ecef; }
    .no-break { page-break-inside: avoid; }
    /* Print styles: hide controls that are not part of invoice */
    @media print {
       body { background: #fff; padding: 0; }
      .no-print { display: none !important; }
      .invoice { box-shadow: none; border: none; margin: 0; border-radius: 0; }
    }
    /* Make small inputs look nicer in table */
    .table input[type="number"], .table input[type="text"] {
      width: 100%;
      min-width: 0;
      box-shadow: none;
      border: none;
      background: transparent;
      padding: 0.25rem 0;
    }
    .table input:focus { outline: none; }


    
  </style> -->

  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice Print Test</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f6f8fb;
      color: #212529;
      padding: 2rem;
    }
    .invoice {
      background: #fff;
      padding: 2rem;
      border-radius: .5rem;
      box-shadow: 0 0 10px rgba(0,0,0,.1);
    }
    @media print {
      * {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        color-adjust: exact !important;
      }
      html, body {
        background: #fff !important;
        color: #000 !important;
        height: auto !important;
        overflow: visible !important;
        padding: 0 !important;
        margin: 0 !important;
      }
      .no-print {
        display: none !important;
      }
      .invoice {
        background: #fff !important;
        color: #000 !important;
        box-shadow: none !important;
        border: none !important;
        margin: 0 !important;
        width: 100% !important;
        transform: none !important;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="invoice mx-auto" style="max-width: 900px;">
      <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
          <h3 class="mb-0">PHP BATCH66</h3>
          <small class="text-muted">Dhaka Dhanmondi</small><br>
          <small class="text-muted">Phone: +88 0123 456 789 · Email: hello@example.com</small>
        </div>
        <div class="text-end">
          <h4 class="mb-0">INVOICE</h4>
          <small id="invoiceNumber" class="text-muted"> #000<?php
            echo $order->id;
          ?> </small><br>
          <small class="text-muted">Issue: <?php
           echo date("d-m-Y");
          ?></small>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-sm-6">
          <h6 class="mb-1">Bill To</h6>
          <?php
            $customer=  Customer::find($order->customer_id);
            
          ?>
          <input id="billTo" class="form-control form-control-sm" value="<?php echo $customer->name?>">
          <textarea id="billAddress" class="form-control form-control-sm mt-2" rows="2"><?php echo $customer->address?></textarea>
        </div>
        <div class="col-sm-6 text-sm-end">
          <h6 class="mb-1">Ship To</h6>
          <input id="shipTo" class="form-control form-control-sm" value="Customer Receiver (optional)">
          <textarea id="shipAddress" class="form-control form-control-sm mt-2" rows="2"><?php echo Customer::find($order->customer_id)->address?></textarea>
        </div>
      </div>

      <div class="table-responsive mb-3 no-break">
        <table class="table align-middle">
          <thead class="table-light">
            <tr>
              <th style="width: 5%;">#</th>
              <th style="width: 45%;">Description</th>
              <th style="width: 10%;">Qty</th>
              <th style="width: 15%;">Unit Price</th>
              <th style="width: 15%;">Line Total</th>
             
            </tr>
          </thead>
          <tbody id="items">

            <?php
             //echo $order->id;
            //   print_r(OrderDetail::find_all_by_order_id($order->id));
               $order_detials= OrderDetail::find_all_by_order_id($order->id);
               $count=1;
               $total=0;
               $tax=0;
              foreach ($order_detials as  $value) {
               $product_name = Product::find( $value['product_id']);
               $total_price= $value['price'] * $value['qty'];
               print_r( $product_name['name'] );
               echo "
               
                  <tr class=\"item-row\">

              <td class=\"align-middle\"> $count</td>
              <td><input type=\"text\" class=\"form-control form-control-sm desc\" value=\"{$product_name['name']}\"></td>
              <td><input type=\"number\" min=\"0\" step=\"1\" class=\"form-control form-control-sm qty\" value=\"{$value['qty']}\"></td>
              <td><input type=\"number\" min=\"0\" step=\"0.01\" class=\"form-control form-control-sm price\" value=\"{$value['price']}\"></td>
              <td class=\"line-total align-middle\">$total_price</td>
             
               
              
              </tr>
               
               
               
               

               ";
              $total+=$total_price;
              $tax+= $value['vat'];
               $count ++;

              }


            ?>


         
          </tbody>
        </table>
      </div>

      <div class="d-flex justify-content-between align-items-center mb-3 no-print">
        
        <div class="text-end" style="min-width: 300px;">
          <div class="row g-2">
            <div class="col-6 text-muted">Subtotal</div>
            <div class="col-6 text-end fw-semibold" id="subtotal"><?=$total?></div>

            <div class="col-6 text-muted">Tax (%)</div>
            <div class="col-6 text-end">
              <input id="taxPercent" type="number" min="0" step="0.01" class="form-control form-control-sm" value="<?= $tax?>">
            </div>

            <div class="col-6 text-muted">Discount</div>
            <div class="col-6 text-end">
              <input id="discount" type="number" min="0" step="0.01" class="form-control form-control-sm" value="<?= $total *.10?>">
            </div>

            <!-- <div class="col-6 text-muted">Shipping</div>
            <div class="col-6 text-end">
              <input id="shipping" type="number" min="0" step="0.01" class="form-control form-control-sm" value="0.00">
            </div> -->

            <div class="col-6 text-muted">Total</div>
            <div class="col-6 text-end fs-5 fw-bold" id="grandTotal"><?= ($total + $tax) - $total * .10 ?></div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <label class="form-label">Notes</label>
        <textarea id="notes" class="form-control" rows="3">Payment due within 14 days.</textarea>
      </div>

      <div class="d-flex justify-content-between align-items-center no-print">
        <div>
          <small class="text-muted">Bank: Your Bank · A/C: 000-000-000 · SWIFT: ABCDXX</small>
        </div>
        <div>
          <button class="btn btn-success me-2" id="printBtn">Print / Save PDF</button>
          <button class="btn btn-primary" id="downloadBtn">Download HTML</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS bundle -->


  <script>
      // Download HTML as file
    document.getElementById('downloadBtn').addEventListener('click', () => {
      const html = '<!doctype html>\\n' + document.documentElement.outerHTML;
      const blob = new Blob([html], { type: 'text/html' });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = (document.getElementById('invoiceNumber').value || 'invoice') + '.html';
      document.body.appendChild(a);
      a.click();
      a.remove();
      URL.revokeObjectURL(url);
    });

    //  document.getElementById('printBtn').addEventListener('click', () => {
    //   // set issue date default if blank
    //   window.print();
    // });

    document.getElementById('printBtn').addEventListener('click', () => {
  setTimeout(() => window.print(), 300); // small delay ensures rendering
});

  </script>
