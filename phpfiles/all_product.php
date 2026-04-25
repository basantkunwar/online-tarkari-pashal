
<?php include '../layoutfiles/header.php'; ?>



<!-- HEADER -->



<!-- PRODUCT SECTION -->

 <section class="product-section py-5">
  <h2 class="text-center text-dark display-4 fw-bold mb-4">
    our available products
  </h2>

  <div class="container">
    <div class="row g-4">

      <?php
      include 'db_connect.php';

      $query = "SELECT * FROM products";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0):
        while($product = mysqli_fetch_assoc($result)):
      ?>

      <div class="col-md-4 col-sm-6">
        <div class="card product-card p-3 h-100">

          <!-- IMAGE -->
          <a href="product-details.php?id=<?= $product ['id']; ?>">
            <img src="../images/<?=$product ['image']; ?>" 
                 alt="<?=$product ['name']; ?>" 
                 class="img-fluid w-100">
          </a>

          <!-- NAME -->
          <a href="product-details.php?id=<?=$product ['id']; ?>" 
             class="text-decoration-none text-dark">
            <h5 class="mt-3"><?=$product ['name']; ?></h5>
          </a>

          <!-- PRICE -->
          <p class="text-success fw-semibold">
            Rs. <?= $product ['price']; ?>
          </p>

          <!-- QUANTITY + CART -->
         <form action="../phpfiles/cart.php" method="POST" class="d-flex justify-content-between align-items-center mt-auto">

            <div class="d-flex align-items-center gap-2 quantity-box">
                <button type="button" class="btn btn-outline-success btn-sm qty-minus">−</button>
                <input type="text" name="quantity" value="1" class="qty-value fw-bold text-center" style="width:40px;">
                <button type="button" class="btn btn-outline-success btn-sm qty-plus">+</button>
            </div>

            <!-- Hidden fields to send product info -->
            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
            <input type="hidden" name="rate" value="<?= $product['price']; ?>">

            <button type="submit" class="btn btn-success">Add to Cart</button>
        </form>

        </div>
      </div>

      <?php
        endwhile;
      else:
        echo "<p class='text-center'>No products found</p>";
      endif;
      ?>

    </div>
  </div>
</section>
<script>
/* ---------- QUANTITY BUTTONS ---------- */
document.querySelectorAll('.quantity-box').forEach(box => {
    const minus = box.querySelector('.qty-minus');
    const plus = box.querySelector('.qty-plus');
    const input = box.querySelector('.qty-value');

    minus.addEventListener('click', () => {
        let val = parseInt(input.value);
        if(val > 1) input.value = val - 1;
    });

    plus.addEventListener('click', () => {
        let val = parseInt(input.value);
        input.value = val + 1;
    });
});
</script>

<!-- FOOTER -->
<?php include '../layoutfiles/footer.php'; ?>


