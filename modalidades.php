<html>
  <head>
    <meta charset='utf-8'>
    <title>Modalidades</title>
  </head>
<?php
  require 'banco.php';
  $Banco->query("SELECT * FROM alunos;");
  $modalidades = $Banco->query("SELECT * FROM modalidades;");
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
  <div id="modalidades">
    <h2>Modalidades</h2>
    <table>
      <tr>
        <th>Codigo</th>
        <th>Descrição</th>
        <th>Mensalidade</th>
      </tr>
<?php foreach($modalidades as $modalidade): ?>
      <tr>
        <td><?php echo $modalidade['CODMODALIDADE']; ?></td>
        <td><?php echo $modalidade['DESCRICAO']; ?></td>
        <td><?php echo $modalidade['MENSALIDADE_BASE']; ?></td>
	<td><a href="excluir_modalidade.php?codigo=<?php echo $modalidade['CODMODALIDADE']; ?>">delete</a></td>
        <td><a href="up_modalidade.php?codigo=<?php echo $modalidade['CODMODALIDADE']; ?>">atualizar</a></td>
      </tr>
<?php endforeach; ?>
    </table>
    <a href="cad_modalidade.php">Cadastrar uma Modalidade</a>
  </div>
</html>