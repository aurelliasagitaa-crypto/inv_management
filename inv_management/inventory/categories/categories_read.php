<?php
include 'config.php';
$result = mysqli_query($conn, "SELECT * FROM categories");
?>

<h2>Daftar Kategori</h2>
<a href="categories_create.php">+ Tambah Kategori</a>
<br><br>

<table border="1" cellpadding="8">
  <tr>
    <th>ID</th>
    <th>Nama Kategori</th>
    <th>Deskripsi</th>
    <th>Aksi</th>
  </tr>

  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?= $row['id']; ?></td>
      <td><?= $row['nama_kategori']; ?></td>
      <td><?= $row['deskripsi']; ?></td>
      <td>
        <a href="categories_update.php?id=<?= $row['id']; ?>">Edit</a> |
        <a href="categories_delete.php?id=<?= $row['id']; ?>">Hapus</a>
      </td>
    </tr>
  <?php } ?>
</table>

<a href="dashboard.php">Kembali ke Dashboard</a>