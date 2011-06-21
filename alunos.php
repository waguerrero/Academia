
  <?php
    require 'banco.php';
    include '/includes/header.php';
    $Banco->query("SELECT * FROM alunos;");
    $alunos = $Banco->query("SELECT * FROM alunos;");
  ?>
  <div id="alunos">
    <h2>Alunos</h2>
    <table>
      <tr>
        <th>Codigo</th>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Telefone</th>
        <th>Ativo</th>
      </tr>
<?php if ($alunos != 0) foreach($alunos as $aluno): ?>
<?php $matriculas = $Banco->query("SELECT * FROM matriculas WHERE CODALUNO = {$aluno['CODALUNO']};"); ?>
      <tr>
        <td><?php echo $aluno['CODALUNO']; ?></td>
        <td><?php echo $aluno['NOME']; ?></td>
        <td><?php echo $aluno['ENDERECO']; ?></td>
        <td><?php echo $aluno['TELEFONE']; ?></td>
        <td><img src="images/<?php echo ($matriculas == 0 ? 0 : 1); ?>.png" /></td>
        <td><a href="up_aluno.php?codigo=<?php echo $aluno['CODALUNO']; ?>">atualizar</a></td>
        <td><a href="matriculas.php?codigo=<?php echo $aluno['CODALUNO']; ?>">Matriculas</a></td>
      </tr>
<?php endforeach; ?>
    </table>
    <a class="new" href="cad_aluno.php">Cadastrar um Aluno</a>
<?php
  include '/includes/footer.php';
?>
