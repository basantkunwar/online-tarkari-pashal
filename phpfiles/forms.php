<?php
include 'db_connect.php';

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$role='user';


$sql = "INSERT INTO users(fullname, email,username,password,role)
        VALUES('$fullname', '$email', '$username', '$password','$role')";

if(mysqli_query($conn, $sql)){
    header("Location: ./login.html");
    exit();
} else {
    echo "error";
}

?>