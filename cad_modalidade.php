<?php
  require 'banco.php';
if(count($_POST) > 0){
  extract($_POST);
  $Banco->query("INSERT INTO modalidades (DESCRICAO, MENSALIDADE_BASE) VALUES ('{$descricao}', {$mensalidade_base});", 'write');
  header("Location: index.php");
}

?>

<html>
  <head>
    <meta charset='utf-8'>
    <title>Cadastro de Modalidades</title>
  </head>
  <h2>Cadastro de Modalidades</h2>
  <div id="resposta" class="sucesso">Deu certo</div>
  <form id="cad_modalidade" action="?" method="post">
    <label>Descrição</label>
    <input type="text" name="descricao"></input>
    <label>Mensalidade</label>
    <input type="text" name="mensalidade_base"></input>
    <button>Enviar</button>
  </form>
  <a href="index.php">voltar</a>
</html>