<?php
include 'config.php';
$ItemID = $_GET['ItemID'];

$item = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM inventory WHERE ItemID='$ItemID'"));
$suppliers = mysqli_query($conn, "SELECT * FROM suppliers");
$categories = mysqli_query($conn, "SELECT * FROM categories");

if (isset($_POST['submit'])) {
    $ItemName = $_POST['ItemName'];
    $Quantity = $_POST['Quantity'];
    $SupplierID = $_POST['SupplierID'];
    $category_id = $_POST['category_id'];

    mysqli_query($conn, "UPDATE inventory SET 
        ItemName='$ItemName',
        Quantity='$Quantity',
        SupplierID='$SupplierID',
        category_id='$category_id'
        WHERE ItemID='$ItemID'");

    header("Location: inventory_read.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Inventory</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h2 class="mb-4">✏️ Edit Inventory Item</h2>

  <form method="POST" class="card p-4 shadow-sm bg-white">
    <div class="mb-3">
      <label class="form-label">Item Name</label>
      <input type="text" name="ItemName" value="<?= htmlspecialchars($item['ItemName']) ?>" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Quantity</label>
      <input type="number" name="Quantity" value="<?= $item['Quantity'] ?>" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Supplier</label>
      <select name="SupplierID" class="form-select" required>
        <?php while ($s = mysqli_fetch_assoc($suppliers)) { ?>
          <option value="<?= $s['SupplierID'] ?>" <?= $s['SupplierID'] == $item['SupplierID'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($s['SupplierName']) ?>
          </option>
        <?php } ?>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Category</label>
      <select name="category_id" class="form-select">
        <?php while ($c = mysqli_fetch_assoc($categories)) { ?>
          <option value="<?= $c['category_id'] ?>" <?= $c['category_id'] == $item['category_id'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($c['CategoryName']) ?>
          </option>
        <?php } ?>
      </select>
    </div>

    <button type="submit" name="submit" class="btn btn-warning">Update</button>
    <a href="inventory_read.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>

</body>
</html>
