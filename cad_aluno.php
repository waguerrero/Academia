<?php
  require 'banco.php';
  include '/includes/header.php';
if(count($_POST) > 0){
  extract($_POST);
  $Banco->query("INSERT INTO alunos (NOME, ENDERECO, TELEFONE) VALUES ('{$nome}', '{$endereco}', '{$telefone}');", 'write');
  header("Location: alunos.php");
}

?>

  <h2>Cadastro de Alunos</h2>
  <div id="resposta" class="sucesso">Deu certo</div>
  <form id="cad_aluno" action="?" method="post">
    <label>Nome</label>
    <input type="text" name="nome" required="true"></input>
    <label>Endereço</label>
    <input type="text" name="endereco" required="true"></input>
    <label>Telefone</label>
    <input type="text" name="telefone" required="true"></input>
    <button>Enviar</button>
  </form>
  <a href="index.php">voltar</a>
  
<?php
  include '/includes/footer.php';
?>