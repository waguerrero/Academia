<?php
  $codigo = $_GET['codigo'];
  require 'banco.php';
  include '/includes/header.php';
  $aluno = $Banco->query("SELECT * FROM alunos WHERE CODALUNO = '{$codigo}';");
  $aluno = $aluno[0];
  

if(count($_POST) > 0){
  extract($_POST);
  $Banco->query("UPDATE alunos SET  NOME='$nome', ENDERECO='$endereco', TELEFONE='$telefone' WHERE CODALUNO='$codigo'", 'write');
  header("Location: alunos.php");
}

?>


<html>
  <head>
    <meta charset='utf-8'>
    <title>Cadastro de Alunos</title>
  </head>
  <h2>Cadastro de Alunos</h2>
  <div id="resposta" class="sucesso">Deu certo</div>
  <form id="cad_aluno" action="?codigo=<?php echo $codigo; ?>" method="post">
    <label>Nome</label>
    <input type="text" name="nome" required="true" value="<?php echo $aluno['NOME']; ?>"></input>
    <label>Endereço</label>
    <input type="text" name="endereco" required="true" value="<?php echo $aluno['ENDERECO']; ?>"></input>
    <label>Telefone</label>
    <input type="text" name="telefone" required="true" value="<?php echo $aluno['TELEFONE']; ?>"></input>
    <button>Enviar</button>
  </form>
  <a href="index.php">voltar</a>
<?php
  include '/includes/footer.php';
?>