<?php
  require 'banco.php';
  include '/includes/header.php';
if(count($_POST) > 0){
  extract($_POST);
  $Banco->query("INSERT INTO modalidades (DESCRICAO, MENSALIDADE_BASE) VALUES ('{$descricao}', {$mensalidade_base});", 'write');
  header("Location: index.php");
}

?>


  <h2>Nova Modalidade</h2>
  <form id="cad_modalidade" action="?" method="post">
    <label>Descrição</label>
    <input type="text" name="descricao"></input>
    <label>Mensalidade</label>
    <input type="text" name="mensalidade_base"></input>
    <button>Enviar</button>
  </form>
  <a href="index.php">voltar</a>

<?php
  include '/includes/footer.php';
?>