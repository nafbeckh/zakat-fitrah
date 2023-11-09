<?php

namespace App\Services;

use App\Config\Connection;
use Hidehalo\Nanoid\Client;

class Pembayaran extends Connection
{
  public function show()
  {
    $sql = "SELECT * FROM pembayarans ORDER BY created_at DESC";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    
    $data = [];

    while ($rows = $stmt->fetch()) {
      $data[] = $rows;
    }

    return $data;
  }

  public function save($amil_id, $muzakki_id)
  {
    $client = new Client();
    $id = $client->generateId($size = 16, $mode = Client::MODE_DYNAMIC);
    $jumlah_tanggungan = $_POST["jumlah_tanggungan"];
    $jenis_bayar = $_POST["jenis_bayar"];
    $beras = $_POST["beras"];
    $tunai = $_POST["tunai"];

    $sql = "INSERT INTO pembayarans (id, amil_id, muzakki_id, jumlah_tanggungan, jenis_bayar, beras, tunai)
            VALUES (:id, :amil_id, :muzakki_id, :jumlah_tanggungan, :jenis_bayar, :beras, :tunai)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":amil_id", $amil_id);
    $stmt->bindParam(":muzakki_id", $muzakki_id);
    $stmt->bindParam(":jumlah_tanggungan", $jumlah_tanggungan);
    $stmt->bindParam(":jenis_bayar", $jenis_bayar);
    $stmt->bindParam(":beras", $beras);
    $stmt->bindParam(":tunai", $tunai);
    $stmt->execute();

    return ['message' => 'Berhasil menyimpan data Pembayaran Zakat'];
  }

  public function edit($id)
  {
    $sql = "SELECT * FROM pembayarans WHERE id = $id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    
    if ($stmt->rowCount() == 0) {
      throw new Exception("Id tidak ditemukan");
    }

    return $stmt->fetch();
  }

  public function update($id)
  {
    $amil_id = $_POST["amil_id"];
    $muzakki_id = $_POST["muzakki_id"];
    $jumlah_tanggungan = $_POST["jumlah_tanggungan"];
    $jenis_bayar = $_POST["jenis_bayar"];
    $beras = $_POST["beras"];
    $tunai = $_POST["tunai"];
    $updated_at = date("Y-m-d H:i:s");

    $sql = "UPDATE pembayarans SET amil_id = :amil_id, muzakki_id = :muzakki_id,
            jumlah_tanggungan = :jumlah_tanggungan, jenis_bayar = :jenis_bayar,
            beras = :beras, tunai = :tunai, updated_at = :updated_at WHERE id = $id";

    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":amil_id", $amil_id);
    $stmt->bindParam(":muzakki_id", $muzakki_id);
    $stmt->bindParam(":jumlah_tanggungan", $jumlah_tanggungan);
    $stmt->bindParam(":jenis_bayar", $jenis_bayar);
    $stmt->bindParam(":beras", $beras);
    $stmt->bindParam(":tunai", $tunai);
    $stmt->bindParam(":updated_at", $updated_at);
    $stmt->execute();

    return ['message' => 'Berhasil mengubah data Pembayaran Zakat'];
  }

  public function delete($id)
  {
    $sql = "DELETE FROM pembayarans WHERE id = $id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    return ['message' => 'Berhasil menghapus data Pembayaran Zakat'];
  }
}

?>
