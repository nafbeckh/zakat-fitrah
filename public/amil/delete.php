<?php

if (isset($_POST["id"])) {
  $result = $amil->delete($_POST["id"]);

  $url = BASE_URL. '/amil/index';
  echo "<script>alert('{$result["message"]}');
        window.location.href = '$url'; </script>";
}

?>