<style>
  /* Small visual tweaks */
  body {
    background: #f6f8fb;
    color: #212529;
    padding: 2rem;
  }

  .invoice {
    background: #fff;
    padding: 2rem;
    border-radius: .5rem;
    box-shadow: 0 6px 18px rgba(0, 0, 0, .06);
  }

  .table thead th {
    border-bottom: 2px solid #e9ecef;
  }

  .no-break {
    page-break-inside: avoid;
  }

  /* Print styles: hide controls that are not part of invoice */
  @media print {
    body {
      background: #fff;
      padding: 0;
    }

    .no-print {
      display: none !important;
    }

    .invoice {
      box-shadow: none;
      border: none;
      margin: 0;
      border-radius: 0;
    }
  }

  /* Make small inputs look nicer in table */
  .table input[type="number"],
  .table input[type="text"] {
    width: 100%;
    min-width: 0;
    box-shadow: none;
    border: none;
    background: transparent;
    padding: 0.25rem 0;
  }

  .table input:focus {
    outline: none;
  }
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
                                        echo Order::get_last_id() + 1;
                                        ?></small><br>
          <small class="text-muted">Issue date: <?= date("d-m-Y") ?> </small>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-sm-6">
          <h6 class="mb-1">Bill To</h6>
          <!-- <input id="billTo" class="form-control form-control-sm" value="Customer Name"> -->


          <?php
          echo Customer::html_select("customer");
          //  $customer= Customer::all();
          // $html="<select id='customer' name='customer'>";
          // foreach ( $customer as $key => $value) {
          //  $html.="<option value='$value->id'>$value->name</option>";
          // }

          // $html.="</select>";

          // echo $html;

          ?>
          <textarea id="Address" class="form-control form-control-sm mt-2 billAddress" rows="2">Customer address line 1
            City, Country</textarea>
        </div>
        <div class="col-sm-6 text-sm-end">
          <h6 class="mb-1">Ship To</h6>
          <input id="shipTo" class="form-control form-control-sm" value="Customer Receiver (optional)">
          <textarea id="shipAddress" class="form-control form-control-sm mt-2 billAddress shippingadd" rows="2">Shipping address</textarea>
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
              <td><input type="number" min="0" step="0.01" class="form-control form-control-sm  price" readonly value="100.00"></td>
              <td><input type="number" min="0" class="form-control form-control-sm tax" value="0"></td>
              <td><input type="number" min="0" class="form-control form-control-sm discount" value="0"></td>
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
          <button id="resetRows" class="btn btn-sm btn-outline-secondary">Reset</button>
        </div>
        <div class="text-end" style="min-width: 300px;">
          <div class="row g-2">
            <div class="col-6 text-muted">Subtotal</div>
            <div class="col-6 text-end fw-semibold" id="subtotal">100.00</div>

            <div class="col-6 text-muted">Tax (%)</div>
            <div class="col-6 text-end">
              <input id="taxPercent" type="number" class="form-control form-control-sm" value="0">
            </div>

            <div class="col-6 text-muted">Discount</div>
            <div class="col-6 text-end">
              <input id="discount" type="number" class="form-control form-control-sm" value="0">
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
          <button class="btn btn-success me-2" id="saveBtn">Save</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS bundle -->

  <script src="<?= $base_url ?>/js/cart2.js"></script>
  <script>
    $(function() {

      const cart = new Cart("order");
      printCart();

      $("#customer").on("change", function() {
        let customer_id = $(this).val();
        // alert(customer_id);
        $.ajax({
          url: "<?= $base_url ?>/api/customer/find",
          type: "GET",
          data: {
            id: customer_id
          },
          success: function(res) {
            //  console.log(res);
            let data = JSON.parse(res);
            $(".billAddress").val(data.customer.address);
          },
          error: function(err) {
            console.log(err);
          }
        });

        // $.ajax({
        //   url:"",
        //   type:"",
        //   data:{},
        //   success:function(res){

        //   },
        //   error:function(){

        //   }
        // });


      });
      $("#product").on("change", function() {
        let product_id = $(this).val();
        let product_name = $(this).find("option:selected").text();

        //alert(customer_id);
        $.ajax({
          url: "<?= $base_url ?>/api/product/find",
          type: "GET",
          data: {
            id: product_id
          },
          success: function(res) {
            let data = JSON.parse(res);
            console.log("after json", data);
            $(".price").val(data.regular_price);
            $(".line-total").text(data.regular_price);
            $(".qty").val(1);
          },
          error: function(err) {
            console.log(err);
          }
        });




      });

      $(document).on("change", ".tax, .discount, .qty ", function() {
        let qty = parseFloat($(".qty").val());
        let discount = parseFloat($(".discount").val());
        let tax = parseFloat($(".tax").val());
        let price = parseFloat($(".price").val());
        $(".line-total").text(Math.round((price * qty) + tax - discount));
      });

      $(".add-row").on("click", function() {
        let product_id = $("#product").val();
        let product_name = $("#product").find("option:selected").text();
        let qty = parseFloat($(".qty").val());
        let price = $(".price").val();
        let tax = $(".tax").val();
        let discount = $(".discount").val();
        let line_total = $(".line-total").text();

        let data = {
          id: product_id,
          name: product_name,
          qty: qty,
          price: price,
          tax: tax,
          discount: discount,
          line_total: line_total
        }
        cart.AddItem(data);
        printCart();
      })

      $(document).on("click", ".remove-row", function() {
        let id = $(this).data("id");
        //console.log(id);
        cart.delItem(id);
        printCart();

      })


      function printCart() {
        let data = cart.getData();

        let html = "";
        let tax = 0;
        let total = 0;
        let subtotal = 0
        let discount = 0;
        data.forEach((element, i) => {
          tax += parseFloat(element.tax);
          discount += parseFloat(element.discount);
          let linetotal = (parseFloat(element.qty) * parseFloat(element.price)) + parseFloat(element.tax) - parseFloat(element.discount);
          total += linetotal;
          subtotal += (parseFloat(element.qty) * parseFloat(element.price));
          html += `
         <tr class="item-row">
              <td class="align-middle">${++i}</td>
              <td><input type="text" class="form-control form-control-sm desc" value="${element.name}"></td>
              <td><input type="number" min="0" step="1" class="form-control form-control-sm "readonly value="${element.qty}"></td>
              <td><input type="number" min="0" step="0.01" class="form-control form-control-sm " readonly value="${element.price}"></td>
              <td><input type="number" min="0" step="0.01" class="form-control form-control-sm " readonly value="${element.tax}"></td>
              <td><input type="number" min="0" step="0.01" class="form-control form-control-sm " readonly value="${element.discount}"></td>
              <td class=" align-middle">${linetotal}</td>
              <td class="no-print text-end"><button class="btn btn-sm btn-outline-danger remove-row " data-id="${element.id}">Remove</button></td>
          </tr>
        
        
        `;

        });

        $("#items").html(html);
        $("#subtotal").text();
        $("#taxPercent").val(tax);
        $("#discount").val(discount);
        $("#subtotal").text(subtotal);
        $("#grandTotal").text(total);

      }

      $("#resetRows").on("click", function() {
        cart.clearItem();
        printCart();
      });


      $("#saveBtn").on("click", function() {
        let customer_id = $("#customer").val();
        let shipppingadd = $(".shippingadd").val();
        let order_total = $("#grandTotal").text();
        let vat = $("#taxPercent").val();
        let discount = $("#discount").val();
        let remark = $("#notes").text();
        let products = cart.getData();

        let data = {
          customer_id: customer_id,
          order_total: order_total,
          shipping_address: shipppingadd,
          vat,
          discount,
          remark,
          products
        }


        $.ajax({
          url: "<?= $base_url ?>/api/order/order_save",
          type: "POST",
          data: {
            data: data
          },
          success: function(res) {
            let data = JSON.parse(res)
            if (data.success) {
              console.log(data);
              Toastify({

                text: "Order succes",
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "center",
                duration: 2000,
                style: {
                  background: "linear-gradient(to right, #00b09b, #96c93d)",
                }


              }).showToast();


              // cart.clearItem();
              // printCart();
              // location.reload()
            }


          },
          error: function(err) {
            console.log(err);
          }
        });

      })

    })

    //  localStorage.setItem("name", "Rashedul");
    //  console.log(localStorage.getItem("name"));
    //  localStorage.removeItem("name");
    //  localStorage.clear();
  </script>