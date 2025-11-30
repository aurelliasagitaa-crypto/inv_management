<?php
include 'config.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM categories WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_kategori'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($conn, "UPDATE categories 
                         SET nama_kategori='$nama', deskripsi='$deskripsi' 
                         WHERE id=$id");

    header("Location: categories_read.php");
}
?>

<h2>Edit Kategori</h2>
<form method="POST">
  Nama Kategori: <input type="text" name="nama_kategori" value="<?= $data['nama_kategori']; ?>" required><br><br>
  Deskripsi: <textarea name="deskripsi"><?= $data['deskripsi']; ?></textarea><br><br>
  <button type="submit" name="submit">Update</button>
</form>

<a href="categories_read.php">Kembali</a>
