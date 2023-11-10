<?php

namespace App\Services;

use Config\Connection;
use Hidehalo\Nanoid\Client;

class Muzakki extends Connection
{
  public function count()
  {
    $sql = "SELECT COUNT(*) FROM muzakkis";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    
    return $stmt->execute();
  }

  public function show()
  {
    $sql = "SELECT * FROM muzakkis ORDER BY nama ASC";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    
    $data = [];

    while ($rows = $stmt->fetch()) {
      $data[] = $rows;
    }

    return $data;
  }

  public function save()
  {
    $client = new Client();
    $id = $client->generateId($size = 16, $mode = Client::MODE_DYNAMIC);
    $nama = $_POST["nama"];
    $no_hp = $_POST["no_hp"];
    $alamat = $_POST["alamat"];

    $sql = "INSERT INTO muzakkis (id, nama, no_hp, alamat) VALUES (:id, :nama, :no_hp, :alamat)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":nama", $nama);
    $stmt->bindParam(":no_hp", $no_hp);
    $stmt->bindParam(":alamat", $alamat);
    $stmt->execute();

    return ['message' => 'Berhasil menyimpan data Muzakki'];
  }

  public function edit($id)
  {
    $sql = "SELECT * FROM muzakkis WHERE id = $id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    
    if ($stmt->rowCount() == 0) {
      throw new Exception("Id tidak ditemukan");
    }

    return $stmt->fetch();
  }

  public function update($id)
  {
    $nama = $_POST["nama"];
    $no_hp = $_POST["no_hp"];
    $alamat = $_POST["alamat"];

    $sql = "UPDATE muzakkis SET nama = :nama, no_hp = :no_hp, alamat = :alamat WHERE id = $id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":nama", $nama);
    $stmt->bindParam(":no_hp", $no_hp);
    $stmt->bindParam(":alamat", $alamat);
    $stmt->execute();

    return ['message' => 'Berhasil mengubah data Muzakki'];
  }

  public function delete($id)
  {
    $sql = "DELETE FROM muzakkis WHERE id = $id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    return ['message' => 'Berhasil menghapus data Muzakki'];
  }
}

?>
