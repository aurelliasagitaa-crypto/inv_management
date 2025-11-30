<?php
include 'config.php';
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM suppliers WHERE id=$id");
header("Location: suppliers_read.php");
?>
