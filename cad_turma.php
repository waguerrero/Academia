<?php
  require 'banco.php';
  include '/includes/header.php';
if(count($_POST) > 0){
  extract($_POST);
  $Banco->query("INSERT INTO turmas (DESCRICAO, CODDIA, HORA_INICIO, HORA_TERMINO, MAX_VAGAS, CODMODALIDADE, CODPROFESSOR) VALUES ('{$descricao}', '{$coddia}', '{$hora_inicio}', '{$hora_termino}', '{$max_vagas}', '{$codmodalidade}', '{$codprofessor}');", 'write');
  header("Location: index.php");
}
$dias=$Banco->query("SELECT * FROM dias_semana");
$modalidades=$Banco->query("SELECT * FROM modalidades");
$professores=$Banco->query("SELECT * FROM professores");

echo mysql_error();
?>

  <h2>Cadastro de Turmas</h2>
  <form id="cad_turma" action="?" method="post">
    <label>Descrição</label>
    <input type="text" name="descricao" required="true" />
    <label>Dia</label>
    <select name="coddia" required="true">
<?php foreach($dias as $dia): ?>
      <option value="<?php echo $dia['CODDIA']; ?>"><?php echo $dia['DESCRICAO']; ?></option>
<?php endforeach; ?>
    </select>
    <label>Horario</label>
    <input name="hora_inicio" required="true"></input>
    ás
    <input name="hora_termino" required="true"></input>
    <label>Maximo de vagas</label>
    <input type="number" name="max_vagas" required="true" min="1" />
    <label>Modalidade</label>
    <select name="codmodalidade" required="true">
<?php foreach($modalidades as $modalidade): ?>
      <option value="<?php echo $modalidade['CODMODALIDADE']; ?>"><?php echo $modalidade['DESCRICAO']; ?></option>
<?php endforeach; ?>
    </select>
    <label>Professor</label>
    <select name="codprofessor" required="true">
<?php foreach($professores as $professor): ?>
      <option value="<?php echo $professor['CODPROFESSOR']; ?>"><?php echo $professor['NOME']; ?></option>
<?php endforeach; ?>
    </select>
    <button>Enviar</button>
  </form>
  <a href="index.php">voltar</a>
<?php
  include '/includes/footer.php';
?>