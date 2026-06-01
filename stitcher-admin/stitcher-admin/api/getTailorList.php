<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once '../includes/db.php';

$query  = "SELECT id, name, email, contact, city, country, latitude, longitude, status FROM tailors WHERE status='Approved'";
$result = mysqli_query($conn, $query);

$tailors = [];
while ($row = mysqli_fetch_assoc($result)) {
    $tailors[] = $row;
}

echo json_encode($tailors);
?>
