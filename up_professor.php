<?php
  $codigo = $_GET['codigo'];
  require 'banco.php';
  $professor = $Banco->query("SELECT * FROM professores WHERE CODPROFESSOR = '{$codigo}';");
  $professor = $professor[0];
  

if(count($_POST) > 0){
  extract($_POST);
  $Banco->query("UPDATE professores SET  NOME='$nome' WHERE CODPROFESSOR='$codigo'", 'write');
  header("Location: professores.php");
}

?>

<html>
  <head>
    <meta charset='utf-8'>
    <title>Cadastro de Professores</title>
  </head>
  <h2>Cadastro de Professores</h2>
  <div id="resposta" class="sucesso">Deu certo</div>
  <form id="cad_professor" action="?codigo=<?php echo $codigo; ?>" method="post">
    <label>Nome</label>
    <input type="text" name="nome" value="<?php echo $professor['NOME']; ?>" ></input>
    <button>Enviar</button>
  </form>
  <a href="index.php">voltar</a>
</html>

