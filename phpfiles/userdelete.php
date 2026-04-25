<?php
include 'db_connect.php';

if (isset($_GET['sn'])) {
    $sn = $_GET['sn'];
$sql= "DELETE FROM users WHERE sn = $sn";
}
if(mysqli_query($conn,$sql)){
   header("Location: ./featch.php"); 
}
exit;
