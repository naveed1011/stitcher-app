<?php
require_once 'includes/auth.php';

$edit_data = null;
$edit_id = null;

// Load data for editing
if (isset($_GET['edit'])) {
    $edit_id = (int)$_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM tailors WHERE id=$edit_id");
    $edit_data = mysqli_fetch_assoc($result);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name      = mysqli_real_escape_string($conn, $_POST['name']);
    $email     = mysqli_real_escape_string($conn, $_POST['email']);
    $password  = md5($_POST['password']);
    $contact   = mysqli_real_escape_string($conn, $_POST['contact']);
    $city      = mysqli_real_escape_string($conn, $_POST['city']);
    $country   = mysqli_real_escape_string($conn, $_POST['country']);
    $latitude  = mysqli_real_escape_string($conn, $_POST['latitude']);
    $longitude = mysqli_real_escape_string($conn, $_POST['longitude']);

    if (isset($_POST['edit_id']) && !empty($_POST['edit_id'])) {
        $id = (int)$_POST['edit_id'];
        mysqli_query($conn, "UPDATE tailors SET name='$name', email='$email', contact='$contact', city='$city', country='$country', latitude='$latitude', longitude='$longitude' WHERE id=$id");
    } else {
        mysqli_query($conn, "INSERT INTO tailors (name, email, password, contact, city, country, latitude, longitude) VALUES ('$name','$email','$password','$contact','$city','$country','$latitude','$longitude')");
    }
    header("Location: tailor-list.php");
    exit();
}

include 'includes/header.php';
?>

<div id="main" class="main">
  <div class="pagetitle">
    <h1><?= $edit_data ? 'Edit Tailor' : 'Add Tailor' ?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active"><?= $edit_data ? 'Edit Tailor' : 'Add Tailor' ?></li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?= $edit_data ? 'Edit Tailor' : 'Add Tailor' ?></h5>
            <form method="POST" action="add-tailor.php">
              <?php if ($edit_data): ?>
                <input type="hidden" name="edit_id" value="<?= $edit_id ?>">
              <?php endif; ?>
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" value="<?= $edit_data['name'] ?? '' ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" value="<?= $edit_data['email'] ?? '' ?>" required>
                </div>
              </div>
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label class="form-label">Password <?= $edit_data ? '(leave blank to keep)' : '' ?></label>
                  <input type="password" name="password" class="form-control" <?= !$edit_data ? 'required' : '' ?>>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Contact</label>
                  <input type="text" name="contact" class="form-control" value="<?= $edit_data['contact'] ?? '' ?>">
                </div>
              </div>
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label class="form-label">City</label>
                  <input type="text" name="city" class="form-control" value="<?= $edit_data['city'] ?? '' ?>">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Country</label>
                  <input type="text" name="country" class="form-control" value="<?= $edit_data['country'] ?? '' ?>">
                </div>
              </div>
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label class="form-label">Latitude</label>
                  <input type="text" name="latitude" class="form-control" value="<?= $edit_data['latitude'] ?? '' ?>">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Longitude</label>
                  <input type="text" name="longitude" class="form-control" value="<?= $edit_data['longitude'] ?? '' ?>">
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="tailor-list.php" class="btn btn-success">Show List</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'includes/footer.php'; ?>
