<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once '../includes/db.php';

$email  = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
$query  = "SELECT id, name, email, contact, city, country, status FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
} else {
    echo json_encode(null);
}
?>
