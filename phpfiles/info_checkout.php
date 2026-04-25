<?php
session_start();
include 'db_connect.php';
$name=$_POST['name'];
$address=$_POST['address'];
$num=$_POST['phone'];
$cartnum=$_POST['card'];
$user_id    = (int) $_SESSION['user_id'];

$sql="INSERT INTO costumer_details(user_id,fullname,address,phonenumber,cardnumber) 
VALUES('$user_id','$name','$address','$num','$cartnum') ";

if(mysqli_query($conn,$sql)){
    header("location:checout.php");
}
else{
    echo"
    <script>alert('sorry,please retry'):</script>
    ";
}
?>