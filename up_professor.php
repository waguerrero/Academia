<?php
  $codigo = $_GET['codigo'];
  require 'banco.php';
  include '/includes/header.php';
  $professor = $Banco->query("SELECT * FROM professores WHERE CODPROFESSOR = '{$codigo}';");
  $professor = $professor[0];
  

if(count($_POST) > 0){
  extract($_POST);
  $Banco->query("UPDATE professores SET  NOME='$nome' WHERE CODPROFESSOR='$codigo'", 'write');
  header("Location: professores.php");
}

?>

  <h2>Cadastro de Professores</h2>
  <div id="resposta" class="sucesso">Deu certo</div>
  <form id="cad_professor" action="?codigo=<?php echo $codigo; ?>" method="post">
    <label>Nome</label>
    <input type="text" name="nome" value="<?php echo $professor['NOME']; ?>" ></input>
    <button>Enviar</button>
  </form>
  <a href="index.php">voltar</a>
<?php
  include '/includes/footer.php';
?>

