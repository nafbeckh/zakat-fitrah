<?php

$pembayaran = new App\Pembayaran();
$rows = $pembayaran->show();
$pembayaran->totalZakat();

require_once 'utils/rupiah.php';

include "delete.php";

?>

<div class="content">
  <div class="content-header">
    <div class="header-item">
      <h2>Pembayaran Zakat</h2>
    </div>
    <div class="header-item">
      <ul class="breadcrumb">
        <li><a href="../dashboard/index">Home</a></li>
        <li>Pembayaran Zakat</li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="card">
      <div class="card-header">
        <div class="header-title">
          <h4 class="card-title">Data Pembayaran Zakat</h4>
        </div>
      </div>
      <div class="card-body">
        <div class="button-place">
          <a href="create" class="btn btn-primary mb-4" title="Tambah">Tambah Pembayaran</a>
        </div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col" align="left">Tanggal</th>
              <th scope="col" align="left">Muzakki</th>
              <th scope="col" align="left">Amil</th>
              <th scope="col" align="center">Jumlah Tanggungan</th>
              <th scope="col" align="left">Jenis Pembayaran</th>
              <th scope="col" align="right">Beras</th>
              <th scope="col" align="right">Tunai</th>
              <th scope="col">Aksi</th>
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
                <td align="center"><?= $row['jumlah_tanggungan']; ?> Org</td>
                <td><?= $row['jenis_bayar']; ?></td>
                <td align="right"><?= $row['beras']; ?></td>
                <td align="right"><?= rupiah($row['tunai']); ?></td>
                <td align="center">
                  <button class="btn btn-danger" onclick="deleteRow('<?=$row['id']; ?>')" title="Hapus"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            <?php } ?>
            <tr>
              <th align="right" colspan="6">Total</th>
              <td align="right"><?= $pembayaran->beras; ?>Kg</td>
              <td align="right">Rp<?= rupiah($pembayaran->tunai); ?></td>
            </tr>
        </table>
      </div>
    </div>
  </div>
</div>

<form method="post" id="formDelete" hidden>
  <input type="text" name="id" id="id">
</form>
