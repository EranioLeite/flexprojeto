<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 22/07/2018
 * Time: 12:20
 */
date_default_timezone_set('America/Manaus');
$data = date('Y-m-d H:i');
?>
<form action="{{url('/pdfa', $aluno->ID_ALUNO)}}" method="get">

        <table>
            <td><img align = "center" src="logo.png" width="100" height="75"/><td>
            <td><h1 align = "Center">Nome: <?php  echo $aluno->nome?></h1><td>
        </table>
        <h2 align = "Center">--------------------------------------------------------------------------------</h2>
        <h3>ID: <?php echo $aluno->ID_ALUNO?></h3>
        <h3>Nascimento: <?=date('d/m/Y', strtotime($aluno->datan))?></h3>
        <h3>Logradouro: <?php echo $aluno->rua?></h3>
        <h3>Número: <?php echo $aluno->numero?></h3>
        <h3>Bairro: <?php echo $aluno->bairro?></h3>
        <h3>Cidade: <?php echo $aluno->cidade?></h3>
        <h3>Estado: <?php echo$aluno->uf?></h3>
        <h3>Criação: <?=date('d/m/Y', strtotime($aluno->datac))?></h3>
        <h3>CEP: <?php echo $aluno->cep?></h3>
        <h2 align = "Center">--------------------------------------------------------------------------------</h2>
        </br></br>
        <h3>Documento Gerado em: <?=$data?></h3>

</form>