<html>
  <head>
    <meta charset='utf-8'>
    <title>Alunos</title>
  </head>
  <?php
    require 'banco.php';
    $Banco->query("SELECT * FROM alunos;");
    $alunos = $Banco->query("SELECT * FROM alunos;");
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
<?php foreach($alunos as $aluno): ?>
<?php $matriculas = $Banco->query("SELECT * FROM matriculas WHERE CODALUNO = {$aluno['CODALUNO']};"); ?>
      <tr>
        <td><?php echo $aluno['CODALUNO']; ?></td>
        <td><?php echo $aluno['NOME']; ?></td>
        <td><?php echo $aluno['ENDERECO']; ?></td>
        <td><?php echo $aluno['TELEFONE']; ?></td>
        <td><img src="images/<?php echo ($matriculas == 0 ? 0 : 1); ?>.png" /></td>
        <td><a href="excluir_aluno.php?codigo=<?php echo $aluno['CODALUNO']; ?>">delete</a></td>
        <td><a href="up_aluno.php?codigo=<?php echo $aluno['CODALUNO']; ?>">atualizar</a></td>
        <td><a href="matriculas.php?codigo=<?php echo $aluno['CODALUNO']; ?>">Matriculas</a></td>
      </tr>
<?php endforeach; ?>
    </table>
    <a href="cad_aluno.php">Cadastrar um Aluno</a>
</html>