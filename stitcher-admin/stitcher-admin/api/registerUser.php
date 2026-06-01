<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once '../includes/db.php';

$name     = mysqli_real_escape_string($conn, $_POST['name'] ?? '');
$email    = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
$password = md5($_POST['password'] ?? '');
$contact  = mysqli_real_escape_string($conn, $_POST['contact'] ?? '');

// Check if email already exists
$check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
if (mysqli_num_rows($check) > 0) {
    echo json_encode("email_exists");
    exit();
}

$query = "INSERT INTO users (name, email, password, contact, status) 
          VALUES ('$name', '$email', '$password', '$contact', 'Pending')";

if (mysqli_query($conn, $query)) {
    echo json_encode("success");
} else {
    echo json_encode("failed");
}
?>
