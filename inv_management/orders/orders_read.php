<?php
include 'config.php';

// Ambil semua data order dari tabel
$result = mysqli_query($conn, "SELECT * FROM orders");
?>

<h2>Daftar Orders</h2>

<a href="orders_create.php">+ Tambah Order</a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>OrderID</th>
    <th>SupplierID</th>
    <th>ItemName</th>
    <th>Quantity</th>
    <th>OrderDate</th>
    <th>OrderStatus</th>
    <th>Aksi</th>
  </tr>

  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?= $row['OrderID']; ?></td>
      <td><?= $row['SupplierID']; ?></td>
      <td><?= $row['ItemName']; ?></td>
      <td><?= $row['Quantity']; ?></td>
      <td><?= $row['OrderDate']; ?></td>
      <td><?= $row['OrderStatus']; ?></td>
      <td>
        <a href="orders_edit.php?OrderID=<?= $row['OrderID']; ?>">Edit</a> |
        <a href="orders_delete.php?OrderID=<?= $row['OrderID']; ?>" 
           onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
      </td>
    </tr>
  <?php } ?>
</table>
