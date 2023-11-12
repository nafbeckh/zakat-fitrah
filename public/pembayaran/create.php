<?php

$pembayaran = new App\Pembayaran();
$amil = new App\Amil();

$amilItems = $amil->show();

if (isset($_POST['create'])) {
  $result = $pembayaran->save();

  echo "<script>alert('{$result["message"]}');
        window.location.href = 'index'; </script>";
}

?>

<div class="content">
  <div class="content-header">
    <div class="header-item">
      <h2>Pembayaran Zakat</h2>
    </div>
    <div class="header-item">
      <ul class="breadcrumb">
        <li><a href="../dashboard/index">Home</a></li>
        <li><a href="index">Pembayaran Zakat</a></li>
        <li>Tambah Baru</li>
      </ul>
    </div>
  </div>

  <div class="content">
    <form action="" method="post">
      <div class="container-fluid">
        <div class="card card-zakat">
          <div class="card-header">
            <div class="header-title">
              <h4 class="card-title">Form Muzakki</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-col">
                <div class="form-group">
                  <label for="nama">Nama:</label>
                  <input class="form-control" type="text" name="muzakki[nama]" id="nama" placeholder="Nama Muzakki" required />
                </div>
              </div>
              <div class="form-col">
                <div class="form-group">
                  <label for="no_hp">Nomor HP:</label>
                  <input class="form-control" type="text" name="muzakki[no_hp]" id="no_hp" placeholder="Nomor HP" />
                </div>
              </div>
              <div class="form-col">
                <div class="form-group">
                  <label for="alamat">Alamat:</label>
                  <textarea class="form-control" name="muzakki[alamat]" id="alamat" rows="5" placeholder="Alamat"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-zakat">
          <div class="card-header">
            <div class="header-title">
              <h4 class="card-title">Form Pembayaran Zakat</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-col">
                <div class="form-group">
                  <label for="amil_id">Amil:</label>
                  <select class="form-control" name="pembayaran[amil_id]" id="amil_id">
                    <option value="">-- Pilih --</option>
                    <?php foreach ($amilItems as $item) { ?>
                      <option value="<?= $item['id']; ?>"><?= $item['nama']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-col">
                <div class="form-group">
                  <label for="jumlah_tanggungan">Jumlah Tanggungan:</label>
                  <input class="form-control" type="text" name="pembayaran[jumlah_tanggungan]" id="jumlah_tanggungan" autocomplete="off" placeholder="Jumlah Tanggungan" required />
                </div>
              </div>
              <div class="form-col">
                <div class="form-group">
                  <label for="jenis_bayar">Jenis Bayar:</label>
                  <select class="form-control" name="pembayaran[jenis_bayar]" id="jenis_bayar" onchange="jenisBayar()">
                    <option value="">-- Pilih --</option>
                    <option value="Beras">Beras</option>
                    <option value="Tunai">Tunai</option>
                  </select>
                </div>
              </div>
              <div class="form-col jenis-bayar" id="Beras">
                <div class="form-group">
                  <label for="beras">Beras:</label>
                  <input class="form-control" type="text" name="pembayaran[beras]" id="beras" placeholder="0" autocomplete="off" />
                </div>
              </div>
              <div class="form-col jenis-bayar" id="Tunai">
                <div class="form-group">
                  <label for="tunai">Tunai:</label>
                  <input class="form-control" type="text" name="pembayaran[tunai]" id="tunai" placeholder="0" autocomplete="off" />
                </div>
              </div>
            </div>
            <div class="button-place">
              <button type="reset" class="btn btn-default" title="Reset">Reset</button>
              <button type="submit" class="btn btn-success" name="create" title="Simpan">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>