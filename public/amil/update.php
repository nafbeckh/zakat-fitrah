<?php

$amil = new App\Amil();

if (isset($_GET["id"])) {
  $row = $amil->edit($_GET["id"]);
} else {
  // header('location:amil/index');
}

if (isset($_POST["update"])) {
  $result = $amil->update($_GET["id"]);

  echo "<script>alert('{$result["message"]}');
        window.location.href = 'index.php?page=amil&action=update.php&id={$_GET["id"]}'; </script>";
}

?>

<div class="content">
  <div class="content-header">
    <div class="header-item">
      <h2>Amil</h2>
    </div>
    <div class="header-item">
      <ul class="breadcrumb">
        <li><a href="../../dashboard/index">Home</a></li>
        <li><a href="../index">Amil</a></li>
        <li>Edit</li>
      </ul>
    </div>
  </div>

  <div class="content">
    <div class="container" style="width: 50%;">
      <div class="card">
        <div class="card-header">
          <div class="header-title">
            <h4 class="card-title">Form Amil</h4>
          </div>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-row">
              <div class="form-col">
                <div class="form-group">
                  <label for="nama">Nama:</label>
                  <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama Amil" value="<?=$row['nama'];?>" required />
                </div>
              </div>
              <div class="form-col">
                <div class="form-group">
                  <label for="no_hp">Nomor HP:</label>
                  <input class="form-control" type="text" name="no_hp" id="no_hp" placeholder="Nomor HP" value="<?=$row['no_hp'];?>" required />
                </div>
              </div>
              <div class="form-col">
                <div class="form-group">
                  <label for="alamat">Alamat:</label>
                  <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Alamat"><?=$row['alamat'];?></textarea>
                </div>
              </div>
            </div>
            <div class="button-place">
              <button type="reset" class="btn btn-default" title="Reset">Reset</button>
              <button type="submit" class="btn btn-success" name="update" title="Simpan">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
