<?php
$host = "mysql";
$user = "inventory_user";
$pass = "inventory_pass";
$db   = "inventory_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
