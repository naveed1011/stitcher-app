<?php
require_once 'includes/auth.php';

$edit_data = null;
$edit_id = null;

if (isset($_GET['edit'])) {
    $edit_id = (int)$_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM expenses WHERE id=$edit_id");
    $edit_data = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount   = mysqli_real_escape_string($conn, $_POST['amount']);
    $expenser = mysqli_real_escape_string($conn, $_POST['expenser']);
    $details  = mysqli_real_escape_string($conn, $_POST['details']);
    $date     = mysqli_real_escape_string($conn, $_POST['expense_date']);

    if (isset($_POST['edit_id']) && !empty($_POST['edit_id'])) {
        $id = (int)$_POST['edit_id'];
        mysqli_query($conn, "UPDATE expenses SET amount='$amount', expenser='$expenser', details='$details', expense_date='$date' WHERE id=$id");
    } else {
        mysqli_query($conn, "INSERT INTO expenses (amount, expenser, details, expense_date) VALUES ('$amount','$expenser','$details','$date')");
    }
    header("Location: expenses-list.php");
    exit();
}

include 'includes/header.php';
?>

<div id="main" class="main">
  <div class="pagetitle">
    <h1><?= $edit_data ? 'Edit Expenses' : 'Add Expenses' ?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active"><?= $edit_data ? 'Edit Expenses' : 'Add Expenses' ?></li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?= $edit_data ? 'Edit Expenses' : 'Add Expenses' ?></h5>
            <form method="POST" action="add-expenses.php">
              <?php if ($edit_data): ?>
                <input type="hidden" name="edit_id" value="<?= $edit_id ?>">
              <?php endif; ?>
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label class="form-label">Amount</label>
                  <input type="number" name="amount" class="form-control" value="<?= $edit_data['amount'] ?? '' ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Expenser</label>
                  <input type="text" name="expenser" class="form-control" value="<?= $edit_data['expenser'] ?? '' ?>">
                </div>
              </div>
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label class="form-label">Details</label>
                  <input type="text" name="details" class="form-control" value="<?= $edit_data['details'] ?? '' ?>">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Date</label>
                  <input type="date" name="expense_date" class="form-control" value="<?= $edit_data['expense_date'] ?? '' ?>">
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="expenses-list.php" class="btn btn-success">Show List</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'includes/footer.php'; ?>
