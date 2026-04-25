
<div class="container-fluid">
  <div class="row">

    <!-- 🔹 SIDEBAR -->
    <div class="col-md-2 sidebar p-3">
      <h4 class="text-white text-center mb-4">Admin Panel</h4>

      <ul class="nav flex-column gap-2">

  <!-- Dashboard -->
  <li class="nav-item">
    <a class="nav-link text-white" href="../phpfiles/dashboard.php">
      <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
  </li>

<li class="nav-item">
    <a class="nav-link text-white" href="../phpfiles/d_order.php">
      <i class="bi bi-people  me-2"></i> order
    </a>
  </li>

  <!-- Products Dropdown -->
  <li class="nav-item">
    <a class="nav-link text-white d-flex justify-content-between align-items-center"
       data-bs-toggle="collapse"
       href="#productMenu"
       role="button"
       aria-expanded="false">
      <span>
        <i class="bi bi-box-seam me-2"></i> Products
      </span>
      <i class="bi bi-chevron-down"></i>
    </a>

    <div class="collapse ps-4" id="productMenu">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="../phpfiles/d_add_new.php">add product</a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="../phpfiles/d_view_product.php">view product</a>
        </li>
       
      </ul>
    </div>
  </li>

  <!-- Users -->
  <li class="nav-item">
    <a class="nav-link text-white" href="../phpfiles/featch.php">
      <i class="bi bi-people me-2"></i> Users
    </a>
  </li>

 
  <!-- Settings -->
  <li class="nav-item">
    <a class="nav-link text-white" href="edit_profile.php">
      <i class="bi bi-gear me-2"></i> Settings
    </a>
  </li>

  

</ul>

    </div>

    <!-- 🔹 MAIN CONTENT -->
    <div class="col-md-10 p-0">

      <!-- 🔸 HEADER -->
      <div class="d-flex justify-content-between align-items-center p-3 bg-white shadow-sm">
        <h5 class="mb-0">Dashboard</h5>
        <a href="../phpfiles/index.php" class="btn btn-success">
          <i class="bi bi-arrow-left"></i> Back to Home
        </a>
      </div>

      <!-- 🔸 STAT CARDS -->
      <div class="container mt-4">