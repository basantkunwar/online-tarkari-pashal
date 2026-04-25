<?php
session_start();
include 'db_connect.php'; // database connection

$username = $_POST['name'];
$password = $_POST['password'];

/* get user from database */
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $user = mysqli_fetch_assoc($result);

    /* save session */
    $_SESSION['user_id'] = $user['sn'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['name']=$user['username'];
    $_SESSION['fullname']=$user['fullname'];

    /* admin or user */
    if ($user['role'] == 'admin') {
        header("Location: ./dashboard.php");
    } else {
        header("Location:./index.php");
    }

} else {
    echo "Login failed";
}
?>
