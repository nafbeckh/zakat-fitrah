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
    $sql = 'SELECT COUNT(*) FROM pembayarans';
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    
    return $stmt->execute();
  }

  public function show()
  {
    $sql = 'SELECT *, t.id AS pembayaran_id, a.nama AS nama_amil, m.nama AS nama_muzakki,
            t.created_at AS tgl_pembayaran FROM pembayarans AS t
            LEFT JOIN amils AS a ON t.amil_id = a.id
            LEFT JOIN muzakkis AS m ON t.muzakki_id = m.id
            ORDER BY tgl_pembayaran DESC';
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
    $sql = 'SELECT *, a.nama AS nama_amil, m.nama AS nama_muzakki, t.created_at AS tgl_pembayaran
            FROM pembayarans AS t
            LEFT JOIN amils AS a ON t.amil_id = a.id
            LEFT JOIN muzakkis AS m ON t.muzakki_id = m.id
            ORDER BY tgl_pembayaran DESC LIMIT 5';
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
    $jumlah_tanggungan = $_POST['pembayaran']['jumlah_tanggungan'];
    $amil_id = $_POST['pembayaran']['amil_id'];
    $jenis_bayar = $_POST['pembayaran']['jenis_bayar'];
    $beras = $_POST['pembayaran']['beras'];
    $tunai = $_POST['pembayaran']['tunai'];

    $beras = $beras != null ? $beras : 0;
    $tunai = $tunai != null ? $tunai : 0;

    $muzakki = new Muzakki();
    $muzakkiSave = $muzakki->save($_POST['muzakki']);
    if (!$muzakkiSave) {
      return ['message' => 'Gagal menyimpan data Pembayaran Zakat'];
    }

    $sql = 'INSERT INTO pembayarans (id, amil_id, muzakki_id, jumlah_tanggungan, jenis_bayar, beras, tunai)
            VALUES (:id, :amil_id, :muzakki_id, :jumlah_tanggungan, :jenis_bayar, :beras, :tunai)';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':amil_id', $amil_id);
    $stmt->bindParam(':muzakki_id', $muzakkiSave);
    $stmt->bindParam(':jumlah_tanggungan', $jumlah_tanggungan);
    $stmt->bindParam(':jenis_bayar', $jenis_bayar);
    $stmt->bindParam(':beras', $beras);
    $stmt->bindParam(':tunai', $tunai);
    $stmt->execute();

    return ['message' => 'Berhasil menyimpan data Pembayaran Zakat'];
  }

  public function delete($id)
  {
    $sql = 'DELETE FROM pembayarans WHERE id = :id';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return ['message' => 'Berhasil menghapus data Pembayaran Zakat'];
  }

  public function totalZakat()
  {
    $sql = 'SELECT SUM(beras) AS beras, SUM(tunai) AS tunai  FROM pembayarans';
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetch();
    
    $this->beras = $data['beras'] ?? 0;
    $this->tunai = $data['tunai'] ?? 0;
  }
}

?>
