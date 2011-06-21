<?php
  $codigo = $_GET['codigo'];
  require 'banco.php';
  $Banco->query("DELETE FROM alunos WHERE CODALUNO={$codigo}");
  header("Location: alunos.php");
?>