<!DOCTYPE html>
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

<form action = "{{url('/PdfProfessor', $professor->ID_PROFESSOR)}}" method = "get"></form>

    <table>
        <td><img align = "center" src="logo.png" width="100" height="75"/><td>
        <td><h1 align = "Center">Nome: <?php echo $professor->NOME?></h1><td></table>
    <h2 align = "Center">--------------------------------------------------------------------------------</h2>
    <h3>ID: <?php echo $professor->ID_PROFESSOR ?></h3>
    <h3>Data de Criação: <?=date('d/m/Y', strtotime($professor->DATA_C))?></h3>
    <h3>Data de Nascimento: <?=date('d/m/Y', strtotime($professor->DATA_N))?></h3>
    <h2 align = "Center">--------------------------------------------------------------------------------</h2>
    </br></br>
    <h3>Documento Gerado em: <?=$data?></h3>
</form>
