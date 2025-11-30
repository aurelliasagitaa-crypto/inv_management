<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_supplier'];
    $kontak = $_POST['kontak'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO suppliers (nama_supplier, kontak, alamat)
              VALUES ('$nama', '$kontak', '$alamat')";
    mysqli_query($conn, $query);

    header("Location: suppliers_read.php");
}
?>

<h2>Tambah Supplier</h2>
<form method="POST">
  Nama Supplier: <input type="text" name="nama_supplier" required><br><br>
  Kontak: <input type="text" name="kontak"><br><br>
  Alamat: <textarea name="alamat"></textarea><br><br>
  <button type="submit" name="submit">Simpan</button>
</form>

<a href="suppliers_read.php">Kembali</a>
