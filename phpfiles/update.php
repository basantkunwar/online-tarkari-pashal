<?php include '../layoutfiles/d_head.php';?>
<?php include '../layoutfiles/d_header.php';?>

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">

      <!-- CARD -->
      <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white">
          <h4 class="mb-0 fw-bold">➕ update Product</h4>
        </div>

        <div class="card-body p-4">

          <form action="editproduct.php" method="POST" enctype="multipart/form-data">

            <!-- PRODUCT NAME -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Product Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
            </div>

            <!-- PRODUCT PRICE -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Product Price (Rs)</label>
              <input type="number" name="price" class="form-control" placeholder="Enter price" required>
            </div>


            <!-- PRODUCT CATEGORY -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Product Category</label>
              <select name="category" class="form-select" required>
                <option value="">-- Select Category --</option>
                <option value="vegetable">Vegetable</option>
                <option value="vegetable">fruits</option>
                <option value="vegetable">nepalishag</option>
                <option value="non_vegetable">Non-Vegetable</option>
                <option value="fruit">Fruit</option>
              </select>
            </div>

            <!-- PRODUCT IMAGE -->
            <div class="mb-4">
              <label class="form-label fw-semibold">Product Image</label>
              <input type="file" name="img" class="form-control">
            </div>

            <!-- ADD BUTTON -->
            <div class="text-end">
              <button type="submit" class="btn btn-success px-4 fw-semibold">
                Add Product
              </button>
            </div>

          </form>



        </div>
      </div>

    </div>
  </div>
</div>


<?php include '../layoutfiles/d_footer.php';?>
<?php include '../layoutfiles/d_foot.php';?>