<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once '../includes/db.php';

$customer_email = mysqli_real_escape_string($conn, $_POST['customer_email'] ?? '');
$tailor_email   = mysqli_real_escape_string($conn, $_POST['tailor_email'] ?? '');
$order_details  = mysqli_real_escape_string($conn, $_POST['order_details'] ?? '');

// Get customer name
$cu = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM users WHERE email='$customer_email'"));
$customer_name = $cu['name'] ?? '';

// Get tailor name
$ta = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM tailors WHERE email='$tailor_email'"));
$tailor_name = $ta['name'] ?? '';

$time = date('H:i:s');
$date = date('Y-m-d');

$query = "INSERT INTO orders (customer_name, customer_email, tailor_name, tailor_email, order_details, order_time, order_date)
          VALUES ('$customer_name','$customer_email','$tailor_name','$tailor_email','$order_details','$time','$date')";

if (mysqli_query($conn, $query)) {
    echo json_encode("success");
} else {
    echo json_encode("failed");
}
?>
