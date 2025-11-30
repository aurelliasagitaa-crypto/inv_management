<?php
include 'config.php';

// Ambil OrderID dari URL
$OrderID = $_GET['OrderID'];

// Ambil data order yang akan diedit
$order = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM orders WHERE OrderID = $OrderID"));
$suppliers = mysqli_query($conn, "SELECT * FROM suppliers");

// Jika tombol submit ditekan
if (isset($_POST['submit'])) {
    $SupplierID = $_POST['SupplierID'];
    $ItemName = $_POST['ItemName'];
    $Quantity = $_POST['Quantity'];
    $OrderDate = $_POST['OrderDate'];
    $OrderStatus = $_POST['OrderStatus'];

    mysqli_query($conn, "UPDATE orders SET 
        SupplierID = '$SupplierID', 
        ItemName = '$ItemName', 
        Quantity = '$Quantity', 
        OrderDate = '$OrderDate',
        OrderStatus = '$OrderStatus'
        WHERE OrderID = $OrderID
    ");

    header("Location: orders_read.php");
    exit;
}
?>

<h2>Edit Order</h2>
<form method="POST">
  Supplier:
  <select name="SupplierID" required>
    <?php while ($s = mysqli_fetch_assoc($suppliers)) { ?>
      <option value="<?= $s['SupplierID']; ?>" <?= $s['SupplierID'] == $order['SupplierID'] ? 'selected' : '' ?>>
        <?= $s['NamaSupplier']; ?>
      </option>
    <?php } ?>
  </select><br><br>

  Nama Barang: 
  <input type="text" name="ItemName" value="<?= $order['ItemName']; ?>" required><br><br>

  Jumlah: 
  <input type="number" name="Quantity" value="<?= $order['Quantity']; ?>" min="1" required><br><br>

  Tanggal Order: 
  <input type="date" name="OrderDate" value="<?= $order['OrderDate']; ?>" required><br><br>

  Status Order:
  <select name="OrderStatus" required>
      <option value="Ongoing" <?= $order['OrderStatus'] == 'Ongoing' ? 'selected' : '' ?>>Ongoing</option>
      <option value="Complete" <?= $order['OrderStatus'] == 'Complete' ? 'selected' : '' ?>>Complete</option>
  </select><br><br>

  <button type="submit" name="submit">Update</button>
</form>

<a href="orders_read.php">Kembali</a>
