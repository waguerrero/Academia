<?php

$Banco = new Banco;

class Banco{
  
  var $database = array(
    'host' => '127.0.0.1',
		'login' => 'root',
		'password' => 'wag1604',
		'database' => 'academia',
  );
  
  function __construct(){
    $this->dbConnect();
  }
  
  function query($query, $method = 'read'){
    if($method == 'write'){
      @mysql_query($query);
      return true;
    } else {
      $select = @mysql_query($query);
      $i = 0;
      while($row = @mysql_fetch_array($select, MYSQL_ASSOC)) {
        $results[$i] = $row;
        $i++;
      }
      if($i == 0) $results = 0;
      return($results);
    }
  }
  
  function dbConnect(){
    if(is_array($this->database)){
      $database = $this->database;
      $connection = @mysql_connect($database['host'], $database['login'], $database['password']) or die ('Erro ao conectar-se ao servidor My-SQL.');
      @mysql_select_db($database['database']) or die ('Erro ao conectar-se ao banco de dados.');
		} else {
      echo 'Faltando configurações do banco de dados.';
      exit(0);
    }
  }
  
}

function pr($array){
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

?>