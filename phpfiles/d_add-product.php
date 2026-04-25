<?php
include 'db_connect.php';

$name  = $_POST["name"];
$price = $_POST["price"];
$cato  = $_POST["category"];

// IMAGE HANDLING
$image_name = $_FILES["img"]["name"];
$tmp_name   = $_FILES["img"]["tmp_name"];
$folder     = "../images/" . $image_name;

// Move image to images folder
move_uploaded_file($tmp_name, $folder);

// INSERT QUERY
$sql = "INSERT INTO products ( name, price, catogary, image)
        VALUES ( '$name', '$price', '$cato', '$image_name')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../phpfiles/d_add_new.php");
    exit();
} else {
    echo "error: " . mysqli_error($conn);
}
?>
