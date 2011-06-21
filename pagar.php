<?php

require 'banco.php';

$codigo = $_GET['codigo'];
$hoje = date("Y-m-d");

$fatura = $Banco->query("SELECT * FROM faturas WHERE CODFATURA = {$codigo}");

if(isset($fatura[0])){
  $Banco->query("UPDATE faturas SET DATA_PGTO = '{$hoje}' WHERE CODFATURA = {$fatura[0]['CODFATURA']};");
}

header("Location: faturas.php");

?>