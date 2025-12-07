<?php
// Aktifkan tampilan error supaya HTTP 500 tidak muncul
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Koneksi database
$conn = new mysqli("localhost", "aurellia", "rahasia123", "secure_login");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proses login jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password_input = $_POST['password'];

    // Ambil hash password dari database
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($password_hash_db);
        $stmt->fetch();

        if (password_verify($password_input, $password_hash_db)) {
            echo "Login berhasil! <a href='login.php'>Kembali</a>";
        } else {
            echo "Username atau password salah! <a href='login.php'>Kembali</a>";
        }
    } else {
        echo "Username atau password salah! <a href='login.php'>Kembali</a>";
    }

    $stmt->close();
}

$conn->close();
?>

<!-- Form login -->
<h2>Login</h2>
<form action="login.php" method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>

