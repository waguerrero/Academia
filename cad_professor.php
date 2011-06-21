<?php
  require 'banco.php';
if(count($_POST) > 0){
  extract($_POST);
  $Banco->query("INSERT INTO professores (nome) VALUES ('{$nome}');", 'write');
  header("Location: index.php");
}

?>
<html>
  <head>
    <meta charset='utf-8'>
    <title>Cadastro de Professores</title>
  </head>
  <h2>Cadastro de Professores</h2>
  <div id="resposta" class="sucesso">Deu certo</div>
  <form id="cad_professor" action="?" method="post">
    <label>Nome</label>
    <input type="text" name="nome" ></input>
    <button>Enviar</button>
  </form>
  <a href="index.php">voltar</a>
</html>