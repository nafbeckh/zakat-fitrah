<?php

if (isset($_POST["id"])) {
  $result = $muzakki->delete($_POST["id"]);

  echo "<script>alert('{$result["message"]}');
        window.location.href = 'index'; </script>";
}

?>