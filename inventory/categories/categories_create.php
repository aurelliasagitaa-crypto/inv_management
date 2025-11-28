<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_kategori'];
    $deskripsi = $_POST['deskripsi'];

    $query = "INSERT INTO categories (nama_kategori, deskripsi)
              VALUES ('$nama', '$deskripsi')";
    mysqli_query($conn, $query);

    header("Location: categories_read.php");
}
?>

<h2>Tambah Kategori</h2>
<form method="POST">
  Nama Kategori: <input type="text" name="nama_kategori" required><br><br>
  Deskripsi: <textarea name="deskripsi"></textarea><br><br>
  <button type="submit" name="submit">Simpan</button>
</form>

<a href="categories_read.php">Kembali</a>
