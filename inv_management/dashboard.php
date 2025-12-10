<?php
include 'config.php';

// Cek jika user belum login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fungsi untuk hitung total record dengan prepared statement
function countTable($conn, $table) {
    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM $table");
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result['total'] ?? 0;
}

$inv_total = countTable($conn, 'inventory');
$cat_total = countTable($conn, 'categories');
$sup_total = countTable($conn, 'suppliers');
$user_total = countTable($conn, 'users');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - Inventory Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">🏪 INV Management</a>
            <div class="navbar-nav ms-auto">
                <span class="navbar-text me-3">
                    Welcome, <?= htmlspecialchars($_SESSION['full_name']) ?> (<?= htmlspecialchars($_SESSION['role']) ?>)
                </span>
                <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Dashboard</h2>

        <div class="row mt-4 g-3">
            <!-- Inventory -->
            <div class="col-md-3 col-sm-6">
                <div class="card text-white bg-primary h-100">
                    <div class="card-body">
                        <h5>📦 Inventory</h5>
                        <h3><?= $inv_total ?></h3>
                    </div>
                    <div class="card-footer">
                        <a href="inventory_read.php" class="text-white">View Items</a>
                    </div>
                </div>
            </div>

            <!-- Categories -->
            <div class="col-md-3 col-sm-6">
                <div class="card text-white bg-success h-100">
                    <div class="card-body">
                        <h5>🏷️ Categories</h5>
                        <h3><?= $cat_total ?></h3>
                    </div>
                    <div class="card-footer">
                        <a href="categories_read.php" class="text-white">View Categories</a>
                    </div>
                </div>
            </div>

            <!-- Suppliers -->
            <div class="col-md-3 col-sm-6">
                <div class="card text-white bg-warning h-100">
                    <div class="card-body">
                        <h5>🚚 Suppliers</h5>
                        <h3><?= $sup_total ?></h3>
                    </div>
                    <div class="card-footer">
                        <a href="suppliers_read.php" class="text-white">View Suppliers</a>
                    </div>
                </div>
            </div>

            <!-- Users -->
            <div class="col-md-3 col-sm-6">
                <div class="card text-white bg-info h-100">
                    <div class="card-body">
                        <h5>👥 Users</h5>
                        <h3><?= $user_total ?></h3>
                    </div>
                    <div class="card-footer">
                        <a href="users_read.php" class="text-white">View Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
