
  <style>
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
  </style>
</head>
<body>
  <div class="container">
    <div class="invoice mx-auto" style="max-width: 900px;">
      <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
          <h3 class="mb-0">Your Company</h3>
          <small class="text-muted">Street address · City · Country</small><br>
          <small class="text-muted">Phone: +88 0123 456 789 · Email: hello@example.com</small>
        </div>
        <div class="text-end">
          <h4 class="mb-0">INVOICE</h4>
          <small class="text-muted">#000<?php
            echo Order::get_last_id()+1;
          ?></small><br>
          <small class="text-muted">Issue date: <?= date("d-m-Y")?> </small>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-sm-6">
          <h6 class="mb-1">Bill To</h6>
          <!-- <input id="billTo" class="form-control form-control-sm" value="Customer Name"> -->
           <?php
              echo Customer::html_select("customer");
           ?>
          <textarea id="Address" class="form-control form-control-sm mt-2 billAddress" rows="2">Customer address line 1
            City, Country</textarea>
        </div>
        <div class="col-sm-6 text-sm-end">
          <h6 class="mb-1">Ship To</h6>
          <input id="shipTo" class="form-control form-control-sm" value="Customer Receiver (optional)">
          <textarea id="shipAddress" class="form-control form-control-sm mt-2 billAddress" rows="2">Shipping address</textarea>
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
              <th style="width: 15%;">Tax</th>
              <th style="width: 15%;">Discount</th>
              <th style="width: 15%;">Line Total</th>
              <th style="width: 10%;" class="no-print"> </th>
            </tr>

            <tr class="item-row">
              <td class="align-middle">1</td>
              <td>
                   <?php
                       echo Product::html_select("product");
                   ?>
              </td>
              <td><input type="number" min="0" step="1" class="form-control form-control-sm qty" value="1"></td>
              <td><input type="number" min="0" step="0.01" class="form-control form-control-sm price" value="100.00"></td>
              <td><input type="number" min="0" step="0.01" class="form-control form-control-sm tax" value="0"></td>
              <td><input type="number" min="0" step="0.01" class="form-control form-control-sm discount" value="0"></td>
              <td class="line-total align-middle">100.00</td>
              <td class="no-print text-end"><button class="btn btn-sm btn-outline-success add-row">Add</button></td>
            </tr>

          </thead>
          <tbody id="items">
           
          </tbody>
        </table>
      </div>

      <div class="d-flex justify-content-between align-items-center mb-3 no-print">
        <div>
          <button id="addRow" class="btn btn-sm btn-outline-primary">+ Add item</button>
          <button id="resetRows" class="btn btn-sm btn-outline-secondary">Reset</button>
        </div>
        <div class="text-end" style="min-width: 300px;">
          <div class="row g-2">
            <div class="col-6 text-muted">Subtotal</div>
            <div class="col-6 text-end fw-semibold" id="subtotal">100.00</div>

            <div class="col-6 text-muted">Tax (%)</div>
            <div class="col-6 text-end">
              <input id="taxPercent" type="number" min="0" step="0.01" class="form-control form-control-sm" value="0">
            </div>

            <div class="col-6 text-muted">Discount</div>
            <div class="col-6 text-end">
              <input id="discount" type="number" min="0" step="0.01" class="form-control form-control-sm" value="0">
            </div>

            <div class="col-6 text-muted">Shipping</div>
            <div class="col-6 text-end">
              <input id="shipping" type="number" min="0" step="0.01" class="form-control form-control-sm" value="0.00">
            </div>

            <div class="col-6 text-muted">Total</div>
            <div class="col-6 text-end fs-5 fw-bold" id="grandTotal">100.00</div>
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
   $(function(){
   
    $("#customer").on("change", function(){
      let customer_id =  $(this).val();
      //alert(customer_id);
      $.ajax({
        url:"<?=$base_url?>/api/customer/find",
        type:"GET",
        data:{id:customer_id},
        success:function(res){
          console.log("before json",res);
         let data = JSON.parse(res);
          console.log("after json",data);
          $(".billAddress").val(data.address);
        },
        error:function(err){
           console.log(err);
        }
      });




    });
    $("#product").on("change", function(){
      let product_id =  $(this).val();
      let product_name =  $(this).find("option:selected").text();
     
      //alert(customer_id);
      $.ajax({
        url:"<?=$base_url?>/api/product/find",
        type:"GET",
        data:{id:product_id},
        success:function(res){
         let data = JSON.parse(res);
          console.log("after json",data);
          $(".price").val(data.regular_price);
          $(".line-total").text(data.regular_price);
          $(".qty").val(1);
        },
        error:function(err){
           console.log(err);
        }
      });




    });

    $(".qty").on("change", function(){
      let val = $(this).val()
      let price =  $(".price").val();
      $(".line-total").text(price * val);
    });

    $(".add-row").on("click", function(){
      let product_name =  $("#product").find("option:selected").text();
      let qty = $(".qty").val()
      let price =  $(".price").val();
      let tax =  $(".tax").val();
      let discount =  $(".discount").val();
      let line_total = $(".line-total").text();
      let html=`
       <tr class="item-row">
              <td class="align-middle">1</td>
              <td><input type="text" class="form-control form-control-sm desc" value="${product_name}"></td>
              <td><input type="number" min="0" step="1" class="form-control form-control-sm " value="${qty}"></td>
              <td><input type="number" min="0" step="0.01" class="form-control form-control-sm " value="${price}"></td>
              <td><input type="number" min="0" step="0.01" class="form-control form-control-sm " value="${tax}"></td>
              <td><input type="number" min="0" step="0.01" class="form-control form-control-sm " value="${discount}"></td>
              <td class=" align-middle">${line_total}</td>
              <td class="no-print text-end"><button class="btn btn-sm btn-outline-danger remove-row">Remove</button></td>
            </tr>
      `;

      $("#items").append( html);
    })

    $(document).on("click",".remove-row", function(){
      $(this).closest("tr").remove();

    })  


   })



  </script>
