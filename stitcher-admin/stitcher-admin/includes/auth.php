<?php
require_once 'db.php';
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
?>
