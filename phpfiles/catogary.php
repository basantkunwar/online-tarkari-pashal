<?php 
include '../layoutfiles/header.php';
include 'db_connect.php';

if (!isset($_GET['type'])) {
    echo "<h3 class='text-danger text-center'>Category not found</h3>";
    exit;
}

$category = $_GET['type'];

// fetch products by category
$sql = "SELECT * FROM products WHERE catogary = '$category'";
$result = mysqli_query($conn, $sql);
?>
<div class="bg-white">
<div class="container py-5">
    <h2 class="text-center fw-bold text-success mb-4 text-capitalize">
        <?= str_replace('_', ' ', $category); ?> Products
    </h2>

    <div class="row g-4">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
<div class="col-md-4 col-sm-6">
    <div class="card product-card p-3 h-100">

        <!-- IMAGE -->
        <a href="product-details.php?id=<?= $row['id']; ?>">
            <img src="../images/<?= $row['image']; ?>" 
                 alt="<?= $row['name']; ?>" 
                 class="img-fluid w-100">
        </a>

        <!-- NAME -->
        <a href="product-details.php?id=<?= $row['id']; ?>" 
           class="text-decoration-none text-dark">
            <h5 class="mt-3"><?= $row['name']; ?></h5>
        </a>

        <!-- PRICE -->
        <p class="text-success fw-semibold">
            Rs. <?= $row['price']; ?>
        </p>

        <!-- QUANTITY + CART FORM -->
        <form action="../phpfiles/cart.php" method="POST" class="d-flex justify-content-between align-items-center mt-auto">

            <div class="d-flex align-items-center gap-2 quantity-box">
                <button type="button" class="btn btn-outline-success btn-sm qty-minus">−</button>
                <input type="text" name="quantity" value="1" class="qty-value fw-bold text-center" style="width:40px;">
                <button type="button" class="btn btn-outline-success btn-sm qty-plus">+</button>
            </div>

            <!-- Hidden fields to send product info -->
            <input type="hidden" name="product_id" value="<?= $row['id']; ?>">
            <input type="hidden" name="rate" value="<?= $row['price']; ?>">

            <button type="submit" class="btn btn-success">Add to Cart</button>
        </form>

    </div>
</div>

        <?php
            }
        } else {
            echo "<h4 class='text-center text-danger'>No products found</h4>";
        }
        ?>
    </div>
</div>
</div>

<?php include '../layoutfiles/footer.php'; ?>

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
