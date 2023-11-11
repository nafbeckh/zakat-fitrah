<?php

$amil = new App\Amil();
$rows = $amil->show();

include "delete.php";

?>

<div class="content">
  <div class="content-header">
    <div class="header-item">
      <h2>Amil</h2>
    </div>
    <div class="header-item">
      <ul class="breadcrumb">
        <li><a href="../dashboard/index">Home</a></li>
        <li>Amil</li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="card">
      <div class="card-header">
        <div class="header-title">
          <h4 class="card-title">Data Amil</h4>
        </div>
      </div>
      <div class="card-body">
        <div class="button-place">
          <a href="create" class="btn btn-primary mb-4" title="Tambah">Tambah Amil</a>
        </div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col" align="left">Nama</th>
              <th scope="col" align="left">Nomor HP</th>
              <th scope="col" align="left">Alamat</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($rows as $row) { ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['no_hp']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td align="center">
                  <a href="update/<?= $row['id']; ?>" class="btn btn-success btn-href" title="Edit"><i class="fa fa-pencil"></i></a>
                  <button class="btn btn-danger" onclick="deleteAmil('<?=$row['id']; ?>')" title="Hapus"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<form method="post" id="formDelete" hidden>
  <input type="text" name="id" id="id">
</form>

<script>
  const deleteAmil = (id) => {
    let form = document.getElementById("formDelete");
    let input = document.getElementById("id");

    let result = confirm("Apakah anda ingin menghapus data ini?");

    if (result) {
      input.value = id
      form.submit()
    }
  }
</script>
