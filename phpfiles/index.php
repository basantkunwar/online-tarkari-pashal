
  <!-- NAVBAR -->
  <?php include '../layoutfiles/header.php'; ?>
  <!-- HERO SECTION -->
   <div class="bg-white text-black">
 <div id="bgSlider" class="bg-slider d-flex align-items-center justify-content-center">
  <h2 class="text-white"></h2>
  
</div>
<section class="py-5 bg-light py-4 h-75">
  <div class="container">
    <div class="row align-items-center py-5 h-100">

      <!-- LEFT SIDE -->
      <div class="col-md-6 mb-4">
        <h3 class="fw-bold display-3 mb-3">Our Priority Products & Vision</h3>

        <p class="text-secondary">
          Our main priority products are locally produced by local farmers.
          We focus on healthy local products that are not easily found in the market
          but are very good for the human body. Our goal is to support farmers
          and provide fresh and natural food.
        </p>

        <button class="btn btn-success mt-2" data-toggle="collapse" data-target="#basant">
          View Products
        </button>
        <div id="basant" class="collapse">hyy shishir babu</div>
      </div>

      <!-- RIGHT SIDE -->
      <div class="col-lg-6 ">
        <div class="row g-4 rounded-8">

          <!-- Product 1 -->
          <div class="col-6">
            <div class="border rounded-8 p-3 text-center h-100">
              <img src="../images/shishnu.jpeg" class="img-fluid rounded mb-2" alt="Product">
              <p class="mb-0 fw-semibold">Local Vegetables</p>
            </div>
          </div>

          <!-- Product 2 -->
          <div class="col-6  ">
            <div class="border rounded-8 p-3 text-center h-100">
              <img src="https://i0.wp.com/kccrc.org/news/wp-content/uploads/2022/03/kafal.png?w=592&ssl=1" class="img-fluid rounded mb-2" alt="Product">
              <p class="mb-0 fw-semibold">Healthy Fruits</p>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
<section class="product-section py-5">
  <h2 class="text-center text-dark display-2 fw-bold mb-4">
    Our Available Products
  </h2>

  <div class="container position-relative">

    <!-- Slider buttons -->
    <button class="slider-btn prev">❮</button>
    <button class="slider-btn next">❯</button>

    <!-- Slider viewport -->
    <div class="slider-viewport" style="overflow:hidden;">

      <!-- Slider track: flex container that will slide -->
      <div class="slider-track d-flex">

        <?php
        include 'db_connect.php';
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0):
          while($product = mysqli_fetch_assoc($result)):
        ?>

        <!-- Each product card -->
        <div class="slider-item flex-shrink-0" style="width:250px; margin-right:10px;">
          <div class="card product-card p-2 h-100">

            <!-- IMAGE -->
            <a href="product-details.php?id=<?= $product['id']; ?>">
              <div class="ratio ratio-4x3">
                <img src="../images/<?= $product['image']; ?>" 
                     alt="<?= $product['name']; ?>" 
                     class="img-fluid w-100 rounded">
              </div>
            </a>

            <!-- NAME -->
            <a href="product-details.php?id=<?= $product['id']; ?>" 
               class="text-decoration-none text-dark">
              <h5 class="mt-2 fs-6"><?= $product['name']; ?></h5>
            </a>

            <!-- PRICE -->
            <p class="text-success fw-semibold small mb-2">
              Rs. <?= $product['price']; ?>
            </p>

            <!-- QUANTITY + CART FORM -->
            <form action="../phpfiles/cart.php" method="POST"
                  class="d-flex justify-content-between align-items-center mt-auto">
              <div class="d-flex align-items-center gap-1 quantity-box">
                <button type="button" class="btn btn-outline-success btn-sm qty-minus">−</button>
                <input type="text" name="quantity" value="1"
                       class="qty-value fw-bold text-center form-control form-control-sm"
                       style="width:45px;">
                <button type="button" class="btn btn-outline-success btn-sm qty-plus">+</button>
              </div>

              <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
              <input type="hidden" name="rate" value="<?= $product['price']; ?>">

              <button type="submit" class="btn btn-success btn-sm">
                Add to Cart
              </button>
            </form>

          </div>
        </div>

        <?php endwhile; endif; ?>

      </div>
    </div>
  </div>
</section>



<!-- CATEGORY SECTION -->
<section class="py-5 bg-light">
  <div class="container py-5">
    <h4 class="text-center fw-bold display-3 mb-4">Our Category</h4>

    <div class="row g-4 text-center">

      <!-- Category 1 -->
      <div class="col-6 my-4 col-md-3">
        <a href="catogary.php?type=vegetable" class="text-decoration-none text-dark">
          <div class="p-5 bg-white rounded shadow-sm category-box">
            <i class="bi bi-basket fs-2 text-success"></i>
            <h5 class="mt-3 fw-semibold">Vegetables</h5>
          </div>
        </a>
      </div>

      <!-- Category 2 -->
      <div class="col-6 col-md-3">
        <a href="catogary.php?type=fruit" class="text-decoration-none text-dark">
          <div class="p-5 bg-white rounded shadow-sm category-box">
            <i class="bi bi-apple fs-2 text-danger"></i>
            <h5 class="mt-3 fw-semibold">Fruits</h5>
          </div>
        </a>
      </div>

      <!-- Category 3 -->
      <div class="col-6 col-md-3">
        <a href="catogary.php?type=non_vegetable" class="text-decoration-none text-dark">
          <div class="p-5 bg-white rounded shadow-sm category-box">
            <i class="bi bi-egg-fried fs-2"></i>
            <h5 class="mt-3 fw-semibold">Non-Vegetable</h5>
          </div>
        </a>
      </div>

      <!-- Category 4 -->
      <div class="col-6 col-md-3">
        <a href="catogary.php?type=nepalishag" class="text-decoration-none text-dark">
          <div class="p-5 bg-white rounded shadow-sm category-box">
            <i class="bi bi-box-seam fs-2 text-warning">🌿 </i>
            <h5 class="mt-3 fw-semibold">Nepali Shag</h5>
          </div>
        </a>
      </div>

    </div>
  </div>
