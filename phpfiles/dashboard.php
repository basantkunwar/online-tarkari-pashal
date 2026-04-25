<?php
session_start();

/* only admin allowed */
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: index.html");
    exit();
}
?>
<?php include '../layoutfiles/d_head.php';?>
<?php include '../layoutfiles/d_header.php';?>
<?php
include 'db_connect.php';

$sql = "SELECT COUNT(id) AS totalproduct FROM  products";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$totalpro = $row['totalproduct'];
?>
<?php
$sql1 = "SELECT COUNT(email) AS totaluser FROM users";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);

$totalusers = $row1['totaluser'];
?>
<?php

$sql2="SELECT COUNT(catogary) as totalcato FROM products";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);

$totalcatogary=$row2['totalcato'];
?>


        <div class="row g-4">

          <!-- Products -->
          <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
              <i class="bi bi-box-seam fs-1 text-success"></i>
              <h4 class="mt-2"><?= $totalpro;?></h4>
              <p class="text-muted">total products</p>
            </div>
          </div>

          <!-- Users -->
          <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
              <i class="bi bi-people fs-1 text-primary"></i>
              <h4 class="mt-2"><?= $totalusers?></h4>
              <p class="text-muted">Total Users</p>
            </div>
          </div>

          <!-- Categories -->
         <div class="col-md-4">
  <div class="card shadow-sm text-center p-4">
    <i class="bi bi-tags fs-1 text-warning"></i>
    <h4 class="mt-2">4</h4>
   <button  class="btn btn-outline-warning btn-sm mt-2"
            data-bs-toggle="collapse"
            data-bs-target="#categoryList"> Categoriey
    </button>
 
   
  </div>
</div>

<?php include '../layoutfiles/d_footer.php';?>
<?php include '../layoutfiles/d_foot.php';?>
       
