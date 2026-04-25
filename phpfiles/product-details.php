<?php
include '../layoutfiles/header.php';
include '../phpfiles/db_connect.php';

/* GET ID FROM URL */
$id = $_GET['id'] ?? 0;

/* FETCH PRODUCT FROM DATABASE */
$sql = "SELECT * FROM products WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);
?>

<div class="bg-white">
  <div class="container py-5">

    <?php if ($product): ?>

    <div class="row justify-content-center">

      <!-- PRODUCT CARD (small, like slider) -->
      <div class="col-lg-4 col-md-6">
        <div class="card p-3 h-100 shadow-sm">

          <!-- IMAGE -->
          <a href="product-details.php?id=<?= $product['id']; ?>">
            <div class="ratio ratio-4x3">
              <img src="../images/<?= $product['image']; ?>" 
                   class="img-fluid w-100 rounded">
            </div>
          </a>

          <!-- NAME -->
          <a href="product-details.php?id=<?= $product['id']; ?>" 
             class="text-decoration-none text-dark">
            <h5 class="mt-2 fs-6"><?= $product['name']; ?></h5>
          </a>

          <!-- PRICE -->
          <p class="text-success fw-semibold small mb-2">Rs. <?= $product['price']; ?></p>

          <!-- ADD TO CART FORM -->
          <form action="../phpfiles/cart.php" method="POST" class="d-flex justify-content-between align-items-center mt-auto">

            <!-- Quantity selector -->
            <div class="d-flex align-items-center gap-1">
              <button type="button" class="btn btn-outline-success btn-sm" id="minusBtn">−</button>
              <input type="text" name="quantity" value="1" id="qtyInput"
                     class="qty-value fw-bold text-center form-control form-control-sm"
                     style="width:45px;">
              <button type="button" class="btn btn-outline-success btn-sm" id="plusBtn">+</button>
            </div>

            <!-- Hidden fields -->
            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
            <input type="hidden" name="rate" value="<?= $product['price']; ?>">

            <!-- Add to cart button -->
            <button type="submit" class="btn btn-success btn-sm">Add to Cart</button>
          </form>

          <!-- Back button -->
          <a href="index.php" class="btn btn-outline-secondary btn-sm mt-2 w-100">Back to Products</a>

        </div>
      </div>

    </div>

    <?php else: ?>
      <h3 class="text-center text-danger">Product not found!</h3>
    <?php endif; ?>

  </div>
</div>

<script>
// Quantity logic
let qty = 1;
const qtyInput = document.getElementById('qtyInput');
document.getElementById('minusBtn').addEventListener('click', () => {
  qty--;
  if(qty < 1) qty = 1;
  qtyInput.value = qty;
});
document.getElementById('plusBtn').addEventListener('click', () => {
  qty++;
  qtyInput.value = qty;
});
</script>
  <?php include '../layoutfiles/footer.php' ?>