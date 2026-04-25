<?php
session_start();
include 'db_connect.php';

/* ---------- Check login ---------- */
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Please login first!');
            window.location.href = '../login.html';
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
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .checkout-container {
            margin: 40px auto;
            max-width: 1200px;
        }
        .bill-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .btn-checkout {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container checkout-container">
    <div class="row g-4">
        <!-- ---------- USER INFO FORM ---------- -->
        <div class="col-md-5">
            <div class="form-container">
                <h4 class="mb-3">👤 Your Information</h4>
                <form action="info_checkout.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone"  required>
                    </div>

                    <div class="mb-3">
                        <label for="card" class="form-label">Card Number</label>
                        <input type="text" class="form-control" id="card" name="card" placeholder="1234 5678 9012 3456" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-checkout">submit</button>
                </form>
            </div>
        </div>

        <!-- ---------- BILL / INVOICE ---------- -->
        <div class="col-md-7">
            <div class="bill-container">
                <h4 class="mb-3">🧾 Your Bill</h4>
                <table class="table table-bordered">
                    <thead class="table-success">
                        <tr>
                            <th>SN</th>
                            <th>Product Name</th>
                            <th>Rate (Rs.)</th>
                            <th>Quantity</th>
                            <th>Total (Rs.)</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($cart_items)) {
                        $sn = 1;
                        foreach ($cart_items as $item) { ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                                <td><?php echo number_format($item['rate'], 2); ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td><?php echo number_format($item['total'], 2); ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="5" class="text-center">Your cart is empty</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-end">Grand Total</th>
                            <th>Rs. <?php echo number_format($grand_total, 2); ?></th>
                        </tr>
                    </tfoot>
                </table>
                <form action="order.php" class="d-flex justify-content-center ">
                    <button type="submit" class="btn btn-success px-3 mx-5">checkout</button>
                    <a href="index.php"><button class="btn btn-success mx-5">back to home</button></a>
               
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
