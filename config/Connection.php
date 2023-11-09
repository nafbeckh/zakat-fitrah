<?php

namespace Config;

class Connection
{
  public object $db;

  public function __construct()
  {
    $this->db = new \PDO("mysql:host=localhost;dbname=zakat-fitrah", "root", null);
  }
}

?>
