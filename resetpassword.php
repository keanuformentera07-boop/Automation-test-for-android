<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Forgot Password</title>
</head>
<body class="bg-light">
<div class="container p-5">
  <h3>Forgot Password</h3>
  <form action="checkemail.php" method="post">
    <div class="mb-3">
      <label>Email</label>
      <input type="text" name="email" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Check Email</button>
  </form>
</div>
</body>
</html>
