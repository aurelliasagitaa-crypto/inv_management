<?php
include 'config.php';
$result = mysqli_query($conn, "SELECT * FROM suppliers");
?>

<h2>Daftar Supplier</h2>
<a href="suppliers_create.php">+ Tambah Supplier</a>
<br><br>

<table border="1" cellpadding="8">
  <tr>
    <th>ID</th>
    <th>Nama Supplier</th>
    <th>Kontak</th>
    <th>Alamat</th>
    <th>Aksi</th>
  </tr>

  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
  <tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['nama_supplier']; ?></td>
    <td><?= $row['kontak']; ?></td>
    <td><?= $row['alamat']; ?></td>
    <td>
      <a href="suppliers_update.php?id=<?= $row['id']; ?>">Edit</a> |
      <a href="suppliers_delete.php?id=<?= $row['id']; ?>">Hapus</a>
    </td>
  </tr>
  <?php } ?>
</table>

<a href="dashboard.php">Kembali ke Dashboard</a>
