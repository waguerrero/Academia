<?php
  require 'banco.php';
  $codigo = $_GET['codigo'];
  $aluno = $Banco->query("SELECT * FROM alunos WHERE CODALUNO = '{$codigo}';");
  $aluno = $aluno[0];
  $turmas=$Banco->query("SELECT * FROM turmas");
if(count($_POST) > 0){
  extract($_POST);
  if (!empty($data_inicio)) {
    $data_inicio = explode('/', $data_inicio);
    $data_inicio = $data_inicio[2].'-'.$data_inicio[1].'-'.$data_inicio[0];
  }
  $Banco->query("INSERT INTO matriculas (CODTURMA, DATA_INICIO, CODALUNO) VALUES ('{$turma}', '{$data_inicio}', '{$codigo}');", 'write');
  echo mysql_error();
  header("Location: alunos.php");
}

?>


<html>
  <head>
    <link href="_style/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="_scripts/jquery.js"></script>
    <script type="text/javascript" src="_scripts/jquery.click-calendario-1.0-min.js"></script>
    <meta charset='utf-8'>
    <title>Matricula</title>
  </head>
  <body>
    <h2>Matricula em modalidade</h2>
    <form id="matriculas" action="?codigo=<?php echo $codigo; ?>" method="post">
      <label>Turma</label>
      <select name="turma" required="true">
  <?php foreach($turmas as $turma): ?>
  <?php
    $alunos = $Banco->query("SELECT * FROM matriculas WHERE CODTURMA = {$turma['CODTURMA']}");
    if ($alunos != 0) $alunos = count($alunos);
    if ($alunos >= $turma['MAX_VAGAS']) continue;
  ?>
        <option value="<?php echo $turma['CODTURMA']; ?>"><?php echo $turma['DESCRICAO']; ?>: <?php echo $turma['HORA_INICIO']; ?> ás <?php echo $turma['HORA_TERMINO']; ?></option>
  <?php endforeach; ?>
      </select>
      <label>Data de inicio</label>
      <input type="text" name="data_inicio" required="true" id="data_1" size="10" maxlength="10"/>
      <button>Enviar</button>
    </form>
    <a href="index.php">voltar</a>
    <script>
      /* Javascript */
      $('#data_1').focus(function(){
              $(this).calendario({
                      target:'#data_1'
              });
      });
    </script>
  </body>
</html>