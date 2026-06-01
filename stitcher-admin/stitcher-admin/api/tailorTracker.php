<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once '../includes/db.php';

$email  = mysqli_real_escape_string($conn, $_POST['email'] ?? '');

// Get orders for this customer
$query  = "SELECT o.*, t.name as tailor_name, t.contact as tailor_contact 
           FROM orders o 
           LEFT JOIN tailors t ON o.tailor_email = t.email
           WHERE o.customer_email='$email' 
           ORDER BY o.created_at DESC";
$result = mysqli_query($conn, $query);

$orders = [];
while ($row = mysqli_fetch_assoc($result)) {
    $orders[] = $row;
}

echo json_encode($orders);
?>
