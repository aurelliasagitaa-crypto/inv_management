<?php
include 'config.php';

// Hapus semua session
session_destroy();

// Redirect ke login page
header("Location: login.php");
exit();
?>