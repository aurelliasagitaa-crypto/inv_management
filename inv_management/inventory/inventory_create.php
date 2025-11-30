<?php
include 'config.php';

$suppliers = mysqli_query($conn, "SELECT * FROM suppliers");
$categories = mysqli_query($conn, "SELECT * FROM categories");

if (isset($_POST['submit'])) {
  $ItemName = $_POST['ItemName'];
  $Quantity = $_POST['Quantity'];
  $SupplierID = $_POST['SupplierID'];
  $category_id = $_POST['category_id'];

  $query = "INSERT INTO inventory (ItemName, Quantity, SupplierID, category_id)
              VALUES ('$ItemName', '$Quantity', '$SupplierID', '$category_id')";

  if (mysqli_query($conn, $query)) {
    header("Location: inventory_read.php");
    exit();
  } else {
    // Tampilkan error detail untuk debugging
    die("Error: " . mysqli_error($conn));
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Add Inventory Item</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container mt-5">
    <h2 class="mb-4">➕ Add New Inventory Item</h2>

    <form method="POST" class="card p-4 shadow-sm bg-white">
      <div class="mb-3">
        <label class="form-label">Item Name</label>
        <input type="text" name="ItemName" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Quantity</label>
        <input type="number" name="Quantity" class="form-control" value="0" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Supplier</label>
        <select name="SupplierID" class="form-select" required>
          <option value="">-- Select Supplier --</option>
          <?php while ($s = mysqli_fetch_assoc($suppliers)) { ?>
            <option value="<?= $s['SupplierID'] ?>"><?= htmlspecialchars($s['SupplierName']) ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select" required>
          <option value="">-- Select Category --</option>
          <?php while ($c = mysqli_fetch_assoc($categories)) { ?>
            <!-- PERUBAHAN DI BARIS INI: -->
            <option value="<?= $c['id_category'] ?>"><?= htmlspecialchars($c['name']) ?></option>
          <?php } ?>
        </select>
      </div>

      <button type="submit" name="submit" class="btn btn-success">Save</button>
      <a href="inventory_read.php" class="btn btn-secondary">Back</a>
    </form>
  </div>

</body>

</html>