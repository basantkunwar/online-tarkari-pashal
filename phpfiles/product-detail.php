<?php
include '../layoutfiles/header.php';

/* SAME PRODUCT DATA (must match list page) */
$vegetables = [
  ["id"=>1,"name"=>"Potato","img"=>"../images/bowl-with-potatoes-table.jpg","price"=>"50 / kg","desc"=>"Fresh local potatoes directly from farmers."],
  ["id"=>2,"name"=>"Onion","img"=>"../images/red-onion-whole-isolated-white.jpg","price"=>"70 / kg","desc"=>"Healthy red onions with strong flavor."],
  ["id"=>3,"name"=>"Cabbage","img"=>"../images/close-up-photo-green-fresh-cauliflower-grey-table.jpg","price"=>"60 / kg","desc"=>"Organic cabbage full of nutrients."],
  ["id"=>4,"name"=>"Cucumber","img"=>"../images/pexels-lo-422811-2329440.jpg","price"=>"50 / kg","desc"=>"Fresh green cucumbers, good for health."],
  ["id"=>5,"name"=>"Chicken","img"=>"../images/jk-sloan-9zLa37VNL38-unsplash.jpg","price"=>"350 / kg","desc"=>"Fresh local chicken, hygienically processed."],
  ["id"=>6,"name"=>"Sukuti","img"=>"../images/mayur-sable-jyrr5cYKwao-unsplash.jpg","price"=>"370 / kg","desc"=>"Traditional dried meat (Sukuti)."],
  
];

/* GET ID FROM URL */
$id = $_GET['id'] ?? 0;
$product = null;

foreach ($vegetables as $veg) {
  if ($veg['id'] == $id) {
    $product = $veg;
    break;
  }
}
?>
<div class="bg-white">
<div class="container py-5">

<?php if ($product): ?>

  <div class="row align-items-center g-5">

    <!-- PRODUCT IMAGE -->
    <div class="col-md-6 text-center">
      <img src="<?= $product['img']; ?>" class="img-fluid rounded shadow" style="max-width:350px;">
    </div>

    <!-- PRODUCT DETAILS -->
    <div class="col-md-6">
      <h2 class="fw-bold text-dark"><?= $product['name']; ?></h2>
      <h4 class="text-success my-3">Rs. <?= $product['price']; ?></h4>

      <p class="text-muted">
        <?= $product['desc']; ?>
      </p>

      <!-- QUANTITY -->
       <div class="d-flex justify-content-between align-items-center mt-auto">

            <div class="d-flex align-items-center gap-2 quantity-box">
              <button class="btn btn-outline-success btn-sm qty-minus">−</button>
              <span class="qty-value fw-bold" style="min-width:30px; text-align:center;">1</span>
              <button class="btn btn-outline-success btn-sm qty-plus">+</button>
            </div>

            <button class="btn btn-success add-to-cart"
              data-name="<?= $non_veg ['name']; ?>"
              data-price="<?=$non_veg ['price']; ?>">
              Add to Cart
            </button>

          </div>
    </div>

  </div>

<?php else: ?>
  <h3 class="text-center text-danger">Product not found!</h3>
<?php endif; ?>

</div>
</div>
<script>
let qty = 1;
function changeQty(val){
  qty += val;
  if(qty < 1) qty = 1;
  document.getElementById('qty').innerText = qty;
}
</script>
 <?php include '../layoutfiles/footer.php' ?>

