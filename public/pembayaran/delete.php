<?php

if (isset($_POST["id"])) {
  $result = $pembayaran->delete($_POST["id"]);

  echo "<script>alert('{$result["message"]}');
        window.location.href = 'index'; </script>";
}

?>