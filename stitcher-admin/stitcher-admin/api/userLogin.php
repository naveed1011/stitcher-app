<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once '../includes/db.php';

$email    = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
$password = md5($_POST['password'] ?? '');

$query  = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    // Only approved users can login
    if ($row['status'] == 'Approved') {
        echo json_encode("success");
    } else {
        echo json_encode("not_approved");
    }
} else {
    echo json_encode("failed");
}
?>
