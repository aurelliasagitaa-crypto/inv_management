<?php
include 'config.php';
$ItemID = $_GET['ItemID'];

mysqli_query($conn, "DELETE FROM inventory WHERE ItemID='$ItemID'");
header("Location: inventory_read.php");
exit();
?>
