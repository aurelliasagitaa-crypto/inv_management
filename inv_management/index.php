<?php
// Hapus session_start() di index.php karena sudah ada di config.php
include 'config.php';

// Redirect ke login page
header("Location: login.php");
exit();
?>