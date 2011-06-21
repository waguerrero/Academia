<?php
  $codigo = $_GET['codigo'];
  require 'banco.php';
  $Banco->query("DELETE FROM modalidades WHERE CODMODALIDADE={$codigo}");
  header("Location: modalidades.php");
?>