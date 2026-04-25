<?php
$username="root";
$password="";
$localhost="localhost";
$db_name="otp_project";
$conn=new mysqli($localhost,$username,$password,$db_name);
if($conn->connect_error){
  die("connection failed");
}
else{
echo"";
}

?>