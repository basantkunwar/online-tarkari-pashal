<?php
include 'db_connect.php';

/* ---------- TRACK ID FROM URL ---------- */
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Product not found");
}
$id = (int) $_GET['id'];

/* ---------- FETCH EXISTING PRODUCT ---------- */
$result = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
if (mysqli_num_rows($result) == 0) {
    die("Product does not exist");
}
$product = mysqli_fetch_assoc($result);

/* ---------- UPDATE PRODUCT ---------- */
if (isset($_POST['update'])) {

    $name  = $_POST['name'];
    $price = $_POST['price'];
    $cato  = $_POST['category'];

    // IMAGE HANDLING
    if (!empty($_FILES['img']['name'])) {
        $image = $_FILES['img']['name'];
        $tmp   = $_FILES['img']['tmp_name'];
        move_uploaded_file($tmp, "../images/" . $image);

        $sql = "UPDATE products 
                SET name='$name',
                    price='$price',
                    catogary='$cato',
                    image='$image'
                WHERE id=$id";
    } else {
        // keep old image
        $sql = "UPDATE products 
                SET name='$name',
                    price='$price',
                    catogary='$cato'
                WHERE id=$id";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: d_view_product.php");
        exit();
    } else {
        echo "Product not updated";
    }
}
?>
<?php include '../layoutfiles/d_head.php'; ?>
<?php include '../layoutfiles/d_header.php'; ?>


<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-7">

      <div class="card shadow">
        <div class="card-header bg-success text-white">
          <h4 class="mb-0">Update Product</h4>
        </div>

        <div class="card-body">

          <!-- FORM -->
          <form method="POST" enctype="multipart/form-data">

            <!-- NAME -->
            <div class="mb-3">
              <label class="form-label">Product Name</label>
              <input type="text" name="name"
                     value="<?php echo $product['name']; ?>"
                     class="form-control" required>
            </div>

            <!-- PRICE -->
            <div class="mb-3">
              <label class="form-label">Product Price</label>
              <input type="number" name="price"
                     value="<?php echo $product['price']; ?>"
                     class="form-control" required>
            </div>

            <!-- CATEGORY -->
            <div class="mb-3">
              <label class="form-label">Category</label>
              <select name="category" class="form-select" required>
                <option value="vegetable" <?= $product['catogary']=="vegetable"?"selected":"" ?>>Vegetable</option>
                <option value="fruit" <?= $product['catogary']=="fruit"?"selected":"" ?>>Fruit</option>
                <option value="non_vegetable" <?= $product['catogary']=="non_vegetable"?"selected":"" ?>>Non-Vegetable</option>
                <option value="non_vegetable" <?= $product['catogary']=="nepalishag"?"selected":"" ?>>nepalishag</option>
              </select>
            </div>

            <!-- IMAGE -->
            <div class="mb-3">
              <label class="form-label">Product Image</label>
              <input type="file" name="img" class="form-control">
              <small class="text-muted">Leave empty to keep old image</small>
            </div>

            <!-- CURRENT IMAGE -->
            <div class="mb-3">
              <img src="../images/<?php echo $product['image']; ?>" width="120">
            </div>

            <!-- BUTTON -->
            <div class="text-end">
              <button name="update" class="btn btn-success px-4">
                Update Product
              </button>
            </div>

          </form>

        </div>
      </div>

    </div>
  </div>
</div>

</body>
</html>

<?php include '../layoutfiles/d_footer.php'; ?>
<?php include '../layoutfiles/d_foot.php'; ?>