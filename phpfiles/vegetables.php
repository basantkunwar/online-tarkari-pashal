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
</head>

<body>

<!-- HEADER -->


<!-- PRODUCT SECTION -->
<section class="product-section py-5">
  <h2 class="text-center text-dark display-4 fw-bold mb-4">
    our available vagetables are
  </h2>

  <div class="container">
    <div class="row g-4">

      <?php
      include 'db_connect.php';

     ?>

<!-- FOOTER -->
<?php include '../layoutfiles/footer.php'; ?>

</body>
</html>
