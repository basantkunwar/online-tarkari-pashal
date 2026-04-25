<?php include '../layoutfiles/d_head.php'; ?>
<?php include '../layoutfiles/d_header.php'; ?>

<?php
include 'db_connect.php';

/* DELETE PRODUCT */
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id='$id'");
    header("Location: all_products.php");
}

/* FETCH PRODUCTS */
$sql = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<div class="container-fluid px-4 py-4">

    <!-- PAGE TITLE -->
    <h2 class="text-center fw-bold text-success mb-4">
        🛒 All Products
    </h2>

    <!-- TABLE -->
    <div class="table-responsive shadow rounded">
        <table class="table table-bordered table-hover align-middle bg-white">
            <thead class="table-success text-center">
                <tr>
                    <th>sn</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody class="text-center">
                <?php
                $sn = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <?php  echo "<td>".$sn++."</td>";?>

                    <td>
                        <img src="../images/<?= $row['image']; ?>"
                             width="60" height="60"
                             class="rounded border">
                    </td>

                    <td class="fw-semibold"><?= $row['name']; ?></td>

                    <td>
                        <span class="badge bg-primary">
                            <?= $row['catogary']; ?>
                        </span>
                    </td>

                    <td class="fw-bold text-success">
                 Rs <?= $row['price']; ?>/kg
                    </td>

                    

                    <td>
                        <!-- UPDATE -->
                        <a href="editproduct.php?id=<?php echo $row['id']; ?>" 
                           class="btn btn-success btn-sm mb-1">
                           edit
                        </a>

                        <!-- DELETE -->
                        <a href="deleteproduct.php?id=<?php echo $row['id']; ?>"
   onclick="return confirm('Are you sure?')"
   class="btn btn-danger">
   Delete
</a>
                
                        <!-- view -->
                        <a href=""
                         onclick="return confirm('view this product?');"
                           class="btn btn-info btn-sm mb-1">
                           view
                        </a>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo "<tr>
                            <td colspan='7' class='text-danger fw-bold'>
                                No data found
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layoutfiles/d_footer.php'; ?>
<?php include '../layoutfiles/d_foot.php'; ?>
