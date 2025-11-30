<?php
include 'config.php';

// Ambil data supplier untuk dropdown
$suppliers = mysqli_query($conn, "SELECT * FROM suppliers");

if (isset($_POST['submit'])) {
    $SupplierID = $_POST['SupplierID'];
    $ItemName = $_POST['ItemName'];
    $Quantity = $_POST['Quantity'];
    $OrderDate = $_POST['OrderDate'];
    $OrderStatus = $_POST['OrderStatus'];

    // Query insert ke tabel orders
    $query = "INSERT INTO orders (SupplierID, ItemName, Quantity, OrderDate, OrderStatus)
              VALUES ('$SupplierID', '$ItemName', '$Quantity', '$OrderDate', '$OrderStatus')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: orders_read.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h2>Tambah Order</h2>

<form method="POST">
  Supplier:
  <select name="SupplierID" required>
    <option value="">-- Pilih Supplier --</option>
    <?php while ($s = mysqli_fetch_assoc($suppliers)) { ?>
      <option value="<?= $s['SupplierID']; ?>"><?= $s['SupplierName']; ?></option>
    <?php } ?>
  </select><br><br>

  Nama Barang: <input type="text" name="ItemName" required><br><br>
  Jumlah: <input type="number" name="Quantity" min="1" required><br><br>
  Tanggal Order: <input type="date" name="OrderDate" required><br><br>

  Status:
  <select name="OrderStatus" required>
    <option value="Ongoing">Ongoing</option>
    <option value="Complete">Complete</option>
  </select><br><br>

  <button type="submit" name="submit">Simpan</button>
</form>

<a href="orders_read.php">Kembali</a>
