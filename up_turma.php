<?php
  $codigo = $_GET['codigo'];
  require 'banco.php';
  include '/includes/header.php';
  $turma = $Banco->query("SELECT * FROM turmas WHERE CODTURMA = '{$codigo}';");
  $turma = $turma[0];
  

if(count($_POST) > 0){
  extract($_POST);
  $Banco->query("UPDATE turmas SET  DESCRICAO='$descricao', CODDIA='$coddia', HORA_INICIO='$hora_inicio', HORA_TERMINO='$hora_termino', MAX_VAGAS='$max_vagas', CODMODALIDADE='$codmodalidade', CODPROFESSOR='$codprofessor' WHERE CODTURMA='$codigo'", 'write');
  //header("Location: turmas.php");
}

$dias=$Banco->query("SELECT * FROM dias_semana");
$modalidades=$Banco->query("SELECT * FROM modalidades");
$professores=$Banco->query("SELECT * FROM professores");

echo mysql_error();

?>

  <h2>Cadastro de Turmas</h2>
  <div id="resposta" class="sucesso">Deu certo</div>
  <form id="cad_turma" action="?codigo=<?php echo $codigo; ?>" method="post">
    <label>Descrição</label>
    <input type="text" name="descricao" required="true" value="<?php echo $turma['DESCRICAO']; ?>" />
    <label>Dia</label>
    <select name="coddia" required="true">
<?php foreach($dias as $dia): ?>
      <option <?php if($turma['CODDIA'] == $dia['CODDIA']): ?> selected="selected" <?php endif; ?> value="<?php echo $dia['CODDIA']; ?>"><?php echo $dia['DESCRICAO']; ?></option>
<?php endforeach; ?>
    </select>
    <label>Horario</label>
    <input name="hora_inicio" required="true" value="<?php echo $turma['HORA_INICIO']; ?>"></input>
    ás
    <input name="hora_termino" required="true" value="<?php echo $turma['HORA_TERMINO']; ?>"></input>
    <label>Maximo de vagas</label>
    <input type="number" name="max_vagas" required="true" min="1"  value="<?php echo $turma['MAX_VAGAS']; ?>" />
    <label>Modalidade</label>
    <select name="codmodalidade" required="true">
<?php foreach($modalidades as $modalidade): ?>
      <option <?php if($turma['CODMODALIDADE'] == $modalidade['CODMODALIDADE']): ?> selected="selected" <?php endif; ?> value="<?php echo $modalidade['CODMODALIDADE']; ?>"><?php echo $modalidade['DESCRICAO']; ?></option>
<?php endforeach; ?>
    </select>
    <label>Professor</label>
    <select name="codprofessor" required="true">
<?php foreach($professores as $professor): ?>
      <option <?php if($turma['CODPROFESSOR'] == $professor['CODPROFESSOR']): ?> selected="selected" <?php endif; ?> value="<?php echo $professor['CODPROFESSOR']; ?>"><?php echo $professor['NOME']; ?></option>
<?php endforeach; ?>
    </select>
    <button>Enviar</button>
  </form>
  <a href="index.php">voltar</a>
<?php
  include '/includes/footer.php';
?>
