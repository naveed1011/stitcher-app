<?php
require_once 'includes/auth.php';

// Get counts from database
$total_customers = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM users"))[0];
$total_tailors   = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM tailors"))[0];
$total_orders    = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM orders"))[0];
$total_expenses  = mysqli_fetch_row(mysqli_query($conn, "SELECT SUM(amount) FROM expenses"))[0];
$total_expenses  = $total_expenses ? number_format($total_expenses, 0) : 0;

include 'includes/header.php';
?>

<div id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">

      <!-- Customers Card -->
      <div class="col-xxl-3 col-md-6">
        <div class="card info-card">
          <div class="card-body">
            <h5 class="card-title">Customers <span>| Total</span></h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background:#e0e8ff;">
                <i class="bi bi-cart" style="color:#4154f1;font-size:1.5rem;"></i>
              </div>
              <div class="ps-3">
                <h6><?= $total_customers ?></h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Tailors Card -->
      <div class="col-xxl-3 col-md-6">
        <div class="card info-card">
          <div class="card-body">
            <h5 class="card-title">Tailor <span>| Total</span></h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background:#e0e8ff;">
                <i class="bi bi-scissors" style="color:#4154f1;font-size:1.5rem;"></i>
              </div>
              <div class="ps-3">
                <h6><?= $total_tailors ?></h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Expenses Card -->
      <div class="col-xxl-3 col-md-6">
        <div class="card info-card">
          <div class="card-body">
            <h5 class="card-title">Expenses <span>| Total</span></h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background:#d1f7e0;">
                <i class="bi bi-currency-dollar" style="color:#2eca6a;font-size:1.5rem;"></i>
              </div>
              <div class="ps-3">
                <h6><?= $total_expenses ?></h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Orders Card -->
      <div class="col-xxl-3 col-md-6">
        <div class="card info-card">
          <div class="card-body">
            <h5 class="card-title">Orders <span>| Total</span></h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background:#ffe8d6;">
                <i class="bi bi-people" style="color:#ff771d;font-size:1.5rem;"></i>
              </div>
              <div class="ps-3">
                <h6><?= $total_orders ?></h6>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

</div>

<?php include 'includes/footer.php'; ?>
