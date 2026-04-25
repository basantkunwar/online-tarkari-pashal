<?php
include 'db_connect.php';

if (!isset($_GET['id'])) {
    die("Product ID not found");
}

$delete = (int) $_GET['id'];   // FIX: ensure id is a number

$sql = "DELETE FROM products WHERE id = $delete";

if (mysqli_query($conn, $sql)) {
    header("Location: ./d_view_product.php");
    exit();
} else {
    echo "product is not deleted";
}
?>
