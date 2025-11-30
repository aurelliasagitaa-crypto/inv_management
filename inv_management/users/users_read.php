<?php
include 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM users ORDER BY user_id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Users List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>👥 Users Management</h2>
    <a href="users_create.php" class="btn btn-primary">+ Add New User</a>
  </div>

  <table class="table table-bordered table-striped shadow-sm">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Full Name</th>
        <th>Role</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?= $row['user_id'] ?></td>
        <td><?= htmlspecialchars($row['username']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['full_name']) ?></td>
        <td>
          <span class="badge bg-<?= $row['role'] == 'admin' ? 'danger' : 'info' ?>">
            <?= ucfirst($row['role']) ?>
          </span>
        </td>
        <td>
          <span class="badge bg-<?= $row['is_active'] ? 'success' : 'secondary' ?>">
            <?= $row['is_active'] ? 'Active' : 'Inactive' ?>
          </span>
        </td>
        <td>
          <a href="users_update.php?user_id=<?= $row['user_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="users_delete.php?user_id=<?= $row['user_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this user?')">Delete</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>