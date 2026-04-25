<?php
session_start();
include 'db_connect.php';

// check login
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first!'); window.location='login.html';</script>";
    exit;
}

$user_id = $_SESSION['user_id'];

// get form data
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// update query
$sql = "UPDATE users 
        SET fullname='$fullname', 
            email='$email', 
            username='$username', 
            password='$password'
        WHERE sn='$user_id'";

if(mysqli_query($conn, $sql)){
    echo "<script>alert('Profile Updated Successfully'); window.location='index.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>