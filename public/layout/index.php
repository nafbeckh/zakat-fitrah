<?php

if (isset($_POST['logout'])) {
  session_destroy();
  header('location:/zakat-fitrah');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=isset($_GET['page']) ? ucfirst($_GET['page']) : ''; ?> - Zakat Fitrah</title>
  <link rel="icon" type="image/x-icon" href="<?=BASE_URL;?>/assets//dist/img/eid-mubarak.png">
  <link rel="stylesheet" href="<?=BASE_URL;?>/assets/dist/css/style.css">
  <link rel="stylesheet" href="<?=BASE_URL;?>/assets/dist/css/table.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
  
  <?php include 'sidebar.php'; ?>

  <div class="wrapper">
    <nav class="main-navbar">
      <div class="profile">
        <i class="fa fa-circle-user profile-icon"></i>
        <span class="profile-name"><?=$_SESSION['auth']['name'];?></span>
      </div>
      <div class="btn btn-default" onclick="logout()">Logout</div>
    </nav>

    <header class="main-header">
      <div class="header-img">
        <h1>Hai! Admin</h1>
        <p>Aplikasi pencatatan Zakat Fitrah sederhana.</p>
      </div>
    </header>

    <main class="main-content">
      <?php include "public/$_GET[page]/$_GET[action].php"; ?>
    </main>

    <footer class="main-footer">
      <span>&copy;2023 Zakat Fitrah, Made With <i class="fa fa-heart"></i></span>
      <a href="https://github.com/nafbeckh" target="_blank">Nafbeckh</a>
    </footer>
  </div>

  <form method="post" id="formLogout" hidden>
    <input type="text" name="logout" id="logout">
  </form>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
  <script src="<?=BASE_URL;?>/assets/dist/js/script.js"></script>

</body>
</html>