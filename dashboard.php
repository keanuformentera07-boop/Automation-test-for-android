<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Dashboard</title>
</head>
<body class="bg-light">
<div class="container p-5">
  <h3>Welcome to Dashboard</h3>
  <p>Your email: <?php echo $_SESSION['email']; ?></p>
  <a href="logout.php" class="btn btn-danger">Logout</a>
</div>
</body>
</html>
