<?php
  require 'banco.php';
  include '/includes/header.php';
if(count($_POST) > 0){
  extract($_POST);
  $Banco->query("INSERT INTO professores (nome) VALUES ('{$nome}');", 'write');
  header("Location: index.php");
}

?>

  <h2>Cadastro de Professor</h2>
  <form id="cad_professor" action="?" method="post">
    <label>Nome</label>
    <input type="text" name="nome" ></input>
    <button>Enviar</button>
  </form>
  <a href="index.php">voltar</a>
  
<?php
  include '/includes/footer.php';
?>