<div class="modal fade" id="billModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Your Bill</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

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

        <!-- CHECKOUT BUTTON -->
        <div class="text-end mt-3">
          <a href="../phpfiles/pay.php" class="btn btn-success px-4">
            Checkout
          </a>
        </div>

        

      </div>

    </div>
  </div>
</div>

<script>
let cart = [];

/* CLICK HANDLER */
document.addEventListener("click", function (e) {

  /* PRODUCT CARD + */
  if (e.target.classList.contains("qty-plus")) {
    const qty = e.target.previousElementSibling;
    qty.textContent = parseInt(qty.textContent) + 1;
  }

  /* PRODUCT CARD - */
  if (e.target.classList.contains("qty-minus")) {
    const qty = e.target.nextElementSibling;
    if (parseInt(qty.textContent) > 1) {
      qty.textContent = parseInt(qty.textContent) - 1;
    }
  }

  /* ADD TO CART */
  if (e.target.classList.contains("add-to-cart")) {
    const card = e.target.closest(".product-card");

    const name = e.target.dataset.name;
    const price = parseInt(e.target.dataset.price);
    const qty = parseInt(card.querySelector(".qty-value").textContent);

    const found = cart.find(item => item.name === name);

    if (found) {
      found.qty += qty;
    } else {
      cart.push({ name, price, qty });
    }

    alert(name + " added to cart ✅");
    renderBill();
  }

  /* BILL + */
  if (e.target.classList.contains("bill-plus")) {
    const index = e.target.dataset.index;
    cart[index].qty++;
    renderBill();
  }

  /* BILL - */
  if (e.target.classList.contains("bill-minus")) {
    const index = e.target.dataset.index;
    if (cart[index].qty > 1) {
      cart[index].qty--;
    }
    renderBill();
  }
});

/* RENDER BILL */
function renderBill() {
  const billItems = document.getElementById("billItems");
  const productsTotalEl = document.getElementById("productsTotal");
  const deliveryChargeEl = document.getElementById("deliveryCharge");
  const grandTotalEl = document.getElementById("grandTotal");

  billItems.innerHTML = "";
  let productsTotal = 0;

  cart.forEach((item, index) => {
    const total = item.qty * item.price;
    productsTotal += total;

    billItems.innerHTML += `
      <tr>
        <td>${item.name}</td>
        <td>
          <button class="btn btn-sm btn-outline-success bill-minus" data-index="${index}">−</button>
          <span class="mx-2 fw-bold">${item.qty}</span>
          <button class="btn btn-sm btn-outline-success bill-plus" data-index="${index}">+</button>
        </td>
        <td>Rs. ${item.price}</td>
        <td>Rs. ${total}</td>
      </tr>
    `;
  });

  /* DELIVERY = 4% */
  const deliveryCharge = Math.round(productsTotal * 0.04);
  const grandTotal = productsTotal + deliveryCharge;

  productsTotalEl.textContent = productsTotal;
  deliveryChargeEl.textContent = deliveryCharge;
  grandTotalEl.textContent = grandTotal;
}

/* OPEN BILL */
function openBill() {
  const modal = new bootstrap.Modal(document.getElementById("billModal"));
  modal.show();
}
</script>
