<?php include '../layoutfiles/d_head.php'; ?>
<?php include '../layoutfiles/d_header.php'; ?>

<?php
session_start(); // ADDED

include 'db_connect.php';

/* ---------- Fetch all orders with user info ---------- */
$sql = "SELECT 
            orders.id,
            orders.total,
            orders.status,
            users.fullname,
            costumer_details.phonenumber,
            costumer_details.address,
            GROUP_CONCAT(products.name SEPARATOR ', ') AS items
        FROM orders
        JOIN users ON orders.user_id = users.sn
        LEFT JOIN costumer_details ON orders.user_id = costumer_details.user_id
        LEFT JOIN cart_items ON orders.user_id = cart_items.user_id
        LEFT JOIN products ON cart_items.product_id = products.id
        GROUP BY orders.id
        ORDER BY orders.id DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<div class="container-fluid px-4 py-4">

    <!-- PAGE TITLE -->
    <h2 class="text-center fw-bold text-success mb-4">
        📦 All Orders
    </h2>

    <!-- TABLE -->
    <div class="table-responsive shadow rounded">
        <table class="table table-bordered table-hover align-middle bg-white">
            <thead class="table-success text-center">
                <tr>
                    <th>SN</th>
                    <th>Username</th>
                    <th>Phone</th> <!-- ADDED -->
                    <th>Address</th> <!-- ADDED -->
                    <th>Items</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody class="text-center">
                <?php
                $sn = 1;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo htmlspecialchars($row['fullname']); ?></td>

                            <!-- ADDED -->
                            <td><?php echo htmlspecialchars($row['phonenumber']); ?></td>
                            <td><?php echo htmlspecialchars($row['address']); ?></td>
                            <td><?php echo htmlspecialchars($row['items']); ?></td>

                            <td>Rs. <?php echo number_format($row['total'], 2); ?></td>

                            <td>
                                <form method="post" action="status.php">
                                    <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">

                                    <select name="status" class="form-select form-select-sm"
                                            onchange="this.form.submit()"
                                            <?php 
                                            if ($row['status'] == 'completed' || $row['status'] == 'cancelled') {
                                                echo 'disabled';
                                            }
                                            ?>
                                    >

                                        <option value="pending"
                                            <?php if ($row['status'] == 'pending') echo 'selected'; ?>>
                                            Pending
                                        </option>

                                        <option value="processing"
                                            <?php if ($row['status'] == 'processing') echo 'selected'; ?>>
                                            Processing
                                        </option>

                                        <option value="completed"
                                            <?php if ($row['status'] == 'completed') echo 'selected'; ?>>
                                            Completed
                                        </option>

                                        <option value="cancelled"
                                            <?php if ($row['status'] == 'cancelled') echo 'selected'; ?>>
                                            Cancelled
                                        </option>

                                    </select>
                                </form>
                            </td>

                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='6'>No orders found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layoutfiles/d_footer.php'; ?>
<?php include '../layoutfiles/d_foot.php'; ?>