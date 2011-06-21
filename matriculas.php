
  <?php
    require 'banco.php';
    include '/includes/header.php';
    $codigo = $_GET['codigo'];
    $Banco->query("SELECT * FROM alunos;");
    $matriculas = $Banco->query("SELECT * FROM matriculas WHERE CODALUNO = '{$codigo}';");
    
    $aluno = $Banco->query("SELECT * FROM alunos WHERE CODALUNO = '{$codigo}';");
    $aluno = $aluno[0];
  ?>
  
  <div id="matriculas">
    <h2>Matriculas do aluno</h2>
    <table>
      <tr>
        <th>Codigo da matricula</th>
        <th>Turma</th>
        <th>Data de inicio</th>
        <th>Data de termino</th>
      </tr>
<?php if ($matriculas != 0) foreach($matriculas as $matricula): $turma = $Banco->query("SELECT * FROM turmas WHERE CODTURMA = {$matricula['CODTURMA']};"); ?>
      <tr>
        <td><?php echo $matricula['CODMATRICULA']; ?></td>
        <td><?php echo $turma[0]['DESCRICAO']; ?></td>
        <td><?php echo $matricula['DATA_INICIO']; ?></td>
        <td><?php echo $matricula['DATA_TERMINO']; ?></td>
        <td><a href="excluir_matricula.php?codigo=<?php echo $matricula['CODMATRICULA']; ?>">delete</a></td>
      </tr>
<?php endforeach; ?>
    </table>
    <a class="new" href="cad_aluno_turma.php?codigo=<?php echo $aluno['CODALUNO']; ?>">Cadastrar em modalidade</a>
<?php
  include '/includes/footer.php';
?>
  