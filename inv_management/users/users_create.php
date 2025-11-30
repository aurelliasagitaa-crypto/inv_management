<?php
include 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    // Hash password (simple md5 for demo)
    $hashed_password = md5($password);

    $query = "INSERT INTO users (username, password, email, full_name, role, is_active) 
              VALUES ('$username', '$hashed_password', '$email', '$full_name', '$role', '$is_active')";
    
    if(mysqli_query($conn, $query)) {
        header("Location: users_read.php");
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
  <h2 class="mb-4">➕ Add New User</h2>

  <?php if(isset($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php endif; ?>

  <form method="POST" class="card p-4 shadow-sm bg-white">
    <div class="mb-3">
      <label class="form-label">Username</label>
      <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Full Name</label>
      <input type="text" name="full_name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Role</label>
      <select name="role" class="form-select" required>
        <option value="staff">Staff</option>
        <option value="admin">Admin</option>
      </select>
    </div>

    <div class="mb-3 form-check">
      <input type="checkbox" name="is_active" class="form-check-input" checked>
      <label class="form-check-label">Active User</label>
    </div>

    <button type="submit" name="submit" class="btn btn-success">Save User</button>
    <a href="users_read.php" class="btn btn-secondary">Back to Users</a>
  </form>
</div>

</body>
</html>