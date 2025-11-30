<?php
// Cek jika session belum started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$conn = mysqli_connect("localhost", "root", "", "inv_management");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>