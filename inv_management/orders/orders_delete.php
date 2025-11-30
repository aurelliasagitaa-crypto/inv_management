<?php
include 'config.php';

$OrderID = $_GET['OrderID'];

$stmt = mysqli_prepare($conn, "DELETE FROM orders WHERE OrderID = $OrderID");
mysqli_stmt_bind_param($stmt, "i", $OrderID);
mysqli_stmt_execute($stmt);

header("Location: orders_read.php");
exit;
?>
