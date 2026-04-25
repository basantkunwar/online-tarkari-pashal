<?php
session_start();
include 'db_connect.php';

if (isset($_POST['order_id'], $_POST['status'])) {

    $order_id = (int) $_POST['order_id'];
    $new_status = mysqli_real_escape_string($conn, $_POST['status']);

    // 🔍 Get current order info
    $check = mysqli_query($conn, "SELECT status, user_id FROM orders WHERE id = $order_id");

    if (!$check || mysqli_num_rows($check) == 0) {
        die("Order not found");
    }

    $row = mysqli_fetch_assoc($check);
    $current_status = $row['status'];
    $user_id = $row['user_id'];

    // ❌ Stop if already final
    if ($current_status == 'completed' || $current_status == 'cancelled') {
        header("Location: d_order.php");
        exit;
    }

    // ✅ Update status
    $sql = "UPDATE orders SET status = '$new_status' WHERE id = $order_id";

    if (mysqli_query($conn, $sql)) {

        // 🛒 Delete cart if completed or cancelled
        if ($new_status == 'completed' || $new_status == 'cancelled') {

            // 🔥 DELETE CART USING USER_ID (BEST FOR YOUR SYSTEM)
            mysqli_query($conn, "DELETE FROM cart_items WHERE user_id = '$user_id'");
        }

        header("Location: d_order.php");
        exit;

    } else {
        echo "Update failed: " . mysqli_error($conn);
    }
}
?>