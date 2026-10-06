<?php
include '../database/db_connection.php';
session_start();

$message = "";
$toastClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM userdata WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['email'] = $email;
        header("Location: dashboard.php");
        exit;
    } else {
        $message = "Invalid email or password";
        $toastClass = "#dc3545";
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Login</title>
</head>

<body class="bg-light">
<div class="container p-5 d-flex flex-column align-items-center">
  <?php if ($message): ?>
    <div class="toast align-items-center text-white border-0" style="background-color: <?php echo $toastClass; ?>;">
      <div class="d-flex">
        <div class="toast-body"><?php echo $message; ?></div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
    </div>
  <?php endif; ?>

  <form method="post" class="form-control mt-5 p-4" style="width:380px;">
    <h5 class="text-center mb-3">Login</h5>
    <div class="mb-2">
      <label>Email</label>
      <input type="text" name="email" class="form-control" required>
    </div>
    <div class="mb-2">
      <label>Password</label>
      <input type="text" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
    <p class="text-center mt-3">Forgot password? <a href="./resetpassword.php">Click here</a></p>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
let toastElList = [].slice.call(document.querySelectorAll('.toast'));
let toastList = toastElList.map(function (toastEl) {
  return new bootstrap.Toast(toastEl, { delay: 3000 });
});
toastList.forEach(toast => toast.show());
</script>
</body>
</html>
