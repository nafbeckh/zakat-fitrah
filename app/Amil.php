<?php

namespace App;

use Config\Connection;
use Hidehalo\Nanoid\Client;

class Amil extends Connection
{
  public function count()
  {
    $sql = 'SELECT COUNT(*) FROM amils';
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchColumn();
  }

  public function show()
  {
    $sql = 'SELECT * FROM amils ORDER BY nama ASC';
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
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $sql = 'INSERT INTO amils (id, nama, no_hp, alamat) VALUES (:id, :nama, :no_hp, :alamat)';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':no_hp', $no_hp);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->execute();

    return ['message' => 'Berhasil menyimpan data Amil'];
  }

  public function edit($id)
  {
    $sql = 'SELECT * FROM amils WHERE id = :id';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    if ($stmt->rowCount() == 0) {
      throw new \Exception('Id tidak ditemukan');
    }

    return $stmt->fetch();
  }

  public function update($id)
  {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $updated_at = date('Y-m-d H:i:s');

    $sql = 'UPDATE amils SET nama = :nama, no_hp = :no_hp, alamat = :alamat,
            updated_at = :updated_at WHERE id = :id';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':no_hp', $no_hp);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':updated_at', $updated_at);
    $stmt->execute();

    return ['message' => 'Berhasil mengubah data Amil'];
  }

  public function delete($id)
  {
    $sql = 'DELETE FROM amils WHERE id = :id';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return ['message' => 'Berhasil menghapus data Amil'];
  }
}

?>
