<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Koneksi database
$conn = new mysqli("localhost", "aurellia", "rahasia123", "secure_login");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$username = $_POST['username'];
$password_plain = $_POST['password'];

// Hash password
$password_hash = password_hash($password_plain, PASSWORD_BCRYPT);

// Simpan ke database
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password_hash);
$stmt->execute();

echo "User berhasil didaftarkan!";
$stmt->close();
$conn->close();
?>

