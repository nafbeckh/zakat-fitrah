<?php

session_start();

require 'vendor/autoload.php';

const BASE_URL = 'http://localhost/zakat-fitrah';

if (isset($_SESSION['auth'])) {
  if (!isset($_GET["page"]) && !isset($_GET["action"])) {
    header('location:dashboard/index');
  }

  include 'public/layout/index.php';
} else {
  if (isset($_GET["page"]) && isset($_GET["action"])) {
    header('location:/zakat-fitrah');
  }

  if (isset($_POST['login'])) {
    $user = new App\User();
    $result = $user->login();
    if ($result["status"] == "success") {
      header('location:dashboard/index');
    } else {
      echo "<script>alert('{$result["message"]}');
      window.location.href = 'index.php'; </script>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Zakat Fitrah</title>
  <link rel="icon" type="image/x-icon" href="assets//dist/img/eid-mubarak.png">
  <link rel="stylesheet" href="assets/dist/css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
  <div class="login-container">
    <div class="card" id="card-login">
      <div class="card-header">
        <div class="header-title">
          <h2 class="card-title">Login Form</h2>
        </div>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-row">
            <div class="form-col">
              <div class="form-group">
                <label for="username">Username:</label>
                <input class="form-control" type="text" name="username" id="username" placeholder="Username" required />
              </div>
            </div>

            <div class="form-col">
              <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password" required />
              </div>
            </div>
          </div>

          <div class="button-login-place">
            <button type="submit" class="btn btn-primary" id="btn-login" name="login" title="Login">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</body>

</html>

<?php } ?>
