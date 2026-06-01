<?php
require_once 'includes/auth.php';

if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    if ($_GET['action'] == 'delete') {
        mysqli_query($conn, "DELETE FROM expenses WHERE id=$id");
    }
    header("Location: expenses-list.php");
    exit();
}

$expenses = mysqli_query($conn, "SELECT * FROM expenses ORDER BY id ASC");
include 'includes/header.php';
?>

<div id="main" class="main">
  <div class="pagetitle">
    <h1>Expenses List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Expenses List</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Expenses List</h5>
            <a href="add-expenses.php" class="btn btn-primary btn-sm mb-3">+ Add Expense</a>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Amount</th>
                  <th>Expenser</th>
                  <th>Details</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; while ($row = mysqli_fetch_assoc($expenses)): ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= htmlspecialchars($row['amount']) ?></td>
                  <td><?= htmlspecialchars($row['expenser']) ?></td>
                  <td><?= htmlspecialchars($row['details']) ?></td>
                  <td><?= $row['expense_date'] ?></td>
                  <td><span class="badge bg-success"><?= $row['status'] ?></span></td>
                  <td>
                    <a href="add-expenses.php?edit=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="expenses-list.php?action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                  </td>
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
