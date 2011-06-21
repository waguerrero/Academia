<?php

require 'banco.php';
include '/includes/header.php';
$alunos = $Banco->query("SELECT * FROM alunos;");
$hoje = date("Y-m-d");

if(is_array($alunos)) foreach($alunos as $aluno){
  $total = 0;
  $matriculas = $Banco->query("SELECT * FROM matriculas WHERE CODALUNO = {$aluno['CODALUNO']};");
  if(is_array($matriculas)) foreach($matriculas as $matricula){
    $turma = $Banco->query("SELECT * FROM turmas WHERE CODTURMA = {$matricula['CODTURMA']};");
    if(isset($turma[0]['CODMODALIDADE'])) $modalidade = $Banco->query("SELECT * FROM modalidades WHERE CODMODALIDADE = {$turma[0]['CODMODALIDADE']};");
    $total += $modalidade[0]['MENSALIDADE_BASE'];
  }
  
  //Gera o vencimento para mais um mes
  $vencimento = date("Y-m-d", mktime(date("H"), date("i"), date("s"), date("n", strtotime("+ 1 months")), 1, date("Y")));
  $fatura = $Banco->query("SELECT * FROM faturas WHERE CODALUNO = {$aluno['CODALUNO']} AND DATA_VENC = '{$vencimento}';");
  
  if(isset($fatura[0])) {
    if($total != $fatura[0]['VALOR']){
      $Banco->query("UPDATE faturas SET VALOR = {$total} WHERE CODFATURA = {$fatura[0]['CODFATURA']};");
    }
  } else {
    $Banco->query("INSERT INTO faturas (CODALUNO, DATA_VENC, VALOR, REFERENCIA) VALUES ({$aluno['CODALUNO']}, '{$vencimento}', {$total}, '{$hoje}')", 'write');
  }
}

//Verificar vencimentos
$faturas_vencidas = $Banco->query("SELECT * FROM faturas WHERE DATA_VENC < '{$hoje}' AND DATA_PGTO IS NULL AND MULTA IS NULL");

if(is_array($faturas_vencidas)) foreach($faturas_vencidas as $fatura){
  $multa = $fatura['VALOR'] * 0.10;
  $Banco->query("UPDATE faturas SET MULTA = {$multa} WHERE CODFATURA = {$fatura['CODFATURA']};");
}

$faturas = $Banco->query("SELECT * FROM faturas;");

?>
<h2>Faturas</h2>
<table>
  <tr>
    <th>Status</th>
    <th>Vencimento</th>
    <th>Aluno</th>
    <th>Valor</th>
    <th>Multa</th>
    <th>Total</th>
    <th>Opções</th>
  </tr>
<?php if(is_array($faturas)) foreach($faturas as $fatura): ?>
  <?php $aluno = $Banco->query("SELECT * FROM alunos WHERE CODALUNO = {$fatura['CODALUNO']}"); ?>
  <tr>
    <td><?php echo (empty($fatura['DATA_PGTO']) ? (empty($fatura['MULTA']) ? 'Aguardando Pagamento' : 'Fatura Vencida') : 'Pagamento OK.'); ?></td>
    <td><?php $v = explode('-', $fatura['DATA_VENC']); echo $v[2].'/'.$v[1].'/'.$v[0]; ?></td>
    <td><?php echo $aluno[0]['NOME']; ?></td>
    <td>R$ <?php echo number_format($fatura['VALOR'], 2, ',', '.'); ?></td>
    <td><?php echo (!empty($fatura['MULTA']) ? 'R$ '.number_format($fatura['MULTA'], 2, ',', '.') : '--'); ?></td>
    <td>R$ <?php echo number_format($fatura['VALOR'] + $fatura['MULTA'], 2, ',', '.'); ?></td>
    <td><a href="pagar.php?codigo=<?php echo $fatura['CODFATURA']; ?>">Tornar pago</a></td>
  </tr>
<?php endforeach; ?>
</table>
<?php
  include '/includes/footer.php';
?>
