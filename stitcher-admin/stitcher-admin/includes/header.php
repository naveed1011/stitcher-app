<?php
// includes/header.php - shared across all pages
$current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Stitcher Admin Panel</title>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Nunito:300,400,600,700|Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="d-flex align-items-center justify-content-between">
    <a href="index.php" class="logo d-flex align-items-center">
      <span class="d-none d-lg-block">Stitcher</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div>

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-person-circle" style="font-size:1.5rem;"></i>
          <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>Administrator</h6>
            <span>Stitcher Panel</span>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="logout.php">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</header>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link <?= $current=='index.php' ? '' : 'collapsed' ?>" href="index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= $current=='tailor-list.php' || $current=='add-tailor.php' ? '' : 'collapsed' ?>" data-bs-target="#tailors-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-scissors"></i><span>Tailors</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tailors-nav" class="nav-content collapse <?= $current=='tailor-list.php' || $current=='add-tailor.php' ? 'show' : '' ?>">
        <li><a href="tailor-list.php" class="<?= $current=='tailor-list.php' ? 'active' : '' ?>"><i class="bi bi-circle"></i><span>Tailor List</span></a></li>
        <li><a href="add-tailor.php" class="<?= $current=='add-tailor.php' ? 'active' : '' ?>"><i class="bi bi-circle"></i><span>Add Tailor</span></a></li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= $current=='user-list.php' ? '' : 'collapsed' ?>" href="user-list.php">
        <i class="bi bi-people"></i>
        <span>User List</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= $current=='order-list.php' ? '' : 'collapsed' ?>" href="order-list.php">
        <i class="bi bi-bag-check"></i>
        <span>Order List</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= $current=='expenses-list.php' || $current=='add-expenses.php' ? '' : 'collapsed' ?>" data-bs-target="#expenses-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-cash-stack"></i><span>Expenses</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="expenses-nav" class="nav-content collapse <?= $current=='expenses-list.php' || $current=='add-expenses.php' ? 'show' : '' ?>">
        <li><a href="expenses-list.php" class="<?= $current=='expenses-list.php' ? 'active' : '' ?>"><i class="bi bi-circle"></i><span>Expenses List</span></a></li>
        <li><a href="add-expenses.php" class="<?= $current=='add-expenses.php' ? 'active' : '' ?>"><i class="bi bi-circle"></i><span>Add Expenses</span></a></li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="logout.php">
        <i class="bi bi-box-arrow-right"></i>
        <span>Logout</span>
      </a>
    </li>

  </ul>
</aside>
