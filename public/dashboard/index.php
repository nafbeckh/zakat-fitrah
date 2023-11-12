<?php

$amil = new App\Amil();
$muzakki = new App\Muzakki();
$pembayaran = new App\Pembayaran();
$rows = $pembayaran->dashboard();
$pembayaran->totalZakat();

require_once 'utils/rupiah.php';

?>

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-icon">
            <i class="fa fa-users"></i>
          </div>
          <div class="col-detail">
            <p>Total Amil</p>
            <h2><?= $amil->count(); ?></h2>
          </div>
        </div>
      </div>

    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-icon">
            <i class="fa fa-hand-holding-dollar"></i>
          </div>
          <div class="col-detail">
            <p>Total Muzakki</p>
            <h2><?= $muzakki->count(); ?></h2>
          </div>
        </div>
      </div>

    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-icon">
            <i class="fa fa-sack-dollar"></i>
          </div>

          <div class="col-detail">
            <p>Total Beras</p>
            <h2><?=$pembayaran->beras; ?>Kg</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-icon">
            <i class="fa fa-dollar-sign"></i>
          </div>

          <div class="col-detail">
            <p>Total Tunai</p>
            <h2>Rp<?= rupiahSingkat($pembayaran->tunai); ?></h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="card">
      <div class="card-header">
        <div class="header-title">
          <h4 class="card-title">Pembayaran Zakat Terbaru</h4>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col" align="left">Tanggal</th>
              <th scope="col" align="left">Muzakki</th>
              <th scope="col" align="left">Amil</th>
              <th scope="col" align="right">Beras</th>
              <th scope="col" align="right">Tunai</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($rows as $row) { ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= date('d/m/Y H:i:s', strtotime($row['tgl_pembayaran'])); ?></td>
                <td><?= $row['nama_muzakki']; ?></td>
                <td><?= $row['nama_amil']; ?></td>
                <td align="right"><?= $row['beras']; ?></td>
                <td align="right"><?= rupiah($row['tunai']); ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>