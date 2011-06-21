<?php
  $codigo = $_GET['codigo'];
  require 'banco.php';
  $Banco->query("DELETE FROM turmas WHERE CODTURMA={$codigo}");
  header("Location: turmas.php");
?>