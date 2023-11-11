<?php

$muzakki = new App\Muzakki();

if (isset($_POST['create'])) {
  $result = $muzakki->save();

  echo "<script>alert('{$result["message"]}');
        window.location.href = 'index'; </script>";
}

?>

<div class="content">
  <div class="content-header">
    <div class="header-item">
      <h2>Muzakki</h2>
    </div>
    <div class="header-item">
      <ul class="breadcrumb">
        <li><a href="../dashboard/index">Home</a></li>
        <li><a href="index">Muzakki</a></li>
        <li>Tambah Baru</li>
      </ul>
    </div>
  </div>

  <div class="content">
    <div class="container" style="width: 50%;">
      <div class="card">
        <div class="card-header">
          <div class="header-title">
            <h4 class="card-title">Form Muzakki</h4>
          </div>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-row">
              <div class="form-col">
                <div class="form-group">
                  <label for="nama">Nama:</label>
                  <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama Muzakki" required />
                </div>
              </div>
              <div class="form-col">
                <div class="form-group">
                  <label for="no_hp">Nomor HP:</label>
                  <input class="form-control" type="text" name="no_hp" id="no_hp" placeholder="Nomor HP" required />
                </div>
              </div>
              <div class="form-col">
                <div class="form-group">
                  <label for="alamat">Alamat:</label>
                  <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Alamat"></textarea>
                </div>
              </div>
            </div>
            <div class="button-place">
              <button type="reset" class="btn btn-default" title="Reset">Reset</button>
              <button type="submit" class="btn btn-success" name="create" title="Simpan">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>