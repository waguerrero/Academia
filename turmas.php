<html>
  <head>
    <meta charset='utf-8'>
    <title>Turmas</title>
  </head>
  <?php
    require 'banco.php';
    $turmas = $Banco->query("
SELECT 
  turmas.*, 
  professores.NOME AS PROFESSOR_NOME,
  modalidades.DESCRICAO AS MOD_DESCRICAO,
  dias_semana.DESCRICAO AS DIA_COD
FROM 
  turmas 
  JOIN professores 
    ON (turmas.CODPROFESSOR = professores.CODPROFESSOR)
  JOIN modalidades
    ON (turmas.CODMODALIDADE = modalidades.CODMODALIDADE)
  JOIN dias_semana
    ON (turmas.CODDIA = dias_semana.CODDIA);");
  ?>
  <div class="header">
    <ul id="nav">
      <li>
	<a href="index.php">Home</a>
      </li>
      <li>
        <a href="alunos.php">Alunos</a>
      </li>
      <li>
        <a href="turmas.php">Turmas</a>
      </li>
      <li>
        <a href="modalidades.php">Modalidades</a>
      </li>
      <li>
        <a href="professores.php">Professores</a>
      </li>
    </ul>
  </div>
  <div id="turmas">
    <h2>Turmas</h2>
    <table>
      <tr>
        <th>Codigo</th>
        <th>Descrição</th>
        <th>Dia</th>
        <th>Horario</th>
        <th>Maximo de vagas</th>
        <th>Modalidade</th>
        <th>Professor</th>
      </tr>
<?php foreach($turmas as $turma): ?>
      <tr>
        <td><?php echo $turma['CODTURMA']; ?></td>
        <td><?php echo $turma['DESCRICAO']; ?></td>
        <td><?php echo $turma['DIA_COD']; ?></td>
        <td><?php echo $turma['HORA_INICIO']; ?>as<?php echo $turma['HORA_TERMINO']; ?></td>
        <td><?php echo $turma['MAX_VAGAS']; ?></td>
        <td><?php echo $turma['MOD_DESCRICAO']; ?></td>
        <td><?php echo $turma['PROFESSOR_NOME']; ?></td>
        <td><a href="excluir_turma.php?codigo=<?php echo $turma['CODTURMA']; ?>">delete</a></td>
        <td><a href="up_turma.php?codigo=<?php echo $turma['CODTURMA']; ?>">atualizar</a></td>
      </tr>
<?php endforeach; ?>
    </table>
    <a href="cad_turma.php">Cadastrar uma Turma</a>
  </div>
</html>