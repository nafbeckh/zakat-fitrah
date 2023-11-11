<?php

namespace App;

use Config\Connection;
use Hidehalo\Nanoid\Client;

class Pembayaran extends Connection
{
  public float $beras;
  public int $tunai;

  public function count()
  {
    $sql = "SELECT COUNT(*) FROM pembayarans";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    
    return $stmt->execute();
  }

  public function show()
  {
    $sql = "SELECT *, a.nama AS nama_amil, m.nama AS nama_muzakki, t.created_at AS tgl_pembayaran
            FROM pembayarans AS t
            LEFT JOIN amils AS a ON t.amil_id = a.id
            LEFT JOIN muzakkis AS m ON t.muzakki_id = m.id
            ORDER BY tgl_pembayaran DESC";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    
    $data = [];

    while ($rows = $stmt->fetch()) {
      $data[] = $rows;
    }

    return $data;
  }

  public function dashboard()
  {
    $sql = "SELECT *, a.nama AS nama_amil, m.nama AS nama_muzakki, t.created_at AS tgl_pembayaran
            FROM pembayarans AS t
            LEFT JOIN amils AS a ON t.amil_id = a.id
            LEFT JOIN muzakkis AS m ON t.muzakki_id = m.id
            ORDER BY tgl_pembayaran DESC LIMIT 5";
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
      throw new \Exception("Id tidak ditemukan");
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

  public function totalZakat()
  {
    $sql = "SELECT SUM(beras) AS beras, SUM(tunai) AS tunai  FROM pembayarans";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetch();
    
    $this->beras = $data['beras'];
    $this->tunai = $data['tunai'];
  }
}

?>
