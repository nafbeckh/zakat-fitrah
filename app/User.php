<?php

namespace App;

use Config\Connection;

class User extends Connection
{

  public function login()
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = 'SELECT username, nama, password FROM users WHERE username = :username';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if (!$stmt->rowCount() > 0) {
      return [
        "status" => "fail",
        "message" => "Username atau Password ada salah"
      ];
    }

    $user = $stmt->fetch();

    $verifyPassword = password_verify($password, $user['password']);

    if (!$verifyPassword) {
      return [
        "status" => "fail",
        "message" => "Username atau Password ada salah"
      ];
    }

    $_SESSION['auth']['username'] = $user['username'];
    $_SESSION['auth']['name'] = $user['nama'];

    return ["status" => "success"];
  }
}

?>
