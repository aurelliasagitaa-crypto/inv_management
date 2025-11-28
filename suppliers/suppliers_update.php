<?php
include 'config.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM suppliers WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_supplier'];
    $kontak = $_POST['kontak'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "UPDATE suppliers 
                         SET nama_supplier='$nama', kontak='$kontak', alamat='$alamat' 
                         WHERE id=$id");

    header("Location: suppliers_read.php");
}
?>

<h2>Edit Supplier</h2>
<form method="POST">
  Nama Supplier: <input type="text" name="nama_supplier" value="<?= $data['nama_supplier']; ?>" required><br><br>
  Kontak: <input type="text" name="kontak" value="<?= $data['kontak']; ?>"><br><br>
  Alamat: <textarea name="alamat"><?= $data['alamat']; ?></textarea><br><br>
  <button type="submit" name="submit">Update</button>
</form>

<a href="suppliers_read.php">Kembali</a>
