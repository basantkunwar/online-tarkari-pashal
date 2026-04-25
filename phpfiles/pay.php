<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
  <div class="row g-4">

    <!-- LEFT: ADDRESS -->
    <div class="col-md-6">
      <div class="card p-4 shadow-sm rounded-4 h-100">
        <h4 class="mb-4 text-success fw-bold">Delivery Address</h4>

        <input class="form-control mb-3" placeholder="Full Name">
        <input class="form-control mb-3" placeholder="Email">
        <input class="form-control mb-3" placeholder="Phone">
        <textarea class="form-control mb-3" rows="2" placeholder="Address"></textarea>
        <input class="form-control mb-3" placeholder="Citizenship Number">

        <button class="btn btn-success w-100">Submit</button>
      </div>
    </div>

    <!-- RIGHT: BILL (ALWAYS VISIBLE) -->
    <div class="col-md-6">
      <div class="card p-4 shadow-sm rounded-4 h-100">

        <h5 class="mb-3 fw-bold">Your Bill</h5>

        <table class="table align-middle">
          <thead>
            <tr>
              <th>Product</th>
              <th>Qty</th>
              <th>Price</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody id="billItems"></tbody>
        </table>

        <!-- BILL SUMMARY -->
        <div class="mt-3">
          <p class="d-flex justify-content-between">
            <span>Products Total:</span>
            <strong>Rs. <span id="productsTotal">0</span></strong>
          </p>

          <p class="d-flex justify-content-between">
            <span>Delivery Charge (4%):</span>
            <strong>Rs. <span id="deliveryCharge">0</span></strong>
          </p>

          <hr>

          <h5 class="d-flex justify-content-between text-success">
            <span>Grand Total:</span>
            <span>Rs. <span id="grandTotal">0</span></span>
          </h5>
        </div>

        <!-- CHECKOUT -->
        <div class="text-end mt-3">
          <a href="../phpfiles/pay.php" class="btn btn-success px-4">
            Checkout
          </a>
        </div>

      </div>
    </div>

  </div>
</div>

<
</body>
</html>
