<?php
  error_reporting(E_ERROR | E_PARSE);

  $server = "127.0.0.1";
  $user = "root";
  $password = "root";
  $database = "fatec_eventos";

  $connection = mysqli_connect($server, $user, $password, $database);
  
  if (!$connection) {
    die("Erro de conexão: " . mysqli_connect_error());
  }

?>
