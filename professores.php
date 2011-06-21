<html>
  <head>
    <meta charset='utf-8'>
    <title>Corpo em Forma Academia</title>
  </head>
<?php
  require 'banco.php';
  $Banco->query("SELECT * FROM alunos;");
  $professores = $Banco->query("SELECT * FROM professores;");
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
  <div id="professores">
    <h2>Professores</h2>
    <table>
      <tr>
        <th>Codigo</th>
        <th>Nome</th>
      </tr>
<?php foreach($professores as $professor): ?>
      <tr>
        <td><?php echo $professor['CODPROFESSOR']; ?></td>
        <td><?php echo $professor['NOME']; ?></td>
	<td><a href="excluir_professor.php?codigo=<?php echo $professor['CODPROFESSOR']; ?>">delete</a></td>
        <td><a href="up_professor.php?codigo=<?php echo $professor['CODPROFESSOR']; ?>">atualizar</a></td>
      </tr>
<?php endforeach; ?>
    </table>
    <a href="cad_professor.php">Cadastrar um Professor</a>
  </div>
</html>