</section>



<section class="about-section py-5 mt-4">
  <div class="container">
    <div class="row align-items-center gy-4">

      <!-- LEFT SIDE: TEXT -->
      <div class="col-md-6 text-start">
        <h2 class="fw-bold display-3 mb-3">Fresh & Healthy Vegetables</h2>

        <p class="text-muted mb-3">
          We provide fresh, organic, and locally sourced vegetables directly
          from farmers to your home. Quality and health are our top priorities.
        </p>

        <p class="mb-4">
          Our mission is to make healthy food affordable and accessible
          for everyone.
        </p>

        <!-- Button -->
        <button class="btn btn-danger px-4">
          Learn More
        </button>
      </div>

      <!-- RIGHT SIDE: IMAGE -->
      <div class="col-md-6 text-center">
        <img 
          src="../images/healthy-vegetables-old-dark-background.jpg"
          class="img-fluid rounded shadow-sm"
          style="max-width: 300px; border-radius: 20px; border: 3px solid #28a745;"
          alt="Healthy Vegetables">
      </div>

    </div>
  </div>
</section>

<!-- AUTOMATIC SCROLLING PRODUCT SECTIONS --><section class="product-section bg-white py-5">
  <div class="container py-5">

    <h2 class="text-dark fw-bold text-center display-3 mb-4">
       Recommended & Latest Products
    </h2>

    <!-- Slider viewport -->
    <div class="slider-viewport position-relative">

      <!-- Slider track -->
      <div class="slider-track d-flex">

        <?php
        $recommended = [
          ["id"=>7,"name"=>"Lemon","img"=>"../images/lemon-juice.jpg","price"=>"80"],
          ["id"=>8,"name"=>"Carrot","img"=>"../images/carrot.jfif","price"=>"60"],
          ["id"=>9,"name"=>"Milk","img"=>"../images/milk-splashing-glass.webp","price"=>"120"],
          ["id"=>10,"name"=>"Cheese","img"=>"../images/cheese.jfif","price"=>"250"],
          // ["id"=>11,"name"=>"Tomato","img"=>"../images/tomato.jpg","price"=>"70"],
          // ["id"=>12,"name"=>"Potato","img"=>"../images/potato.jpg","price"=>"50"],
        ];
        ?>

        <?php foreach ($recommended as $prod): ?>
        <div class="slider-item flex-shrink-0" style="width:25%; padding:5px;">
          <div class="card product-card p-3 h-100 shadow-sm border-0">

            <!-- IMAGE -->
            <a href="product-details.php?id=<?= $prod['id']; ?>">
              <div class="ratio ratio-4x3">
                <img src="<?= $prod['img']; ?>" class="img-fluid rounded">
              </div>
            </a>

            <!-- NAME -->
            <a href="product-details.php?id=<?= $prod['id']; ?>" class="text-decoration-none text-dark">
              <h6 class="mt-2"><?= $prod['name']; ?></h6>
            </a>

            <!-- PRICE -->
            <p class="text-success fw-semibold small mb-2">Rs. <?= $prod['price']; ?></p>

            <!-- FORM -->
            <form action="../phpfiles/cart.php" method="POST" class="d-flex justify-content-between align-items-center mt-auto">

              <div class="d-flex align-items-center quantity-box gap-1">
                <button type="button" class="btn btn-outline-success btn-sm qty-minus">−</button>
                <input type="text" name="quantity" value="1" class="qty-value fw-bold text-center form-control form-control-sm" style="width:45px;">
                <button type="button" class="btn btn-outline-success btn-sm qty-plus">+</button>
              </div>

              <input type="hidden" name="product_id" value="<?= $prod['id']; ?>">
              <input type="hidden" name="rate" value="<?= $prod['price']; ?>">

              <button type="submit" class="btn btn-success btn-sm">Add</button>
            </form>

          </div>
        </div>
        <?php endforeach; ?>

      </div>

      <!-- Slider buttons -->
      <button class="slider-btn prev">❮</button>
      <button class="slider-btn next">❯</button>

    </div>
  </div>
</section>



<section class="about-section py-5 mt-4">
  <div class="container">
    <div class="row align-items-center gy-4">

      <!-- LEFT SIDE: IMAGE -->
      <div class="col-md-6 text-center">
        <img 
          src="../images/istockphoto-843649350-612x612.jpg"
          class="img-fluid shadow-sm"
          style="max-width: 80%; border-radius: 30px;" 
          alt="Healthy Vegetables">
      </div>

      <!-- RIGHT SIDE: TEXT -->
      <div class="col-md-6 text-start">
        <h2 class="fw-bold display-2 mb-3">Product Quality & Production System</h2>

        <p class="text-muted mb-3">
         Our products are carefully selected and monitored to ensure the highest standards
          of freshness, safety
         anic produce efficiently from farm to home.
        </p>

        <p class="mb-4">
          Our mission is to make healthy food affordable and accessible
          for everyone.
        </p>

        <!-- Button (bottom-left of text area) -->
        <button class="btn btn-success px-4">
          Learn More
        </button>
      </div>

    </div>
  </div>
</section>

      </div>


  <!-- FOOTER -->
  <?php include '../layoutfiles/footer.php' ?>


