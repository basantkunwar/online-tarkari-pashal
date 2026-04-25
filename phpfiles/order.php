<?php
session_start();
include 'db_connect.php';

/* ---------- Check login ---------- */
if (!isset($_SESSION['user_id'])) {
    die("User not logged in");
}

$user = (int) $_SESSION['user_id'];

/* ---------- Calculate total cart amount ---------- */
$order_total_sql = "SELECT SUM(total) AS total 
                    FROM cart_items 
                    WHERE user_id = $user";
$order_result = mysqli_query($conn, $order_total_sql);

if (!$order_result) {
    die("Cart total query failed: " . mysqli_error($conn));
}

$order_row = mysqli_fetch_assoc($order_result);
$grand_total = (float) ($order_row['total'] ?? 0);

/* ---------- Insert order ---------- */
if ($grand_total > 0) {

    $timespan = date("Y-m-d H:i:s");
    $status   = 'pending';

    $order_insert = "INSERT INTO orders (user_id, total, timespan, status)
                     VALUES ($user, $grand_total, '$timespan', '$status')";

    if (mysqli_query($conn, $order_insert)) {

        /* ✅ VERY IMPORTANT: clear cart after order */
       // mysqli_query($conn, "DELETE FROM cart_items WHERE user_id = $user");

    header("location:index.php");

    } else {
        echo "Order Insert Error: " . mysqli_error($conn);
    }

} else {
     header("location:index.php");
}
?>
