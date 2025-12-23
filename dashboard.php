<?php
// Hapus session_start() karena sudah ada di config.php
include 'config.php';
// update dashboard view
include 'config.php';

// Cek jika user belum login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Welcome, Dashboard - Inventory Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">🏪 INV Management</a>
            <div class="navbar-nav ms-auto">
                <span class="navbar-text me-3">
                    Welcome, <?= $_SESSION['full_name'] ?> (<?= $_SESSION['role'] ?>)
                </span>
                <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Dashboard</h2>

        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5>📦 Inventory</h5>
                        <?php
                        $inv_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM inventory");
                        $inv = mysqli_fetch_assoc($inv_count);
                        ?>
                        <h3><?= $inv['total'] ?></h3>
                        <a href="inventory_read.php" class="text-white">View Items</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5>🏷️ Categories</h5>
                        <?php
                        $cat_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM categories");
                        $cat = mysqli_fetch_assoc($cat_count);
                        ?>
                        <h3><?= $cat['total'] ?></h3>
                        <a href="categories_read.php" class="text-white">View Categories</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5>🚚 Suppliers</h5>
                        <?php
                        $sup_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM suppliers");
                        $sup = mysqli_fetch_assoc($sup_count);
                        ?>
                        <h3><?= $sup['total'] ?></h3>
                        <a href="suppliers_read.php" class="text-white">View Suppliers</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5>👥 Users</h5>
                        <?php
                        $user_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM users");
                        $user = mysqli_fetch_assoc($user_count);
                        ?>
                        <h3><?= $user['total'] ?></h3>
                        <a href="users_read.php" class="text-white">View Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
