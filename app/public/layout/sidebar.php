<aside class="main-sidebar">
    <div class="sidebar-header">
      <a href="index.html">
        <h3 class="logo-title">Zakat Fitrah</h3>
      </a>
    </div>
    <div class="sidebar-body">
      <div class="scroll-content">
        <div class="sidebar-list">
          <ul class="sidebar-nav">
            <li class="nav-item" id="static-item">
              <a class="nav-link" href="#">
                <span>Home</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" <?= ($_GET['page'] == 'dashboard') ? 'id="active"' : '' ; ?> href="../dashboard/index">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="nav-item" id="static-item">
              <a class="nav-link" href="#">
                <span>Master Data</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" <?= ($_GET['page'] == 'amil') ? 'id="active"' : '' ; ?> href="../amil/index">
                <i class="fa fa-users"></i>
                <span>Amil</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" <?= ($_GET['page'] == 'muzakki') ? 'id="active"' : '' ; ?> href="../muzakki/index">
                <i class="fa fa-hand-holding-dollar"></i>
                <span>Muzakki</span>
              </a>
            </li>
            <li class="nav-item" id="static-item">
              <a class="nav-link" href="#">
              <span>Transaksi</span>
            </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" <?= ($_GET['page'] == 'pembayaran') ? 'id="active"' : '' ; ?> href="../pembayaran/index">
                <i class="fa fa-comments-dollar"></i>
                <span>Pembayaran Zakat</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </aside>