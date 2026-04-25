<?php
session_start();
include 'db_connect.php';

/* ---------- Allow POST only ---------- */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../index.php");
    exit;
}

/* ---------- Check if user is logged in ---------- */
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Please login first!');
            window.location.href = 'login.html';
          </script>";
    exit;
}

/* ---------- Validate POST data ---------- */
if (
    !isset($_POST['product_id']) ||
    !isset($_POST['rate']) ||
    !isset($_POST['quantity'])
) {
    die("Invalid cart request");
}

$user_id    = (int) $_SESSION['user_id'];
$product_id = (int) $_POST['product_id'];
$rate       = (float) $_POST['rate'];
$quantity   = (int) $_POST['quantity'];

if ($product_id <= 0 || $quantity <= 0) {
    die("Invalid product or quantity");
}

$total = $rate * $quantity;

/* ---------- Check if product exists ---------- */
$checkProduct = mysqli_query($conn, "SELECT id FROM products WHERE id=$product_id");
if (mysqli_num_rows($checkProduct) == 0) {
    die("Product not found");
}

/* ---------- Check if product already in cart ---------- */
$check = "SELECT id, quantity FROM cart_items 
          WHERE user_id=$user_id AND product_id=$product_id";
$result = mysqli_query($conn, $check);

if (!$result) {
    die("DB Error: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {

    /* ---------- Update quantity ---------- */
    $row = mysqli_fetch_assoc($result);
    $new_qty   = $row['quantity'] + $quantity;
    $new_total = $rate * $new_qty;

    $update_sql = "UPDATE cart_items 
                   SET quantity=$new_qty, total=$new_total 
                   WHERE id=" . $row['id'];

    mysqli_query($conn, $update_sql);

} else {

    /* ---------- Insert new item ---------- */
    $insert_sql = "INSERT INTO cart_items(user_id, product_id, rate, quantity, total)
                   VALUES($user_id, $product_id, $rate, $quantity, $total)";

    mysqli_query($conn, $insert_sql);
}

/* ---------- Redirect ---------- */
header("Location: ./all_product.php");
exit;
