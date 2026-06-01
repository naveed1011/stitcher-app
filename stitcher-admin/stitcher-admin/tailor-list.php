<?php
require_once 'includes/auth.php';

// Handle actions
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $action = $_GET['action'];

    if ($action == 'approve') {
        mysqli_query($conn, "UPDATE tailors SET status='Approved' WHERE id=$id");
    } elseif ($action == 'reject') {
        mysqli_query($conn, "UPDATE tailors SET status='Rejected' WHERE id=$id");
    } elseif ($action == 'delete') {
        mysqli_query($conn, "DELETE FROM tailors WHERE id=$id");
    }
    header("Location: tailor-list.php");
    exit();
}

$tailors = mysqli_query($conn, "SELECT * FROM tailors ORDER BY id ASC");
include 'includes/header.php';
?>

<div id="main" class="main">
  <div class="pagetitle">
    <h1>Tailor List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Tailor List</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tailor List</h5>
            <a href="add-tailor.php" class="btn btn-primary btn-sm mb-3">+ Add Tailor</a>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <th>City</th>
                  <th>Country</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; while ($row = mysqli_fetch_assoc($tailors)): ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= htmlspecialchars($row['name']) ?></td>
                  <td><?= htmlspecialchars($row['email']) ?></td>
                  <td><?= htmlspecialchars($row['contact']) ?></td>
                  <td><?= htmlspecialchars($row['city']) ?></td>
                  <td><?= htmlspecialchars($row['country']) ?></td>
                  <td>
                    <?php if ($row['status'] == 'Approved'): ?>
                      <span class="badge bg-success">Approved</span>
                    <?php elseif ($row['status'] == 'Rejected'): ?>
                      <span class="badge bg-danger">Reject</span>
                    <?php else: ?>
                      <span class="badge bg-warning">Pending</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <a href="tailor-list.php?action=approve&id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Approve</a>
                    <a href="tailor-list.php?action=reject&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Reject</a>
                    <a href="add-tailor.php?edit=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="tailor-list.php?action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
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
