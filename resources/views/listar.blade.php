<?php
/**
 * Created by PhpStorm.
 * User: Eranio Leite
 * Date: 20/07/2018
 * Time: 11:50
 */?>
<style>
    .table{
        margin-left: auto;
        margin-right: auto;
    }
    .barra {
        background-color: black;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 60px;
    }
</style>

<div class="barra"></br>

    <table>
        <tr>
            <td><form align = "left" action="{{url('/inicio') }}" method="get">
                    {{ csrf_field()}}
                    <input type="hidden" name="_method" Value="Menu">
                    <input type="submit" value="Menu" class="btn btn-danger"></form></td><td></td><td></td><td></td><td></td>
            <td><form align = "left" action="{{url('/create_professor') }}" method="get">
                    {{ csrf_field()}}
                    <input type="hidden" name="_method" Value="Adicionar Professor">
                    <input type="submit" value="Adicionar Professor" class="btn btn-danger"></form></td>
        </tr>

    </table>


    </br><h1 align="Center" >Professores</h1>
</div></br></br></br>
</br></br></br></br></br></br>




<table class="table" border = "1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Data de Criação</th>
        <th>Data de Nascimento</th>
        <th colspan="4">Ações</th>
    </tr>
    </thead>
    <tbody>
    @foreach($professores as $professor)
        <tr>
            <td>{{$professor->ID_PROFESSOR}}</td>
            <td>{{$professor->NOME}}</td>
            <td><?=date('d/m/Y', strtotime($professor->DATA_C))?></td>
            <td><?=date('d/m/Y', strtotime($professor->DATA_N))?></td>
            <td>

                <form action="{{url('/delete_professor', $professor->ID_PROFESSOR)}}" method="post">
                    {{ csrf_field()}}
                    <input type="hidden" name="_method" Value="delete">
                    <input type="submit" value="delete" class="btn btn-danger"></form>
            </td>
            <td><a href="{{url('/edit_professor', $professor->ID_PROFESSOR)}}" class="btn btn-success">Editar</a></td>
            <td><a href="{{url('/pdf', $professor->ID_PROFESSOR)}}" class="btn btn-success">Gerar PDF</a></td>
            </td></tr>
    @endforeach
    </tbody>
</table>
