<?php
require_once 'includes/auth.php';
$orders = mysqli_query($conn, "SELECT * FROM orders ORDER BY id ASC");
include 'includes/header.php';
?>

<div id="main" class="main">
  <div class="pagetitle">
    <h1>Order List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Order List</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Order List</h5>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Customer</th>
                  <th>Tailor</th>
                  <th>Details</th>
                  <th>Status</th>
                  <th>Time</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; while ($row = mysqli_fetch_assoc($orders)): ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= htmlspecialchars($row['customer_name']) ?></td>
                  <td><?= htmlspecialchars($row['tailor_name']) ?></td>
                  <td><?= htmlspecialchars($row['order_details']) ?></td>
                  <td>
                    <?php
                    $status_class = match($row['status']) {
                        'Completed' => 'success',
                        'In Progress' => 'info',
                        'Cancelled' => 'danger',
                        default => 'warning'
                    };
                    ?>
                    <span class="badge bg-<?= $status_class ?>"><?= $row['status'] ?></span>
                  </td>
                  <td><?= $row['order_time'] ?></td>
                  <td><?= $row['order_date'] ?></td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'includes/footer.php'; ?>
