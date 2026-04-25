<?php
session_start();
include 'db_connect.php';

/* ---------- Check login ---------- */
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Please login first!');
            window.location.href = 'login.html';
          </script>";
    exit;
}

$user_id = (int) $_SESSION['user_id'];

/* ---------- Fetch cart items for this user ---------- */
$sql = "SELECT c.id, p.name AS product_name, c.rate, c.quantity, c.total
        FROM cart_items c
        JOIN products p ON c.product_id = p.id
        WHERE c.user_id = $user_id";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Cart fetch failed: " . mysqli_error($conn));
}

/* ---------- Calculate grand total ---------- */
$grand_total = 0;
$cart_items = [];
while ($row = mysqli_fetch_assoc($result)) {
    $grand_total += $row['total'];
    $cart_items[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Invoice</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #f4f6f9;
    }

    .bill-container {
        max-width: 800px; /* 🔥 Bigger */
        margin: 40px auto;
        padding: 25px;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 0 12px rgba(0,0,0,0.08);
    }

    .bill-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .bill-header h3 {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .table {
        border-radius: 8px;
        overflow: hidden;
    }

    .table thead {
        background-color: #198754;
        color: #fff;
    }

    .table th, .table td {
        padding: 10px;
        text-align: center;
    }

    .table tbody tr:hover {
        background-color: #f2f2f2;
    }

    .table tfoot {
        background-color: #f8f9fa;
        font-weight: bold;
    }
</style>
</head>

<body>

<div class="bill-container">

    <!-- HEADER -->
    <div class="bill-header">
        <h3>🧾 Invoice</h3>
        <small><?php echo date("Y-m-d H:i"); ?></small>
    </div>

    <!-- TABLE -->
    <table class="table table-bordered table-hover">

        <thead>
            <tr>
                <th>SN</th>
                <th>Product</th>
                <th>Rate (Rs)</th>
                <th>Qty</th>
                <th>Total (Rs)</th>
            </tr>
        </thead>

        <tbody>
        <?php if (!empty($cart_items)) {
            $sn = 1;
            foreach ($cart_items as $item) { ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                    <td><?php echo number_format($item['rate'], 2); ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo number_format($item['total'], 2); ?></td>
                </tr>
        <?php } } else { ?>
            <tr>
                <td colspan="5">Cart Empty</td>
            </tr>
        <?php } ?>
        </tbody>

        <tfoot>
            <tr>
                <td colspan="4" class="text-end">Grand Total</td>
                <td>Rs. <?php echo number_format($grand_total, 2); ?></td>
            </tr>
        </tfoot>

    </table>

    <!-- BUTTON -->
    <div class="text-center mt-4">
        <a href="checout.php">
            <button class="btn btn-success px-4">Proceed to Pay</button>
        </a>
    </div>

</div>

</body>
</html>