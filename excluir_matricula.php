<?php
  $codigo = $_GET['codigo'];
  $aluno = $_GET['aluno'];
  require 'banco.php';
  $Banco->query("DELETE FROM matriculas WHERE CODMATRICULA={$codigo}");
  header("Location: matriculas.php?codigo={$aluno}");
?>