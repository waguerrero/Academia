
<?php
  require 'banco.php';
  include '/includes/header.php';
  $Banco->query("SELECT * FROM alunos;");
  $professores = $Banco->query("SELECT * FROM professores;");
?>
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
    <a class="new" href="cad_professor.php">Cadastrar um Professor</a>
  </div>
<?php
  include '/includes/footer.php';
?>