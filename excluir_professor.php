<?php
  $codigo = $_GET['codigo'];
  require 'banco.php';
  $Banco->query("DELETE FROM professores WHERE CODPROFESSOR={$codigo}");
  header("Location: professores.php");
?>