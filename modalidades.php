
<?php
  require 'banco.php';
  include '/includes/header.php';
  $Banco->query("SELECT * FROM alunos;");
  $modalidades = $Banco->query("SELECT * FROM modalidades;");
?>
  <div id="modalidades">
    <h2>Modalidades</h2>
    <table>
      <tr>
        <th>Codigo</th>
        <th>Descrição</th>
        <th>Mensalidade</th>
      </tr>
<?php if ($modalidades != 0) foreach($modalidades as $modalidade): ?>
      <tr>
        <td><?php echo $modalidade['CODMODALIDADE']; ?></td>
        <td><?php echo $modalidade['DESCRICAO']; ?></td>
        <td><?php echo $modalidade['MENSALIDADE_BASE']; ?></td>
	<td><a href="excluir_modalidade.php?codigo=<?php echo $modalidade['CODMODALIDADE']; ?>">delete</a></td>
        <td><a href="up_modalidade.php?codigo=<?php echo $modalidade['CODMODALIDADE']; ?>">atualizar</a></td>
      </tr>
<?php endforeach; ?>
    </table>
    <a class="new" href="cad_modalidade.php">Cadastrar uma Modalidade</a>
  </div>
<?php
  include '/includes/footer.php';
?>