<?php
  $server = "127.0.0.1";
  $user = "root";
  $password = "";
  $database = "fatec_eventos";

  $connection = mysqli_connect($server, $user, $password, $database);
  
  if (!$connection) {
    die("Erro de conexão: " . mysqli_connect_error());
  }

?>
