<?php
  $codigo = $_GET['codigo'];
  require 'banco.php';
  $Banco->query("DELETE FROM matriculas WHERE CODMATRICULA={$codigo}");
  header("Location: matriculas.php?codigo=<?php echo {$codigo}; ?>");
?>