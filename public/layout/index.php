<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=isset($_GET['page']) ? ucfirst($_GET['page']) : ''; ?> - Zakat Fitrah</title>
  <link rel="icon" type="image/x-icon" href="../assets//dist/img/eid-mubarak.png">
  <link rel="stylesheet" href="../assets/dist/css/style.css">
  <link rel="stylesheet" href="../assets/dist/css/table.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
  
  <?php include 'sidebar.php'; ?>

  <div class="wrapper">
    <nav class="main-navbar">
      <div class="profile">
        <i class="fa fa-circle-user profile-icon"></i>
        <span class="profile-name">Admin</span>
      </div>
    </nav>

    <header class="main-header">
      <div class="header-img">
        <h1>Hai! Admin</h1>
        <p>Aplikasi pencatatan Zakat Fitrah sederhana.</p>
      </div>
    </header>

    <main class="main-content">
      <?php
        if(isset($_GET['page']) && isset($_GET['action'])) {
          include "public/$_GET[page]/$_GET[action]";
        }
      ?>
    </main>

    <footer class="main-footer">
      <span>&copy;2023 Zakat Fitrah, Made With <i class="fa fa-heart"></i></span>
      <a href="https://github.com/nafbeckh" target="_blank">Nafbeckh</a>
    </footer>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>

</body>
</html>