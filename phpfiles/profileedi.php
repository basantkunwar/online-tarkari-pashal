<?php
session_start();
include 'db_connect.php';

// Check login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_sn = $_SESSION['user_id'];

// Fetch logged-in user data
$sql = "SELECT * FROM users WHERE sn='$user_sn'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// Update profile
if (isset($_POST['update'])) {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $update_sql = "UPDATE users 
                   SET fullname='$fullname', 
                       email='$email', 
                       username='$username' 
                   WHERE sn='$user_id'";

    if (mysqli_query($conn, $update_sql)) {

        // Update session values also
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $username;

        echo "<script>alert('Profile Updated Successfully');</script>";
        header("Refresh:0");
    } else {
        echo "<script>alert('Update Failed');</script>";
    }
}
?>
