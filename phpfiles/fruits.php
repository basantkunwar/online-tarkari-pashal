<!-- HEADER -->
<?php include '../layoutfiles/header.php'; ?>
<style>
/* Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Body */
body {
  background: #fff;
  overflow-x: hidden;
}

/* Search Box */
.search-box {
  width: 100%;
  max-width: 500px;
  margin: 20px auto;
}

.search-box .form-control {
  border: 2px solid #dce7e7;
  border-radius: 6px;
}

<!-- PRODUCT SECTION -->
<style>
/* Product Section */
.product-section {
  padding: 50px 0;
  background: #f3fff3;
}

.product-card img {
  height: 180px;
  object-fit: cover;
  border-radius: 8px;
}

.product-card {
  transition: 0.3s;
  border-radius: 12px;
}

.product-card:hover {
  transform: translateY(-6px);
  box-shadow: 0px 8px 20px rgba(0,0,0,0.15);
}
</style>

<section class="product-section py-5">
  <h2 class="text-center text-dark display-4 fw-bold mb-4">
    our available fruits
  </h2>

  <div class="container">
    <div class="row g-4">

      <?php
      include 'db_connect.php';

      $query = "SELECT * FROM products WHERE catogary = 'fruit'";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0):
        while($fruit = mysqli_fetch_assoc($result)):
      ?>

      <div class="col-md-4 col-sm-6">
        <div class="card product-card p-3 h-100">

          <!-- IMAGE -->
          <a href="product-details.php?id=<?= $fruit['id']; ?>">
            <img src="../images/<?= $fruit['image']; ?>" 
                 alt="<?= $fruit['name']; ?>" 
                 class="img-fluid w-100">
          </a>

          <!-- NAME -->
          <a href="product-details.php?id=<?= $fruit['id']; ?>" 
             class="text-decoration-none text-dark">
            <h5 class="mt-3"><?= $fruit['name']; ?></h5>
          </a>

          <!-- PRICE -->
          <p class="text-success fw-semibold">
            Rs. <?= $fruit['price']; ?>
          </p>

          <!-- QUANTITY + CART -->
          <div class="d-flex justify-content-between align-items-center mt-auto">

            <div class="d-flex align-items-center gap-2 quantity-box">
              <button class="btn btn-outline-success btn-sm qty-minus">−</button>
              <span class="qty-value fw-bold" style="min-width:30px; text-align:center;">1</span>
              <button class="btn btn-outline-success btn-sm qty-plus">+</button>
            </div>

            <button class="btn btn-success add-to-cart"
              data-name="<?= $fruit['name']; ?>"
              data-price="<?= $fruit['price']; ?>">
              Add to Cart
            </button>

          </div>

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

<!-- FOOTER -->
<?php include '../layoutfiles/footer.php'; ?>

</body>
</html>
