<?php
  $codigo = $_GET['codigo'];
  require 'banco.php';
  $modalidade = $Banco->query("SELECT * FROM modalidades WHERE CODMODALIDADE = '{$codigo}';");
  $modalidade = $modalidade[0];
  

if(count($_POST) > 0){
  extract($_POST);
  $Banco->query("UPDATE modalidades SET  DESCRICAO='$descricao', MENSALIDADE_BASE='$mensalidade_base' WHERE CODMODALIDADE='$codigo'", 'write');
  header("Location: modalidades.php");
}

?>

<html>
  <head>
    <meta charset='utf-8'>
    <title>Cadastro de Modalidades</title>
  </head>
  <h2>Cadastro de Modalidades</h2>
  <div id="resposta" class="sucesso">Deu certo</div>
  <form id="cad_modalidade" action="?codigo=<?php echo $codigo; ?>" method="post">
    <label>Descrição</label>
    <input type="text" name="descricao" value="<?php echo $modalidade['DESCRICAO']; ?>"></input>
    <label>Mensalidade</label>
    <input type="text" name="mensalidade_base" value="<?php echo $modalidade['MENSALIDADE_BASE']; ?>"></input>
    <button>Enviar</button>
  </form>
  <a href="index.php">voltar</a>
</html>