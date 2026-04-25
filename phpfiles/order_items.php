 <?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    die("User not logged in");
}

$user_id = (int) $_SESSION['user_id'];

/* ---------- Get all cart items for this user ---------- */
$cart_sql = "SELECT product_id, rate, quantity FROM cart_items WHERE user_id = $user_id";
$cart_result = mysqli_query($conn, $cart_sql);

if (!$cart_result || mysqli_num_rows($cart_result) == 0) {
    die("No items in cart to place order.");
}

/* ---------- 2. Get last inserted order ID ---------- */
$order_id = mysqli_insert_id($conn);

$grand_total = 0;

while ($item = mysqli_fetch_assoc($cart_result)) {
    $product_id = (int) $item['product_id'];
    $rate       = (float) $item['rate'];
    $quantity   = (int) $item['quantity'];
    $total      = $rate * $quantity;

    $insert_sql = "INSERT INTO order_items (order_id, product_id, rate, quantity, price)
                   VALUES ($order_id, $product_id, $rate, $quantity, $total)";

    if (mysqli_query($conn, $insert_sql)) {
        die("Insert error for product ID $product_id: " . mysqli_error($conn));
    }

    $grand_total += $total;
}

/* ---------- 4. Update orders.total ---------- */
mysqli_query($conn, "UPDATE orders SET total=$grand_total WHERE id=$order_id");

/* ---------- 5. Clear cart ---------- */
mysqli_query($conn, "DELETE FROM cart_items WHERE user_id = $user_id");

/* ---------- Redirect to index ---------- */
header("Location: index.php");
exit;
?> 
