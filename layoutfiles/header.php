<!-- header.php -->
 <?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>online tarkari pashal</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  
  <style>
    .logo {
      width: 150px;
    }
  </style>
   <style>
    * { margin: 0;
       padding: 0;
        box-sizing: border-box; }

    body {
      background-color: white;
      color: black;
      overflow-x: hidden;
    }

    /* Hero Banner */

    .bg-slider {
  width: 100%;
  height: 300px;
  background-size: cover;
  background-position: center;
  transition: background-image 1s ease-in-out;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
      background-position: center;
      height: 80vh;
      margin: 0  14px 0 14px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      padding-left: 20px;
      padding-right: 20px;
    }

    .main_a1 {
      font-size: 40px;
      font-weight: bold;
      text-transform: capitalize;
      max-width: 350px;
    }

    /* Search */
    .search-box {
      margin: 20px auto;
      width: 100%;
      max-width: 500px;
    }

    .form-control:hover { background-color: #eefefe; }

    /* Product Card */
    .product-card {
      transition: 0.3s;
      border-radius: 14px;
    }

    .product-card:hover {
      transform: translateY(-7px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .product-card img {
      height: 180px;
      width: 100%;
      object-fit: cover;
      border-radius: 10px;
    }

    /* Know Section */
    .know {
      background-color: white;
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.08);
      width: 300px;
      padding: 20px;
      border-radius: 22px;
      transition: 0.3s;
      height: 70vh;
    }
    .know img{
      height: 180px;
      width: 100%;
      object-fit: cover;
      border-radius: 10px;
    }

    .know:hover { background-color: rgb(230, 225, 216); }

    .scrolling-wrapper {
  display: flex;
  gap: 1rem;
  overflow: hidden;
  padding: 1rem 0;
}

.scrolling-wrapper .product-card {
  min-width: 200px;
  flex: 0 0 auto;
}

/* Auto scroll animation */
.scrolling-wrapper {
  animation: scroll-left 20s linear infinite;
}

@keyframes scroll-left {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

/* Horizontal scroll on small devices */
.scrolling-wrapper {
  display: flex;
  gap: 1rem;
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  padding-bottom: 10px;
}

.product-card {
  min-width: 220px;
  scroll-snap-align: start;
  animation: fadeUp 0.6s ease forwards;
  opacity: 0;
}

/* One-by-one animation delay */
.product-card:nth-child(1) { animation-delay: 0.1s; }
.product-card:nth-child(2) { animation-delay: 0.2s; }
.product-card:nth-child(3) { animation-delay: 0.3s; }
.product-card:nth-child(4) { animation-delay: 0.4s; }
.product-card:nth-child(5) { animation-delay: 0.5s; }

/* Animation */
@keyframes fadeUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Grid on large screens */
@media (min-width: 992px) {
  .scrolling-wrapper {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    overflow-x: visible;
  }
}

.slider-wrapper {
  position: relative;
  height: 340px; /* adjust based on card height */
  overflow: hidden;
}

.slider-card {
  position: absolute;
  left: -100%;
  opacity: 0;
  transition: all 0.8s ease;
}

.slider-card.active {
  left: 0;
  opacity: 1;
}

.slider-card.exit {
  left: 100%;
  opacity: 0;
}





    footer a { color: white; text-decoration: none; }

.slider-viewport {
  overflow: hidden;
  position: relative;
}

.slider-track {
  display: flex;
  transition: transform 0.5s ease;
}

.slider-btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: black;
  color: white;
  border: none;
  font-size: 22px;
  padding: 6px 12px;
  cursor: pointer;
  z-index: 10;
}

.prev { left: -10px; }
.next { right: -10px; }

.user-avatar {
  width: 20px;
  height: 20px;
  background-color: #ffffff;
  color: #198754; /* bootstrap success */
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  text-transform: uppercase;
  border: 1px solid #198754;
}

/* ===== USER HOVER MENU ===== */
.user-menu {
  position: relative;
  z-index: 99999; /* VERY HIGH to stay above all layers */
}


/* Hover popup box */
.user-hover-box {
  position: absolute;
  top: 30px;
  right: 0;
  background: white;
  min-width: 140px;
  padding: 8px;
  border-radius: 6px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.2);
  display: none;
  z-index: 999999; /* higher than everything */
}

.user-hover-box small {
  display: block;
  font-size: 12px;
  color: gray;
  margin-bottom: 6px;
}

.user-hover-box ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.user-hover-box li a {
  display: block;
  padding: 6px;
  font-size: 14px;
  color: red;
  text-decoration: none;
}

.user-hover-box li a:hover {
  background: #f5f5f5;
}
    
  </style>
</head>

<body>
 <div class="bg-success text-white py-1">
  <div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between">

      <!-- Marquee Email & Phone -->
      <marquee behavior="scroll" direction="left" class="flex-grow-1 me-3">
        <span class="d-inline-flex align-items-center gap-3 fs-6">
          <span>
            <i class="bi bi-envelope-fill me-1"></i>
            onlinetarkaripashal1433@gmail.com
          </span>
          <span>|</span>
          <span>
            <i class="bi bi-telephone-fill me-1"></i>
            9742511433
          </span>
        </span>
      </marquee>

      <!-- Right Icons -->
<nav class="mx-3">
<?php if (isset($_SESSION['user_id']) && isset($_SESSION['name'])): ?>

<?php
  $firstLetter = strtoupper(substr($_SESSION['name'], 0, 1));
?>

<div class="user-menu" id="userMenu"
     onmouseenter="showUserMenu()">

  <!-- Avatar -->
  <div class="user-avatar">
    <?= $firstLetter ?>
  </div>

  <!-- Hover menu -->
  <div class="user-hover-box" id="userHoverBox">
    <ul>
      <li>
        <a href="logout.php">Logout</a>
      </li>
      <li>
        <a href="edit_profile.php">setting</a>
      </li>
    </ul>
  </div>

</div>

<?php else: ?>
  <a href="login.html" class="d-flex btn btn-light btn-sm">
    <i class="bi bi-person-plus text-success"></i>
  </a>
<?php endif; ?>
</nav>
        

        <a href="userorder.php" class="btn btn-light btn-sm">
          <i class="bi bi-cart-plus text-success"></i>
        </a>
      </div>

    </div>
  </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white sticky-top">
  <div class="container-fluid">
    
    <a class="navbar-brand" 
    href="../phpfiles/index.php">
      <img class="logo" src="https://onlinetarkaripasal.com/wp-content/themes/onlinetarkaripasal/images/onlinetarkaripasal-logo.png" alt="Logo">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        
        <li class="nav-item">
          <a class="nav-link"
           href="../phpfiles/index.php">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">Category</a>
          <ul class="dropdown-menu active">
   <li><a class="dropdown-item"
   href="catogary.php?type=vegetable">Vegetable</a></li>
            <li><a class="dropdown-item" href="catogary.php?type=non_vegetable">Non-Vegetable</a></li>
            <li><a class="dropdown-item" href="catogary.php?type=fruit">Fruits</a></li>
            <li><a class="dropdown-item" href="catogary.php?type=nepalishag">Nepali Sag</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../phpfiles/all_product.php">All Products</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../phpfiles/about.php">About Us</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" 
          href="../phpfiles/contact.php">Contact</a>
        </li>

      </ul>

    <form class="d-flex" method="GET" action="search.php">
    <input class="form-control me-2" type="search" name="search" placeholder="Search products">
    <button class="btn btn-primary" type="submit">Search</button>
</form>

    </div>
  </div>
</nav>
 